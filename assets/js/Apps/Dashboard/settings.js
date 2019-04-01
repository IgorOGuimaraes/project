$(document).ready(function () {

    /*
    Function
    */

    function validate (classValidate)
    {
        var isValid = true;
        var name = '.' + classValidate;

        $(name).each(function () {
            if ($(this).is("input")) {
                if ($(this).val() == '' || $(this).val() == ' ') {
                    isValid = false;
                }
            }
        });

        return isValid;
    }

    function especialChar(especialChar)
    {

        especialChar = especialChar.replace(/[áàãâä]/g, 'a');
        especialChar = especialChar.replace(/[éèêë]/g, 'e');
        especialChar = especialChar.replace(/[íìîï]/g, 'i');
        especialChar = especialChar.replace(/[óòõôö]/g, 'o');
        especialChar = especialChar.replace(/[úùûü]/g, 'u');
        especialChar = especialChar.replace(/[ç]/g, 'c');

        return especialChar;

    }


    /*
    Process
    */
    $('html').keyup(function(e){if(e.keyCode == 13){}});

    if(user_name != 'Admin_all') {
        $('.admin-div').remove();
    } else {
        $('.admin-div').removeClass('hide');
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
                        url: APPLICATION_NAME + '/Dashboard/new_password',
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

    $('#new_course_button').on('click', function () {
       if(validate('validate-new-course')){
           $.ajax({
               type: 'POST',
               url: APPLICATION_NAME + '/Dashboard/new_course',
               data: {course_name: $('#course_name').val()},
               success: function (responseData) {
                   console.log(responseData['debug']);
                   M.toast({html: responseData['message'], displayLength: 3000});
                   if(responseData['status'] == 'success'){
                       $('#new_course_form').trigger('reset');
                   }
               },
               error: function () {
                   M.toast({html: 'Something went wrong!',displayLength: 3000});
               }
           });
       } else {
           M.toast({html: 'Preencha o nome do novo curso!'})
       }
    });

    $('#teacher_name').on('blur', function () {
       var name = $(this).val();
       var name_sc = especialChar(name);

       console.log(name_sc);

        if(name_sc != '' && name_sc != ' ' && name_sc != null ){
           var name_split = name_sc.split(' ');
           var count_split = name_split.length;
           var user_name = name_split[0].substring(0, 3) + '_' + name_split[count_split - 1];

            $("#user_name").val(user_name);
            M.updateTextFields();
       } else {
            $("#user_name").val(null);
            M.updateTextFields();
        }
    });

    $('#new_teacher_button').on('click', function () {
        if(validate('validate-new-teacher')){
            $.ajax({
                type: 'POST',
                url: APPLICATION_NAME + '/Dashboard/save_new_professor',
                data: $('#new_teacher_form').serialize(),
                success: function(responseData){
                    M.toast({html: responseData['message'], displayLength: 3000});
                    $('#new_teacher_form').trigger('reset');
                },
                error: function () {
                    M.toast({html: 'Something went wrong!', displayLength: 3000});
                }
            });
        } else {
            M.toast({html: 'Preencha todos os campos do novo professor!', displayLength: 3000});
        }
    });



});