var btn_Abrir_Popup = document.getElementById('btn_a'),
    overlay = document.getElementById('overlay'),
    popup = document.getElementById('popup'),
    btn_cerrar_popup = document.getElementById('btn_cerrar_popup'),
    btn_Login = document.getElementById('btn_Login');

btn_Abrir_Popup.addEventListener('click', function () {
    overlay.classList.add('active');
    popup.classList.add('active');
    btn_Login.classList.add('active');
});

btn_cerrar_popup.addEventListener('click', function () {
    overlay.classList.remove('active');
    popup.classList.remove('active');
    btn_Login.classList.remove('active');
});

