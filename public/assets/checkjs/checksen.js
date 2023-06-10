(function($){
$.fn.checks=function(ops){
	var defaults={
		alertOk:"√ OK",
		msg_info:"msg_info",
		msg_ok:"msg_ok",
		msg_err:"msg_err",
		hide:"",
		auto_trigger:false,
		waiting:"Verifying...",
		copy_model:false,
		alerts:false,
		sub_confim:false,
		one_rules:true,
		show_ok:true
	};
	var op=$.extend(defaults,ops);
	
	var regs={
	"required":{
			"regex":"none",
			"alertText":"Required. ",
			"alertTextCheckboxMultiple":" Please select a radio button.",
			"alertTextCheckboxe":" Please select a check box."},
		"length":{
			"regex":"none",
			"alertText":" Length between ",
			"alertText2":" and ",
			"alertText3": " ."},
		"maxCheckbox":{
			"regex":"none",
			"alertText":" 最多选择 ",
			"alertText2":" 项."},	
		"minCheckbox":{
			"regex":"none",
			"alertText":" 至少选择 ",
			"alertText2":" 项."},
		"confirm":{
			"regex":"none",
			"alertText":" Twice for inconsistency."},		
		"telephone":{
			//"regex":"/^(0[0-9]{2,3}\-)?([2-9][0-9]{6,7})+(\-[0-9]{1,4})?$/",
			"regex":"/^[0-9]+$/",
			"alertText":" Please enter a valid phone number."},
		"mobilephone":{
			"regex":"/(^0?[1][358][0-9]{9}$)/",
			"alertText":" 请输入有效的手机号码."},	
		"email":{
			"regex":"/[a-z0-9]([a-z0-9]*[-_\.]?[a-z0-9]+)*@([a-z0-9]*[-_]?[a-z0-9]+)+[\.][a-z]{2,3}([\.][a-z]{2})?$/i",
			"alertText":" E-mail address failed."},	
		"date":{
			 "regex":"/^(([0-9]{3}[1-9]|[0-9]{2}[1-9][0-9]{1}|[0-9]{1}[1-9][0-9]{2}|[1-9][0-9]{3})-(((0[13578]|1[02])-(0[1-9]|[12][0-9]|3[01]))|((0[469]|11)-(0[1-9]|[12][0-9]|30))|(02-(0[1-9]|[1][0-9]|2[0-8]))))|((([0-9]{2})(0[48]|[2468][048]|[13579][26])|((0[48]|[2468][048]|[3579][26])00))-02-29)$/",
			 "alertText":" Date format failed,For example:2008-08-08."},
		"ip":{
			 "regex":"/^(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/",
			 "alertText":" 请输入有效的IP."},
		"chinese":{
			"regex":"/^[\u4e00-\u9fa5]+$/",
			"alertText":" 请输入中文."},
		"url":{
			"regex":"/^[a-zA-z]:\\/\\/[^s]$/",
			"alertText":" 请输入有效的网址."},
		"zipcode":{
			"regex":"/^[1-9]\d{5}$/",
			"alertText":" 请输入有效的邮政编码."},
		"qq":{
			"regex":"/^[1-9]\d{4,9}$/",
			"alertText":" 请输入有效的QQ号码."},
		"onlyNumber":{
			"regex":"/^[0-9]+$/",
			"alertText":" Only number."},
		"number":{
			"regex":"/^[0-9]+$/",
			"alertText":" Only number."},
		"int":{
			"regex":"/^[1-9][0-9]*$/",
			"alertText":" Number greater than zero."},
		"money":{
			"regex":"/^[1-9][0-9]*(\.[0-9]{1,2})?$/",
			"alertText":" Please enter a valid monetary."},
		"uname":{
			"regex":"/^[a-zA-Z0-9_]+$/",
			"alertText":" Can only be numbers, letters and underscores."},
		"onlyLetter":{
			"regex":"/^[a-zA-Z]+$/",
			"alertText":" 请输入英文字母."},
		"noSpecialCaracters":{
			"regex":"/^[0-9a-zA-Z]+$/",
			"alertText":" 请输入英文字母和数字."},	
		"ajax":{
			"file":"validate.action",
			"alertTextOk":"√填写正确 可以使用.",
			"alertTextLoad":" 检查中, 请稍候...",
			"alertText":" 已被占用."}
	};
	$this=$(this);
	var thefm=$(this);
	$this.attr("form_check","1");
	init();
function init2(){
	alert("");
}
function init(){
		var inputs=thefm.find(":input");
		thefm.bind("submit",function(){
			if(!op.one_rules) bind_rules();
			inputs.trigger("blur");
			//var err_length=$("[err]",thefm).length;
			var err_length=0;
			/*遍历判断如果err值不为空就为1*/			
			 $("input[err]",thefm).each(
				  function(){
					   if ($(this).attr('err')!=''){
							err_length=1;
					   }
				  }
				 );
			
			/*遍历判断如果err值为就为0*/
			var loading_length=$("input[loading]",thefm).length;
			if( loading_length>0){
				alert('请选择验证结束！');
				return false;
			}
			if(err_length ==1){
				if(op.alerts){
					var errs="";
					var fs=$("[err]",thefm);
					fs.each(function(i,o){
  						errs+=$(o).parent().prev().text()+": "+$(o).attr("err")+"\r\n";
					});
					//alert(errs);
					$("html,body").animate({scrollTop:$(":first[err]",thefm).offset().top},500);
				}
				 return false;
			}
			if(op.sub_confim){
				if(!window.confirm("Sure？")){
					return false;
				}
			}
		});
		
		bind_rules();
		if(op.auto_trigger) inputs.trigger("blur");
	}
	
	function bind_rules(){
		var inputs=thefm.find(":input");
		for (i=0; i<inputs.length;i++){
			var rules=get_rules(inputs[i]);
			if(!rules) continue;
			caller=$(inputs[i]);
			var hobj;
			if(!op.copy_model){
				hobj=$("#_"+caller.attr("id"));
			}else{
				hobj=caller.parent().parent().parent().find("h2[id="+"_"+caller.attr("id")+"]");
			}
			if(!hobj[0]) hobj=$(inputs[i]).parent().next().find("h2");
			if(!hobj[0]) $("<h2>").appendTo($(inputs[i]).parent().next());
			if(hobj[0]){
				if(hobj.text())hobj.removeClass().addClass(op.msg_info);
			}
			caller.unbind("blur");
			caller.bind("blur",function(){
				$(this).val($.trim($(this).val()));
				//if($(this).attr("oval")==$(this).val() && $(this).attr("type")!="password") return;
				var hobj,self=$(this);
				if(!op.copy_model){
					hobj=$("#_"+self.attr("id"));
				}else{
					hobj=$(this).parent().parent().parent().find("h2[id="+"_"+self.attr("id")+"]");
				}
				if(!hobj[0]) hobj=$(this).parent().next().find("h2");
				if(!hobj[0]) $("<h2>").appendTo(self.parent().next());
				//if(!hobj[0]) return;
				if(hobj[0] && hobj.text())hobj.removeClass().addClass(op.msg_info);
				var rules=get_rules(self);
				if(!rules) return false;
				$(this).attr("err","");
				for (i=0; i<rules.length;i++){
					switch (rules[i]){
					case "required":
						_required(self,rules[i]);
					break;
					case "custom": 
						 _customRegex(self,rules,i);
					break;
					case "ajax": 
						_ajax(self,rules,i);
						continue;
					break;
					case "length": 
						 _length(self,rules,i);
					break;
					case "maxCheckbox": 
						_maxCheckbox(self,rules,i);
					break;
					case "minCheckbox": 
						_minCheckbox(caller,rules,i);
					break;
					case "confirm": 
						 _confirm(self,rules,i);
					break;
					default :;
					};
				};
				$(this).attr("oval",$(this).val());
				var errs=$(this).attr("err");
				if(errs!=""){
					hobj.html("×"+errs);
					hobj.removeClass().addClass(op.msg_err);
				}else{
				    if($(this).val()!=""){
						if(op.show_ok) hobj.html(op.alertOk); else hobj.html("");
						hobj.addClass(op.msg_ok);
					}
				}
			});
		}
	}
	function get_rules(caller){
		rulesParsing = $(caller).attr('class');
		rulesRegExp = /\[(.*)\]/;
		getRules = rulesRegExp.exec(rulesParsing);
		if(getRules==null) return null;
		str = getRules[1];
		pattern = /\W+/;
		return str.split(pattern);
	}
	
	function _ajax(caller,rules,position){
		var v=caller.val();
		if(!v) return;
		caller.attr("loading","1");
		var uri=caller.attr("ajax")+"/value/"+encodeURI(v);
		$.ajax({type:"get",url:uri,
		dataType:'json',
		async:false,
		success: function(r){
			caller.removeAttr("loading");
			var hobj=$("#_"+caller.attr("id"))
			if(r.s!=1){
				var msg=regs["ajax"].alertText;
				if(r.info)msg=r.info;
				hobj.html(msg);
				caller.attr("err",msg);
				hobj.removeClass().addClass(op.msg_err);
			}else{
				hobj.html(op.alertOk);
				hobj.removeClass().addClass(op.msg_OK);
			}
		}}); 
	}

	function set_err(caller,errr){
		caller.attr("err",caller.attr("err")+errr);
	}
	
	function _required(caller,rule){
		callerType = caller.attr("type");
		var err="";
		if (callerType == "text" || callerType == "password" || callerType == "textarea" || callerType == "hidden"){				
			if(!caller.val()){
				err += regs[rule].alertText;
			}
		}
		if (callerType == "radio" || callerType == "checkbox" ){
			callerName = $(caller).attr("name");
			if($("input[name='"+callerName+"']:checked").size() == 0){
				if($("input[name='"+callerName+"']").size() ==1) {
					err += regs[rule].alertText;
				}else{
					err += regs[rule].alertTextCheckboxMultiple;
				}	
			}
		}
		if (callerType == "select-one"){
			if(!caller.val()) {
				err += regs[rule].alertText;
			}
		}
		if (callerType == "select-multiple") {
			if(!caller.find("option:selected").val()) {
				err += regs[rule].alertText;
			}
		}
		set_err(caller,err);
	}
	
	function _customRegex(caller,rules,position){
		var err="";
		customRule = rules[position+1];
		pattern = eval(regs[customRule].regex);
		
		if(rules[position-1]!="required" && $.trim($(caller).attr('value'))=="") return;
		if(!pattern.test($(caller).attr('value'))){
			err += regs[customRule].alertText;
			//alert(err);
		}
		set_err(caller,err);
	}
	
	function _confirm(caller,rules,position){
		var err="";
		confirmField = rules[position+1];
		if($(caller).attr('value') != $("#"+confirmField).attr('value')){
			err += regs["confirm"].alertText;
		}
		set_err(caller,err);
	}
	
	function _length(caller,rules,position){
		var err="";
		startLength = eval(rules[position+1]);
		endLength = eval(rules[position+2]);
		feildLength = $(caller).attr('value').length;
		if(feildLength<startLength || feildLength>endLength){
			err =regs["length"].alertText+startLength+regs["length"].alertText2+endLength+regs["length"].alertText3;
		}
		set_err(caller,err);
	}
	
	function _maxCheckbox(caller,rules,position){  	  // VALIDATE CHECKBOX NUMBER
		var err="";
		nbCheck = eval(rules[position+1]);
		groupname = $(caller).attr("name");
		groupSize = $("input[name='"+groupname+"']:checked").size();
		if(groupSize > nbCheck){	
			err += regs["maxCheckbox"].alertText;
		}
		set_err(caller,err);
	}
	function _minCheckbox(caller,rules,position){  	  // VALIDATE CHECKBOX NUMBER
		var err="";
		nbCheck = eval(rules[position+1]);
		groupname = $(caller).attr("name");
		groupSize = $("input[name='"+groupname+"']:checked").size();
		if(groupSize < nbCheck){
			err += regs["minCheckbox"].alertText+" "+nbCheck+" "+regs["minCheckbox"].alertText2;
		}
		set_err(caller,err);
	}
}
})(jQuery)