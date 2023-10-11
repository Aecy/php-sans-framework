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

<h1>Se connecter</h1>
<form method="post">

    <?php if (isset($errors['credentials'])): ?>
        <p><?= $errors['credentials'] ?></p>
    <?php endif ?>

    <p>
        <label for="name">Nom d'utilisateur</label>
        <input id="name" type="text" name="name" required autofocus>
    </p>
    <p>
        <label for="password">Mot de passe</label>
        <input id="password" type="password" name="password" required>
    </p>
    <p>
        <button type="submit">Se connecter</button>
    </p>
</form>

<?php partial("footer") ?>
