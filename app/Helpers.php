<?php

// Global helper functions for common utilities

// Image helpers
if (!function_exists('image_srcset')) {
    function image_srcset(string $imagePath): string
    {
        return \App\Helpers\ImageHelper::srcset($imagePath);
    }
}

if (!function_exists('image_dimensions')) {
    function image_dimensions(string $imagePath): array
    {
        return \App\Helpers\ImageHelper::dimensions($imagePath);
    }
}

if (!function_exists('image_blur_placeholder')) {
    function image_blur_placeholder(string $imagePath): string
    {
        return \App\Helpers\ImageHelper::blurPlaceholder($imagePath);
    }
}

if (!function_exists('preferred_image_format')) {
    function preferred_image_format(): string
    {
        return \App\Helpers\ImageHelper::preferredFormat();
    }
}

if (!function_exists('picture_element')) {
    function picture_element(string $imagePath, array $attrs = []): string
    {
        return \App\Helpers\ImageHelper::pictureElement($imagePath, $attrs);
    }
}
