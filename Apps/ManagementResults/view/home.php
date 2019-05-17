<div class="row">

    <div class="col s12 m12 l12">
        <div class="card">
            <div class="card-content">
                <div class="row">
                    <form id="form-notas">
                            <div class="input-field col s12 m3 l3">
                                <select id="disciplina" name="disciplina" class="validate">
                                    <option value="" disabled selected>Escolha uma opção</option>
                                </select>
                                <label>Nome Disciplina</label>
                            </div>

                            <div class="input-field col s12 m3 l3">
                                <select id="nome_curso" name="nome_curso" class="validate">
                                    <option value="" disabled selected>Escolha uma opção</option>
                                </select>
                                <label>Nome Curso</label>
                            </div>

                            <div class="input-field col s12 m2 l2">
                                <select id="periodo" name="periodo" class="validate">
                                    <option value="" disabled selected>Escolha uma opção</option>
                                    <option value="Matutino">Matutino</option>
                                    <option value="Vespertino">Vespertino</option>
                                    <option value="Noturno">Noturno</option>
                                </select>
                                <label>Período</label>
                            </div>

                            <div class="input-field col s12 m2 l2">
                                <select id="ano" name="ano" class="validate">
                                    <option value="" disabled selected>Escolha uma opção</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                </select>
                                <label>Ano</label>
                            </div>

                            <div class="input-field col s11 m1 l1">
                                <select id="semestre" name="semestre" class="validate">
                                    <option value="" disabled selected>Escolha uma opção</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                </select>
                                <label>Semestre</label>
                            </div>

                        </form>
                        <div class="col s1 m1 l1">
                            <a class="btn waves-effect waves-light" id="search"><i class="material-icons">search</i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col s12 m12 l12">
        <div class="card">
            <div class="card-content">
                <span class="card-title">Notas da Turma</span>

                <div class="row">
                    <div class="col s12 m12 l12">
                        <table class="datatable highlight display centered" id="table_notas" name="table_notas">
                            <thead>
                            <tr>
                                <th>RA Aluno</th>
                                <th>Nome Aluno</th>
                                <th>Nota</th>
                                <th>Prova Oficial</th>
                            </tr>
                            </thead>
                            <tbody id="notas_result"></tbody>
                            <tfoot>
                            <tr>
                                <td>RA Aluno</td>
                                <td>Nome Aluno</td>
                                <td>Nota</td>
                                <td>Prova Oficial</td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

            </div>
            <div class="card-action">
                <a class="btn btn-floating btn-large waves-effect waves-light modal-trigger" href="#modal-export"><i class="material-icons">file_download</i></a>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-fixed-footer" id="modal-export">
    <div class="modal-content">
        <h4 class="header tx-dark-blue">Export</h4>

        <form id="form-export-notas">
            <div class="row">
                <div class="input-field col s12 m6 l6">
                    <select id="disciplina-export" name="disciplina-export" class="validate-export">
                        <option value="" disabled selected>Choose your option</option>
                    </select>
                    <label>Nome Disciplina</label>
                </div>

                <div class="input-field col s12 m6 l6">
                    <select id="nome_curso_export" name="nome_curso_export" class="validate-export">
                        <option value="" disabled selected>Choose your option</option>
                    </select>
                    <label>Nome Curso</label>
                </div>

                <div class="input-field col s11 m4 l4">
                    <select id="periodo-add-export" name="periodo-add-export" class="validate-export">
                        <option value="" disabled selected>Choose your option</option>
                        <option value="Matutino">Matutino</option>
                        <option value="Vespertino">Vespertino</option>
                        <option value="Noturno">Noturno</option>
                    </select>
                    <label>Período</label>
                </div>

                <div class="input-field col s12 m4 l4">
                    <select id="ano-export" name="ano-export" class="validate-export">
                        <option value="" disabled selected>Choose your option</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                    </select>
                    <label>Ano</label>
                </div>

                <div class="input-field col s12 m4 l4">
                    <select id="semestre-export" name="semestre-export" class="validate-export">
                        <option value="" disabled selected>Choose your option</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                    <label>Semestre</label>
                </div>
            </div>
        </form>

    </div>
    <div class="modal-footer">
        <a class="waves-effect waves-yellow btn" id="export-notas-button">Export</a>
        <a class="modal-close waves-effect waves-red btn-flat">Cancel</a>
    </div>
</div>