<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Phramework</title>
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <?php echo Asset::css('bootstrap.css'); ?>
        <?php echo Asset::css('style.css'); ?>
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="brand" href="<?php echo Application::instance()->base_url; ?>">Phramework</a>
                    <div class="nav-collapse">
                        <ul class="nav">
                            <li <?php if(Application::instance()->controller === 'home') echo 'class="active"'; ?>>
                                <a href="<?php echo Application::instance()->base_url; ?>">Home</a>
                            </li>
                            <li <?php if(Application::instance()->controller === 'about') echo 'class="active"'; ?>>
                                <a href="<?php echo Application::instance()->base_url; ?>/about">About</a>
                            </li>
                            <li <?php if(Application::instance()->controller === 'documentation') echo 'class="active"'; ?>>
                                <a href="<?php echo Application::instance()->base_url; ?>/documentation">Documentation</a>
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
                <p class="pull-left">&copy; 2012, Phramework</p>
                <p class="pull-right">See us on <a href="https://github.com/delmot/phramework">github</a></p>
            </footer>
        </div>
    </body>
</html>