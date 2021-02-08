// MANIPULAR CIERTAS DEL DOM
var btn = document.querySelector('button');

var popup = document.querySelector('.popup-caja');

var btnClose = document.querySelector('.popup-close');
// btn.addEventListener('click', nombre)
// function nombre(){

// }

// btn.addEventListener('click', function(){
//     // la accion
// })
btn.addEventListener('click', () => {
    // la accion
    // console.log('hiciste click');
    // popup.classList.toggle
    popup.classList.add('mostrarCaja');
})

btnClose.addEventListener('click', function(){
    popup.classList.remove('mostrarCaja');
})

window.addEventListener('keyup', evento => {
    // console.log(evento);
    if(evento.keyCode == 27){
        // console.log('precionaste escape');
        popup.classList.remove('mostrarCaja');
    }
})