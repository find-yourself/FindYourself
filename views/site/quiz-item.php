<?php

/** @var $data_questions array */
/** @var $data_answers array */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

$this->title = $data_questions['name'];




?>

<!-- var_dump($data_questions); -->
?>

<!-- <?= Html::a('Назад', Url::to(['quiz', 'id' => $data_questions['type_id']]), ['class' => 'btn btn-primary'])?>

<div class="site-about">
  <h1><?= Html::encode($this->title) ?></h1>



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

  <?php ActiveForm::end(); ?> -->


<div class="content">
      <header>
        <div class="line-grey"></div>
        <div class="line-dark">
            <?= Html::a('', Url::to(['quiz', $data_questions['type_id']]), ['class' => 'header-link'])?>
            <h1><?= Html::encode($this->title) ?></h1>
        </div>
        </header>
    <?php foreach ($newData as $key => $value): ?>
    <div id="block-<?php echo $key; ?>" data-id="<?php echo $key; ?>" class="block-questions">
      <?php foreach ($value as $val): ?>
      <div class="block-links">
          <p class="question" id="q-<?php echo $val['id']; ?>"><?php echo $val['text']; ?></p>
                  <input class="radio"  id="input1-<?php echo $val['id']; ?>" type="radio" value="1" name="<?php echo $val['text']; ?>">
                  <label for="input1-<?php echo $val['id']; ?>"></label>
                  <input class="radio"  id="input2-<?php echo $val['id']; ?>" type="radio" value="2" name="<?php echo $val['text']; ?>">
                  <label for="input2-<?php echo $val['id']; ?>"></label>
                  <input class="radio"  id="input3-<?php echo $val['id']; ?>" type="radio" value="3" name="<?php echo $val['text']; ?>">
                  <label for="input3-<?php echo $val['id']; ?>"></label>
                  <input class="radio"  id="input4-<?php echo $val['id']; ?>" type="radio" value="4" name="<?php echo $val['text']; ?>">
                  <label for="input4-<?php echo $val['id']; ?>"></label>
        </div>
        <?php endforeach; ?>
        <button class="answer-link">Далее</button>
        <button class="result">Узнать результат</button>
    </div>
    <?php endforeach; ?>
</div>
