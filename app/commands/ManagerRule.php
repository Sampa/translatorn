<?php
namespace app\commands;

    use yii\rbac\Rule;
    use yii;
    /**
     * Checks if authorID matches user passed via params
     */
class ManagerRule extends Rule
{
    public $name = 'isManager';

    /**
     * @param string|int $user the user ID.
     * @param Item $item the role or permission that this rule is associated with
     * @param array $params parameters passed to ManagerInterface::checkAccess().
     * @return bool a value indicating whether the rule permits the role or permission it is associated with.
     */
    public function execute($user, $item, $params)
    {
        if(!Yii::$app->user->isGuest)
            return Yii::$app->user->identity->id === 2 || Yii::$app->user->identity->username === 'root';
        return false;
    }
}