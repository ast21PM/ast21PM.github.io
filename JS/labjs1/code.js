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
"use strict";
        let num = +prompt("Введите целое число:");
        let flag;
        if(num > 0 && Number.isInteger(num)){
        if (num % 10 == 1 && num % 100 != 11) {
            flag = 'а';

        }
        else if ((num % 10 >= 2 && num % 10 <= 4) && !(num % 100 > 10 &&  num % 100 < 20)) {
            flag = 'ы';
        }
        else {
            flag = '';
        }


        switch (flag) {
            case 'а':
                alert(`На ветке сидит ${num} ворон${flag}`);
                break;
            case 'ы':
                alert(`На ветке сидит ${num} ворон${flag}`);
                break;
            case '':
                alert(`На ветке сидит ${num} ворон${flag}`);
                break;
            default:
                alert("Введите целое число");
                break;
        }
        
    }
    else alert("Введите целое число");


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
