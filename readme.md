# Nova Package Discovery package

WE'RE DOING IT LIVE
 (on Twitch)
 
 ![Screenshot of the plugin](https://user-images.githubusercontent.com/151829/44536413-656c4880-a6ca-11e8-848c-b881b0c765ba.png)

 
 ## Installation

You can install the package in to a Laravel app that uses [Nova](https://nova.laravel.com) via composer:

```bash
composer require tightenco/nova-package-discovery
```

Next, you must register the card with Nova. This is typically done in the `cards` method of the `NovaServiceProvider`.

```php
// in app/Providers/NovaServiceProvder.php

// ...
public function cards()
{
    return [
        // ...
        new \Tightenco\NovaPackageDiscovery\NovaPackageDiscovery,
    ];
}
```
