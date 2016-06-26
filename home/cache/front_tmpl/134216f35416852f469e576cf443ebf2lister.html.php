<?php if(!function_exists('tpl_block_area')){ require(CORE_DIR.'/admin/smartyplugin/block.area.php'); } if(!function_exists('tpl_function_pager')){ require(CORE_DIR.'/admin/smartyplugin/function.pager.php'); }  $o = &$this->model; $o->__table_define = array ( 'order_id' => array ( 'type' => 'bigint unsigned', 'required' => true, 'default' => 0, 'pkey' => true, 'label' => '订单号', 'width' => 110, 'primary' => true, 'searchtype' => 'has', 'editable' => false, 'filtertype' => 'custom', 'filtercustom' => array ( 'head' => '开头等于', ), 'filterdefalut' => true, ), 'paipai_order_id' => array ( 'type' => 'varchar(50)', 'required' => true, 'default' => 0, 'label' => '拍拍订单号', 'width' => 110, 'searchtype' => 'has', 'editable' => false, 'filtertype' => 'custom', 'filtercustom' => array ( 'head' => '开头等于', ), 'filterdefalut' => true, ), 'member_id' => array ( 'type' => 'object:member/member', 'label' => '会员用户名', 'width' => 75, 'editable' => false, 'filtertype' => 'yes', 'filterdefalut' => true, ), 'confirm' => array ( 'type' => 'tinybool', 'default' => 'N', 'required' => true, 'label' => '确认状态', 'width' => 75, 'hidden' => true, 'editable' => false, ), 'status' => array ( 'type' => array ( 'active' => '活动订单', 'dead' => '死单', 'finish' => '已完成', ), 'default' => 'active', 'required' => true, 'label' => '订单状态', 'width' => 75, 'hidden' => true, 'editable' => false, ), 'pay_status' => array ( 'type' => array ( 0 => '未支付', 1 => '已支付', 2 => '已支付至担保方', 3 => '部分付款', 4 => '部分退款', 5 => '全额退款', ), 'default' => '0', 'required' => true, 'label' => '付款状态', 'width' => 75, 'editable' => false, 'filtertype' => 'yes', 'filterdefalut' => true, ), 'ship_status' => array ( 'type' => array ( 0 => '未发货', 1 => '已发货', 2 => '部分发货', 3 => '部分退货', 4 => '已退货', ), 'default' => '0', 'required' => true, 'label' => '发货状态', 'width' => 75, 'editable' => false, 'filtertype' => 'yes', 'filterdefalut' => true, ), 'user_status' => array ( 'label' => '用户反馈', 'type' => array ( 'null' => '无反馈', 'payed' => '已支付', 'shipped' => '已到收货', ), 'hidden' => true, 'default' => 'null', 'required' => true, 'editable' => false, ), 'is_delivery' => array ( 'type' => 'tinybool', 'default' => 'Y', 'required' => true, 'editable' => false, ), 'shipping_id' => array ( 'type' => 'smallint(4) unsigned', 'editable' => false, ), 'shipping' => array ( 'type' => 'varchar(100)', 'label' => '配送方式', 'width' => 75, 'editable' => false, 'filtertype' => 'normal', 'filterdefalut' => true, ), 'shipping_area' => array ( 'type' => 'varchar(50)', 'editable' => false, ), 'payment' => array ( 'type' => 'object:trading/paymentcfg', 'label' => '支付方式', 'width' => 75, 'editable' => false, 'filtertype' => 'yes', 'filterdefalut' => true, ), 'weight' => array ( 'type' => 'money', 'editable' => false, ), 'tostr' => array ( 'type' => 'longtext', 'editable' => false, ), 'itemnum' => array ( 'type' => 'number', 'editable' => false, ), 'acttime' => array ( 'label' => '更新时间', 'type' => 'time', 'width' => 110, 'editable' => false, ), 'delivery_time' => array ( 'label' => '发货时间', 'type' => 'time', 'width' => 110, 'editable' => false, ), 'delivery_delay_time' => array ( 'label' => '交易延迟时间', 'type' => 'time', 'width' => 110, 'editable' => false, ), 'createtime' => array ( 'type' => 'time', 'label' => '下单时间', 'width' => 110, 'editable' => false, 'filtertype' => 'time', 'filterdefalut' => true, ), 'refer_id' => array ( 'type' => 'varchar(50)', 'label' => '首次来源ID', 'width' => 75, 'editable' => false, 'filtertype' => 'normal', ), 'refer_url' => array ( 'type' => 'varchar(200)', 'label' => '首次来源URL', 'width' => 150, 'editable' => false, 'filtertype' => 'normal', ), 'refer_time' => array ( 'type' => 'time', 'label' => '首次来源时间', 'width' => 110, 'editable' => false, 'filtertype' => 'time', ), 'c_refer_id' => array ( 'type' => 'varchar(50)', 'label' => '本次来源ID', 'width' => 75, 'editable' => false, 'filtertype' => 'normal', ), 'c_refer_url' => array ( 'type' => 'varchar(200)', 'label' => '本次来源URL', 'width' => 150, 'editable' => false, 'filtertype' => 'normal', ), 'c_refer_time' => array ( 'type' => 'time', 'label' => '本次来源时间', 'width' => 110, 'editable' => false, 'filtertype' => 'time', ), 'ip' => array ( 'type' => 'varchar(15)', 'editable' => false, ), 'ship_name' => array ( 'type' => 'varchar(50)', 'label' => '收货人', 'width' => 75, 'searchtype' => 'head', 'editable' => false, 'filtertype' => 'normal', 'filterdefalut' => true, ), 'ship_area' => array ( 'type' => 'region', 'label' => '收货地区', 'searchable' => true, 'width' => 180, 'editable' => false, 'filtertype' => 'yes', ), 'ship_addr' => array ( 'type' => 'varchar(100)', 'label' => '收货地址', 'searchtype' => 'has', 'width' => 180, 'editable' => false, 'filtertype' => 'normal', ), 'ship_zip' => array ( 'type' => 'varchar(20)', 'editable' => false, ), 'ship_tel' => array ( 'type' => 'varchar(30)', 'label' => '收货人电话', 'searchtype' => 'has', 'width' => 75, 'editable' => false, 'filtertype' => 'normal', 'filterdefalut' => true, ), 'ship_email' => array ( 'type' => 'varchar(150)', 'editable' => false, ), 'ship_time' => array ( 'type' => 'varchar(50)', 'editable' => false, ), 'ship_mobile' => array ( 'label' => '收货人手机', 'hidden' => true, 'searchtype' => 'has', 'type' => 'varchar(50)', 'editable' => false, ), 'cost_item' => array ( 'type' => 'money', 'default' => '0', 'required' => true, 'editable' => false, ), 'is_tax' => array ( 'type' => 'bool', 'default' => 'false', 'required' => true, 'editable' => false, ), 'cost_tax' => array ( 'type' => 'money', 'default' => '0', 'required' => true, 'editable' => false, ), 'tax_company' => array ( 'type' => 'varchar(255)', 'editable' => false, ), 'cost_freight' => array ( 'type' => 'money', 'default' => '0', 'required' => true, 'label' => '配送费用', 'width' => 75, 'editable' => false, 'filtertype' => 'number', ), 'is_protect' => array ( 'type' => 'bool', 'default' => 'false', 'required' => true, 'editable' => false, ), 'cost_protect' => array ( 'type' => 'money', 'default' => '0', 'required' => true, 'editable' => false, ), 'cost_payment' => array ( 'type' => 'money', 'editable' => false, ), 'currency' => array ( 'type' => 'varchar(8)', 'editable' => false, ), 'cur_rate' => array ( 'type' => 'decimal(10,4)', 'default' => '1.0000', 'editable' => false, ), 'score_u' => array ( 'type' => 'money', 'default' => '0', 'required' => true, 'editable' => false, ), 'score_g' => array ( 'type' => 'money', 'default' => '0', 'required' => true, 'editable' => false, ), 'score_e' => array ( 'type' => 'money', 'default' => '0', 'required' => true, 'editable' => false, ), 'advance' => array ( 'type' => 'money', 'default' => '0', 'editable' => false, ), 'discount' => array ( 'type' => 'money', 'default' => '0', 'required' => true, 'editable' => false, ), 'use_pmt' => array ( 'type' => 'varchar(30)', 'editable' => false, ), 'total_amount' => array ( 'type' => 'money', 'default' => '0', 'required' => true, 'label' => '订单总额', 'width' => 75, 'editable' => false, 'filtertype' => 'number', 'filterdefalut' => true, ), 'final_amount' => array ( 'type' => 'money', 'default' => '0', 'required' => true, 'editable' => false, ), 'pmt_amount' => array ( 'type' => 'money', 'editable' => false, ), 'payed' => array ( 'type' => 'money', 'default' => '0', 'editable' => false, ), 'markstar' => array ( 'type' => 'tinybool', 'default' => 'N', 'editable' => false, ), 'memo' => array ( 'type' => 'longtext', 'editable' => false, ), 'print_status' => array ( 'type' => 'tinyint unsigned', 'default' => 0, 'required' => true, 'label' => '打印', 'width' => 150, 'editable' => false, ), 'mark_text' => array ( 'type' => 'longtext', 'label' => '订单备注', 'width' => 50, 'html' => 'order/order_remark.html', 'editable' => false, 'searchtype' => 'has', 'filtertype' => 'normal', ), 'disabled' => array ( 'type' => 'bool', 'default' => 'false', 'editable' => false, ), 'last_change_time' => array ( 'type' => 'int(11)', 'default' => 0, 'required' => true, 'editable' => false, ), 'use_registerinfo' => array ( 'type' => 'bool', 'default' => 'false', 'editable' => false, ), 'mark_type' => array ( 'type' => 'varchar(2)', 'default' => 'b1', 'required' => true, 'label' => '订单备注图标', 'hidden' => true, 'width' => 150, 'editable' => false, ), 'extend' => array ( 'type' => 'varchar(255)', 'default' => 'false', 'editable' => false, ), 'is_has_remote_pdts' => array ( 'type' => array ( 'true' => '', 'false' => '', ), 'required' => true, 'default' => 'false', ), 'order_refer' => array ( 'type' => array ( 'local' => '本地', 'taobao' => '淘宝', 'paipai' => '拍拍', ), 'required' => true, 'default' => 'local', 'width' => 75, 'filtertype' => 'yes', 'label' => '订单来源', 'filterdefalut' => true, ), 'print_id' => array ( 'type' => 'varchar(20)', 'required' => false, 'label' => '订单打印编号', ), ); if(!function_exists('action_finder_lister')){ require(CORE_INCLUDE_DIR.'/core/action.finder_lister.php'); } action_finder_lister($this); $this->_vars['_finder']['id'] = 'order_id'; $this->_vars['_finder']['hasTag'] = '1'; echo $this->_fetch_compile_include($this->_vars['_finder']['current_view'],array()); $o = null; $this->_tag_stack[] = array('tpl_block_area', array('inject' => ".mainFoot")); tpl_block_area(array('inject' => ".mainFoot"), null, $this); ob_start();  if( $this->_vars['_finder']['listViews'] ){ ?> <div class="finder-footer" id="finder-footer-<?php echo $this->_vars['_finder']['_name']; ?>"> <?php } ?> <div class='finder-page clearfix'> <div class='span-3'> <span style="cursor: pointer" id="finder-pageset-<?php echo $this->_vars['_finder']['_name']; ?>" dropmenu="finder-pagesel-<?php echo $this->_vars['_finder']['_name']; ?>"> 每页显示 <i><?php echo $this->_vars['_finder']['plimit']; ?></i> 条 <img src="images/transparent.gif" class="imgbundle" style="width:7px;height:5px;background-position:0 -71px;" /> </span> </div> <?php if( $this->_vars['_finder']['pager']['total'] > 1 ){ ?> <div class='span-5'> <form id="finder-pagejump-<?php echo $this->_vars['_finder']['_name']; ?>" class='clearfix' max="<?php echo $this->_vars['_finder']['pager']['total']; ?>"> <div class='span-auto'>跳转到第 <input type="text" class='x-input' style="width:20px; height:1em; padding:0" />页</div> <div class='span-auto'> <em onclick='$(this).getParent("form").fireEvent("submit",{stop:$empty});' class='lnk'><span class='fontcolorBlack'>Go</span></em> </div> </form> </div> <?php } ?> <div class='span-auto'><?php echo tpl_function_pager(array('data' => $this->_vars['_finder']['pager']), $this);?></div> <?php if( $this->_vars['_finder']['statusStr'] ){ ?><div class='span-auto'><?php echo $this->_vars['_finder']['statusStr']; ?></div><?php } ?> <div class='span-auto textright'>共<i><?php echo $this->_vars['_finder']['count']; ?></i>条 <?php if( $this->_vars['finder']['statusStr'] ){ ?><span style="margin-left:150px;"><?php echo $this->_vars['finder']['statusStr']; ?></span><?php } ?> </div> </div> <?php if( $this->_vars['_finder']['listViews'] ){ ?> </div> <?php }  $_block_content = ob_get_contents(); ob_end_clean(); $_block_content = tpl_block_area($this->_tag_stack[count($this->_tag_stack) - 1][1], $_block_content, $this); echo $_block_content; array_pop($this->_tag_stack); $_block_content='';  $this->_tag_stack[] = array('tpl_block_area', array('inject' => ".mainHead")); tpl_block_area(array('inject' => ".mainHead"), null, $this); ob_start(); ?> <div class="finder-tip" id="finder-tip-<?php echo $this->_vars['_finder']['_name']; ?>" count=<?php echo $this->_vars['_finder']['count']; ?> style='display:none;'> <i class='selected'>您当前选定了<em>0</em>条记录，<strong onclick="<?php echo $this->_vars['_finder']['var']; ?>.unselectAll()">点此取消选定</strong>。<strong onclick="<?php echo $this->_vars['_finder']['var']; ?>.selectAll()">点此选定全部</strong>的<span><?php echo $this->_vars['_finder']['count']; ?></span>条记录</i> <i class='selectedall'>您当前选定了全部的<span><?php echo $this->_vars['_finder']['count']; ?></span>条记录，<strong onclick="<?php echo $this->_vars['_finder']['var']; ?>.unselectAll()">点此取消选定</strong>全部记录</i> </div> <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_content = tpl_block_area($this->_tag_stack[count($this->_tag_stack) - 1][1], $_block_content, $this); echo $_block_content; array_pop($this->_tag_stack); $_block_content=''; ?> <div id="finder-pagesel-<?php echo $this->_vars['_finder']['_name']; ?>" class="x-drop-menu"> <?php foreach ((array)$this->_vars['_finder']['plimit_in_sel'] as $this->_vars['pnumber']){ ?> <div class="item" onclick="<?php echo $this->_vars['_finder']['var']; ?>.request({method:'post',data:{plimit:<?php echo $this->_vars['pnumber']; ?>}})"><input type="radio" <?php if( $this->_vars['_finder']['plimit'] == $this->_vars['pnumber'] ){ ?>checked="checked"<?php } ?> />每页<i><?php echo $this->_vars['pnumber']; ?></i>条</div> <?php } ?> </div> <script>
if($('finder-pagejump-<?php echo $this->_vars['_finder']['_name']; ?>')){
	$('finder-pagejump-<?php echo $this->_vars['_finder']['_name']; ?>').addEvent('submit',function(e){
		e.stop();
		var v = $E('input',this).value.toInt();
		if(v<1)v=1;
		if(v>this.get('max')) v = this.get('max');
		<?php echo $this->_vars['_finder']['var']; ?>.page(v);
	});
}
new DropMenu($('finder-pageset-<?php echo $this->_vars['_finder']['_name']; ?>'),{offset:{y:-115}});
</script>