function validar(){
    
    
    var telefono;
    var dni;
    
    telefono=document.getElementById("telefono").value;
    dni=document.getElementById("dni").value;
    
    if(isNaN(telefono) || telefono.length>15){
        alert("Ingrese un teléfono válido.");
         return false;
    }
    else if(isNaN(dni) || dni.length!=8){
        alert("Ingrese un DNI válido.");
         return false;
    
    }
    
    
}