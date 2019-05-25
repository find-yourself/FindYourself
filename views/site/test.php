<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

$this->title = $data['name'];

var_dump($data);
?>

<?= Html::a('Назад', Url::to(['tests', 'id' => $data['type_id']]), ['class' => 'btn btn-primary'])?>

<div class="site-about">
  <h1><?= Html::encode($this->title) ?></h1>

  <?php foreach ($data['questions'] as $datum): ?>

    <?= Html::a($datum['text'], '#', ['class' => 'btn btn-success'])?>

  <?php endforeach; ?>

<!--  --><?php //$form = ActiveForm::begin() ?>
<!---->
<!--  --><?//= $form->field($model, 'text[]')->radioList( ArrayHelper::map($questions, 'id', 'text') ); ?>
<!---->
<!--  --><?php //ActiveForm::end(); ?>

</div>