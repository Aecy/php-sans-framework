<?php

require_once __DIR__ . '/../../bootstrap.php';
redirect_unless_admin();

?>

<?php partial("header_admin", ['title' => "Tableau de bord"]) ?>

<h1 class="text-xl mb-4">Administration</h1>

<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda autem iusto voluptatibus. Animi autem consequuntur deleniti ipsa nemo odio possimus praesentium quam repellat reprehenderit. Alias impedit ipsum nobis sed voluptate.</p>


<?php partial("footer_admin") ?>
