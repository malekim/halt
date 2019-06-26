<?php if (isset($error)): ?>
    <?= __('An error occured during halt') ?>: <?= $error ?>
<?php endif; ?>
<?php if (isset($content) && is_array($content)): ?>
    <?php foreach ($content as $var): ?>
        <pre><?php print_r($var) ?></pre>
    <?php endforeach; ?>
<?php endif; ?>