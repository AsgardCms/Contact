[![Latest Version on Packagist](https://img.shields.io/packagist/v/asgardcms/contact.svg?style=flat-square)](https://packagist.org/packages/asgardcms/contact)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/AsgardCms/Contact/master.svg?style=flat-square)](https://travis-ci.org/AsgardCms/Contact)


# Contact Module

Simple module, ready to be customised to handle contact forms and pages.

Comes with a basic contact form with name/email/company/phone/message fields. Contact requests are displayed on the backend.

This also includes settings to handle address, social media links, and a google map api key.

The default public route is `/contact`, which will show the form for the `Flatly` theme.


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

**Note: Don't forget to give yourself the required permissions before you can view the backend entries.**


![](https://cldup.com/v41guA8CAg-3000x3000.png)
![](https://cldup.com/o-G0mAB4Ge-2000x2000.png)
![](https://cldup.com/uKwiCix0qX-1200x1200.png)
