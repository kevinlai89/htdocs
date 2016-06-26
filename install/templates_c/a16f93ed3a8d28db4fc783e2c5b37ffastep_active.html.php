<style>.content-inner{background:url(images/loading.gif) no-repeat center center;}</style> <iframe id="frm1" style="visibility:hidden;" frameborder="0" allowtransparency='true' scrolling='auto' width='100%' height='100%' src="about:blank"></iframe> <script>
(function(){
var fm = $('frm1');
    fm.src = 'http://passport.shopex.cn/index.php?ctl=iframeent&act=index&url=<?php echo $this->_vars['link_url']; ?>&t=<?php echo time(); ?>';
    fm.onload = function(){
            fm.style.visibility = 'visible';
            fm.onload = function(){};
    };
})();

      
</script>