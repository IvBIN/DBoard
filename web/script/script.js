"use strict";
let iframe = document.getElementById('iframe');
iframe.style.display = 'none';
let buttonOpenBdr = document.getElementById('buttonOpenBdr');
let buttonCloseBdr = document.getElementById('buttonCloseBdr');

let buttonOpenIp = document.getElementById('buttonOpenIp');
let buttonCloseIp = document.getElementById('buttonCloseIp');

buttonOpenBdr.addEventListener('click', () => {
    iframe.style.display = 'block';
    iframe.src = '/site/table-bdr';
});

buttonCloseBdr.addEventListener('click', () => {
    iframe.style.display = 'none';
});

buttonOpenIp.addEventListener('click', () => {
    iframe.style.display = 'block';
    iframe.src = '/site/table-ip';
});

buttonCloseIp.addEventListener('click', () => {
    iframe.style.display = 'none';
});

// ****** Comment field*****

let iframe2 = document.getElementById('iframe2');
iframe2.style.display = 'none';
let buttonComment = document.getElementById('comment');
buttonComment.addEventListener('click', () => {
    iframe2.style.display = 'block';
    iframe2.src = '/comment/comments/';
});



// ***** Right Part ****

// const today = new Date().toLocaleDateString() ;

let report_cell = document.querySelectorAll('.report_part');

report_cell.forEach((report_part) => {
    report_part.addEventListener('click', () => {
        report_part.style.background = '#92c2e1';

    });
});

let rep_date_cell = document.querySelectorAll('.rep_date');
rep_date_cell.forEach((rep_date) => {
    if (rep_date.textContent !== '') {
        rep_date.style.background = '#92c2e1';
    }
});

let control_cell = document.querySelectorAll('.control_part');

control_cell.forEach((control_part) => {
    control_part.addEventListener('click', () => {
        control_part.style.background = '#92c2e1';

    });
});

let qartal_cell = document.querySelectorAll('.qartal');

qartal_cell.forEach((qartal) => {
    qartal.addEventListener('click', () => {
        qartal.style.background = '#92c2e1';

        console.log(qartal);
    });
});

// ***** Music *****

let music = new Audio();
music.src = './sound/fon_urban.mp3';

let sound = document.querySelector('.music');
console.log(sound);
sound.addEventListener('click', () => {
    if (sound.classList.contains('playM')) {
        sound.classList.remove('playM');
        music.currentTime = 0;
        music.pause();
    } else {

        sound.classList.add('playM');
        music.loop = true;
        music.play();
    }
});


// ***** Welcome *****

let welcome = document.querySelector(".welcome_box");

setTimeout( () => {
    welcome.remove()
}, 2000);
