$(function(){
	comboSelect=['make_post','model_post','maAno','combus','carr','cambio','version'];
	$('#make_post').change(function(){
		$('#model_post').load(baseurl+'php/ajax/load_model.php', {mk: $(this).val()});
	});
	$('.ck').change(function(){
		checkForm($(this).attr('id'));
	});
	function checkForm(id){
		var n=comboSelect.indexOf(id);
		$("#"+comboSelect[n+1]).removeAttr('disabled');
		for(var i=n+2;i<comboSelect.length;i++)
			$("#"+comboSelect[i]).attr('disabled', true);
	}
	$('#model_post').change(function(){
		$('#maAno').removeAttr('disabled');
	});
	$('.number').keypress(function(){
			return onlyNumber(event);
	});
	$('#texto').keyup(function(){
		restante = (600 - $('#texto').val().length);
		$('#rest').html("Quedan "+restante+" carácteres");
	});
	$('#texto').keypress(function(){
		return textMaxLength(this);
	});
	$('#cv').keyup(function(){
		toKw();
	});
	$('#enviar').click(function(){
		postCar();
	});
});
function toKw(){
	a= parseInt(document.getElementById('cv').value*0.736);
	document.getElementById('kw').value=a;
}

function postCar(){
	category=$("#id_cat_car").val();
	if(category==3)
	sel=['maAno','combus','carr','cambio'];
	else
	sel=['make_post','model_post','maAno','combus','carr','cambio'];
	error=false;
	if(category==3){
		if(!req($("#title").val())){
			error=true; $("#error_title").removeClass('hidden'); 
			scroll_To('title'); return false;
		}else $("#error_title").addClass('hidden');
	}
	for(var i=0; i< sel.length; i++){
		if(!valSelect($("#"+sel[i]).val())){
			error=true; $("#error_"+sel[i]).removeClass('hidden'); 
			scroll_To(sel[i]);
			return false;
		}else $("#error_"+sel[i]).addClass('hidden');
	}
	if(!req($("#version").val()) && category!=3){
		error=true; $("#error_version").removeClass('hidden'); 
			scroll_To('version'); return false;
	}else $("#error_version").addClass('hidden');
	if(!valSelect($("#door").val())){
		error=true; $("#error_door").removeClass('hidden'); 
			scroll_To('door');	return false;
	}else $("#error_door").addClass('hidden');
	if(!valSelect($("#colCarr").val())){
		error=true; $("#error_colCarr").removeClass('hidden'); 
			scroll_To('colCarr');	return false;
	}else $("#error_colCarr").addClass('hidden');
	if(!req($("#km").val())){
		error=true; $("#error_km").removeClass('hidden'); 
			scroll_To('km'); return false;
	}else $("#error_km").addClass('hidden');
	if(!req($("#cv").val())){
		error=true; $("#error_cv").removeClass('hidden'); 
			scroll_To('cv'); return false;
	}else $("#error_cv").addClass('hidden');
	if($("#texto").val().length>600 || $("#texto").val().length<50){
		error=true; $("#error_texto").removeClass('hidden'); 
			scroll_To('texto'); return false;
	}else $("#error_texto").addClass('hidden');
	if(!req($("#prec").val())){
		error=true; $("#error_prec").removeClass('hidden'); 
			scroll_To('prec'); return false;
	}else $("#error_prec").addClass('hidden');
	if(!req($("#nombre").val())){
		error=true; $("#error_nombre").removeClass('hidden'); 
			scroll_To('nombre'); return false;
	}else $("#error_nombre").addClass('hidden');
	if($("#tlf").val().length<8){
		error=true; $("#error_tlf").removeClass('hidden'); 
			scroll_To('tlf'); return false;
	}else $("#error_tlf").addClass('hidden');
	if(!valSelect($("#prov").val())){
			error=true; $("#error_prov").removeClass('hidden'); 
			scroll_To('prov');
			return false;
	}else $("#error_prov").addClass('hidden');
	if(!checkTerms()){
		error=true; $("#error_terminos").removeClass('hidden'); scroll_To('terms'); return false;
	}else $("#error_terminos").addClass('hidden');
	if(!error) $("#new_car").submit();
}
function scroll_To(id){
	$("html, body").animate({ scrollTop: $("#"+id).offset().top-100 }, 500);
	$("#"+id).focus();
}
