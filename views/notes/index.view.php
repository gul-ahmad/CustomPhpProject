     <?php require base_path('views/partials/head.php'); ?>
     <?php require base_path('views/partials/nav.php'); ?>
     <?php require base_path('views/partials/banner.php'); ?>

     <main>
         <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
             <?php

                foreach ($posts as $post) :  ?>

                 <li>
                     <a href="/note?id=<?= $post['id'] ?>" class="text-blue-500 hover:underline"><?= htmlspecialchars($post['body'])  ?></a>
                 </li>

             <?php endforeach; ?>

             <p class="mt-10"><a href="/note/create">Create a Post</a></p>

         </div>
     </main>
     <?php require base_path('views/partials/footer.php'); ?>