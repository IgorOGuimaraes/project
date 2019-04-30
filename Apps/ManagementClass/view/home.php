<style>
    .modal {
        width: 1000px;
    }
</style>

<div class="row">
    <div class="col s12 m12 l12">
        <div class="card">
            <div class="card-content">
                <span class="card-title">Turmas</span>

                <div class="row">
                    <div class="col s12 m12 l12">
                        <table class="datatable highlight display centered" id="table_turma" name="table_turma">
                            <thead>
                            <tr>
                                <th>Ano</th>
                                <th>Semestre</th>
                                <th>Período</th>
                                <th>Nome do Curso</th>
                                <th>Nome da Matéria</th>
                                <th>Deletar</th>
                            </tr>
                            </thead>
                            <tbody id="turma_result"></tbody>
                            <tfoot>
                            <tr>
                                <td>Ano</td>
                                <td>Semestre</td>
                                <td>Período</td>
                                <td>Nome do Curso</td>
                                <td>Nome da Matéria</td>
                                <td>Deletar</td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

            </div>
            <div class="card-action">
                <a class="btn btn-floating btn-large waves-effect waves-light modal-trigger" href="#modal-new-class"><i class="material-icons">add</i></a>
            </div>
        </div>
    </div>
</div>

<!-- Modal New Turma -->
<div id="modal-new-class" class="modal">
    <div class="modal-content">
        <h4 class="header tx-dark-blue">Nova Turma</h4>

        <div class="row">
            <form id="form-new-class">
                <div class="input-field col s12 m4 l4">
                    <select id="disciplina-add" name="disciplina-add" class="validate-turma">
                        <option value="" disabled selected>Choose your option</option>
                    </select>
                    <label>Nome Disciplina</label>
                </div>

                <div class="input-field col s12 m4 l4">
                    <select id="nome_curso" name="nome_curso" class="validate-turma">
                        <option value="" disabled selected>Choose your option</option>
                    </select>
                    <label>Nome Curso</label>
                </div>

                <div class="input-field col s11 m3 l3">
                    <select id="periodo-add" name="periodo-add" class="validate-turma">
                        <option value="" disabled selected>Choose your option</option>
                        <option value="Matutino">Matutino</option>
                        <option value="Vespertino">Vespertino</option>
                        <option value="Noturno">Noturno</option>
                    </select>
                    <label>Período</label>
                </div>
            </form>
        </div>
    </div>
    <div class="modal-footer">
        <a class="waves-effect waves-yellow btn" id="new-class-button">Adicionar</a>
        <a class="modal-close waves-effect waves-red btn-flat">Cancel</a>
    </div>
</div>