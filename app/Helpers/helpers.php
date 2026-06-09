<?php

if (!function_exists('gambar_url')) {
    /**
     * Smart image URL resolver for Nigramesa.
     * - If value starts with 'http', return as-is (external/placeholder URL).
     * - If value is a storage path, serve it through Laravel's uploads route.
     * - If empty/null, return the provided fallback placeholder.
     */
    function gambar_url(?string $path, string $fallback = 'https://placehold.co/600x400/e2e8f0/475569?text=No+Image'): string
    {
        if (empty($path)) {
            return $fallback;
        }

        if (str_starts_with($path, 'http')) {
            return $path;
        }

        return \Illuminate\Support\Facades\Storage::url($path);
    }
}
