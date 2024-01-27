$(function(){
	$("#make_search").change(function(){
		$("#model_search").load(baseurl+'php/ajax/load_model_seo.php', {mk: $("#make_search").val()});
		$("#model_search").removeAttr('disabled');
	});
	$("#search_button").click(function(){ getSearch();});
	$("#main_make").change(function(){
		$("#main_model").load(baseurl+'php/ajax/load_model_index.php', {mk: $("#main_make").val(),cat: $("#name_cat_seo_search").val()});
	});
	$("#main_search_button").click(function(){ getSearchMain();});
	$("#ord_lis").change(function(){ if($(this).val()!=0) location.href=$(this).val();});
	$("#user_type_1").click(function(){
			show("pro_field");
			show("ventajas");
	});
	$("#user_type_0").click(function(){
			hidden("pro_field");
			hidden("ventajas");
	});
	$(".ad-phone").click(function(){
		var id = $(this).attr('id').split('-');
		$(this).load(baseurl+'php/ajax/load_phone.php', {i: id[1]});
	});
	$(".img_less").click(function(){
		if(sel_img==0){
			 $("#main_image").attr('src',img[fin]); sel_img=fin;
		}else{ $("#main_image").attr('src',img[sel_img-1]); sel_img=sel_img-1;}
	});
	$(".img_more").click(function(){
		if(sel_img==fin){
			 $("#main_image").attr('src',img[init]); sel_img=init;
		}else{ $("#main_image").attr('src',img[sel_img+1]); sel_img=sel_img+1;}
	});
	$(".image_ad_min").click(function(){
		var src=$(this).attr('src').replace("min_","");
			 $("#main_image").attr('src',src);
	});
	$(".image_ad_min").click(function(){
		var src=$(this).attr('src').replace("min_","");
			 $("#main_image").attr('src',src);
	});
	$(".list_categories li").click(function(){
		$(".list_categories li").removeClass('sel');
		$(this).addClass('sel');
		if($(this).attr('id')=="clasicos-competicion"){
			$(".default_search").hide();
			$(".no_default").show();
		}else{
			$(".default_search").show();
			$(".no_default").hide();
		}
		$("#name_cat_seo_search").val($(this).attr('id'));
	});
	$(".fav").click(function(){
		res=$.ajax({
			type: "GET",
			url: baseurl+"php/ajax/new_fav.php",
			data: {i: $(this).attr('id').replace('fav-','')},
			dataType: "text",
			async: false,
    	}).responseText;
		updateFav($(this).attr('id').replace('fav-',''),res);
	});
	$("#contact_send").click(function(){
		error=false;
		if(!req($("#name_contact").val())){
		error=true; $("#error_name_contact").removeClass('hidden'); 
			return false;
		}else $("#error_name_contact").addClass('hidden');
		if(!valid_mail($("#mail_contact").val())){
		error=true; $("#error_mail_contact").removeClass('hidden'); 
			return false;
		}else $("#error_mail_contact").addClass('hidden');
		if($("#text_contact").val().length<30){
		error=true; $("#error_text_contact").removeClass('hidden'); 
			return false;
		}else $("#error_text_contact").addClass('hidden');
		if(!error){
			$("#data_form_contact").html($.ajax({
			type: "POST",
			url: baseurl+"php/ajax/send_contact.php",
			data: {i:$("#id_car").val(), name: $("#name_contact").val(), mail: $("#mail_contact").val(), phone: $("#phone_contact").val(), text: $("#text_contact").val()},
			dataType: "text",
			async: false,
			}).responseText);
		}
	});
	$(".delete_img").click(function(){
		if($.ajax({
			type: "POST",
			url: baseurl+"php/ajax/del_img.php",
			data: {i: $(this).attr('id')},
			dataType: "text",
			async: false,
		}).responseText==1)
		location.href="gestionar-fotos-"+$("#id_ad_ref").val();
	});
	$("#top_submit").click(function(){
		switch($('input[name=seleccion]:checked', '#seleccionar').val()){
			case "1":
				$("#amount_form").val($("#p1_price").val());
				$("#item_name").val("Destacado Simple: "+$("#title_ad").val());
				$("#notify_url").val(baseurl+"php/paypal/top_ad.php?t=1&i"+$("#id_ad").val());
				$("#paypal_top").submit();
			break;
			case "2":
				$("#amount_form").val($("#p2_price").val());
				$("#item_name").val("Destacado Medio: "+$("#title_ad").val());
				$("#notify_url").val(baseurl+"php/paypal/top_ad.php?t=2&i"+$("#id_ad").val());
				$("#paypal_top").submit();
			break;
			case "3":
				$("#amount_form").val($("#p3_price").val());
				$("#item_name").val("Destacado Completo: "+$("#title_ad").val());
				$("#notify_url").val(baseurl+"php/paypal/top_ad.php?t=3&i"+$("#id_ad").val());
				$("#paypal_top").submit();
			break;
		}
	});
	$("#butContact").click(function(){
		if(req($("#name").val()) && valid_mail($("#email").val()) && $("#tema").val()!=0 && $("#text").val().length>30){
			$("#error_cntact").addClass('hidden');
			$("#cnForm").submit();
		}else{
			$("#error_cntact").removeClass('hidden');
		}
	});
});
function updateFav(id,res){
	if(res==1) $("#fav-"+id).addClass("on");
	if(res==2) $("#fav-"+id).removeClass("on");
	$("#fav_link").html(
	$.ajax({
		type: "GET",
		url: baseurl+"php/ajax/up_fav.php",
		dataType: "text",
		async: false,
    }).responseText);
}
function getSearchMain(){
	query_filter=baseurl;
	if($("#main_make").val()!=0){
		query_filter+=$("#main_make").val();
		if($("#main_model").val()!=0) query_filter+="_"+$("#main_model").val();
	}else query_filter="coches";
	if($("#main_zone").val()!=0) query_filter+="-"+$("#name_cat_seo_search").val()+"-"+$("#main_zone").val()+"/";
	else query_filter+="-"+$("#name_cat_seo_search").val()+"/"
	// VARIABLES NO AMIGABLES
	if($("#name_cat_seo_search").val()=="clasicos-competicion"){
		var query_param="";
		if($("#keyword").val()!="") query_param+="?keyword="+$("#keyword").val();
		// VAMOS A URL
		query_filter+=query_param;
	}
	location.href=query_filter
}
function getSearch(){
	query_filter=baseurl;
	if($("#make_search").val()!=0){
		query_filter+=$("#make_search").val();
		if($("#model_search").val()!=0) query_filter+="_"+$("#model_search").val();
	}else query_filter="coches";
	if($("#region_search").val()!=0) query_filter+="-"+$("#seo_cat").val()+"-"+$("#region_search").val()+"/";
	else query_filter+="-"+$("#seo_cat").val()+"/"
	// VARIABLES NO AMIGABLES
	var query_param="?view_style="+$("#view_style").val()+"&max_page="+$("#max_page").val();
	if($("#keywords").val()!="") query_param+="&keyword="+$("#keywords").val();
	if($("#fuel_search").val()!=0) query_param+="&f="+$("#fuel_search").val();
	if($("#change_search").val()!=0) query_param+="&c="+$("#change_search").val();
	if($("#type_body").val()!=0) query_param+="&t="+$("#type_body").val();
	// RANGOS
	if($("#max_km").val()!=0) query_param+="&max_km="+$("#max_km").val();
	if($("#min_km").val()!=0) query_param+="&min_km="+$("#min_km").val();
	if($("#max_ano").val()!=0) query_param+="&max_fec="+$("#max_ano").val();
	if($("#min_ano").val()!=0) query_param+="&min_fec="+$("#min_ano").val();
	if($("#max_price").val()!=0) query_param+="&max_pr="+$("#max_price").val();
	if($("#min_price").val()!=0) query_param+="&min_pr="+$("#min_price").val();
	// VAMOS A URL
	query_filter+=query_param;
	location.href=query_filter
}
function onlyNumber(evt){
	if(window.event){
		keynum=evt.keyCode;
	}else{
		keynum=evt.which;
	}
if(keynum>47&&keynum<58){
	return true;
	}else{
	return false;
	}
}
function req(val){
	if(val!="") return true;
	else return false;
}
function valid_mail(val){
	var reg=/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	if(reg.test(val)) return true;
	else return false;
}
function textMaxLength(Object)
{return(Object.value.length<=1200);}
function valSelect(val){
	if(val!="0") return true;
	else return false;
}
function checkTerms(){
	if($("#terms").is(":checked"))
		return true;
	else
	 	return false;
}
function show(id){
	var obj = document.getElementsByClassName(id);
	for (var i=0;i<obj.length;i++) {
    	obj[i].style.display="block";
		obj[i].style.visibility="visible";
	}
}
function hidden(id){
	var obj = document.getElementsByClassName(id);
	for (var i=0;i<obj.length;i++) {
    	obj[i].style.display="none";
		obj[i].style.visibility="hidden";
	}
}