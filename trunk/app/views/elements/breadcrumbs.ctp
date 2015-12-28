<?php if($this->params['action'] != 'display') { ?>
<div id="breadcrumbs" class="Breadcrumb">
<?php
	$html->addCrumb(__('Trang chủ', true), "/");
	if(isset($breadcrumbs)) {
		if($this->params['controller'] == 'categories') {
			unset($breadcrumbs[count($breadcrumbs)-1]);
		}
		foreach($breadcrumbs as $row) {
			if(isset($this->params['prefix'])) {
				$url = $html->url(array('controller' => 'categories', 'action' => 'show', 'id' => $row['Category']['id']));
			} else {
				$url = $seo->url($row['Category'], 'categories');
			}
			$url = str_replace(Configure::read('App.dir'), '', $url);
			$html->addCrumb($row['Category']['name'], $url);
		}
	}
	$html->addCrumb('<strong>' . $this->pageTitle . '</strong>');
	echo $html->getCrumbs();
?></div>
<?php } ?>





