function revisar(elemento) {
    if (elemento.value==""){
        elemento.className='error';
    } else {
        elemento.className='form-input';
    }
}

function revisarr(elemento) {
    if (elemento.value==""){
        elemento.className='errorr';
    } else {
        elemento.className='form-inputt';
    }
}

function revisaremail(elemento) {
    if (elemento.value!=""){
        var dato = elemento.value;
        var expresion = /^([a-zA-Z0-9_.-])+@(([a-zA-z0-9-])+.)+([a-zA-Z0-9-]{2,4})+$/;
        if (!expresion.test(dato)) {
            elemento.className='error';
        } else {
        elemento.className='form-input';
        }
	}
}


function validar(form) {
  if(form.username.value=="") { //Si este campo está vacío
    alert('No has escrit el nom de empresa'); // Mensaje a mostrar
    return false; //devolvemos un valor negativo
  }
  
  if(form.password.value=="") { //Si este campo está vacío
    alert('No has escrit la teva ciudat'); // Mensaje a mostrar
    return false; //devolvemos un valor negativo
  }
  
  if(form.con_password.value=="") { //Si este campo está vacío
    alert('No has escrit el teu e-Mail'); // Mensaje a mostrar
    return false; //devolvemos un valor negativo
  }
  
  if(form.nomicognoms.value=="") { //Si este campo está vacío
    alert('No has escrit cap missatge'); // Mensaje a mostrar
    return false; //devolvemos un valor negativo
  }
  
  if(form.telefon.value=="") { //Si este campo está vacío
    alert('No has introduït el telèfon'); // Mensaje a mostrar
    return false; //devolvemos un valor negativo
  }
  
  if(form.direccio.value=="") { //Si este campo está vacío
    alert('No has introduït la direcció'); // Mensaje a mostrar
    return false; //devolvemos un valor negativo
  }
  
   if(form.cif.value=="") { //Si este campo está vacío
    alert('No introduït el CIF'); // Mensaje a mostrar
    return false; //devolvemos un valor negativo
  }
  
  return true; // Si esta todo bien, devolvemos Ok, positivo
}
