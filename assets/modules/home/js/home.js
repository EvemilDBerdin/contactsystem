
/* button */
const deletetbldepartmentBtn = (id) => {
    let data = new FormData();
    data.append('id', id);

    Swal.fire({
        title: 'Are you sure you want to delete?',
        type: 'info',
        showCancelButton: true,
        confirmButtonText: 'Yes',
    }).then((result) => {
        if (result.value) {
            sendAjax(urls + "home/deletetbldepartmentBtn", data).then((res) => {
                swalRes(res.response, res.msg);
            }).then((r) => {
                (r == true) && tbldepartment();
            })
        }
        setTimeout(function () {
            myReloadPage()
        }, 1500);
    })
}

/* show contact dept modal */
const editdepartmentModal = (id) => {
    let data = new FormData();
    data.append('id', id);
    sendAjax(urls + "home/editdepartmentModal", data).then((res) => {
        $('#editdepartmentidForm input[name="id"]').val(id);
        $('#editdepartmentidForm input[name="contact[name]"]').val(res.name);
        $('#editdepartmentidForm input[name="contact[company]"]').val(res.company);
        $('#editdepartmentidForm input[name="contact[phone]"]').val(res.phone);
        $('#editdepartmentidForm input[name="contact[email]"]').val(res.email);
    }).then(() => {
        $('#editdepartmentidModal').modal('show');
    })
}

/* form */
const searchbarDepartmentForm = (e) => {
    let data = new FormData(e.currentTarget);
    $.ajax({
        url: urls + 'home/index',
        type: "POST",
        dataType: "json",
        data: data,
        async: false,
        processData: false,
        contentType: false,
        cache: false,
        beforeSend: function () {
        },
        success: function (res) {
            console.log(res.response)
        },
        error: function (err) {
            console.log(err)
        },
    });
}

// contact department
const addcontactForm = (e) => {
    e.preventDefault();
    let data = new FormData(e.currentTarget);
    sendAjax(urls + 'home/addcontactForm', data).then((res) => {
        swalRes(res.response, res.msg);
        return (res.response == 200) ? true : false;
    }).then((r) => {
        if (r == true) {
            $('#adddepartmentidForm')
                .find("input,textarea,select")
                .val('')
                .end()
                .find("input[type=checkbox], input[type=radio]")
                .prop("checked", "")
                .end();
            $('.long-modal').modal('hide');
        }
        setTimeout(function () {
            myReloadPage()
        }, 1500);
    })
}
const editdepartmentForm = (e) => {
    e.preventDefault();
    let data = new FormData(e.currentTarget);
    sendAjax(urls + 'home/editdepartmentForm', data).then((res) => {
        swalRes(res.response, res.msg);
        return (res.response == 200) ? true : false;
    }).then((r) => {
        if (r == true) {
            $('#editdepartmentidForm')
                .find("input,textarea,select")
                .val('')
                .end()
                .find("input[type=checkbox], input[type=radio]")
                .prop("checked", "")
                .end();
            $('#editdepartmentidModal').modal('hide');
        }
        setTimeout(function () {
            myReloadPage()
        }, 1500);
    })
}


/* useful function */
function sendAjax(url, data = {}, isForm = false) {
    if (isForm) {
        return new Promise(function (myResolve, myReject) {
            $.ajax({
                url: url,
                type: "POST",
                dataType: "json",
                data: data,
                async: false,
                cache: false,
                enctype: "multipart/form-data",
                processData: false,
                contentType: false,
                beforeSend: function () {
                    // loader(element.target, element.type)
                },
                success: function (res) {
                    myResolve(res); // when successful
                },
                error: function (err) {
                    myReject(err); // when error
                },
            });
        });

    } else {
        return new Promise(function (myResolve, myReject) {
            $.ajax({
                url: url,
                type: "POST",
                dataType: "json",
                data: data,
                async: false,
                processData: false,
                contentType: false,
                cache: false,
                beforeSend: function () {
                    // loader(element.target, element.type)
                },
                success: function (res) {
                    myResolve(res); // when successful
                },
                error: function (err) {
                    myReject(err); // when error
                },
            });
        });
    }
}
const swalRes = (status, message) => {
    (status == 200) ? Swal.fire({
        position: 'top-center',
        type: 'success',
        title: message,
        showConfirmButton: false,
        timer: 1500
    }) : Swal.fire({
        position: 'top-center',
        type: 'error',
        title: message,
        showConfirmButton: false,
        timer: 1500
    })
}
const myReloadPage = () => {
    window.location = window.location;
}