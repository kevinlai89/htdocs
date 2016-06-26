<?php if(!function_exists('tpl_block_area')){ require(CORE_DIR.'/admin/smartyplugin/block.area.php'); }  $this->_vars["obj_id"]=$_GET['id'];  $_tpl_tpl_vars = $this->_vars; echo $this->_fetch_compile_include('editor/the_filter.html', array()); $this->_vars = $_tpl_tpl_vars; unset($_tpl_tpl_vars);  $this->_tag_stack[] = array('tpl_block_area', array('inject' => '.mainFoot')); tpl_block_area(array('inject' => '.mainFoot'), null, $this); ob_start(); ?> <center> <button id="<?php echo "finder-fshow-ok-{$_GET['id']}";?>" type="button" class="btn"><span><span><img src="images/transparent.gif" class="imgbundle icon" style="width:24px;height:16px;background-position:0 -1843px;" />开始筛选</span></span></button> </center> <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_content = tpl_block_area($this->_tag_stack[count($this->_tag_stack) - 1][1], $_block_content, $this); echo $_block_content; array_pop($this->_tag_stack); $_block_content=''; ?> <script>
$('finder-fshow-ok-<?php echo $this->_vars['obj_id']; ?>').addEvent('click',function(e){
    var data=[];
 
    
    $ES('.row','finder-fshow-<?php echo $this->_vars['obj_id']; ?>').each(function(tr){

        if(tr.style.display=='none')return;
            
            
            var el,value,allege,merge={'merge':[]};
            

            allege=tr.getElement('div[tp=allege] .x-input-select')||tr.getElement('div[tp=allege]');

             
            if(allege.match('select')){
                 merge.merge.push({name:allege.name,value:allege.value});
                 allege=allege.options[allege.selectedIndex].text;
            }else{
                 allege=allege.get('text');
            }
         
                       
            var label = tr.getElement('div[tp=label]').get('text');
                       
                label +=allege;
            
            var inputEl=$pick(tr.getElement('div[tp=input] input[type=text]'),
                              tr.getElement('div[tp=input] select'),
                              tr.getElement('div[tp=input] textarea'),
                              tr.getElement('div[tp=input] input[checked]'),
                              tr.getElement('div[tp=input] input[type=hidden]')
                              );
            
            
            if(inputEl.match('input')){            
                
                if(inputEl.hasClass('cal')){
                   var td=inputEl.getParent('div[tp=input]');
                   merge.merge.push(td.toQueryString());
                   value = [];
                   td.getElements('.cal').each(function(i){if(i.value.trim()!='')value.push(i.value.trim());});
                   label +=':<b>'+value.join('...')+'<b/>';
                   if(!value.length)value=null;
                   
                }else if(inputEl.type=='radio'){
                    value = inputEl.getValue();    
                    label += ":<b>"+inputEl.getNext('label').get('text')+"</b>";
                }else if(inputEl.type=='hidden'){
                    value = inputEl.getValue();
                    label += ":<b>"+$pick(inputEl.getNext('.label'),inputEl.getPrevious('.label')).get('text')+"</b>";
                }else{
                    
                    value = inputEl.getValue();    
                    label += ":<b>"+value+"</b>";
                  
                }
                
                
                    
                
            }else if(inputEl.match('select')){
                
                if(inputEl.getParent().get('package')=='mainland'){
                   
                    var td=inputEl.getParent('div[tp=input]');
                   
                     merge.merge.push(td.toQueryString());
                    
                }
                
                    value = [];
                    var text=[];
                    inputEl.getSelected().each(function(o){
                        value.push(o.value);
                        text.push(o.text);
                    });
                    
                    if(value.length>1){
                         value=value.join(',');
                         text=text.join(',');
                    }else{
                       value=value.toString();
                       text=text.toString();
                    }
                    
                    label += "<b>"+text+"</b>";
                    
         
            
            
            }else if(inputEl.match('textarea')){
                value = inputEl.innerHTML;
                label += "<b>"+value.sustr(3)+"</b>";
            }
    
            
            if(value&&value!='_NULL_'){
                data.push($extend({'label':label,'name':tr.get('name'),'value':value},merge));    
            }

    });
    

    if(window.finderGroup['<?php echo $_GET['id']; ?>']){
        window.finderGroup['<?php echo $_GET['id']; ?>'].filter.reset().attach(data);
    }
    window.finderDialog.close();
});
</script>