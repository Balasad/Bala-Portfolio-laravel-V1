<?php

namespace App\Livewire;

use App\Mail\ContactFormReceived;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;

class ContactForm extends Component
{
    // Basic fields
    public string $name    = '';
    public string $email   = '';
    public string $phone   = '';
    public string $message = '';

    // Job enquiry fields
    public string $enquiryType = 'project';   // 'job' | 'project' | 'freelance' | 'other'
    public string $company     = '';
    public string $jobTitle    = '';
    public string $budget      = '';

    // Spam / status
    public string $honeypot       = '';
    public string $successMessage = '';
    public string $errorMessage   = '';
    public bool $showSuccess      = false;
    public bool $showError        = false;

    protected function rules(): array
    {
        return [
            'name'        => 'required|min:2|max:100',
            'email'       => 'required|email|max:255',
            'phone'       => 'nullable|max:20',
            'enquiryType' => 'required|in:job,project,freelance,other',
            'company'     => 'nullable|max:100',
            'jobTitle'    => 'nullable|max:100',
            'budget'      => 'nullable|max:50',
            'message'     => 'required|min:10|max:5000',
            'honeypot'    => 'size:0',
        ];
    }

    protected $messages = [
        'name.required'    => 'Please enter your name.',
        'email.required'   => 'Please enter your email address.',
        'email.email'      => 'Please enter a valid email address.',
        'message.required' => 'Please enter your message.',
        'message.min'      => 'Message must be at least 10 characters.',
    ];

    public function submit(): void
    {
        if ($this->honeypot !== '') {
            $this->reset(['name', 'email', 'phone', 'company', 'jobTitle', 'budget', 'message', 'honeypot']);
            $this->successMessage = 'Thank you! Your message has been sent successfully.';
            $this->showSuccess = true;
            $this->dispatch('success-message-shown');
            return;
        }

        $this->validate();

        // FIX: use positional args instead of named arg (decay:) — works on all PHP 8.x / Laravel versions
        $key = 'contact-form:' . request()->ip();
        if (RateLimiter::tooManyAttempts($key, 3)) {
            $seconds = RateLimiter::availableIn($key);
            $this->errorMessage = "Too many submissions. Please wait {$seconds} seconds.";
            $this->showError = true;
            return;
        }
        RateLimiter::hit($key, 600);

        $this->errorMessage   = '';
        $this->successMessage = '';
        $this->showError      = false;
        $this->showSuccess    = false;

        // Capture before reset() wipes them
        $name        = $this->name;
        $email       = $this->email;
        $phone       = $this->phone;
        $enquiryType = $this->enquiryType;
        $company     = $this->company;
        $jobTitle    = $this->jobTitle;
        $budget      = $this->budget;
        $message     = $this->message;

        $enquiryLabels = [
            'job'       => 'Job Opportunity',
            'project'   => 'Project Collaboration',
            'freelance' => 'Freelance Work',
            'other'     => 'General Enquiry',
        ];
        $enquiryLabel = $enquiryLabels[$enquiryType] ?? $enquiryType;

        try {
            $to = config('mail.to.address', env('MAIL_FROM_ADDRESS', 'balasaravanan062@gmail.com'));

            Mail::send([], [], function ($mail) use (
                $name, $email, $phone, $enquiryType, $enquiryLabel,
                $company, $jobTitle, $budget, $message, $to
            ) {
                $typeIcon = match($enquiryType) {
                    'job'       => '&#x1F4BC;',
                    'project'   => '&#x1F680;',
                    'freelance' => '&#x1F3AF;',
                    default     => '&#x1F4AC;',
                };

                $rows = '
                    <tr>
                        <td style="padding:10px 0;color:#94a3b8;font-size:13px;width:130px;vertical-align:top">Enquiry Type</td>
                        <td style="padding:10px 0;color:#fff;font-size:14px">' . $typeIcon . ' ' . e($enquiryLabel) . '</td>
                    </tr>
                    <tr>
                        <td style="padding:10px 0;color:#94a3b8;font-size:13px;vertical-align:top">Name</td>
                        <td style="padding:10px 0;color:#fff;font-size:14px">' . e($name) . '</td>
                    </tr>
                    <tr>
                        <td style="padding:10px 0;color:#94a3b8;font-size:13px;vertical-align:top">Email</td>
                        <td style="padding:10px 0;font-size:14px"><a href="mailto:' . e($email) . '" style="color:#4ade80;text-decoration:none">' . e($email) . '</a></td>
                    </tr>';

                if ($phone) $rows .= '<tr><td style="padding:10px 0;color:#94a3b8;font-size:13px">Phone</td><td style="padding:10px 0;color:#fff;font-size:14px">' . e($phone) . '</td></tr>';
                if ($company) $rows .= '<tr><td style="padding:10px 0;color:#94a3b8;font-size:13px">Company</td><td style="padding:10px 0;color:#fff;font-size:14px">' . e($company) . '</td></tr>';
                if ($jobTitle) $rows .= '<tr><td style="padding:10px 0;color:#94a3b8;font-size:13px">Role / Title</td><td style="padding:10px 0;color:#fff;font-size:14px">' . e($jobTitle) . '</td></tr>';
                if ($budget) $rows .= '<tr><td style="padding:10px 0;color:#94a3b8;font-size:13px">Budget / Salary</td><td style="padding:10px 0;color:#fff;font-size:14px">' . e($budget) . '</td></tr>';

                $html = '<!DOCTYPE html><html><body style="margin:0;padding:0;background:#0f172a;font-family:Roboto,Arial,sans-serif;">
                  <table width="100%" cellpadding="0" cellspacing="0" style="background:#0f172a;padding:40px 0;">
                    <tr><td align="center">
                      <table width="560" cellpadding="0" cellspacing="0" style="background:#1e293b;border-radius:16px;overflow:hidden;border:1px solid rgba(255,255,255,0.08);">
                        <tr>
                          <td style="background:linear-gradient(135deg,#22c55e,#4ade80);padding:28px 32px;">
                            <p style="margin:0;color:rgba(255,255,255,0.8);font-size:11px;font-weight:700;letter-spacing:3px;text-transform:uppercase;">Portfolio Contact</p>
                            <h1 style="margin:8px 0 0;color:#fff;font-size:22px;font-weight:800;">' . $typeIcon . ' ' . e($enquiryLabel) . '</h1>
                          </td>
                        </tr>
                        <tr>
                          <td style="padding:32px;">
                            <table width="100%" cellpadding="0" cellspacing="0" style="border-bottom:1px solid rgba(255,255,255,0.08);margin-bottom:24px;">' . $rows . '</table>
                            <p style="margin:0 0 10px;color:#94a3b8;font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:1px;">Message</p>
                            <div style="background:rgba(255,255,255,0.04);border-radius:12px;padding:20px;color:#e2e8f0;font-size:15px;line-height:1.8;">' . nl2br(e($message)) . '</div>
                            <p style="margin:24px 0 0;color:#475569;font-size:12px;">Reply to this email to respond directly to ' . e($name) . '</p>
                          </td>
                        </tr>
                        <tr>
                          <td style="padding:16px 32px;border-top:1px solid rgba(255,255,255,0.06);">
                            <p style="margin:0;color:#475569;font-size:11px;">Sent via Balasaravanan\'s Portfolio</p>
                          </td>
                        </tr>
                      </table>
                    </td></tr>
                  </table>
                </body></html>';

                $mail->to($to)
                     ->replyTo($email, $name)
                     ->subject("[Portfolio] {$enquiryLabel} from {$name}")
                     ->html($html);
            });

            // Send confirmation email to user
            Mail::send(new ContactFormReceived(
                name: $name,
                email: $email,
                enquiryType: $enquiryType,
                enquiryLabel: $enquiryLabel,
                message: $message,
            ));

            $this->successMessage = "Thanks {$name}! I'll get back to you shortly. 🚀";
            $this->showSuccess = true;
            $this->reset(['name', 'email', 'phone', 'company', 'jobTitle', 'budget', 'message', 'honeypot']);
            $this->enquiryType = 'project';
            $this->dispatch('success-message-shown');

        } catch (\Exception $e) {
            $this->errorMessage = 'Oops! Something went wrong. Try emailing me directly:';
            $this->showError = true;
            report($e);
        }
    }

    public function render(): \Illuminate\View\View
    {
        return view('livewire.contact-form');
    }
}