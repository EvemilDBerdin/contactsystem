
const asidemylogout = () => {
    Swal.fire({
        title: 'Do you want to logout?',
        showCancelButton: true,
        confirmButtonText: 'logout',
    }).then((res) => {
        if (res.value) {
            Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: 'You are logging out',
                showConfirmButton: false,
                timer: 1500
            })
                .then(() => {
                    window.location.href = urls + "login/logout";
                })
        }
    })
}

const registrationForm = (e) =>{
    e.preventDefault();
    let data = new FormData(e.currentTarget);
    sendAjax(urls + 'home/registrationForm', data).then((res) => {
        swalRes(res.response, res.msg);
        return (res.response == 200) ? true : false;
    }).then((r) => { 
        setTimeout(function () {
            myReloadPage()
        }, 1500);
    })
}



const myReloadPages = () => {
    window.location = urls + 'home/index';
}