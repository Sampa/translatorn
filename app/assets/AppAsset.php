<?php
namespace app\assets;

class AppAsset extends \yii\web\AssetBundle
{
    public function init()
    {
        parent::init();
        $this->publishOptions['forceCopy'] = false;
    }
    public $sourcePath = '@app/media';
    public $css = [
        'css/styles.css',
        'css/translatorn.css'
    ];
    public $js = [
        'js/scripts.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
