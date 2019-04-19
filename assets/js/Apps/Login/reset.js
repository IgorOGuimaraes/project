$(document).ready(function () {

    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems);

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

    $('#enviar').on('click',function () {
        if(validate()){
            $.ajax({
                type: 'POST',
                url: APPLICATION_NAME + '/Login/submit_new_password',
                data: 'mail=' + $('#email-user').val(),
                success: function (responseData){
                    M.toast({html: responseData['message'], displayLength: 3000});
                },
                error: function (e) {
                    console.log(e);
                    M.toast({html: 'Something went wrong', displayLength: 3000});
                }
            });
        } else {
            M.toast({html: 'Please, complete field!', displayLength: 3000});
        }
    });
});