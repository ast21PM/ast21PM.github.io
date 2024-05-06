'use strict';

let num = parseInt(prompt("Введите целое число:", ""));

if (num === 1) {
    alert("На ветке сидит 1 ворона");
} else if (num >= 2 && num <= 4) {
    alert("На ветке сидит " + num + " вороны");
} else if (num >= 5) {
    alert("На ветке сидит " + num + " ворон");
} else {
    alert("Введите корректное значение");
}
