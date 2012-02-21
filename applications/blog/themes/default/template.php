<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Phrame</title>
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <?php echo $this->application->asset->css('bootstrap.css', array('media'=>'all')); ?>
        <?php echo $this->application->asset->css('style.css', array('media'=>'all')); ?>
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="brand" href="<?php echo $this->application->config->base_url; ?>">Phrame</a>
                    <div class="nav-collapse">
                        <ul class="nav">
                            <li <?php if ($this->application->route->controller === 'home') echo 'class="active"'; ?>>
                                <a href="<?php echo $this->application->config->base_url; ?>">
                                    <?php echo $this->application->lang->get('Home'); ?>
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
                <p class="pull-right"><?php echo $this->application->lang->get('Watch us on'); ?> <a href="https://github.com/delmot/phrame">github</a></p>
            </footer>
        </div>
    </body>
</html>