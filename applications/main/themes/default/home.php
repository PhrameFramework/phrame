<div class="page-header">
    <h1><?php echo $name; ?></h1>
    <h2>PHP 5.3 Framework</h2>
</div>

<p>Clone repository:</p>
<pre>
<strong>$</strong> git clone --recursive https://github.com/PhrameFramework/phrame
</pre>

<p>Make <b>assets</b> directory writable:</p>
<pre>
<strong>$</strong> cd phrame
<strong>$</strong> chmod -R 777 public/assets
</pre>

<p>Install packages from <a href="http://packagist.org/packages/phrame/">Packagist</a>:</p>
<pre>
<strong>$</strong> curl -s http://getcomposer.org/installer | php
<strong>$</strong> php composer.phar install
</pre>
