<?php
require __DIR__."/../partials/head.php";
require __DIR__."/../partials/nav.php";
require __DIR__."/../partials/baner.php";
?>
<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <p>
        <a href="/notes" class="text-blue-500 hover:underline mt-6 ">go back</a>
    </p>


    <li><?= $note['body'] ?></li>
    
    <form action="/note/delete/<?= $note['id'] ?>" method="post" class="inline">
      <input type="hidden" value="delete" name="_method">
      <button class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600" type="submit">Delete</button>
    </form>

    
     <a href="/edit/note/<?= $note['id'] ?>" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Edit</a>
 
  
  </div>
</main>
<?php
require __DIR__."/../partials/footer.php";