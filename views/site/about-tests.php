<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
Use yii\helpers\Url;

$this->title = 'Тесты';
?>

    <div class="content">
        <header>
        <div class="line-grey"></div>
        <div class="line-dark">
            <?= Html::a('', Url::to(['start']), ['class' => 'header-link'])?>
            <h1><?= Html::encode($this->title) ?></h1>
        </div>
        </header>
        <div class="about-inside">
            <?php foreach ($data as $datum): ?>

            <?= Html::a($datum['name'], Url::to(['tests', 'id' => $datum['id']]), ['class' => 'about-link']) ?>
            <?php endforeach; ?>
        </div>
    </div>

