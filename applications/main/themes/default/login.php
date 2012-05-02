<?php
/**
 * @var  $app  \Phrame\Core\Application
 */
?>
<div class="page-header">
    <h1>Login</h1>
</div>

<form method="post" action="<?php echo $app->config['base_url']; ?>/login">
    <fieldset>
        <div class="control-group">
            <label class="control-label" for="name">Name:</label>
            <div class="controls">
                <input type="text" name="name" class="input-xlarge" id="name" value="<?php echo $name; ?>" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="password">Password:</label>
            <div class="controls">
                <input type="password" name="password" class="input-xlarge" id="password" value="" />
            </div>
        </div>
        <div class="form-actions">
            <button class="btn btn-primary" type="submit">Login</button>
        </div>
    </fieldset>
</form>