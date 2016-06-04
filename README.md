# yii2-yee-link

##Yee CMS - HTML Link Module

####Backend module for managing link redirects 

This module is part of Yee CMS (based on Yii2 Framework).

Link module lets you easily create link redirects on your site. 

Installation
------------

- Either run

```
composer require --prefer-dist yeesoft/yii2-yee-link "*"
```

or add

```
"yeesoft/yii2-yee-link": "*"
```

to the require section of your `composer.json` file.

- Run migrations

```php
yii migrate --migrationPath=@vendor/yeesoft/yii2-yee-link/migrations/
```

Configuration
------
- In your backend config file

```php
'modules'=>[
	'link' => [
		'class' => 'yeesoft\link\LinkModule',
	],
],
```

Using RedirectAction
------
RedirectAction redirects users using link settings.

To use RedirectAction, you need to declare an action of RedirectAction
type in the `actions()` method of your `SiteController`
class (or whatever controller you prefer), like the following:

```php
public function actions()
{
    return [
        'redirect' => ['class' => 'yeesoft\link\ErrorAction'],
    ];
}
```
 
After that you need to add rules:
 
```php
'rules' => [
    '<action:(redirect)>/<slug:[\w \-]+>' => 'site/redirect',
],
'nonMultilingualUrls' => [
    'redirect/index'
],
 ```
 
 Now all links like this `www.mysite.com/redirect/slug` will be redirected to link that was specified in link record.
