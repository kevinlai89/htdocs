<?php if(!function_exists('tpl_block_capture')){ require(CORE_DIR.'/include_v5/smartyplugins/block.capture.php'); }  $this->_tag_stack[] = array('tpl_block_capture', array('name' => "header")); tpl_block_capture(array('name' => "header"), null, $this); ob_start(); ?> <!--JAVASCRIPTS SRC--> <script type="text/javascript" src="js/package/tools.js"></script> <!--JAVASCRIPTS SRC END--> <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_content = tpl_block_capture($this->_tag_stack[count($this->_tag_stack) - 1][1], $_block_content, $this); echo $_block_content; array_pop($this->_tag_stack); $_block_content=''; ?> <div class="notice"> 注意：下载过程中请勿关闭此页面！ </div> <img src="images/loading.gif" id="id_down_progress" class="imgbundle" style="background-image: none;" /> <div id='download_info'></div> <script>
function download(url){
	new Request.HTML({method:'post'}).get(url);
}
function success(url){
   W.page(url);
}
window.addEvent('domready', function(){
	download('<?php echo $this->_vars['request_url']; ?>');
	$('download_info').setHTML('<div class="note">正在建立下载链接...</div>');
});
</script>