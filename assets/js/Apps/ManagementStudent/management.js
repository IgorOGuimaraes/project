$(document).ready(function () {

    /*Initialization*/
    var id_lb = 0;
    var datatable_aluno = $('#table_aluno');

    //Initialize modal
    var modals = document.querySelectorAll('.modal');
    M.Modal.init(modals);

    /*Functions*/
    function loadDatatableAluno()
    {

        datatable_aluno.dataTable().fnDestroy();
        datatable_aluno.dataTable({
            "ajax": APPLICATION_NAME + "/ManagementStudent/load_alunos/",
            responsive: false,
            columns: [
                {data: "RA Aluno"},
                {data: "Nome Aluno"},
                {data: "Disciplinas"},
                {data: "Editar"}
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

        $('#table_aluno_wrapper').css('width', '100%', 'important');
        $('#table_aluno_filter').css('width', '100%', 'important');
        $('#table_aluno_filter').css('text-align', 'left');

    }

    function validateFields(className)
    {
        var class_name = '.' + className;
        var valid = true;

        $(class_name).each(function () {
            if($(this).is('input')){
                if($(this).val() == '' || $(this).val() == ' '){
                    valid = false;
                }
            }
        });

        $(class_name).each(function () {
            if($(this).is('select')){
                if($(this).val() == '' || $(this).val() == ' '){
                    valid = false;
                }
            }
        });

        return valid;
    }


    /*Process*/
    loadDatatableAluno();

    $("#more-user-button").on('click',function (){
        $("#form-new-aluno").append('<div><div class="input-field col s6 m6 l6">\n' +
            '                    <input id="' + id_lb + '_nome_aluno" name="nome_aluno[]" type="text" class="validate-new-aluno">\n' +
            '                    <label for="nome_aluno">Nome Aluno</label>\n' +
            '                </div>\n' +
            '\n' +
            '                <div class="input-field col s5 m5 l5">\n' +
            '                    <input id="' + id_lb + '_ra_aluno" name="ra_aluno[]" type="number" class="validate-new-aluno">\n' +
            '                    <label for="ra_aluno">RA Aluno</label>\n' +
            '                </div>\n' +
            '\n' +
            '                <div class="col s1 m1 l1" style="padding-top: 20px;">\n' +
            '                    <a class="btn-flat red-text right" id="remove-user-fields" name="remove-user-fields">\n' +
            '                        <i class="large material-icons">delete_forever</i>\n' +
            '                    </a>\n' +
            '                </div></div>');

        id_lb++;
    });

    $("#new-aluno").on('click',function (){
        if(validateFields('validate-new-aluno')){
            $.ajax({
                type: 'POST',
                url: APPLICATION_NAME + "/ManagementStudent/new_aluno",
                data: $('#form-new-aluno').serialize(),
                success: function (responseData) {
                    console.log(responseData['data']);

                    $('#modal-new-aluno').modal('close');
                    $('#form-new-aluno').trigger('reset');
                    M.toast({html: responseData['message'], displayLength: 3000});
                    loadDatatableAluno();
                }
            });
        } else {
            M.toast({html: 'Preencha todos os campos!'});
        }
    });

    //Remove fields add
    $(document.body).on('click', '#remove-user-fields', function (e) {
        e.preventDefault();
        $(this).parent('div').parent('div').remove();
    });

});