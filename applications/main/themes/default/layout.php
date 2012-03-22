<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Phrame</title>
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <?php echo $this->asset->css('bootstrap.css', array('media'=>'all')); ?>
        <?php echo $this->asset->css('style.css', array('media'=>'all')); ?>
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <a href="http://github.com/PhrameFramework"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://a248.e.akamai.net/assets.github.com/img/71eeaab9d563c2b3c590319b398dd35683265e85/687474703a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f677261795f3664366436642e706e67" alt="Fork me on GitHub"></a>
            <div class="navbar-inner">
                <div class="container">
                    <a class="brand" href="<?php echo $this->app->config->base_url; ?>">Phrame</a>
                    <div class="nav-collapse">
                        <ul class="nav">
                            <li <?php if ($this->app->route->application === 'main' and $this->app->route->controller === 'home') echo 'class="active"'; ?>>
                                <a href="<?php echo $this->app->config->base_url; ?>">
                                    <?php echo $this->lang->get('Home'); ?>
                                </a>
                            </li>
                            <li <?php if ($this->app->route->application === 'main' and $this->app->route->controller === 'about') echo 'class="active"'; ?>>
                                <a href="<?php echo $this->app->config->base_url; ?>/about">
                                    <?php echo $this->lang->get('About'); ?>
                                </a>
                            </li>
                            <li <?php if ($this->app->route->application === 'documentation') echo 'class="active"'; ?>>
                                <a href="<?php echo $this->app->config->base_url; ?>/documentation">
                                    <?php echo $this->lang->get('Documentation'); ?>
                                </a>
                            </li>
                            <li <?php if ($this->app->route->application === 'main' and $this->app->route->controller === 'blog') echo 'class="active"'; ?>>
                                <a href="<?php echo $this->app->config->base_url; ?>/blog">
                                    <?php echo $this->lang->get('Blog'); ?>
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