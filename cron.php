<?php

use App\Hook;

//Get APPOE System
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/main.php');

//Set the page filename for getting functions from declared plugins (ini.main)
setPageFilename('cron');

//Get all plugins functions
includePluginsFiles(true);

//Attach a Hook
Hook::apply('cron');