// console.log('funcionaaaaaaaaaaaaaaaa');

// console.log("12346846452");

// DOM -> DOCUMENT OBJECT MODEL

var nav = document.querySelector('.nav');
var btnMenu = document.querySelector('.iconMenu');
var menu = document.querySelector('.nav__contenedor__menu');

btnMenu.addEventListener('click', mostrarMenu);

function mostrarMenu(){
    // console.log('hiciste click');
    // menu.classList.add('menuActive');
    // menu.classList.remove('menuActive');
    menu.classList.toggle('menuActive');
}

window.addEventListener('scroll', movimientoScroll);

function movimientoScroll(){
    // console.log('hiciste scroll');
    // console.log(window.pageYOffset);
    if(window.pageYOffset > 0){
        // console.log('es mayor a cero');
        nav.classList.add('active');
    }
    else{
        // console.log('es igual a cero');
        nav.classList.remove('active');
    }
}