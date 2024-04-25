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
