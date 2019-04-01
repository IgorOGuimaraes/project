<div class="row">
    <div class="col s12 m12 l12">
        <div class="card">
            <div class="card-content">
                <span class="card-title">Alunos</span>

                <div class="row">
                    <div class="col s12 m12 l12">
                        <table class="datatable highlight display centered" id="table_aluno" name="table_aluno">
                            <thead>
                            <tr>
                                <td>RA Aluno</td>
                                <td>Nome Aluno</td>
                                <td>Editar</td>
                            </tr>
                            </thead>
                            <tbody id="aluno_result"></tbody>
                            <tfoot>
                            <tr>
                                <td>RA Aluno</td>
                                <td>Nome Aluno</td>
                                <td>Editar</td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

            </div>
            <div class="card-action">
                <a class="btn btn-floating btn-large waves-effect waves-light modal-trigger" href="#modal-new-aluno"><i class="material-icons">add</i></a>
            </div>
        </div>
    </div>
</div>


<div class="modal" id="modal-new-aluno">
    <div class="modal-content">
        <h4 class="header tx-dark-blue">Novo Aluno</h4>

        <div class="row">
            <form id="form-new-aluno">
                <div class="input-field col s6 m6 l6">
                    <input id="nome_aluno" name="nome_aluno[]" type="text" class="validate-new-aluno">
                    <label for="nome_aluno">Nome Aluno</label>
                </div>

                <div class="input-field col s5 m5 l5">
                    <input id="ra_aluno" name="ra_aluno[]" type="text" class="validate-new-aluno" maxlength="13" minlength="1">
                    <label for="ra_aluno">RA Aluno</label>
                </div>

                <div class="col s1 m1 l1" style="padding-top: 20px;">
                    <a class="btn-flat blue-text right" id="more-user-button" name="more-user-button">
                        <i class="large material-icons">add_circle_outline</i>
                    </a>
                </div>
            </form>
        </div>

    </div>
    <div class="modal-footer">
        <a class="waves-effect waves-blue btn" id="new-aluno">Adicionar</a>
        <a class="modal-close waves-effect waves-red btn-flat">Cancel</a>
    </div>
</div>