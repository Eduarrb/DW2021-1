console.log('funciona');

// ⚡⚡ FUNCIONES PARTE 2

function sumar(){
    // codigo
    // console.log('acabas de sumar unos numeros');
    var resultado = 20 + 2;
    console.log(resultado);
}

sumar(); // 22

var resResta1 = 10; // var global

function resta(){
    var resResta = 20 - 2; // variable local funciona solo en el ambito de la funcion
    console.log(resResta);
}

resta();

console.log(resResta1);
// console.log(resResta);
console.log('******************************');

const resultadoMulti = 20;

function multi(){
    // resultadoMulti = 2 * 2;
    var resultado = resultadoMulti * 30;
    console.log(resultado);
}

console.log(resultadoMulti); // 20
multi();

console.log(resultadoMulti);  // 20

console.log('*******************************');

var sueldoBruto = 0;

var afp = 100;

function calcularSueldo(){
    var afp = 100;
    var sueldoFijo = 1000;
    sueldoBruto = sueldoFijo - afp;
    document.querySelector().innerHTML = 
}

calcularSueldo();

console.log(sueldoBruto); // 900



