<?php

require_once(__DIR__ . '/../bootstrap.php');

?>

<?php partial('public_header', ['title' => "Page d'accueil"]); ?>

<div>
    <div class="mb-12">
        <div class="flex items-center justify-center">
            <picture>
                <img src="images/logo.svg" class="h-64 w-64" alt="">
            </picture>
        </div>
        <div class="mx-auto max-w-[60%] text-center">
            <div class="text-2xl mb-6">Bienvenue sur PURE LEAF,</div>
            <div class="space-y-4">
                <p>Contrairement au THC, le CBD est un composant totalement légal et non psychotrope qui, Il agit principalement sur le système nerveux périphérique et le système immunitaire, Il ne provoque pas de vertiges. Ce pourquoi l'intérêt pour le CDB a augmenté ces dernières années.
                </p>
                <p>
                    Le cannabidiol ou CBD est l’un des 144 cannabinoïdes identifiés à ce jour dans la plante de cannabis. Le cannabinoïde est le plus représenté dans la plante de cannabis ordinaire et peut être trouvé dans les pics ou trichomes de toutes les variétés de cannabis.
                </p>
            </div>
        </div>
    </div>
    <div class="text-xs ms-4 mb-2 uppercase">Nos produits</div>
    <div class="space-y-8">
        <a class="aspect-[21/9] w-full flex items-start justify-center overflow-hidden bg-white shadow relative"
           href="/créations/t_accueillir_dans_ce_monde.php">
            <div class="absolute p-0 w-full h-full">
                <div class="relative w-full h-full border-0 rounded-lg flex items-center">
                    <div class="top-0 bg-white/50 px-4 py-4 absolute text-2xl w-full">
                        Nos fleurs à la CBD
                    </div>
                </div>
            </div>
            <img class="object-cover h-full w-full" src="https://cbd-dundees.com/wp-content/uploads/2020/11/Les-fleurs-de-CBD-quel-interet-therapeutique.jpg" srcset="" alt="">
        </a>
        <div class="flex flex-col md:flex-row md:space-x-8 space-y-8 md:space-y-0">
            <a class="aspect-[21/9]  w-full flex items-start justify-center overflow-hidden bg-white shadow relative"
               href="/créations/parce_que_tu_grandis.php">
                <div class="absolute p-0 w-full h-full">
                    <div class="relative w-full h-full border-0 rounded-lg flex items-center">
                        <div class="top-0 bg-white/50 px-4 py-4 absolute text-2xl w-full">
                            Nos résines de CBD
                        </div>
                    </div>
                </div>
                <img class="object-cover h-full w-full" src="https://www.highsociety.fr/c/16-category_default/resines-pollens-cbd.jpg" srcset="" alt="">
            </a>
            <a class="aspect-[21/9] w-full flex items-start justify-center overflow-hidden bg-white shadow relative"
               href="/créations/pour_les_plus_grands.php">
                <div class="absolute p-0 w-full h-full">
                    <div class="relative w-full h-full border-0 rounded-lg flex items-center">
                        <div class="top-0 bg-white/50 px-4 py-4 absolute text-2xl w-full">
                            Nos huiles de CBD
                        </div>
                    </div>
                </div>
                <img class="object-cover h-full w-full" src="https://img.passeportsante.net/1200x675/2021-04-24/i101683-.webp" srcset="" alt="">
            </a>
        </div>
        <div class="flex flex-col md:flex-row md:space-x-8 space-y-8 md:space-y-0">
            <a class="aspect-[21/6] w-full flex items-start justify-center overflow-hidden bg-white shadow relative"
               href="/créations/parce_que_tu_grandis.php">
                <div class="absolute p-0 w-full h-full">
                    <div class="relative w-full h-full border-0 rounded-lg flex items-center">
                        <div class="top-0 bg-white/50 px-4 py-4 absolute text-2xl w-full">
                            Nos accessoires de fumette
                        </div>
                    </div>
                </div>
                <img class="object-cover h-full w-full" src="https://rcbdstore.com/wp-content/uploads/2023/01/accessoires-cbd-categorie.jpg" srcset="" alt="">
            </a>
        </div>
    </div>
</div>

<?php partial('public_footer'); ?>
