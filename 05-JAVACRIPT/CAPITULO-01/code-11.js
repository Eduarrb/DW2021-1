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

console.log('**********************************');

// ⚡⚡ Metodos
// funciones dentro de un objeto

var usuario = {
    // key value pair
    nombre: "Jaimito",
    correo: "jaimito@gmail.com",
    cell: "963852147",
    edad: 31,
    iniciarSesion: function (){
        console.log(`Bienvenido ${usuario.nombre}`);
    },
    mandarCorreo: function(){
        console.log(`Se envio a: ${usuario.correo}`);
    }
}

console.log(usuario);

console.log(usuario.nombre);
usuario.iniciarSesion();

usuario.mandarCorreo();

console.log('**********************************');

var usuario2 = {
    nombre: 'Joshi',
    correo: 'joshi@nintendo.com',
    skills: ['saltar', 'comer caparazones', 'sacar la lengua', 'correr'],
    saltar: function(){
        // console.log(`${usuario2.nombre} hizo un gran salto`);
        console.log(`${this.nombre} saltó 20mt`);    
    },
    printSkill: function(){
        for(var i = 0; i < this.skills.length; i++){
            console.log(`Skill = ${this.skills[i]}`);
        }
    }
}

usuario2.saltar();

usuario2.printSkill();

console.log('**********************************');

var html = '';

var carro = {
    color: ['blanco', 'turquesa', 'celeste', 'rosita pardo'],
    modelo: 'Toyota Celica',
    numPuertas: 5,
    // 1 paso 1 metodo para imprimir en consola
    printColors: function(){
        for(var i = 0; i < this.color.length; i++){
            console.log(this.color[i]);
        }
    },
    // 2 arreglar codigo para almacenarlo en una variable
    printColors2: function(){
        for(var i = 0; i < this.color.length; i++){
            html += `<a href="#">${this.color[i]}</a>`;
        }
    },
    // 3 imprimir en html
    printIntoHTML: function(){
        var carroBloqueHTML = document.querySelector('.carro');
        console.log(carroBloqueHTML);
        carroBloqueHTML.innerHTML = html;
    }
}
carro.printColors2();
carro.printIntoHTML();
// console.log(html);
// carro.printColors();