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
  <?php foreach ($resultTest as $value): ?>
<p><?= $value?></p>
<?php endforeach; ?>
  </div>  

</div>

