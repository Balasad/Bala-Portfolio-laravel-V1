<?php

namespace App\Helpers;

class ImageHelper
{
    /**
     * Generate responsive image srcset attribute
     * Sizes: small (480px), medium (800px), large (1200px)
     */
    public static function srcset(string $imagePath): string
    {
        $basePath = str_replace('.png', '', str_replace('.jpg', '', $imagePath));
        $ext = pathinfo($imagePath, PATHINFO_EXTENSION);

        return "{$imagePath} 1x, {$basePath}@2x.{$ext} 2x";
    }

    /**
     * Get image dimensions from file
     * Returns array ['width' => x, 'height' => y, 'aspect' => '16/9']
     */
    public static function dimensions(string $imagePath): array
    {
        $fullPath = public_path($imagePath);

        if (!file_exists($fullPath)) {
            return ['width' => 1200, 'height' => 630, 'aspect' => '16/9'];
        }

        [$width, $height] = getimagesize($fullPath);
        $gcd = gcd($width, $height);

        return [
            'width' => $width,
            'height' => $height,
            'aspect' => ($width / $gcd) . '/' . ($height / $gcd),
        ];
    }

    /**
     * Generate blur-up placeholder (low-quality image data)
     * For production: encode actual low-res version
     */
    public static function blurPlaceholder(string $imagePath): string
    {
        $dims = self::dimensions($imagePath);

        // Placeholder: solid color CSS gradient
        // In production, replace with actual blurhash or low-res base64
        $aspectRatio = ($dims['height'] / $dims['width']) * 100;

        return "linear-gradient(135deg, #1f2937 0%, #374151 100%)";
    }

    /**
     * Returns 'webp' if supported, else 'jpg'
     */
    public static function preferredFormat(): string
    {
        // Server-side check (can also be done client-side with JS)
        return function_exists('imagewebp') ? 'webp' : 'jpg';
    }

    /**
     * Generate picture element with WebP + fallback
     */
    public static function pictureElement(string $imagePath, array $attrs = []): string
    {
        $alt = $attrs['alt'] ?? 'Image';
        $class = $attrs['class'] ?? '';
        $loading = $attrs['loading'] ?? 'lazy';

        $webpPath = str_replace(['.jpg', '.png'], '.webp', $imagePath);
        $dims = self::dimensions($imagePath);

        $html = '<picture>';
        $html .= '<source srcset="' . e($webpPath) . '" type="image/webp">';
        $html .= '<img src="' . e($imagePath) . '" alt="' . e($alt) . '" ';
        $html .= 'width="' . $dims['width'] . '" height="' . $dims['height'] . '" ';
        $html .= 'class="' . e($class) . '" loading="' . e($loading) . '">';
        $html .= '</picture>';

        return $html;
    }
}

/**
 * Helper function for GCD (used in aspect ratio calculation)
 */
if (!function_exists('gcd')) {
    function gcd(int $a, int $b): int
    {
        return $b === 0 ? $a : gcd($b, $a % $b);
    }
}
