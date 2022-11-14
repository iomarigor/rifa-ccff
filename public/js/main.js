const btnSearch = document.getElementById('btn-search');
const dniSearch = document.getElementById('dni-search');
const toastMessage = document.getElementById('toast-message');

var toastLiveExample = document.getElementById('liveToast');
//variables modal
var modalResponse = document.getElementById('modalResponse');
var modalTitle = document.getElementById('modalTitle');

function validateDNI() {
    btnSearch.disabled = true;
    fetch(URL_API + 'search/searchRifa?id=' + dniSearch.value, {
            method: 'get',
        }).then(response => response.json())
        .then(data => {
            if (data.status) {
                //muestra info en modal
                modalTitle.innerHTML = data.mensage;
                modalResponse.innerHTML = `<strong>ID-TICKET: RCCFF-2022-${data.IDRifa} <br></br>DNI: ${data.DNI}  <br></br>NOMBRES: ${data.Nombres}</strong>`;
                $('#dialog-alert').modal({ show: true });
                btnSearch.disabled = false;
            } else {
                modalTitle.innerHTML = data.mensage;
                modalResponse.innerHTML = "Ingrese correctamente el id o contactarse con al 922222222";
                //muestra info en modal
                $('#dialog-alert').modal({ show: true });
                btnSearch.disabled = false;
            }
        });
}

/* function userValidate() {
    console.log(URL_API + 'sesion/login');
    userWarn.style = 'display: none;';
    const data = {
        user: userLogin.value,
        pass: passLogin.value
    };
    btnLogin.disabled = true;
    fetch(URL_API + 'sesion/login?user=' + data.user + '&pass=' + data.pass, {
            method: 'get',
        }).then(response => response.json())
        .then(data => {
            btnLogin.disabled = false;
            if (data.status) {
                window.location.href = URL_API + 'cpanel';
            } else {
                userWarn.style = 'display: block;';
                userWarn.innerHTML = data.mensaje;
            }
        });
} */