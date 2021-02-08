var btn = document.querySelector('button');

var ul = document.querySelector('ul');

var tareaInput = document.querySelector('.tarea');

var alerta = document.querySelector('.alerta');

// ⚡⚡ 1 agregar tareas estaticas
btn.addEventListener('click', () => {
    // console.log(tareaInput.value);
    // 🔥🔥 VALIDANDO INPUT
    if(tareaInput.value == ''){
        alerta.innerHTML = 'Debes ingresar una tarea';
    }
    else{
        // var li = "<li>Nueva Tarea</li>";
        alerta.innerHTML = '';
        var li = `<li>${tareaInput.value}</li>`;
        ul.insertAdjacentHTML('beforeend', li);
        tareaInput.value = '';
    }
});

// nodelist => es un tipo de objeto
/*
var listaDeLIs = document.querySelectorAll('li');

listaDeLIs.forEach(function(li){
    // console.log(li);
    li.addEventListener('click', hacerclik);
});

function hacerclik(){
    console.log('hiciste click');
}
*/

// ⚡⚡ EVENTE DELEGATION
ul.addEventListener('click', escucharEvento);

function escucharEvento(evento){
    // console.log('hiciste click');
    // console.log(evento)
    if(evento.target.tagName == 'LI'){
        console.log('hiciste clik en un li');
        evento.target.remove();
    }
}