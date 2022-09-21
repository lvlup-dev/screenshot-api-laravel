<?php

namespace LvlupDev\ScreenshotApiLaravel;

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class ScreenshotApiService extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'screenshot-api-service';
    }

    public static function fetch(string $url, string $destination, string $storageDisk = 'local', ?int $width = null, ?int $height = null): void
    {
        $api_key = config('screenshot-api.api_key');
        $width = $width ?? config('screenshot-api.width');
        $height = $height ?? config('screenshot-api.height');
        $format = self::getFormatFromDestination($destination);

        $url = "https://shot.screenshotapi.net/screenshot" .
            "?url=$url" .
            "&width=$width" .
            "&height=$height" .
            "&fresh=true" .
            "&output=image" .
            "&file_type=$format" .
            "&wait_for_event=load" .
            "&token=$api_key";

        $response = Http::get($url);

        Storage::disk($storageDisk)->put($destination, $response->body());
    }

    public static function getFormatFromDestination(string $destination): string
    {
        $extension = pathinfo($destination, PATHINFO_EXTENSION);

        return match ($extension) {
            'png' => 'png',
            'webp' => 'webp',
            default => 'jpg',
        };
    }
}
