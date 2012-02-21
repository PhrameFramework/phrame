<h1><?php echo $this->lang->get('Blog'); ?></h1>
<hr />
<?php
foreach ($posts as $post)
{
    ?>
    <div>
        <h2><a href="<?php echo $this->application->config->base_url.'/post/'.$post->id; ?>"><?php echo $post->post_title; ?></a></h2>
        <?php echo date('d.m.Y H:i', strtotime($post->post_date)); ?>
        <div>
            <?php echo $post->post_intro; ?>
        </div>
    </div>
    <?
}