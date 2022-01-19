$(document).ready(function() {
    'use strict';


/*******************************************
**************Variables********************
*******************************************/
/***************SLIDESHOW****************/
var menuArrow = $('#menuArrow');
var contPrin = $('#contPrin');
var contBarras = $('#contBarras');
var navLogo = $('.navLogo');
var diapos = $('.diapositiva');
var imgPos = 1;
/**********MENU RESPONSIVO*******************/
var navSociales = $('#navSociales');
var navMenu = $('#navMenu');
//boton IdemSecure
var navContenedor = $('#navContenedor');
var btnRespDnIdem = $('#btnRespDnIdem');
var btnRespClose = $('.btnRespClose');
var respNavIdem = $('#respNavIdem');
//Botón shopp
var btnRespDnShop = $('#btnRespDnShop');
var respNamShop = $('#respNamShop');
//HEADER
var heCabContenedor = $('#heCabContenedor');
//aside
var arConPrinCont = $('#arConPrinCont');
//navegador segundo nivel
var nivelDos = $('.nivelDos');


/*******************************************
***********CONFIGURACIONES******************
*******************************************/
/***************SLIDESHOW****************/
var diapoLength = $('.diapositiva').length;//Numero de Slides
/**********MENU RESPONSIVO*******************/
btnRespClose.hide();

var windowWidth = $(window).width();
var navHeigth = $('nav.navPrin').height();
//console.log(navHeigth);


/*******************************************
****************FUNCIONES*******************
*******************************************/
/*****Formato de menu desplegable idem*****/
if (windowWidth <= 780) {
    respNavIdem.addClass("hideObject");
    navContenedor.css("position", "relative");
    respNavIdem.css("position", "absolute");
    respNavIdem.css("top", navHeigth);
    respNavIdem.css("left", "0");
    respNavIdem.addClass("idemMenuResp");
    navMenu.addClass("columnCenterCenter");
} else {
    respNavIdem.addClass("showObject");
    respNavIdem.addClass("flexEndCenter");
    respNavIdem.addClass("idemMenu");
}

/**********HEADER RESPONSIVO*******************/
if (windowWidth >= 780) {
    heCabContenedor.addClass("spaceBetweenCenter");
    arConPrinCont.removeClass("columnReverse");
    arConPrinCont.addClass("flex");
}


///////////FUNCIONES BOTONES RESPONSIVOS/////////

btnRespDnIdem.click(function(e){
  e.preventDefault();
  //console.log("click¡¡");
  respNavIdem.slideToggle();
  btnRespDnShop.hide();
  btnRespDnIdem.hide();
  btnRespClose.show();
});

btnRespDnShop.click(function(e){
  e.preventDefault();
  //console.log("click¡¡");
  respNamShop.slideToggle();
  btnRespDnIdem.hide();
  btnRespDnShop.hide();
  btnRespClose.show();
});

btnRespClose.click(function(e){
  e.preventDefault();
  //console.log("click¡¡");
  respNamShop.slideUp()
  respNavIdem.slideUp();
  btnRespDnIdem.show();
  btnRespDnShop.show();
  btnRespClose.hide();
});



/****NAVEGACIÓN IZQUIERDA******************/
$('.contUlPrin li:has(ul)').click(function(e){
  e.preventDefault();
  console.log("click¡¡");

  if ($(this).hasClass('contActivado')){
    $(this).removeClass('contActivado');
    $(this).children('ul').slideUp();
  }else {
    $('.contUlPrin li ul').slideUp();
    $('.contUlPrin li').removeClass('contActivado');
    $(this).addClass('contActivado');
    $(this).children('ul').slideDown();
  }
});//FUNCION contUlPrin


/////////SLIDESHOW////////
for (var i = 0; i < diapoLength; i++) {
  $('.paginacionS').append('<span class="fa fa-circle"></span>');
}

$(diapos).hide(); //oculta todos los slides
$('.diapositiva:first').show(); //mostramos el primer slide
$('.paginacionS span').css({'color':'#fff'});
$('.paginacionS span:first').css({'color':'#edca26'}); //damos estilos al primer item de la paginacion

//BOTONES PARA LLAMAR FUNCIONES
$('.paginacionS span').click(paginacion);
$('#derS span').click(nextSlider);
$('#izqS span').click(prevSlider);

setInterval(function(){
  nextSlider ();
}, 8000);

//FUNCIONES====SLIDESHOW====================

function paginacion (){
  var paginationPos = $(this).index() + 1;
  $(diapos).hide();
  $('.diapositiva:nth-child('+ paginationPos +')').fadeIn();
  $('.paginacionS span').css({'color':'#fff'});
  $(this).css({'color':'#edca26'});
  imgPos = paginationPos;
}

function nextSlider (){
  if (imgPos >= diapoLength) {imgPos = 1;}
  else {imgPos++;}
  $(diapos).hide();
  $('.diapositiva:nth-child('+ imgPos +')').fadeIn();
  $('.paginacionS span').css({'color':'#fff'});
  $('.paginacionS span:nth-child('+ imgPos +')').css({'color':'#edca26'});
}

function prevSlider (){
  if (imgPos <= 1) {imgPos = diapoLength;}
  else {imgPos--;}
  $(diapos).hide();
  $('.diapositiva:nth-child('+ imgPos +')').fadeIn();
  $('.paginacionS span').css({'color':'#78afaa'});
  $('.paginacionS span:nth-child('+ imgPos +')').css({'color':'#ff6600'});
}

    /************************
    jQuery thumbnail scroller
    ************************/
    (function($){
            $(window).load(function(){
                $("#my-thumbs-list").mThumbnailScroller({
                  axis:"x" //change to "y" for vertical scroller
                });
                $("#my-thumbs-list2").mThumbnailScroller({
                  axis:"x" //change to "y" for vertical scroller
                });
            });
    })(jQuery);



    /******************************
    ******CREAR REGISTRO***********
    ******************************/
      $('.crearRegistro').on('submit', function(e){
            e.preventDefault();
            console.log("click¡¡");

            var datos = $(this).serializeArray();
            console.log(datos);
            var method = $(this).attr('method');
            var action = $(this).attr('action');
            console.log(method);
            console.log(action);
            console.log("es esta");

            $.ajax({//creamos el llamada ajax
              type: $(this).attr('method'),//el typo de llamado (POST o GET) lo tomamos del atributo method del objeto seleccionado
              data: datos,//seleccionamos los datos a enviar, del arreglo antes creado
              url: $(this).attr('action'),//el archivo donde lo mandaremos lo tomamos del atributo action del objeto seleccionado
              dataType: 'json',//tipo de datos que se envian
              success: function(data) {//mensaje de datos enviados
                  var resultado = data;
                  if (resultado.respuesta == 'exito') {
                    alert("El registro se envió correctamente");
                    /*
                    Swal.fire(
                      'Correcto',
                      'El registro se envió correctamente¡',
                      'success'
                    )
                    */
                    console.log("Llego mensaje exito");
                    setTimeout(function(){
                      window.location.href = 'home.php';
                    }, 1000);
                  } else {
                    console.log("Llego mensaje error");
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
      ********CREAR REGISTRO*********
      **********con CLASS************
      ******************************/
      /*
        $('.crearRegistro').on('submit', function(e){
              e.preventDefault();
              //console.log("click¡¡");

              var datos = $(this).serializeArray();
              //console.log(datos);
              var method = $(this).attr('method');
              var action = $(this).attr('action');
              //console.log(method);
              //console.log(action);

              $.ajax({//creamos el llamada ajax
                type: $(this).attr('method'),//el typo de llamado (POST o GET) lo tomamos del atributo method del objeto seleccionado
                data: datos,//seleccionamos los datos a enviar, del arreglo antes creado
                url: $(this).attr('action'),//el archivo donde lo mandaremos lo tomamos del atributo action del objeto seleccionado
                dataType: 'json',//tipo de datos que se envian
                success: function(data) {//mensaje de datos enviados
                    var resultado = data;
                    if (resultado.respuesta == 'exito') {
                      console.log("Llego mensaje exito");
                      Swal.fire(
                        'Correcto',
                        'El registro se envió correctamente¡',
                        'success'
                      )
                      setTimeout(function(){
                        window.location.href = 'home.php';
                      }, 1500);
                    } else {
                      console.log("Llego mensaje error");
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
*/

      /******************************
      Navegación Nivel Dos
      *******************************/
      nivelDos.click(function(e){
        e.preventDefault();
        //console.log("click¡¡");
        var id = $(this).attr('href');
        location.href=id;
      });

});//Function Principal
