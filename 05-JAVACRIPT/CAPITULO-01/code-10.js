// console.log('funciona');

// ⚡⚡ FUNCTION EXPRESSION

var saludar = function(nombre){
    return `hola ${nombre}`;
}

console.log(saludar('pepito'));

// ⚡⚡ ARROW FUNCTION

var suma = (num1, num2) => {
    return num1 + num2;
}

console.log(suma(1,2)); // 3

var res = suma(5,5);

document.querySelector('.resultadoSuma').innerHTML = res;

console.log('*******************');

var resta = (num1, num2) => num1 - num2;

console.log(resta(70,8)); // 62

var saludar = apodo => `hola ${apodo}`;

var saludar2 = (nombre, apellido) => {
    return `hola ${nombre}`;
}

console.log(saludar('Chun-li'));
console.log(saludar2('Chun-li'));

var calcular = num1 => {
    var res = '';
    function resta(num1){
        res = num1 - 10; // 2
    }
    resta(num1);
    return res + num1;
}

console.log(calcular(12)); // 14
