<?php

use Illuminate\Support\Facades\Route;

// ── Load projects data ──────────────────────────────────────────────────────
// Option A (simplest): keep data in config/projects.php → access via config('projects')
// Option B: use a dedicated ProjectsService class
// This file uses a local helper for simplicity — move to a Service when you add a DB.

function getProjects(): array
{
    return require app_path('Data/projects.php');
}

// ── Static pages ───────────────────────────────────────────────────────────

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

// ── Project detail ─────────────────────────────────────────────────────────

Route::get('/project/{slug}', function (string $slug) {

    $projects = getProjects();

    // Find matching project
    $index   = array_search($slug, array_column($projects, 'slug'));

    if ($index === false) {
        abort(404);
    }

    $project = $projects[$index];

    // Find the next project (wraps around)
    $nextIndex = ($index + 1) % count($projects);
    $next      = $nextIndex !== $index ? $projects[$nextIndex] : null;

    return view('pages.project', compact('project', 'next'));

})->name('project');

// ── SEO Sitemap ────────────────────────────────────────────────────────────

Route::get('/sitemap.xml', function () {
    $projects = getProjects();
    
    // Generate URLs for all pages
    $urls = [
        ['url' => route('home'), 'changefreq' => 'weekly', 'priority' => '1.0'],
        ['url' => route('contact'), 'changefreq' => 'monthly', 'priority' => '0.7'],
    ];
    
    // Add project URLs
    foreach ($projects as $project) {
        $urls[] = [
            'url' => route('project', $project['slug']),
            'changefreq' => 'monthly',
            'priority' => '0.8',
        ];
    }
    
    return response(view('sitemap', ['urls' => $urls]), 200, ['Content-Type' => 'application/xml; charset=utf-8']);
})->name('sitemap');

// ── Test Email Route (Delete after testing) ──────────────────────────────────

Route::get('/test-email', function () {
    $testData = [
        'name' => 'Test User',
        'email' => 'balasaravanan062@gmail.com',
        'enquiryType' => 'project',
        'enquiryLabel' => 'Project Collaboration',
        'message' => 'This is a test email to verify your contact form is working correctly!',
    ];

    try {
        // Send admin email
        $to = config('mail.to.address', env('MAIL_FROM_ADDRESS', 'balasaravanan062@gmail.com'));
        \Illuminate\Support\Facades\Mail::send([], [], function ($mail) use ($testData, $to) {
            $html = '<!DOCTYPE html><html><body style="margin:0;padding:0;background:#0f172a;font-family:Roboto,Arial,sans-serif;">
              <table width="100%" cellpadding="0" cellspacing="0" style="background:#0f172a;padding:40px 0;">
                <tr><td align="center">
                  <table width="560" cellpadding="0" cellspacing="0" style="background:#1e293b;border-radius:16px;overflow:hidden;border:1px solid rgba(255,255,255,0.08);">
                    <tr>
                      <td style="background:linear-gradient(135deg,#22c55e,#4ade80);padding:28px 32px;">
                        <p style="margin:0;color:rgba(255,255,255,0.8);font-size:11px;font-weight:700;letter-spacing:3px;text-transform:uppercase;">Portfolio Contact — TEST</p>
                        <h1 style="margin:8px 0 0;color:#fff;font-size:22px;font-weight:800;">🚀 Project Collaboration</h1>
                      </td>
                    </tr>
                    <tr>
                      <td style="padding:32px;">
                        <table width="100%" cellpadding="0" cellspacing="0" style="border-bottom:1px solid rgba(255,255,255,0.08);margin-bottom:24px;">
                          <tr><td style="padding:10px 0;color:#94a3b8;font-size:13px;width:130px;vertical-align:top">Name</td><td style="padding:10px 0;color:#fff;font-size:14px">Test User</td></tr>
                          <tr><td style="padding:10px 0;color:#94a3b8;font-size:13px;vertical-align:top">Email</td><td style="padding:10px 0;font-size:14px"><a href="mailto:balasaravanan062@gmail.com" style="color:#4ade80;text-decoration:none">balasaravanan062@gmail.com</a></td></tr>
                        </table>
                        <p style="margin:0 0 10px;color:#94a3b8;font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:1px;">Message</p>
                        <div style="background:rgba(255,255,255,0.04);border-radius:12px;padding:20px;color:#e2e8f0;font-size:15px;line-height:1.8;">✅ This is a test email to verify your contact form is working correctly!</div>
                        <p style="margin:24px 0 0;color:#475569;font-size:12px;">If you received this email, your contact form is working perfectly!</p>
                      </td>
                    </tr>
                  </table>
                </td></tr>
              </table>
            </body></html>';

            $mail->to($to)
                 ->subject('[TEST] Email System Working ✅')
                 ->html($html);
        });

        // Send confirmation email to user
        \Illuminate\Support\Facades\Mail::send(new \App\Mail\ContactFormReceived(
            name: $testData['name'],
            email: $testData['email'],
            enquiryType: $testData['enquiryType'],
            enquiryLabel: $testData['enquiryLabel'],
            message: $testData['message'],
        ));

        return response()->json([
            'status' => 'success',
            'message' => '✅ Test emails sent successfully!',
            'details' => [
                'admin_email_sent_to' => $to,
                'user_confirmation_sent_to' => $testData['email'],
                'sent_at' => now()->toDateTimeString(),
                'next_steps' => [
                    '1. Check your Gmail inbox for the test email',
                    '2. Check spam folder if not found',
                    '3. Visit /contact to test the contact form',
                    '4. Delete this route after testing (delete /test-email route)',
                ]
            ]
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => 'Failed to send test email',
            'error' => $e->getMessage(),
        ], 500);
    }
})->name('test-email');