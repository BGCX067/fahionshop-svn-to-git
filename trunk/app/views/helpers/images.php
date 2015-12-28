<?php

/**
 * @brief Images helper
 *
 * @package BakeSale
 * @version $Id: images.php 492 2007-08-03 11:36:11Z drayen $
 */

class ImagesHelper extends Helper {
	

    var $helpers = array('Html');
    var $cacheDir = 'cache/';
	var $uploadDir = 'uploads/';


   function __construct() {
       $this->types = array(1 => "gif", "jpeg", "png", "swf", "psd", "wbmp"); 
	   $this->fullpath = WWW_ROOT . DS;
	   $this->imgBase = '/' . $this->webroot . 'img' . '/';
   }
	
	// relative to IMAGES_URL path 
  /**
   * Automatically resizes an image and returns formatted IMG tag
   *
   * @param string $path Path to the image file, relative to the webroot/img/ directory.
   * @param integer $width Image of returned image
   * @param integer $height Height of returned image
   * @param boolean $
   Maintain aspect ratio (default: true)
   * @param array    $htmlAttributes Array of HTML attributes.
   * @param boolean $return Wheter this method should return a value or output it. This overrides AUTO_OUTPUT.
   * @return mixed    Either string or echos the value, depends on AUTO_OUTPUT and $return.
   * @return html return entire html complex or just the file name.
   * @access public
   */
 
	function resize($path, $alt = false, $width = false, $height = false, $aspect = true, $htmlAttributes = array(), $return = false, $html = true) {

		if(!$width) {
			$width = Configure::read('Image.thumb_width');
		}
		if(!$height) {
			$height = Configure::read('Image.thumb_height');
		}	
		if(!$alt) {
			$alt = 'thumb';
		}
		
		$htmlAttributes['alt'] = $alt;
    
    	$fullpath = WWW_ROOT  . 'img' . DS;
    	$url = $fullpath . $path;


    
		if (file_exists($url)) {
           $size = getimagesize($url);  
		} else {
           return $this->Html->image(Configure::read("Image.default")); 
        }
    
		if ($aspect) { // adjust to aspect.
			if (($size[1]/$height) > ($size[0]/$width)) { // $size[0]:width, [1]:height, [2]:type
				$width = ceil(($size[0]/$size[1]) * $height);
			} else {
				$height = ceil($width / ($size[0]/$size[1]));
    		}
		}	
		$relfile = $this->imgBase . $this->cacheDir . $width . 'x' . $height . '_' . basename($path); // relative file
		$cachefile = $fullpath . $this->cacheDir . $width . 'x' . $height . '_' . basename($path);  // location on server
		if(!$this->_ThumbnailSize($url, $width, $height)) {
    		return $this->__imageHtml($this->imgBase . $path, $alt);
		}
		if (file_exists($cachefile)) {
			$csize = getimagesize($cachefile);
			$cached = ($csize[0] == $width && $csize[1] == $height); // image is cached
			if (@filemtime($cachefile) < @filemtime($url)) // check if up to date
				$cached = false;
			} else {
				$cached = false;
			}

    if (!$cached) {
      $resize = ($size[0] > $width || $size[1] > $height) || ($size[0] < $width || $size[1] < $height);
    } else {
      $resize = false;
    }
    if ($resize) {
		$this->__resizeImage($url, $width, $height, $size, $cachefile);
	} elseif (!$cached) { 
		copy($url, $cachefile);
	}
	$htmlAttributes['width'] = $width;
	$htmlAttributes['height'] = $height;
	$relfile = $this->Html->url($relfile);
	if($html) {
    	return $this->output(sprintf($this->Html->tags['image'], $relfile, $this->Html->_parseAttributes($htmlAttributes, null, '', ' ')), $return);
	} else {
		return $relfile;
	}
  } 

/**
 * Resize image
 */

	function __resizeImage($url, $width, $height, $size, $cachefile) {
		$image = call_user_func('imagecreatefrom' . $this->types[$size[2]], $url);
		if (function_exists("imagecreatetruecolor") && ($temp = imagecreatetruecolor ($width, $height))) {
			imagecopyresampled ($temp, $image, 0, 0, 0, 0, $width, $height, $size[0], $size[1]);
		} else {
			$temp = imagecreate ($width, $height);
			imagecopyresized ($temp, $image, 0, 0, 0, 0, $width, $height, $size[0], $size[1]);
		}
		call_user_func("image" . $this->types[$size[2]], $temp, $cachefile);
		imagedestroy ($image);
		imagedestroy ($temp);
	}

/**
 * Show single image
 */

	function __imageHtml($image, $alt = false) {
		$size = $this->_imageSize($image);
		$width = $size['width'];
		$height = $size['height'];
		return $this->Html->image($image, compact('alt', 'width', 'height'));
	}


/**
 * Show single image
 */

	function singleImage($file, $alt = false, $width = false, $height = false) {
		return $this->resize($this->uploadDir . $file, $alt, $width, $height);
	}

/**
 * Show single image
 */

	function singleImageSrc($file) {
		return $this->resize($this->uploadDir . $file, false, false, false, true, array(), false, false);
	}


/**
 * Show product thmbnail or error image
 */

	function mainImage($data, $imgLink = false, $width = false, $height = false) {
		$imageArray = $this->__imageArray($data['images']);
		if(empty($imageArray)) {
			$imgLink = false;
			return;
		}
		if($imgLink) {
			$link = $this->imageLink($imageArray[0]);
			$imgLink = $link['full'];
			return '<a href="' . $link['url'] . '"'. '" class="image" title="'.__("Click to view large image", true).'">' . $this->resize($this->uploadDir . $imageArray[0], $data['name'], $width, $height) . '</a>';
		} else {
			return $this->resize($this->uploadDir . $imageArray[0], $data['name'], $width, $height);			
		}
	}


	
/**
 * TODO
 */
//chuyen tu chuoi chua cac image thanh mang chua image ok
	function __imageArray($images) {
    //khoi tao mang
		$imageArray = array();
		if(!empty($images)) {
        //kiem tra trong du lieu chi co 1 image 
			if(!strstr($images, ';')) {
				$imageArray[0] = $images;
			} else {
				$imageArray = explode(";", $images);
			}
		}
		return $imageArray;
	}


	function imageLink($image, $cssClass = '') {
		$link['url'] = $this->Html->url('/img/uploads/' . $image);
		$link['full'] = '<a href="' . $link['url'] . '">' . __('Larger image', true) . '</a>';		
		return $link;
	}



/*
 * test thumbnail size againts the larger image size TODO
 * 
 * @protected
 */

	function _ThumbnailSize($image, $thumbWidth, $thumbHeight) {
		$size = getimagesize($image);
		$height = $size[1];
		$width = $size[0];
		
		if ($height > $thumbHeight || $width > $thumbWidth) {
			return true;
         } else {
			return false;
		}
	}

/*
 * test thumbnail size againts the larger image size TODO
 * 
 * @protected
 */

	function _imageSize($image) {
		$fullpath = ROOT . DS . APP_DIR . DS . WEBROOT_DIR . DS;
		$size = getimagesize($fullpath . $image);
		$dimension['width'] = $size[0];
		$dimension['height'] = $size[1];
		return $dimension;
	}
	
		function adminImageList($data) {
		if(!empty($data['images'])) {
			$images = explode(";", $data['images']);
			$list = '';
			if(!empty($images)) {
				$list .= '<ul class="cols">';
				foreach($images as $row) {
					$list .= '<li>';
					$list .= $this->resize($this->uploadDir . $row);
					$list .= $this->__adminImageLink($row);
					$list .= $this->__adminImageLink($row, 'default');
					$list .= '</li>';
				}
				$list .= '</ul>';
			}
			return $list;
		}
	}


}
?>