# Nova Package Discovery package

WE'RE DOING IT LIVE
 (on Twitch)
 
<img width="474" alt="image" src="https://user-images.githubusercontent.com/151829/44622253-14538480-a883-11e8-896c-55b08a5c1280.png">

 
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
