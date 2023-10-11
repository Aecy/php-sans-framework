<?php

require_once __DIR__ . '/../../bootstrap.php';

if ($_SESSION['admin'] ?? false) {
    redirect('/admin/dashboard.php');
}

if (is_post()) {
    $query = pdo()->prepare("SELECT * FROM admins WHERE name = ?");
    $query->execute([$_POST['name']]);

    $admin = $query->fetch();

    if ($admin and password_verify($_POST['password'], $admin['password'])) {
        $_SESSION['admin'] = $admin;
        redirect('/admin/dashboard.php');
    } else {
        $errors['credentials'] = "Identifiants incorrects.";
    }
}

?>

<?php partial("header", ['title' => "Se connecter"]) ?>

<div class="min-w-screen min-h-screen flex justify-center items-start bg-gray-100">
    <div class="bg-white shadow p-8 mt-12">

        <h1 class="text-lg mb-4">Se connecter</h1>

        <form method="post">
            <?php if (isset($errors['credentials'])): ?>
                <p class="border border-red-900 w-full bg-red-100 text-red-900 text-xs mb-4 px-3 py-1">
                    <?= $errors['credentials'] ?>
                </p>
            <?php endif ?>

            <div class="mb-4">
                <label for="name" class="block text-sm mb-px">Nom d'utilisateur</label>
                <input id="name" type="text" name="name" class="border focus:border-black px-3 py-1 outline-none w-full" required autofocus>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm mb-px">Mot de passe</label>
                <input id="password" type="password" name="password" class="border focus:border-black px-3 py-1 outline-none w-full" required>
            </div>

            <div class="mt-8">
                <button type="submit" class="border py-1 px-2">Se connecter</button>
            </div>
        </form>
    </div>
</div>

<?php partial("footer") ?>
