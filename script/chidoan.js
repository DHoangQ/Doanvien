const trangchu = document.getElementById('trangchu');
// const chidoan = document.getElementById('chidoan');
const body1 = document.querySelector('.body1');
// const body2 = document.querySelector('.body2');

trangchu.addEventListener('click', function(e) {
    e.preventDefault();
    body1.style.display = 'block';
    body2.style.display ='none';
});
