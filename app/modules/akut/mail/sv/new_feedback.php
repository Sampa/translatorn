<?php
use yii\helpers\Html;

$this->title = $subject;
?>
<p><b><?= $akut->name ?></b> har lämnat en förfrågan.</p>
<p>Du kan se den <?= Html::a('här', $link) ?>.</p>