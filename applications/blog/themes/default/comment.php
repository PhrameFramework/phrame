<?php
/**
 * @var  $app     \Phrame\Core\Application
 * @var  $this    \Blog\Forms\Comment
 * @var  $errors  array
 */
?>

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

<form method="post" action="<?php echo $app->config['base_url']; ?>/post/<?php echo $this->post_id; ?>">
    <fieldset>
        <legend><?php echo $app->lang->get('Add comment'); ?></legend>
        <div class="control-group">
            <label class="control-label" for="comment_author"><?php echo $app->lang->get('Name'); ?></label>
            <div class="controls">
                <input type="text" name="comment_author" class="input-xlarge" id="comment_author" value="<?php echo $this->comment_author; ?>" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="comment_text"><?php echo $app->lang->get('Text'); ?></label>
            <div class="controls">
                <textarea rows="3" cols="80" name="comment_text" id="comment_text" class="input-xlarge"><?php echo $this->comment_text; ?></textarea>
            </div>
        </div>
        <div class="form-actions">
            <button class="btn btn-primary" type="submit"><?php echo $app->lang->get('Send'); ?></button>
        </div>
    </fieldset>
</form>