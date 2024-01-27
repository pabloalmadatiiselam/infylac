$(function(){
	$("#user_type_1").click(function(){
			show("pro_field");
			show("ventajas");
	});
	$("#user_type_0").click(function(){
			hidden("pro_field");
			hidden("ventajas");
	});
	$('#prov').change(function(){
		$('#local').load(baseurl+'/php/ajax/load_city.php', {pr: $(this).val()});
	});
	$("#rec_link").click(function(){
			$("#rec_pass").removeClass("hidden");
	});
	$('#info').keypress(function(){
		return textMaxLength(this);
	});
	$("#phone").keypress(function(){
			return onlyNumber(event);
	});
	$("#phone2").keypress(function(){
			return onlyNumber(event);
	});
	$("#cp").keypress(function(){
			return onlyNumber(event);
	});
	$("#regBut_submit").click(function(){
		validate();
	});
	// Preferences
	$("#saveData").click(function(){
		validate_edit();
	});
	$("#saveEmailOptions").click(function(){
		$("#saveEmailOpt").submit();
	});
	$("#saveBanner").click(function(){
		$("#upBanner").submit();
	});
	$("#chaPass").click(function(){
		valid_chPass();
	});
});
function valid_chPass(){
	if($("#pass").val()!=""){
		$("#pass").removeClass('error');
		if($("#pass1").val()!=""){
				$("#pass1").removeClass('error');
				if($("#pass1").val()==$("#pass2").val()){
					$("#pass2").removeClass('error');
						$("#changePass").submit();
				}else{ 	$("#pass2").addClass('error'); $("#pass2").focus();}
		}else{ 	$("#pass1").addClass('error'); $("#pass1").focus();}
	}else{ 	$("#pass").addClass('error'); $("#pass").focus();}
}

function validate(){
	error=false;
	if(!req($("#name").val())){
		error=true; $("#error_name").removeClass('hidden'); 
			scroll_To('name'); return false;
	}else $("#error_name").addClass('hidden');
	if(!valid_mail($("#mail").val())){
		error=true; $("#error_mail").removeClass('hidden'); 
			scroll_To('mail'); return false;
	}else $("#error_mail").addClass('hidden');
	if(!req($("#pass1").val())){
		error=true; $("#error_pass1").removeClass('hidden'); 
			scroll_To('pass1'); return false;
	}else $("#error_pass1").addClass('hidden');
	if($("#pass1").val()!=$("#pass2").val()){
		error=true; $("#error_pass2").removeClass('hidden'); 
			scroll_To('pass2'); return false;
	}else $("#error_pass2").addClass('hidden');
	if($("#phone").val().length<8){
		error=true; $("#error_phone").removeClass('hidden'); 
			scroll_To('phone'); return false;
	}else $("#error_phone").addClass('hidden');
	if(!error && $("#user_type_0").is(':checked')){
		$("#reg").submit();
	}else if($("#user_type_1").is(':checked')){
		if(!req($("#namecom").val())){
		error=true; $("#error_namecom").removeClass('hidden'); 
			scroll_To('namecom'); return false;
		}else $("#error_namecom").addClass('hidden');
		if($("#phone2").val().length!=0 && $("#phone2").val().length<8){
			error=true; $("#error_phone2").removeClass('hidden'); 
			scroll_To('phone2'); return false;
		}else $("#error_phone2").addClass('hidden');
		if(!valSelect($("#prov").val())){
		error=true; $("#error_prov").removeClass('hidden'); 
			scroll_To('prov'); return false;
		}else $("#error_prov").addClass('hidden');
		if(!valSelect($("#local").val())){
		error=true; $("#error_local").removeClass('hidden'); 
			scroll_To('local'); return false;
		}else $("#error_local").addClass('hidden');
		if(!req($("#adress").val())){
		error=true; $("#error_adress").removeClass('hidden'); 
			scroll_To('adress'); return false;
		}else $("#error_adress").addClass('hidden');
		if($("#cp").val().length!=5){
		error=true; $("#error_cp").removeClass('hidden'); 
			scroll_To('cp'); return false;
		}else $("#error_cp").addClass('hidden');
		if(!error) $("#reg").submit();
	}

}
function validate_edit(){
	error=false;
	if(!req($("#name").val())){
		error=true; $("#error_name").removeClass('hidden'); 
			scroll_To('name'); return false;
	}else $("#error_name").addClass('hidden');
	if($("#phone").val().length<8){
		error=true; $("#error_phone").removeClass('hidden'); 
			scroll_To('phone'); return false;
	}else $("#error_phone").addClass('hidden');
	if(!req($("#namecom").val())){
		error=true; $("#error_namecom").removeClass('hidden'); 
			scroll_To('namecom'); return false;
	}else $("#error_namecom").addClass('hidden');
	if($("#phone2").val().length!=0 && $("#phone2").val().length<8){
		error=true; $("#error_phone2").removeClass('hidden'); 
			scroll_To('phone2'); return false;
	}else $("#error_phone2").addClass('hidden');
	if(!valSelect($("#prov").val())){
		error=true; $("#error_prov").removeClass('hidden'); 
			scroll_To('prov'); return false;
	}else $("#error_prov").addClass('hidden');
	if(!valSelect($("#local").val())){
		error=true; $("#error_local").removeClass('hidden'); 
			scroll_To('local'); return false;
	}else $("#error_local").addClass('hidden');
	if(!req($("#adress").val())){
		error=true; $("#error_adress").removeClass('hidden'); 
			scroll_To('adress'); return false;
	}else $("#error_adress").addClass('hidden');
	if($("#cp").val().length!=5){
		error=true; $("#error_cp").removeClass('hidden'); 
			scroll_To('cp'); return false;
	}else $("#error_cp").addClass('hidden');
	if(!error) $("#proData").submit();
}