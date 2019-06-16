<?php


?>
<div class="content">
<header>
      <div class="line-grey"></div>
      <div class="line-dark">
      <h1>Ваш результат теста</h1>
      </div>
  </header>
  <div class="content-pad">
    <h3>Сфера труда</h3>
    <?php foreach ($fieldYovashi as $field): ?>
      <p><?= $field?></p>
    <?php endforeach; ?>
  </div>

  <div class="content-pad">
    <h3>Профессия</h3>
    <?php foreach ($workYovashi as $work): ?>
      <p><?= $work?></p>
    <?php endforeach; ?>
  </div>

</div>

