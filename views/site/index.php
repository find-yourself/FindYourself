<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Приветствую!</h1>

        <p class="lead">У тебя есть возможность узнать свою профессию.</p>

        <p><?= Html::a('Виды тестов', Url::to(['about-quiz']), ['class' => 'btn btn-lg btn-success'])?></p>

    </div>


</div>
