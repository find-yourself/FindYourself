<?php

/** @var $data_questions array */
/** @var $data_answers array */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

$this->title = $data_questions['name'];


// var_dump($data_questions);

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


  <?php foreach ($newData as $key => $value): ?>
    <div id="block-<?php echo $key; ?>" data-id="<?php echo $key; ?>" class="block-questions">
      <?php foreach ($value as $val): ?>
        <div class="block-links">
          <p class="question" id="q-<?php echo $val['id']; ?>"><?php echo $val['text']; ?></p>
          <?php $i = 1; ?>
          <?php foreach ($data_answers as $answer): ?>
            <?php if ($answer['question_id'] == $val['id']): ?>
              <input type="radio" name="question-<?= $val['id'] ?>" value="<?= $i ?>"> <?= $answer['text'] ?><Br>
              <?php $i += 2; ?>
            <?php endif; ?>

          <?php endforeach; ?>

        </div>
      <?php endforeach; ?>
      <button class="answer-link">Далее</button>
      <button type="submit" class="result">Узнать результат</button>
    </div>
  <?php endforeach; ?>

    <?= Html::submitButton('Результат', ['class' => 'btn btn-primary']) ?>

    <?php ActiveForm::end(); ?>

</div>


