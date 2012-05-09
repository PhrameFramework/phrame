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
    <a href="http://github.com/PhrameFramework"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://a248.e.akamai.net/assets.github.com/img/71eeaab9d563c2b3c590319b398dd35683265e85/687474703a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f677261795f3664366436642e706e67" alt="Fork me on GitHub"></a>
    <div class="navbar-inner">
        <div class="container">
            <a class="brand" href="<?php echo $app->config['base_url']; ?>">Phrame</a>
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