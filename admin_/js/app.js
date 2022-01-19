$(document).ready(function () {
  $('.sidebar-menu').tree();


  $('#registros').DataTable({
    'paging'      : true,
    'pageLength'  : 10,
    'lengthChange': false,
    'searching'   : true,
    'ordering'    : true,
    'info'        : true,
    'autoWidth'   : true,
    'language'    : {
      paginate    :{
        next: 'Siguiente',
        previous: 'Anterior',
        last: 'Último',
        first: 'Primero',
      },
      info: 'Mostrando _START_ a _END_ de _TOTAL_ resultados',
      emptyTable: 'No se encontraron registros',
      infoWmpty: '0 Registros',
      search: 'Buscar'
    }
  });

$('#add_usuario').attr('disabled', true);

$('#repetir_contraseña').on('input', function() {
    var password_inicial = $('#password').val();

    if ($(this).val() == password_inicial) {
      $('#resultado_password').text('El password coincide');
      $('#resultado_password').parents('.form-group').addClass('has-success').removeClass('has-error');
      $('input#password').parents('.form-group').addClass('has-success').removeClass('has-error');
      $('#add_usuario').attr('disabled', false);
    } else {
      $('#resultado_password').text('El password no coincide, favor de corregirlo');
      $('#resultado_password').parents('.form-group').addClass('has-error').removeClass('has-success');
      $('input#password').parents('.form-group').addClass('has-error').removeClass('has-success');
      $('#add_usuario').attr('disabled', true);
    }
});


})
