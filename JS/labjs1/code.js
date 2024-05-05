//задание 1
'use strict';

let age = parseInt(prompt("Введите ваш возраст:", ""));
let gender = prompt("Введите ваш пол (мужчина или женщина):", "").toLowerCase();

if (age >= 0 && age <= 17) {
    alert("Вам работать ещё рано — учитесь");
} else if ((age >= 18 && age <= 59 && gender === "мужчина") || (age >= 18 && age <= 54 && gender === "женщина")) {
    alert("Вам ещё работать и работать");
} else if ((age >= 60 && age <= 64 && gender === "мужчина") || (age >= 55 && age <= 59 && gender === "женщина")) {
    alert("Скоро пенсия!");
} else if ((age > 64 && gender === "мужчина") || (age > 59 && gender === "женщина")) {
    alert("Вам пора на пенсию");
} else {
    alert("Да кто ты такой?");
}


//задание 2
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

switch (num) {
    case 1:
        alert("На ветке сидит 1 ворона");
        break;
    case 2:
    case 3:
    case 4:
        alert("На ветке сидит " + num + " вороны");
        break;
    default:
        if (num >= 5) {
            alert("На ветке сидит " + num + " ворон");
        } else {
            alert("Введите корректное значение");
        }
        break;
}


//задание 3
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


//задание 4
'use strict';

let n = parseInt(prompt("Введите число n (n > 1):", ""));

if (isNaN(n) || n <= 1) {
    alert("Введите корректное значение n (n должно быть натуральным числом больше 1).");
} else {
    let primes = "Простые числа в интервале от 2 до " + n + ":\n";

    for (let i = 2; i <= n; i++) {
        let isPrime = true;
        
        for (let j = 2; j < i; j++) {
            if (i % j === 0) {
                isPrime = false;
                break;
            }
        }
        
        if (isPrime) {
            primes += i + "\n";
        }
    }
    
    alert(primes);
}


//задание 5
'use strict';

function drawTable(rows) {
    let animals = ['dog', 'dog', 'dog', 'cat', 'cat', 'dog']; 
    let index = 0; 
    let table = '';

    for (let i = 0; i < rows; i++) {
        let row = '';
        for (let j = 0; j < 6; j++) {
            row += animals[index % animals.length] + '\t'; 
            index++;
        }
        
        animals.unshift(animals.pop());
        table += row + '\n';
    }

    console.log(table); 
    alert(table);
}

let numRows = parseInt(prompt("Введите количество строк:", ""));

if (isNaN(numRows) || numRows <= 0) {
    console.log("Введите корректное значение количества строк.");
    alert("Введите корректное значение количества строк.");
} else {
    drawTable(numRows);
}
