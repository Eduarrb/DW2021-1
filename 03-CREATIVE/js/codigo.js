// console.log('funcionaaaaaaaaaaaaaaaa');

// console.log("12346846452");

// DOM -> DOCUMENT OBJECT MODEL

var nav = document.querySelector('.nav');

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