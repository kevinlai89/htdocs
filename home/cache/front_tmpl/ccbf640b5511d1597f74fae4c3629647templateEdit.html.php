<?php if(!function_exists('tpl_block_capture')){ require(CORE_DIR.'/include_v5/smartyplugins/block.capture.php'); }  $this->_tag_stack[] = array('tpl_block_capture', array('name' => "header")); tpl_block_capture(array('name' => "header"), null, $this); ob_start(); ?> <!--JAVASCRIPTS SRC--> <script type="text/javascript" src="js/package/tools.js"></script> <script type="text/javascript" src="js/package/component.js"></script> <script type="text/javascript" src="js/package/wysiwyg.js"></script> <!--JAVASCRIPTS SRC END--> <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_content = tpl_block_capture($this->_tag_stack[count($this->_tag_stack) - 1][1], $_block_content, $this); echo $_block_content; array_pop($this->_tag_stack); $_block_content=''; ?> <script>
   function _addWeigets(args){
      var themeFrame=$('themeFrame').contentWindow;
    
      var shopWidgetsOBJ=themeFrame.shopWidgets;
        _widgetsDialog?_widgetsDialog.close():'';
        _widgetsDialog=null;
        shopWidgetsOBJ.ghostDrop(args[0],args[1]);
        themeFrame.focus();
   }
   function _showWidgets_tip(message){
  
if($E('input[name=noshownext]','wd_add_tip').checked)return;
     var tip=$('wd_add_tip');
   var msg=$E('.message',tip);
   msg.setText(message);
     var pos=$("widgets_workground").getPosition($('popPanel'));
   tip.setStyles({
      left:pos.x,
    top:pos.y
   }).setStyle('visibility','visible');
   }
   function _showWidgetsDialog(url){
    _widgetsDialog=new Dialog(url,{width:770,height:500,title:'增加页面版块',modal:true,resizeable:false,onShow:function(e){
     this.dialog_body.id='dialogContent';
  }});
   }
   function _hideWidgets_tip(){
      return $('wd_add_tip').setStyle('visibility','hidden');
   }
   function _saveWidgets(){
    return $("themeFrame").contentWindow.shopWidgets.saveWidgets();
   }
   
   function _infoTrigger(){
     var el = $('save_info');
  if(el.getStyle('display') == 'none'){
    el.setStyles('display', 'inline');
  }else{
    el.setStyle('display', 'none');
  }
   }
	 
	 $('main').setStyle('overflow','hidden');
	 
</script> <?php $this->_tag_stack[] = array('tpl_block_capture', array('name' => "title")); tpl_block_capture(array('name' => "title"), null, $this); ob_start(); ?> <div id="wg_toolbar"> <h1><img src="images/transparent.gif" class="imgbundle" style="width:16px;height:16px;background-position:0 -2235px;" /><strong>正在编辑：</strong><?php echo $this->_vars['viewname']; ?>(<?php echo $this->_vars['view']; ?>)</h1> <div class="action-bar"> <span class="action-bar-btns" onclick="_showWidgetsDialog('index.php?ctl=system/template&act=addWidgetsPage&p[0]=<?php echo $this->_vars['theme']; ?>')" style="margin-right:3px;"><span><input type="button" class="btn-addwgt" value="添加版块" /></span></span> <span class="action-bar-btns" onclick='if(confirm("确定保存您对当前页面的修改吗?"))_saveWidgets()' onmouseover="_infoTrigger()" onmouseout="_infoTrigger()"><span><input type="button" class="btn-savewgt" value="保存修改" /></span></span> <span class="save-info" id="save_info" style="display:none;">保存修改后，对页面的修改才会生效。</span> </div> <ul class="btn-bar"> <li><button onclick='if(confirm("确定退出模板编辑吗?"))window.close();' type="button" class="btn btn-quit"><span><span>退出编辑</span></span></button></li> <li><a type="link" target="_blank" href="../" class="btn btn-save"><span><span>浏览商店</span></span></a></li> </ul> </div> <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_content = tpl_block_capture($this->_tag_stack[count($this->_tag_stack) - 1][1], $_block_content, $this); echo $_block_content; array_pop($this->_tag_stack); $_block_content=''; ?> <div id='wd_add_tip' class='success' style='visibility:hidden;position:absolute;zIndex:65535;'> <span class='message'> </span> <span onclick='_hideWidgets_tip()' style='cursor:pointer;'> <font color=red> <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;关闭提示</strong> </font> </span> <span><input name='noshownext' type='checkbox'/>下次不提示.</span> </div> <div style='height:100%' id='widgets_workground'> <iframe id="themeFrame" frameborder="0" width='100%' height='100%' src="index.php?ctl=system/template&act=templetePreview&p[0]=<?php echo $this->_vars['theme']; ?>&p[1]=<?php echo $this->_vars['view']; ?>"></iframe> </div> 