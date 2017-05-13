<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Orders]].
 *
 * @see Orders
 */
class OrdersQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    public function users($id=null)
    {
        if(is_null($id))
            $id = \Yii::$app->user->id;
//        $this->orderBy(['date', SORT_ASC]);
        return $this->andWhere(['user_id' => $id])->andFilterWhere(['like','date',date('m')]);
    }

//    public function max($int){
//        return $this->limit($int);
//    }
    /**
     * @inheritdoc
     * @return Orders[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Orders|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
