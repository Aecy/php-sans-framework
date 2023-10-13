<?php

require_once __DIR__ . '/../../bootstrap.php';
redirect_unless_admin();

?>

<?php partial("admin_header", ['title' => "Tableau de bord"]) ?>

<h1 class="text-xl mb-4">Administration</h1>

<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda autem iusto voluptatibus. Animi autem consequuntur deleniti ipsa nemo odio possimus praesentium quam repellat reprehenderit. Alias impedit ipsum nobis sed voluptate.</p>

<p>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam architecto, aspernatur corporis cumque enim eos error et facilis fugiat maiores necessitatibus, odit quo rem sequi voluptatibus! Amet earum omnis quibusdam.
</p>


<?php partial("admin_footer") ?>
