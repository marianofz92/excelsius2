
function mostrarTabla() {
    var div = document.getElementById('turnos').style.display = 'block';
    var btn = document.getElementById('guardar').style.display = 'block';
}

function ocultarTabla() {
    var div = document.getElementById('turnos').style.display = 'none'; 
    var btn = document.getElementById('guardar').style.display = 'none';  
}

var celdaDesde;

function agregar() {
    
    var checkboxValues = "";
            $('input[name="orderbox[]"]:checked').each(function() {
                checkboxValues += $(this).val() + ", ";
            });
            //eliminamos la última coma.
            checkboxValues = checkboxValues.substring(0, checkboxValues.length-2);
            //si todos los checkbox están seleccionados devuelve 1,2,3,4,5
     
     if (checkboxValues == '') {
         
        alertify.alert("¡Atención!", "Debe seleccionar por lo menos un día.");
         
        var nfilas = document.getElementById("turnos-config").rows.length;
    
        if(nfilas==2){
           ocultarTabla();  
        }
         
         
    } else {
    
            if($('select[id="desde"]').val() < $('select[id="hasta"]').val()){

            var table = document.getElementById("turnos-config");

            var idDomicilio = $('select[id="direccion"]').val();
                
            var row = table.insertRow();
            row.innerHTML = '<input type="hidden" name="oculto[]" id="oculto" value="'+idDomicilio+'">';
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);

                 cell1.innerHTML = checkboxValues;
                 cell2.innerHTML = "De " + $('select[id="desde"]').val() + " a " + $('select[id="hasta"]').val() + " hs."; 
                 cell3.innerHTML = $('#direccion option:selected').text();//obtener el texto en lugar del valor de los options del select.
                 cell4.innerHTML = '<button class="btn btn-danger btn-sm" onclick="deleteRow(this)">X</button>';
                 //$('input:checkbox[name="orderbox[]"]').attr('checked', false);
                 $('input:checkbox[name="orderbox[]"]').removeAttr('checked');

            } else {
                alertify.alert("¡Atención!", "Debe seleccionar un rango de horario válido.");
                
                var nfilas = document.getElementById("turnos-config").rows.length;
                if(nfilas==2){
                   ocultarTabla();  
                }
                //return;
            }
    
        }   
    
    
}


function deleteRow(r) {
    var i = r.parentNode.parentNode.rowIndex;
    document.getElementById("turnos-config").deleteRow(i);
    
    var nfilas = document.getElementById("turnos-config").rows.length;
    
    if(nfilas==2){
       var div = document.getElementById('turnos').style.display = 'none'; 
       var btn = document.getElementById('guardar').style.display = 'none';    
    }
}

