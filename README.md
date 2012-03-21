#Phrame
PHP 5.3 Framework

[![Build Status](https://secure.travis-ci.org/PhrameFramework/phrame.png?branch=master)](http://travis-ci.org/PhrameFramework/phrame)

##Clone repository:##

    $ git clone --recursive https://github.com/PhrameFramework/phrame

##Installation:##

[Download](https://github.com/PhrameFramework/phrame/zipball/master) and extract the latest version

Make **assets** and **logs** directories writable:

    $ cd phrame
    $ chmod -R 777 public/assets
    $ chmod -R 777 applications/main/logs

Install packages from [Composer](http://packagist.org/packages/phrame/):

    $ curl -s http://getcomposer.org/installer | php
    $ php composer.phar install
