// console.log('funciona');

// ⚡⚡ LOOPS
// FOR
// WHILE

var nombres = ["Ryu", "Ken", "Chun-li", "Bison", "Guile"];

console.log(nombres);

for (var i = 0; i < nombres.length; i++) {
    console.log(nombres[i]);
}

console.log("*************************************");

var i = 0;
while (i < nombres.length) {
    console.log(nombres[i]);
    i++;
}

var ciudades = ["Lima", "Huancayo", "Arequipa", "Cusco", "Puno", "Huanuco"];

// TODO
// 1. UTILIZAR CUALQUIER TIPO DE LOOP PARA IMPRIMIR EN LA CONSOLA.
// 2. TAMBIEN PARA IMPRIMIR DENTRO DEL HTML (INDEX.HTML)

var bloque1 = document.querySelector(".bloque1");

var html = "";

// for(var i = 0; i < ciudades.length; i++){
//     html += `<div>${ciudades[i]}</div>`;
// }

var j = 0;
while (j < ciudades.length) {
    html += `<div>${ciudades[j]}</div>`;
    j++;
}

bloque1.innerHTML = html;

// ⚡⚡ SWITCH

const nota = 12;

switch(nota){
    case 9:
        console.log("Que mal, desaprobaste");
        break;
    case 11:
        console.log('Aprobaste con las justas, esfuerzate más');
        break;
    case 18:
        console.log('Excelente, sigue así');
        break;
    default:
        console.log('Seguro la nota es siempre desaprobatoria');
        break;
}
