<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $data['name'];
?>

<div class="content">
  <header>
    <div class="line-grey"></div>
    <div class="line-dark">
      <?= Html::a('', Url::previous(), ['class' => 'header-link'])?>
      <h1><?= Html::encode($this->title) ?></h1>
    </div>
  </header>
  <div class="content-inside">
    <?php foreach ($data['course'] as $datum): ?>
      <?= Html::a($datum['name'], Url::to(['#', 'id' => $datum['id']]), ['class' => 'start-link'])?>
    <?php endforeach; ?>
  </div>
</div>