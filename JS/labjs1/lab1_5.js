'use strict';

let n = prompt("Введите число n:");

function generateTable(rows) {
    let table = '';
    for (let i = 0; i < rows; i++) {
        let row = '';
        for (let j = 0; j < 6; j++) {
            if ((i + j) % 5 < 3) {
                row += 'dog\t';
            } else {
                row += 'cat\t';
            }
        }
        table += row + '\n';
    }
    console.log(table);
    alert(table);
}

let numRows = parseInt(n);

if (isNaN(numRows) || numRows <= 0) {
    console.log("Введите корректное число n.");
    alert("Введите корректное число n.");
} else {
    generateTable(numRows);
}
