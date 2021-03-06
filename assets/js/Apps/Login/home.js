$(document).ready(function () {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems);

    $('#login').on('click', function (){
        $.ajax({
            type: 'POST',
            url: APPLICATION_NAME + '/Login/login_validate',
            data: $('#login-form').serialize(),
            success: function (responseData){
                M.toast({html: responseData['message'], displayLength: 3000});
                if(responseData['Status'] == 'Success'){
                    setTimeout(function () {

                        if(redir  != ''){
                            window.location = redir;
                        }else{
                            window.location = responseData['location'];
                        }

                    }, 1000);
                }
            },
            error: function (e){
                M.toast({html: 'Opsss, Algo deu errado!', displayLength: 3000});
                console.log(e);
            }
        });
    });

    $('html').keyup(function(e){
        if(e.keyCode == 13){
            $('#login').click();
        }
    });

});