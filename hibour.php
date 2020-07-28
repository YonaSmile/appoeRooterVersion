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
    <link rel="icon" type="image/png" href="<?= WEB_TEMPLATE_URL; ?>images/appoe-favicon.png">
    <link rel="stylesheet" type="text/css" href="<?= WEB_TEMPLATE_URL; ?>css/appoe.css">
    <title>Connexion à <?= WEB_TITLE; ?></title>
    <style>
        html, body {
            background: #fff;
        }

        input,
        input:hover,
        input:focus,
        input:active {
            box-shadow: none !important;
            outline: none;
        }

        #hibourContainer {
            width: 100%;
            min-height: 100vh;
            display: flex;
            box-sizing: border-box;
            z-index: 1;
        }

        #hibourContent {
            margin: auto;
            min-width: 220px;
            max-width: 450px;
            padding: 6px;
            box-sizing: border-box;
            overflow: hidden;
            z-index: 999;
        }

        #hibourContent img {
            width: 200px;
            margin: 0 auto 12px;
            display: block;
        }

        #hibourContent form {
            position: relative;
        }

        #hibourContent form input {
            width: 100%;
            padding: 15px 7px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 0;
            background: #FFF !important;
            color: #000;
            transition: all 0.2s;
            border-bottom: 1px solid rgba(200, 200, 200, 0.3);
            letter-spacing: 1px !important;
            border-radius: 0;
        }

        #hibourContent form input:,
        #hibourContent form input:visited,
        #hibourContent form input:valid {
            background-color: #FFF;
        }

        #hibourContent form input:focus,
        #hibourContent form input:hover {
            border-bottom: 1px solid rgba(0, 0, 0, 1);
        }

        #hibourContent form button[type="submit"] {
            float: right;
            padding: 6px 0;
            margin: 15px 0 0;
            cursor: pointer;
            box-sizing: border-box;
            border: 0;
            border-bottom: 1px solid rgba(0, 0, 0, 0.3);
            background: none transparent;
            color: #000;
            transition: all 0.3s;
            font-weight: bold;
            letter-spacing: 1px;
        }

        #hibourContent form button[type="submit"]:hover {
            border-bottom: 1px solid rgba(0, 0, 0, 1);
        }

        #hibourContent form button[type="submit"]:active {
            color: #000;
        }

        .return {
            position: absolute;
            bottom: 10px;
            color: rgba(0, 0, 0, 0.6);
            font-weight: 400;
            letter-spacing: -0.04em;
            margin: 0;
            text-align: center;
            display: inline-block;
            left: 10px;
        }

        .return a {
            padding-bottom: 1px;
            color: #000;
            text-decoration: none;
            border-bottom: 1px solid rgba(0, 0, 0, 0.6);
            -webkit-transition: border-color 0.1s ease-in;
            transition: border-color 0.1s ease-in;
        }

        .return a:hover {
            border-bottom-color: #000;
        }

        #dateContainer {
            text-align: center;
            color: #000;
            font-size: 1em;
            line-height: 1.1em;
            margin-bottom: 12px;
        }

        #dateContainer span {
            display: block;
        }

        #realHour {
            font-weight: 800;
        }

        @media screen and (max-width: 390px) {
            #hibourContent img {
                width: 100px;
                margin: 0 auto 10px;
            }
        }
    </style>
</head>
<body>
<div id="hibourContainer" class="content">
    <div id="hibourContent" class="card">
        <div class="card-body">
            <img src="<?= getLogo(APP_IMG_URL . 'appoe-logo-black-sm.png'); ?>" alt="APPOE">
            <div id="dateContainer"><span
                        id="realHour"><?= date('H : i : s'); ?></span><span><?= displayCompleteDate(date('d/m/Y')); ?></span>
            </div>
            <form id="loginForm" action="" method="post">
                <input type="text" maxlength="70" name="loginInput" id="emailInput"
                       value="<?= !empty($_POST['loginInput']) ? $_POST['loginInput'] : ''; ?>"
                       required="required" placeholder="<?= trans('Login'); ?>">
                <input type="password" id="passwordInput" name="passwordInput" required="required"
                       placeholder="<?= trans('Mot de passe'); ?>">
                <?= getFieldsControls(); ?>
                <span style="color:#FFF;"><?php App\Flash::display(); ?></span>
                <button type="submit" name="APPOECONNEXION" id="submitButton"><?= trans('Connexion'); ?></button>
            </form>
        </div>
    </div>
</div>
<p class="return"><a href="/">Revenir au site</a></p>
<script>
    var realHourContainer = document.getElementById('realHour');
    window.setInterval(function () {
        var d = new Date();
        realHourContainer.innerText = (d.getHours() < 10 ? '0' + d.getHours() : d.getHours()) + ' : ' + (d.getMinutes() < 10 ? '0' + d.getMinutes() : d.getMinutes()) + ' : ' + (d.getSeconds() < 10 ? '0' + d.getSeconds() : d.getSeconds());
    }, 1000);
</script>
</body>
</html>