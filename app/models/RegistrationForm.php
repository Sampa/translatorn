<?php
/**
 * Created by PhpStorm.
 * User: Happyjuiced
 * Date: 2017-05-10
 * Time: 23:56
 */

namespace app\models;


class RegistrationForm extends \dektrium\user\models\RegistrationForm
{
    /**
     * @var string
     */
    public $field;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        $rules = parent::rules();
        $rules['fieldRequired'] = ['company_id', 'required'];
        $rules['fieldLength']   = ['company_id', 'int', 'max' => 10];
        return $rules;
    }
}