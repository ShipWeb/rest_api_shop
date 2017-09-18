<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/main.css',
        'css/font-awesome.min.css',
		'css/jquery.fancybox.css',
		'css/jquery.jscrollpane.css'
    ];
    public $js = [
		'js/main.js',
		'js/jquery.fancybox.pack.js',
		'js/jquery.jscrollpane.min.js',
		'js/jquery.mousewheel.js',
		'js/jquery.mousewheel.pack.js',
		'js/jquery-ui.min.js',
		'js/scroll.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
