<?php


?>

<h1>Ваш результат теста</h1>

<h3>Сфера труда</h3>
<?php foreach ($fieldYovashi as $field): ?>
<p><?= $field?></p>
<?php endforeach; ?>

<h3>Профессия</h3>
<?php foreach ($workYovashi as $work): ?>
  <p><?= $work?></p>
<?php endforeach; ?>