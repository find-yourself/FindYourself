<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

$this->title = $data['name'];


?>

<?= Html::a('Назад', Url::to(['tests', 'id' => $data['type_id']]), ['class' => 'btn btn-primary'])?>

<div class="site-about">
  <h1><?= Html::encode($this->title) ?></h1>
  <?php $form = ActiveForm::begin([
      'id' => 'quiz-form',
      'layout' => 'horizontal',
      'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
      'labelOptions' => ['class' => 'col-lg-1 control-label'],

  ]) ?>


  <?php foreach ($data['questions'] as $datum): ?>

    <?= '<p>'.$datum['text'].'</p>'?>
    <?= $form->field() ?>

  <?php endforeach; ?>


</div>