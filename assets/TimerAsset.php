<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class TimerAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //'css/site.css',
    ];
    public $js = [
        '/js/angular/timer/inline.bundle.js',
        '/js/angular/timer/polyfills.bundle.js',
        '/js/angular/timer/styles.bundle.js',
        '/js/angular/timer/vendor.bundle.js',
        '/js/angular/timer/main.bundle.js',
    ];
}
