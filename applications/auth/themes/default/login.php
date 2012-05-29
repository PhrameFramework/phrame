<?php
/**
 * @var  $app     \Phrame\Core\Application
 * @var  $this    \Auth\Forms\Login
 * @var  $errors  array
 */
?>
<div class="page-header">
    <h1><?php echo $app->lang->get('Login'); ?></h1>
</div>

<?php
if ( ! empty($errors))
{
    ?>
    <div  class="alert alert-error">
        <?php
        foreach ($errors as $error)
        {
            ?>
            <p><?php echo $error; ?></p>
            <?php
        }
        ?>
    </div>
    <?php
}
?>

<form method="post" action="<?php echo $app->config['base_url']; ?>/login" class="form-horizontal">
    <fieldset>
        <div class="control-group">
            <label class="control-label" for="username"><?php echo $app->lang->get('Username'); ?>:</label>
            <div class="controls">
                <input type="text" name="username" class="input-xlarge" id="username" value="<?php echo $this->username; ?>" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="password"><?php echo $app->lang->get('Password'); ?>:</label>
            <div class="controls">
                <input type="password" name="password" class="input-xlarge" id="password" value="" />
            </div>
        </div>
        <div class="form-actions">
            <button class="btn btn-primary" type="submit"><?php echo $app->lang->get('Login'); ?></button>
        </div>
    </fieldset>
</form>