<?php if(!function_exists('tpl_function_footer')){ require(CORE_DIR.'/include_v5/smartyplugins/function.footer.php'); } ?><div id="m_foot"> <div class="m_f_01"></div> <div class="m_f_02"> <div class="f_02_left"> <ul> <li><?php unset($this->_vars);$setting = array ( 'showroot' => 'true', 'treenum' => '2', 'treelistnum' => '69', );$this->bundle_vars['setting'] = &$setting;if(!function_exists('widget_treelist')){require(PLUGIN_DIR.'/widgets/treelist/widget_treelist.php');}$this->_vars = array('data'=>widget_treelist($setting,$GLOBALS['system']),'widgets_id'=>'76');ob_start();?><div class="TreeList"> <?php echo $this->_vars['data']; ?> </div><?php $body = str_replace('%THEME%','{ENV_theme_dir}',ob_get_contents());ob_end_clean();echo '<div id="76">',$body,'</div>';unset($body);$setting=null;$this->_vars = &$this->pagedata;?></li> <li><?php unset($this->_vars);$setting = array ( 'showroot' => 'true', 'treenum' => '2', 'treelistnum' => '75', );$this->bundle_vars['setting'] = &$setting;if(!function_exists('widget_treelist')){require(PLUGIN_DIR.'/widgets/treelist/widget_treelist.php');}$this->_vars = array('data'=>widget_treelist($setting,$GLOBALS['system']),'widgets_id'=>'77');ob_start();?><div class="TreeList"> <?php echo $this->_vars['data']; ?> </div><?php $body = str_replace('%THEME%','{ENV_theme_dir}',ob_get_contents());ob_end_clean();echo '<div id="77">',$body,'</div>';unset($body);$setting=null;$this->_vars = &$this->pagedata;?></li> <li><?php unset($this->_vars);$setting = array ( 'showroot' => 'true', 'treenum' => '2', 'treelistnum' => '81', );$this->bundle_vars['setting'] = &$setting;if(!function_exists('widget_treelist')){require(PLUGIN_DIR.'/widgets/treelist/widget_treelist.php');}$this->_vars = array('data'=>widget_treelist($setting,$GLOBALS['system']),'widgets_id'=>'78');ob_start();?><div class="TreeList"> <?php echo $this->_vars['data']; ?> </div><?php $body = str_replace('%THEME%','{ENV_theme_dir}',ob_get_contents());ob_end_clean();echo '<div id="78">',$body,'</div>';unset($body);$setting=null;$this->_vars = &$this->pagedata;?></li> <li><?php unset($this->_vars);$setting = array ( 'showroot' => 'true', 'treenum' => '2', 'treelistnum' => '87', );$this->bundle_vars['setting'] = &$setting;if(!function_exists('widget_treelist')){require(PLUGIN_DIR.'/widgets/treelist/widget_treelist.php');}$this->_vars = array('data'=>widget_treelist($setting,$GLOBALS['system']),'widgets_id'=>'79');ob_start();?><div class="TreeList"> <?php echo $this->_vars['data']; ?> </div><?php $body = str_replace('%THEME%','{ENV_theme_dir}',ob_get_contents());ob_end_clean();echo '<div id="79">',$body,'</div>';unset($body);$setting=null;$this->_vars = &$this->pagedata;?></li> <li><?php unset($this->_vars);$setting = array ( 'showroot' => 'true', 'treenum' => '2', 'treelistnum' => '81', );$this->bundle_vars['setting'] = &$setting;if(!function_exists('widget_treelist')){require(PLUGIN_DIR.'/widgets/treelist/widget_treelist.php');}$this->_vars = array('data'=>widget_treelist($setting,$GLOBALS['system']),'widgets_id'=>'80');ob_start();?><div class="TreeList"> <?php echo $this->_vars['data']; ?> </div><?php $body = str_replace('%THEME%','{ENV_theme_dir}',ob_get_contents());ob_end_clean();echo '<div id="80">',$body,'</div>';unset($body);$setting=null;$this->_vars = &$this->pagedata;?></li> </ul> </div> </div> <div class="m_f_03"></div> <div class="clear"></div> <div class="n_foot"> <?php unset($this->_vars);$setting = array ( 'usercustom' => '<a href="#">关于我们</a>|<a href="#">联系我们</a>|<a href="#">人才招聘</a>|<a href="#">商家入驻</a>', );$this->bundle_vars['setting'] = &$setting;$this->_vars = array('widgets_id'=>'81');ob_start();?><a href="#">关于我们</a>|<a href="#">联系我们</a>|<a href="#">人才招聘</a>|<a href="#">商家入驻</a><?php $body = str_replace('%THEME%','{ENV_theme_dir}',ob_get_contents());ob_end_clean();echo '<div id="81">',$body,'</div>';unset($body);$setting=null;$this->_vars = &$this->pagedata;?> </div> <div class="n_foot"> <?php echo tpl_function_footer(array(), $this);?> </div> </div> </body></html> 