<div class="max-w-sm mb-3">
    <label
        for="<?= $name ?>"
        class="block text-sm mb-px"
    >
        <?= $label ?>
    </label>

    <input
        id="<?= $name ?>"
        type="<?= $type ?? 'text' ?>"
        name="<?= $name ?>"
        class="border focus:border-black px-3 py-1 outline-none w-full"
        <?php if (isset($step)): ?>
            step="<?= $step ?>"
        <?php endif; ?>
        value="<?= get_previous_input($name) ?? $model_value ?? $model->{$name} ?? '' ?>"
    >
    <?php partial('admin_form_error', ['name' => $name]) ?>
</div>
