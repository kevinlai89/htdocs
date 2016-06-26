<?php if(!function_exists('tpl_input_default')){ require(CORE_DIR.'/include_v5/smartyplugins/input.default.php'); } if(!function_exists('tpl_block_help')){ require(CORE_DIR.'/admin/smartyplugin/block.help.php'); } ?><table border="0" cellpadding="0" cellspacing="0" id="nospec_body"> <tbody > <?php if( $this->_vars['prototype']['setting']['data'] ){  foreach ((array)$this->_vars['prototype']['setting']['data'] as $this->_vars['key'] => $this->_vars['item']){ ?> <tr class="idata"> <th><?php echo $this->_vars['item']['label']; ?> <input type="hidden" name="idataInfo[<?php echo $this->_vars['key']; ?>]" value="<?php echo $this->_vars['item']['label']; ?>" ></th> <td width="80"><?php $params = array();$this->input_func_map = array ( 'time' => '/include_v5/smartyplugins/input.time.php', 'intbool' => '/include_v5/smartyplugins/input.intbool.php', 'textarea' => '/include_v5/smartyplugins/input.textarea.php', 'combox' => '/include_v5/smartyplugins/input.combox.php', 'gender' => '/include_v5/smartyplugins/input.gender.php', 'radio' => '/include_v5/smartyplugins/input.radio.php', 'tinybool' => '/include_v5/smartyplugins/input.tinybool.php', 'html' => '/include_v5/smartyplugins/input.html.php', 'color' => '/include_v5/smartyplugins/input.color.php', 'region' => '/include_v5/smartyplugins/input.region.php', 'date' => '/include_v5/smartyplugins/input.date.php', 'fontset' => '/include_v5/smartyplugins/input.fontset.php', 'money' => '/include_v5/smartyplugins/input.money.php', 'default' => '/include_v5/smartyplugins/input.default.php', 'checkbox' => '/include_v5/smartyplugins/input.checkbox.php', 'select' => '/include_v5/smartyplugins/input.select.php', 'bool' => '/include_v5/smartyplugins/input.bool.php', 'object' => '/admin/smartyplugin/input.object.php', );$params['name'] = "idata[{$this->_vars['key']}]";$params['type'] = $this->_vars['item']['type'];$params['value'] = $this->_vars['goods']['props']['idata'][$this->_vars['key']];$params['options'] = $this->_vars['item']['options'];if(substr($params['type'],0,7)=='object:'){ list(,$params['object'],$params['key']) = explode(':',$params['type']); $obj = str_replace('/','_',$params['object']); $func = 'tpl_input_object_'.$obj; if(!function_exists($func)){ if(isset($this->input_func_map['object_'.$obj])){ require(CORE_DIR.$this->input_func_map['object_'.$obj]); $this->_plugins['input']['object_'.$obj] = $func; }else{ $func = 'tpl_input_object'; $params['type'] = 'object'; } } }else{ $func = 'tpl_input_'.$params['type']; } if(function_exists($func)){ echo $func($params,$this); }elseif(isset($this->input_func_map[$params['type']])){ require(CORE_DIR.$this->input_func_map[$params['type']]); $this->_plugins['input'][$params['type']] = $func; echo $func($params,$this); }else{ echo tpl_input_default($params,$this); } unset($func,$params);?></td> </tr> <?php }  } ?> <tr> <th>销售价：</th> <td> <?php echo tpl_input_default(array('type' => "unsigned",'value' => $this->_vars['goods']['price'],'name' => "goods[price]",'style' => "width:60px",'maxlength' => "25"), $this);?> <button type="button" onclick="goodsEditor.mprice.bind(goodsEditor)(this)" class="btn"><span><span><img src="images/transparent.gif" class="imgbundle icon" style="width:15px;height:16px;background-position:0 -133px;" />编辑会员价格</span></span></button> <?php foreach ((array)$this->_vars['mLevels'] as $this->_vars['lv']){ ?> <input type="hidden" name="goods[mprice][<?php echo $this->_vars['lv']['member_lv_id']; ?>]" level="<?php echo $this->_vars['lv']['member_lv_id']; ?>" value="<?php echo $this->_vars['goods']['mprice'][$this->_vars['lv']['member_lv_id']]; ?>" type="money" vtype="mprice" /> <?php } ?></td> </tr> <tr> <th>成本价：</th> <td><?php echo tpl_input_default(array('type' => "unsigned",'name' => "goods[cost]",'maxlength' => "30",'style' => "width:60px",'value' => $this->_vars['goods']['cost']), $this);?><span class="notice-inline">前台不会显示，仅供后台使用。</span></td> </tr> <tr> <th>市场价：</th> <td><?php echo tpl_input_default(array('type' => "text",'name' => "goods[mktprice]",'maxlength' => "30",'value' => $this->_vars['goods']['mktprice']), $this);?></td> </tr> <tr> <th>货号：</th> <td><input type='hidden' name="old_bn" value="<?php echo $this->_vars['goods']['product_bn']; ?>"/><?php echo tpl_input_default(array('type' => "text",'value' => $this->_vars['goods']['product_bn'],'name' => "goods[product_bn]",'maxlength' => "25"), $this);?></td> </tr> <tr> <th>重量：</th> <td><?php echo tpl_input_default(array('type' => "unsigned",'value' => $this->_vars['goods']['weight'],'name' => "goods[weight]",'style' => "width:60px",'maxlength' => "25"), $this);?>克(g)</td> </tr> <?php if( $this->_vars['prototype']['is_physical'] ){ ?> <tr> <th>库存：</th> <td><?php echo tpl_input_default(array('type' => "unsigned",'value' => $this->_vars['goods']['store'],'name' => "goods[store]",'style' => "width:60px",'maxlength' => "25",'vtype' => "number"), $this);?></td> </tr> <?php if( $this->system->getConf('storeplace.display.switch') ){ ?> <tr> <th>货位：</th> <td><?php echo tpl_input_default(array('type' => "text",'value' => $this->_vars['goods']['store_place'],'name' => "goods[store_place]",'maxlength' => "80"), $this);?></td> </tr> <?php }  }  if( $this->_vars['prototype']['setting']['use_spec'] ){ ?> <tr class="advui"> <th>规格：</th> <td style="padding:4px 0"><span class="lnk sysiconBtn addorder" onclick="goodsEditor.spec.addCol.bind(goodsEditor)(false,$('gEditor-GType-input').value)">开启规格</span><?php $this->_tag_stack[] = array('tpl_block_help', array('docid' => "82",'type' => "link-small")); tpl_block_help(array('docid' => "82",'type' => "link-small"), null, $this); ob_start(); ?>点击查看帮助<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_content = tpl_block_help($this->_tag_stack[count($this->_tag_stack) - 1][1], $_block_content, $this); echo $_block_content; array_pop($this->_tag_stack); $_block_content=''; ?><span class="notice-inline">开启规格前先填写以上价格等信息，可自动复制信息到货品</span> </td> </tr> <?php } ?> </tbody> </table>