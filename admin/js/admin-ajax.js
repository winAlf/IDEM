$(document).ready(function(){


/******************************
******CREAR REGISTRO***********
******************************/
  $('#crearRegistro').on('submit', function(e){
        e.preventDefault();
        console.log("click¡¡");

        var datos = $(this).serializeArray();
        console.log(datos);
        $method = $(this).attr('method')
        $action = $(this).attr('action')
        console.log($method);
        console.log($action);

        $.ajax({//creamos el llamada ajax
          type: $(this).attr('method'),//el typo de llamado (POST o GET) lo tomamos del atributo method del objeto seleccionado
          data: datos,//seleccionamos los datos a enviar, del arreglo antes creado
          url: $(this).attr('action'),//el archivo donde lo mandaremos lo tomamos del atributo action del objeto seleccionado
          dataType: 'json',//tipo de datos que se envian
          success: function(data) {//mensaje de datos enviados
              var resultado = data;
              if (resultado.respuesta == 'exito') {
                Swal.fire(
                  'Correcto',
                  'El administrador se creo correctamente¡',
                  'success'
                )
                setTimeout(function(){
                  window.location.href = 'index.php';
                }, 1500);
              } else {
                Swal.fire({
                  type: 'error',
                  title: 'El usuario ya existe',
                  text: 'Vuelva a intentarlo con otro usuario',
                  footer: '<!--<a href>Why do I have this issue?</a>-->'
                  })
              }
          }
        })//cerramos el llamado AJAX

  });


  /******************************
  *******SUBIR ARCHIVO***********
  ******************************/
    $('#subirArchivo').on('submit', function(e){
          e.preventDefault();
          console.log("click¡¡");

          var datos = new FormData(this);
          console.log(datos);

          $.ajax({//creamos el llamada ajax
            type: $(this).attr('method'),//el typo de llamado (POST o GET) lo tomamos del atributo method del objeto seleccionado
            data: datos,//seleccionamos los datos a enviar, del arreglo antes creado
            url: $(this).attr('action'),//el archivo donde lo mandaremos lo tomamos del atributo action del objeto seleccionado
            dataType: 'json',//tipo de datos que se envian
            contentType : false,
            processData : false,
            async : true,
            cache: false,
            success: function(data) {//mensaje de datos enviados
                var resultado = data;
                if (resultado.respuesta == 'exito') {
                  Swal.fire(
                    'Correcto',
                    'El registro se creo correctamente¡',
                    'success'
                  )
                  setTimeout(function(){
                    window.location.href = 'index.php';
                  }, 1500);
                  //console.log(data);
                } else {
                  Swal.fire({
                    type: 'error',
                    title: 'No hay cambios en el registro',
                    text: 'Vuelva a intentarlo con otros datos',
                    footer: '<!--<a href>Why do I have this issue?</a>-->'
                    })
                    console.log(data);
                }
            }
          })//cerramos el llamado AJAX

    });

    /* *****************************
    *******SUBIR FOTO***********
    ******************************
      $('#subirFoto').on('submit', function(e){
            e.preventDefault();
            console.log("click¡¡");

            var datos = new FormData(this);
            console.log(datos);

            $.ajax({//creamos el llamada ajax
              type: $(this).attr('method'),//el typo de llamado (POST o GET) lo tomamos del atributo method del objeto seleccionado
              data: datos,//seleccionamos los datos a enviar, del arreglo antes creado
              url: $(this).attr('action'),//el archivo donde lo mandaremos lo tomamos del atributo action del objeto seleccionado
              dataType: 'json',//tipo de datos que se envian
              contentType : false,
              processData : false,
              async : true,
              cache: false,
              success: function(data) {//mensaje de datos enviados
                  var resultado = data;
                  if (resultado.respuesta == 'exito') {
                    Swal.fire(
                      'Correcto',
                      'El registro se creo correctamente¡',
                      'success'
                    )
                    setTimeout(function(){
                      window.location.href = 'index.php';
                    }, 1500);
                    //console.log(data);
                  } else {
                    Swal.fire({
                      type: 'error',
                      title: 'No hay cambios en el registro',
                      text: 'Vuelva a intentarlo con otros datos',
                      footer: '<!--<a href>Why do I have this issue?</a>-->'
                      })
                      console.log(data);
                  }
              }
            })//cerramos el llamado AJAX

      });
*/

  /******************************
  ******EDITAR REGISTRO***********
  ******************************/
  $('#editarRegistro').on('submit', function(e){
        e.preventDefault();
        //console.log("click¡¡");

        var datos = $(this).serializeArray();
        console.log(datos);
        $method = $(this).attr('method')
        $action = $(this).attr('action')
        console.log($method);
        console.log($action);

        $.ajax({//creamos el llamada ajax
          type: $(this).attr('method'),//el typo de llamado (POST o GET) lo tomamos del atributo method del objeto seleccionado
          data: datos,//seleccionamos los datos a enviar, del arreglo antes creado
          url: $(this).attr('action'),//el archivo donde lo mandaremos lo tomamos del atributo action del objeto seleccionado
          dataType: 'json',//tipo de datos que se envian
          success: function(data) {//mensaje de datos enviados
              var resultado = data;
              if (resultado.respuesta == 'exito') {
                Swal.fire(
                  'Registro Actualizado',
                  '',
                  'success'
                )
                setTimeout(function(){
                  window.location.href = 'index.php';
                }, 1500);
              } else {
                Swal.fire({
                  type: 'error',
                  title: 'El registro no pudo actualizarse',
                  text: 'Vuelva a intentarlo..',
                  footer: '<!--<a href>Why do I have this issue?</a>-->'
                  })
              }
          }
        })//cerramos el llamado AJAX
  });// funcion #editarRegistro

  /******************************
  *******CAMBIAR PASSWORD********
  ******************************/
  $('#cambiarPassword').on('submit', function(e){
        e.preventDefault();
        //console.log("click¡¡");

        var datos = $(this).serializeArray();
        console.log(datos);
        $method = $(this).attr('method')
        $action = $(this).attr('action')
        console.log($method);
        console.log($action);

        $.ajax({//creamos el llamada ajax
          type: $(this).attr('method'),//el typo de llamado (POST o GET) lo tomamos del atributo method del objeto seleccionado
          data: datos,//seleccionamos los datos a enviar, del arreglo antes creado
          url: $(this).attr('action'),//el archivo donde lo mandaremos lo tomamos del atributo action del objeto seleccionado
          dataType: 'json',//tipo de datos que se envian
          success: function(data) {//mensaje de datos enviados
              var resultado = data;
              if (resultado.respuesta == 'exito') {
                Swal.fire(
                  'Registro Actualizado',
                  '',
                  'success'
                )
                setTimeout(function(){
                  window.location.href = 'index.php';
                }, 1500);
              } else {
                Swal.fire({
                  type: 'error',
                  title: 'El registro no pudo actualizarse',
                  text: 'Vuelva a intentarlo..',
                  footer: '<!--<a href>Why do I have this issue?</a>-->'
                  })
              }
          }
        })//cerramos el llamado AJAX
  });// funcion #editarRegistro

  /******************************
  ******BORRAR REGISTRO***********
  ******************************/
  $('.borrar_registro').on('click', function(e){
        e.preventDefault();
        //console.log("click¡¡");

        var id = $(this).attr('data-id');
        //console.log(id);

        Swal.fire({
          title: 'Estas seguro?',
          text: "esta opción no se puede revertir",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si, Eliminar!',
          cancelButtonText: 'Cancelar'
        }).then((result) => {

                $.ajax({//creamos el llamada ajax
                  type: 'post',
                  data: {
                      'id' : id,
                      'registro' : 'eliminar'
                        },
                  url: 'ajax.php',
                  success: function(data) {
                      //console.log(data);
                      var resultado = JSON.parse(data);
                      //console.log(data-id);
                      setTimeout(function(){
                        window.location.href = 'index.php';
                      }, 1000);
                      }
                })//$ajax

          if (result.value) {
            Swal.fire(
              'Eliminado!',
              'El registro ha sido eliminado.',
              'success'
            )
          }
        })

  });// funcion #editarRegistro


  /*********************************
  ******CONTACTO VISITADO***********
  *********************************/
$('.contacto_visitado').on('click', function(e){
//console.log("click¡¡");
var id = $(this).attr('data-id');
var visita = $(this).attr('data-visita');
if (visita == 0) {
      //console.log("es igual a cero");
      $.ajax({//creamos el llamada ajax
        type: 'post',
        data: {
            'id' : id,
            'registro' : 'visitado'
              },
        url: 'ajax.php',
        success: function(data) {
            console.log(data);
            var resultado = JSON.parse(data);
            //console.log(data-id);
            jQuery('[data-id="'+resultado.id_eliminado+'"]').parents('tr').remove();
            }
      })//cerramos el llamado AJAX
}
});// funcion .contacto_visitado


  /******************************
  ******LOGUEO SISTEMA***********
  ******************************/
  $('#login-admin').on('submit', function(e){
        e.preventDefault();

        var datos = $(this).serializeArray();

        $.ajax({//creamos el llamada ajax
          type: $(this).attr('method'),//el typo de llamado (POST o GET) lo tomamos del atributo method del objeto seleccionado
          data: datos,//seleccionamos los datos a enviar, del arreglo antes creado
          url: $(this).attr('action'),//el archivo donde lo mandaremos lo tomamos del atributo action del objeto seleccionado
          dataType: 'json',//tipo de datos que se envian
          success: function(data) {//mensaje de datos enviados
              console.log(data);
              var resultado = data;
              if (resultado.respuesta == 'exitoso') {

                Swal.fire(
                  'Login Correcto',
                  'Bienvenid@ '+resultado.usuario+' !!',
                  'success'
                )
                setTimeout(function(){
                  window.location.href = 'control.php';
                }, 1500);
              } else {
                Swal.fire({
                  type: 'error',
                  title: 'Usuario o Password incorrectos',
                  text: 'Vuelva a intentarlo..',
                  footer: '<a href>Why do I have this issue?</a>'
                  })
              }
          }//success data
        })//cerramos el llamado AJAX

  });

  /******************************
  *Modificamos option de SELECT**
  ******************************/
  $("#id_catCategoria").change(function(){
    //console.log("Clic");
    var datos = {
          id_select: $("#id_catCategoria").val(),
          registro: "selectCat"
    };
    console.log(datos);

      $.ajax({
        url:"ajax.php",
        type: "POST",
        data:datos,
        success: function(opciones){
          $("#apartado").html(opciones);
        }
      });
  });

})
