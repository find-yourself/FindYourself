<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

$this->title = $data['name'];

?>

<?= Html::a('Назад', Url::to(['tests', 'id' => $data['type_id']]), ['class' => 'btn btn-primary'])?>

<div class="site-about">
  <h1><?= Html::encode($this->title) ?></h1>
<!--  --><?php //$form = ActiveForm::begin([
//      //'id' => 'quiz-form',
//      'layout' => 'horizontal',
//      'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
//      'labelOptions' => ['class' => 'col-lg-1 control-label'],
//
//  ]) ?>


  <?php foreach ($data['questions'] as $datum): ?>

  <?php endforeach; ?>

    <?= Html::a('отправить',
        ['/solomin/'], [
            'data-method' => 'POST',
            'data-params' => [
                'tendency' => [
                    'human' => 10,
                    'technique' => 3,
                    'signSystem' => 5,
                    'artImage' => 13,
                    'nature' => 4,
                    'performer' => 8,
                    'creativity' => 12,

                ],
                'ability' => [
                     [
                        'human' => 10,
                        'technique' => 3,
                        'signSystem' => 5,
                        'artImage' => 13,
                        'nature' => 4,
                        'performer' => 8,
                        'creativity' => 12,

                    ],
                ],
            ],
        ]) ?>
</div>