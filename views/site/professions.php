<?php
//use yii\helpers\Url;
use yii\helpers\Html;
$this->title = 'Список профессий';
?>

<div class="content content-auto">
    <header>
        <div class="line-grey"></div>
        <div class="line-dark">
            <a href="/site/start/" class="header-link"></a>
            <h1><?= Html::encode($this->title) ?></h1>
        </div>
    </header>
        <ul class="profession">
            <?php foreach ($data_professions as $profession): ?>
                <li><?php echo $profession['name'] ?></li>
            <?php endforeach; ?>
        </ul>
</div>
