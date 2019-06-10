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
    'action' => 'result',
  ]); ?>
    <?php foreach ($newData as $key => $value): ?>
      <div id="block-<?php echo $key; ?>" data-id="<?php echo $key; ?>" class="block-questions">
        <p class="solimin-heading"></p>
        <?php foreach ($value as $val): ?>
          <div class="block-links">
            <p class="question" id="q-<?php echo $val['id']; ?>"><?php echo $val['text']; ?></p>
            <input class="radio"  id="input1-<?php echo $val['id']; ?>" type="radio" value="1" name="<?php echo $val['id']; ?>">
            <label for="input1-<?php echo $val['id']; ?>"></label>
            <input class="radio"  id="input2-<?php echo $val['id']; ?>" type="radio" value="2" name="<?php echo $val['id']; ?>">
            <label for="input2-<?php echo $val['id']; ?>"></label>
            <input class="radio"  id="input3-<?php echo $val['id']; ?>" type="radio" value="3" name="<?php echo $val['id']; ?>">
            <label for="input3-<?php echo $val['id']; ?>"></label>
            <input class="radio"  id="input4-<?php echo $val['id']; ?>" type="radio" value="4" name="<?php echo $val['id']; ?>">
            <label for="input4-<?php echo $val['id']; ?>"></label>
          </div>
        <?php endforeach; ?>
        <button class="answer-link">Далее</button>
        <button type="submit" class="result">Узнать результат</button>
      </div>
    <?php endforeach; ?>
  <?php ActiveForm::end(); ?>

</div>
