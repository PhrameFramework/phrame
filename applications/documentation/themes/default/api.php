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
        <?php echo $app->lang->get('API'); ?>
    </li>
</ul>

<div class="page-header">
    <h1><?php echo $app->lang->get('API'); ?></h1>
</div>

<h2>Core classes</h2>
<ul>
    <li>
        <a href="<?php echo $app->config['base_url']; ?>/api/core/application">
            Application
        </a>
    </li>
    <li>
        <a href="<?php echo $app->config['base_url']; ?>/api/core/applications">
            Applications
        </a>
    </li>
    <li>
        <a href="<?php echo $app->config['base_url']; ?>/api/core/asset">
            Asset
        </a>
    </li>
    <li>
        <a href="<?php echo $app->config['base_url']; ?>/api/core/config">
            Config
        </a>
    </li>
    <li>
        <a href="<?php echo $app->config['base_url']; ?>/api/core/controller">
            Controller
        </a>
    </li>
    <li>
        <a href="<?php echo $app->config['base_url']; ?>/api/core/error">
            Error
        </a>
    </li>
    <li>
        <a href="<?php echo $app->config['base_url']; ?>/api/core/lang">
            Lang
        </a>
    </li>
    <li>
        <a href="<?php echo $app->config['base_url']; ?>/api/core/log">
            Log
        </a>
    </li>
    <li>
        <a href="<?php echo $app->config['base_url']; ?>/api/core/model">
            Model
        </a>
    </li>
    <li>
        <a href="<?php echo $app->config['base_url']; ?>/api/core/request">
            Request
        </a>
    </li>
    <li>
        <a href="<?php echo $app->config['base_url']; ?>/api/core/response">
            Response
        </a>
    </li>
    <li>
        <a href="<?php echo $app->config['base_url']; ?>/api/core/route">
            Route
        </a>
    </li>
    <li>
        <a href="<?php echo $app->config['base_url']; ?>/api/core/view">
            View
        </a>
    </li>
</ul>
