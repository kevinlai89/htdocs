<?php $CURRENCY = &$this->system->loadModel('system/cur'); ?><div class="CartInfoItems" style="text-align:center;"> 目前选购商品共 <span><?php echo $this->_vars['cartCount']; ?></span> 种 <span><?php echo $this->_vars['cartNumber']; ?></span> 件&nbsp;&nbsp;&nbsp;&nbsp;合计:<span><?php echo $CURRENCY->changer($this->_vars['trading']['totalPrice']); ?></span> <div class='btnBar clearfix' style="margin-top:10px; padding-left:60px;"> <a class="actbtn btn-viewcart" href="<?php echo $this->_env_vars['base_url'],"cart",(((is_numeric(cart) && 'index'==index) || !index)?'':'-'.index),'.html';?>" target="_blank">进入购物车</a> <span class="actbtn btn-continue" onclick="$(this).getParent('.dialog').remove();" >继续购物</span> </div> </div>