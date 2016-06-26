<?php if(!function_exists('tpl_function_html_options')){ require(CORE_DIR.'/include_v5/smartyplugins/function.html_options.php'); } ?><div id="ready_step"> <h3>数据库已配置并连接成功，数据表前缀为&nbsp;"<i><?php echo $this->_vars['db_pre']; ?></i>"</h3> <table width="100%"> <?php $this->_env_vars['foreach'][basic]=array('total'=>count($this->_vars['svinfo']['basic']),'iteration'=>0);foreach ((array)$this->_vars['svinfo']['basic'] as $this->_vars['key'] => $this->_vars['value']){ $this->_env_vars['foreach'][basic]['first'] = ($this->_env_vars['foreach'][basic]['iteration']==0); $this->_env_vars['foreach'][basic]['iteration']++; $this->_env_vars['foreach'][basic]['last'] = ($this->_env_vars['foreach'][basic]['iteration']==$this->_env_vars['foreach'][basic]['total']); ?> <tr<?php if( $this->_env_vars['foreach']['basic']['iteration'] %2==1 ){ ?> style="background:#E0EAF2"<?php } ?>> <td ><?php echo $this->_vars['key']; ?></td><td><?php echo $this->_vars['value']; ?></td> </tr> <?php } unset($this->_env_vars['foreach'][basic]); ?> </table> <?php if( !$this->_vars['svinfo']['allow_install'] && !(defined('SHOP_DEVELOPER') && SHOP_DEVELOPER) ){ ?> <h4 style="background:#FF6600;padding:5px;color:#fff">系统无法继续安装，缺少必要的服务器环境.</h4> <table width="100%"> <?php $this->_env_vars['foreach'][basic]=array('total'=>count($this->_vars['svinfo']['require']),'iteration'=>0);foreach ((array)$this->_vars['svinfo']['require'] as $this->_vars['key'] => $this->_vars['value']){ $this->_env_vars['foreach'][basic]['first'] = ($this->_env_vars['foreach'][basic]['iteration']==0); $this->_env_vars['foreach'][basic]['iteration']++; $this->_env_vars['foreach'][basic]['last'] = ($this->_env_vars['foreach'][basic]['iteration']==$this->_env_vars['foreach'][basic]['total']); ?> <tr<?php if( !$this->_vars['value']['result'] ){ ?> style="background:#A4141D;color:#fff;font-weight:bold"<?php }else{  if( $this->_env_vars['foreach']['basic']['iteration'] %2==1 ){ ?> style="background:#E0EAF2"<?php }  } ?>> <td width="60%"><?php echo $this->_vars['key']; ?></td><td><?php echo $this->_vars['value']['value']; ?></td> </tr> <?php } unset($this->_env_vars['foreach'][basic]); ?> </table> <?php }else{ ?> <h4>建立商店管理员帐户：</h4> <form id="show" method="post" action="index.php?step=complete"> <table> <tr> <th width="120px" align="right" scope="row"><label for="ipt_uname">管理员用户名：</label></th> <td width="150px"><input type="text" name="uname" id="ipt_uname" value="admin" tabindex="1"></td> <th align="right">服务器时区：</th> <td> <?php echo $this->_vars['stimezone']; ?> </td> </tr> <tr> <th align="right" scope="row"><label for="ipt_passwd">管理员密码：</label></th> <td><input type="password" name="password" id="ipt_passwd" tabindex="2"></td> <th align="right">您当前时间：</th> <td> <select style="width:200px" name="localtime" tabindex="6" id="localtime"> <?php echo tpl_function_html_options(array('options' => $this->_vars['timelist'],'selected' => $this->_vars['defaultHour']), $this);?> </select> </td> </tr> <tr> <th align="right" scope="row"><label for="ipt_re_passwd">再输入一次密码：</label></th> <td colspan="3"><input type="password" name="re_passwd" id="ipt_re_passwd" tabindex="3"></td> </tr> <tr> <td align="right" valign="top"><input type="checkbox" id="use_demo" checked="checked" name="use_demo" value="yes" tabindex="4"></td> <td colspan="3"><label for="use_demo">安装体验数据</label> <br /><span style="color:#666">装载体验数据后，您不必进行任何系统设置，可以用模拟数据体验ShopEx网店系统的各项功能</span></td> </tr> <tr> <td align="right" valign="top"><input type="checkbox" checked="checked" id='install_stat' name="install_stat" value="yes" tabindex="4"></td> <td colspan="3"><label for="install_stat">安装营销统计工具</label> <br /><span style="color:#666">营销统计工具能够帮助商家整合营销全程数据，分析消费者行为特征，帮助店家不断优化官网网店的营销效果。</span></td> </tr> </table> </form> <div class="button"><input type="image" src="images/btn-install.gif" tabindex="5" onclick="startInstall()"/></div> <?php } ?> </div> <div id="install_progress" style='display:none'> <div id="now_installing">正在安装数据库...</div> <div id="install_info"></div> </div> <form action="http://service.shopex.cn/plugins/install_errorlog/b2c_install_erlog.php" style="display:none" method="post" id="server_form" target="shopex_iframe"> <input name="webserver" id="webserver" value="" type="text"/> <input name="os" id="os" value="" type="text"/> <input name="phpver" id="phpver" value="" type="text"/> <input name="mysql" id="mysql" value="" type="text"/> <input name="domain" id="domain" value="" type="text"/> <textarea name="error_msg" id="error_msg"></textarea> <input name="contact" id="contact" value="" type="text"/> </form> <iframe frameborder="0" src="about:blank" width='0' height='0' id="shopex_iframe" name="shopex_iframe"></iframe> <script>
  function check_installFrom(str){
        if(!$('ipt_uname').value){
          alert('管理员用户名不能为空。');
          return false;
        }
        if($('ipt_passwd').value !== $('ipt_re_passwd').value){
          alert('两次输入密码不一致。');
          return false;
        }
        if(!$('ipt_passwd').value){
          return confirm('确定密码为空吗？这样系统管理帐号的安全性比较低。');
        }
        return true;
  }
  
  function startInstall(){
     
         if(check_installFrom()){
        
            $('ready_step').style.display='none';
            $('install_progress').style.display='';
        
            installing('index.php?step=install_mysql_db');
        }
  }
    var server,mysql;

    function installing(url){
    
       XHR.open('post',url,true);
       XHR.onreadystatechange=function(){
       
           if (XHR.readyState != 4)return;
           
   
              XHR.onreadystatechange=function(){};
           
          if ((XHR.status >= 200) && (XHR.status < 300)){
                  
                  var rs=XHR.responseText;
                  
                  
                   if(rs=='success'){
                        $('install_info').innerHTML+='<br/>安装成功!';
                        sendError($('install_info').innerHTML);
                        alert('安装成功,点击确定进入下一步!');                    
                        $('show').submit();
                    }else{
                        server=server||XHR.getResponseHeader("Server").split(/\s/);                
                        mysql=mysql||XHR.getResponseHeader("Mysql");
                        var step=rs.split('|');
                        $('install_info').innerHTML+='<br/>'+step[0];
                        $('now_installing').innerHTML=(step[2] ? '正在安装'+step[2]+'...' : '正在完成安装...');
                        
                        if(step[1]!='fail'){
                            installing(step[1]);
                        }else{
                            sendError($('install_info').innerHTML);
                            $('now_installing').innerHTML='安装失败';
                        }
                    }
          
          }
           
       
       
       };
       
       
       XHR.setRequestHeader('X-Requested-With','XMLHttpRequest');
       XHR.setRequestHeader('Accept','text/javascript, text/html, application/xml, text/xml, */*');
       XHR.setRequestHeader('Content-type', 'application/x-www-form-urlencoded charset=utf-8');
       
       XHR.send('password='+encodeURIComponent($('ipt_passwd').value)+'&uname='+encodeURIComponent($('ipt_uname').value)+'&timezone='+$('localtime').value+'&use_demo='+$('use_demo').checked+'&install_stat='+$('install_stat').checked);
       
    }
    function sendError(errmsg){
         if(/<b>(Warning|Error)<\/b>/i.test(errmsg)) {
            var msg="如:email,电话,手机,qq等联系方式";
            var contact=prompt("安装时发生错误，请输入您的联系方式方便与您联系",msg);
            if(contact&&contact!=msg){                        
                    $('webserver').value=server[0];
                    $('os').value=server[1];
                    $('phpver').value=server[2];
                    $('mysql').value=mysql;
                    $('domain').value=document.domain;
                    $('contact').value=contact;
                    $('error_msg').value=errmsg;                                    
                    $('server_form').submit();
                    alert("信息提交成功");                            
            }
        }           
    }
</script>