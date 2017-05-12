<?php
/**
 * Created by PhpStorm.
 * User: Happyjuiced
 * Date: 2017-04-16
 * Time: 16:25
 * Static functions available in twig templates by there name eg: {{ t('Welcome') }}
 */

namespace app\helpers;

use Yii;
use yii\base\Object;

class My extends Object
{
    /**
     * @param $string to be translated
     * @param app $category category where translation exists defaults to "app"
     * @return string translated string
     */
    public static function t($string,$category="app")
    {
        return Yii::t($category,$string);
    }

    /**
     * @param $string key in the common\config\params.php array
     * @return mixed the param value
     */
    public static function param($string)
    {
        return Yii::$app->params[$string];
    }

    /**
     *
     */
    public static function user(){
        return Yii::$app->user();
    }


}