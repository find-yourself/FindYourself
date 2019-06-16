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
    <a href="/site/start/" class="header-link"></a>
      <h1><?= Html::encode($this->title) ?></h1>
    </div>
  </header>
  <div class="content-course">
    <div class="img">
    <img src="/img/man.png" alt="">
    </div>
    <?php foreach ($data as $datum): ?>
      <?= Html::a($datum['name'], Url::to(['course', 'id' => $datum['id']]), ['class' => 'start-link-course'])?>
    <?php endforeach; ?>
  </div>
</div>