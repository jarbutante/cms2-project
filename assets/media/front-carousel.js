// vars
const $gallery = document.getElementById('gallery');
const $divHd = document.querySelector('.o-img__divhd');

// array
let carousel4 = [];

// functions

// push imgs into array
function imgpush() {
    for (i = 1; i <= 6; i++) {
        carousel4.push({
            src: 'wp-content/themes/cms2-project/assets/media/carousel/ct-carousel-0' + i + '.png',
            title: 'Image ' + i
        });
    }
};
imgpush();

// shuffle array
function shufflePics(array) {
    for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
    }
};
shufflePics(carousel4);
// display gallery
function deployImg() {
    for (i = 0; i < 4; i++) {
        const imgData = carousel4[i];
        // make div
        const createDiv = document.createElement('div');
        createDiv.classList.add('col-md-3');
        createDiv.setAttribute('id', imgData.title);
        // make img
        const createImg = document.createElement('img');
        createImg.classList.add('o-img');
        createImg.setAttribute('alt', imgData.title);
        createImg.setAttribute('src', imgData.src);
        createImg.setAttribute('data-title', imgData.title);
        createImg.setAttribute('data-src', imgData.src);
        // append
        createDiv.appendChild(createImg);
        $gallery.appendChild(createDiv);
    }
};
deployImg();