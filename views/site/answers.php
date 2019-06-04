<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

//$this->title = $data['name'];

var_dump($data);
var_dump($model);
?>

<?= Html::a('Назад', Url::to(['answers', 'id' => $data['question_id']]), ['class' => 'btn btn-primary'])?>

<h1>Answers</h1>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php foreach ($data['answers'] as $datum): ?>

        <?= Html::a($datum['text'], '#', ['class' => 'btn btn-success'])?>

    <?php endforeach; ?>

</div>