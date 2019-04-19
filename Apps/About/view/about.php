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
    <title>Gabarit.IO | About</title>
    <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
    <link href="<?=APPLICATION_NAME?>/assets/css/Core/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="<?=APPLICATION_NAME?>/assets/css/Core/custom.css" type="text/css" rel="stylesheet" media="screen,projection"/>


</head>
<body>

<nav>
    <div class="nav-wrapper t-grey4">
        <div class="container">
            <a class="brand-logo hide-on-med-and-down"><img src="<?=APPLICATION_NAME?>/assets/img/thumbnail_gabiri.io_logo.png" class="responsive-img" style="height: 35px;"></a>
            <a data-target="slide-out" class="sidenav-trigger tx-grey5"><i class="material-icons">menu</i></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="<?=APPLICATION_NAME?>/About/home" class="tx-grey5">Guide</a></li>
                <li><a href="<?=APPLICATION_NAME?>/Login/home" class="tx-grey5">Login</a></li>
            </ul>
            <ul id="slide-out" class="sidenav">
                <li><a class="brand-logo"><img src="<?=APPLICATION_NAME?>/assets/img/thumbnail_gabiri.io_logo.png" class="responsive-img"></a></li>
                <li>\n</li>
                <li><a href="<?=APPLICATION_NAME?>/About/home" class="tx-grey5">Guide</a></li>
                <li><a href="<?=APPLICATION_NAME?>/Login/home" class="tx-grey5">Login</a></li>
            </ul>
        </div>
    </div>
</nav>

<main style="margin-bottom: 65px;">
    <div class="container">
        <div class="row">
            <div class="col s12 m12 l12">
                <h5 class="header">About</h5>

                <p>A evolução contínua das tecnologias da informação vem promovendo diversas mudanças na sociedade como um todo. Uma das mudanças com maior impacto foi à introdução de dispositivos móveis e computadores com capacidades de processamento maiores e de tamanho excepcionalmente menor a cada geração. Atualmente, esses dispositivos são vistos como empecilhos e muitas vezes atrapalham o desenvolvimento das atividades em classe, porém, se utilizados com propósitos definidos, podem fornecer uma poderosa ferramenta de aprendizado.</p>
                <p>Buscando intervir na integração do ensino com as novas tecnologias, este projeto visa o desenvolvimento de uma plataforma integrada Web e Mobile que auxilie o docente na correção de provas e no gerenciamento de notas e progresso dos alunos. Com foco nas avaliações objetivas, ou seja, as provas compostas por questões de múltipla escolhe e/ou verdadeiro ou falso, essa ferramenta apoiará o professor na automatização do processo de correção.</p>
                <p>Levando em consideração o tempo que o professor gasta realizando esse processo, que é repetitivo e demanda um alto nível de atenção, essa plataforma trará benefícios para o docente, que terá mais tempo para outras atividades, pessoais e acadêmicas, assim como para os discentes, que terão suas notas atribuídas mais rapidamente e com maior grau de precisão.</p>
                <p>A utilização planejada da ferramenta será conforme o seguinte procedimento: o docente utilizará o aplicativo móvel para leitura do gabarito da prova através da câmera do dispositivo. Os valores lidos são corrigidos pelo sistema integrado de Inteligência Artificial e então enviados para a plataforma Web. Essa plataforma poderá ser acessada tanto pelo dispositivo móvel quanto por um computador e nela será possível visualizar o desempenho do aluno através de gráficos e relatórios. </p>
                <p>O diferencial dessa plataforma está no uso de inteligência artificial para correção das provas. Além disso, o fato de ser integrado e disponibilizado via web, possibilita que o professor tenha acesso a dados estatísticos sobre sua turma e acompanhe o desenvolvimento dos alunos durante o semestre, podendo analisar resultados ao longo do tempo.</p>
                <p>Esta monografia compõe-se das seguintes seções: Capítulo 1 – Fundamentação Teórica, com as discussões dos autores em que se baseia o projeto sobre inteligência artificial, Android®®, tecnologias que serão utilizadas no desenvolvimento da aplicação WEB, como: HTML, JavaScript, PHP, CSS, e Banco de dados; Capítulo 2 – Metodologia, com as discussões relativas ao planejamento do trabalho; Capítulo 3 – Desenvolvimento, apresentando o passo a passo da sua consecução e os resultados; e finalmente, as Considerações Finais, com as discussões decorrentes e sugestões para futuras pesquisas.</p>

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
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems);
</script>

</body>
</html>
