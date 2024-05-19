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