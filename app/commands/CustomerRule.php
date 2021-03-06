<?php
namespace app\commands;

    use yii\rbac\Rule;
    use Yii;
    /**
     * Checks if authorID matches user passed via params
     */
class CustomerRule extends Rule
{
    public $name = 'isCustomer';

    /**
     * @param string|int $user the user ID.
     * @param Item $item the role or permission that this rule is associated with
     * @param array $params parameters passed to ManagerInterface::checkAccess().
     * @return bool a value indicating whether the rule permits the role or permission it is associated with.
     */
    public function execute($user, $item, $params)
    {
        return Yii::$app->user->isGuest || Yii::$app->user->can('manager') ? false : true;
    }
}