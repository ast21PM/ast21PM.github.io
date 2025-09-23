"use strict";

let n = +prompt("Введите число строк:");
let cat = 2, dog = 3, flag;
const output = [];

for (let i = 0; i < n; i++) {
    let line;
    if (dog > 0 && cat == 2) {
        flag = 6 - dog - cat;
        line = "dog\t".repeat(dog) + "cat\t".repeat(cat) + "dog\t".repeat(flag);
        console.log(line);
        output.push(line);
        dog--;
    } else {
        dog = 3;
        flag = 6 - dog - cat;
        line = "cat\t".repeat(cat) + "dog\t".repeat(dog) + "cat\t".repeat(flag);
        console.log(line);
        output.push(line);
        cat--;
        if (cat == 0) { cat = 2; }
    }
    console.log();
    output.push(""); 
}
alert(output.join("\n"));
