<?php

require_once __DIR__ . '/../../bootstrap.php';
redirect_unless_admin();

?>

<?php partial("header", ['title' => "Dashboard"]) ?>

<h1>Bienvenue sur le dashboard</h1>

<form method="post" action="/admin/logout.php">
    <button>Se déconnecter</button>
</form>

<?php partial("footer") ?>
