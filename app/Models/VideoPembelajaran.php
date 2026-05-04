<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoPembelajaran extends Model
{
    use HasFactory;

    protected $table = "video_pembelajarans";

    protected $guarded = [];

    protected function casts(): array
    {
        return [
            "is_premium" => "boolean",
        ];
    }

    public function getYoutubeVideoIdAttribute(): ?string
    {
        return self::extractYoutubeVideoId($this->link_youtube);
    }

    public function getYoutubeEmbedUrlAttribute(): string
    {
        return self::transformYoutubeUrlToEmbed($this->link_youtube);
    }

    public function getYoutubeThumbnailUrlAttribute(): string
    {
        $videoId = $this->youtube_video_id;

        if (!$videoId) {
            return "";
        }

        return "https://img.youtube.com/vi/" . $videoId . "/hqdefault.jpg";
    }

    public static function extractYoutubeVideoId(?string $url): ?string
    {
        if (empty($url)) {
            return null;
        }

        if (
            str_contains($url, "youtube.com/embed/") ||
            str_contains($url, "youtube-nocookie.com/embed/")
        ) {
            $parsedUrl = parse_url($url);
            $path = trim($parsedUrl["path"] ?? "", "/");

            if (str_starts_with($path, "embed/")) {
                return str_replace("embed/", "", $path);
            }

            return null;
        }

        $parsedUrl = parse_url($url);
        $host = $parsedUrl["host"] ?? "";
        $path = trim($parsedUrl["path"] ?? "", "/");
        $query = [];

        if (!empty($parsedUrl["query"])) {
            parse_str($parsedUrl["query"], $query);
        }

        if (str_contains($host, "youtu.be")) {
            return $path ?: null;
        }

        if (
            str_contains($host, "youtube.com") ||
            str_contains($host, "youtube-nocookie.com")
        ) {
            if (!empty($query["v"])) {
                return $query["v"];
            }

            if (str_starts_with($path, "shorts/")) {
                return str_replace("shorts/", "", $path);
            }

            if (str_starts_with($path, "live/")) {
                return str_replace("live/", "", $path);
            }
        }

        return null;
    }

    public static function transformYoutubeUrlToEmbed(?string $url): string
    {
        if (empty($url)) {
            return "";
        }

        if (
            str_contains($url, "youtube.com/embed/") ||
            str_contains($url, "youtube-nocookie.com/embed/")
        ) {
            return $url;
        }

        $videoId = self::extractYoutubeVideoId($url);

        if (!$videoId) {
            return $url;
        }

        return "https://www.youtube.com/embed/" . $videoId;
    }
}
