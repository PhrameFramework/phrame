<?php
/**
 * @var  $app  \Phrame\Core\Application
 */
?>
<div class="page-header">
    <h1><?php echo $app->lang->get('Documentation'); ?></h1>
</div>

<ul>
    <li>
        <a href="<?php echo $app->config['base_url']; ?>/about">
            <?php echo $app->lang->get('About'); ?>
        </a>
    </li>
    <li>
        <a href="<?php echo $app->config['base_url']; ?>/install">
            <?php echo $app->lang->get('Installation'); ?>
        </a>
    </li>
    <li>
        <a href="<?php echo $app->config['base_url']; ?>/quickstart">
            <?php echo $app->lang->get('Quick Start'); ?>
        </a>
    </li>
    <li>
        <a href="<?php echo $app->config['base_url']; ?>/api">
            <?php echo $app->lang->get('API'); ?>
        </a>
    </li>
</ul>