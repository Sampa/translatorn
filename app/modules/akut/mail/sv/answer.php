<?php
$this->title = $subject;
?>
<p><?= nl2br($akut->answer_text) ?></p>
<br/>
<br/>
<hr>
<p><?= Yii::$app->formatter->asDatetime($akut->time, 'medium') ?> skrev du:</p>
<p>
    <?php foreach(explode("\n", $akut->text) as $line) echo '> '.$line.'<br/>'; ?>
</p>