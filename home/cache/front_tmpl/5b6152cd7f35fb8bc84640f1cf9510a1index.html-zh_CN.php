<?php if(!function_exists('tpl_modifier_amount')){ require(CORE_DIR.'/include_v5/smartyplugins/modifier.amount.php'); } ?><div class='CartWrap'> <div class="CartNav clearfix"> <div class="floatLeft"> <img src="statics/cartnav-step4.gif" alt="购物流程--确认订单填写购物信息" /> </div> <div class="floatRight"><img src="statics/cartnav-cart.gif" /></div> </div> </div> <form id="f_order_pay" target="_blank" action='<?php echo $this->_env_vars['base_url'],"paycenter",(((is_numeric("paycenter") && 'index'=="order") || !"order")?'':'-'."order"),'.html';?>' method="post"> <input type="hidden" name="order_id" value="<?php echo $this->_vars['order']['order_id']; ?>" /> <input type="hidden" name="money" value="<?php echo $this->_vars['order']['amount']['total']-$this->_vars['order']['amount']['payed']; ?>" id="hidden_money"/> <input type="hidden" name="currency" value="<?php echo $this->_vars['order']['currency']; ?>" /> <input type="hidden" name="cur_money" value="<?php echo $this->_vars['order']['cur_money'] ; ?>" id="hidden_cur_money"/> <input type="hidden" name="cur_rate" value="<?php echo $this->_vars['order']['cur_rate'] ; ?>" /> <input type="hidden" name="cur_def" value="<?php echo $this->_vars['order']['cur_def'] ; ?>" /> <div class="success clearfix pushdown-2"> <h3>恭喜！您的订单已经提交！</h3> </div> <h3>订单信息</h3> <div class='ColColorBlue' style='padding:5px;border:1px #ccc solid;'> <span>订单编号：</span><strong class='font14px'><?php echo $this->_vars['order']['order_id']; ?></strong>&nbsp;&nbsp;[ <a href="<?php echo $this->_env_vars['base_url'],"order-{$this->_vars['order']['order_id']}",(((is_numeric($this->_vars['order']['order_id']) && 'index'==detail) || !detail)?'':'-'.detail),'.html';?>" >查看订单详细信息&raquo;</a> ] <div id="billNo" style="display:none"></div> </div> <div class='division' style='padding:15px;'> <span>订单金额:</span><strong class="hueorange fontcolorRed font20px" id="span_amount"><?php echo tpl_modifier_amount($this->_vars['order']['amount']['total']-$this->_vars['order']['amount']['payed']); ?></strong> </div> <h3>订单支付</h3> <?php if( $this->_vars['order']['amount']['total'] > $this->_vars['order']['amount']['payed'] ){ ?> <div class='ColColorBlue' style='padding:5px;border:1px #ccc solid;'> <?php if( !$this->_vars['order']['selecttype'] ){ ?> 您选择了：<strong class="hueorange fontcolorRed font14px"><?php echo $this->_vars['order']['paymethod']; ?></strong> <a href='<?php echo $this->_env_vars['base_url'],"order-{$this->_vars['order']['order_id']}-true",(((is_numeric(true) && 'index'==index) || !index)?'':'-'.index),'.html';?>' >[ 选择其他支付方式 ]</a> <?php }else{ ?> 请选择支付方式: <?php } ?> </div> <?php } ?> <div class='division'> <?php if( $this->_vars['order']['selecttype'] ){ ?> <div class='select-paymethod'> <?php echo $this->_fetch_compile_include($this->_get_resource('user:'.$this->theme.'/'."common/paymethod.html")?('user:'.$this->theme.'/'."common/paymethod.html"):('shop:'."common/paymethod.html"), array());?> </div> <div class="textcenter" style="padding:10px;"> <input type="submit" class='actbtn btn-pay' value="立刻支付" /> </div> <?php }else{ ?> <input type="hidden" name="payment[payment]" value="<?php echo $this->_vars['order']['payment']; ?>" /> <?php if( $this->_vars['extendInfo'] ){ ?> <div class='division paymethodextendInfo'> <?php foreach ((array)$this->_vars['extendInfo'] as $this->_vars['key'] => $this->_vars['item']){  if( $this->_vars['item']['type']=='select' ){ ?> <select name=<?php echo $this->_vars['key']; ?>> <?php foreach ((array)$this->_vars['item']['value'] as $this->_vars['vkey'] => $this->_vars['vitem']){ ?> <option value="<?php echo $this->_vars['vitem']['value']; ?>" <?php if( $this->_vars['vitem']['checked'] ){ ?>selected<?php } ?>><?php echo $this->_vars['vitem']['name']; ?></option> <?php } ?> </select> <?php }else{  foreach ((array)$this->_vars['item']['value'] as $this->_vars['vkey'] => $this->_vars['vitem']){  if( $this->_vars['item']['type']=='radio' ){ ?> <input <?php echo $this->_vars['vitem']['checked']; ?> type='radio' name=<?php echo $this->_vars['key']; ?> value=<?php echo $this->_vars['vitem']['value']; ?>><?php if( $this->_vars['vitem']['imgname'] ){  echo $this->_vars['vitem']['imgname'];  }else{  echo $this->_vars['vitem']['name'];  } ?></if> <?php }else{ ?> <input <?php echo $this->_vars['vitem']['checked']; ?> type='checkbox' name="<?php echo $this->_vars['key']; ?>[]" value=<?php echo $this->_vars['vitem']['value']; ?>><?php if( $this->_vars['vitem']['imgname'] ){  echo $this->_vars['vitem']['imgname'];  }else{  echo $this->_vars['vitem']['name'];  } ?></if> <?php }  }  }  } ?> </div> <?php } ?> <table width="100%" border="0" cellspacing="0" cellpadding="0"> <tr> <td width="50%"> <?php if( $this->_vars['order']['amount']['total'] > $this->_vars['order']['amount']['payed'] ){  if( $this->_vars['order']['paytype']=="OFFLINE" ){ ?> <div class="customMessages">{pay_offline}</strong> <?php }else{  if( $this->_vars['order']['payment']==-1 ){ ?><div class="customMessages">{pay_wait}</div><?php }else{  if( $this->_vars['order']['paytype']=="DEPOSIT" ){ ?> <strong>您选择了预存款支付</strong> <?php }else{ ?> <div class="customMessages">{pay_message}</div> <?php }  } ?> </td> </tr> <tr> <td> <?php if( $this->_vars['order']['payment']!=-1 ){ ?> <input type="submit" class='actbtn btn-pay' value="立刻支付" /><?php }  }  }else{ ?> 订单不需要再支付,请等待我们处理 <?php } ?> </td> </tr> </table> <?php } ?> </div> </form> <script>
        void function(){
        var form= $('f_order_pay');
            Order ={
                
                paymentChange:function(target){
                         if(!target)return;
                         target = $(target);
                     var money  = target.get('moneyamount');
                     var fmoney = target.get('formatmoney');
                     var paytype= target.get('paytype');
                     
                     $('hidden_money').set('value',money);
                     $('hidden_cur_money').set('value',money);
                     $('span_amount').set('text',fmoney);
                     form.getElement('input[type=submit]').set('value',paytype!='offline'?'立即付款':'确定');
                     
                     form.getElement('input[type=submit]')[(paytype=='offline'?'addClass':'removeClass')]('btn-pay-ok');
                     /* $$('#_normal_payment th .ExtendCon input[type=radio]').fireEvent('checkedchange');*/
                }
            
            };
            
            if($E('#f_order_pay .select-paymethod')){
                Order.paymentChange($E('#f_order_pay .select-paymethod input[checked]'));
                
                if(form&&form.getElement('input[type=submit]')){
                    form.getElement('input[type=submit]').addEvent('click',function(e){
                        
                        if(!$E('#f_order_pay .select-paymethod input[checked]')){
                        MessageBox.error('请选择支付方式');
                        return e.stop();
                        }
                    
                    });
                }
            }


            selecttype = "<?php echo $this->_vars['order']['selecttype']; ?>";
            paytype = "<?php echo $this->_vars['order']['paytype']; ?>";
            if(selecttype != 1 && paytype.toLocaleLowerCase()=="lakala"){
                if($('billNo').getText() == ""){
                    new Request.HTML({update:'billNo'
                        
                    }).post("<?php echo $this->_vars['base_url']; ?>/index.php?action_getinfo_ctl-get_billno.html",{order_id:"<?php echo $this->_vars['order']['order_id']; ?>", payment_id:"<?php echo $this->_vars['order']['payment']; ?>"});
                }
                $('billNo').setStyle('display','block');
            }
        }();
</script> 