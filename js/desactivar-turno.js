function desactivarTurnos(){
     alertify.confirm('¡Atención!', '¿Seguro que desea cancelar el turno?', function(){
                                      window.location = 'cancelar-turno.php?idturno='.$id_turno.'&origen='.$origen.';
                                      }, function(){}).set('labels', {ok:'Si', cancel:'No'});
     var checkboxValues = "";
 
            $('input[name="nombre2[]"]:checked').each(function() {
                  checkboxValues += $(this).val() + "/";
                
            });
     checkboxValues = checkboxValues.substring(0, checkboxValues.length-1);

 
    var fecha=$('input[name="oculto"]').val();
  
    
    
     $.ajax({
                                    type: 'get', 
                                    url: 'ejecucion-desactivardias.php?valor='+checkboxValues+'&fecha='+fecha, //mandar los id de los domicilios seleccionados en orden
                                    success: function(data){
                                        $("#response") .html(data)
                                    },
                                    error: function(data){
                                    $("#response") .html(data) 
                                    }
                        })
         
}
