<?php 
	$data = $this->requestAction('/categories/menu_parts'); 
	if(isset($data)) {
?>
<ul id="categoriesmenu">
  <?php foreach ($data as $row){?>
  <li><?php 
		if ($row['Category']['active'] == 1){
		echo $html->link($row['Category']['name'] ,"/categories/show/" . $row['Category']['id']);}?></li>
  <?php } ?>
</ul>
<?php } ?>