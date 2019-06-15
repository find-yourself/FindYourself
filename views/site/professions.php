<?php

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'Профессии';

?>

<div class="content">
    <header>
        <div class="line-grey"></div>
        <div class="line-dark">
            <h1><?= Html::encode($this->title) ?></h1>
        </div>
    </header>
    <div class="content-inside">
        <?php var_dump($professions); ?>
    </div>
</div>

