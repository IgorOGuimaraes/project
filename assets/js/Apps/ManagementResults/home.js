$(document).ready(function () {

    /*Initialization*/
    var disciplina = '';
    var nomeCurso = '';
    var periodo = '';
    var ano = '';
    var semestre = '';
    var datatable_notas = $('#table_notas');

    //Initialize modal
    var modals = document.querySelectorAll('.modal');
    M.Modal.init(modals);

    $('select').formSelect();



    /*Functions*/
    function loadDatatableNotas(disciplina, nomeCurso, periodo, ano, semestre)
    {

        datatable_notas.dataTable().fnDestroy();
        datatable_notas.dataTable({
            "ajax": APPLICATION_NAME + "/ManagementResults/load_notas/?disciplina=" + disciplina + "&nomeCurso=" + nomeCurso + "&periodo=" + periodo + "&ano=" + ano + "&semestre=" + semestre,
            responsive: false,
            columns: [
                {data: "RA Aluno"},
                {data: "Nome Aluno"},
                {data: "Nota"},
                {data: "Prova Oficial"}
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

        $('#table_notas_wrapper').css('width', '100%', 'important');
        $('#table_notas_filter').css('width', '100%', 'important');
        $('#table_notas_filter').css('text-align', 'left');

    }

    function validateFields(className)
    {
        var class_name = '.' + className;
        var valid = true;

        $(class_name).each(function () {
            if($(this).is('input')){
                if($(this).val() == '' || $(this).val() == ' '){
                    return valid = false;
                }
            }
        });

        $(class_name).each(function () {
            if($(this).is('select')){
                if($(this).val() == '' || $(this).val() == ' ' || $(this).val() == null){
                    return valid = false;
                }
            }
        });

        return valid;
    }

    function renderSelectDisciplinas()
    {

        $.ajax({
            type: 'POST',
            url: APPLICATION_NAME + '/ManagementResults/infos_disciplina_curso',
            success: function (responseData) {
                $.each(responseData['data'], function(i, item){
                    $('#disciplina').append('<option value="' + item.DisciplinaID + '">' + item.NomeDisciplina + '</option>');
                    $('#disciplina-export').append('<option value="' + item.DisciplinaID + '">' + item.NomeDisciplina + '</option>');
                    $('select').formSelect();
                });

                $.each(responseData['data1'], function(i, item){
                    $('#nome_curso').append('<option value="' + item.CursoID + '">' + item.NomeCurso + '</option>');
                    $('#nome_curso_export').append('<option value="' + item.CursoID + '">' + item.NomeCurso + '</option>');
                    $('select').formSelect();
                });
            },
            error: function () {
                M.toast({html: 'Opsss, Algo deu errado!', displayLength: 3000});
            }
        });
    }

    /*Process*/
    renderSelectDisciplinas();
    loadDatatableNotas(disciplina, nomeCurso, periodo, ano, semestre);


    $('#search').on('click',function () {
        if(validateFields('validate')){

            disciplina = $('#disciplina').val();
            nomeCurso = $('#nome_curso').val();
            periodo = $('#periodo').val();
            ano = $('#ano').val();
            semestre = $('#semestre').val();

            loadDatatableNotas(disciplina, nomeCurso, periodo, ano, semestre);

        } else {
            M.toast({html: 'Favor, preencha todos os campos!', displayLength: 3000});
        }
    });


    $('#export-notas-button').on('click', function(e) {

        if(validateFields('validate-export')){
            var disciplina = $("#disciplina-export").val();
            var curso = $("#nome_curso_export").val();
            var periodo = $("#periodo-add-export").val();
            var ano = $("#ano-export").val();
            var semestre = $("#semestre-export").val();

            e.preventDefault();
            window.open( APPLICATION_NAME + "/ManagementResults/export_notas/?disciplina=" + disciplina +
                '&curso=' + curso + '&periodo=' + periodo + '&ano=' + ano + '&semestre=' + semestre);
        } else {
            M.toast({html: 'Preencha todos os campos!', displayLength: 3000});
        }

    });

});