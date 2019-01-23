<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/app/system/middleware_public.php'); ?>
<!doctype html>
<html lang="<?= LANG; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/jpg" href="<?= WEB_APP_URL; ?>images/appoe-favicon.png">
    <link rel="stylesheet" type="text/css" href="<?= APP_ROOT; ?>css/font.css">
    <link rel="stylesheet" type="text/css" href="<?= APP_ROOT; ?>css/appoe.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <title>Connexion à <?= WEB_TITLE; ?></title>
</head>
<body>
<div id="hibourContainer">
    <div id="hibourContent">
        <h4 id="hibourTitle">
            <?= trans('Accès au manager'); ?></h4>
        <form id="loginForm" action="" method="post">
            <input type="text" maxlength="70" name="loginInput" id="emailInput"
                   value="<?= !empty($_POST['loginInput']) ? $_POST['loginInput'] : ''; ?>"
                   required="required" placeholder="<?= trans('Login'); ?>">
            <input type="password" id="passwordInput"
                   name="passwordInput" required="required"
                   placeholder="<?= trans('Mot de passe'); ?>">
            <?= getFieldsControls(); ?>
            <?php App\Flash::display(); ?>
            <button type="submit" name="APPOECONNEXION" id="submitButton">
                <?= trans('Connexion'); ?>
            </button>
        </form>
        <script type="text/javascript">
            $(document).ready(function (n) {
                $("#loginForm").on("submit", function (n) {
                    "" != $("#loginInput").val() && "" != $("#passwordInput").val() || n.preventDefault()
                });
            });
        </script>
    </div>
</div>
</body>
</html>