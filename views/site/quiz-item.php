<?php

/** @var $data_questions array */
/** @var $data_answers array */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

$this->title = $data_questions['name'];

?>

<div class="content content-auto">
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
    <div id="block-yvashi-<?php echo $key; ?>" data-id="<?php echo $key; ?>" class="block-questions-yvashi">
      <?php foreach ($value as $val): ?>
        <div class="block-links-yvashi">
          <p class="question-yvashi" id="q-<?php echo $val['id']; ?>"><?php echo $val['text']; ?></p>
          <?php $i = 1; ?>
          <?php foreach ($data_answers as $answer): ?>
            <?php if ($answer['question_id'] == $val['id']): ?>
              <input class="radio radio-yvashi" id="input-<?= $val['id'] . $i ?>" type="radio" name="<?= $val['id'] ?>" value="<?= $answer['id'] ?>">
              <label for="input-<?= $val['id'] . $i ?>"></label>
              <p class="answer-yvashi"><?= $answer['text'] ?></p>
              
              <?php $i += 2; ?>
            <?php endif; ?>

          <?php endforeach; ?>

        </div>
      <?php endforeach; ?>
      <button class="answer-yvashi-link">Далее</button>
      <button type="submit" class="result-yvashi">Узнать результат</button>
    </div>
  <?php endforeach; ?>

    <?= Html::submitButton('Результат', ['class' => 'btn btn-primary']) ?>

    <?php ActiveForm::end(); ?>

</div>


