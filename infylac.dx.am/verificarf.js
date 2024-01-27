function verificar_blanco(){        
   	if(document.fbuscador.criterio.value.length == 0) {
	alert("Ingrese una descripción de lo que desea buscar");
        document.fbuscador.focus();
        return false;
       }       
       return true;
} 

function autorclave(){
	if(document.fautor.clave.value.length == 0){
		alert("Ingrese la clave para ver el curriculum");
		document.fautor.focus();
		return false;
	}
	if(document.fautor.clave.value != "jes22pab"){
		alert("Clave incorrecta");
		document.fautor.focus();
		return false;
	}
	return true;
}
