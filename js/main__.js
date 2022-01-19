$(document).ready(function() {
    'use strict';


    /*******************************************
    **************Variables********************
    *******************************************/

    /***************SLIDESHOW****************/
    var navMenu = $('.navMenu');
    var navContenedor = $('.navContenedor');
    /*variables para la animacion de los menus*/
        var menuCont = 0;
        var menuContador = 0;
        var menuContNow = 0;
        var color = "transparente";
    var navSubMenu = $('.navSubMenu');






    /*******************************************
    ***********CONFIGURACIONES******************
    *******************************************/
    navContenedor.addClass("veinteCien");
    navMenu.css('cursor','pointer');
    /*navAzul.addClass("opacityCero");*/


    /*******************************************
    ****************FUNCIONES*******************
    *******************************************/

    /******BARRAS DE COLORES******/
    navMenu.click(function(){

        if (menuContador == 0) {
            /*color = $(this).parent().attr("idColor");*/
            expandirM ();
            menuContador = $(this).attr("menuCont");
            $(this).parent().addClass("cuarentaCien");
            setInterval(function(){
              navSubMenu.fadeToggle();
            }, 500);
        } else {
              menuCont = $(this).attr("menuCont");
              if (menuContador == menuCont) {
                  contraerM();
                  menuContador = 0;

              } else {
                  navContenedor.removeClass("cuarentaCien");
                  navContenedor.addClass("quinceCien");
                  $(this).parent().addClass("cuarentaCien");
                  menuContador = $(this).attr("menuCont");
              }
        }
    });

    function expandirM (){
        navContenedor.removeClass("veinteCien");
        navContenedor.removeClass("cuarentaCien");
        navContenedor.addClass("quinceCien");
    }
    function contraerM (){
        navContenedor.removeClass("quinceCien");
        navContenedor.removeClass("cuarentaCien");
        navContenedor.addClass("veinteCien");
    }










});/*document).ready(function()*/
