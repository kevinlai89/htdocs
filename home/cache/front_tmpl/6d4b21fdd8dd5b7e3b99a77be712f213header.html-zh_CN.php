<?php if(!function_exists('tpl_function_header')){ require(CORE_DIR.'/include_v5/smartyplugins/function.header.php'); } if(!function_exists('tpl_modifier_storager')){ require(CORE_DIR.'/include_v5/smartyplugins/modifier.storager.php'); } if(!function_exists('tpl_input_default')){ require(CORE_DIR.'/include_v5/smartyplugins/input.default.php'); } if(!function_exists('tpl_function_counter')){ require(CORE_DIR.'/include_v5/smartyplugins/function.counter.php'); } ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> <html xmlns="http://www.w3.org/1999/xhtml"> <head> <?php echo tpl_function_header(array(), $this);?> <link rel="stylesheet" type="text/css" href="<?php echo $this->_plugins['function']['respath'][0]->_respath(array('type' => "user",'name' => "360buy"), $this);?>images/css.css" /> </head> <body> <div id="shortcut"> <div class="shortcut"> <div class="shor_left"><?php unset($this->_vars);$setting = false;$this->bundle_vars['setting'] = &$setting;$this->_vars = array('widgets_id'=>'89');ob_start();?><div class="AdvBanner"> <?php if( $this->_vars['setting']['ad_text_link'] ){ ?> <a href="<?php echo $this->_vars['setting']['ad_text_link']; ?>" style="<?php if( $this->_vars['setting']['ad_text_color'] ){ ?>color:<?php echo $this->_vars['setting']['ad_text_color']; ?>;<?php }  if( $this->_vars['setting']['border'] ){ ?>font-weight: bold;<?php }  if( $this->_vars['setting']['ad_text_size'] ){ ?>font-size:<?php echo $this->_vars['setting']['ad_text_size']; ?>px;<?php } ?>"><?php echo $this->_vars['setting']['ad_content']; ?></a> <?php }else{ ?> <span style="<?php if( $this->_vars['setting']['ad_text_color'] ){ ?>color:<?php echo $this->_vars['setting']['ad_text_color']; ?>;<?php }  if( $this->_vars['setting']['ad_text_size'] ){ ?>font-size: <?php echo $this->_vars['setting']['ad_text_size']; ?>px;<?php }  if( $this->_vars['setting']['border'] ){ ?>font-weight: bold;<?php }  if( $this->_vars['setting']['ad_text_size'] ){ ?>font-size:<?php echo $this->_vars['setting']['ad_text_size']; ?>px;<?php } ?>"><?php echo $this->_vars['setting']['ad_content']; ?></span> <?php } ?> </div> <?php $body = str_replace('%THEME%','{ENV_theme_dir}',ob_get_contents());ob_end_clean();echo '<div id="89">',$body,'</div>';unset($body);$setting=null;$this->_vars = &$this->pagedata;?></div> <div class="shor_right"><div class="buz"><?php unset($this->_vars);$setting = array ( 'usercustom' => '<a href="#">客户服务</a><span class="fr"></span><a href="#">企业服务</a><span class="fr"></span><a href="#">我的订单</a>', );$this->bundle_vars['setting'] = &$setting;$this->_vars = array('widgets_id'=>'90');ob_start();?><a href="#">客户服务</a><span class="fr"></span><a href="#">企业服务</a><span class="fr"></span><a href="#">我的订单</a><?php $body = str_replace('%THEME%','{ENV_theme_dir}',ob_get_contents());ob_end_clean();echo '<div id="90">',$body,'</div>';unset($body);$setting=null;$this->_vars = &$this->pagedata;?></div><div class="mamber"><?php unset($this->_vars);$setting = array ( );$this->bundle_vars['setting'] = &$setting;if(!function_exists('widget_member')){require(PLUGIN_DIR.'/widgets/member/widget_member.php');}$this->_vars = array('data'=>widget_member($setting,$GLOBALS['system']),'widgets_id'=>'91');ob_start();?><script>
window.addEvent('domready',function(){
     var barId ="<?php echo $this->_vars['widgets_id']; ?>";
     if(Cookie.get('S[UNAME]')){$('uname_'+barId).setText('：'+Cookie.get('S[UNAME]'));}
});
</script> <div class="clearfix" style="float:right"> <div class="wel-wrap" style="float:left">您好<span id="uname_<?php echo $this->_vars['widgets_id']; ?>"><?php if( $_COOKIE['UNAME'] ){  } ?></span>！</div> <?php if( !$_COOKIE['MEMBER'] ){ ?> <div id="loginBar_<?php echo $this->_vars['widgets_id']; ?>" class="login-wrap"> <?php foreach ((array)$this->_vars['data']['login_content'] as $this->_vars['login']){  echo $this->_vars['login'];  } ?> <a href="<?php echo "passport",(((is_numeric(passport) && 'index'==login) || !login)?'':'-'.login),'.html';?>">[请登录]</a> <a href="<?php echo "passport",(((is_numeric(passport) && 'index'==signup) || !signup)?'':'-'.signup),'.html';?>">[免费注册]</a> <?php if( $this->_vars['data']['open_id_open'] ){ ?> <span> [<a class="trustlogin trust__login" href="javascript:void(0)">信任登录</a>] </span>&nbsp;&nbsp; <!-- <div id="accountlogin" > <h5>您还可以使用以下帐号登录：</h5> <div class="logoimg"> <span><img src="statics/accountlogos/trustlogo1_small.gif" /></span> <span><img src="statics/accountlogos/trustlogo2_small.gif" /></span> <span><img src="statics/accountlogos/trustlogo3_small.gif" /></span> <span><img src="statics/accountlogos/trustlogo4_small.gif" /></span> <!-- <span><img src="statics/accountlogos/trustlogo5_small.gif" /></span> </div> <div class="more"><a href="#">更多»</a></div> </div> --> <?php } ?> </div> <?php }else{ ?> <span id="memberBar_<?php echo $this->_vars['widgets_id']; ?>"> <a href="<?php echo "member",(((is_numeric(member) && 'index'==index) || !index)?'':'-'.index),'.html';?>">[会员中心]</a>&nbsp;&nbsp; <a href="<?php echo "passport",(((is_numeric(passport) && 'index'==logout) || !logout)?'':'-'.logout),'.html';?>">[退出]</a> </span> <?php } ?> </div> <?php if( $this->_vars['data']['open_id_open'] && !$_COOKIE['MEMBER'] ){ ?> <style id='thridpartystyle'> .trustlogin { background:url(statics/icons/thridparty1.gif) no-repeat left; padding-left:18px; height:20px; line-height:20px; } #accountlogin{visibility:hidden;cursor:pointer;padding-top:0px; } </style> <script>
(function(){
    var loginBtn=$ES('.trust__login','loginBar_<?php echo $this->_vars['widgets_id']; ?>'),timer;
    $$(loginBtn,$('accountlogin')).addEvents({'mouseenter':function(){
            if(timer)$clear(timer);
            $('accountlogin').setStyles({'visibility':'visible','top':'20','left':'10'});
        },'mouseleave':function(){
            timer=function(){$('accountlogin').setStyle('visibility','hidden')}.delay(200);
        }
    });
    $('accountlogin').addEvent('click',function(e){loginBtn.fireEvent('click');})
})();
</script> <?php }  $body = str_replace('%THEME%','{ENV_theme_dir}',ob_get_contents());ob_end_clean();echo '<div id="91">',$body,'</div>';unset($body);$setting=null;$this->_vars = &$this->pagedata;?></div></div> </div> </div> <div id="m_top"> <div class="logo"><?php unset($this->_vars);$setting = array ( );$this->bundle_vars['setting'] = &$setting;$this->_vars = array('widgets_id'=>'87');ob_start();?><a href="./"><img src="<?php echo tpl_modifier_storager($this->system->getConf('site.logo')); ?>" border="0"/></a><?php $body = str_replace('%THEME%','{ENV_theme_dir}',ob_get_contents());ob_end_clean();echo '<div id="87">',$body,'</div>';unset($body);$setting=null;$this->_vars = &$this->pagedata;?></div> <div class="hot_stuch"> <div class="hot_bbx"> <?php unset($this->_vars);$setting = array ( );$this->bundle_vars['setting'] = &$setting;if(!function_exists('widget_search')){require(PLUGIN_DIR.'/widgets/search/widget_search.php');}$this->_vars = array('data'=>widget_search($setting,$GLOBALS['system']),'widgets_id'=>'88');ob_start();?><form action="<?php echo "search",(((is_numeric(search) && 'index'==result) || !result)?'':'-'.result),'.html';?>" method="post" class="SearchBar"> <table cellpadding="0" cellspacing="0"> <tr> <td class="search_label"> <span>关键字：</span> <input name="name[]" size="10" class="inputstyle keywords" value="<?php echo $this->_vars['setting']['search']; ?>" /> </td> <?php if( $this->_vars['setting']['searchopen'] ){ ?> <td class="search_price1">价格从 <?php echo tpl_input_default(array('name' => "price[0]",'type' => "number",'size' => "4",'class' => "inputstyle gprice_from"), $this);?></td> <td class="search_price2">到<?php echo tpl_input_default(array('name' => "price[1]",'type' => "number",'size' => "4",'class' => "inputstyle gprice_to"), $this);?></td> <?php } ?> <td><input type="submit" value="搜索" class="btn_search" onfocus='this.blur();'/> </td> <td><a href="<?php echo "search",(((is_numeric("search") && 'index'=="index") || !"index")?'':'-'."index"),'.html';?>" class="btn_advsearch">高级搜索</a> </td> </tr> </table> </form> <?php $body = str_replace('%THEME%','{ENV_theme_dir}',ob_get_contents());ob_end_clean();echo '<div id="88">',$body,'</div>';unset($body);$setting=null;$this->_vars = &$this->pagedata;?> </div> <div class="bbx" style="margin-top:5px;"><?php unset($this->_vars);$setting = array ( 'usercustom' => '热门搜索:<a href="#">阿迪达斯</a><a href="#">阿迪达斯</a><a href="#">阿迪达斯</a><a href="#">阿迪达斯</a><a href="#">阿迪达斯</a> <font face="Microsoft yahei" color="#ff0000" size="4" style="line-height: 20px;float:right; "><strong>订购热线：0769-8532 8027 , 138 257 44329</strong></font>', );$this->bundle_vars['setting'] = &$setting;$this->_vars = array('widgets_id'=>'85');ob_start();?>热门搜索:<a href="#">阿迪达斯</a><a href="#">阿迪达斯</a><a href="#">阿迪达斯</a><a href="#">阿迪达斯</a><a href="#">阿迪达斯</a> <font face="Microsoft yahei" color="#ff0000" size="4" style="line-height: 20px;float:right; "><strong>订购热线：0769-8532 8027 , 138 257 44329</strong></font><?php $body = str_replace('%THEME%','{ENV_theme_dir}',ob_get_contents());ob_end_clean();echo '<div id="85">',$body,'</div>';unset($body);$setting=null;$this->_vars = &$this->pagedata;?></div> </div> <div class="cart"><div class="home"><?php unset($this->_vars);$setting = array ( 'usercustom' => '<a href="#" type="url">我的账户</a>', );$this->bundle_vars['setting'] = &$setting;$this->_vars = array('widgets_id'=>'84');ob_start();?><a href="#" type="url">我的账户</a><?php $body = str_replace('%THEME%','{ENV_theme_dir}',ob_get_contents());ob_end_clean();echo '<div id="84">',$body,'</div>';unset($body);$setting=null;$this->_vars = &$this->pagedata;?></div><?php unset($this->_vars);$setting = array ( );$this->bundle_vars['setting'] = &$setting;$this->_vars = array('widgets_id'=>'82');ob_start();?><div class="ShopCartWrap"> <a href="<?php echo "cart",(((is_numeric("cart") && 'index'=="index") || !"index")?'':'-'."index"),'.html';?>" class="cart-container">购物车中有<b class="cart-number"> <script>document.write(Cookie.get('S[CART_NUMBER]')?Cookie.get('S[CART_NUMBER]'):0);</script></b>件商品</a> </div> <?php $body = str_replace('%THEME%','{ENV_theme_dir}',ob_get_contents());ob_end_clean();echo '<div id="82">',$body,'</div>';unset($body);$setting=null;$this->_vars = &$this->pagedata;?></div> </div> <div id="nav"> <div class="m_nav"> <div class="all_cany"> <?php unset($this->_vars);$setting = array ( 'show_treetype' => '0', 'showcatslist' => '9', 'style1' => array ( 'margin1' => '8', 'color' => '#FFF', 'hcolor' => '#C00', 'hbgcolor' => '#FFF', 'overcolor' => '#FFF', 'fbgcolor' => '#FFF', 'border' => '1', 'fbdcolor' => '#C00', 'fcolor' => '#333', 'fhcolor' => '#900', 'width' => '450', 'fhbgcolor' => '#ffe1e1', 'tagtreefont' => '#3d5092', 'tagtreebg' => '#cde7fa', 'tagtreewidth' => '180', 'catcols' => '1', ), 'brandshow' => '10', 'gshowmax' => '12', 'catsname' => array ( 8 => '', 5 => '', 2 => '', ), 'resetlink' => array ( 8 => '', 5 => '', 2 => '', ), 'hottitle' => array ( 8 => '', 5 => '', 2 => '', ), 'brandtitle' => array ( 8 => '', 5 => '', 2 => '', ), 'Margins' => '0', 'MarginTop' => '0', 'catsname4' => array ( 8 => '', 5 => '', 2 => '', ), 'resetlink4' => array ( 8 => '', 5 => '', 2 => '', ), 'goodsname' => array ( 8 => '', 5 => '', 2 => '', ), 'catmax2' => array ( 8 => '1', 5 => '1', 2 => '1', ), 'brandshow2' => array ( 8 => '20', 5 => '20', 2 => '20', ), 'ducedis_tpl' => 'ducemenu-3.html', 'show_virtualid' => '', 'show_treenode' => 'on', 'assignid' => '0', 'ducemenu_1_loop' => '3', 'virtual' => array ( 8 => '0', 5 => '0', 2 => '0', ), 'depthlevel2' => array ( 8 => '0', 5 => '0', 2 => '0', ), 'virtual2' => array ( 8 => '0', 5 => '0', 2 => '0', ), );$this->bundle_vars['setting'] = &$setting;if(!function_exists('widget_duce_goodscat')){require(PLUGIN_DIR.'/widgets/duce_goodscat/widget_duce_goodscat.php');}$this->_vars = array('data'=>widget_duce_goodscat($setting,$GLOBALS['system']),'widgets_id'=>'83');ob_start();?><style id="ducegMenu-3-style"> .ducegMenu-3 {width:210px;font-family:"宋体",Arial,Lucida,Verdana,Helvetica,sans-serif;} .dmg3-depth-0 {width:210px;margin:0;height:36px;background:url("plugins/widgets/duce_goodscat/images//dmg3-icon.gif") no-repeat center 0;overflow:hidden;} .dmg3-depth-0 a.depth-0 {width:160px;color:#fff;height:30px;line-height:22px;font-size:14px;display:block;padding:6px 20px 0 30px;} .dmg3-depth-0 a.depth-0:hover {text-decoration:none;color:#fff;} .ducegMenu-3 .onDmg3 {background-position:0 -38px;} .dmg3-popup0 {position:absolute;z-index:9999;} .dmg3-depth-0 ul.c {*float:left;background:#fef8ef;width:208px;border:1px solid #c40000;border-top:none;border-bottom:none;padding-top:2px;overflow:hidden;} .dmg3-depth-0 li.b {*float:left;width:210px;height:5px;clear:both;background:url("plugins/widgets/duce_goodscat/images//dmg3-icon.gif") no-repeat 0 -180px;<?php if( $this->_vars['_show'] != 'index' ){ ?>margin-top:-3px;<?php } ?>;} .dmg3-depth-1 {*float:left;width:200px;margin:0 3px;_margin:0 1px 0 2px;height:32px;border-bottom:1px solid #fde6d2;} .dmg3-depth-1 .depth-1 {border:1px solid #fef8ef;display:block;height:28px;background:url("plugins/widgets/duce_goodscat/images//dmg3-icon.gif") no-repeat 0 -115px;font-size:14px;padding-left:22px;color:#FFF;overflow:hidden;} .dmg3-depth-1 .depth-1 em{display:block;width:176px;height:23px;background:url("plugins/widgets/duce_goodscat/images//dmg3-icon.gif") no-repeat right -83px;padding-top:5px;cursor:pointer;} .dmg3-depth-1 .depth-1 em.nosub{background-position:right -207px;} .dmg3-depth-1 .depth-1:hover {text-decoration:none;} .ducegMenu-3 .hover .depth-1{height:28px;position:absolute;width:161px;border-color:#C00;border-right:none;z-index:1000;font-size:14px;background-color:#fff;} .ducegMenu-3 .hover .depth-1 em{font-weight:700;color:#C00;} .dmg3-popup {position:absolute;z-index:999;padding:0;background:#fff url("plugins/widgets/duce_goodscat/images//dmg3-line.gif") repeat-y 450px 0;border:1px solid #C00;margin-left:183px;} .dmg3-drop-3 {float:left;width:<?php echo (('450')-20);?>px;padding:4px 10px 6px;} .dmg3-drop-3 dl.sub {float:left;width:<?php echo (('450')-20);?>px;border-bottom:1px solid #e8e8e8;padding:4px 0 6px;line-height:22px;} .dmg3-drop-3 .last{border-bottom:none;} .dmg3-drop-3 dl.sub dt {float:left;text-align:right;width:78px;font-weight:700;padding:3px 6px 0 0;overflow:hidden;} .dmg3-drop-3 dl.sub dt a{white-space:nowrap;color:#c00;font-weight:700;} .dmg3-drop-3 dl.sub dd{float:left;width:<?php echo (('450')-90);?>px;padding:3px 6px 0 0;} .dmg3-drop-3 dl.sub dd em{float:left;padding-left:6px;border-left:1px solid #ccc;height:14px;line-height:14px;margin:4px 6px 4px 0;color:#333;white-space:nowrap;} .dmg3-drop-3 dl.sub dd a:hover em{color:#900;} .dmg3-drop-3 .subhot dt{color:#f60;} .dmg3-drop-b {float:left;padding:12px 10px 10px;width:<?php echo (('180')-20);?>px;} .dmg3-drop-b a {display:block;white-space:nowrap;height:21px;line-height:20px;*line-height:24px; _line-height:21px; color:#333;overflow:hidden;} .dmg3-drop-b .depth-2 {font-weight:700;border-bottom:1px solid #f2eae3;padding-bottom:6px;margin-bottom:6px;} .dmg3-drop-b ul.sub {position:relative;z-index:198;} .dmg3-drop-b ul.sub .depth-2, .dmg3-drop-b ul.sub .depth-2:hover {border-color:#d7e1ea;color:#3d5092;} .dmg3-drop-b ul.sub .all{display:inline;position:absolute;right:0;top:-1px;font-weight:700;} .dmg3-drop-b ul.sub {padding:2px 0 6px;} .dmg3-drop-b ul.sub li a {display:block;height:22px;color:#666;padding-left:5px;font-family:Verdana,Tahoma,Geneva,Helvetica,Arial,sans-serif;overflow:hidden; font-size:12px;} .dmg3-drop-b ul.sub li a:hover {color:#3d5092;background-color:#cde7fa;text-decoration:none;} .dmg3-drop-b ul.sub li .depth-2:hover {color:#900;} .dmg3-drop-b .tagtree {border-top:1px solid #d7e1ea;padding:8px 0;margin-top:3px;} .dmg3-drop-b .tagtree a {color:#c00;} .ducegMenu-3 .cat-custom, .ducegMenu-3 .cat-custom a, .ducegMenu-3 .cat-custom a em, .ducegMenu-3 .cat-custom a.depth-1 em.nosub{background:#fdf1de;height:28px;font-size:12px;border:none;} .dmg3-drop-3 dl.sub dd{width:302px;} .borderqb {background:#fdf1de; } /*--全部商品分类背景色--*/ </style> <?php $this->_vars["_show"]=$this->bundle_vars['setting']['show']; ?> <div class="ducegMenu-3 clearfix"> <div class="dmg3-depth-0 <?php if( $this->_vars['_show'] ){ ?>onDmg3<?php } ?>"><a class="depth-0" href="<?php echo "gallery",(((is_numeric('gallery') && 'index'==grid) || !grid)?'':'-'.grid),'.html';?>"><strong>全部商品分类</strong></a> <div class="dmg3-popup0" <?php if( !$this->_vars['_show'] ){ ?>style="display:none;"<?php } ?>> <ul class="c"> <?php $this->_env_vars['foreach'][catslist]=array('total'=>count($this->_vars['data']),'iteration'=>0);foreach ((array)$this->_vars['data'] as $this->_vars['parentId'] => $this->_vars['parent']){ $this->_env_vars['foreach'][catslist]['first'] = ($this->_env_vars['foreach'][catslist]['iteration']==0); $this->_env_vars['foreach'][catslist]['iteration']++; $this->_env_vars['foreach'][catslist]['last'] = ($this->_env_vars['foreach'][catslist]['iteration']==$this->_env_vars['foreach'][catslist]['total']);  if( $this->_env_vars['foreach']['catslist']['iteration'] <= ((isset($this->bundle_vars['setting']['showcatslist']) && ''!==$this->bundle_vars['setting']['showcatslist'])?$this->bundle_vars['setting']['showcatslist']:'0') or $this->bundle_vars['setting']['showcatslist'] == 0 or $this->_vars['_show'] != 'index' ){ ?> <li class="dmg3-depth-1 <?php echo $this->_vars['parent']['classname'];  echo $this->_vars['parent']['curr']; ?> cat_<?php echo $this->_env_vars['foreach']['catslist']['iteration']; ?>"><a class="depth-1 <?php echo $this->_vars['parent']['onSel']; ?>" href="<?php if( !$this->_vars['parent']['url'] ){  echo "gallery-{$this->_vars['parentId']}",(((is_numeric($this->_vars['parentId']) && 'index'==$this->bundle_vars['setting']['view']) || !$this->bundle_vars['setting']['view'])?'':'-'.$this->bundle_vars['setting']['view']),'.html'; }else{  echo $this->_vars['parent']['url'];  } ?>"><em <?php if( !$this->_vars['parent']['sub'] ){ ?> class="nosub"<?php } ?>><?php echo $this->_vars['parent']['label']; ?></em></a> <?php if( $this->_vars['parent']['sub'] ){ ?><!--弹出分类--> <div class="dmg3-popup" style="display:none;width:<?php if( $this->_vars['parent']['brands'] ){  echo (('450')+('180')); }else{ ?>450<?php } ?>px;"> <div class="dmg3-drop-3"> <?php if( $this->_vars['parent']['hotcats'] ){ ?> <dl class="subhot"> <dt><?php echo ((isset($this->bundle_vars['setting']['hottitle']{$this->_vars['parent']['cat_id']}) && ''!==$this->bundle_vars['setting']['hottitle']{$this->_vars['parent']['cat_id']})?$this->bundle_vars['setting']['hottitle']{$this->_vars['parent']['cat_id']}:'热门分类'); ?></dt> <dd> <em><a href="<?php echo "gallery-{$this->_vars['parent']['cat_id']}--1",(((is_numeric(1) && 'index'==$this->bundle_vars['setting']['view']) || !$this->bundle_vars['setting']['view'])?'':'-'.$this->bundle_vars['setting']['view']),'.html';?>">最新商品</a></em> <em><a href="<?php echo "gallery-{$this->_vars['parent']['cat_id']}--8",(((is_numeric(8) && 'index'==$this->bundle_vars['setting']['view']) || !$this->bundle_vars['setting']['view'])?'':'-'.$this->bundle_vars['setting']['view']),'.html';?>">畅销排行</a></em> <?php foreach ((array)$this->_vars['parent']['hotcats'] as $this->_vars['hotcat']){ ?> <em><a href="<?php echo $this->_vars['hotcat']['url']; ?>"><?php echo $this->_vars['hotcat']['label']; ?></a></em> <?php } ?> </dd> <div class="clear"></div> </dl> <?php }  $this->_env_vars['foreach'][subcat]=array('total'=>count($this->_vars['parent']['sub']),'iteration'=>0);foreach ((array)$this->_vars['parent']['sub'] as $this->_vars['childId'] => $this->_vars['child']){ $this->_env_vars['foreach'][subcat]['first'] = ($this->_env_vars['foreach'][subcat]['iteration']==0); $this->_env_vars['foreach'][subcat]['iteration']++; $this->_env_vars['foreach'][subcat]['last'] = ($this->_env_vars['foreach'][subcat]['iteration']==$this->_env_vars['foreach'][subcat]['total']); ?> <dl class="sub <?php if( $this->_env_vars['foreach']['subcat']['last'] ){ ?>last<?php } ?>"> <dt> <a class="depth-2 <?php echo $this->_vars['child']['onSel']; ?>" href="<?php if( !$this->_vars['child']['url'] ){  echo "gallery-{$this->_vars['childId']}",(((is_numeric($this->_vars['childId']) && 'index'==$this->bundle_vars['setting']['view']) || !$this->bundle_vars['setting']['view'])?'':'-'.$this->bundle_vars['setting']['view']),'.html'; }else{  echo $this->_vars['child']['url'];  } ?>"><?php echo $this->_vars['child']['label']; ?></a> </dt> <?php if( $this->bundle_vars['setting']['ducemenu_1_loop'] == '3' && $this->_vars['child']['sub'] ){ ?> <dd> <?php $this->_env_vars['foreach'][childnum]=array('total'=>count($this->_vars['child']['sub']),'iteration'=>0);foreach ((array)$this->_vars['child']['sub'] as $this->_vars['gChildId'] => $this->_vars['gChild']){ $this->_env_vars['foreach'][childnum]['first'] = ($this->_env_vars['foreach'][childnum]['iteration']==0); $this->_env_vars['foreach'][childnum]['iteration']++; $this->_env_vars['foreach'][childnum]['last'] = ($this->_env_vars['foreach'][childnum]['iteration']==$this->_env_vars['foreach'][childnum]['total']);  if( $this->_env_vars['foreach']['childnum']['iteration'] <= $this->bundle_vars['setting']['gshowmax'] or $this->bundle_vars['setting']['gshowmax'] == 0 ){ ?> <em><a class="<?php echo $this->_vars['gChild']['onSel']; ?>" href="<?php if( !$this->_vars['gChild']['url'] ){  echo "gallery-{$this->_vars['gChildId']}",(((is_numeric($this->_vars['gChildId']) && 'index'==$this->bundle_vars['setting']['view']) || !$this->bundle_vars['setting']['view'])?'':'-'.$this->bundle_vars['setting']['view']),'.html'; }else{  echo $this->_vars['gChild']['url'];  } ?>"><?php echo $this->_vars['gChild']['label']; ?></a></em> <?php }else{ ?> <em><a href="<?php if( !$this->_vars['parent']['url'] ){  echo "gallery-{$this->_vars['parentId']}",(((is_numeric($this->_vars['parentId']) && 'index'==$this->bundle_vars['setting']['view']) || !$this->bundle_vars['setting']['view'])?'':'-'.$this->bundle_vars['setting']['view']),'.html'; }else{  echo $this->_vars['parent']['url'];  } ?>">更多&gt;&gt;</a></em> <?php break;  }  } unset($this->_env_vars['foreach'][childnum]); ?> </dd> <?php } ?> <div class="clear"></div> </dl> <?php } unset($this->_env_vars['foreach'][subcat]); ?> </div> <?php if( $this->_vars['parent']['brands'] ){ ?><!--品牌--> <div class="dmg3-drop-b"> <h3><a class="depth-2"><?php echo ((isset($this->bundle_vars['setting']['brandtitle'][$this->_vars['parent']]['cat_id']) && ''!==$this->bundle_vars['setting']['brandtitle'][$this->_vars['parent']]['cat_id'])?$this->bundle_vars['setting']['brandtitle'][$this->_vars['parent']]['cat_id']:'热门品牌'); ?></a></h3> <ul class="sub"> <?php echo tpl_function_counter(array('start' => 1,'assign' => "maxshow",'print' => false), $this); foreach ((array)$this->_vars['parent']['brands'] as $this->_vars['brandId'] => $this->_vars['brand']){  $this->_vars[brand_id]="b,".$this->_vars['brand']['id'];  if( $this->_vars['brand']['name'] ){ ?><li><a href="<?php echo "gallery-{$this->_vars['parent']['cat_id']}-{$this->_vars['brand_id']}",(((is_numeric($this->_vars['brand_id']) && 'index'==$this->bundle_vars['setting']['view']) || !$this->bundle_vars['setting']['view'])?'':'-'.$this->bundle_vars['setting']['view']),'.html';?>"><?php echo $this->_vars['brand']['name']; ?></a></li><?php }  echo tpl_function_counter(array('assign' => "maxshow",'print' => false), $this); if( $this->_vars['maxshow'] > $this->bundle_vars['setting']['brandshow'] ){  break;  }  } ?> </ul> <?php if( $this->_vars['parent']['tag'] ){ ?> <ul class="tagtree"> <?php foreach ((array)$this->_vars['parent']['tag'] as $this->_vars['tag']){  $this->_vars["tagid"]='t,'.$this->_vars['tag']['id']; ?> <li><a href="<?php echo "gallery-{$this->_vars['parent']['cat_id']}-{$this->_vars['tagid']}",(((is_numeric($this->_vars['tagid']) && 'index'==$this->bundle_vars['setting']['view']) || !$this->bundle_vars['setting']['view'])?'':'-'.$this->bundle_vars['setting']['view']),'.html';?>"><?php echo $this->_vars['tag']['name']; ?></a></li> <?php } ?> </ul> <?php } ?> </div> <?php } ?><!--品牌/--> </div> <?php } ?> </li> <?php }else{  break;  }  } unset($this->_env_vars['foreach'][catslist]); ?> </ul> <li class="b"></li></div> </div> </div> <script src="plugins/widgets/duce_goodscat/images//dmg3.pack.js" type="text/javascript"></script> <?php $body = str_replace('%THEME%','{ENV_theme_dir}',ob_get_contents());ob_end_clean();$this->_vars = array('body'=>&$body,'title'=>'','widgets_id'=>'','widgets_classname'=>'');?><div class="border1" id="<?php echo $this->_vars['widgets_id']; ?>"> <div class="border-top"><h3><?php echo $this->_vars['title']; ?></h3></div> <div class="border-body"><?php echo $this->_vars['body']; ?></div> </div><?php $setting=null;$this->_vars = &$this->pagedata;?></div> <div class="h_nav"><div id="Menu"><?php unset($this->_vars);$setting = false;$this->bundle_vars['setting'] = &$setting;if(!function_exists('widget_menu_lv1')){require(PLUGIN_DIR.'/widgets/menu_lv1/widget_menu_lv1.php');}$this->_vars = array('data'=>widget_menu_lv1($setting,$GLOBALS['system']),'widgets_id'=>'86');ob_start();?><ul class="MenuList"> <?php $this->_env_vars['foreach'][wgtmenu]=array('total'=>count($this->_vars['data']),'iteration'=>0);foreach ((array)$this->_vars['data'] as $this->_vars['key'] => $this->_vars['item']){ $this->_env_vars['foreach'][wgtmenu]['first'] = ($this->_env_vars['foreach'][wgtmenu]['iteration']==0); $this->_env_vars['foreach'][wgtmenu]['iteration']++; $this->_env_vars['foreach'][wgtmenu]['last'] = ($this->_env_vars['foreach'][wgtmenu]['iteration']==$this->_env_vars['foreach'][wgtmenu]['total']);  if( $this->_vars['key']>$this->_vars['setting']['max_leng'] && $this->_vars['setting']['max_leng'] ){  if( $this->_vars['item']['node_type']=='pageurl' ){ ?> <div><a href="<?php echo $this->_vars['item']['action']; ?>" <?php if( $this->_vars['item']['item_id']=='1' ){ ?>target="_blank"<?php } ?>><?php echo $this->_vars['item']['title']; ?></a></div> <?php }else{ ?> <div><a href="<?php echo $this->_vars['item']['link']; ?>"><?php echo $this->_vars['item']['title']; ?></a></div> <?php }  }elseif( $this->_vars['key']==$this->_vars['setting']['max_leng'] && $this->_vars['setting']['max_leng'] ){  $this->_vars["page"]="true"; ?> <li style="position:relative;z-index:65535;" class="wgt-menu-more" id="<?php echo $this->_vars['widgets_id']; ?>_menu_base" onClick="if($('<?php echo $this->_vars['widgets_id']; ?>_showMore').style.display=='none'){$('<?php echo $this->_vars['widgets_id']; ?>_showMore').style.display='';}else{ $('<?php echo $this->_vars['widgets_id']; ?>_showMore').style.display='none';}"><a class="wgt-menu-view-more" href="JavaScript:void(0)"><?php echo $this->_vars['setting']['showinfo']; ?></a> <div class="v-m-page" style="display:none;position:absolute; top:25px; left:0" id="<?php echo $this->_vars['widgets_id']; ?>_showMore"> <?php if( $this->_vars['item']['node_type']=='pageurl' ){ ?> <div><a href="<?php echo $this->_vars['item']['action']; ?>" <?php if( $this->_vars['item']['item_id']=='1' ){ ?>target="_blank"<?php } ?>><?php echo $this->_vars['item']['title']; ?></a></div> <?php }else{ ?> <div><a href="<?php echo $this->_vars['item']['link']; ?>"><?php echo $this->_vars['item']['title']; ?></a></div> <?php }  }else{  if( $this->_vars['item']['node_type']==pageurl ){ ?> <li><a <?php if( $this->_env_vars['foreach']['menu']['last'] ){ ?>class="last"<?php } ?> href="<?php echo $this->_vars['item']['action']; ?>" <?php if( $this->_vars['item']['item_id']=='1' ){ ?>target="_blank"<?php } ?>><?php echo $this->_vars['item']['title']; ?></a></li> <?php }else{ ?> <li><a <?php if( $this->_env_vars['foreach']['menu']['last'] ){ ?>class="last"<?php } ?> href="<?php echo $this->_vars['item']['link']; ?>"><?php echo $this->_vars['item']['title']; ?></a></li> <?php }  }  } unset($this->_env_vars['foreach'][wgtmenu]);  if( $this->_vars['page']=="true" ){ ?> </div> </li> <?php } ?> </ul> <script>
if($('<?php echo $this->_vars['widgets_id']; ?>_showMore')){
	$('<?php echo $this->_vars['widgets_id']; ?>_showMore').setOpacity(.8);
}
</script> <?php $body = str_replace('%THEME%','{ENV_theme_dir}',ob_get_contents());ob_end_clean();echo '<div id="86">',$body,'</div>';unset($body);$setting=null;$this->_vars = &$this->pagedata;?></div></div> <div class="r_nav"></div> </div> </div> <div class="clear"></div> <script>
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