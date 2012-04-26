<?php
/**
 * @var  $app  \Phrame\Core\Application
 */
?>
<div class="page-header">
    <h1><?php echo $app->lang->get('Blog'); ?></h1>
</div>

<div class="post">
    <h2><?php echo $post->post_title; ?></h2>
    <span class="label label-info"><?php echo date('d.m.Y H:i', strtotime($post->post_date)); ?></span>
    <div>
        <?php echo $post->post_intro; ?>
        <br />
        <?php echo $post->post_text; ?>
    </div>
    <hr />
    <h3><?php echo $app->lang->get('Comments'); ?></h3>
    <?php
    foreach ($post->comments as $comment)
    {
        ?>
        <div class="comment">
            <h4><?php echo $comment->comment_author; ?></h4>
            <span class="label label-info"><?php echo date('d.m.Y H:i', strtotime($comment->comment_date)); ?></span>
            <div>
                <?php echo $comment->comment_text; ?>
            </div>
        </div>
        <?php
    }
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

    <form method="post" action="<?php echo $app->config['base_url']; ?>/post/<?php echo $post->id; ?>">
        <fieldset>
            <legend><?php echo $app->lang->get('Add comment'); ?></legend>
            <div class="control-group">
                <label class="control-label" for="comment_author"><?php echo $app->lang->get('Name'); ?></label>
                <div class="controls">
                    <input type="text" name="comment_author" class="input-xlarge" id="comment_author" value="<?php echo $comment_author; ?>" />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="comment_text"><?php echo $app->lang->get('Text'); ?></label>
                <div class="controls">
                    <textarea rows="3" cols="80" name="comment_text" id="comment_text" class="input-xlarge"><?php echo $comment_text; ?></textarea>
                </div>
            </div>
            <div class="form-actions">
                <button class="btn btn-primary" type="submit"><?php echo $app->lang->get('Send'); ?></button>
            </div>
        </fieldset>
    </form>
</div>