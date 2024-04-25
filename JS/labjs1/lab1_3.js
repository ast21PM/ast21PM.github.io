'use strict';

let number;

do {
    number = prompt("Введите число больше 100:", "");
} while (number !== null && (isNaN(number) || parseInt(number) <= 100));

if (number !== null) {
    alert("Вы ввели число больше 100: " + number);
} else {
    alert("Вы отменили ввод или ввели некорректное значение.");
}
