<?php

use Illuminate\Support\Facades\Cache;

/**
 * clearFrontendCache()
 *
 * Clears all frontend-related cache keys for both locales (ar / en).
 * Call this after any write operation that affects what visitors see:
 *   - products, sliders, clients, partners, settings, menu items.
 *
 * Do NOT call this from index() methods — clearing on read defeats the purpose.
 */
if (! function_exists('clearFrontendCache')) {
    function clearFrontendCache(): void
    {
        // Layout payload (navbar, footer, settings) — shared across all pages
        Cache::forget('layout_payload_ar');
        Cache::forget('layout_payload_en');

        // Menu items (separate cache because they are nested/recursive)
        Cache::forget('menu_items_ar');
        Cache::forget('menu_items_en');

        // Home page specific payload (sliders, services, solutions, partners, clients)
        Cache::forget('home_services_payload_ar');
        Cache::forget('home_services_payload_en');
    }
}

if (! function_exists('parseVideoLink')) {
    function parseVideoLink(?string $url): ?array
    {
        if (empty($url)) {
            return null;
        }

        $url = trim($url);
        $parts = parse_url($url);

        if (! $parts || empty($parts['host'])) {
            return null;
        }

        $host  = strtolower($parts['host']);
        $path  = $parts['path'] ?? '';
        $query = $parts['query'] ?? '';

        // =========================
        // YouTube
        // =========================
        if (
            str_contains($host, 'youtube.com') ||
            str_contains($host, 'youtu.be')
        ) {
            $youtubeId = null;

            if (! empty($query)) {
                parse_str($query, $queryParams);
                $youtubeId = $queryParams['v'] ?? null;
            }

            if (! $youtubeId && ! empty($path)) {
                $segments = array_values(array_filter(explode('/', trim($path, '/'))));

                // youtu.be/VIDEO_ID
                if (str_contains($host, 'youtu.be') && ! empty($segments[0])) {
                    $youtubeId = $segments[0];
                }

                // youtube.com/embed/VIDEO_ID
                if (! $youtubeId && count($segments) >= 2 && $segments[0] === 'embed') {
                    $youtubeId = $segments[1];
                }

                // youtube.com/shorts/VIDEO_ID
                if (! $youtubeId && count($segments) >= 2 && $segments[0] === 'shorts') {
                    $youtubeId = $segments[1];
                }
            }

            if ($youtubeId) {
                return [
                    'platform' => 'youtube',
                    'id'       => $youtubeId,
                    'embed'    => 'https://www.youtube.com/embed/' . $youtubeId,
                    'url'      => $url,
                ];
            }
        }

        // =========================
        // TikTok
        // =========================
        if (str_contains($host, 'tiktok.com')) {
            $segments = array_values(array_filter(explode('/', trim($path, '/'))));
            $videoId = null;

            foreach ($segments as $i => $segment) {
                if ($segment === 'video' && isset($segments[$i + 1])) {
                    $videoId = $segments[$i + 1];
                    break;
                }
            }

            if ($videoId) {
                return [
                    'platform' => 'tiktok',
                    'id'       => $videoId,
                    'embed'    => 'https://www.tiktok.com/embed/v2/' . $videoId,
                    'url'      => $url,
                ];
            }

            return [
                'platform' => 'tiktok',
                'id'       => null,
                'embed'    => null,
                'url'      => $url,
            ];
        }

        // =========================
        // Instagram Reel / Post
        // =========================
        if (str_contains($host, 'instagram.com')) {
            $segments = array_values(array_filter(explode('/', trim($path, '/'))));
            $code = null;
            $type = null;

            if (count($segments) >= 2 && in_array($segments[0], ['reel', 'reels', 'p'])) {
                $type = $segments[0];
                $code = $segments[1];
            }

            if ($code) {
                return [
                    'platform' => 'instagram',
                    'id'       => $code,
                    'embed'    => 'https://www.instagram.com/' . $type . '/' . $code . '/embed',
                    'url'      => $url,
                ];
            }

            return [
                'platform' => 'instagram',
                'id'       => null,
                'embed'    => null,
                'url'      => $url,
            ];
        }

        return [
            'platform' => 'external',
            'id'       => null,
            'embed'    => null,
            'url'      => $url,
        ];
    }
}