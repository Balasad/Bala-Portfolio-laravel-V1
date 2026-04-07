<?php

namespace App\Services;

class SeoService
{
    /**
     * Generate Person schema (for the portfolio owner)
     */
    public static function personSchema(): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'Person',
            'name' => 'Balasaravanan S',
            'url' => config('app.url'),
            'jobTitle' => 'UI/UX Designer & Full Stack Developer',
            'location' => [
                '@type' => 'Place',
                'address' => [
                    '@type' => 'PostalAddress',
                    'addressCity' => 'Chennai',
                    'addressCountry' => 'IN',
                ],
            ],
            'sameAs' => [
                'https://linkedin.com/in/balasaravanan-s-366365235',
                'https://github.com/Balasad',
                'https://x.com/Balasad_',
            ],
            'knowsAbout' => [
                'UI/UX Design',
                'Web Development',
                'Laravel',
                'Livewire',
                'Figma',
                'JavaScript',
                'Tailwind CSS',
                'Blender',
                'Full Stack Development',
            ],
            'description' => 'UI/UX Designer and Full Stack Developer specializing in enterprise web applications with Laravel and modern frontend technologies.',
        ];
    }

    /**
     * Generate Organization schema (for the portfolio site)
     */
    public static function organizationSchema(): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => 'Balasaravanan S — Portfolio',
            'url' => config('app.url'),
            'logo' => asset('images/og-cover.png'),
            'description' => 'Portfolio of Balasaravanan S, UI/UX Designer and Laravel Developer from Chennai.',
            'sameAs' => [
                'https://linkedin.com/in/balasaravanan-s-366365235',
                'https://github.com/Balasad',
                'https://x.com/Balasad_',
            ],
            'contactPoint' => [
                '@type' => 'ContactPoint',
                'contactType' => 'Customer Support',
                'email' => 'balasaravanan062@gmail.com',
            ],
            'areaServed' => 'IN',
            'foundingDate' => '2024',
        ];
    }

    /**
     * Generate CreativeWork schema for a project
     */
    public static function projectSchema(array $project): array
    {
        $dateModified = $project['year'] ?? date('Y');

        return [
            '@context' => 'https://schema.org',
            '@type' => 'CreativeWork',
            'name' => $project['title'],
            'description' => $project['summary'],
            'image' => asset($project['cover']),
            'datePublished' => "{$dateModified}-01-01",
            'author' => [
                '@type' => 'Person',
                'name' => 'Balasaravanan S',
            ],
            'creator' => [
                '@type' => 'Person',
                'name' => 'Balasaravanan S',
                'url' => config('app.url'),
            ],
            'about' => $project['problem'] ?? null,
            'url' => route('project', $project['slug']),
            'keywords' => implode(', ', $project['stack'] ?? []),
        ];
    }

    /**
     * Generate BreadcrumbList schema for project detail page
     */
    public static function breadcrumbSchema(string $projectTitle, string $projectSlug): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                [
                    '@type' => 'ListItem',
                    'position' => 1,
                    'name' => 'Home',
                    'item' => config('app.url'),
                ],
                [
                    '@type' => 'ListItem',
                    'position' => 2,
                    'name' => 'Portfolio',
                    'item' => config('app.url'),
                ],
                [
                    '@type' => 'ListItem',
                    'position' => 3,
                    'name' => $projectTitle,
                    'item' => route('project', $projectSlug),
                ],
            ],
        ];
    }

    /**
     * Convert array to JSON-LD script tag
     */
    public static function jsonLdScript(array $schema): string
    {
        return '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';
    }

    /**
     * Generate multiple schemas combined
     */
    public static function combinedSchema(array ...$schemas): string
    {
        $combined = [
            '@context' => 'https://schema.org',
            '@graph' => [],
        ];

        foreach ($schemas as $schema) {
            // Remove the @context from individual schemas to avoid duplication
            $schemaWithoutContext = array_filter($schema, fn($key) => $key !== '@context', ARRAY_FILTER_USE_KEY);
            $combined['@graph'][] = $schemaWithoutContext;
        }

        return self::jsonLdScript($combined);
    }
}
