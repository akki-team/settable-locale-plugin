# AkkiSyliusSettableLocaleContextPlugin

## Overview

This plugin allows you to set the locale context directly, with a ```localeCode``` thanks to the
```SettableLocaleContextInterface```.

Very useful in your ```symfony/command``` and ```symfony/messenger``` where locale context cannot be determined because there is
no request.

[See the methods available for the SettableLocaleContextInterface.](src/Context/SettableLocaleContextInterface.php)

## Installation

1. Install the plugin to your project with the following command:

```bash
$ composer require akki-team/sylius-settable-locale-plugin
```

2. After the installation, check that the plugin is correctly declared in your project in the file `config/bundles.php`.

```php

 return [
    ...
    Akki\SyliusSettableLocalePlugin\AkkiSyliusSettableLocalePlugin::class => ['all' => true],
];
 ```

3. You can now inject the SettableChannelContextInterface in your services and set the channel context directly.

```php
$this->settableLocaleContext->setLocaleCode($localeCode);
```
