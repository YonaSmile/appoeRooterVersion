<?php
include($_SERVER['DOCUMENT_ROOT'] . '/header_template.php');

if (class_exists('App\Plugin\Cms\Cms')) {

    //Update visitor stats
    if (!bot_detected()) {
        mehoubarim_updateVisitor($_SESSION['currentPageName']);
    }

    //Get page content
    $CmsContent = new \App\Plugin\Cms\CmsContent($Cms->getId(), LANG);

    //Show page content in template
    $Template = new \App\Template(TEMPLATES_PATH . $Cms->getSlug() . '.php', $CmsContent->getData(), true);
    $Template->show();
}

include($_SERVER['DOCUMENT_ROOT'] . '/footer_template.php');