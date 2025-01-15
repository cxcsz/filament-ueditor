# filament 的 ueditor 富文本编辑器扩展

[![Latest Version on Packagist](https://img.shields.io/packagist/v/cxcsz/filament-ueditor.svg?style=flat-square)](https://packagist.org/packages/cxcsz/filament-ueditor)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/cxcsz/filament-ueditor/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/cxcsz/filament-ueditor/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/cxcsz/filament-ueditor/fix-php-code-styling.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/cxcsz/filament-ueditor/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/cxcsz/filament-ueditor.svg?style=flat-square)](https://packagist.org/packages/cxcsz/filament-ueditor)



This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require cxcsz/filament-ueditor
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="filament-ueditor-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="filament-ueditor-config"
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="filament-ueditor-views"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$filamentUeditor = new Cxcsz\FilamentUeditor();
echo $filamentUeditor->echoPhrase('Hello, Cxcsz!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [cxcsz](https://github.com/cxcsz)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
