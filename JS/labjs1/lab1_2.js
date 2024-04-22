'use strict';

let num = parseInt(prompt("Введите целое число:", ""));
if (num === 1) {
    console.log("На ветке сидит 1 ворона");
} else if (num >= 2 && num <= 4) {
    console.log("На ветке сидит " + num + " вороны");
} else if (num >= 5) {
    console.log("На ветке сидит " + num + " ворон");
} else {
    console.log("Введите корректное значение");
}

switch (num) {
    case 1:
        console.log("На ветке сидит 1 ворона");
        break;
    case 2:
    case 3:
    case 4:
        console.log("На ветке сидит " + num + " вороны");
        break;
    default:
        if (num >= 5) {
            console.log("На ветке сидит " + num + " ворон");
        } else {
            console.log("Введите корректное значение");
        }
        break;
}
