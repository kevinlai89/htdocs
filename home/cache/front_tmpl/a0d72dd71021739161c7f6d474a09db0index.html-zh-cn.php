<div class="tableform notice">ShopEx企业通行证是您享受ShopEx服务的唯一标识，它记录了您的商家信息、购买服务记录、充值帐户金额等重要信息。<br>您只要通过注册"ShopEx企业通行证"就可以绑定产品的授权证书，在您遇到商店系统需要重新安装时，只需要输入您的"ShopEx企业通行证"的帐号和密码，就可以继续使用原有的重要信息了。</div> <div class="tableform"> <h4>ShopEx企业通行证：<?php echo $this->_vars['ent_id']; ?><span style='color:#aaaaaa'>(<?php echo $this->_vars['ent_email']; ?>)</span></h4> <?php if( $this->_vars['license'] ){ ?> <div class="division"> <table width="100%" border="0" cellspacing="0" cellpadding="0"> <tr> <td>提示&nbsp:&nbsp&nbsp&nbsp您的授权证书<b style='color:#ff6600'>(<?php echo $this->_vars['certi_id']; ?>)</b>已经绑定商派企业通行证,如果想查看相关信息请 <b>登录</b>ShopEx企业用户中心</td> </tr> </table> </div> <?php }else{ ?> <div class="division"> 提示：只有在网络服务器安装的ShopEx商店系统才拥有证书功能，您的商店系统由于是在本地安装，所以无ShopEx证书，无法使用ShopEx证书下载和上传功能。如果您将本地的商店系统迁移至服务器，则会自动获得ShopEx证书。 </div> <?php } ?> </div> <!-- 内网http://shopexuser.ex-sandbox.com/index.php?ctl=passport&act=login--> <form action="http://passport.shopex.cn/index.php?ctl=passport&act=login" method="post" target='_blank'> <div class="tableform"> <h4>登录ShopEx企业用户中心</h4> <div class="division"> <table width="100%" border="0" cellspacing="0" cellpadding="0"> <tr> <th>用户名：</th> <td><input name="entid" type="text" title="请填写企业账号或绑定邮箱" placeholder="请填写企业账号或绑定邮箱" style='width: 170px'></td> </tr> <tr> <th>密码：</th> <td><input name="password" type="password" style='width: 170px'><span><a class="forgot-password" target="_blank" style='color:#336699' href="http://passport.shopex.cn/index.php?ctl=passport&act=forget">忘记密码？</a></span></td> </tr> <input name="dosubmit" type="hidden"> </table> </div> <div class="table-action"> <button type="submit" class="btn"><span><span>登录</span></span></button> </div> </form> <div class="tableform"> <h4>ShopEx证书下载备份</h4> <?php if( $this->_vars['license'] ){ ?> <div class="division"> <table width="100%" border="0" cellspacing="0" cellpadding="0"> <tr> <th>当前证书节点号:</th> <td><?php echo ((isset($this->_vars['node_id']) && ''!==$this->_vars['node_id'])?$this->_vars['node_id']:'-'); ?></td> </tr> <tr> <th>当前证书:</th> <td><?php echo $this->_vars['certi_id']; ?></td> </tr> </table> </div> <div class="table-action"> <button class="btn" onclick="window.open('<?php echo $this->_vars['license_url']; ?>')">下载证书</button> </div> <?php }else{ ?> <div class="division"> 提示：只有在网络服务器安装的ShopEx商店系统才拥有证书功能，您的商店系统由于是在本地安装，所以无ShopEx证书，无法使用ShopEx证书下载和上传功能。如果您将本地的商店系统迁移至服务器，则会自动获得ShopEx证书。 </div> <?php } ?> </div> <form action="index.php?ctl=service/certificate&act=upLicense" method="POST" enctype="multipart/form-data"> <div class="tableform"> <h4>ShopEx证书上传恢复</h4> <div class="division"> <table width="100%" border="0" cellspacing="0" cellpadding="0"> <tr> <th>请选择证书：</th> <td><input name="license" type="file"></td> </tr> </table> </div> <div class="table-action"> <button type="submit" class="btn"><span><span>上传恢复</span></span></button> </div> </form> <?php if( $this->_vars['license'] ){ ?> <form action="index.php?ctl=service/certificate&act=checkPass" method="get" enctype="multipart/form-data"> <div class="tableform"> <h4>错误证书删除</h4> <div class="division"> 当您上传了错误的ShopEx证书导致证书功能失效时，请先在此处清空错误的证书，再使用证书上传恢复功能恢复正确的证书。 </div> <div class="table-action"> <button type="submit" class="btn"><span><span>删除</span></span></button> </div> </div> </form> <?php } ?> 