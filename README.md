# localization-sdk

Localization SDK for Laravel

Localization package with helper function for more comfort usage.

**Installation**

Require the package from your `composer.json` file


```php
"require": {
	"toxageek/localization-sdk": "*"
}
```

and run `$ composer update` or both in one with `$ composer require toxageek/localization-sdk`.

Next register the following service providers to your `config/app.php` file

```php
'providers' => [
    // Illuminate Providers ...
    // App Providers ...
    ToxaGeek\LocalizationSDK\LocalizationServiceProvider::class,
];
```

## Configuration

```bash
$ php artisan vendor:publish --provider="ToxaGeek\LocalizationSDK\LocalizationServiceProvider"
```

This will create a `config/localization.php`, that you'll have to run like so:

## Usage

Use `{{ lang('messages.welcome') }}` like `{{ __('messages.welcome') }}` helper function

```php
// read local from cookie 'localization' field if exist
// or default value from 'localization.php' config file if exist,
// or use default app local
{{ lang('messages.welcome') }}

// get specific language
// if language is not active in 'localization.php' config, return default value
{{ lang('messages.welcome', [], 'en') }}
```

`LocalizationServiceProvider` on boot check cookie for `localization` field, if not exist
set `localization` from `getLocalization()` user model method if exist, or default vaue from 
`localization.php` config file.

## License

Licensed under [MIT license](http://opensource.org/licenses/MIT).

## Author

**Handcrafted with love by [Haziyev Tofik](https://www.instagram.com/toxageek) in Ucraine.**
