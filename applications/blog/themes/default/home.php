<div class="page-header">
    <h1><?php echo $this->lang->get('Blog'); ?></h1>
</div>

<?php
foreach ($posts as $post)
{
    ?>
    <div>
        <h2><a href="<?php echo $this->application->config->base_url.'/post/'.$post->id; ?>"><?php echo $post->post_title; ?></a></h2>
        <span class="label label-info"><?php echo date('d.m.Y H:i', strtotime($post->post_date)); ?></span>
        <div>
            <?php echo $post->post_intro; ?>
        </div>
        <a href="<?php echo $this->application->config->base_url.'/post/'.$post->id; ?>"><?php echo $this->lang->get('Read more...'); ?></a>
        <a href="<?php echo $this->application->config->base_url.'/post/'.$post->id; ?>#comments"><?php echo $this->lang->get('Comments').' ('.count($post->comments).')'; ?></a>
    </div>
    <?
}