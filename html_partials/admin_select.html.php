<div class="max-w-sm mb-3">
    <label
        for="<?= $name ?>"
        class="block text-sm mb-px"
    >
        <?= $label ?>
    </label>

    <select
        id="<?= $name ?>"
        name="<?= $name ?>"
        class="border focus:border-black px-3 py-1 outline-none w-full"
    >
        <?php foreach($options as $option): ?>
            <option value="<?= $option->id ?>" <?= $option->id === (get_previous_input($name) ?? $model->{$name} ?? '') ? 'selected' : '' ?>>
                <?= $option->{$option_key} ?>
            </option>
        <?php endforeach; ?>
    </select>

    <?php partial('admin_form_error', ['name' => $name]) ?>
</div>
