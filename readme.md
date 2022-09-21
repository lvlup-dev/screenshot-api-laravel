# ScreenshotApi 

This package uses [https://screenshotapi.net](https://screenshotapi.net) to easily fetch screenshots from urls.

## Installation

`composer require lvlup-dev/screenshot-api-laravel`

Then edit your .env file to include your screenshotapi.net api key:
`SCREENSHOT_API_KEY="[YOUR_API_KEY_HERE]"`

## Usage

```php
ScreenshotApiService::fetch($url, $destinationFilePath);
```

The file format will be determined by the extension of the destination file path.

Parameters:
- (mandatory) url : the URL to fetch
- (mandatory) destinationFilePath : the path where the screenshot will be saved
- storageDisk : the storage disk to use when saving the file. Defaults to 'local'
- width : the width of the screenshot. Defaults to 1920
- height : the height of the screenshot. Defaults to 1080
 
If you wish to change the default values, you can publish the package's config file and edit the values there:

`php artisan vendor:publish --provider="LvlupDev\ScreenshotApiLaravel\ScreenshotApiServiceProvider" --tag="config"`

## License

MIT. Please see the [license file](license.md) for more information.

## Limited Warranty

We are not affiliated in any way with the team from screenshotapi.net
