var mceInstance=new Class({Implements:[Events,Options],options:{acitve:false,maskOpacity:0.5,autoHeight:false,cleanup:true,includeBase:true},initialize:function(a,c){this.seri=a;var b="mce_body_"+a;this.el=$(b);this.setOptions(c);this.input=$E("textarea",this.el).setProperty("ishtml","true");this.frmContainer=$(b+"_frm_container");var d=this;var g=this.options.includeBase;var f=0;var e=this.frm=new Element("iframe",{src:"blank.html?editor",id:b+"_frm",name:b+"_frm",frameborder:0,border:0}).addEvent("load",function(){if(f){return}f=1;var j=d;var k=e.contentWindow;var h="<base href="+SHOPBASE+"/>";var i="<html><head>"+(g?h:"")+'<script>window.onerror=function(){return false;}<\/script><link rel="stylesheet" type="text/css" href="'+SHOPADMINDIR+'wysiwyg_editor.css"/></head><body spellcheck="false" id="'+a+'">'+(j.cleanup(j.input.getProperty("value"))||"&nbsp;")+"</body></html>";k.document.open();k.document.write(i);k.document.close();k.document.designMode="on";k=new Window(k);new Document(k.document).addEvent("mousedown",j.active.bind(j));j.win=k;j.doc=k.document;j.input.setAttribute("filled","true");this.removeEvent("load",arguments.callee)});e.inject(this.frmContainer);this.input.getValue=function(){if(!this.input.getAttribute("filled")){return"textarea-unfilled"}if("textarea"==this.editType){return this.input.value}var h=this.getValue();this.input.value=h;return h}.bind(this);if(this.options.autoHeight){this.autoHeight.call(this)}if($(b)){this.el=$(b).setStyle("visibility","visible")}},autoHeight:function(){try{this.frm.setStyle("height",this.doc.body.offsetHeight+50)}catch(a){}},setValue:function(){this.doc.body.innerHTML=this.input.value},getValue:function(){return this.cleanup(this.doc.body.innerHTML)},regexpReplace:function(e,a,c,d){if(e==null){return e}if(typeof(d)=="undefined"){d="g"}var b=new RegExp(a,d);return e.replace(b,c)},cleanup:function(c){var b="<br/>";var h=[[/(<(?:img|input)[^\/>]*)>/g,"$1 />"]];var a=[[/<li>\s*<div>(.+?)<\/div><\/li>/g,"<li>$1</li>"],[/<span style="font-weight: bold;">(.*)<\/span>/gi,"<strong>$1</strong>"],[/<span style="font-style: italic;">(.*)<\/span>/gi,"<em>$1</em>"],[/<b\b[^>]*>(.*?)<\/b[^>]*>/gi,"<strong>$1</strong>"],[/<i\b[^>]*>(.*?)<\/i[^>]*>/gi,"<em>$1</em>"],[/<u\b[^>]*>(.*?)<\/u[^>]*>/gi,'<span style="text-decoration: underline;">$1</span>'],[/<p>[\s\n]*(<(?:ul|ol)>.*?<\/(?:ul|ol)>)(.*?)<\/p>/ig,"$1<p>$2</p>"],[/<\/(ol|ul)>\s*(?!<(?:p|ol|ul|img).*?>)((?:<[^>]*>)?\w.*)$/g,"</$1><p>$2</p>"],[/<br[^>]*><\/p>/g,"</p>"],[/<p([^>]*)>(.*?)<\/p>(?!\n)/g,"<p$1>$2</p>\n"],[/<\/(ul|ol|p)>(?!\n)/g,"</$1>\n"],[/><li>/g,">\n\t<li>"],[/([^\n])<\/(ol|ul)>/g,"$1\n</$2>"],[/([^\n])<img/ig,"$1\n<img"],[/^\s*$/g,""]];var g=[[/\s*<br ?\/?>\s*<\/p>/gi,"</p>"]];var f=[[/<br class\="webkit-block-placeholder">/gi,"<br />"],[/<span class="Apple-style-span">(.*)<\/span>/gi,"$1"],[/ class="Apple-style-span"/gi,""],[/<span style="">/gi,""],[/^([\w\s]+.*?)<div>/i,"<p>$1</p><div>"],[/<div>(.+?)<\/div>/ig,"<p>$1</p>"]];var d=[[/<em>\s*<\/em>/gi,""],[/<strong>\s*<\/strong>/gi,""],[/<br\s*\/?>/gi,b],[/<br\/?>\s*<\/(h1|h2|h3|h4|h5|h6|li|p)/gi,"</$1"],[/<p>\s*<br\/?>\s*<\/p>/gi,"<p>\u00a0</p>"],[/<p>(&nbsp;|\s)*<\/p>/gi,"<p>\u00a0</p>"],[/<\/p>\s*<\/p>/g,"</p>"],[/<[^> ]*/g,function(i){return i.toLowerCase()}],[/<[^>]*>/g,function(i){i=i.replace(/ [^=]+=/g,function(j){return j.toLowerCase()});return i}],[/<[^>]*>/g,function(i){i=i.replace(/( [^=]+=)([^"][^ >]*)/g,'$1"$2"');return i}]];var e=[[/<p>\s*<br ?\/?>\s*<\/p>/gi,"<p>\u00a0</p>"],[/<br>/gi,"<br />"],[/><br ?\/?>/gi,">"],[/<br ?\/?>\s*<\/(h1|h2|h3|h4|h5|h6|li|p)/gi,"</$1"],[/<p>(?:\s*)<p>/g,"<p>"],];d.extend(h);d.extend(a);if(Browser.Engine.webkit){d.extend(f)}d.each(function(i){c=c.replace(i[0],i[1])});c=c.trim();return c},active:function(){if(!this.actived){this.actived=true;this.doc.addEvent("click",function(a){this.fireEvent("docClick",new Event(a))}.bind(this))}this.fireEvent("active",this)},sleep:function(){}});var mceHandler=new Class({Implements:[Events,Options],initialize:function(c,a,b){try{this.el=$(c);$ES("img",this.el).each(function(f){new DropMenu(f)});this.setOptions(b);if(a){if(a.length){a.each(this.addInstance.bind(this))}else{this.addInstance.call(this,a)}}}catch(d){alert(d.message)}if("style_init" in this){this.style_init()}},addInstance:function(a){a.addEvent("active",this.active.bind(this));a.addEvent("docClick",this.docClick.bind(this))},active:function(a){this.inc=a;if(this.inc){this.inc.sleep.call(this.inc)}},docClick:function(b){var a=this.currentEl=b.target||b.srcElement;this.fireEvent("click",b)},getRange:function(){if(!this.inc){return false}if(this.range){return this.range}return window.ie?this.inc.doc.selection.createRange():this.inc.win.getSelection()},getSelection:function(){return window.ie?this.inc.doc.selection:this.inc.win.getSelection()},getRangeText:function(){return window.ie?this.inc.doc.selection.createRange().text:this.inc.win.getSelection().toString()},exec:function(c,b){if(!this.busy){this.busy=true;if(!c||!this.inc){return}if(this.dlg){if(window.ie){if(this.range){this.range.select()}}this.dlg.hide();this.dlg=null}switch(c){case"formatblock":this.inc.doc.execCommand("FormatBlock",false,"<"+b+">");break;case"wrap":this.exec("insertHTML",b[0]+this.getRangetext()+b[1]);break;case"insertHTML":if(window.ie){this.getSelection().clear()}if(this.replaceEl&&this.replaceEl.tagName&&!this.replaceEl.tagName.match(/body/g)){try{var a=this.inc.doc.createElement("div");a.innerHTML=b;a=a.firstChild;this.replaceEl.parentNode.replaceChild(a,this.replaceEl)}catch(d){MessageBox.error(d)}finally{this.replaceEl=null}}else{if(window.ie){this.inc.win.focus();this.range=null;this.getRange().pasteHTML(b)}else{this.inc.doc.execCommand("inserthtml",false,b)}}break;default:try{this.inc.doc.execCommand(c,false,b)}catch(d){MessageBox.error(d)}}this.busy=false}},mklink:function(){if(!this.inc){return}this.replaceEl=null;var a=this.currentEl;var b;if("body"==a.tagName.toLowerCase()&&!this.getRangeText()){return}if(a&&a.tagName&&a.tagName.toLowerCase()=="img"){return MessageBox.error("对不起,目前不支持对已插入图片增加超连接.")}if(a&&a.tagName&&a.tagName.toLowerCase()=="a"){b={text:this.currentEl.innerHTML,href:this.currentEl.href,alt:this.currentEl.alt,title:this.currentEl.title,target:this.currentEl.target};this.replaceEl=a}else{b={text:this.getRangeText()}}this.dialog("link",{height:null,width:450,ajaxoptions:{method:"post",data:b}})},editHTML:function(){var d=this;if(!this.inc){return}var b=$("mce_handle_htmledit_"+this.inc.seri);var a=$("mce_handle_"+this.inc.seri);this.inc.input.getValue();b.show();a.hide();var c=this.inc.frm.getSize();this.inc.input.show();this.inc.frmContainer.hide();b.getElement(".returnwyswyg").addEvent("click",function(){a.show();b.hide();d.inc.doc.body.innerHTML=d.inc.input.value.clean().trim();d.inc.input.hide();d.inc.frmContainer.show();d.inc.editType="wysiwyg";this.removeEvent("click",arguments.callee)});this.inc.editType="textarea"},dialog:function(b,a){if(!this.inc){return}this.inc.win.focus();this.range=null;this.range=this.getRange();a=$cleanNull(a);this.dlg=new Dialog("index.php?ctl=editor&act="+b,$merge(a,{modal:true}));window.curEditor=this},queryValue:function(a,b){if(a=="align"){a="justifyRight"}try{if(b){return this.inc.doc.queryCommandState(a)}else{return this.inc.doc.queryCommandValue(a)}}catch(c){}},queryValues:function(){var a={};var c=["Bold","Italic","Underline","strikeThrough","subscript","superscript","insertOrderedList","insertUnorderedList"];for(var b=0;b<arguments.length;b++){a[arguments[b]]=this.queryValue(arguments[b],c.contains(arguments[b]))}return a}});
var editor_style_1=new Abstract({style_init:function(){this.mce_handle=this.el;this.addEvent("click",this.status.bind(this));this.addEvent("click",function(b){if(!this.$init){this.mce_handle.setOpacity(1);if(this.inc.doc.body.innerHTML.substr(0,6)=="&nbsp;"){this.inc.doc.body.innerHTML=this.inc.doc.body.innerHTML.slice(6)}var a=this;$ES("img",this.mce_handle).addEvent("click",function(){this.inc.win.focus()}.bind(this));$E(".ft_select",this.mce_handle).addEvent("change",function(d){var c=this.getValue();if(!c){return}if(window.ie&&a.range){a.range.select()}a.set("fontName",c)});$E(".fs_select",this.mce_handle).addEvent("change",function(d){var c=this.getValue();if(!c){return}if(window.ie&&a.range){a.range.select()}a.set("fontSize",c)});$$($E(".fontColorPicker",this.el),$E(".fontBGColorPicker",this.el),$E(".ft_select",this.mce_handle),$E(".fs_select",this.mce_handle)).addEvent("click",function(){this.range=null;if(window.ie&&this.getSelection().type.toLowerCase()!="none"){this.range=this.getRange()}if(!window.ie){this.range=this.getRange()}}.bind(this));new GoogColorPicker($E(".fontColorPicker",this.el),{onSelect:function(d,c,f){if(window.ie&&this.range){this.range.select()}this.set("forecolor",d)}.bind(this),onShow:function(c){if(window.ie&&this.range){this.range.select()}}.bind(this)});new GoogColorPicker($E(".fontBGColorPicker",this.el),{onSelect:function(d,c,f){if(window.ie){if(this.range){this.range.select()}return this.set("backColor",d)}this.set("hilitecolor",d)}.bind(this),onShow:function(c){if(window.ie&&this.range){this.range.select()}}.bind(this)})}this.$init=true}.bind(this));this.styler=$ES(".x-section",this.el);this.stylerEl=$ES(".x-style",this.el);this.align=$ES(".x-align",this.el);this.setting=$ES(".x-enable",this.el)},status:function(c){new Event(c);if(!this.target){this.target=c.target.getElementsByTagName("body")[0]||c.target}var b=this.target.style;if(b["background-color"]=="transparent"){b["background-color"]="#fff"}this.styler.setStyle("background-color",(b["background-color"]=="transparent")?"#fff":b["background-color"]);this.stylerEl.setStyle("color",b.color);var a=this.queryValues("Bold","Italic","Underline","strikeThrough","subscript","superscript","align","CreateLink","FontName","FontSize","ForeColor","FormatBlock","insertOrderedList","insertUnorderedList");if(a.align=="center"){this.align[0].parentNode.className="";this.align[1].parentNode.className="in";this.align[2].parentNode.className=""}else{if(a.align=="right"){this.align[0].parentNode.className="";this.align[1].parentNode.className="";this.align[2].parentNode.className="in"}else{if(a.align=="left"){this.align[0].parentNode.className="in";this.align[1].parentNode.className="";this.align[2].parentNode.className=""}else{this.align[0].parentNode.className="";this.align[1].parentNode.className="";this.align[2].parentNode.className=""}}}this.setting.each(function(d){d.parentNode.className=a[d.getAttribute("value")]?"in":""})},set:function(b,a){if(!this.inc||!this.inc.win){return}if(window.ie){this.inc.win.focus()}this.exec(b,a);try{this.status.call(this)}catch(c){}}});
var ShopExGoodsEditor=new Class({Implements:[Options],options:{periodical:false,delay:500,postvar:"finderItems",varname:"items",width:500,height:400},initialize:function(b,a){this.el=$(b);this.setOptions(a);this.cat_id=$("gEditor-GCat-input").getValue();this.type_id=$("gEditor-GType-input").getValue();this.goods_id=$("gEditor-GId-input").getValue();this.initEditorBody.call(this)},initEditorBody:function(){var d=this;var c=$("gEditor-GCat-input");var b=$("gEditor-GType-input");c.addEvent("change",function(h){var g=$(this.options[this.selectedIndex]);var f=g.get("type_id")||1;if(f!=b.getValue()){a("cat",(function(){if(b.getValue()==1){b.getElement("option[value="+f+"]").set("selected",true);MODALPANEL.show();d.updateEditorBody.call(d)}else{if(confirm("\t是否根据所选分类的默认类型重新设定商品类型？\n\n如果重设，可能丢失当前所输入的类型属性、关联品牌、参数表等类型相关数据。")||this.getValue()<0){b.getElement("option[value="+f+"]").set("selected",true);MODALPANEL.show();d.updateEditorBody.call(d)}}}).bind(this),(function(i){alert(i)}).bind(this))}d.cat_id=this.getValue()});b.addEvent("click",function(){this.store("tempvalue",this.getValue())});b.addEvent("change",function(g){var f=this.retrieve("tempvalue");a("type",(function(h){if(this.getValue()&&confirm("是否根据所选类型的默认类型重现设定商品类型？\n如果重设，可能丢失当前所输入的类型属性，关联品牌，参数表等类型相关数据")){MODALPANEL.show();d.updateEditorBody.call(d);d.type_id=this.getValue()}else{this.getElement("option[value="+f+"]").set("selected",true)}}).bind(this),(function(h){alert(h);this.getElement("option[value="+f+"]").set("selected",true)}).bind(this))});var a=function(e,g,f){new Request({data:$("x-g-basic").toQueryString(),onRequest:function(){$("loadMask").show()},onComplete:function(h){$("loadMask").hide();if(h=="1"){g()}else{f(h)}}}).post("index.php?ctl=goods/gtype&act=typeTransformCheck&p[0]="+e)};MODALPANEL.hide()},updateEditorBody:function(){cb=$defined(arguments[0])?arguments[0]:function(){void (0)};$ES("#gEditor textarea[ishtml=true]").getValue();W.page("index.php?ctl=goods/product&act=update",{update:"gEditor-Body",data:$("gEditor").toQueryString()+"&pic_bar="+encodeURIComponent($E("#action-pic-bar .pic-area").get("html")),method:"post",onComplete:function(){this.initEditorBody.call(this);var a=$E("#gEditor .gpic-box .current");if(a){a.onclick()}cb()}.bind(this)})},mprice:function(b){for(var c=b.parentNode;c.tagName!="TR";c=c.parentNode){}var a={};$ES("input",c).each(function(d){if(d.name=="price[]"){a.price=d.value}else{if(d.name=="goods[price]"){a.price=d.value}else{if(d.getAttribute("level")){a["level["+d.getAttribute("level")+"]"]=d.value}}}});window.fbox=new Dialog("index.php?ctl=goods/product&act=mprice",{ajaxoptions:{data:a,method:"post"},modal:true});window.fbox.onSelect=goodsEditor.setMprice.bind({base:goodsEditor,el:c})},setMprice:function(a){var b={};a.each(function(c){b[c.name]=c.value});$ES("input",this.el).each(function(c){var e=c.getAttribute("level");if(e&&b[e]!=undefined){c.value=b[e]}})},spec:{addCol:function(b,a){this.dialog=new Dialog("index.php?ctl=goods/spec&act=addCol&_form="+(b?b:"goods-spec")+"&type_id="+a,{ajaxoptions:{data:$("goods-spec").toQueryString()+($("nospec_body")?"&"+$("nospec_body").toQueryString():""),method:"post"},title:"规格"})},addRow:function(){this.dialog=new Dialog("index.php?ctl=goods/spec&act=addRow",{ajaxoptions:{data:$("goods-spec"),method:"post"}})}},adj:{addGrp:function(a){this.dialog=new Dialog("index.php?ctl=goods/adjunct&act=addGrp&_form="+(a?a:"goods-adj"))}},pic:{del:function(b,d){if(confirm("确认删除本图片吗?")){d=$(d);var a=d.getParent(".gpic-box");try{if(b){new Request({url:"index.php?ctl=goods/product&act=removePic",onSuccess:function(){a.remove();if($E("#all-pics .gpic-box .current")){return}if($$("#all-pics .gpic-box").length&&$$("#all-pics .gpic-box").length>0){$("x-main-pic").empty().set("html",'<div class="notice" style="margin:0 auto">请重新选择默认商品图片.</div>')}else{$("x-main-pic").empty().set("html",'<div class="notice" style="margin:0 auto">您还未上传商品图片.</div>')}}}).send({ident:b})}}catch(c){a.remove()}}},setDefault:function(c,b){if(isNaN(c)){return}if($("x-main-pic").retrieve("cururl")==b){return}$("x-main-pic").store("cururl","loading");var a=this.getDefault();if(a){a=$E("#all-pics img[sn=_img_"+a+"]");if(a){a.getParent("span").removeClass("current")}}if($E("#x-main-pic input[name=image_default]")){$E("#x-main-pic input[name=image_default]").set("value",c)}else{$("x-main-pic").empty();new Element("input",{type:"hidden",name:"image_default"}).set("value",c).inject("x-main-pic")}if(_temimg=$("x-main-pic").getElements("img")){if(_temimg.length){_temimg.remove()}}$("x-main-pic").addClass("x-main-pic-loading");new Asset.image(b,{onload:function(d){var e=$(d.zoomImg(290,220));e.inject($("x-main-pic"));e.setStyle("margin-top",Math.abs((220-e.height.toInt())/2));$("x-main-pic").removeClass("x-main-pic-loading");$("x-main-pic").store("cururl",b)},onerror:function(){$("x-main-pic").removeClass("x-main-pic-loading");$("x-main-pic").store("cururl","")}});$E("#all-pics img[sn=_img_"+c+"]").getParent("span").addClass("current")},getDefault:function(){var a=$E("#x-main-pic input[name=image_default]");if(a){return a.value}else{return false}},viewSource:function(a){return new Dialog(a,{title:"查看图片信息",singlon:false,width:650,height:300})}},rateGoods:{add:function(){window.fbox=new Dialog("index.php?ctl=goods/product&act=select",{modal:true,ajaxoptions:{data:{onfinish:"goodsEditor.rateGoods.insert(data)"},method:"post"}})},del:function(){},insert:function(a){$ES("div.rate-goods").each(function(b){a["has["+b.getAttribute("goods_id")+"]"]=1});new Ajax("index.php?ctl=goods/product&act=ratelist",{data:a,onComplete:function(b){$("x-rate-goods").innerHTML+=b}}).request()}}});