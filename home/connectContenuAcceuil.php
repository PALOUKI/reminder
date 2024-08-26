
<style>
    .grid-container {
        max-width: 1200px; /* Largeur maximale du conteneur */
        margin: 1.5% auto 0 auto; /*Marges supérieure de 5%, centrage horizontal
        padding: 0 20px; /* Rembourrage à gauche et à droite de 20px */
    }

    .grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(275px, 1fr)); /* Colonnes flexibles avec largeur minimale de 275px */
        gap: 35px; /* Espacement entre les éléments de la grille */
        word-wrap: break-word;
        overflow: hidden; /* Masquer le contenu qui dépasse */
        text-overflow: ellipsis; /* Ajouter des points de suspension si le texte dépasse */
    }

    .grid-item {
        opacity: 0;
        transition: opacity 3.5s ease-in-out;
    }
    .grid-item img {
    max-height: 250px; /* Limiter la hauteur de l'image */
    width: 100%;
    object-fit: cover; /* Couvrir le conteneur tout en gardant les proportions */
}
.grid-item.loaded {
    opacity: 1;
}
.span{
    text-align:center;
}
</style>
<!-- s'il n'y a pas de reminders -->
<?php if(empty($reminders)): ?>
    <h1 class="mt-10 text-center font-bold text-gray-300 text-6xl">You have not recorded any event.<br>Clic on add a reminder to add your event !</h1>
<?php else: ?>

<div class="grid-container">
    <div class="grid">
    <?php foreach($images as $index => $image): ?>
    <div class="transform hover:rounded-lg  hover:scale-105 transition-transform duration-300 max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 grid-item">
        <a href="#">
            <img class="rounded-t-lg" src="<?php echo "uploads/".htmlspecialchars($image['image']); ?>" alt="" />
        </a>
        <div class="p-5">
            <?php if (isset($reminders[$index])): ?>
  
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        <?php echo $reminders[$index]['title']; ?>
                    </h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><?php echo $reminders[$index]['event']; ?></p>
                <div>
                    <p class="text-white"><span class="ml-5"><?php echo "Importance: "."<span class=\"text-teal-500\">".$reminders[$index]['importance']."</span>";  ?></span></p>
                    <p class="text-white"><span class="ml-5"><?php echo "date: ".$reminders[$index]['date'];  ?></span></p>
                    <p class="text-orange-500 font-bold text-xl text-right pr-6 mb-4"><?php echo $reminders[$index]['statut'];  ?></p>
                </div>
                <div class="flex items-center space-x-2">
                    <!-- EditReminder -->
                    <button class="p-2 rounded-full bg-blue-700 hover:bg-blue-800" >
                        <a href="update/editReminder.php?id=<?php echo htmlspecialchars($reminders[$index]['reminder_id']);?>&image_id=<?php echo htmlspecialchars($images[$index]['image_id']); ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 3a1 1 0 0 1 1 1v1.5a.5.5 0 0 0 .5.5H14v2.5a.5.5 0 0 0 .5.5h.5a.5.5 0 0 0 .5-.5V6h1.5a.5.5 0 0 0 .5-.5V4a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1.5a.5.5 0 0 0 .5.5H19v11a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V6h1.5a.5.5 0 0 0 .5-.5V4a1 1 0 0 1 1-1h1zM5 6v11h10V6H5z" clip-rule="evenodd" />
                            </svg>
                        </a>
                   <!-- DeleteReminder -->
                    </button>
                    <button class="p-2 rounded-full bg-red-500 hover:bg-red-600">
                        <a href="delete/deleteReminder.php?id=<?php echo htmlspecialchars($reminders[$index]['reminder_id']);?>&image_id=<?php echo htmlspecialchars($images[$index]['image_id']); ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 3a1 1 0 0 1 1 1v9a1 1 0 0 1-2 0V4a1 1 0 0 1 1-1zM4 5a1 1 0 0 1 1-1h6a1 1 0 0 1 0 2H5a1 1 0 0 1-1-1zm12 2a1 1 0 0 1 1 1v9a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h12zM8 14a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0v-2zm4 0a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0v-2z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    
                    </button>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php endforeach; ?>
<?php endif; ?>
    </div>
</div>

<script>
    // JavaScript pour ajouter une classe 'loaded' aux éléments après le chargement de la page
    document.addEventListener('DOMContentLoaded', function() {
        let gridItems = document.querySelectorAll('.grid-item');
        gridItems.forEach(function(item) {
            item.classList.add('loaded');
        });
    });
</script>
