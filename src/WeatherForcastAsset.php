<?php
namespace paskuale75\weather;

use yii\web\AssetBundle;

class WeatherWidgetAsset extends AssetBundle
{
    public $js = [
        'js/weatherwidget.js'
    ];

    public $css = [
         // CDN lib
        '//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css',
        'css/weatherwidget.css'
    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];

    public function init()
    {
        // Tell AssetBundle where the assets files are
        $this->sourcePath = __DIR__ . "/assets";
        parent::init();
    }
}
