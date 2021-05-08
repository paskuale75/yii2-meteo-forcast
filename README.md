# yii2-weather-api
read weather from external source api


This widget has 3 nodes of data.
1. Currently
1. Hourly
1. Daily

How to use it.

Just add below lines in your composer.json file

`"paskuale75/yii2-weather-forcast-widget" : "dev-master"`

Open your terminal and run command `composer install`

or

`composer require rahulswt7/yii2-weather-widget`

After installation

Initially `Currently weather`data will show.

```php
<?php 

echo paskuale75\weather\WeatherForcast::widget();

?>
```

## To show hourly weather report

```php
<?php 

echo paskuale75\weather\WeatherForcast::widget([
	'currently'	=>	false,
	'hourly'	=>	true
]);
?>
```

## To show daily weather report

```php
<?php 

echo paskuale75\weather\WeatherForcast::widget([
	'currently' =>  false,
    'hourly'    =>  false,
    'daily'     =>  true
]);

?>
```
