<?php if(!function_exists('tpl_modifier_replace')){ require(CORE_DIR.'/include_v5/smartyplugins/modifier.replace.php'); } ?> <div class="radar_product_point" id="r<?php echo $this->_vars['item']['goods_id']; ?>" radar_price="<?php echo tpl_modifier_replace($this->_vars['item']['price'],'￥',''); ?>" radar_product_id="<?php echo $this->_vars['item']['goods_id']; ?>" radar_keyword="<?php echo $this->_vars['item']['name']; ?>&nbsp;<?php if( (stristr($this->_vars['item']['cat_id'],'<span')) ){ ?>-<?php }else{  echo $this->_vars['item']['cat_id'];  } ?>&nbsp;<?php echo $this->_vars['item']['type_id']; ?>" radar_name="<?php echo $this->_vars['item']['name']; ?>" radar_brand="<?php echo $this->_vars['item']['brand']; ?>" radar_sn="" radar_catname="<?php if( (stristr($this->_vars['item']['cat_id'],'<span')) ){ ?>-<?php }else{  echo $this->_vars['item']['cat_id'];  } ?>" > </div>