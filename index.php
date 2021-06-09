<?php

use App\Plugin\Cms\CmsCache;
use App\Plugin\Cms\CmsContent;
use App\Plugin\Cms\CmsTemplate;
use App\Plugin\Tracker\Tracker;

require_once($_SERVER['DOCUMENT_ROOT'] . '/app/system/middleware_public.php');
includePluginsFiles();

if (class_exists('App\Plugin\Cms\Cms')) {

    //Update visitor tracker
    if (!bot_detected() && class_exists('App\Plugin\Tracker\Tracker')) {
        $Tracker = new Tracker(true);
    }

    //Get page content
    $CmsContent = new CmsContent(getPageCmsId(), getPageLang());
    $Cache = new CmsCache(getPageSlug() . '.php');

    //Show page content in template with cache (if is user)
    if (!$Cache->start()):

        inc(WEB_PATH . 'header.php');

        $Template = new CmsTemplate(WEB_PATH . getPageFilename() . '.php', $CmsContent->getData(), true);
        echo $Template->get();

        inc(WEB_PATH . 'footer.php');

    endif;
    $Cache->end();

    getAsset('adminDashPublic');
}