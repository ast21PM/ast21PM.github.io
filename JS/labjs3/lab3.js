//Задание 1
/**
 * Возвращает дробную часть числа.
 * 
 * @param {number} num число, от которого нужно найти дробную часть.
 * @return {number} дрообную часть числа.
 */
export function getDecimal(num){
    if(num > 0) return +(num - Math.trunc(num)).toFixed(2);
    if(num <= 0) return num + Math.ceil(-num); 
}

//Задание 2
/**
 * Нормализует URL, добавляя префикс "https://" в случае его отсутствия
 * Или заменяет префикс "http://" на "https://"
 * 
 * @param {string} url URL, который нужно нормализовать, должен быть строкой
 * @return {string} нормализованный URL.
 */
export function normalizeUrl(url){
    return url.includes("https://") ? url : url.includes("http://") ? url.replace("http://", "https://") : `https://${url}`;
} 

//Задание 3
/**
 * Проверяет, содержит ли строка подстроку "viagra" или "XXX" (независимо от регистра).
 *
 * @param {string} str строка для проверки, должна быть строкового типа
 * @return {boolean} возвращает true, если строка содержит подстроку "viagra" или "XXX", иначе возвращает false.
 */
export function checkSpam(str){
    return str.toLowerCase().includes("viagra") || str.toUpperCase().includes("XXX");
}

//Задание 4
/**
 * Обрезает строку до указанной длины и добавляет многоточие в конце, если строка превышает максимальную длину.
 *
 * @param {string} str строка, длину которой проверяем
 * @param {number} maxlength максимально возможная длина строки
 * @return {string} Возвращает обрезанную строку с многоточием в конце, если исходная строка превышает максимальную длину, инача возвращает исходную строку.
 */
export function truncate(str, maxlength){
    if(str.length > maxlength){
        return str.slice(0, maxlength-1) + '\u2026';
    }
    return str;
}

// export function camelize(str){//Надо просмотреть
//     return str.replace(/-(.)/g, function(match, p1) {
//         return p1.toUpperCase();
//     });
// }

//Задание 5

/**
 * Преобразует строку с дефисами в строку вида "camelCase".
 *
 * @param {string} str строка с дефисами, которую необходимо преобразовать
 * @return {string} Возвращает строку в формате "camelCase".
 */
export function camelize(str){
    let word = str.split('-');
    for (let i = 0; i < word.length; i++) {
        if(i != 0){
            word[i] = ucFirst(word[i]);
        }
    }
    return word.join('');
}

/**
 * Преобразует первый символ строки в верхний регистр.
 *
 * @param {string} str строка для преобразования.
 * @return {string} Возвращает строку с первым символом в верхнем регистре.
 */
export function ucFirst(str){
    return !str ? str : str[0].toUpperCase() + str.slice(1);
}

//Задание 6

/**
 * Возвращает массив, заполненый числами Фибоначчи до n-ого(не включая его).
 *
 * @param {number} n количество чисел Фибоначчи, должно быть натуральным числом.
 * @return {BigInt[]} Возвращает массив n чисел Фибоначчи.
 */
export function fibs(n){
    let arr = [0n, 1n]; // Начинаем с двух первых чисел Фибоначчи
    for (let i = 2; i < n; i++) {
        arr.push(arr[i - 1] + arr[i - 2]); // Генерируем следующее число Фибоначчи, складывая два предыдущих
    }
    return arr;
}

//Задание 7

/**
 * Возвращает копию массива, отсортированного по убыванию.
 *
 * @param {Array} arr массив для сортировки.
 * @return {Array} Возвращает новый массив, отсортированный по убыванию.
 */
export function arrReverseSorted(arr){
    const arrForCopy = arr.slice();
    arrForCopy.sort((a, b) => {
        return a < b ? 1 : a > b ? -1 : 0;
    });
    return arrForCopy;
}

//Задание 8

/**
 * Возвращает массив с уникальными, не повторяющимися значениями исходного массива.
 *
 * @param {Array} arr исходный массив.
 * @return {Array} Возвращает новый массив с уникальными элементами.
 */
export function unique(arr){
    const uniqueArr = [...new Set(arr)];
    return uniqueArr;
}
