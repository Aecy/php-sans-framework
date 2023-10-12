<div class="max-w-sm mb-3">
    <label
        for="<?= $name ?>"
        class="block text-sm mb-px"
    >
        <?= $label ?>
    </label>

    <textarea
        id="<?= $name ?>"
        name="<?= $name ?>"
        class="border focus:border-black px-3 py-1 outline-none w-full h-32"><?= get_previous_input($name) ??  $model->{$name} ?? '' ?></textarea>

    <?php partial('admin_form_error', ['name' => $name]) ?>
</div>
