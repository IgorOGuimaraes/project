$(document).ready(function () {

    /*
    * Function
    * */

    function validate () {
        var isValid = true;

        $('.validate').each(function () {
            if ($(this).is("input")) {
                if ($(this).val() == '' || $(this).val() == ' ') {
                    isValid = false;
                }
            }
        });

        return isValid;
    }



    $('#reset_pass').on('click', function () {
        var pass = $('#last_password').val();

        Swal.fire({
            title: "Are you sure?",
            text: "You are going to chage the password?",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Confirm",
            cancelButtonText: "Cancel",
            confirmButtonColor: '#11d65f',
            cancelButtonColor: '#d33',
            closeOnConfirm: false,
            closeOnCancel: true
        }).then((result) => {
            if(result.value) {
                if(validate()) {
                    $.ajax({
                        type: 'POST',
                        url: '/' +APPLICATION_NAME + '/Dashboard/new_password',
                        data: $('#reset_pass_form').serialize(),
                        success: function (responseData){
                            M.toast({html: responseData['message'], displayLength: 3000});
                            $('#reset_pass_form').trigger("reset");
                        },
                        error: function () {
                            M.toast({html: 'Something went wrong', displayLength: 3000});
                        }
                    });
                } else {
                    M.toast({html: 'Complete all fields!', displayLength: 3000});
                }
            }
        });
    });
});