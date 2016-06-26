<h3 class="success">系统安装成功!</h3> <h4>以下是您的商店系统管理员帐户信息：</h4> <table> <tr> <th width="70">网店前台:</th> <td><?php echo $this->_vars['shop_url']; ?></td> </tr> <tr> <th>网店管理:</th> <td><?php echo $this->_vars['shopadmin_url']; ?></td> </tr> <tr> <th>用户名:</th> <td><?php echo $this->_vars['uname']; ?></td> </tr> <tr> <th>密码:</th> <td><?php echo ((isset($this->_vars['password']) && ''!==$this->_vars['password'])?$this->_vars['password']:'(空密码)'); ?></td> </tr> </table> <div style="margin:10px;padding:10px;background:#D4E0EA;font-size:14px;font-weight:bold;text-align:center;border:1px #ccc solid;" > <a href="index.php?step=active" style="color:#333;text-decoration:none" id="active_enter">系统将在<i style="color:red;">60</i>秒后进入激活流程...(点击立即进入)</a> </div> <script>
      var _second = 60;
     (function(){
     
            $('active_enter').innerHTML = $('active_enter').innerHTML.replace(/([\d]+)/,(_second--));
            
            if(_second<1){
                    window.location.href = $('active_enter').href;
            }
            
            setTimeout(arguments.callee,1000);
     
     })();  
</script>