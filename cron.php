<?php

use App\Hook;

require_once($_SERVER['DOCUMENT_ROOT'] . '/app/main.php');
includePluginsFiles(true);
Hook::apply('cron');