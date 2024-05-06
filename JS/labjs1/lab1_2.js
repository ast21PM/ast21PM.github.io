'use strict';

var num = prompt("Enter number of crows");
num = parseInt(num);

if (num >= 0) {
    if (num === 0 || num >= 5) {
        console.log(`${num} ворон`);
        alert(`${num} ворон`);
    } else if (num === 1) {
        console.log(`${num} ворона`);
        alert(`${num} ворона`);
    } else {
        console.log(`${num} вороны`);
        alert(`${num} вороны`);
    }
} else {
    console.log('Nah');
    alert('Nah');
}
