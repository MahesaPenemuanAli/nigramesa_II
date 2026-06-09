<?php

if (!function_exists('gambar_url')) {
    /**
     * Smart image URL resolver for Nigramesa.
     * - If value starts with 'http', return as-is (external/placeholder URL).
     * - If value is a storage path, serve it through Laravel's uploads route.
     * - If empty/null, return the provided fallback placeholder.
     */
    function gambar_url(?string $path, ?string $fallback = null): string
    {
        if (empty($path)) {
            return $fallback && !str_contains($fallback, 'placehold.co') ? $fallback : asset('images/placeholder.png');
        }

        if (str_starts_with($path, 'http')) {
            return $path;
        }

        return \Illuminate\Support\Facades\Storage::url($path);
    }
}
