<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $data['name'];

?>


<div class="content">
  <header>
    <div class="line-grey"></div>
    <div class="line-dark">
      <?= Html::a('', Url::to(['about-quiz']), ['class' => 'header-link'])?>
      <h1><?= Html::encode($this->title) ?></h1>
    </div>
  </header>
  <div class="tests-inside">
    <?php foreach ($data['quiz'] as $datum): ?>
      <?= Html::a($datum['name'], Url::to(['quiz-item', 'id' => $datum['id']]), ['class' => 'tests-link'])?>

    <?php endforeach; ?>
  </div>
</div>