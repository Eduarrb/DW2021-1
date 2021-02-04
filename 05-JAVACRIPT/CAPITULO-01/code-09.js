// console.log('funcionaaaaaaaa');

// ⚡⚡ PARAMETROS Y ARGUMENTOS

function saludar(nombre){
    // console.log("hola buenas tardes " + nombre);
    console.log(`buenas tardes ${nombre}`);
}

saludar('Lalito');

function sumar(num1, num2){
    var resultado = num1 + num2;
    console.log(resultado);
}

sumar(2, 5); // 7

console.log('**************************');

// ⚡⚡ FUNCTION EXPRESSION

function multi(num1, num2){
    var resultado = num1 * num2;
    return resultado;
}

multi(2, 2); // 4

var res2 = multi(2, 2);
console.log(res2);

console.log(multi(2,2));

var resta = function(num1, num2){
    var res = num1 - num2;
    return res;
}

console.log(resta(8, 2));

var saludar = function(nombre){
    var saludo = `hola como estas ${nombre}`;
    return saludo;
}

console.log(saludar('pepito'));
