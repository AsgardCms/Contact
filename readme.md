# Contact Module

Simple module, ready to be customised to handle contact forms and pages.

Comes with a basic contact form with name/email/company/phone/message fields. Contact requests are displayed on the backend.

This also includes settings to handle address, social media links, and a google map api key.


## Installation

### Module Download

Using AsgardCMS's module download command:

``` bash
php artisan asgard:download:module asgardcms/contact --migrations --seeds
```

This will download the module, run its migrations and seed some test data.

This is the recommended way if you wish to customise the fields, views, etc.

### Composer

``` bash
composer require asgardcms/contact
php artisan module:migrate contact
```

This is if the contact module is perfect for your use-case as-is, and doesn't need any changes to fit your needs.


![](https://cldup.com/v41guA8CAg-3000x3000.png)
![](https://cldup.com/LEZjQ6BMpc-1200x1200.png)
![](https://cldup.com/uKwiCix0qX-1200x1200.png)
