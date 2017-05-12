<?php
namespace app\modules\sida;

use Yii;

class SidaModule extends \yii\easyii\components\Module
{
    public static $installConfig = [
        'title' => [
            'en' => 'Pages',
            'sv' => 'Sidor',
        ],
        'icon' => 'file',
        'order_num' => 50,
    ];
}