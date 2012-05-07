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
    foreach ($post->comments as $com)
    {
        ?>
        <div class="comment">
            <h4><?php echo $com->comment_author; ?></h4>
            <span class="label label-info"><?php echo date('d.m.Y H:i', strtotime($com->comment_date)); ?></span>
            <div>
                <?php echo $com->comment_text; ?>
            </div>
        </div>
        <?php
    }
    ?>

    <?php echo $comment; ?>

</div>