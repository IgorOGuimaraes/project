$(document).ready(function () {

    /*
    * Initialization
    */
    var datatable_professor = $('#table_professores');

    /*
    Function
    */

    function loadDatatableProfessores()
    {

        datatable_professor.dataTable().fnDestroy();
        datatable_professor.dataTable({
            "ajax": APPLICATION_NAME + "/Dashboard/load_professores/",
            responsive: false,
            columns: [
                {data: "Professor ID"},
                {data: "Nome"},
                {data: "Usuário"},
                {data: "E-mail"}
            ],
            dom: 'frtip',
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            "language": {
                'lengthMenu': "_MENU_"
            },
            initComplete: function () {
                this.api().columns().every(function () {
                    var column = this;
                    var input = document.createElement("input");
                    input.setAttribute("Placeholder","Filter");
                    $(input).appendTo($(column.footer()).empty())
                        .on('keyup change', function () {
                            column.search($(this).val(), false, false, true).draw();
                        });
                });
            }
        });

        $('#table_professores_wrapper').css('width', '100%', 'important');
        $('#table_professores_filter').css('width', '100%', 'important');
        $('#table_professores_filter').css('text-align', 'left');

    }

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
        loadDatatableProfessores()
    }

    $('#reset_pass').on('click', function () {
        var pass = $('#last_password').val();

        Swal.fire({
            title: "Tem certeza?",
            text: "Você deseja alterar a senha?",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Confirmar",
            cancelButtonText: "Cancelar",
            confirmButtonColor: '#11d65f',
            cancelButtonColor: '#d33'
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
                            M.toast({html: 'Opsss, Algo deu errado!', displayLength: 3000});
                        }
                    });
                } else {
                    M.toast({html: 'Complete todos os campos!', displayLength: 3000});
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
                   M.toast({html: 'Opsss, Algo deu errado!',displayLength: 3000});
               }
           });
       } else {
           M.toast({html: 'Preencha o nome do novo curso!'})
       }
    });

    $('#new_disciplina_button').on('click', function () {
       if(validate('validate-new-disciplina')){
           $.ajax({
               type: 'POST',
               url: APPLICATION_NAME + '/Dashboard/new_disciplina',
               data: {course_name: $('#disciplina_name').val()},
               success: function (responseData) {
                   console.log(responseData['debug']);
                   M.toast({html: responseData['message'], displayLength: 3000});
                   if(responseData['status'] == 'success'){
                       $('#new_disciplina_form').trigger('reset');
                   }
               },
               error: function () {
                   M.toast({html: 'Opsss, Algo deu errado!',displayLength: 3000});
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
                    M.toast({html: 'Opsss, Algo deu errado!', displayLength: 3000});
                }
            });
        } else {
            M.toast({html: 'Preencha todos os campos do novo professor!', displayLength: 3000});
        }
    });



});