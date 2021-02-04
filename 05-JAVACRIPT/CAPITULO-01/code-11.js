// console.log('holaaaa');

// ⚡⚡ OBJETOS

// STRING
// ARRAYS

// ⚡⚡ OBJETOS LITERALES

var celular = {
    // porpiedades, caracteristicas y metodos
    // key - value pair
    modelo: "Iphone XR",
    fechaLanz: "2018-12-25",
    color: ["Negro Mate", "Sapcial Gray", "rojo"],
    size: 6.5,
    updates: true
};

console.log(celular);

console.log(celular.size);
console.log(celular.modelo);

celular.ram = "4GB";
celular.modelo = "Iphone 12 MAX";

console.log(celular);

celular.color = ["Negro Mate", "Sapcial Gray", "rojo", "blue"];

celular.color.push('verdecito');

celular.modelo = ["Iphone 12", "Iphone XR"];

console.log('****************************');

/// 🔥🔥 TIPO DE DATOS PRIMITIVOS (CADA UNO SE ALMACENA EN SU PROPIA PORCION DE MEMORIA)

var num1 = 10;

console.log(num1);

var num2 = num1;

console.log(num2);

num1 = 20;

console.log(num2);

num1 = 654654564;

console.log(num2);
console.log(num1);

console.log('****************************');

// 🔥🔥 TIPO DE DATOS REFERENCIA (HACEN REFERENCIA A LA MISMA PORCION DE MEMORIA)

var array1 = [1, 2];
var array2 = array1;

console.log(array1);
console.log(array2);

array1[2] = 3;
console.log(array1);
console.log(array2);

