<?php
/**
 * @var  $app  \Phrame\Core\Application
 */
?>
<ul class="breadcrumb">
    <li>
        <a href="<?php echo $app->config['base_url']; ?>"><?php echo $app->lang->get('Documentation'); ?></a>
        <span class="divider">/</span>
    </li>
    <li>
        <?php echo $app->lang->get('About'); ?>
    </li>
</ul>

<div class="page-header">
    <h1><?php echo $app->lang->get('About'); ?></h1>
</div>