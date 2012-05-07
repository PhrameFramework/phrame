<?php
/**
 * @var  $app  \Phrame\Core\Application
 */
?>
<div class="page-header">
    <h1><?php echo $app->lang->get('Logout'); ?></h1>
</div>

<form method="post" action="<?php echo $app->config['base_url']; ?>/logout">
    <fieldset>
        <div class="form-actions">
            <button class="btn btn-primary" type="submit"><?php echo $app->lang->get('Logout'); ?></button>
        </div>
    </fieldset>
</form>