<?php

use Illuminate\Support\Facades\Route;

// ── Load projects data ──────────────────────────────────────────────────────
// Option A (simplest): keep data in config/projects.php → access via config('projects')
// Option B: use a dedicated ProjectsService class
// This file uses a local helper for simplicity — move to a Service when you add a DB.

if (! function_exists('getProjects')) {
    function getProjects(): array
    {
        return require app_path('Data/projects.php');
    }
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