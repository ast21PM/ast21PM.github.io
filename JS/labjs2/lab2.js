'use strict';

/**
 * Вычисляет степень числа.
 *
 * @param {number} x - Исходное число.
 * @param {number} n - Степень.
 * @return {number} Результат вычисления x, возведенный в степень n.
 */
function pow(x, n) {
    return x ** n;
}


/**
 * Вычисляет сумму чисел от 1 до n.
 *
 * @param {number} n - Число n
 * @return {number} Результ вычисления суммы чисел от 1 до n
 */
function sumTo(n) {
    return n * (n + 1) / 2;
}

/**
 * Определяет, является ли данный год високосным.
 *
 * @param {number} year - Год, который проверяем.
 * @return {boolean} Правда, если год викосный, иначе ложь.
 */
function isLeapYear(year) {
    return year % 4 === 0 && (year % 100 !== 0 || year % 400 === 0);
}


/**
 * Возвращает факториал числа.
 *
 * @param {number} n - Число.
 * @return {bigint} Факториал числа n.
 */
function factorial(n) {
    n = BigInt(n);
    if (n === 0n || n === 1n) { 
        return 1n;
    } else {
        return n * factorial(n - 1n);
    }
}


/**
 * Возвращает n-е число Фибоначчи.
 * @param {number} n - Индекс числа Фибоначчи (натуральное число).
 * @returns {BigInt} - n-е число Фибоначчи.
 */
function fib(n) {
    let a = BigInt(0);
    let b = BigInt(1);
    if (n === 0) return BigInt(0);
    for (let i = 2; i <= n; i++) {
        const temp = a;
        a = b;
        b += temp;
    }
    return b;
}



/**
 * Возвращает функцию для сравнения значений с заданным числом.
 * @param {number} x - Число для сравнения.
 * @returns {function(number): boolean|null} - Функция для сравнения значений.
 */
function compare(x) {
    return function(y) {
        if (y > x) {
            return true;
        } else if (y < x) {
            return false;
        } else {
            return null;
        }
    };
}


/**
 * Возвращает сумму всех переданных аргументов.
 * @param {...number} args - Аргументы для суммирования.
 * @returns {number} - Сумма всех аргументов.
 */
function sum(...args) {
    return args.reduce((total, num) => total + num, 0);
}