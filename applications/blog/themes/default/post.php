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
</div>