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
        save_inputs();
        $_SESSION['previous_errors']['credentials'] = "Identifiants incorrects";
        $_SESSION['previous_inputs']['name'] = $_POST['name'];

        redirect('/admin/login.php');
    }
}

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Se connecter • PURE LEAF | Administration</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
<div class="min-w-screen min-h-screen flex justify-center items-start">
    <div class="bg-white shadow p-8 mt-12">

        <h1 class="text-lg mb-4">Se connecter</h1>

        <form method="post">
            <?php partial('admin_form_error', ['name' => 'credentials']) ?>

            <?php partial('admin_input', ['name' => 'name', 'label' => "Nom d'utilisateur"]) ?>
            <?php partial('admin_input', ['name' => 'password', 'type' => 'password', 'label' => "Mot de passe"]) ?>

            <div class="mt-8">
                <button type="submit" class="border py-1 px-2">Se connecter</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
