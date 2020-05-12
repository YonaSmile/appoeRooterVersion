<?php

use App\Plugin\Cms\CmsContent;
use App\Template;
use App\Cache;

require_once( $_SERVER['DOCUMENT_ROOT'] . '/app/system/middleware_public.php' );
includePluginsFiles();

if ( class_exists( 'App\Plugin\Cms\Cms' ) ) {

	//Update visitor stats
	if ( ! bot_detected() ) {
		mehoubarim_updateVisitor( getPageData() );
	}

	//Get page content
	$CmsContent = new CmsContent( getPageId(), ( ! empty( $_GET['access_lang'] ) ? $_GET['access_lang'] : LANG ) );
	$Cache      = new Cache( getPageSlug() . '.php' );

	//Show page content in template with cache (if is user)
	if ( isset( $_GET['access_method'] ) || ! $Cache->start() ):

		include( WEB_PATH . 'header.php' );

		$Template = new Template( WEB_PATH . getPageFilename() . '.php', $CmsContent->getData(), true );
		echo $Template->get();

		include( WEB_PATH . 'footer.php' );

	endif;
	$Cache->end();
}