<div class="page-header">
    <h1><?php echo $this->lang->get('Blog'); ?></h1>
</div>

<div>
    <h2><?php echo $post->post_title; ?></h2>
    <span class="label label-info"><?php echo date('d.m.Y H:i', strtotime($post->post_date)); ?></span>
    <div>
        <?php echo $post->post_intro; ?>
        <br />
        <?php echo $post->post_text; ?>
    </div>
    <hr />
    <h3><?php echo $this->lang->get('Comments'); ?></h3>
    <?php
    foreach ($post->comments as $comment)
    {
        ?>
        <div>
            <h4><?php echo $comment->comment_author; ?></h4>
            <span class="label label-info"><?php echo date('d.m.Y H:i', strtotime($comment->comment_date)); ?></span>
            <div>
                <?php echo $comment->comment_text; ?>
            </div>
        </div>
        <?php
    }
    ?>
    <form method="post" action="<?php echo $this->application->config->base_url; ?>/post/comment" class="well">
        <fieldset>
            <legend><?php echo $this->lang->get('Add comment'); ?></legend>
            <div class="control-group">
                <div class="controls">
                    <input type="hidden" name="post_id" value="<?php echo $post->id; ?>" />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="comment_author"><?php echo $this->lang->get('Name'); ?></label>
                <div class="controls">
                    <input type="text" class="input-xlarge" id="comment_author" />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="comment_text"><?php echo $this->lang->get('Text'); ?></label>
                <div class="controls">
                    <textarea rows="3" id="comment_text" class="input-xlarge"></textarea>
                </div>
            </div>
            <div class="form-actions">
                <button class="btn btn-primary" type="submit"><?php echo $this->lang->get('Send'); ?></button>
            </div>
        </fieldset>
    </form>
</div>