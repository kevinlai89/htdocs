<?php if(!function_exists('tpl_block_area')){ require(CORE_DIR.'/admin/smartyplugin/block.area.php'); } if(!function_exists('tpl_block_help')){ require(CORE_DIR.'/admin/smartyplugin/block.help.php'); } if(!function_exists('tpl_modifier_userdate')){ require(CORE_DIR.'/include_v5/smartyplugins/modifier.userdate.php'); }  $this->_tag_stack[] = array('tpl_block_area', array('inject' => ".mainHead")); tpl_block_area(array('inject' => ".mainHead"), null, $this); ob_start(); ?> <div class="clearfix ColColorGray borderup" style="padding:0 15px"> <h4>什么是应用？</h4> <p class="info" style="margin-bottom:10px"> 应用是指基于易开店系统所开发的第三方程序功能，譬如整合淘宝的一系列功能，您可以点击下面按钮去挑选所需要的应用，然后安装即可开始使用。 </p> <h4>安装应用的好处？</h4> <p class="info"> 安装应用后您可以更方便、更快捷地管理您的网店，提升工作效率，例如同步管理淘宝商品、处理订单、下载记录等让您在ShopEx上跨平台处理业务，方便省事，高效便捷！ <br class="clear"> <a href="http://www.shopex.cn/bbs/read.php?tid-148322-keyword-%D3%A6%D3%C3%D6%D0%D0%C4.html" style="float:right; color:#4F78C0;" target="_blank" ><img src="images/bundle/user_comment.png" class="imgbundle" style="background-image: none;" />使用反馈</a> <button style="margin-top:8px" type="button" onclick='new Dialog("index.php?ctl=system/appmgr&act=app_onlince",{onShow:function(e){ this.dialog_body.id="dialogContent"; },title:"应用中心",width:870,height:630,onClose:function(){W.page("index.php?ctl=system/appmgr&act=index");}})' class="btn"><span><span><img src="images/transparent.gif" class="imgbundle icon" style="width:16px;height:16px;background-position:0 -149px;" />挑选应用</span></span></button> </p> </div> <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_content = tpl_block_area($this->_tag_stack[count($this->_tag_stack) - 1][1], $_block_content, $this); echo $_block_content; array_pop($this->_tag_stack); $_block_content=''; ?> <script>
Cookie.write('newTip:tb', 'true');
new Request.JSON({
    url: 'index.php?ctl=default&act=getAppChange', 
    onComplete: function(response){
        if(response.update_count == 0){
            if($('app-num-update')) $('app-num-update').dispose();
            return;
        }
        if(response.update_count > 0){
            if ($('app-num-update')) {
                $('app-num-update').set('html', '('+response.update_count+')');
            } else {
                new Element('a', {html: '('+response.update_count+')', id:'app-num-update', href:'index.php?ctl=system/appmgr&act=index', title:'应用有更新'}).setStyle('padding', '0').inject($('top-tab-tools'), 'after');
            };
        }
    }
}).send();
(function(){
<?php foreach ((array)$this->_vars['apps'] as $this->_vars['key'] => $this->_vars['app']){ ?>
if(obj = $("help_link[<?php echo $this->_vars['app']['plugin_ident']; ?>]")){
    obj.addEvent("click",function(){
        new Request().post('index.php?ctl=system/appmgr&act=appkey_count',{app_key:'<?php echo $this->_vars['app']['plugin_ident']; ?>',type:'app_help',version:'<?php echo $this->_vars['app']['plugin_version']; ?>'});
    });
}
<?php } ?>
})();
</script> <div class="apps-wrapper"> <h4>已安装的应用</h4> <div class="app-list-wrap"> <?php foreach ((array)$this->_vars['apps'] as $this->_vars['key'] => $this->_vars['app']){  if( $this->_vars['key']!=='update_count' ){ ?> <div class="app-item clearfix"> <!--<div class="app-img"> <a href="index.php?ctl=system/appmgr&act=view&p[0]=<?php echo $this->_vars['app']['plugin_ident']; ?>"> <img src="<?php if( $this->_vars['app']['icon'] ){  echo $this->_vars['app']['icon'];  }else{ ?>images/type-app.png<?php } ?>?<?php echo time(); ?>" width="80" height="80"/> </a> </div>--> <div class="app-opt"> <?php if( $this->_vars['app']['disabled'] == 'false' ){  if( $this->_vars['app']['has_setting']==1 ){ ?> <button onclick="<?php echo "W.page('index.php?ctl=system/appmgr&act=setting&p[0]={$this->_vars['app']['plugin_ident']}&operation_type=config&version={$this->_vars['app']['plugin_version']}')";?>" type="button" class="btn"><span><span>应用配置</span></span></button> <?php }  if( $this->_vars['app']['custom_setting'] ){ ?> <button class="btn" type="button" onclick="W.page('<?php echo $this->_vars['app']['custom_setting']; ?>')"><span><span>应用配置</span></span></button> <?php } ?> <button onclick="<?php echo "W.page('index.php?ctl=system/appmgr&act=disable&p[0]={$this->_vars['app']['plugin_ident']}&operation_type=stop&version={$this->_vars['app']['plugin_version']}')";?>" type="button" class="btn"><span><span>禁用</span></span></button> <?php }else{  if( $this->_vars['app']['status'] != 'used' ){ ?> <button onclick="<?php echo "W.page('index.php?ctl=system/appmgr&act=install&p[0]={$this->_vars['app']['plugin_ident']}')";?>" type="button" class="btn"><span><span><img src="images/transparent.gif" class="imgbundle icon" style="width:14px;height:14px;background-position:0 -88px;" />启用</span></span></button> <?php }else{ ?> <button onclick="<?php echo "W.page('index.php?ctl=system/appmgr&act=enable&p[0]={$this->_vars['app']['plugin_ident']}&operation_type=start&version={$this->_vars['app']['plugin_version']}')";?>" type="button" class="btn"><span><span><img src="images/transparent.gif" class="imgbundle icon" style="width:14px;height:14px;background-position:0 -88px;" />启用</span></span></button> <?php if( $this->_vars['app']['plugin_struct']['props']['uninstall'] != 'false' ){ ?> <button onclick="<?php echo "W.page('index.php?ctl=system/appmgr&act=uninstall&p[0]={$this->_vars['app']['plugin_ident']}')";?>" type="button" class="btn"><span><span>卸载</span></span></button> <?php }  }  } ?> </div> <h6 class="app-title"><a href="index.php?ctl=system/appmgr&act=view&p[0]=<?php echo $this->_vars['app']['plugin_ident']; ?>"><?php echo $this->_vars['app']['plugin_name']; ?></a> <?php if( $this->_vars['app']['plugin_struct']['props']['app_id'] ){ ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" onclick="new Dialog('index.php?ctl=system/appmgr&act=dofeedback&p[0]=<?php echo $this->_vars['app']['plugin_struct']['props']['app_id']; ?>',{onShow:function(e){ this.dialog_body.id='dialogContent'; },title:'使用反馈',width:520,height:400,onClose:function(){W.page('index.php?ctl=system/appmgr&act=index');}});"><img src="images/bundle/user_comment.png" class="imgbundle" style="background-image: none;" />使用反馈 </a> <?php }  if( $this->_vars['app']['unset_setting'] ){ ?>&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#f00;">该应用未配置</span><?php }  if( $this->_vars['app']['plugin_struct']['props']['help'] ){ ?><span id="help_link[<?php echo $this->_vars['app']['plugin_ident']; ?>]"><?php $this->_tag_stack[] = array('tpl_block_help', array('href' => $this->_vars['app']['plugin_struct']['props']['help'],'type' => "link")); tpl_block_help(array('href' => $this->_vars['app']['plugin_struct']['props']['help'],'type' => "link"), null, $this); ob_start(); ?>点击查看帮助<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_content = tpl_block_help($this->_tag_stack[count($this->_tag_stack) - 1][1], $_block_content, $this); echo $_block_content; array_pop($this->_tag_stack); $_block_content=''; ?></span><?php } ?></h6> <div class="app-info"> <ul> <li><span class="label">作者</span> <?php if( $this->_vars['app']['plugin_author'] ){ ?> <a href="<?php echo $this->_vars['app']['plugin_website']; ?>" target="_blank" ><?php echo $this->_vars['app']['plugin_author']; ?></a> <?php }else{  echo $this->_vars['app']['plugin_author'];  } ?> </li> <li><span class="label">版本</span><span> <?php echo $this->_vars['app']['plugin_version']; ?></span></li> <li><span class="label">更新时间</span> <?php echo tpl_modifier_userdate($this->_vars['app']['update_time']); ?></li> </ul> <?php if( $this->_vars['app']['new_version'] ){ ?><p class="app-update notice">有更新，最新版本<?php echo $this->_vars['app']['new_version']; ?><span class="lnk" onclick="new Dialog('index.php?ctl=system/appmgr&act=install_update&url=<?php echo $this->_vars['app']['download_url']; ?>&app_status=<?php echo $this->_vars['app']['status']; ?>&app_ident=<?php echo $this->_vars['app']['plugin_ident']; ?>&app_version=<?php echo $this->_vars['app']['new_version']; ?>',{onShow:function(e){ this.dialog_body.id='dialogContent'; },title:'更新应用',width:800,height:560,onClose:function(){W.page('index.php?ctl=system/appmgr&act=index');}});">开始更新</span><span class="lnk" onclick="new Dialog('index.php?ctl=system/appmgr&act=viewUpdateInfo&app_ident=<?php echo $this->_vars['app']['plugin_ident']; ?>&app_new_version=<?php echo $this->_vars['app']['new_version']; ?>&app_version=<?php echo $this->_vars['app']['plugin_version']; ?>&download_url=<?php echo $this->_vars['app']['download_url']; ?>&app_status=<?php echo $this->_vars['app']['status']; ?>',{onShow:function(e){ this.dialog_body.id='dialogContent'; },title:'应用更新说明',width:400,height:280,onClose:function(){W.page('index.php?ctl=system/appmgr&act=index');}});new Request().post('index.php?ctl=system/appmgr&act=appkey_count',{app_key:'<?php echo $this->_vars['app']['plugin_ident']; ?>',type:'update_view',version:'<?php echo $this->_vars['app']['new_version']; ?>'});">查看详细</span></p><?php } ?> </div> <!--<div class="app-desc"><?php echo $this->_vars['app']['plugin_desc']; ?></div>--> </div> <?php }  } ?> </div> </div>