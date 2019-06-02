<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
Use yii\helpers\Url;

$this->title = 'Виды тестов';
$this->params['breadcrumbs'][] = $this->title;

var_dump($data);
?>

<?= Html::a('Назад', Url::home(), ['class' => 'btn btn-primary'])?>

<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php foreach ($data as $datum): ?>

      <?= Html::a($datum['name'], Url::to(['tests', 'id' => $datum['id']]), ['class' => 'btn btn-success']) ?>
<!--      --><?php //var_dump($datum) ?>
      <br>
      <br>

    <?php endforeach; ?>

    <code><?= __FILE__ ?></code>
</div>
