<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Phrame</title>
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <?php echo Engine\Asset::css('bootstrap.css'); ?>
        <?php echo Engine\Asset::css('style.css'); ?>
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="brand" href="<?php echo Engine\Application::instance()->base_url; ?>">Phrame</a>
                    <div class="nav-collapse">
                        <ul class="nav">
                            <li <?php if(Engine\Application::instance()->controller === 'home') echo 'class="active"'; ?>>
                                <a href="<?php echo Engine\Application::instance()->base_url; ?>">
                                    <?php echo Engine\Lang::instance()->get('Home'); ?>
                                </a>
                            </li>
                            <li <?php if(Engine\Application::instance()->controller === 'about') echo 'class="active"'; ?>>
                                <a href="<?php echo Engine\Application::instance()->base_url; ?>/about">
                                    <?php echo Engine\Lang::instance()->get('About'); ?>
                                </a>
                            </li>
                            <li <?php if(Engine\Application::instance()->controller === 'documentation') echo 'class="active"'; ?>>
                                <a href="<?php echo Engine\Application::instance()->base_url; ?>/docs">
                                    <?php echo Engine\Lang::instance()->get('Documentation'); ?>
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
                <p class="pull-right">Watch us on <a href="https://github.com/delmot/phrame">github</a></p>
            </footer>
        </div>
    </body>
</html>