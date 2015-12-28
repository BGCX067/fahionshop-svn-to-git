<?php

/**
 * SEO helper to create new, fine URLs that Google loves.
 *
 * @author Matti Putkonen,  matti.putkonen@fi3.fi
 * @copyright Copyright (c); 2006, Matti Putkonen, Helsinki, Finland
 * @package BakeSale
 * @version $Id: seo.php 512 2007-10-05 07:12:41Z matti $
 */

    class SeoHelper extends Helper
    {
	var $helpers = array('Html');

/**
 * generate SEO link
 *
 * @param $data
 * @param $controller
 * @param $action
 */

	function link($data, $controller = 'products', $action = 'show', $plugin = '') {
		$url = $this->url($data, $controller, $action, $plugin);
		$link = '<a href="' . $url . '">' . $data['name'] . '</a>';		
		return $link;
	}

/**
 * generate SEO url
 *
 * @param $data
 * @param $controller
 * @param $action
 */

	function url($data, $controller = 'products', $action = 'show', $plugin = '') {
		$myvar = format_seo($data['name']);
		$myvar = rtrim($myvar, "-");
		$myvar = ltrim($myvar, "-");
		$myvar = '/' . $myvar;
		$link = $this->Html->url(am(compact('plugin', 'myvar', 'controller', 'action'), array($data['id'])));
		$splitter = Router::url('/');
		$linkArray = explode($splitter, $link);
		unset($linkArray[0]);
		$link = Router::url('/') . format_seo(implode('/', $linkArray));
		return $link;
	}

}
?>