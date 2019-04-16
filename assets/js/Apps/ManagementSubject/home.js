$(document).ready(function () {

    /*Initialization*/
    var tb_disciplina = $('#table_disciplina');
    var id_lb = 0;
    var id_insert = '#nome_curso';

    /*Functions*/
    function load_datatable()
    {

        tb_disciplina.dataTable().fnDestroy();
        tb_disciplina.dataTable({
            "ajax": APPLICATION_NAME + "/ManagementSubject/load_disciplinas/",
            responsive: false,
            columns: [
                {data: "ID Disciplina"},
                {data: "Nome Disciplina"},
                {data: "Nome Curso"},
                {data: "Excluir"}
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

        $('#table_disciplina_wrapper').css('width', '100%', 'important');
        $('#table_disciplina_filter').css('width', '100%', 'important');
        $('#table_disciplina_filter').css('text-align', 'left');

    }

    function insert_cursos(id_insert)
    {
        $.ajax({
            type: 'POST',
            url: APPLICATION_NAME + '/ManagementSubject/load_cursos',
            success: function (responseData){
                $(id_insert).append(responseData['data']);
                $('select').formSelect();
            },
            error: function () {
                M.toast({html: 'Something went wrong!', displayLength: 3000});
            }
        });
    }

    /*Process*/

    insert_cursos(id_insert);
    load_datatable();

    $("#more-user-button").on('click',function (){
        $("#form-new-disciplina").append('<div><div class="input-field col s6 m6 l6">\n' +
            '                    <input id="' + id_lb + 'nome_disciplina" name="nome_disciplina[]" type="text" class="validate-new-aluno">\n' +
            '                    <label for="nome_disciplina">Nome Disciplina</label>\n' +
            '                </div>\n' +
            '\n' +
            '                <div class="input-field col s5 m5 l5">\n' +
            '                    <select id="' + id_lb + 'nome_curso" name="nome_curso[]" type="number" class="validate-new-aluno">' +
            '                       <option value="" disable selected>Choose your option</option>' +
            '                   </select>\n' +
            '                    <label for="nome_curso">Nome Curso</label>\n' +
            '                </div>\n' +
            '\n' +
            '                <div class="col s1 m1 l1" style="padding-top: 20px;">\n' +
            '                    <a class="btn-flat red-text right" id="remove-user-fields" name="remove-user-fields">\n' +
            '                        <i class="large material-icons">delete_forever</i>\n' +
            '                    </a>\n' +
            '                </div></div>');

        insert_cursos('#' +id_lb+ 'nome_curso');
        id_lb++;
    });

    //Remove fields add
    $(document.body).on('click', '#remove-user-fields', function (e) {
        e.preventDefault();
        $(this).parent('div').parent('div').remove();
    });

    $('#adicionar-disciplina').on('click', function () {
        $.ajax({
            type: 'POST',
            url: APPLICATION_NAME + '/ManagementSubject/insert_new_disciplina',
            data: $('#form-new-disciplina').serialize(),
            success: function (responseData) {
                $('#remove-user-fields').click();
                $('#modal-new-disciplina').modal('close');
                $('#form-new-disciplina').trigger('reset');
                load_datatable();
            },
            error: function () {
                M.toast({html: 'Something went wrong!', displayLength: 3000});
            }
        });
    });

    $(document.body).on('click', '.delete-disciplina', function () {
        var id_disciplina_curso = $(this).attr('name');

        Swal.fire({
            title: "Você vai excluir está disciplina?",
            text: "Após excluir, não será possivel desfazer.",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Confirmar",
            cancelButtonText: "Cancelar",
            confirmButtonColor: '#11d65f',
            cancelButtonColor: '#d33'
        }).then((result) => {
            if(result.value) {
                $.ajax({
                    type: 'POST',
                    url: APPLICATION_NAME + '/ManagementSubject/delete_disciplina',
                    data: {disciplinaCursoID: id_disciplina_curso},
                    success: function (responseData) {
                        M.toast({html: responseData['message'], displayLength: 3000});
                        load_datatable();
                    },
                    error: function () {
                        M.toast({html: 'Something went wrong!', displayLength: 3000});
                    }
                });
            }
        });
    });

});