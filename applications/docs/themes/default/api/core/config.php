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
        <a href="<?php echo $app->config['base_url']; ?>/api"><?php echo $app->lang->get('API'); ?></a>
        <span class="divider">/</span>
    </li>
    <li>
        Config
    </li>
</ul>

<div class="page-header">
    <h1>Config</h1>
</div>
