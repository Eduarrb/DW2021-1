// console.log('funcionaaaa el 2');

// ⚡⚡ NUMBERS

var radio = 10.5;
var pi = 3.1416;

console.log(radio, pi);

// ⚡⚡ OPERACIONES MATEMATICAS
var circunferencia = pi * radio ** 2;

console.log(circunferencia);

console.log(12 / 3);

// ⚡⚡ RESIDUO
var num1 = 13;
console.log(num1 % 2);
console.log(num1 % 3);

var num2 = 10;
var num3 = num2 + 1;
console.log(num3);

// num3 = num3 + 1;
num3 += 1000;
console.log(num3); //12

num3 -= 2;
console.log(num3); // 10

// num3 = num3 * 2;
num3 *= 2; // 20
console.log(num3);

// ********************************
num3++; // 21
num3--; // 20

console.log(num3);

var num4 = 10.873264873264;
var resultado = Math.floor(num4); // 10
var resultado2 = Math.ceil(num4); // 11

console.log(resultado2);

console.log(num4.toFixed(2)); // REDONDEA EN DECIMALES
console.log(Math.ceil(num4)); 
