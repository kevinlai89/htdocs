<div id="swfmovie_<?php echo $this->_vars['widgets_id']; ?>">Flash Movie</div> <script type="text/javascript">

window.addEvent('domready', function(){

  var path = "plugins/widgets/ad_multiple/";

  var ad_style = "<?php echo $this->_vars['setting']['ad_style']; ?>";

  var link_arr = "<?php $this->_env_vars['foreach'][pics]=array('total'=>count($this->_vars['setting']['pic']),'iteration'=>0);foreach ((array)$this->_vars['setting']['pic'] as $this->_vars['key'] => $this->_vars['data']){
                    $this->_env_vars['foreach'][pics]['first'] = ($this->_env_vars['foreach'][pics]['iteration']==0);
                    $this->_env_vars['foreach'][pics]['iteration']++;
                    $this->_env_vars['foreach'][pics]['last'] = ($this->_env_vars['foreach'][pics]['iteration']==$this->_env_vars['foreach'][pics]['total']);
 if( $this->_env_vars['foreach']['pics']['last'] ){  echo $this->_vars['data']['link'];  }else{  echo $this->_vars['data']['link']; ?>|<?php }  } unset($this->_env_vars['foreach'][pics]); ?>".trim();
  
  var linktarget_arr = "<?php $this->_env_vars['foreach'][pics]=array('total'=>count($this->_vars['setting']['pic']),'iteration'=>0);foreach ((array)$this->_vars['setting']['pic'] as $this->_vars['key'] => $this->_vars['data']){
                    $this->_env_vars['foreach'][pics]['first'] = ($this->_env_vars['foreach'][pics]['iteration']==0);
                    $this->_env_vars['foreach'][pics]['iteration']++;
                    $this->_env_vars['foreach'][pics]['last'] = ($this->_env_vars['foreach'][pics]['iteration']==$this->_env_vars['foreach'][pics]['total']);
 if( $this->_env_vars['foreach']['pics']['last'] ){  echo $this->_vars['data']['linktarget'];  }else{  echo $this->_vars['data']['linktarget']; ?>|<?php }  } unset($this->_env_vars['foreach'][pics]); ?>".trim();
  
  var image_length = getLength(<?php echo count($this->_vars['setting']['pic']); ?>);
 
  if(ad_style=="graphics") {
  
    var tabtext_arr = "<?php $this->_env_vars['foreach'][pics]=array('total'=>count($this->_vars['setting']['pic']),'iteration'=>0);foreach ((array)$this->_vars['setting']['pic'] as $this->_vars['key'] => $this->_vars['data']){
                    $this->_env_vars['foreach'][pics]['first'] = ($this->_env_vars['foreach'][pics]['iteration']==0);
                    $this->_env_vars['foreach'][pics]['iteration']++;
                    $this->_env_vars['foreach'][pics]['last'] = ($this->_env_vars['foreach'][pics]['iteration']==$this->_env_vars['foreach'][pics]['total']);
 if( $this->_env_vars['foreach']['pics']['last'] ){  echo $this->_vars['data']['text'];  }else{  echo $this->_vars['data']['text']; ?>|<?php }  } unset($this->_env_vars['foreach'][pics]); ?>".trim();
  
    var tabsmallpic_arr = "<?php $this->_env_vars['foreach'][pics]=array('total'=>count($this->_vars['setting']['pic']),'iteration'=>0);foreach ((array)$this->_vars['setting']['pic'] as $this->_vars['key'] => $this->_vars['data']){
                    $this->_env_vars['foreach'][pics]['first'] = ($this->_env_vars['foreach'][pics]['iteration']==0);
                    $this->_env_vars['foreach'][pics]['iteration']++;
                    $this->_env_vars['foreach'][pics]['last'] = ($this->_env_vars['foreach'][pics]['iteration']==$this->_env_vars['foreach'][pics]['total']);
 if( $this->_env_vars['foreach']['pics']['last'] ){  echo $this->_vars['data']['smalllink'];  }else{  echo $this->_vars['data']['smalllink']; ?>|<?php }  } unset($this->_env_vars['foreach'][pics]); ?>".trim();
  
    var link_arr_test = link_arr.split(",");
    var tabsmallpic_arr_test= tabsmallpic_arr.split(",");
    var resetarr = false;

    for(var i=link_arr_test.length-1;i>=0;i--) {
	  if(link_arr_test[i] == "" && tabsmallpic_arr_test[i] == "") {
	    link_arr_test.splice(i,1);
	    tabsmallpic_arr_test.splice(i,1);
        image_length--;
		resetarr = true;
	  }
    }
  
    if(resetarr) {
      link_arr="";
      tabsmallpic_arr="";
      link_arr_test.each(function(item,index) {
        (link_arr_test.length-1==index) ? (link_arr+=item):(link_arr+=item+",");
      });
      tabsmallpic_arr_test.each(function(item,index) {
        (tabsmallpic_arr_test.length-1==index) ? (tabsmallpic_arr+=item):(tabsmallpic_arr+=item+",");
      });
    }
	
  }
  
  function getLength(l) {
    var len = l;
	if(link_arr=="") return 0;
	return len-1;
  }
  
  var swfvars = {
     widgetpath:path,
     allimage:image_length,
     adstyle:ad_style,
     swfwidth:<?php echo $this->_vars['setting']['ad_swf_width']; ?>,
     swfheight:<?php echo $this->_vars['setting']['ad_swf_height']; ?>,
     swfviewstyle: "<?php echo $this->_vars['setting']['ad_viewstyle']; ?>",
     links:link_arr,
     linktarget:linktarget_arr,
     windowtarget:"<?php echo $this->_vars['setting']['ad_windowtarget']; ?>",
	 changeimagespeed:<?php echo $this->_vars['setting']['ad_changeimagespeed']; ?>
  };
  if(ad_style == "number") {
    swfvars.mouseevent = "<?php echo $this->_vars['setting']['mouseevent']; ?>";
    swfvars.numberstyle = "<?php echo $this->_vars['setting']['numberstyle']; ?>";
    swfvars.numberposition = "<?php echo $this->_vars['setting']['numberposition']; ?>";
    swfvars.numberbtnstyle = "<?php echo $this->_vars['setting']['numberbtnstyle']; ?>";
    swfvars.autochangeimage = <?php echo $this->_vars['setting']['autochangeimage']; ?>;
    swfvars.imagewait = <?php echo $this->_vars['setting']['imagewait']; ?>;
    swfvars.btncolor = "<?php echo $this->_vars['setting']['btncolor']; ?>";
    swfvars.btnbgcolor = "<?php echo $this->_vars['setting']['btnbgcolor']; ?>";
    swfvars.btnhovercolor = "<?php echo $this->_vars['setting']['btnhovercolor']; ?>";
    swfvars.btnhoverbgcolor = "<?php echo $this->_vars['setting']['btnhoverbgcolor']; ?>";
    swfvars.btnbordercolor = "<?php echo $this->_vars['setting']['btnbordercolor']; ?>";
    swfvars.btnhoverbordercolor = "<?php echo $this->_vars['setting']['btnhoverbordercolor']; ?>";
    swfvars.numbercolumncolor = "<?php echo $this->_vars['setting']['numbercolumncolor']; ?>";
    swfvars.numbercolumnalpha = <?php echo $this->_vars['setting']['numbercolumnalpha']; ?>;
    swfvars.displayarrow = <?php echo $this->_vars['setting']['displayarrow']; ?>;
    swfvars.swfbgcolor = "<?php echo $this->_vars['setting']['swfbgcolor']; ?>";
  }
  else if(ad_style=="graphics") {
    swfvars.tabmode  = "<?php echo $this->_vars['setting']['tabmode']; ?>";
	swfvars.tabstyle = "<?php echo $this->_vars['setting']['tabstyle']; ?>";
    swfvars.tabcount  = <?php echo $this->_vars['setting']['tabcount']; ?>;
	swfvars.tabsize  = <?php echo $this->_vars['setting']['tabsize']; ?>;
    swfvars.mouseevent_graphics = "<?php echo $this->_vars['setting']['mouseevent_graphics']; ?>";
	swfvars.tabposition = "<?php echo $this->_vars['setting']['tabposition']; ?>";
	swfvars.autochangeimage_graphics = <?php echo $this->_vars['setting']['autochangeimage_graphics']; ?>;
	swfvars.imagewait_graphics = <?php echo $this->_vars['setting']['imagewait_graphics']; ?>;
	swfvars.btncolor_graphics = "<?php echo $this->_vars['setting']['btncolor_graphics']; ?>";
	swfvars.btnbgcolor_graphics = "<?php echo $this->_vars['setting']['btnbgcolor_graphics']; ?>";
	swfvars.btnhovercolor_graphics = "<?php echo $this->_vars['setting']['btnhovercolor_graphics']; ?>";
	swfvars.btnhoverbgcolor_graphics = "<?php echo $this->_vars['setting']['btnhoverbgcolor_graphics']; ?>";
	swfvars.btnalpha = <?php echo $this->_vars['setting']['tabalpha']; ?>;
	swfvars.btnhoveralpha = <?php echo $this->_vars['setting']['tabhoveralpha']; ?>;
	swfvars.tabcolumncolor = "<?php echo $this->_vars['setting']['tabcolumncolor']; ?>";
	swfvars.tabcolumnalpha = <?php echo $this->_vars['setting']['tabcolumnalpha']; ?>;
	swfvars.swfbgcolor_graphics = "<?php echo $this->_vars['setting']['swfbgcolor_graphics']; ?>";	
	swfvars.tabsmallpic = tabsmallpic_arr;
	swfvars.tabtext = tabtext_arr;
  }

  var obj = new Swiff(path+'swf/main.swf', {
    width:  <?php echo $this->_vars['setting']['ad_swf_width']; ?>,
    height: <?php echo $this->_vars['setting']['ad_swf_height']; ?>,
    container: $('swfmovie_<?php echo $this->_vars['widgets_id']; ?>'),
    events: {
      load:function() {
        alert("Flash is loaded!");
      }
    },
    vars:swfvars
  });
  
 
});
</script>