<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> <html xmlns="http://www.w3.org/1999/xhtml"> <head> <?php echo $this->_plugins['function']['header'][0]->_header(array(), $this);?> <link rel="stylesheet" type="text/css" href="http://localhost/05dejuncnShopex/themes/360buy/images/css.css" /> </head> <body> <div id="shortcut"> <div class="shortcut"> <div class="shor_left"><?php $s=$this->_files[0];$i+=0; echo '<div class="shopWidgets_panel" base_file="'.$s.'" base_slot="'.$i.'" base_id="shor_left" >'; $system = &$GLOBALS['system']; $i = intval($this->_wgbar[$s]++); if(!$GLOBALS['_widgets_mdl'])$GLOBALS['_widgets_mdl'] = $system->loadModel('content/widgets'); $widgets = &$GLOBALS['_widgets_mdl']; $widgets->adminLoad($s,$i,"shor_left");echo '</div>';?></div> <div class="shor_right"><div class="buz"><?php $s=$this->_files[0];$i+=0; echo '<div class="shopWidgets_panel" base_file="'.$s.'" base_slot="'.$i.'" base_id="shor_right" >'; $system = &$GLOBALS['system']; $i = intval($this->_wgbar[$s]++); if(!$GLOBALS['_widgets_mdl'])$GLOBALS['_widgets_mdl'] = $system->loadModel('content/widgets'); $widgets = &$GLOBALS['_widgets_mdl']; $widgets->adminLoad($s,$i,"shor_right");echo '</div>';?></div><div class="mamber"><?php $s=$this->_files[0];$i+=0; echo '<div class="shopWidgets_panel" base_file="'.$s.'" base_slot="'.$i.'" base_id="shor_right2" >'; $system = &$GLOBALS['system']; $i = intval($this->_wgbar[$s]++); if(!$GLOBALS['_widgets_mdl'])$GLOBALS['_widgets_mdl'] = $system->loadModel('content/widgets'); $widgets = &$GLOBALS['_widgets_mdl']; $widgets->adminLoad($s,$i,"shor_right2");echo '</div>';?></div></div> </div> </div> <div id="m_top"> <div class="logo"><?php $s=$this->_files[0];$i+=0; echo '<div class="shopWidgets_panel" base_file="'.$s.'" base_slot="'.$i.'" base_id="logo" >'; $system = &$GLOBALS['system']; $i = intval($this->_wgbar[$s]++); if(!$GLOBALS['_widgets_mdl'])$GLOBALS['_widgets_mdl'] = $system->loadModel('content/widgets'); $widgets = &$GLOBALS['_widgets_mdl']; $widgets->adminLoad($s,$i,"logo");echo '</div>';?></div> <div class="hot_stuch"> <div class="hot_bbx"> <?php $s=$this->_files[0];$i+=0; echo '<div class="shopWidgets_panel" base_file="'.$s.'" base_slot="'.$i.'" base_id="search" >'; $system = &$GLOBALS['system']; $i = intval($this->_wgbar[$s]++); if(!$GLOBALS['_widgets_mdl'])$GLOBALS['_widgets_mdl'] = $system->loadModel('content/widgets'); $widgets = &$GLOBALS['_widgets_mdl']; $widgets->adminLoad($s,$i,"search");echo '</div>';?> </div> <div class="bbx" style="margin-top:5px;"><?php $s=$this->_files[0];$i+=0; echo '<div class="shopWidgets_panel" base_file="'.$s.'" base_slot="'.$i.'" base_id="hot_search" >'; $system = &$GLOBALS['system']; $i = intval($this->_wgbar[$s]++); if(!$GLOBALS['_widgets_mdl'])$GLOBALS['_widgets_mdl'] = $system->loadModel('content/widgets'); $widgets = &$GLOBALS['_widgets_mdl']; $widgets->adminLoad($s,$i,"hot_search");echo '</div>';?></div> </div> <div class="cart"><div class="home"><?php $s=$this->_files[0];$i+=0; echo '<div class="shopWidgets_panel" base_file="'.$s.'" base_slot="'.$i.'" base_id="home1" >'; $system = &$GLOBALS['system']; $i = intval($this->_wgbar[$s]++); if(!$GLOBALS['_widgets_mdl'])$GLOBALS['_widgets_mdl'] = $system->loadModel('content/widgets'); $widgets = &$GLOBALS['_widgets_mdl']; $widgets->adminLoad($s,$i,"home1");echo '</div>';?></div><?php $s=$this->_files[0];$i+=0; echo '<div class="shopWidgets_panel" base_file="'.$s.'" base_slot="'.$i.'" base_id="cart" >'; $system = &$GLOBALS['system']; $i = intval($this->_wgbar[$s]++); if(!$GLOBALS['_widgets_mdl'])$GLOBALS['_widgets_mdl'] = $system->loadModel('content/widgets'); $widgets = &$GLOBALS['_widgets_mdl']; $widgets->adminLoad($s,$i,"cart");echo '</div>';?></div> </div> <div id="nav"> <div class="m_nav"> <div class="all_cany"> <?php $s=$this->_files[0];$i+=0; echo '<div class="shopWidgets_panel" base_file="'.$s.'" base_slot="'.$i.'" base_id="cny" >'; $system = &$GLOBALS['system']; $i = intval($this->_wgbar[$s]++); if(!$GLOBALS['_widgets_mdl'])$GLOBALS['_widgets_mdl'] = $system->loadModel('content/widgets'); $widgets = &$GLOBALS['_widgets_mdl']; $widgets->adminLoad($s,$i,"cny");echo '</div>';?></div> <div class="h_nav"><div id="Menu"><?php $s=$this->_files[0];$i+=0; echo '<div class="shopWidgets_panel" base_file="'.$s.'" base_slot="'.$i.'" base_id="h_nav" >'; $system = &$GLOBALS['system']; $i = intval($this->_wgbar[$s]++); if(!$GLOBALS['_widgets_mdl'])$GLOBALS['_widgets_mdl'] = $system->loadModel('content/widgets'); $widgets = &$GLOBALS['_widgets_mdl']; $widgets->adminLoad($s,$i,"h_nav");echo '</div>';?></div></div> <div class="r_nav"></div> </div> </div> <div class="clear"></div> <script>
if($('<?php echo $this->_vars['widgets_id']; ?>_showMore')){
	$('<?php echo $this->_vars['widgets_id']; ?>_showMore').setOpacity(.8);
}

var objMenu = document.getElementById("Menu");
if (objMenu) {
	var objs = objMenu.getElementsByTagName("A");
	
	var currentPage = document.location.href.toString();
	currentPage = currentPage.substr(currentPage.lastIndexOf("/") + 1, currentPage.length);
	
	if (currentPage.length < 1) {
		objs[0].className = "hover";
	}
	else {
	
		for (var i = 0; i < objs.length; i++) {
			var page = objs[i].href;
			
			page = page.substr(page.lastIndexOf("/") + 1, page.length);
			if (page == currentPage) 
				objs[i].className = "hover";
			
		}
	}
}

</script>