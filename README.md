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
