<?php

use App\Plugin\Cms\CmsCache;
use App\Plugin\Cms\CmsContent;
use App\Template;

require_once($_SERVER['DOCUMENT_ROOT'] . '/app/system/middleware_public.php');
includePluginsFiles();

if (class_exists('App\Plugin\Cms\Cms')) {

    //Update visitor stats
    if (!bot_detected()) {
        mehoubarim_updateVisitor(getPageData());
    }

    //Get page content
    $CmsContent = new CmsContent(getPageCmsId(), getPageLang());
    $Cache = new CmsCache(getPageSlug() . '.php');

    //Show page content in template with cache (if is user)
    if (!$Cache->start()):

        inc(WEB_PATH . 'header.php');

        $Template = new Template(WEB_PATH . getPageFilename() . '.php', $CmsContent->getData(), true);
        echo $Template->get();

        inc(WEB_PATH . 'footer.php');

    endif;
    $Cache->end();

    getAsset('adminDashPublic');
}