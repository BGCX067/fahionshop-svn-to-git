<?php

/**
 * Add header html
 *
 * @author Matti Putkonen,  matti.putkonen@fi3.fi
 * @copyright Copyright (c); 2006, Matti Putkonen, Helsinki, Finland
 * @package BakeSale
 * @version $Id: header.php 512 2007-10-05 07:12:41Z matti $
 */

    class HeaderHelper extends Helper
    {
	
	var $helpers = array('Html', 'Bs');

/**
 * set paths
 *
 * @private
 */

    function __construct() {
		$this->fileBase = WWW_ROOT . DS;
		$this->cssBase = $this->fileBase . '/css/';
		$this->cssThemeBase = $this->cssBase . Configure::read('Site.theme') . '/';
		$this->jsBase = $this->fileBase . '/js/';
		$this->jsThemeBase = $this->jsBase . Configure::read('Site.theme') . '/';
    }

    function setPlugin() {
		if(isset($this->params['plugin'])) {
			$this->filePluginBase = APP . 'plugins' . DS . $this->params['plugin'] . DS . 'webroot';
			$this->cssPluginBase = $this->filePluginBase . '/css/';
			$this->cssPluginThemeBase = $this->filePluginBase . Configure::read('Site.theme') . '/';
			$this->jsPluginBase = $this->filePluginBase . '/js/';
			$this->jsPluginThemeBase = $this->filePluginBase . Configure::read('Site.theme') . '/';
		}
    }


/**
 * Generate all
 *
 * @param $place
 * @param $base
 * @param $body_class
 */
 	
     function make($title = false, $body_class = false, $extraCss =array()) {
	 	$plugin = false;
	 	if(isset($this->params['plugin'])) {
			$plugin = true;
			$this->setPlugin();
			$name = str_replace('_', '', $this->params['plugin'] . '.' . $this->params['controller']); 
		} else {
			$name = str_replace('_', '', $this->params['controller']); 
		}
		$place = strtolower($name . '-' . $this->action);
		//echo $place;
	 	$header = '';
		$type = $this->_get_type($place);
	 	$header .= $this->_make_title($title);
	 	$header .= $this->_make_js($place, $type, $plugin) . "\n";
	 	$header .= $this->_make_css($place, $type, $extraCss, $plugin) . "\n";
		$header .= $this->_ie_files($type, $plugin);
		$header .= $this->_google_analytics($type);
	 	$header .= $this->_body_tag($place) . "\n";
	 	
		return $header;
     }

/**
 * Detect type
 *
 * @param $place
 * @return String
 * @protected
 */
 	
     function _get_type($place) {
	 	if(strstr($place, '-admin_'))  {
			return 'admin';
		} else {
			return 'shop';
		}
     }
	
/**
 * Make title
 *
 * @param $base
 * @return String
 * @protected
 */

     function _make_title($base = false) {
		if(!$base) {
			$base = $this->_generate_title();
		} 
		if(!empty($base)) {
			$base = $base . ' : ';
		}		
		$title = $base . Configure::read('Site.name') . Configure::read('Site.tagline');
		return '<title>' . $title . '</title>' . "\n";
	}

/**
 * Generate title
 *
 * @return String
 * @protected
 */

     function _generate_title() {
	 	$title = strip_tags($this->Bs->pageHeader());
	 	return $title;
     }

/**
 * Generate title
 *
 * @param $place
 * @param $type
 * @return String
 * @protected
 */

     function _make_js($place, $type, $plugin) {
		$js = '<script type="text/javascript" src="' . $this->Html->url('/combined/' . $type . '/' . Configure::read('Site.theme')) . '.js"></script>' . "\n";
		$js .= $this->_custom_js($place, $plugin);
	 	return $js;
     }

/**
 * Check if there are any extra JS files
 *
 * @param $place
 * @return String
 * @protected
 */

     function _custom_js($place, $plugin) {
	 	$jsFile = $this->jsBase . $place . '.js';
	 	$jsThemeFile = $this->jsThemeBase . $place . '.js';
		$js = '';
	 	if (file_exists($jsFile) || file_exists($jsThemeFile)) {
			$js = '<script type="text/javascript" src="' . $this->Html->url('/combined/' . $place . '/' . Configure::read('Site.theme')) . '.js"></script>'  . "\n";
		} 
		if($plugin) {
			$jsPluginFile = $this->jsPluginBase . $place . '.js';
	 		$jsPluginThemeFile = $this->jsPluginThemeBase . $place . '.js';
	 		if (file_exists($jsPluginFile) || file_exists($jsPluginThemeFile)) {
				$js = '<script type="text/javascript" src="' . $this->Html->url('/combined/' . $place . '/' . Configure::read('Site.theme')) . '.js"></script>'  . "\n";
			}
		}
	 	return $js;
     }

/**
 * Generate CSS links
 *
 * @param $place
 * @param $type
 * @return String
 * @protected
 */

     function _make_css($place, $type, $extraCss, $plugin) {
		$css = '@import url("' . $this->Html->url('/combined/' . $type . '/' . Configure::read('Site.theme')) . '.css");' . "\n";
		$css .= $this->_custom_css($place, $plugin);
		if(!empty($extraCss)) {
			$css .= $this->_extra_css($extraCss);
		}
		$css = $this->_css_wrap($css);

	 	return $css;
     }

/**
 * Check if there are any extra CSS files
 *
 * @param $place
 * @return String
 * @protected
 */		

     function _custom_css($place, $plugin) {
	 	$cssFile = $this->cssBase . $place . '.css';
	 	$cssThemeFile = $this->cssThemeBase . $place . '.css';
		
		
		$css = '';
	 	if (file_exists($cssFile) || file_exists($cssThemeFile)) {
			$css .= '@import url("' . $this->Html->url('/combined/' . $place . '/' . Configure::read('Site.theme')) . '.css");' . "\n";
		} 
		if($plugin) {
			$pieces = explode('.', $place);
			if(count($pieces) == 1) {
				$pieces[1] = $pieces[0];
			}
	 		$cssPluginFile = $this->cssPluginBase . $pieces[1] . '.css';
	 		$cssPluginThemeFile = $this->cssPluginThemeBase . $pieces[1] . '.css';
	 		if (file_exists($cssPluginFile) || file_exists($cssPluginThemeFile)) {
				$css .= '@import url("' . $this->Html->url('/combined/' . $place . '/' . Configure::read('Site.theme')) . '.css");' . "\n";
			}
		}
	 	return $css;
     }

/**
 * Add manually inserted css to header
 *
 * @param $place
 * @return String
 * @protected
 */		

     function _extra_css($extraCss) {
	 	$css = '';
	 	foreach($extraCss as $row) {
			$css .= '@import url("' . $this->Html->url('/combined/' . $row . '/' . Configure::read('Site.theme')) . '.css");' . "\n";
		}
	 	return $css;
     }


/**
 * Generate body tag
 *
 * @param $place
 * @param $type
 * @return String
 * @protected
 */		

     function _body_tag($place) {
	 	$bodyClass = '';
		$bodyClass .= 'c-' . $this->params['controller'];			
		$bodyClass .= ' a-' . $this->action;
		$bodyClass = str_replace('_', '-', $bodyClass);
	 	return '</head><body class="' . $bodyClass . '">' . "\n";
     }

/**
 * Check if there are any IE specific files
 *
 * @param $type
 * @return String
 * @protected
 */		

     function _ie_files($type, $plugin) {
	 		$type = 'ie_' . $type;
			$ie = $this->_custom_js($type, $plugin);
			$ie .= $this->_css_wrap($this->_custom_css($type, $plugin));
			
			$ie = $this->_ie_wrap($ie);
			
			return $ie;
     }

/**
 * Check if there are any IE specific files
 *
 * @param $data
 * @return String
 * @protected
 */		

     function _ie_wrap($data) {
			$ie = '<!--[if lt IE 8]>' . "\n";
			$ie .= $data;
			$ie .= '<![endif]-->' . "\n";
			return $ie;
     }

/**
 * Wrap all CSS files with import tag
 *
 * @param $data
 * @return String
 * @protected
 */		

     function _css_wrap($data) {
	 	$css = '<style type="text/css">' . "\n";
		$css .= $data;
		$css .= '</style>' . "\n";
		
		return $css;
     }

/**
 * Add google tracking code if applicatable
 *
 * @return String
 * @protected
 */		

     function _google_analytics($type) {
		$text = '';
		$code = Configure::read('Site.google_analytics');
		
		if(($type == 'shop') && (!empty($code))) {
			$text .= '<script src="http://www.google-analytics.com/urchin.js" type="text/javascript"></script>';
			$text .= '<script type="text/javascript">';
			$text .= '_uacct="' . $code . '";';
			$text .= 'urchinTracker();';
			$text .= '</script>';
		}
		return $text;
     }
     
     
 /***
 *    Prepare data for chart
 */

function chart_data($line_1, $line_2, $period, $frequence) {
    //convert from string to number
    //find step and max value for line 1
    $step1 = 10*round(max($line_1)/100,1);
    $max1 = 11*$step1;
    $step2 = 100000*round(max($line_2)/1000000,0);
    $max2 = 11*$step2;
    $data = array(
         "elements" => array(
            //This line for quantity of report
            array("type"=>"line","alpha"=>1,"colour"=>"#ee1c2f","text"=>"Quantity","fill"=>"transparent",
                    "values"=>$line_1),
                    
          //This line for total price
            array("type"=>"line","alpha"=>1,"colour"=>"#f4ba00","text"=>"Total price","fill"=>"transparent","axis"=>"right",
                    "values"=>$line_2, 'tip'=>"#var# VND")),
          // This line for period
         "x_axis" => array("3d"=>0,"colour"=>"#ee1c2f","grid-colour"=>"#e2e2e2","labels"=>
            array("labels"=>$period)),   
         //Title of chart
         "title" => array("text"=>  "Report by ".$frequence, "style"=> "{font-size: 20px; color:#0000ff; font-family: Verdana; text-align: center;}"),   
         //Description for X axis
         "x_legend" => array("text"=>"Period in ".$frequence,"style"=>"{font-size: 12px; color: #000033}"),
         "y_legend" => array("text"=>"Items","style"=>"{font-size: 12px; color: #000033}"),
         "y_legend_right" => array("text"=>"VND","style"=>"{font-size: 12px; color: #000033}"),
         
         //For y axis in the right
         "y_axis_right" => array("colour"=>"#428bc7","grid-colour"=>"#e2e2e2","max"=>$max2,"steps"=>$step2),
         
         //For y axis in the left
         "y_axis" => array("colour"=>"#428bc7","grid-colour"=>"#e2e2e2","max"=>$max1,"steps"=>$step1),
         "bg_colour"=>"#ffffff"
    );
    return json_encode($data);
}

}
?>