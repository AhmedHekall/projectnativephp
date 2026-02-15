<?php
require __DIR__."/../partials/head.php";
require __DIR__."/../partials/nav.php";
require __DIR__."/../partials/baner.php";
use App\Policies\Csrf;


?>


<main>
       <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

              <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
                     <h2 class="mt-5 text-center text-3xl font-bold text-gray-900">Login User</h2>


                     <div class="mt-5 sm:mx-auto sm:w-full sm:max-w-sm">
                            <form class="space-y-6" action="/login" method="POST">
                                  
                                        
                                   <div>
                                          <input type="hidden" name="_csrf"value=<?php $csrf=new Csrf;
                                          $csrf->token() ?> >
                                          <label for="email" class="block text-sm/6 font-medium text-gray-900">Email address</label>
                                          <div class="mt-2">
                                                 <input type="text"value="<?= htmlspecialchars($_POST['email'] ?? ''); ?>" name="email" id="email" autocomplete="email" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                          </div>
                                   </div>
                                   <?php if (isset($error['email'])) : ?>
                                          <p class="text-red-400 text-xl mt-5"><?= $error['email'] ?></p>
                                   <?php endif ?>


                                   <div>

                                          <div class="mt-2">
                                                 <input type="password"value="<?= htmlspecialchars($_POST['password'] ?? ''); ?>" name="password" id="password" autocomplete="current-password" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                          </div>
                                          <div class="flex items-center justify-between">
                                                 <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
                                                 <!-- <div class="text-sm mt-6">
                                                        <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot password?</a>
                                                 </div> -->
                                          </div>
                                          <?php if (isset($error['password'])) : ?>
                                                 <p class="text-red-400 text-xl mt-5"><?= $error['password'] ?></p>
                                          <?php endif; ?>
                                   </div>

                                   <div>
                                          <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                                 login</button>
                                   </div>
                            </form>


                     </div>
              </div>

       </div>
</main>
<?php
require __DIR__."/../partials/footer.php";