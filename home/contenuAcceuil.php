
    <style>
    .grid-container {
        max-width: 1200px; /* Largeur maximale du conteneur */
        margin: 2% auto 0 auto; /* Marges supérieure et inférieure de 20px, et centrage horizontal */
        padding: 0 20px; /* Rembourrage à gauche et à droite de 20px */
    }

    .grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(275px, 1fr)); /* Colonne flexible avec largeur minimale de 250px */
        gap: 35px; /* Espacement entre les éléments de la grille */
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
  
   
</style>


<p class="bg-blue-800 text-white text-center p-2">
    A reminder serves as a prompt to help individuals remember tasks, appointments, deadlines, or important
     information at specific times or in the future, ensuring they stay organized and on track in both personal
      and professional endeavors.
</p>
<div class="grid-container">
    <div class="grid">
        <?php
        // Exemple de génération dynamique avec PHP
        // Liste des images à utiliser
   
        $images = [
            "./img/img1.jpg",
            "./img/img2.jpg",
            "./img/img3.webp",
            "./img/img4.webp",
            "./img/img5.png",
            "./img/img6.png",
            "./img/img7.jpg",
            "./img/img8.webp",
            "./img/img9.png",
        ];
        $titles = [
            "Noteworthy technology acquisitions 2021",
            "Top trends in AI development",
            "Blockchain revolution in finance",
            "Future of quantum computing",
            "Latest advancements in robotics",
            "Cybersecurity threats in 2021",
            "Impact of 5G on industries",
            "Emerging technologies to watch",
            "Green technologies and sustainability"
        ];
        $descriptions = [
            "Noteworthy technology acquisitions 2021" => "Discover the most significant technology company acquisitions of 2021, highlighting strategic moves and industry impacts.",
            "Top trends in AI development" => "Explore the latest trends in artificial intelligence (AI) development, from breakthroughs in machine learning to ethical considerations.",
            "Blockchain revolution in finance" => "Learn about the transformative impact of blockchain technology on the finance industry, including decentralized finance (DeFi) and digital currencies.",
            "Future of quantum computing" => "Delve into the promising future of quantum computing, its potential applications across industries, and current advancements.",
            "Latest advancements in robotics" => "Stay updated on the recent advancements in robotics technology, including AI integration, automation, and applications in various sectors.",
            "Cybersecurity threats in 2021" => "Gain insights into the evolving landscape of cybersecurity threats in 2021, addressing vulnerabilities, data breaches, and protective measures.",
            "Impact of 5G on industries" => "Explore how the rollout of 5G technology is reshaping industries worldwide, driving innovation in connectivity and IoT applications.",
            "Emerging technologies to watch" => "Discover the emerging technologies poised to make a significant impact in the near future, from augmented reality (AR) to biotechnology.",
            "Green technologies and sustainability" => "Examine the latest developments in green technologies and their role in promoting sustainability, including renewable energy solutions and eco-friendly innovations.",
        ];

        // Boucle foreach pour générer le contenu pour chaque image
        for ($i = 0; $i < count($images); $i++) {
            ?>
        <div class="transform hover:scale-105 transition-transform duration-300 max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 grid-item">
            <a href="#">
                <img class="rounded-t-lg" src="<?php echo $images[$i]; ?>" alt="" />
            </a>
            <div class="p-5">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        <?php 
                                echo $titles[$i];
                        ?>
                        
                    </h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><?php  echo $descriptions[$titles[$i]] ;?></p>
                <div class="flex items-center space-x-2">
                        <button class="p-2 rounded-full bg-blue-700 hover:bg-blue-800 ">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 3a1 1 0 0 1 1 1v1.5a.5.5 0 0 0 .5.5H14v2.5a.5.5 0 0 0 .5.5h.5a.5.5 0 0 0 .5-.5V6h1.5a.5.5 0 0 0 .5-.5V4a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1.5a.5.5 0 0 0 .5.5H19v11a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V6h1.5a.5.5 0 0 0 .5-.5V4a1 1 0 0 1 1-1h1zM5 6v11h10V6H5z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <button class="p-2 rounded-full bg-red-500 hover:bg-red-600 ">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 3a1 1 0 0 1 1 1v9a1 1 0 0 1-2 0V4a1 1 0 0 1 1-1zM4 5a1 1 0 0 1 1-1h6a1 1 0 0 1 0 2H5a1 1 0 0 1-1-1zm12 2a1 1 0 0 1 1 1v9a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h12zM8 14a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0v-2zm4 0a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0v-2z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
            </div>
        </div>
        <?php
        }
        ?>
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



    
