<?php
/**
 * @author Igor de Oliveira Guimarães
 * @version 1.0.0
 * @description This controller is use on login interaction for the core
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <title>Gabarit.IO | Guide</title>
    <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
    <link href="<?=APPLICATION_NAME?>/assets/css/Core/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="<?=APPLICATION_NAME?>/assets/css/Core/custom.css" type="text/css" rel="stylesheet" media="screen,projection"/>


</head>
<body>

<nav>
    <div class="nav-wrapper t-grey4 darken-4">
        <div class="container">
            <a class="brand-logo hide-on-med-and-down"><img src="<?=APPLICATION_NAME?>/assets/img/thumbnail_gabiri.io_logo.png" class="responsive-img" style="height: 35px;"></a>
            <a data-target="slide-out" class="sidenav-trigger tx-grey5"><i class="material-icons">menu</i></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="<?=APPLICATION_NAME?>/About/about" class="tx-grey5">Sobre</a></li>
                <li><a href="<?=APPLICATION_NAME?>/Login/home" class="tx-grey5">Login</a></li>
            </ul>
            <ul id="slide-out" class="sidenav">
                <li><a class="brand-logo"><img src="<?=APPLICATION_NAME?>/assets/img/thumbnail_gabiri.io_logo.png" class="responsive-img"></a></li>
                <li>\n</li>
                <li><a href="<?=APPLICATION_NAME?>/About/about" class="tx-grey5">Sobre</a></li>
                <li><a href="<?=APPLICATION_NAME?>/Login/home" class="tx-grey5">Login</a></li>
            </ul>
        </div>
    </div>
</nav>

<main style="margin-bottom: 65px;">
    <div class="container">
        <div class="row">
            <div class="col s12 m12 l12">
                <h5 class="header">Manual</h5>

                <p>A seguir, apresentamos o manual de utilização da plataforma de correções de provas automzatiza (aplicativo mobile e portal) Gabart.io</p>

                <ul class="collapsible">
                    <li>
                        <div class="collapsible-header"><i class="material-icons">desktop_windows</i>Portal WEB</div>
                        <div class="collapsible-body">
                    <span>
                        <ul class="collapsible">
                            <li>
                                <div class="collapsible-header">Reset de Senha</div>
                                <div class="collapsible-body">
                                    <p>
                                        Para realizar o reset de senha para acesso a aplicação, na página inicial, clique no link ‘Esqueceu a senha?’
                                    </p>

                                    <img class="materialboxed" width="500" src="<?=APPLICATION_NAME?>/assets/img/Guide/img_1.png">

                                    <p>
                                        Você será direcionado para a página de reset de senha.
                                        Informe qual o e-mail que está associado ao seu usuário. Será direcionado para seu e-mail a nova senha da aplicação.
                                    </p>

                                    <img class="materialboxed" width="500" src="<?=APPLICATION_NAME?>/assets/img/Guide/img_2.png">

                                    <p>
                                        <b class="tx-red">Observação 1:</b> Verifique se o e-mail com a nova senha não se encontra na caixa de Spam (Lixo Eletrônico)
                                        <b class="tx-red">Observação 2:</b> Caso o e-mail não esteja associado ao usuário, a aplicação informará que o usuário não foi localizado
                                    </p>

                                    <img class="materialboxed" width="500" src="<?=APPLICATION_NAME?>/assets/img/Guide/img_3.png">

                                </div>
                            </li>

                            <li>
                                <div class="collapsible-header">Gráficos</div>
                                <div class="collapsible-body">
                                    <p>
                                        Após conectar com o aplicativo, será apresentado a tela de gráficos sendo divididos em:
                                    </p>

                                    <p>
                                        Nota P1 x P2
                                    </p>
                                    <img class="materialboxed" width="500" src="<?=APPLICATION_NAME?>/assets/img/Guide/img_4.png">

                                    <p>
                                       Comparativo entre turmas
                                    </p>
                                    <img class="materialboxed" width="500" src="<?=APPLICATION_NAME?>/assets/img/Guide/img_5.png">

                                    <p>
                                       Média da turma
                                    </p>
                                    <img class="materialboxed" width="500" src="<?=APPLICATION_NAME?>/assets/img/Guide/img_6.png">

                                    <p>
                                       Acertos por questão de acordo com a nota
                                    </p>
                                    <img class="materialboxed" width="500" src="<?=APPLICATION_NAME?>/assets/img/Guide/img_7.png">

                                </div>
                            </li>

                            <li>
                                <div class="collapsible-header">Adicionar Novo Curso</div>
                                <div class="collapsible-body">

                                    <p>
                                       Para adicionar um novo curso, é necessário que o usuário Master (Administrador) acessa o portal WEB.
                                       Clicando em Configuração, será apresentado o campo para adicionar um novo curso.
                                    </p>
                                    <img class="materialboxed" width="500" src="<?=APPLICATION_NAME?>/assets/img/Guide/img_9.png">

                                </div>
                            </li>

                            <li>
                                <div class="collapsible-header">Adicionar Nova Disciplina</div>
                                <div class="collapsible-body">

                                    <p>
                                       Para adicionar uma nova disciplina, é necessário que o usuário Master (Administrador) acessa o portal WEB.
                                        Clicando em Configuração, será apresentado o campo para adicionar uma nova disciplina.
                                    </p>
                                    <img class="materialboxed" width="500" src="<?=APPLICATION_NAME?>/assets/img/Guide/img_10.png">

                                </div>
                            </li>

                            <li>
                                <div class="collapsible-header">Trocar Senha</div>
                                <div class="collapsible-body">

                                    <p>
                                       Para realizar a troca de senha, clicar em Configuração e no campo Pasword reset, colocar a senha atual e a nova senha.
                                    </p>
                                    <img class="materialboxed" width="500" src="<?=APPLICATION_NAME?>/assets/img/Guide/img_11.png">

                                </div>
                            </li>

                            <li>
                                <div class="collapsible-header">Adicionar Professor</div>
                                <div class="collapsible-body">

                                    <p>
                                       Para criar o acesso de um professor, o usuário Master (Administrador) deverá acessar a aplicação, clicar em configura e no campo Novo Professor, informar o Nome e o E-mail do professor.
                                        O nome de usuário será criado automaticamente assim que o administrador terminar de preencher o nome.
                                    </p>
                                    <img class="materialboxed" width="500" src="<?=APPLICATION_NAME?>/assets/img/Guide/img_12.png">

                                    <p>
                                       Finalizando o preenchimento, será enviado para o e-mail do professor o usuário e senha criado.
                                    </p>

                                </div>
                            </li>

                            <li>
                                <div class="collapsible-header">Gerenciamento de Turma</div>
                                <div class="collapsible-body">

                                    <p>
                                       No gerenciamento de turma, o professor adicionará a turma que está sendo iniciada.
                                    </p>
                                    <img class="materialboxed" width="500" src="<?=APPLICATION_NAME?>/assets/img/Guide/img_13.png">

                                    <p>
                                       Para adicionar uma nova turma no portal, clique no botão ‘+’ presente no canto inferior esquerdo.
                                        Selecione qual o ‘Nome da Disciplina’, ‘Nome do Curso’ e o ‘Período’ que essa turma pertence.
                                    </p>
                                    <img class="materialboxed" width="500" src="<?=APPLICATION_NAME?>/assets/img/Guide/img_14.png">

                                    <p>
                                        <b class="tx-red">Observação 1:</b> O ano, semestre serão preenchidos automaticamente de acordo com a data atual.
                                    </p>
                                    <p>
                                       Clicando no botão ‘Deletar’, será apresentado uma pergunta para confirmar a exclusão da turma.
                                    </p>

                                    <img class="materialboxed" width="500" src="<?=APPLICATION_NAME?>/assets/img/Guide/img_15.png">

                                </div>
                            </li>

                            <li>
                                <div class="collapsible-header">Gerenciamento de Aluno</div>
                                <div class="collapsible-body">

                                    <p>
                                       Na página de gerenciamento de aluno, o professor irá cadastrar o aluno e associar a sua respectiva turma/disciplina que foi criada anteriormente.
                                    </p>
                                    <img class="materialboxed" width="500" src="<?=APPLICATION_NAME?>/assets/img/Guide/img_16.png">

                                    <h5 class="header">Novo Aluno</h5>
                                    <p>
                                        Para adicionar um novo Aluno, clique no botão ‘+’ presente no canto inferior esquerdo da tela.
                                        Na página seguinte, informar qual o nome do aluno e o RA. Caso deseje adicionar mais de um aluno.
                                    </p>
                                    <img class="materialboxed" width="500" src="<?=APPLICATION_NAME?>/assets/img/Guide/img_17.png">
                                    <p>
                                        Clicando no botão ‘+’ azul presente do lado do campo RA Aluno, será adicionado mais um campo para adicionar mais de um aluno simultaneamente.
                                    </p>
                                    <img class="materialboxed" width="500" src="<?=APPLICATION_NAME?>/assets/img/Guide/img_18.png">

                                    <h5 class="header">Excluir Aluno</h5>
                                    <p>
                                        Para realizar a exclusão de um aluno, clique no botão ‘Deletar’. Será apresentada uma mensagem de confirmação.
                                    </p>
                                    <img class="materialboxed" width="500" src="<?=APPLICATION_NAME?>/assets/img/Guide/img_19.png">

                                    <h5 class="header">Associando Disciplina</h5>
                                    <p>
                                        Para associar uma disciplina, clique no botão ‘Disciplina’ e na tela que é apresentada, selecione o nome da Disciplina, Nome do Curso e o Período.
                                        O aluno será associado a turma criada para aquela disciplina anteriormente.
                                    </p>
                                    <img class="materialboxed" width="500" src="<?=APPLICATION_NAME?>/assets/img/Guide/img_20.png">

                                    <p>
                                        <b class="tx-red">Observação 1:</b> Caso não tenha sido criado uma Turma que associe a disciplina ao curso e ao período informado, o portal apresentará uma mensagem de erro.
                                    </p>

                                    <p>
                                        Para que a associação de Disciplina/Aluno ocorra, será necessário criar uma Turma para essa Disciplina associada ao Curso e Período informado.
                                    </p>

                                    <img class="materialboxed" width="500" src="<?=APPLICATION_NAME?>/assets/img/Guide/img_21.png">

                                    <h5 class="header">Editar/Visualizar Disciplinas</h5>
                                    <p>
                                        Para visualizar as disciplinas associadas ao Aluno, clique no botão ‘Editar’.
                                        Será apresentado na tela as informações do aluno e clicando em ‘Disciplinas’, serão apresentadas todas as matérias associadas ao aluno.
                                    </p>
                                    <img class="materialboxed" width="500" src="<?=APPLICATION_NAME?>/assets/img/Guide/img_22.png">
                                    <img class="materialboxed" width="500" src="<?=APPLICATION_NAME?>/assets/img/Guide/img_23.png">

                                    <p>
                                        Para retirar a associação do aluno a alguma matéria, clique no botão ‘Deletar’.
                                    </p>

                                    <h5 class="header">Visualizar Notas</h5>
                                    <p>
                                        Para visualizar as notas do aluno, clique em Editar >> Disciplina >> Notas. Serão apresentadas as notas do aluno para aquela matéria.
                                    </p>
                                    <img class="materialboxed" width="500" src="<?=APPLICATION_NAME?>/assets/img/Guide/img_24.png">

                                    <h5 class="header">Export Notas</h5>
                                    <p>
                                        Para realizar o export das notas dos alunos, clique no botão presente na parte inferior direita e na tela que está sendo apresentada, informe qual a Disciplina, Nome do Curso, Período, Ano e Semestre.
                                    </p>
                                    <img class="materialboxed" width="500" src="<?=APPLICATION_NAME?>/assets/img/Guide/img_25.png">


                                </div>
                            </li>

                            <li>
                                <div class="collapsible-header">Gerenciamento de Prova</div>
                                <div class="collapsible-body">

                                    <p>
                                        Na página de gerenciamento de prova, o professor irá cadastrar suas provas e associar a sua respectiva turma/disciplina que foi criada anteriormente.
                                    </p>
                                    <img class="materialboxed" width="500" src="<?=APPLICATION_NAME?>/assets/img/Guide/img_26.png">


                                    <h5 class="header">Nova prova</h5>
                                    <p>
                                        Para cadastrar uma nova prova, clique no botão ‘+’ presente no canto inferior esquerdo.
                                        Na tela que está sendo apresentada, informe:

                                        <ul>
                                            <li>Data da prova</li>
                                            <li>Prova Oficial</li>
                                            <li>Nome da Disciplina</li>
                                            <li>Nome do Curso</li>
                                            <li>Período</li>
                                            <li>Semestre</li>
                                            <li>Quantidade de Questões</li>
                                            <li>Quantidade Alternativas</li>
                                        </ul>
                                    </p>

                                    <img class="materialboxed" width="500" src="<?=APPLICATION_NAME?>/assets/img/Guide/img_27.png">

                                    <p>
                                        Após preencher essas informações, clicar primeiro no botão ‘Gerar’. Na parte inferior será criado os campos para informar qual a alternativa correta para aquela respectiva questão e o peso da mesma.
                                    </p>

                                    <img class="materialboxed" width="500" src="<?=APPLICATION_NAME?>/assets/img/Guide/img_28.png">

                                    <p>
                                        No final será apresentado qual o peso total da prova. O sistema está configurado apenas para salvar a prova se o a ‘Nota Total da Prova’ for correspondente a 10.00
                                    </p>

                                    <h5 class="header">Visualizar Gabarito</h5>
                                    <p>
                                        Para visualizar o gabarito criado, clique no botão ‘Gabarito’
                                    </p>
                                    <img class="materialboxed" width="500" src="<?=APPLICATION_NAME?>/assets/img/Guide/img_29.png">

                                    <p>
                                        Clicando no botão ‘Gerar Gabaritos’, será criado todos os gabaritos dos alunos correspondentes a Turma que foi associada com o QR code com as informações do aluno e da prova que serão scaneados pelo professor.
                                    </p>
                                    <img class="materialboxed" width="500" src="<?=APPLICATION_NAME?>/assets/img/Guide/img_30.png">
                                    <p>
                                        No final da página será apresentado o botão ‘Imprimir’.
                                    </p>

                                </div>
                            </li>
                        </ul>
                    </span>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">phone_android</i>Aplicativo Android</div>
                        <div class="collapsible-body">
                            <span>
                                <ul class="collapsible">
                                    <li>
                                        <div class="collapsible-header">Donwload e instalação do aplicativo</div>
                                        <div class="collapsible-body">
                                            <p>
                                                <ul>
                                                    <li>1. Acesse o portal através do dispositivo móvel</li>
                                                    <li>2. No menu lateral clique em Donwloads</li>
                                                    <li>3. Baixe o APK</li>
                                                    <li>4. Toque no arquivo para instalar</li>
                                                </ul>
                                            </p>
                                            <p>
                                                <b class="tx-red">Observação:</b> Pode ser necessário habilitar “aplicações de terceiros” nas configurações do aparelho.
                                            </p>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="collapsible-header">Login</div>
                                        <div class="collapsible-body">
                                            <p>
                                                <ul>
                                                    <li>1. Acesse o Aplicativo através de um dispositivo móvel</li>
                                                    <li>2. Informe seu usuário ou e-mail cadastrado</li>
                                                    <li>3. Informe a senha</li>
                                                </ul>
                                            </p>

                                            <img class="materialboxed" width="500" src="<?=APPLICATION_NAME?>/assets/img/Guide/app_img_31.png">

                                            <p>
                                                <b class="tx-red">Observação:</b> Caso a senha esteja incorreta, acesse o portal Web para recuperação de senha.
                                            </p>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="collapsible-header">Corrigir Prova</div>
                                        <div class="collapsible-body">
                                            <p>
                                                <ul>
                                                    <li>•	Selecione a opção “Corrigir Prova” no menu principal</li>
                                                </ul>
                                            </p>

                                            <img class="materialboxed" width="500" src="<?=APPLICATION_NAME?>/assets/img/Guide/app_img_32.png">

                                            <p>
                                                <ul>
                                                    <li>•	Faça a leitura do QR Code presente no topo da folha de rosto da prova do aluno. A aplicação irá abrir a câmera do dispositivo nessa etapa</li>
                                                    <li>•	Confirme as informações</li>
                                                </ul>
                                            </p>

                                            <img class="materialboxed" width="500" src="<?=APPLICATION_NAME?>/assets/img/Guide/app_img_33.png">

                                            <p>
                                                <ul>
                                                    <li>•	Faça a leitura do gabarito do aluno, tirando uma foto da área de respostas. A borda preta ao redor do gabarito deve estar presente na imagem</li>
                                                    <li>•	Clique em “Analisar”</li>
                                                </ul>
                                            </p>

                                            <img class="materialboxed" width="500" src="<?=APPLICATION_NAME?>/assets/img/Guide/app_img_34.png">

                                            <p>
                                                <ul>
                                                    <li>•	Confirme se todas as alternativas aparecem realçadas na imagem. Caso alguma alternativa esteja faltando, clique na opção “Voltar”. Se tudo estiver certo, clique em “Confirmar”</li>
                                                </ul>
                                            </p>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="collapsible-header">Enviar Respostas</div>
                                        <div class="collapsible-body">
                                            <p>
                                                O sistema irá apresentar os dados lidos pelo QR Code, as alternativas detectadas e a nota calculada.
                                            </p>

                                            <img class="materialboxed" width="500" src="<?=APPLICATION_NAME?>/assets/img/Guide/app_img_35.png">

                                            <p>
                                                Clique em “Enviar” para salvar as informações no portal. Um pop-up irá aparecer para informar se o envio foi realizado com sucesso.
                                            </p>

                                            <img class="materialboxed" width="500" src="<?=APPLICATION_NAME?>/assets/img/Guide/app_img_36.png">

                                            <p>
                                                Após essa tela, o usuário deverá voltar para o Menu, e poderá repetir o procedimento quantas vezes for necessário.
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</main>

<footer class="page-footer t-io-blue darken-4" style="bottom: 0; position: fixed; width: 100%;">
    <div class="footer-copyright">
        <div class="container center">
            Copyright © <?php echo date('Y'); ?> - Gabarit.IO
        </div>
    </div>
</footer>

<!--  Scripts-->
<script src="<?=APPLICATION_NAME?>/assets/js/Core/materialize.min.js"></script>
<script src="<?=APPLICATION_NAME?>/assets/js/Core/jquery-3.3.1.min.js"></script>
<script src="<?=APPLICATION_NAME?>/assets/js/Core/jquery-ui.js"></script>
<script>
    var sidenav = document.querySelectorAll('.sidenav');
    M.Sidenav.init(sidenav);

    var colls = document.querySelectorAll('.collapsible');
    M.Collapsible.init(colls);
</script>

</body>
</html>
