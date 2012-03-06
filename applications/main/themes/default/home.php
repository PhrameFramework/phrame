<div class="page-header">
    <h1><?php echo $name; ?></h1>
    <p>PHP 5.3 Framework</p>
</div>

<h2>Clone repository:</h2>

<pre>
<strong>$</strong> git clone --recursive https://github.com/PhrameFramework/phrame
</pre>

<hr />

<h2>Installation:</h2>

<p><a href="https://github.com/PhrameFramework/phrame/zipball/master">Download</a> and extract the latest version</p>

<p>Make <strong>assets</strong> directory writable:</p>

<pre>
<strong>$</strong> cd phrame
<strong>$</strong> chmod -R 777 public/assets
</pre>

<p>Install packages from <a href="http://packagist.org/packages/phrame/">Composer</a>:</p>

<pre>
<strong>$</strong> curl -s http://getcomposer.org/installer | php
<strong>$</strong> php composer.phar install
</pre>