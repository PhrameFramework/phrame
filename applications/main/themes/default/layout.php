<?php
/**
 * @var  $app      \Phrame\Core\Application
 * @var  $content  string
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Phrame</title>
        <!--[if lt IE 9]>
        <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <?php echo $app->asset->css('bootstrap.css', array('media'=>'all')); ?>
        <?php echo $app->asset->css('style.css', array('media'=>'all')); ?>
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <a href="http://github.com/PhrameFramework"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://s3.amazonaws.com/github/ribbons/forkme_right_gray_6d6d6d.png" alt="Fork me on GitHub"></a>
            <div class="navbar-inner">
                <div class="container">
                    <a class="brand" href="<?php echo $app->config['base_url']; ?>">Phrame</a>
                    <div class="nav-collapse">
                        <ul class="nav">
                            <li <?php if ($app->route->application === 'main' and $app->route->controller === 'index') echo 'class="active"'; ?>>
                                <a href="<?php echo $app->config['base_url']; ?>">
                                    <?php echo $app->lang->get('Home'); ?>
                                </a>
                            </li>
                            <li <?php if ($app->route->application === 'main' and $app->route->controller === 'about') echo 'class="active"'; ?>>
                                <a href="<?php echo $app->config['base_url']; ?>/about">
                                    <?php echo $app->lang->get('About'); ?>
                                </a>
                            </li>
                            <li <?php if ($app->route->application === 'docs') echo 'class="active"'; ?>>
                                <a href="<?php echo $app->config['base_url']; ?>/docs">
                                    <?php echo $app->lang->get('Documentation'); ?>
                                </a>
                            </li>
                            <li <?php if ($app->route->application === 'blog') echo 'class="active"'; ?>>
                                <a href="<?php echo $app->config['base_url']; ?>/blog">
                                    <?php echo $app->lang->get('Blog'); ?>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="content">
                <?php echo $content; ?>
            </div>
            <footer>
                <p class="pull-left">&copy; 2012, Phrame</p>
            </footer>
        </div>
    </body>
</html>