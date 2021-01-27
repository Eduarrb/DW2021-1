// console.log('funcionaaaaaaaaaaaaaaaa');

// console.log("12346846452");

var nav = document.querySelector('.nav');

window.addEventListener('scroll', movimientoScroll);

function movimientoScroll(){
    // console.log('hiciste scroll');
    console.log(window.pageYOffset);
    if(window.pageYOffset > 0){
        console.log('es mayor a cero');
    }
    else{
        console.log('es igual a cero');
    }
}