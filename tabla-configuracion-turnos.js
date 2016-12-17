
function mostrarTabla() {
    var div = document.getElementById('turnos').style.display = 'block';
    var btn = document.getElementById('guardar').style.display = 'block';
}

var celdaDesde;

function agregar() {
    var table = document.getElementById("turnos-config");
 
    
    var row = table.insertRow();
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    
    var checkboxValues = "";
    $('input[name="orderbox[]"]:checked').each(function() {
        checkboxValues += $(this).val() + ", ";
    });
    //eliminamos la última coma.
    checkboxValues = checkboxValues.substring(0, checkboxValues.length-2);
    //si todos los checkbox están seleccionados devuelve 1,2,3,4,5
    
    var variableJS = checkboxValues;
    
    cell1.innerHTML = checkboxValues;
    cell2.innerHTML = "De " + $('select[id="desde"]').val() + " a " + $('select[id="hasta"]').val() + " hs.";
    cell3.innerHTML = $('select[id="direccion"]').val();
    cell4.innerHTML = '<button class="btn btn-danger btn-sm" onclick="deleteRow(this)">X</button>';
    $('input:checkbox[name="orderbox[]"]').attr('checked', false);
    
    //crear arreglos en php con las variables que se mandan desde la tabla que se muestra en pantalla.
    
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

