<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/app/system/middleware_public.php'); ?>
<!doctype html>
<html lang="<?= LANG; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="<?= WEB_APP_URL; ?>images/logo_app.png">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <title>Hibour</title>
</head>
<body>
<div style="width: 100%; min-height: 100vh; display: flex;">
    <div style="margin: auto;min-width: 220px;width: 450px; padding: 6px;">
        <h4 style="font-weight: 100;color: #434343;font-size: 3em;margin-bottom: 20px;line-height: 35px;">
            <?= trans('Accès au manager'); ?></h4>
        <form id="loginForm" action="" method="post">
            <input type="text" class="form-control" maxlength="70" name="loginInput" id="emailInput"
                   style="width: 100%;padding: 5px 10px;"
                   value="<?= !empty($_POST['loginInput']) ? $_POST['loginInput'] : ''; ?>"
                   required="true" placeholder="<?= trans('Login'); ?>">
            <div style="height: 10px;"></div>
            <input type="password" class="form-control" id="passwordInput"
                   name="passwordInput" style="width: 100%;padding: 5px 10px;"
                   required="true" placeholder="<?= trans('Mot de passe'); ?>">
            <?= getFieldsControls(); ?>
            <button style="float:right; padding:5px 10px; margin: 15px 0 0; border: 0; cursor: pointer;"
                    type="submit" name="APPOECONNEXION" id="submitButton">
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
<?= getAppoeCredit('#888'); ?>
<?php App\Flash::constructAndDisplay(); ?>
</body>
</html>