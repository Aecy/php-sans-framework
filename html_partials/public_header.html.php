<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="/images/logo.svg" />
    <title><?= $title ?? 'Nos produits' ?> &middot; PURE LEAF</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#244754'
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 font-sans antialiased">
<div class="mb-8 md:mb-16">
    <header class="bg-white w-full shadow">
        <div class="text-primary py-4 max-w-7xl px-8 sm:px-12 mx-auto flex justify-between items-center relative z-30">
            <div class="shrink-0 flex items-center space-x-6">
                <a href="/index.php" class="shrink-0 flex items-center">
                    <svg width="63" height="54" viewBox="0 0 63 54" class="w-12 h-12 text-primary" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M25 50.5C19.1667 51.6667 6.6 52.7 3 47.5C6.5 44.5 17.3 40.4 32.5 48C36.6667 50.8334 47.9 54.8001 59.5 48C59.5 47.3334 58.3 45.7 53.5 44.5" stroke="#245448" stroke-width="4" stroke-linecap="round"/>
                        <path d="M33 48C31.1667 40.4727 23 24.5345 5 21C5 23.4545 6.9 30.2291 14.5 37.6909" stroke="#245448" stroke-width="4" stroke-linecap="round"/>
                        <path d="M33 48C37.3333 42.5 43.4 26 33 4C31.1667 5.5 27.2 12.1 26 26.5" stroke="#245448" stroke-width="4" stroke-linecap="round"/>
                        <path d="M34 48.5C40.5 47.1667 54.8 39.8 60 21C57.8333 21 51.7 22.5 44.5 28.5" stroke="#245448" stroke-width="4" stroke-linecap="round"/>
                    </svg>
                </a>
                <div class="hidden md:flex items-center leading-none space-x-6">
                    <a href="/produit.php" class="text-xl text-gray-600 hover:text-primary">Produits</a>
                    <a href="/stock.php" class="text-xl text-gray-600 hover:text-primary">Stock</a>
                    <a href="/accessoires.php" class="text-xl text-gray-600 hover:text-primary">Accessoires</a>
                    <a href="/contact.php" class="text-xl text-gray-600 hover:text-primary">Contact</a>
                </div>
            </div>
            <div class="w-full ml-8 mr-6">
                <form action="/rechercher.php" class="w-full hidden sm:inline-block relative">
                    <span class="absolute top-0 bottom-0 left-0 flex items-center justify-center w-10">
                        <svg class="h-4 fill-current text-gray-600" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 20 20">
                            <path
                                d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"></path>
                        </svg>
                    </span>
                    <input type="search" id="query" name="query" value="" placeholder="Rechercher un produit..." class="w-full block bg-gray-100 rounded border-gray-300 shadow-sm text-black outline-none pl-8 h-12">
                </form>
            </div>
            <div class="shrink-0 flex items-center">
                <a class="flex items-center text-xl">
                    <span class="relative">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                        <span class="absolute top-0 right-0 -mt-2.5 -mr-2.5 inline leading-none flex items-center justify-center w-5 h-5 text-sm bg-white border border-primary text-primary rounded-full">
                            <span>0</span>
                        </span>
                    </span>
                    <span class="ml-5 hidden lg:inline">
                        0,00€
                    </span>
                </a>
                <button type="button" class="ml-8 md:hidden" id="hamburger_menu">
                    <svg class="h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                    </svg>
                </button>
            </div>
        </div>
        <div id="mobile_menu" class="md:hidden transition-transform shadow border-t absolute z-20 w-full px-8 py-4 flex flex-col bg-whit " style="transform: translateY(-105%)">
            <form action="/rechercher.php" class="sm:hidden w-full mb-4 relative">
                <span class="absolute top-0 bottom-0 left-0 flex items-center justify-center w-10">
                    <svg class="h-4 fill-current text-gray-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"></path>
                    </svg>
                </span>
                <input type="search" id="query" name="query" value="" placeholder="Rechercher…" class="w-full block rounded border-gray-300 bg-gray-100 shadow-sm text-coton-black focus:border-coton-beige focus:ring focus:ring-coton-beige/50 pl-8">
            </form>
            <a href="/créations.php" class="my-4 text-xl uppercase text-gray-800 hover:text-black">Créations</a>
            <a href="/stock.php" class="my-4 text-xl uppercase text-gray-800 hover:text-black">Stock</a>
            <a href="/tissuthèque.php" class="my-4 text-xl uppercase text-gray-800 hover:text-black">Tissuthèque</a>
            <a href="/contact.php" class="my-3 text-xl uppercase text-gray-800 hover:text-black">Contact</a>
        </div>
    </header>
<!--    <div class="my-4 flex justify-center">-->
<!--        <div class="text-center bg-gray-100 border text-base leading-none text-gray-800 px-3 py-2">-->
<!--            <div class="max-w-7xl -mx-1 px-8 sm:px-12">-->
<!--                En raison du grand nombre de commandes, les nouvelles commandes sont temporairement indisponibles.-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
</div>

<main class="max-w-7xl mx-auto px-2 md:px-12 relative z-10">

