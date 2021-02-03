// console.log('funcionaaaaaaaaaaa');

// ⚡⚡ ARRAYS => ARREGLOS
// CONJUNTO ELEMENTOS => LISTA

var numeros = [23, 4234, 324.12, 435, 1];
console.log(numeros);
console.log('*********************************');

console.log(numeros[0]); // 23
console.log(numeros[4]); // 1
console.log(numeros[numeros.length - 1]); // 1
console.log(numeros.length);

console.log('*********************************');
var mixto = [123, 87, "Juancito", "Ken", "Mario", 666];
console.log(mixto);
console.log('*********************************');

var mixto2 = [24, "Luigui", ['pera', 'manzana'], {"num": 1}, true, function(){console.log("hola")}];
console.log(mixto2);

console.log('*********************************');

// ⚡⚡ LOOP FOR
// for(var inicio - canti veces a itinerar - var asc o desc)

for(var i = 0; i < mixto.length; i++){
    console.log(mixto[i]);
}

mixto[1] = 877777;
console.log(mixto);

var resultado = api(nombres);

console.log('*********************************');
var nombres = ['Joshi', 'Luigui', 'Kuppa', 'Mario', 'Toad'];

var html = ``;

for(var i = 0; i < nombres.length; i++){
    // console.log(nombres[i]);
    // console.log(`<div>${nombres[i]}</div>`);
    html += `<div>${nombres[i]}</div>`;
}

var resultado;
console.log(html);

// num = 1;
// num = num + 1
// num += 1
// html = html + `<div>${nombres[i]}</div>`;

var bloque1 = document.querySelector('.bloque1');
console.log(bloque1);
bloque1.innerHTML = html;

// var portafolio = document.querySelector('#portafolio');