<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/main.php');
includePluginsFiles();
require_once(WEB_SYSTEM_PATH . 'auth_user.php');
?>
<!doctype html>
<html lang="<?= LANG; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/jpg" href="<?= WEB_APP_URL; ?>images/appoe-favicon.png">
    <link rel="stylesheet" type="text/css" href="<?= WEB_TEMPLATE_URL; ?>css/appoe.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <title>Connexion à <?= WEB_TITLE; ?></title>
</head>
<body>
<div id="hibourContainer">
    <div id="hibourContent">
        <img src="<?= getLogo(true); ?>" alt="APPOE"
             style="width: 100px;margin:0 auto;display: block;">
        <form id="loginForm" action="" method="post">
            <input type="text" maxlength="70" name="loginInput" id="emailInput"
                   value="<?= !empty($_POST['loginInput']) ? $_POST['loginInput'] : ''; ?>"
                   required="required" placeholder="<?= trans('Login'); ?>">
            <input type="password" id="passwordInput" name="passwordInput" required="required"
                   placeholder="<?= trans('Mot de passe'); ?>">
            <?= getFieldsControls();
            App\Flash::display(); ?>
            <button type="submit" name="APPOECONNEXION" id="submitButton"><?= trans('Connexion'); ?></button>
        </form>
        <script type="text/javascript">
            $(document).ready(function (n) {
                $("#loginForm").on("submit", function (n) {
                    "" !== $("#loginInput").val() && "" !== $("#passwordInput").val() || n.preventDefault()
                });
            });
        </script>
    </div>
</div>
</body>
</html>