<?php

use App\Plugin\Cms\CmsContent;
use App\Template;

include($_SERVER['DOCUMENT_ROOT'] . '/header_template.php');

if (class_exists('App\Plugin\Cms\Cms')) {

    //Update visitor stats
    if (!bot_detected()) {
        mehoubarim_updateVisitor(ucfirst(mb_strtolower($_SESSION['currentPageName'])));
    }

    //Get page content
    $CmsContent = new CmsContent($Cms->getId(), LANG);

    //Show page content in template
    $Template = new Template(WEB_PATH . $Cms->getFilename() . '.php', $CmsContent->getData(), true);
    echo $Template->get();
}

include($_SERVER['DOCUMENT_ROOT'] . '/footer_template.php');