<?php

/** @var $data_questions array */
/** @var $data_answers array */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

$this->title = $data_questions['name'];


// var_dump($data_questions);
// var_dump($data_answers);

?>

<div class="content">
  <header>
      <div class="line-grey"></div>
      <div class="line-dark">
      <?= Html::a('', Url::to(['quiz', 'id' => $data_questions['type_id']]), ['class' => 'header-link'])?>
          <h1><?= Html::encode($this->title) ?></h1>
      </div>
  </header>
  <?php $form = ActiveForm::begin([
      'action' => 'result'
    ]) ?>
  
    <?php foreach ($data_questions['questions'] as $datum): ?>
  
    <h3><?= $datum['id'] ?>: <span><?= $datum['text'] ?></span></h3>
  
      <?php foreach ($data_answers as $answer): ?>
        <?php if ($answer['question_id'] == $datum['id']): ?>
            <input type="radio" name="question-<?= $datum['id'] ?>" value="<?= $answer['id'] ?>"> <?= $answer['text'] ?><Br>
        <?php endif; ?>
      <?php endforeach; ?>
  
    <?php endforeach; ?>
  
    <?= Html::submitButton('Результат', ['class' => 'btn btn-primary']) ?>
  
    <?php ActiveForm::end(); ?>

</div>
