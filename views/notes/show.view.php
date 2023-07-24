     <?php require base_path('views/partials/head.php'); ?>
     <?php require base_path('views/partials/nav.php'); ?>
     <?php require base_path('views/partials/banner.php'); ?>

     <main>
         <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
             <p><?= htmlspecialchars($post['body'])  ?></p>


             <form class="mt-8" method="POST">


                 <input type="hidden" id="_method" name="_method" value="DELETE" />
                 <input type="hidden" id="id" name="id" value="<?= $post['id'] ?>" />
                 <button class="text-red-500 text-sm">DELETE</button>
             </form>

         </div>
     </main>
     <?php require base_path('views/partials/footer.php'); ?>