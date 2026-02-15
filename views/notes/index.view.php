<?php 

require __DIR__."/../partials/head.php";
require __DIR__."/../partials/nav.php";
require __DIR__."/../partials/baner.php";
?>
<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

 
  <?php foreach($notes as $note ) : ?>
      <li>
        <a href="/note/<?= $note['id'] ?> ?>" class="text-blue-500 hover:underline">
          <?= $note['body'] ?>
        </a>
    </li>
   
        
    <?php endforeach ;?> 
     <p class="mt-6">
     
        <a href="/note/create" class="text-green-500 hover:bg-black-600 " >Add Note</a>
      

    </p>
  </div>
</main>
<?php
require __DIR__."/../partials/footer.php";
?>