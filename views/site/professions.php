<?php
//use yii\helpers\Url;
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
        <ul>
            <?php foreach ($data_professions as $profession): ?>
                <li><?php echo $profession['name'] ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
