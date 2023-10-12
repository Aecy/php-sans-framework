<?php if (get_previous_error($name)): ?>
    <p class="w-full text-red-900 text-xs">
        <?= get_previous_error($name) ?>
    </p>
<?php endif ?>
