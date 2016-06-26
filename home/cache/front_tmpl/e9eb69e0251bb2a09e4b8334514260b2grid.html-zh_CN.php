<?php if(!function_exists('tpl_modifier_storager')){ require(CORE_DIR.'/include_v5/smartyplugins/modifier.storager.php'); } if(!function_exists('tpl_modifier_escape')){ require(CORE_DIR.'/include_v5/smartyplugins/modifier.escape.php'); } if(!function_exists('tpl_function_goodsmenu')){ require(CORE_DIR.'/include_v5/smartyplugins/function.goodsmenu.php'); } $CURRENCY = &$this->system->loadModel('system/cur'); ?><table width="100%" border="0" cellpadding="0" cellspacing="0" class='grid'> <tbody> <?php if( count($this->_vars['products']) > 0 ){ ?> <tr valign="top"> <?php $this->_env_vars['foreach'][goods]=array('total'=>count($this->_vars['products']),'iteration'=>0);foreach ((array)$this->_vars['products'] as $this->_vars['product']){ $this->_env_vars['foreach'][goods]['first'] = ($this->_env_vars['foreach'][goods]['iteration']==0); $this->_env_vars['foreach'][goods]['iteration']++; $this->_env_vars['foreach'][goods]['last'] = ($this->_env_vars['foreach'][goods]['iteration']==$this->_env_vars['foreach'][goods]['total']); ?> <td id="pdt-<?php echo $this->_vars['product']['goods_id']; ?>" product="<?php echo $this->_vars['product']['goods_id']; ?>" width="<?php echo (floor(100/($this->system->getConf('gallery.display.grid.colnum'))));?>%;"> <div class="items-gallery <?php echo $this->_vars['mask_webslice']; ?>"> <div class="goodpic" style='<?php if( $this->system->getConf('site.thumbnail_pic_width') !=0 && $this->system->getConf('site.thumbnail_pic_height') !=0 ){ ?>height:<?php echo $this->system->getConf('site.thumbnail_pic_height'); ?>px; <?php } ?>'> <a target="_blank" href='<?php echo $this->_env_vars['base_url'],"product-{$this->_vars['product']['goods_id']}",(((is_numeric($this->_vars['product']['goods_id']) && 'index'=="index") || !"index")?'':'-'."index"),'.html';?>' style='<?php if( $this->system->getConf('site.thumbnail_pic_width') !=0 && $this->system->getConf('site.thumbnail_pic_height') !=0 ){ ?> width:<?php echo $this->system->getConf('site.thumbnail_pic_width'); ?>px;height:<?php echo $this->system->getConf('site.thumbnail_pic_height'); ?>px;<?php } ?>'> <img src="<?php echo tpl_modifier_storager(((isset($this->_vars['product']['thumbnail_pic']) && ''!==$this->_vars['product']['thumbnail_pic'])?$this->_vars['product']['thumbnail_pic']:$this->system->getConf('site.default_thumbnail_pic'))); ?>" alt="<?php echo tpl_modifier_escape($this->_vars['product']['name'],html); ?>"<?php if( $this->system->getConf('site.thumbnail_pic_width') !=0 ){ ?> width="<?php echo $this->system->getConf('site.thumbnail_pic_width'); ?>px"<?php }  if( $this->system->getConf('site.thumbnail_pic_height') !=0 ){ ?>height="<?php echo $this->system->getConf('site.thumbnail_pic_height'); ?>px"<?php } ?>/> </a> </div> <div class="goodinfo"> <table width="100%" border="0" cellpadding="0" cellspacing="0" class="entry-content"> <tr> <td colspan="2"><h6><a href="<?php echo $this->_env_vars['base_url'],"product-{$this->_vars['product']['goods_id']}",(((is_numeric($this->_vars['product']['goods_id']) && 'index'=="index") || !"index")?'':'-'."index"),'.html';?>" title="<?php echo tpl_modifier_escape($this->_vars['product']['name'],html); ?>" class="entry-title"><?php echo tpl_modifier_escape($this->_vars['product']['name'],"html"); ?></a></h6></td> </tr> <tr> <td colspan="2"><ul> <li><span class="price1"><?php echo $CURRENCY->changer($this->_vars['product']['price']); ?></span></li> </ul></td> </tr> <tr> <td><?php if( $this->_vars['product']['mktprice'] && $this->_vars['setting']['mktprice'] ){ ?><span class="mktprice1"><?php echo $CURRENCY->changer($this->_vars['product']['mktprice']); ?></span><?php }else{ ?>&nbsp;<?php } ?></td> <td><ul class="button"> <?php echo tpl_function_goodsmenu(array('product' => $this->_vars['product'],'setting' => $this->_vars['setting']), $this);?> <li class="btncmp"> <a href="javascript:void(0)" onclick="gcompare.add({gid:'<?php echo $this->_vars['product']['goods_id']; ?>',gname:'<?php echo tpl_modifier_escape(addslashes($this->_vars['product']['name']),html); ?>',gtype:'<?php echo $this->_vars['product']['type_id']; ?>'});" class="btncmp" title="商品对比"> 商品对比 </a> </li> </ul></td> </tr> </table> </div> </div> </td> <?php if( !($this->_env_vars['foreach']['goods']['iteration']%$this->system->getConf('gallery.display.grid.colnum') ) ){ ?> </tr> <?php if( !$this->_env_vars['foreach']['goods']['last'] ){ ?> <tr valign="top"> <?php }  }elseif( $this->_env_vars['foreach']['goods']['last'] ){ ?> <td colspan="<?php echo (($this->system->getConf('gallery.display.grid.colnum')-$this->_env_vars['foreach']['goods']['iteration']%$this->system->getConf('gallery.display.grid.colnum')));?>">&nbsp;</td> </tr> <?php }  } unset($this->_env_vars['foreach'][goods]);  } ?> </tbody> </table> <script>
void function(){
/*橱窗放大镜
  author:litie[A]shopex.cn
  [c]  ShopEx
  last update : 2009年9月25日14:51:20
*/
    (new Image()).src = '<?php echo $this->_vars['base_url']; ?>statics/loading.gif';
    var getAmongPos = function(size,to){
                 var elpSize = $(to).getSize();
                 return {
                    'top':Math.abs((elpSize.y/2).toInt()-(size.height/2).toInt()+to.getPosition().y+elpSize.scroll.y),
                    'left':Math.abs((elpSize.x/2).toInt()-(size.width/2).toInt()+to.getPosition().x+elpSize.scroll.x)
                 };
            };

   $$('.grid .zoom a').addEvent('click',function(e){
            e.stop();
            if(this.retrieve('active'))return;
            var _this = this;
            _this.store('active',true);
            var tpic = this.getParent('.items-gallery').getElement('.goodpic img');
            var bpic_src = this.get('pic');
           
		   
		   
            var loading = new Element('div',{
                 styles:{'background':'#fff url(<?php echo $this->_vars['base_url']; ?>statics/loading.gif) no-repeat 50% 50%',
                         'width':40,
                         'height':40,
                         'border':'1px #e9e9e9 solid',
                         'opacity':.5}}).inject(document.body).amongTo(tpic);
            
			
            new Asset.image(bpic_src,{onload:function(img){
                  
				  
				  
                  loading.remove();
                  var winsize = window.getSize();
                  var imgSize = $(img).zoomImg(winsize.x,winsize.y,1);
                  var fxv = $extend(getAmongPos(imgSize,window),imgSize);
                  var imgFx = new Fx.Morph(img,{link:'cancel'});
				  
			
				
	
				  
				  
                  img.setStyles($extend(tpic.getCis(),{opacity:0.5})).inject(document.body).addClass('img-zoom').addEvent('click',function(){
				    
                      imgFx.start(tpic.getCis()).chain(function(){this.element.remove();_this.store('active',false);
					 if(window.ie6&&$chk($E('.filtmode select'))) {
					  $E('.filtmode select').setStyle('visibility','visible'); }
					  });
                  });
				  
				if(window.ie6&&$chk($E('.filtmode select'))) {
				 $E('.filtmode select').setStyle('visibility','hidden'); }
                  imgFx.start($extend(fxv,{opacity:1}));
				  
				  
                  document.addEvent('click',function(){
                       
                       img.fireEvent('click');
                       document.removeEvent('click',arguments.callee);
                  
                  });
            
            },onerror:function(){
                _this.store('active',false);
                loading.remove();
            }});
            
   
   });
   
   
   }();
  
</script>