<?php
/**
 * @var  $app  \Phrame\Core\Application
 */
?>
<div class="page-header">
    <h1>Logout</h1>
</div>

<form method="post" action="<?php echo $app->config['base_url']; ?>/auth/logout">
    <fieldset>
        <div class="form-actions">
            <button class="btn btn-primary" type="submit">Logout</button>
        </div>
    </fieldset>
</form>