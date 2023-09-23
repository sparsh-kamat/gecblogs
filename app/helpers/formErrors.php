<?php if(count($errors) > 0): ?>
    <div class="msg error">
    <?php foreach ($errors as $error): ?>
        <li><?php echo $error; ?></li>
    <?php endforeach; ?>
    </div>
<?php endif; ?>

<?php if(count($success) > 0): ?>
    <div class="msg success">
    <?php foreach ($success as $success): ?>
        <li><?php echo $success; ?></li>
    <?php endforeach; ?>
    </div>
<?php endif; ?>