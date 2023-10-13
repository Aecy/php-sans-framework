<div class="max-w-sm mb-3">
    <label for="<?= $name ?>" class="block text-sm mb-px">
        <?= $label ?>
    </label>
    <?php if (isset($image)): ?>
        <img src="/images/uploaded/<?= $image->filename ?>" alt="">
    <?php endif; ?>
    <input
        id="<?= $name ?>"
        type="file"
        name="<?= $name ?>"
        class="border focus:border-black px-3 py-1 outline-none w-full"
    >
    <?php partial('admin_form_error', ['name' => $name]) ?>
</div>
