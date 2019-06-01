<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $data['name'];

var_dump($data);
?>

<?= Html::a('Назад', Url::to(['about-quiz']), ['class' => 'btn btn-primary'])?>


<div class="site-about">
  <h1><?= Html::encode($this->title) ?></h1>

  <?php foreach ($data['quiz'] as $datum): ?>
    <?php var_dump($datum) ?>
    <?= Html::a($datum['name'], Url::to(['quiz-item', 'id' => $datum['id']]), ['class' => 'btn btn-success'])?>

  <?php endforeach; ?>

</div>