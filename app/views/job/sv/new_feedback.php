<?php
use yii\helpers\Html;

$this->title = $subject;
?>
<p><b><?= $feedback->name ?></b> har sökt jobb!</p>
<p>Du kan läsa hela ansökan <?= Html::a('här', $link) ?>.</p>