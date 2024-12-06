const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
    container.classList.add('right-panel-active');
});

signInButton.addEventListener('click', () => {
    container.classList.remove('right-panel-active');
});

function checkLogin(){
var email = document.getElementById('email').value;
var passWord = document.getElementById('password').value;

if(email === 'admin@gmail.com' && passWord === '1234'){
    window.location.href = 'D:\TMĐT\Responsive Food_Restaurant\index.html';
}else{
    alert('Email hoac mat khau khong dung');
}
}