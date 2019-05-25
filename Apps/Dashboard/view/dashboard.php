<div class="row">
    <!-- [Grafico do comparativo entre a nota do aluno na P1 x P2] -->
    <div class="col s12 m6">
        <div class="card hide" id="filtro-aluno-p1-p2">
            <div class="card-content">
                <span class="card-title">Preencha o filtro</span>
                <div class="row">
                    <div class="input-field col s12 m12 l12">
                        <select id="choose-aluno" name="choose-aluno"
                                class="select_customer material_select_2 validate-aluno-p1-p2">

                            <option value=""></option>
                            <?php
                            foreach ($alunos as $resp) {
                                echo "<option value=" . $resp['AlunoID'] . ">" . $resp['NomePessoa'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="input-field col s10 m10 l10">
                        <select id="disciplina-nota-aluno" name="disciplina-nota-aluno" class="validate-aluno-p1-p2 select-all">
                            <option value="" disabled selected>Escolha a matéria</option>
                        </select>
                        <label>Nome Disciplina</label>
                    </div>

                    <div class="input-field col s1 m1 l1" style="padding-left: 0px;">
                        <a class="waves-effect waves-light btn" id="search-aluno"><i class="material-icons">search</i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-content">
                <span class="card-title right">
                    <a class="waves-effect waves-light btn-floating t-green2" id="open-search-aluno"><i class="material-icons" style="padding-top: 5px;">search</i></a>
                    <a class="waves-effect waves-light btn-floating t-red2 hide" id="close-search-aluno"><i class="material-icons" style="padding-top: 5px;">search</i></a>
                </span>
                <div id="aluno-p1-p2"></div>
            </div>
        </div>
    </div>


    <!-- [Comparativo entre duas turmas] -->
    <div class="col s12 m6">
        <div class="card hide" id="filtro-comparativo-turma">
            <div class="card-content">
                <span class="card-title">Preencha o filtro</span><br>

                <div class="row">
                    <div class="input-field col s12 m12 l12">
                        <select id="disciplina-comparativo" name="disciplina-comparativo" class="validate-comparativo-turma select-all">
                            <option value="" disabled selected>Escolha a matéria</option>
                        </select>
                        <label>Nome Disciplina</label>
                    </div>

                    <div class="input-field col s12 m12 l12">
                        <select id="curso-comparativo" name="curso-comparativo" class="validate-comparativo-turma select-all">
                            <option value="" disabled selected>Escolha a matéria</option>
                        </select>
                        <label>Nome Curso</label>
                    </div>

                    <div><b>Turma A</b></div><br>
                    <div class="input-field col s6 m3 l3">
                        <select id="periodo-comparativo1" name="periodo-comparativo1" class="validate-comparativo-turma select-all">
                            <option value="" disabled selected>Escolha a matéria</option>
                            <option value="Matutino">Matutino</option>
                            <option value="Vespertino">Vespertino</option>
                            <option value="Noturno">Noturno</option>
                        </select>
                        <label>Período</label>
                    </div>

                    <div class="input-field col s6 m3 l3">
                        <select id="official-comparativo1" name="official-comparativo1" class="validate-comparativo-turma select-all">
                            <option value="" disabled selected>Escolha a matéria</option>
                            <option value="P1">P1</option>
                            <option value="P2">P2</option>
                            <option value="P3">P3</option>
                        </select>
                        <label>Prova Oficial</label>
                    </div>

                    <div class="input-field col s6 m3 l3">
                        <select id="ano-comparativo1" name="ano-comparativo1" class="validate-comparativo-turma select-all">
                            <option value="" disabled selected>Escolha a matéria</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                        </select>
                        <label>Ano</label>
                    </div>

                    <div class="input-field col s6 m3 l3">
                        <select id="semestre-comparativo1" name="semestre-comparativo1" class="validate-comparativo-turma select-all">
                            <option value="" disabled selected>Escolha a matéria</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                        <label>Semestre</label>
                    </div><br>

                    <div class="col s12 m12 l12"><hr></div>

                    <div><b>Turma B</b></div><br>
                    <div class="input-field col s6 m3 l3">
                        <select id="periodo-comparativo2" name="periodo-comparativo2" class="validate-comparativo-turma select-all">
                            <option value="" disabled selected>Escolha a matéria</option>
                            <option value="Matutino">Matutino</option>
                            <option value="Vespertino">Vespertino</option>
                            <option value="Noturno">Noturno</option>
                        </select>
                        <label>Período</label>
                    </div>

                    <div class="input-field col s6 m3 l3">
                        <select id="official-comparativo2" name="official-comparativo2" class="validate-comparativo-turma select-all">
                            <option value="" disabled selected>Escolha a matéria</option>
                            <option value="P1">P1</option>
                            <option value="P2">P2</option>
                            <option value="P3">P3</option>
                        </select>
                        <label>Prova Oficial</label>
                    </div>

                    <div class="input-field col s6 m3 l3">
                        <select id="ano-comparativo2" name="ano-comparativo2" class="validate-comparativo-turma select-all">
                            <option value="" disabled selected>Escolha a matéria</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                        </select>
                        <label>Ano</label>
                    </div>

                    <div class="input-field col s6 m3 l3">
                        <select id="semestre-comparativo2" name="semestre-comparativo2" class="validate-comparativo-turma select-all">
                            <option value="" disabled selected>Escolha a matéria</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                        <label>Semestre</label>
                    </div><br>

                    <div class="input-field right" style="padding-left: 0px;">
                        <a class="waves-effect waves-light btn" id="search-comp-turma"><i class="material-icons">search</i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-content">
                <span class="card-title right">
                    <a class="waves-effect waves-light btn-floating t-green2" id="open-search-comparativo-turmas"><i class="material-icons" style="padding-top: 5px;">search</i></a>
                    <a class="waves-effect waves-light btn-floating t-red2 hide" id="close-search-comparativo-turmas"><i class="material-icons" style="padding-top: 5px;">search</i></a>
                </span>
                <div id="comparativo-turmas"></div>
            </div>
        </div>
    </div>
</div>



<div class="row">
    <!-- [Média da turma] -->
    <div class="col s12 m5 l5">
        <div class="card hide" id="filtro-media-turma">
            <div class="card-content">
                <span class="card-title">Preencha o filtro</span><br>

                <div class="row">
                    <div class="input-field col s12 m12 l12">
                        <select id="disciplina-media" name="disciplina-media" class="validate-media-turma select-all">
                            <option value="" disabled selected>Escolha a matéria</option>
                        </select>
                        <label>Nome Disciplina</label>
                    </div>

                    <div class="input-field col s12 m12 l12">
                        <select id="curso-media" name="curso-media" class="validate-media-turma select-all">
                            <option value="" disabled selected>Escolha a matéria</option>
                        </select>
                        <label>Nome Curso</label>
                    </div>

                    <div class="input-field col s6 m3 l3">
                        <select id="periodo-media" name="periodo-media" class="validate-media-turma select-all">
                            <option value="" disabled selected>Escolha a matéria</option>
                            <option value="Matutino">Matutino</option>
                            <option value="Vespertino">Vespertino</option>
                            <option value="Noturno">Noturno</option>
                        </select>
                        <label>Período</label>
                    </div>

                    <div class="input-field col s6 m3 l3">
                        <select id="official-media" name="official-media" class="validate-media-turma select-all">
                            <option value="" disabled selected>Escolha a matéria</option>
                            <option value="P1">P1</option>
                            <option value="P2">P2</option>
                            <option value="P3">P3</option>
                        </select>
                        <label>Prova Oficial</label>
                    </div>

                    <div class="input-field col s6 m3 l3">
                        <select id="ano-media" name="ano-media" class="validate-media-turma select-all">
                            <option value="" disabled selected>Escolha a matéria</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                        </select>
                        <label>Ano</label>
                    </div>

                    <div class="input-field col s6 m3 l3">
                        <select id="semestre-media" name="semestre-media" class="validate-media-turma select-all">
                            <option value="" disabled selected>Escolha a matéria</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                        <label>Semestre</label>
                    </div><br>

                    <div class="input-field right" style="padding-left: 0px;">
                        <a class="waves-effect waves-light btn" id="search-media-turmas"><i class="material-icons">search</i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-content">
                <span class="card-title right">
                    <a class="waves-effect waves-light btn-floating t-green2" id="open-search-media-turmas"><i class="material-icons" style="padding-top: 5px;">search</i></a>
                    <a class="waves-effect waves-light btn-floating t-red2 hide" id="close-search-media-turmas"><i class="material-icons" style="padding-top: 5px;">search</i></a>
                </span>
                <div id="media-turma"></div>
            </div>
        </div>
    </div>


    <!-- [Questões certas por questões erradas] -->
    <div class="col s12 m7">
        <div class="card hide" id="filtro-questoes-turma">
            <div class="card-content">
                <span class="card-title">Preencha o filtro</span><br>

                <div class="row">
                    <div class="input-field col s12 m12 l12">
                        <select id="disciplina-questoes" name="disciplina-questoes" class="validate-questoes-turma select-all">
                            <option value="" disabled selected>Escolha a matéria</option>
                        </select>
                        <label>Nome Disciplina</label>
                    </div>

                    <div class="input-field col s12 m12 l12">
                        <select id="curso-questoes" name="curso-questoes" class="validate-questoes-turma select-all">
                            <option value="" disabled selected>Escolha a matéria</option>
                        </select>
                        <label>Nome Curso</label>
                    </div>

                    <div class="input-field col s6 m3 l3">
                        <select id="periodo-questoes" name="periodo-questoes" class="validate-questoes-turma select-all">
                            <option value="" disabled selected>Escolha a matéria</option>
                            <option value="Matutino">Matutino</option>
                            <option value="Vespertino">Vespertino</option>
                            <option value="Noturno">Noturno</option>
                        </select>
                        <label>Período</label>
                    </div>

                    <div class="input-field col s6 m3 l3">
                        <select id="official-questoes" name="official-questoes" class="validate-questoes-turma select-all">
                            <option value="" disabled selected>Escolha a matéria</option>
                            <option value="P1">P1</option>
                            <option value="P2">P2</option>
                            <option value="P3">P3</option>
                        </select>
                        <label>Prova Oficial</label>
                    </div>

                    <div class="input-field col s6 m3 l3">
                        <select id="ano-questoes" name="ano-questoes" class="validate-questoes-turma select-all">
                            <option value="" disabled selected>Escolha a matéria</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                        </select>
                        <label>Ano</label>
                    </div>

                    <div class="input-field col s6 m3 l3">
                        <select id="semestre-questoes" name="semestre-questoes" class="validate-questoes-turma select-all">
                            <option value="" disabled selected>Escolha a matéria</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                        <label>Semestre</label>
                    </div><br>

                    <div class="input-field right" style="padding-left: 0px;">
                        <a class="waves-effect waves-light btn" id="search-questoes-turmas"><i class="material-icons">search</i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-content">
                <span class="card-title right">
                    <a class="waves-effect waves-light btn-floating t-green2" id="open-search-questoes-turmas"><i class="material-icons" style="padding-top: 5px;">search</i></a>
                    <a class="waves-effect waves-light btn-floating t-red2 hide" id="close-search-questoes-turmas"><i class="material-icons" style="padding-top: 5px;">search</i></a>
                </span>
                <div id="questoes-certas-erradas"></div>
            </div>
        </div>
    </div>
</div>