<?php

require_once(__DIR__ . '/../bootstrap.php');

import('products');
import('categories');
import('images');

if (empty($_GET['slug'])) {
    abort_404();
}

$product = find_product($_GET['slug']);
$category = find_category($product->category_id);
$main_image = find_image($product->main_image_id);

?>

<?php partial('public_header'); ?>

<div class="mb-16">
    <div class="mb-2">
        <nav class="mx-2 text-sm uppercase font-semibold text-gray-600 flex items-center w-full overflow-hidden space-x-2">
            <a class="hover:text-gray-800 hidden sm:inline" href="/produit.php">
                Produits au CBD
            </a>
            <svg height="8px" class="-mt-px fill-current text-gray-800 hidden sm:inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <polygon points="16.172 9 10.101 2.929 11.515 1.515 20 10 19.293 10.707 11.515 18.485 10.101 17.071 16.172 11 0 11 0 9"></polygon>
            </svg>
            <a class="hover:text-gray-800 hidden sm:inline" href="#">
                <?= $category->name ?>
            </a>
            <svg height="8px" class="-mt-px fill-current text-gray-800  hidden sm:inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <polygon points="16.172 9 10.101 2.929 11.515 1.515 20 10 19.293 10.707 11.515 18.485 10.101 17.071 16.172 11 0 11 0 9"></polygon>
            </svg>
            <a class="hover:text-gray-800" href="#">
                <?= $product->name ?>
            </a>
        </nav>
    </div>
    <div class="w-full bg-white rounded-lg shadow-lg mt-4 flex flex-col sm:flex-row">
        <div class="w-full sm:w-1/2">
            <div class="h-full square">
                <img src="images/uploaded/<?= $main_image->filename ?>" alt="">
            </div>
        </div>
        <div class="w-full sm:w-1/2">
            <div class="h-full sm:square">
                <div class="h-full">
                    <form class="h-full mb-0 px-6 lg:px-12 py-4 xl:py-6 flex flex-col justify-between" method="post">
                        <div class="flex-1 overflow-hidden flex flex-col">
                            <h1 class="text-3xl sm:text-xl md:text-2xl lg:text-3xl xl:text-4xl -mx-px">
                                <?= $product->name ?>
                            </h1>
                            <div class="overflow-hidden">
                                <p class="content text-gray-800 text-sm xl:text-base mt-1 xl:mt-0">
                                    <?= nl2br($product->description) ?>
                                </p>
                            </div>

                            <div class="mt-3 flex sm:hidden xl:flex flex-col">
                                <div class="px-1 py-3">
                                    <div class="ms-2">Quantité souhaitée :</div>
                                    <div class="-my-3 flex flex-col">
                                        <div class="my-3">
                                            <div class="-m-1 flex flex-wrap">
                                                <div class="m-1 relative">
                                                    <input type="radio" class="hidden" value="1" checked="">
                                                    <label class="border cursor-pointer px-2 py-1 block text-base sm:text-lg uppercase hover:bg-primary hover:text-white">1g</label>
                                                </div>
                                                <div class="m-1 relative">
                                                    <input type="radio" class="hidden" value="1" checked="">
                                                    <label class="border cursor-pointer px-2 py-1 block text-base sm:text-lg uppercase hover:bg-primary hover:text-white">3g</label>
                                                </div>
                                                <div class="m-1 relative">
                                                    <input type="radio" class="hidden" value="1" checked="">
                                                    <label class="border cursor-pointer px-2 py-1 block text-base sm:text-lg uppercase hover:bg-primary hover:text-white">5g</label>
                                                </div>
                                                <div class="m-1 relative">
                                                    <input type="radio" class="hidden" value="1" checked="">
                                                    <label class="border cursor-pointer px-2 py-1 block text-base sm:text-lg uppercase hover:bg-primary hover:text-white">10g</label>
                                                </div>
                                                <div class="m-1 relative">
                                                    <input type="radio" class="hidden" value="1" checked="">
                                                    <label class="border cursor-pointer px-2 py-1 block text-base sm:text-lg uppercase hover:bg-primary hover:text-white">20g</label>
                                                </div>
                                                <div class="m-1 relative">
                                                    <input type="radio" class="hidden" value="1" checked="">
                                                    <label class="border cursor-pointer px-2 py-1 block text-base sm:text-lg uppercase hover:bg-primary hover:text-white">50g</label>
                                                </div>
                                                <div class="m-1 relative">
                                                    <input type="radio" class="hidden" value="1" checked="">
                                                    <label class="border cursor-pointer px-2 py-1 block text-base sm:text-lg uppercase hover:bg-primary hover:text-white">100g</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><div class="px-1 py-3">
                                    <div class="ms-2">Prix au gramme :</div>
                                    <div class="-my-3 flex flex-col">
                                        <div class="my-3">
                                            <div class="-m-1 flex flex-wrap">
                                                <div class="m-1 relative">
                                                    <input type="radio" class="hidden" value="1" checked="">
                                                    <label class="border cursor-pointer px-2 py-1 block text-base sm:text-lg uppercase hover:bg-primary hover:text-white"><?= euros_to_string($product->price_in_cents / 100) ?>€ /g</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-end items-center mt-6 sm:mt-3 lg:mt-0">
                            <p class="flex items-baseline leading-none pl-1 sm:pl-0 mr-6">
                                <span id="product_price" class="text-4xl sm:text-3xl md:text-4xl lg:text-5xl text-gray-700 tracking-tight">
                                    <?= euros_to_string($product->price_in_cents / 100) ?>
                                </span>
                                <span class="text-3xl sm:text-xl md:text-2xl lg:text-3xl ml-px text-gray-600">€</span>
                            </p>
                            <button type="submit" class="px-3 py-2 bg-gray-100 border uppercase shadow">
                                Ajouter au panier
                            </button>

<!--                            <p class="text-xs text-gray-900 bg-orange-100 p-2">-->
<!--                                En raison du grand nombre de commandes, les nouvelles commandes sont temporairement-->
<!--                                impossibles.-->
<!--                            </p>-->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php partial('public_footer'); ?>
