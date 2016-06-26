<?php if(!function_exists('tpl_block_help')){ require(CORE_DIR.'/admin/smartyplugin/block.help.php'); } if(!function_exists('tpl_input_select')){ require(CORE_DIR.'/include_v5/smartyplugins/input.select.php'); } if(!function_exists('tpl_input_date')){ require(CORE_DIR.'/include_v5/smartyplugins/input.date.php'); } if(!function_exists('tpl_input_default')){ require(CORE_DIR.'/include_v5/smartyplugins/input.default.php'); } ?><div class='gridlist-head'> <span style="padding-left:5px;"> 添加筛选条件：</span> <select id="finder-fshow-<?php echo $this->_vars['obj_id']; ?>-select" style="margin-right:5px;"> <option value="_"></option> <?php foreach ((array)$this->_vars['data'] as $this->_vars['key'] => $this->_vars['item']){  if( $this->_vars['item']['filtertype'] ){ ?> <option value="<?php echo $this->_vars['key']; ?>"><?php echo $this->_vars['item']['label']; ?></option> <?php }  } ?> </select> <?php $this->_tag_stack[] = array('tpl_block_help', array()); tpl_block_help(array(), null, $this); ob_start(); ?>您可以选择添加多个筛选条件<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_content = tpl_block_help($this->_tag_stack[count($this->_tag_stack) - 1][1], $_block_content, $this); echo $_block_content; array_pop($this->_tag_stack); $_block_content=''; ?> <span class="lnk" id="del-finder-<?php echo $this->_vars['obj_id']; ?>">删除所有筛选条件</span> </div> <div id="finder-fshow-<?php echo $this->_vars['obj_id']; ?>"> <div class='gridlist'> <?php foreach ((array)$this->_vars['data'] as $this->_vars['key'] => $this->_vars['item']){  if( $this->_vars['item']['filtertype'] ){ ?> <div class='row' name="<?php echo $this->_vars['key']; ?>" <?php if( !$this->_vars['item']['filterdefalut'] ){ ?>style="display:none"<?php } ?> > <div class='row-line'> <div class="span-3" tp='label'><?php echo $this->_vars['item']['label']; ?></div> <div class="span-3" tp='allege'><?php if( $this->_vars['item']['filtertype'] != 'yes'&&$this->_vars['item']['type'] != 'time' ){  echo tpl_input_select(array('options' => $this->_vars['item']['searchparams'],'required' => true,'name' => $this->_vars['key'],'search' => true), $this); }else{  if( $this->_vars['item']['type'] == 'bool' or $this->_vars['item']['type'] == 'radio' ){  }else{ ?>是<?php }  } ?>&nbsp;</div> <div class="span-6" tp='input'><?php if( $this->_vars['item']['type'] == 'time' ){  echo tpl_input_date(array('name' => $this->_vars['key'],'concat' => "_dtup"), $this);?>-<?php echo tpl_input_date(array('name' => $this->_vars['key'],'concat' => "_dtdown"), $this); }else{  $params = array();$this->input_func_map = array ( 'time' => '/include_v5/smartyplugins/input.time.php', 'intbool' => '/include_v5/smartyplugins/input.intbool.php', 'textarea' => '/include_v5/smartyplugins/input.textarea.php', 'combox' => '/include_v5/smartyplugins/input.combox.php', 'gender' => '/include_v5/smartyplugins/input.gender.php', 'radio' => '/include_v5/smartyplugins/input.radio.php', 'tinybool' => '/include_v5/smartyplugins/input.tinybool.php', 'html' => '/include_v5/smartyplugins/input.html.php', 'color' => '/include_v5/smartyplugins/input.color.php', 'region' => '/include_v5/smartyplugins/input.region.php', 'date' => '/include_v5/smartyplugins/input.date.php', 'fontset' => '/include_v5/smartyplugins/input.fontset.php', 'money' => '/include_v5/smartyplugins/input.money.php', 'default' => '/include_v5/smartyplugins/input.default.php', 'checkbox' => '/include_v5/smartyplugins/input.checkbox.php', 'select' => '/include_v5/smartyplugins/input.select.php', 'bool' => '/include_v5/smartyplugins/input.bool.php', 'object' => '/admin/smartyplugin/input.object.php', );$params['name'] = $this->_vars['key'];$params['type'] = $this->_vars['item']['type'];$params['options'] = $this->_vars['item']['options'];$params['separator'] = ' ';$params['value'] = $this->_vars['item']['default'];$params['nulloption'] = '1';if(substr($params['type'],0,7)=='object:'){ list(,$params['object'],$params['key']) = explode(':',$params['type']); $obj = str_replace('/','_',$params['object']); $func = 'tpl_input_object_'.$obj; if(!function_exists($func)){ if(isset($this->input_func_map['object_'.$obj])){ require(CORE_DIR.$this->input_func_map['object_'.$obj]); $this->_plugins['input']['object_'.$obj] = $func; }else{ $func = 'tpl_input_object'; $params['type'] = 'object'; } } }else{ $func = 'tpl_input_'.$params['type']; } if(function_exists($func)){ echo $func($params,$this); }elseif(isset($this->input_func_map[$params['type']])){ require(CORE_DIR.$this->input_func_map[$params['type']]); $this->_plugins['input'][$params['type']] = $func; echo $func($params,$this); }else{ echo tpl_input_default($params,$this); } unset($func,$params); } ?></div> <div class="span-1"><span class="opt"><img src="images/transparent.gif" title="删除" class="imgbundle _close" style="width:16px;height:16px;background-position:0 -214px;" /></span></div> </div> </div> <?php }  } ?> </div> </div> <script>
(function(){
$ES('.cal','finder-fshow-<?php echo $this->_vars['obj_id']; ?>').each(function(i){i.makeCalable()});
    var name=[];    
    $ES('.gridlist .row').each(function(el){
        if(el.getStyle('display')!='none'){
            name.include(el.get('name'));
        }    
    });
    $E('.gridlist-head select').getElements('option').each(function(el){
        name.each(function(arr){
            if(arr==el.get('value')){
                el.disabled=true;
            }        
        })        
    });

})()

var select = $('finder-fshow-<?php echo $this->_vars['obj_id']; ?>-select').addEvent('change',function(e){

    $(this.options[this.selectedIndex]).set('disabled',true);
    
    var row=$E('div[name='+this.value+']','finder-fshow-<?php echo $this->_vars['obj_id']; ?>');
    
    row.inject(row.getParent()).show();
     if($('finder-fshow-tips-<?php echo $this->_vars['obj_id']; ?>'))
    $('finder-fshow-tips-<?php echo $this->_vars['obj_id']; ?>').hide();
    
    this.selectedIndex=0;
    
});
$ES('img._close','finder-fshow-<?php echo $this->_vars['obj_id']; ?>').addEvent('click',function(e){
    var parent = this.getParent('.row').hide();
    
    $E('option[value='+parent.get('name')+']','finder-fshow-<?php echo $this->_vars['obj_id']; ?>-select').erase('disabled');
})

$ES('#finder-fshow-<?php echo $this->_vars['obj_id']; ?> input').addEvent('keydown',function(e){
    if(!$('selector-panel-<?php echo $this->_vars['obj_id']; ?>'))return;
    if(e.code==13){
            $('selector-panel-<?php echo $this->_vars['obj_id']; ?>').getElements('.scrollhandle').fireEvent('click');
    }
});

$('del-finder-<?php echo $this->_vars['obj_id']; ?>').addEvent('click',function(e){
	$ES('img._close','finder-fshow-<?php echo $this->_vars['obj_id']; ?>').each(function(el){
		el.fireEvent('click');
	});
});
</script>