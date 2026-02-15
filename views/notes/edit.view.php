<?php
require __DIR__."/../partials/head.php";
require __DIR__."/../partials/nav.php";
require __DIR__."/../partials/baner.php";
?>
<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    

   <form method="post" action="/update/note" >
  <div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
      

      

        <div class="col-span-full">
          <label for="aditnote" class="block text-sm/6 font-medium text-gray-900">Edit note</label>
          <div class="mt-2">
              <?php if (isset($note['body'])):?>
                <input type='hidden' name="id" value="<?=$note['id']  ?>">
                <textarea id="aditnote" name="body" rows="3" placeholder="Here's an idea for a note...." class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"><?= isset($note['body']) ?  $note['body'] : "" ;  ?></textarea>
                </textarea>
           
             
          <?php endif; ?> 
          </div>
          <p class="mt-3 text-sm/6 text-gray-600">Edit this note</p>
        </div>
           <button type="submit" class="rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-xs inset-ring inset-ring-gray-300 hover:bg-gray-50">update</button>
          </div>
        </div>

</form> 

   
 
  
  </div>
</main>
<?php
require __DIR__."/../partials/footer.php";