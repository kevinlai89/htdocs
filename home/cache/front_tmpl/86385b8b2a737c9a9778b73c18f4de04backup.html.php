<div class="tableform"> <p class="notice">说明：您可以在此处备份商店的整站数据库结构和数据，一旦商店数据意外损坏，您可以通过数据库恢复功能恢复所备份的数据。<br /> <span class="loud">备份分卷大小：1024 K</span><br><span class="loud">备份过程中请勿进行其他页面操作。</span><br/> <span class="loud">上次备份时间：<?php if( !$this->_vars['time'] ){ ?>从未备份<?php }else{  echo $this->_vars['time'];  } ?></span> </p> <BR> <div id="BackupProgess" align='center'></div> <div id="backupbtn" class="table-action"> <button type="button" onclick='runbackup("")' class="btn"><span><span>开始备份</span></span></button> </div> </div> <script>
function runbackup(url){
  if(!url) {
    $('BackupProgess').innerHTML = '正在备份第1卷，请勿进行其他页面操作。';
    $('backupbtn').innerHTML = '';
  }
  if(!url) url = 'index.php?ctl=system/backup&act=backup&sizelimit=1024&fileid=0&tableid=0&startid=-1';
  new Ajax(url,{update:'BackupProgess',data:'a=a',evalScripts:true}).request();
}
</script> 