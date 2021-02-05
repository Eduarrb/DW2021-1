var btn = document.querySelector('button');

var ul = document.querySelector('ul');

// ⚡⚡ 1 agregar tareas estaticas
btn.addEventListener('click', () => {
    var li = "<li>Nueva Tarea</li>";
    ul.insertAdjacentHTML('beforeend', li);
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