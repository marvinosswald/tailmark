# Markdown renderer for Tailwind based on Commonmark

[![Latest Version on Packagist](https://img.shields.io/packagist/v/marvinosswald/tailmark.svg?style=flat-square)](https://packagist.org/packages/marvinosswald/tailmark)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/marvinosswald/tailmark/run-tests?label=tests)](https://github.com/marvinosswald/tailmark/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/marvinosswald/tailmark/Check%20&%20fix%20styling?label=code%20style)](https://github.com/marvinosswald/tailmark/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/marvinosswald/tailmark.svg?style=flat-square)](https://packagist.org/packages/marvinosswald/tailmark)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require marvinosswald/tailmark
```

You need to include this line in your content array in your tailwind.config.js.

```js
    "./vendor/marvinosswald/tailmark/src/Renderer/**/*.php"
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="tailmark-config"
```

This is the contents of the published config file:

```php
return [
    'h' => [
        1 => "text-extrabold text-3xl"
        ...
    ]
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="tailmark-views"
```

## Usage

```php
<x-tailmark-render :markdown="'# Headline'"></x-tailmark-render>
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

- [Marvin Osswald](https://github.com/marvinosswald)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
