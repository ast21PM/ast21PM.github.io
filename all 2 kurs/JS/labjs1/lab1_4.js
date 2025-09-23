"use strict";

let n = +prompt("Введите количество чисел:");
const primeNumbers = [];

function primeNum(n) {
    if (n <= 1) return false;
    for (let i = 2; i <= Math.sqrt(n); i++) {
        if (n % i === 0) return false;  
    }
    return true;
}

for (let i = 2; i <= n; i++) {
    if (primeNum(i)) {
        primeNumbers.push(i);
    }  
}

if (primeNumbers.length == 0) {
    console.log(0);
    alert(0);
} else {
    let primesString = primeNumbers.join(" ");
    console.log(primesString);
    alert(primesString);
}
