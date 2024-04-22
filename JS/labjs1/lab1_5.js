'use strict';

function drawTable(rows) {
    let animals = ['dog', 'dog', 'dog', 'cat', 'cat', 'dog']; 
    let index = 0; 

    for (let i = 0; i < rows; i++) {
        let row = '';
        for (let j = 0; j < 6; j++) {
            row += animals[index % animals.length] + '\t'; 
            index++;
        }
        console.log(row); 
    }
}

let numRows = parseInt(prompt("Введите количество строк:", ""));

if (isNaN(numRows) || numRows <= 0) {
    console.log("Введите корректное значение количества строк.");
} else {
    drawTable(numRows);
}
