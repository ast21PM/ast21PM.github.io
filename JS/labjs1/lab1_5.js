'use strict';

function drawTable(rows) {
    let dogs = 3;
    let cats = 2;
    let table = '';

    for (let i = 0; i < rows; i++) {
        let row = '';
        for (let j = 0; j < 6; j++) {
            if (dogs) {
                row += 'dog\t';
                dogs--;
            } else {
                row += 'cat\t';
                cats--;
            }
        }

        dogs = 3;
        cats = 2;
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
