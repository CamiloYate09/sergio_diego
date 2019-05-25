/****************************************************************************/
/****************************************************************************/
/****************************************************************************/
/****************************************************************************/
/****************************************************************************/
/****************************************************************************/
var sePuedeEnviar = false;
/****************************************************************************/
/****************************************************************************/
/****************************************************************************/
/****************************************************************************/
/****************************************************************************/
/****************************************************************************/
function ValidateForm(nombreFormulario) 
{
  console.log ("Nombre del formulario: " + nombreFormulario);
  var forma = "#" + nombreFormulario + " input";
  console.log ("ID FORMULARIO: " + forma);
  var seEnvia = false;

  var formInvalid = false;
  $(forma).each(function() {
    if ($(this).val() === '') {
      formInvalid = true;
    }
  });

  if (formInvalid)
  {
  	console.log ("No se puede enviar el formulario");
    alert('Uno o dos campos del formulario están vacíos. Por favor diligencie todo el formulario');
    sePuedeEnviar = false;
  }
  else
  {
  	console.log ("Se puede enviar el formulario");

    seEnvia = confirmarAlmacenamiento('Empleado');
    console.log ("Se envia o no: " + seEnvia);

    if (seEnvia == true)
    {
    	sePuedeEnviar = true;
    }
    else
    {
    	sePuedeEnviar = false;
    }

  	return (sePuedeEnviar);
  }
}
/****************************************************************************/
/****************************************************************************/
/****************************************************************************/
function validarEnvio()
{
	console.log ("Se puede enviar formulario: " + sePuedeEnviar);
	return (sePuedeEnviar);
}
/****************************************************************************/
/****************************************************************************/
/****************************************************************************/
$(function() {
  //Validaciones de jQuery
  $("#botonAceptar").click(function() 
  {
  	var nombreForma = $(this).parents("form").attr("id");
  	console.log ("Validando formulario");
   	ValidateForm(nombreForma);
  });
  //*************************************************************************
  //*************************************************************************
  //Validación numérica en el formulario de empleados
  $('#staticParent').on('keydown', '#salario', function(e){-1!==$.inArray(e.keyCode,[46,8,9,27,13,110])||(/65|67|86|88/.test(e.keyCode)&&(e.ctrlKey===true||e.metaKey===true))&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault()});
  //*************************************************************************
  //*************************************************************************
  //Validación numérica en el formulario de productos
  $('#staticParent').on('keydown', '#precio', function(e){-1!==$.inArray(e.keyCode,[46,8,9,27,13,110])||(/65|67|86|88/.test(e.keyCode)&&(e.ctrlKey===true||e.metaKey===true))&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault()});
  //*************************************************************************
  //*************************************************************************
})
/****************************************************************************/
/****************************************************************************/
/****************************************************************************/
/****************************************************************************/
/****************************************************************************/
/****************************************************************************/
//Función para los diálogos confirmatorios de la aplicación
function confirmarAlmacenamiento(concepto)
{
  if (window.confirm ("¿Desea almacenar el registro del nuevo " + concepto))
  {
    return (true);
  }
  else
  {
  	alert ("Se canceló el almacenamiento del registro de la tabla " + concepto);
    return (false);
  }
}
/****************************************************************************/
/****************************************************************************/
/****************************************************************************/

/****************************************************************************/
/****************************************************************************/
/****************************************************************************/
