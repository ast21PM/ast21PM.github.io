'use strict';

let age = parseInt(prompt("Введите ваш возраст:", ""));
let gender = prompt("Введите ваш пол (мужчина или женщина):", "").toLowerCase();

if (age >= 0 && age <= 17) {
    console.log("Вам работать ещё рано — учитесь");
} else if ((age >= 18 && age <= 59 && gender === "мужчина") || (age >= 18 && age <= 54 && gender === "женщина")) {
    console.log("Вам ещё работать и работать");
} else if ((age >= 60 && age <= 64 && gender === "мужчина") || (age >= 55 && age <= 59 && gender === "женщина")) {
    console.log("Скоро пенсия!");
} else if ((age > 64 && gender === "мужчина") || (age > 59 && gender === "женщина")) {
    console.log("Вам пора на пенсию");
} else {
    console.log("Да кто ты такой?");
}
