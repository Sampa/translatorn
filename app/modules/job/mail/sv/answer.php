<?php
$this->title = $subject;
?>
<p><?= nl2br($job->answer_text) ?></p>
<br/>
<br/>
<hr>
<p><?= Yii::$app->formatter->asDatetime($job->time, 'medium') ?> du skrev:</p>
<p>
    <?php foreach(explode("\n", $job->text) as $line) echo '> '.$line.'<br/>'; ?>
</p>