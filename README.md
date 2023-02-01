

# Quiz Manager for Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/shahriared/quiz-manager.svg?style=flat-square)](https://packagist.org/packages/shahriared/quiz-mamanger)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/shahriared/quiz-mamanger/run-tests?label=tests)](https://github.com/shahriared/quiz-mamanger/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/shahriared/quiz-mamanger/Fix%20PHP%20code%20style%20issues?label=code%20style)](https://github.com/shahriared/quiz-mamanger/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/shahriared/quiz-mamanger.svg?style=flat-square)](https://packagist.org/packages/shahriared/quiz-mamanger)

Laravel Package for Quiz Manager.

## Installation

You can install the package via composer:

```bash
composer require shahriared/quiz-manager
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="quiz-manager-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="quiz-manager-config"
```

This is the contents of the published config file:

```php
return [
];
```

<!-- ## Usage

```php
$QuizManager = new Shahriared\QuizManager();
echo $QuizManager->echoPhrase('Hello, Shahriared!');
``` -->

<!-- ## Testing

```bash
composer test
``` -->

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Mohammad Sadegh Maleki](https://github.com/shahriared)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
