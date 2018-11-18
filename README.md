# Login Helper For Ivers

This package enables to authenticating users with ivers authenticating site

## Installation

Login to Ivers Authenticating site and create a app. Put your site url as the site link.

### Install this package
```
composer require kankanamge/iversauth
```

### Add IversAuth service provider.

```
# config/app.php

return [
    'providers'=>[
        \Kankanamge\IversAuth\AuthServiceProvider::class
    ]
]
```

### Replace default authenticating middleware with IversAuth
```
# app\Http\Kernel.php

protected $routeMiddleware = [
    'auth' => \Kankanamge\IversAuth\AuthenticateMiddleware::class,
];

```

### Publish vendor files
```
php artisan vendor:publish
```

### Change config

Change configuration variables in `config\ivers_auth.php` by following guide lines in comments.

Note:- Do not put any route to `/login` URL.

## Thats it all! Enjoy!
