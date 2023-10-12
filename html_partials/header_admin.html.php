<?php partial("header", ['title' => "$title - Administration"]) ?>

<div class="flex max-w-5xl w-full mx-auto mt-8 p-4">
    <nav class="mr-6 w-48 flex-shrink-0 py-8">
        <div class="flex flex-col -my-2">
            <a class="w-full my-2 py-2 px-3 text-gray-800 hover:text-black hover:bg-gray-300 transition-all <?= is_on_page('/admin/dashboard.php') ? 'bg-gray-300' : '' ?>"
               href="/admin/dashboard.php">
                Tableau de bord
            </a>
            <a class="w-full my-2 py-2 px-3 text-gray-800 hover:text-black hover:bg-gray-300 transition-all <?= is_on_directory('/admin/products') ? 'bg-gray-300' : '' ?>"
               href="/admin/products/index.php">
                Produits
            </a>
            <form class="w-full my-2 py-2 px-3 text-gray-800 hover:text-black hover:bg-gray-300 transition-all"
                  method="post" action="/admin/logout.php">
                <button>Se déconnecter</button>
            </form>
        </div>
    </nav>
    <main class="bg-white shadow p-8 w-full relative">
        <?php if ($flash = get_flash()): ?>
            <div class="absolute right-0" role="alert">
                <p class="-mt-12 -mr-3 px-6 py-3 max-w-sm shadow <?= $flash['type'] === 'success' ? 'bg-green-100 text-green-900' : '' ?>">
                    <?= $flash['message'] ?>
                </p>
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    const alert = document.querySelector('[role="alert"]');

                    setTimeout(() => {
                        alert.style.display = 'none';
                    }, 5000);
                })
            </script>
        <?php endif ?>
