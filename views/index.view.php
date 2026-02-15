<?php 

require "partials/head.php";
require "partials/nav.php";
require "partials/baner.php";
?>
<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    
    <?php if(isset($_SESSION['user_id'])): ?>
      <p>welcome <?=$_SESSION['user_id']['name'] ?> </p>
      <?php else : ?>
    <p>Welcome Home bage</p>
    <?php endif; ?>
    
  </div>
</main>
<?php
require "partials/footer.php";
?>

 