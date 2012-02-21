<div>
    <h2><?php echo $post->post_title; ?></h2>
    <?php echo date('d.m.Y H:i', strtotime($post->post_date)); ?>
    <div>
        <?php echo $post->post_intro; ?>
        <br />
        <?php echo $post->post_text; ?>
    </div>
    <hr />
    <h3><?php echo $this->lang->get('Comments'); ?></h3>
    <?php
    foreach ($comments as $comment)
    {
        ?>
        <div>
            <h4><?php echo $comment->comment_author; ?></h4>
            <?php echo date('d.m.Y H:i', strtotime($comment->comment_date)); ?>
            <div>
                <?php echo $comment->comment_text; ?>
            </div>
        </div>
        <?php
    }
    ?>
</div>