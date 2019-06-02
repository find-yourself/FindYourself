<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'Главная';

?>

<div class="content">
    <header>
        <div class="line-grey"></div>
        <div class="line-dark">
            <h1><?= Html::encode($this->title) ?></h1>
        </div>
    </header>
    <div class="content-inside">
        <a href="/site/about-quiz/" class="start-link">Тестирование</a>
        <a href="#" class="start-link">Список профессий</a>
        <a href="#" class="start-link">Список курсов</a>
    </div>
</div>