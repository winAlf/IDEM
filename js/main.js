$(document).ready(function() {
    'use strict';


    /*******************************************
    **************VARIABLES*********************
    *******************************************/

    /***************MENU PRINCIPAL****************/
    var navContenedor = $('.navContenedor');
    var navMenu = $('.navMenu');
    var menuContador = 0;
    var menuCont = 0;
    var navInfo = $('.navInfo');
    var targetI = $('.cuarentaCien:last-child');
    var infoAzul = $('.infoAzul');
    var infoRojo = $('.infoRojo');
    var infoAmarillo = $('.infoAmarillo');
    var infoVerde = $('.infoVerde');
    var infoBW =$('.infoBW');







    /*******************************************
    ***********CONFIGURACIONES******************
    *******************************************/

    /***************MENU PRINCIPAL****************/
    navContenedor.addClass("veinteCien");
    navMenu.css('cursor','pointer');
    navInfo.hide();
    navMenu.bind('click', ejecutarM);






    /*******************************************
    ****************FUNCIONES*******************
    *******************************************/

    /******BARRAS DE COLORES******/
    function ejecutarM( event ){
        navMenu.unbind('click', ejecutarM);
        if (menuContador == 0) {
            navContenedor.removeClass("veinteCien");
            navContenedor.removeClass("cuarentaCien");
            navContenedor.addClass("quinceCien");
            $(this).parent().addClass("cuarentaCien");
            targetI = $('.cuarentaCien:last-child');
            menuContador = $(this).attr("menuCont");
            setTimeout(function(){
              muestraInfo(menuContador);
            }, 500);
            //console.log(menuContador);
        } else {
            navMenu.unbind('click', ejecutarM);
            menuCont = $(this).attr("menuCont");
            if (menuContador == menuCont) {
                navInfo.hide();
                navContenedor.removeClass("quinceCien");
                navContenedor.removeClass("cuarentaCien");
                navContenedor.addClass("veinteCien");
                menuContador = 0;
                //console.log(menuContador);
                navMenu.bind('click', ejecutarM);
            } else {
                navContenedor.removeClass("cuarentaCien");
                navContenedor.addClass("quinceCien");
                $(this).parent().addClass("cuarentaCien");
                menuContador = $(this).attr("menuCont");
                navInfo.hide();
                setTimeout(function(){
                  muestraInfo(menuContador);
                }, 500);
                //console.log(menuContador);
            }
        }
    };

    function muestraInfo(menuContador){
        //menuContador = menuContador;
        switch (menuContador) {
          case '1':
            //alert ('es uno');
            infoAzul.fadeIn();
            break;
          case '2':
            //alert ('es uno');
            infoRojo.fadeIn();
            break;
          case '3':
            //alert ('es uno');
            infoAmarillo.fadeIn();
            break;
          case '4':
            //alert ('es uno');
            infoVerde.fadeIn();
            break;
          case '5':
            //alert ('es uno');
            infoBW.fadeIn();
            break;
          default:
            alert ('no es ninguno');
            break;
        }
        navMenu.bind('click', ejecutarM);
    }









});/*document).ready(function()*/
