<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Список видов курсов';

Url::remember();
?>

<div class="content">
  <header>
    <div class="line-grey"></div>
    <div class="line-dark">
      <h1><?= Html::encode($this->title) ?></h1>
    </div>
  </header>
  <div class="content-inside">
    <?php foreach ($data as $datum): ?>
      <?= Html::a($datum['name'], Url::to(['course', 'id' => $datum['id']]), ['class' => 'start-link'])?>
    <?php endforeach; ?>
  </div>
</div>