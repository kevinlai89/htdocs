<?php if(!function_exists('tpl_block_area')){ require(CORE_DIR.'/admin/smartyplugin/block.area.php'); } if(!function_exists('tpl_input_default')){ require(CORE_DIR.'/include_v5/smartyplugins/input.default.php'); } ?><script>
function yanzheng(){
	if($('toCreate').value=='--'){
			alert('请先选择页面');
		}else if($('page_name').value==''){
			alert('页面名称不能为空');
		}else if(($('page_name').value).match(/[\'||\"]/)){
			alert('页面名称中不能含有单引号或双引号');
		}else if(($('extend_file_name').value).match(/^[\u4e00-\u9fa5]/g)){
			alert('文件名不能含有中文字符');
		}else if(($('extend_file_name').value!='')&&($('extend_file_name').value).match(/[\'||\"]/)){
			alert('文件名中不能含有单引号或双引号');
		}else{
	var sendvalue=$('toCreate').value+'&p[2]='+($('extend_file_name').value?encodeURIComponent($('extend_file_name').value):new Date().getTime() )+'&p[3]='+encodeURIComponent($('page_name').value);
	W.page(sendvalue);}

}
</script> <?php $this->_tag_stack[] = array('tpl_block_area', array('inject' => ".mainHead")); tpl_block_area(array('inject' => ".mainHead"), null, $this); ob_start(); ?> <div class="action-bar clearfix"> <div class="span-9 actionItems"> <div class="span-auto" ><h4><?php echo $this->_vars['templetename']; ?></h4></div> <a target="download" href="index.php?ctl=system/template&act=dlpkg&p[0]=<?php echo $this->_vars['theme']; ?>" class="sysiconBtnNoIcon">下载模板</a><a class="sysiconBtnNoIcon" href="index.php?ctl=system/tmpimage&act=index&theme=<?php echo $this->_vars['theme']; ?>">模板文件管理</a> <br /> <span class="sysiconBtnNoIcon" onClick=" if(window.confirm('确认恢复模板默认状态么？')){ W.page('index.php?ctl=system/template&act=reset&p[0]=<?php echo $this->_vars['theme']; ?>'); }">恢复默认</span><a class="sysiconBtnNoIcon" href='index.php?ctl=system/tmpimage&act=index&_systmpl=1'>功能区块管理</a></div> <div class="span-auto"> <div style=" *margin:0.6em 0 0.3em"> 创建新页面：<select name="toCreate" id="toCreate"> <option value="--">--请选择--</option> <?php foreach ((array)$this->_vars['template'] as $this->_vars['item']){ ?> <option value="index.php?ctl=system/template&act=editor&p[0]=<?php echo $this->_vars['theme']; ?>&p[1]=<?php echo $this->_vars['item']['file']; ?>"><?php echo $this->_vars['item']['name']; ?></option> <?php } ?> </select> </div> &nbsp;&nbsp;&nbsp;&nbsp;页面名称：<input name="page_name" id="page_name" type="text" style="width:80px;"/> &nbsp;&nbsp; 文件名：<input name="extend_file_name" id="extend_file_name" type="text" style="width:80px;"/><span class="info" style="color:#a7a7a7; margin:0 10px 0 2px;">留空则自动生成</span> <span class="sysiconBtn addorder" onClick="yanzheng();" >创建</span> </div> </div> <div class="gridlist"> <div class="gridlist-head"> <div class="span-5">页面名称</div> <div class="span-6">文件名</div> <div class="span-2" style="width:60px;">可视编辑</div> <div class="span-2" style="width:60px;">源码编辑</div> <div class="span-2" style="width:60px;">添加相似</div> <div class="span-2" style="width:60px;">设为默认</div> <div class="span-2" style="width:60px;">删除</div> </div> </div> <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_content = tpl_block_area($this->_tag_stack[count($this->_tag_stack) - 1][1], $_block_content, $this); echo $_block_content; array_pop($this->_tag_stack); $_block_content=''; ?> <div class="gridlist"> <div id="cat_tree" class="gridlist-list"> <?php foreach ((array)$this->_vars['page_list'] as $this->_vars['pKey'] => $this->_vars['pItem']){  if( $this->_vars['show_list'][$this->_vars['pKey']] ){ ?> <div class="clear_<?php echo $this->_vars['item']['p_node_id']; ?> row"> <div class='row-line'> <div class='span-5'> <div style="padding-left:20px;"><img src="images/transparent.gif" class="imgbundle" style="width:16px;height:16px;background-position:0 -829px;" /><?php echo $this->_vars['pItem']; ?><input type="text" style="visibility:hidden; height:14px;" /></div> </div> </div> </div> <?php foreach ((array)$this->_vars['show_list'][$this->_vars['pKey']] as $this->_vars['key'] => $this->_vars['item']){ ?> <div class="clear_<?php echo $this->_vars['item']['p_node_id']; ?> row"> <div class="row-line"> <div class="span-5" style="text-align:left;"><div style="padding-left:30px;" class="pageEdit"><img src="images/transparent.gif" class="imgbundle" style="width:12px;height:12px;background-position:0 -76px;" /> <?php if( $this->_vars['default_theme'][$this->_vars['pKey']]==$this->_vars['item']['tpl_file'] ){ ?> <strong><span class="pageName"><?php echo $this->_vars['item']['tpl_name']; ?></span>(默认)</strong> <?php }else{ ?><span class="pageName"> <?php echo $this->_vars['item']['tpl_name']; ?></span> <?php } ?><input type="text" style="visibility:hidden; height:12px;" /> </div></div> <div class="span-6" style="text-align:left; "><?php echo $this->_vars['item']['tpl_file']; ?></div> <div class="span-2" style="width:60px;"><a class='opt' href="index.php?ctl=system/template&act=widgetsSet&p[0]=<?php echo $this->_vars['theme']; ?>&p[1]=<?php echo $this->_vars['item']['tpl_file']; ?>" target='_blank'><img src="images/transparent.gif" class="imgbundle" style="width:16px;height:16px;background-position:0 -1875px;" /></a></div> <div class="span-2" style="width:60px;"><a class='opt' href="index.php?ctl=system/template&act=editor&p[0]=<?php echo $this->_vars['theme']; ?>&p[1]=<?php echo $this->_vars['item']['tpl_file']; ?>"><img src="images/transparent.gif" class="imgbundle" style="width:16px;height:16px;background-position:0 -1907px;" /></a></div> <div class="span-2" style="width:60px;"><a class='opt' href="index.php?ctl=system/template&act=copy_tpl&p[0]=<?php echo $this->_vars['theme']; ?>&p[1]=<?php echo $this->_vars['item']['tpl_file']; ?>&p[2]=<?php echo $this->_vars['pKey']; ?>"><img src="images/transparent.gif" class="imgbundle" style="width:16px;height:16px;background-position:0 -1891px;" /></a></div> <div class="span-2" style="width:60px;"> <?php if( $this->_vars['default_theme'][$this->_vars['pKey']]==$this->_vars['item']['tpl_file'] ){ ?> <span class="opt" style="cursor:auto;"><img src="images/transparent.gif" class="imgbundle" style="width:24px;height:16px;background-position:0 -1843px;" /></span> <?php }else{ ?> <a class='opt' href="index.php?ctl=system/template&act=setTemplateDefault&p[0]=<?php echo $this->_vars['theme']; ?>&p[1]=<?php echo $this->_vars['pKey']; ?>&p[2]=<?php echo $this->_vars['item']['tpl_file']; ?>"><img src="images/transparent.gif" class="imgbundle" style="width:24px;height:16px;background-position:0 -901px;" /></a> <?php } ?> </div> <?php if( $this->_vars['item']['tpl_file']!='default.html' ){ ?> <div class="span-2" style="width:60px;"><span class='opt' href="#" onclick="if(window.confirm('删除后将无法恢复，请在删除前下载备份模版，确认要删除吗？'))W.page('index.php?ctl=system/template&act=removePage&p[0]=<?php echo $this->_vars['theme']; ?>&p[1]=<?php echo $this->_vars['item']['tpl_file']; ?>');"><img src="images/transparent.gif" class="imgbundle" style="width:16px;height:16px;background-position:0 -214px;" /></span></div> <?php } ?> </div> </div> <?php }  }  } ?> </div> </div> <div class='tableform' style='margin:0;'> <h4 style="color:#369">信息提示：此处备份和应用功能只为模板设计师在制作模板时使用，一般用户无需使用。</h4> <div class="division"> <form action="index.php?ctl=system/template&act=backTemplate&template=<?php echo $this->_vars['theme']; ?>" method="post" target="{update:'messagebox'}"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <th>备份模板：</th> <td><input type="submit" value="备份"></td> </tr> </tbody> </table> </form> </div> <div class="division"> <form action="index.php?ctl=system/template&act=doBak&p[0]=<?php echo $this->_vars['theme']; ?>" method="post" target="{update:'messagebox'}"> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <tbody> <tr> <th>应用模板：</th> <td> <select name="validtemplate"> <?php foreach ((array)$this->_vars['themeslist'] as $this->_vars['item']){ ?> <option value='<?php echo $this->_vars['item']; ?>'><?php if( $this->_vars['item']=='theme.xml' ){ ?>默认<?php }  if( $this->_vars['item']=='theme-bak.xml' ){ ?>备份<?php } ?></option> <?php } ?> </select></td> <td><input type="submit" value="应用"></td> </tr> </tbody> </table> </form> </div> <?php if( $this->_vars['config'] ){ ?> <form class="tableform" action="index.php?ctl=system/template&act=saveConfig" method="post" > <div class="division"> <h5>模板全局参数设置</h5> <table width="100%" cellspacing="0" cellpadding="0" border="0"> <?php foreach ((array)$this->_vars['config'] as $this->_vars['key'] => $this->_vars['item']){  if( $this->_vars['item']['label'] ){ ?> <tr> <th><?php echo $this->_vars['item']['label']; ?>：</th> <td><?php if( $this->_vars['item']['type']=='select' && $this->_vars['item']['images'] ){  foreach ((array)$this->_vars['item']['options'] as $this->_vars['optkey'] => $this->_vars['optitem']){ ?> <label style="float:left;margin:10px;text-align:center;padding:0;display:block;width:auto" for="cfg-<?php echo $this->_vars['theme']; ?>-<?php echo $this->_vars['key']; ?>-<?php echo $this->_vars['optkey']; ?>"><img style="height:50px;width:50px" src="../themes/<?php echo $this->_vars['theme']; ?>/<?php echo $this->_vars['item']['images'][$this->_vars['optkey']]; ?>" /><br /> <?php if( $this->_vars['optitem']==$this->_vars['item']['value'] ){ ?>checked="checked"<?php } ?> type="radio" id="cfg-<?php echo $this->_vars['theme']; ?>-<?php echo $this->_vars['key']; ?>-<?php echo $this->_vars['optkey']; ?>"><?php echo $this->_vars['optitem']; ?> <input name="config[<?php echo $this->_vars['item']['key']; ?>]" value="<?php echo $this->_vars['optkey']; ?>" <?php if( $this->_vars['optitem']==$this->_vars['item']['value'] ){ ?>checked="checked"<?php } ?> type="radio" id="cfg-<?php echo $this->_vars['theme']; ?>-<?php echo $this->_vars['key']; ?>-<?php echo $this->_vars['optkey']; ?>"><?php echo $this->_vars['optitem']; ?> </label> <?php }  }else{  $params = $this->_vars['item'];$this->input_func_map = array ( 'time' => '/include_v5/smartyplugins/input.time.php', 'intbool' => '/include_v5/smartyplugins/input.intbool.php', 'textarea' => '/include_v5/smartyplugins/input.textarea.php', 'combox' => '/include_v5/smartyplugins/input.combox.php', 'gender' => '/include_v5/smartyplugins/input.gender.php', 'radio' => '/include_v5/smartyplugins/input.radio.php', 'tinybool' => '/include_v5/smartyplugins/input.tinybool.php', 'html' => '/include_v5/smartyplugins/input.html.php', 'color' => '/include_v5/smartyplugins/input.color.php', 'region' => '/include_v5/smartyplugins/input.region.php', 'date' => '/include_v5/smartyplugins/input.date.php', 'fontset' => '/include_v5/smartyplugins/input.fontset.php', 'money' => '/include_v5/smartyplugins/input.money.php', 'default' => '/include_v5/smartyplugins/input.default.php', 'checkbox' => '/include_v5/smartyplugins/input.checkbox.php', 'select' => '/include_v5/smartyplugins/input.select.php', 'bool' => '/include_v5/smartyplugins/input.bool.php', 'object' => '/admin/smartyplugin/input.object.php', );$params['name'] = "config[{$this->_vars['item']['key']}]";if(substr($params['type'],0,7)=='object:'){ list(,$params['object'],$params['key']) = explode(':',$params['type']); $obj = str_replace('/','_',$params['object']); $func = 'tpl_input_object_'.$obj; if(!function_exists($func)){ if(isset($this->input_func_map['object_'.$obj])){ require(CORE_DIR.$this->input_func_map['object_'.$obj]); $this->_plugins['input']['object_'.$obj] = $func; }else{ $func = 'tpl_input_object'; $params['type'] = 'object'; } } }else{ $func = 'tpl_input_'.$params['type']; } if(function_exists($func)){ echo $func($params,$this); }elseif(isset($this->input_func_map[$params['type']])){ require(CORE_DIR.$this->input_func_map[$params['type']]); $this->_plugins['input'][$params['type']] = $func; echo $func($params,$this); }else{ echo tpl_input_default($params,$this); } unset($func,$params); } ?> </td> </tr> <?php }  } ?> </table> <center><b class="submitBtn"> <input type="submit" value="保存配置信息"> </b></center> </div> </form> <?php } ?> </div> <?php $this->_tag_stack[] = array('tpl_block_area', array('inject' => '.mainFoot')); tpl_block_area(array('inject' => '.mainFoot'), null, $this); ob_start();  $_block_content = ob_get_contents(); ob_end_clean(); $_block_content = tpl_block_area($this->_tag_stack[count($this->_tag_stack) - 1][1], $_block_content, $this); echo $_block_content; array_pop($this->_tag_stack); $_block_content=''; ?> <div action="index.php?ctl=<?php echo $_GET['ctl']; ?>&act=tempalte_rename" class='cell-edit-action' id="cell-edit-action" style="visibility:hidden;position:absolute;border:3px solid #6ea3f8; padding:8px; background:#eff6ff;z-index:66666;"> <input type="hidden" value="" name="p[0]" /><input type="text" class="x-input " name="p[1]" autocomplete="off"/> <input type="hidden" value="<?php echo $this->_vars['theme']; ?>" name="p[2]"/> <br/> <button type="submit" class="btn"><span><span><img src="images/transparent.gif" class="imgbundle icon" style="width:24px;height:16px;background-position:0 -1843px;" />保存</span></span></button> <button type="button" style="margin-left:3em" class="btn"><span><span>取消</span></span></button> </div> <script>
var editInput=new Class({
	Implements:[Events],
	initialize:function(options){
    	this.editObj=options.edit;
		this.input=$E(options.input,this.editObj);
		this.button=$E(options.button,this.editObj);
		this.cancel=$E(options.cancel,this.editObj);
		this.init();
	},
	init:function(){
		var that=this;
		this.editObj.addEvents({
			'show':function(target){
				this.setStyles({visibility:'visible',opacity:0});
				var leftSpace=target.getPosition().x+100;
				var topSpace=target.getPosition().y;
				this.retrieve('fx',new Fx.Styles(this,{link:'cancel',duration:400,transition:Fx.Transitions.Quint.easeOut})).start({opacity:1});
				this.setStyles({'left':leftSpace,'top':topSpace});
				this.getElement('input[type=hidden]').set('value',target.get('text'));
				that.input.set('value',target.get('text'));
				this.store('getobj',target);
			},
			'hide':function(){
				this.setStyle('visibility','hidden');
			}
		});

		this.button.addEvent('click',function(e){
			var data=this.editObj.toQueryString();
			var inputValue=this.input.get('value').trim();
			if(!inputValue){MessageBox.error('请输入页面名称!');return;}
			if(inputValue.match(/[\'||\"]/)){MessageBox.error('页面名称中不能含有单引号或双引号!');return;}
			var that=this;
			W.page(this.editObj.get('action'),{update:'messagebox',method: 'get', data:data,
				onComplete:function(){
					that.editObj.retrieve('getobj').set('text',that.input.get('value'));
					$('loadMask').hide();
				}
			});
			this.editObj.fireEvent('hide');
		}.bind(this));

		this.cancel.addEvent('click',function(e){
			this.editObj.fireEvent('hide');
		}.bind(this));
	}
});

var options={'edit':$('cell-edit-action'),'input':'input[type=text]','button':'button[type=submit]','cancel':'button[type=button]'};
var edit=new editInput(options);

$ES('#cat_tree .pageEdit').addEvent('dblclick',function(e){
	$('cell-edit-action').fireEvent('show',this.getElement('.pageName'));
});


</script> 