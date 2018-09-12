<?php
include($_SERVER['DOCUMENT_ROOT'] . '/header_template.php');

if (!bot_detected()) {
    mehoubarim_updateVisitor($_SESSION['currentPageName']);
}

$CmsContent = new \App\Plugin\Cms\CmsContent($Cms->getId(), LANG);
$allContentArr = $CmsContent->getData();

$pageContent = getContainerErrorMsg('<div class="container"><h4>' . trans('Cette page n\'existe pas') . '</h4></div>');
$pageContent = showTemplateContent(TEMPLATES_PATH . $Cms->getSlug() . '.php', extractFromObjArr($allContentArr, 'metaKey'));

echo $pageContent;
include($_SERVER['DOCUMENT_ROOT'] . '/footer_template.php');