<form id="_<?php echo $this->_vars['widgets_id']; ?>_wg_cfg" action='index.php?ctl=system/template&act=saveWg' method='post'> <?php $_tpl_tpl_vars = $this->_vars; echo $this->_fetch_compile_include("system/template/widgetHeader.html", array()); $this->_vars = $_tpl_tpl_vars; unset($_tpl_tpl_vars); ?> <div class="table-action"> <button type="submit" class="btn"><span><span>保存修改</span></span></button> </div> </form> <script>

$('_<?php echo $this->_vars['widgets_id']; ?>_wg_cfg').addEvent('submit',function(e){
  e=new Event(e).stop();
  //指向框架内对象
  //验证输入
  if(!this.bindValidator('_x_ipt'))return;
   $ES('textarea[ishtml=true]',this).getValue();
  var frameWin=$('themeFrame').contentWindow;
  var shopWidgets=frameWin.shopWidgets;
  var temId=$time()+$random(100,999);
  
  var remoteUrl=this.action+="&p[0]=<?php echo $this->_vars['widgets_type']; ?>&p[1]=<?php echo $this->_vars['widgets_id']; ?>&p[2]=<?php echo $this->_vars['theme']; ?>&p[3]="+temId;
  
  new Request({
  url:remoteUrl,
  method:'post',
  evalScript:false,
  onRequest:function(){
      $('loadMask').amongTo(window).show();
  },
  onSuccess:function(re){
       $('loadMask').hide();
        var wg=frameWin.document.createElement('div');
        $(wg).setHTML(re);
        wg= wg.getFirst();
        wg.setProperty('id',temId);
        shopWidgets.initDrags([shopWidgets.curWidget.replaceWith(wg)]);//使新版块可拖动摆放
        shopWidgets.drag_operate_box.setStyle('visibility','hidden');
        shopWidgets.curdialog.close();
  }}).send($('_<?php echo $this->_vars['widgets_id']; ?>_wg_cfg'));
  
});
</script>