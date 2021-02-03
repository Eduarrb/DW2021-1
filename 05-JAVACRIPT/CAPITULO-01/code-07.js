// console.log('funcionaaaaaaaaaaaaaa');

// ⚡⚡ FUNCIONES

// saludar();

// function saludar(){
//     console.log('Hola queridos amigos!!');
//     return "hola";
// }

function obtenerEdad(fechaNacimiento){
    // return 2021 - fechaNacimiento;
    return [1, 2, 3];
}

// obtenerEdad(1980);
// console.log(obtenerEdad(1980));

// obtenerEdad(1980);

var edad = obtenerEdad(1980);

console.log(edad);

var estadoCivil = function(estado){
    if(estado == 'casado'){
        return true;
    }
    else{
        return false;
    }
}

console.log(estadoCivil('soltero'));

if(estadoCivil('soltero')){
    console.log("debe pagar manutencion");
}
else{
    console.log('consiguete una novia');
}


// // saludar();

// // ⚡⚡ FUNCTION EXPRESSIONS

// const hablar = function(){
//     console.log('Hola soy un robot!!');
// }

// hablar();

// // PARAMETROS & ARGUMENTOS

// // PARAMAETROS
// const bienvenida = function(nombre){
//     console.log(`Bienvenido(a) ${nombre}`);
// }
// // ARGUMENTO
// bienvenida('Eduardo');

// const calcularAreaCirculo = function(radio, pi){
//     var areaCirculo = pi * radio ** 2;
//     return areaCirculo;
// }

// // calcularAreaCirculo(14, 3.1416);

// var resultado = calcularAreaCirculo(14, 3.1416);

// // console.log(calcularAreaCirculo(14, 3.1416));
// console.log(resultado);