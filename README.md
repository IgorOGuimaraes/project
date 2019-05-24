# GABARIT.IO - PLATAFORMA WEB PARA CORREÇÃO DE PROVAS


Arthur Hideyuki Miada da Silva

Igor de Oliveira Guimarães

Matheus Martins Bueno


**Orientadora:** Jediane Teixeira de Sousa 

## RESUMO
Este trabalho propõe o desenvolvimento de uma plataforma Web para gerenciamento de notas de
alunos, integrada com uma aplicação móvel para correção automatizada de provas na modalidade
avaliação objetiva. O objetivo dessa pesquisa é criar um protótipo de ferramenta que possa ser
utilizado pelo corpo docente para agilizar o processo de correção de gabaritos de provas, reduzindo
tempo e aumentando a precisão, além de auxiliar o professor na gestão de seus alunos, através de
métricas apresentadas na plataforma. Para isso, foi necessário realizar um levantamento
bibliográfico quanto às tecnologias adequadas para o desenvolvimento do protótipo e os tipos de
avaliação para as quais, essa aplicação é viável. A estrutura desse trabalho inclui referencial teórico
sobre métodos de avaliação, desenvolvimento de aplicações e linguagens Web, fases do
desenvolvimento da aplicação e da plataforma, conclusões e referencial bibliográfico. As tecnologias
utilizadas para desenvolver o projeto foram: Android Studio, MySQL, Python, PHP, JavaScript, HTML
e CSS. Por fim, são apresentadas as considerações finais da pesquisa.

Palavras-chave:
>>*Correção de Provas Automatizada. Métodos Avaliativos. Gestão Acadêmica.
Plataforma Web Educacional.*

## ABSTRACT
This work proposes the development of a Web platform for student’s grade management, integrated
with a mobile application for automated test correction, in objective evaluation mode. The main goal
of this research is to build a tool prototype that can be used by teachers to speed up the process of
test template sheet correction, reducing time and improving precision, helping teachers to manage
their students through statistics shown on the Web platform. For this, was necessary to realize a
bibliography research on evaluation methods and proper technologies for prototype development.
This work structure has theoretical references about evaluation methods, mobile application
development, Web programming languages, software development phases, conclusions, and
bibliography. The main technologies used in this project development were: Android Studio, MySQL,
Python, PHP, JavaScript, HTML, and CSS. Lastly, the research ending considerations are presented.

Keywords: 
>>*Automated Test Correction. Evaluation Methods. Academic Management. Web
Educational Platform.*

## INTRODUÇÃO
Buscando fomentar o uso de novas tecnologias na educação, este projeto visa o
desenvolvimento de uma plataforma Web integrada a um aplicativo móvel que auxilie o docente na
correção de provas, no gerenciamento de notas e acompanhamento do rendimento dos alunos. Com
foco nas avaliações objetivas, ou seja, as provas compostas por questões de múltipla escolhe e/ou
verdadeiro ou falso, essa ferramenta apoiará o professor na automatização do processo de correção.
O diferencial dessa plataforma está no uso de inteligência artificial para correção das provas. Além
disso, o fato de ser disponibilizado via Web, possibilita que o professor tenha acesso a dados
estatísticos sobre sua turma e acompanhe o desenvolvimento dos alunos durante o semestre,
podendo analisar resultados ao longo do tempo.

## FUNDAMENTAÇÃO TEÓRICA
A fundamentação teórica dessa pesquisa é dividida nos seguintes itens: Ferramentas
tecnológicas e a educação, Métodos avaliativos, Ferramentas de gestão escolar, Inteligência artificial
(IA), Android, Banco de dados, QR Code e Linguagens de Programação. O item referente a
linguagens de programação, traz as definições de HTML, PHP, CSS, JavaScript, JSON, Python, Java
Android e MySQL.

### Ferramentas tecnológicas e a educação
Conforme NASCIMENTO e ASSUNÇÂO (2012), a utilização de novas tecnologias de
informação e comunicação trazem contribuições à prática escolar em qualquer nível de ensino. Com
base nisso, a formação dos educadores deve incluir uma reflexão sobre a relação entre teoria e
prática, e propiciar a experimentação de novas alternativas pedagógicas, como por exemplo o uso
de computadores.
Para o Departamento de Educação dos Estados Unidos (U.S. DEPARTMENT OF EDUCATION,
2017) a tecnologia oferece uma oportunidade para os professores se tornarem colaboradores e
estender o aprendizado para além da sala de aula. Educadores podem criar comunidades de
estudantes, unindo escolas, museus, livrarias, programas extracurriculares, contar com a ajuda de
especialistas ao redor do mundo, membros de outras organizações estudantis e as famílias.

### Métodos avaliativos
O termo avaliação vai muito além de uma prova com questões abertas e fechadas. Avaliar é
um método para adquirir e processar evidências necessárias para melhorar a aprendizagem do
aluno, um instrumento de prática educativa que permite estabelecer a eficácia das várias
intervenções do professor, ajuda a esclarecer quais são as metas e os objetivos mais importantes da
educação e determinar o grau de evolução dos alunos (ZANON e FREITAS, 2007 apud SILVA,
MATOS e ALMEIDA, 2014).
Do ponto de vista da Pedagogia, a avaliação pode ser definida tanto como um julgamento
de valor sobre a realidade, com foco em uma tomada de decisão (LUCKESI, 1995 apud ANGÉLICA,
2017) como uma dimensão mensurável do comportamento (do avaliado) em relação a um padrão
social ou científico (BRADFIELD e MOREDOCK, 1957 apud ANGÉLICA, 2017).
Segundo Ballester (2003, apud SILVA, 2018) a avaliação de aprendizagem é um processo
de três etapas: coleta de informações; análises e conclusões acerca das informações; tomada de
decisões a partir dos resultados. Essas etapas não podem ser tratadas como funções meramente
administrativas, uma vez que elas têm caráter social de seleção e classificação dos alunos e função
pedagógica quanto à observação de ajustes a serem realizados no processo de ensino.
Conforme Angélica (2017), a avaliação educacional segue as bases legais da educação.
Entre os seus princípios, estão: o princípio de diagnóstico da avaliação de aprendizagem, que mede
o desempenho do aluno, o princípio da qualificação, que reflete o que é necessário ser ensinado e o
princípio processual e formativo, que são atividades, projetos e sequências didáticas, onde podem
ser aplicados instrumentos avaliativos.

### Ferramentas de gestão escolar
As ferramentas de gestão escolar são um ponto importante na profissionalização das
instituições de ensino. Elas são responsáveis por definir boas práticas, gerando economia de tempo,
crescimento, saúde financeira e melhoria da qualidade de ensino. Sobre as ferramentas
informatizadas, vale ressaltar que uma gestão escolar eficiente pode não ser possível com tarefas e
controles manuais. (WPENSAR, 2018).
Focando na qualidade de ensino, a gestão de notas é um importante indicador. As notas
também podem apresentar cenários onde são necessárias correções, como planejamento de aulas
de recuperação, mudanças na grade e até na própria forma de avaliação (ESCOLAWEB, 2018).

### Inteligência artificial e Visão Computacional
Segundo McCarthy (2007), inteligência artificial (IA) também pode ser definida como a
ciência e engenharia de fazer máquinas inteligentes, especialmente programas inteligentes de
computador. Essa ciência é uma tarefa semelhante a usar computadores para entender a
inteligência humana, mas sem os fatores biológicos envolvidos. A pesquisa de IA pode ser dividida
nos seguintes ramos: IA lógica, busca, reconhecimento de padrões, representação, conhecimento e
raciocínio de senso comum, aprendizado por experiência, planejamento, epistemologia, ontologia,
heurística e programação genética.
Para Kaehlar e Bradski (2017), visão computacional é a transformação de dados de uma
imagem estática ou vídeo em decisões ou novas representações. Por decisões, entende-se que o
sistema deve categorizar o que está presente nesses dados, como por exemplo, identificar que há
uma pessoa na foto. Por novas representações, entende-se transformação dos dados, seja tornando
a imagem em tons de cinza ou retirando um quadro (frame) de um vídeo.
Já HUANG (1996), um dos pioneiros na área, define visão computacional como sistemas
autônomos que possuam a mesma capacidade de visão, ou melhor, do que um ser humano. Ainda
segundo o autor, uma das tarefas mais comuns dessa ciência, é a extração de modelos
tridimensionais em determinado tempo, através da captura de imagens, como uma fotografia, ou
um vídeo.

### Android
Segundo Lecheta (2016) o Android é a primeira plataforma para aplicações móveis open
source, ou seja, de código aberto. Esse fator é tratado como uma grande vantagem competitiva
uma vez que empresas e desenvolvedores podem contribuir para melhorar a plataforma. Outro
aspecto vantajoso se dá por conta das fabricantes de smartphones não precisarem pagar para
utilizar o sistema operacional.

### Banco de Dados
Um sistema de banco de dados consiste em um conjunto de informações que se relacionam,
como por exemplo, uma lista telefônica, que armazena os nomes, números de telefones e endereços
das pessoas que moram em uma região específica (BEAULIEU, 2010).
Para se caracterizar como um banco de dados, as informações armazenadas devem possuir
uma finalidade, características específicas e serem organizados e armazenados em tabelas
específicas. Um banco de dados por definição trará sempre informações relacionadas com
determinado contexto, possuindo restrições pré-estabelecidas baseados em seus usuários e nos
cenários em que será empregado (ELMASRI e NAVATHE, 2010).

### QR Code
A Denso ADC (2011), criadora do QR Code (Quick Response Code, ou código de resposta
rápida), define seu produto como uma matriz bidimensional, capaz de ser lida e interpretada por
equipamentos (scaners ou câmeras), da mesma família do código de barras. A grande diferença
entre um código de barras tradicional (encontrado na embalagens de produtos de mercado),
também conhecido como unidimensional (1D) e o QR Code (2D) é a quantidade de informações que 
pode ser armazenada, uma vez que os códigos de barra armazenam dados apenas na horizontal,
enquanto o QR Code é lido como uma matriz, com dados na vertical e horizontal.

### Linguagens de programação
**HTML:** Linguagem de Marcação de HiperTexto. É o componente mais básico da Web e serve
para definir a estrutura básica de uma página Web. Podemos definir “HiperTexto” como hyperlinks,
ou seja, ligações que conectam uma página a outra, podendo ser dentro do mesmo Website ou sites
diferentes. Já a Marcação refere-se aos elementos especiais, denominados tags, que controlam a
estrutura alterando o modo como os navegadores exibem o conteúdo (MOZILLA, 2018).

**PHP:** Acrônimo recursivo para PHP: Hypertext Preprocessor, é uma popular linguagem script
de propósito generalista, adaptada especialmente para desenvolvimento WEB. A principal diferença
entre o PHP e o JavaScript, é que que o código é executado pelo servidor, que gera o HTML e envia
de volta para o navegador. Dessa forma, o código fonte fica oculto para o usuário, que apenas
receberá os resultados da execução do script (PHP, 2018).

**CSS:** Segundo a W3Schools (2019), CSS é definido inicialmente como uma sigla para Folha
de Estilos em Cascata. Essa folha de estilos descreve o comportamento de como os elementos de
HTML serão apresentados na tela. Sua principal função é armazenar os estilos de uma página web
em um arquivo externo ao HTML, em um arquivo denominado .css, que pode ser usado em diversas
páginas e otimizar o trabalho.

**JavaScript:** Segundo a fundação Mozilla (2018), JavaScript é uma linguagem de
programação que permite a implementação de itens completos em páginas Web, mostrando
conteúdos que se atualizam em um intervalo de tempo, mapas interativos ou gráficos 2D/3D
animados.

**JSON:** JavaScript Object Notation – Notação de Objetos JavaScript, é um tipo de formatação
para troca de dados. Também normatizado pela ECMA, o JSON é um formato de texto que utiliza
convenções de várias linguagens (C, C++, C#, Java, JavaScript, Perl, Python, entre outras) para
fácil troca de dados entre aplicações (JSON, 2019).

**Python:** é uma linguagem de programação interpretada, orientada a objetos e de alto nível,
com semântica dinâmica. Sua principal característica são suas estruturas de dados integradas, que
permitem digitação dinâmica, atrativa para rápido desenvolvimento de aplicações. Também pode ser
utilizada para conectar componentes já existentes dentro de um produto de software. Python
também tem suporte a módulos e pacotes (PYTHON SOFTWARE FOUNDATION, 2019).

**Java Android:** Segundo Shetye (2014) e Lecheta (2016), a linguagem utilizada para
desenvolvimento Android é o Java. A diferença nesse caso, é que o sistema operacional Android não
possui uma máquina virtual Java (JVM), utilizando então, uma máquina virtual chamada Dalvik, que
é otimizada para dispositivos móveis. A partir do Android 4.4 (KitKat), foi criada a máquina virtual
ART (Android Runtime), com objetivo de substituir o Dalvik. Essa substituição se tornou o padrão a
partir do Andoid 5.0 (Lollipop), e se mantém até a versão atual 8.0 (Oreo).

**MySQL:** Segundo a Oracle Corporation, atual proprietária, MySQL é uma abreviação para My
Structured Query Language, ou Minha Linguagem de Busca Estruturada. É um sistema de
gerenciamento de banco de dados relacional de licença livre (Open Source), inicialmente lançado em
1995 (MYSQL DOCUMENTATION, 2019). É atualmente o sistema de gerenciamento de banco de
dados open source mais utilizado, distribuído e suportado pela Oracle. Foi escrito a maior parte em
C++ e possui uma grande base de código e de novos desenvolvedores, com cerca de 152
desenvolvedores trabalharam no código aberto do MySQL nos últimos 12 meses (OPENHUB, 2019).


## METODOLOGIA
Trata-se de uma pesquisa aplicada, com vistas ao desenvolvimento de um protótipo de uma
plataforma Web integrada a uma aplicação móvel. Têm caráter explicativo e foi concebida a partir
do método hipotético-dedutivo.
Quanto aos procedimentos técnicos (metodologia da pesquisa), este trabalho pode ser
classificado como: pesquisa bibliográfica, com a discussão das contribuições de autores da área;
pesquisa experimental, com vistas ao desenvolvimento de um produto tecnológico.

##DESENVOLVIMENTO DO TRABALHO
Durante a fase de ideias para a aplicação e a plataforma, foi definido o nome Gabarit.io por
incluir uma referência clara aos gabaritos e incluir a extensão .io que é comumente utilizada em
domínios na web relacionados a tecnologia. A Figura 1 traz o logo desenvolvido para o projeto.
A prototipagem desse projeto está dividida em duas grandes áreas: a plataforma web
educacional, e o aplicativo móvel.
O site foi desenvolvido com as linguagens web mais utilizadas no mercado, conforme
levantado na fundamentação teórica. Primeiramente foram utilizados HTML e CSS para estruturação
e base de design para a plataforma, e em um segundo momento, foram incluídas as páginas em
PHP para iniciar a comunicação com o banco de dados.
Nesse momento, também foi definido o servidor de hospedagem para armazenamento do
site e do banco de dados. Foi escolhido o Infinity Free por atender à necessidade de um site
dinâmico. A etapa seguinte foi o upload do projeto do Github para manter um repositório de backup.
Além dessa função, o repositório online permite que todos os membros do grupo acessem as
diversas pastas de arquivos e componentes durante o desenvolvimento.
Com a estrutura das páginas criada, iniciou-se o processo de aplicação do design, utilizando
as bibliotecas em CSS do Materialize.css. O processo é semelhante a utilização de um arquivo .css
convencional, mas com uma série de estilos pré-formatados e prontos para utilização, formando um
design limpo, nos padrões de diversas aplicações atuais.
Realizado a criação, estruturação e design das páginas, iniciou-se a fase de testes da
plataforma. O intuito dessa etapa é validar cada componente individualmente. Foram avaliados:
adição e remoção de matérias, adição e remoção de alunos, criação e exclusão de provas, geração
do QR Code para provas, consultas do banco de dados para gráficos do dashboard.
Com todos os componentes integrados, passou-se a desenvolver a lógica para correção das
provas. Nessa fase, integrou-se a criação de provas com a consulta do banco de dados, onde o
algoritmo de validação dos resultados foi incluso.
Esse algoritmo foi escrito em JavaScript e sua função é ler o gabarito que o professor
preencheu ao criar a prova e comparar com as respostas do aluno, que foram digitalizadas e
enviadas através do aplicativo para o banco de dados.
A Figura 2 mostra um exemplo de uma das telas do Portal, com foco nas métricas dos
alunos, com um banco de dados fictício.
Em paralelo ao portal, seguiu-se a elaboração da aplicação móvel, baseado na linguagem
Java Android, utilizando-se da ferramenta de desenvolvimento do Google, o Android Studio, para
escrita do código e testes de compilação no próprio emulador integrado.
Antes da codificação, foi desenhado o fluxo de telas para a aplicação. Esse fluxo serviu de
guia para criação da interface e das funcionalidades dessa ferramenta, antes de estar totalmente
integrada com a plataforma. Para o protótipo, a aplicação móvel apresenta as seguintes funções: 

* Tela de login: campos para usuário e senha. 
* Menu principal: botões para Corrigir Prova, Ir para o Portal e Ajuda. 
* Ir para o Portal: abre o navegador do dispositivo e direciona para a página principal do
Portal. 
* Correção de Prova: permite a leitura do QR Code e leitura do gabarito. Após essa tela, o usuário será direcionado para tela de Envio. 
* Enviar: Permite enviar o gabarito corrigido e as notas obtidas para o portal. 
* Ajuda: Dividido em seções de como utilizar a plataforma e como utilizar o portal.

Definido o fluxo de telas, iniciou-se o desenvolvimento da interface dentro do Android
Studio. Nessa primeira etapa, o foco foi quanto a usabilidade e navegação, movimentando entre as
funções e menus.
Na segunda etapa do desenvolvimento do aplicativo, iniciou-se os testes de conexão entre o
aplicativo móvel e o banco de dados na web. Os testes seguiram a ordem: Login do usuário,
consulta das matérias, consulta das turmas, consulta dos alunos, consulta das provas, criação de
uma prova.
Para a correção da prova, principal função desenvolvida, foi criada uma tarefa em três
etapas. A primeira etapa consistiu na criação de uma prova e envio de respostas com entradas do
usuário para o banco de dados. Na segunda etapa, foi incluso o QR Code para envio das respostas
para um destinatário específico. Na terceira e última fase, foi inserido a API (Application
Programming Interface) de inteligência artificial para correção dos gabaritos através das imagens
capturadas da câmera, e então o envio para o banco.
O principal componente a ser criado para essa aplicação foi o módulo de inteligência
artificial usando a biblioteca OpenCV. Esse módulo, incluído no aplicativo móvel, é o responsável por
executar as correções, realizando operações na câmera do dispositivo e nas imagens capturadas.
Uma vez que o sistema passou a reconhecer os valores na folha, o passo seguinte foi salvar
esses valores, e preparar o envio para a plataforma. Para enviar os valores para o destinatário
correto, foi incluso nas provas impressas um QR Code único para cada aluno. Esse código é gerado
na plataforma Web, através do banco de dados preenchido pelo docente. Ao registrar um aluno em
uma turma, ele será automaticamente incluído na lista de impressão de gabaritos.
A Figura 4 traz o cabeçalho da folha de rosto gerada pela plataforma Web, trazendo as
informações do aluno, da turma, da matéria, data e o QR Code.

A principal função dessa plataforma integrada é a correção automatizada de provas. Essa
correção é realizada em duas etapas, utilizando o portal e o aplicativo móvel.
Iniciando-se no portal, o professor irá criar o gabarito para sua prova e vincular este
gabarito a um aluno. Na aplicação móvel, será realizada a leitura desse gabarito através da câmera
do dispositivo. O aplicativo processa a imagem utilizando a inteligência artificial, compara as
respostas preenchidas pelo aluno com o gabarito do professor, e então, envia as respostas para o
portal.
Nota-se que por plataforma integrada, refere-se à utilização tanto do portal através de um
navegador, quanto num dispositivo móvel com sistema operacional Android, através de uma
aplicação propriamente desenvolvida para a correção de provas.
O portal Web é responsivo, o que permite que ele seja utilizado através do dispositivo
móvel. Um botão no menu principal do aplicativo poderá ser utilizado para ir direto ao portal.
Embora funcione em ambas as plataformas, recomenda-se o uso em um navegador Web, através do
computador.

## CONSIDERAÇÕES FINAIS
A ideia inicial de criar apenas um aplicativo móvel, expandiu para o desenvolvimento de
uma plataforma integrada de acompanhamento de rendimento acadêmico. Foi então proposto para
complementar essa ferramenta, uma plataforma online no formato de portal, onde o docente possa
gerenciar as provas e as correções realizadas, além de obter métricas sobre o desempenho da
turma.
O referencial teórico levantado, foi em grande parte para o embasamento das tecnologias
utilizadas para o desenvolvimento. Foram pesquisadas várias linguagens de programação, assim
como materiais complementares e metodologias que auxiliaram na construção do protótipo.
Quanto a pesquisa acerca do tema-problema, o principal ponto a ser ressaltado é o
aumento expressivo do uso da tecnologia, especialmente móvel, por parte da sociedade. Ele
claramente se reflete no ambiente acadêmico, tanto por parte dos professores que utilizam novas
tecnologias para o ensino, como por parte dos alunos que tem maior acesso a essa tecnologia.
Com base nessas afirmações, pode-se realizar o desenvolvimento dessa plataforma sabendo
que haverá um público interessado em ao menos conhecer as inovações na área de ferramentas
educacionais. Também foi verificado a importância de trazer o usuário final para o ciclo de
desenvolvimento, ouvindo, incluindo ideias e trabalhando em cima das observações de uso.
A principal conquista obtida com esse projeto foi o desenvolvimento do protótipo funcional,
integrando tecnologia web, móvel, banco de dados e inteligência artificial para reconhecimento de
imagem. Embora o foco seja a pesquisa acadêmica, com uso dessas tecnologias é possível adaptar o
protótipo para versões comerciais, mostrando ser um produto versátil.
Avaliando as vantagens do tema escolhido, o primeiro grande ponto está no ambiente onde
o projeto foi desenvolvimento. Por ser uma ferramenta voltada para o corpo docente, o fato de o
grupo estar diariamente em contato com professores, muitos deles desenvolvedores ou entusiastas
de tecnologia, colaborou de diversas formas para coleta de sugestões, opiniões, ideias de melhorias
e aprimoramentos, sem os quais, essa aplicação poderia se distanciar do seu público alvo.
A segunda vantagem foi a escolha de plataformas abertas, o que gerou uma economia
considerável dentro do escopo do projeto. Ao focar o desenvolvimento no sistema operacional
Android, por exemplo, foi possível utilizar os dispositivos dos próprios membros do grupo para
testes.
A principal desvantagem dessa pesquisa foi a falta de informações quanto a realidade
brasileira a respeito do uso de tecnologias dentro da sala de aula. Muitos materiais encontrados se
mostraram antigos e desatualizados ou fora de contexto do projeto. Por conta disso, foi necessário a
busca de materiais em língua estrangeira, além de uma série de suposições para ligar o temaproblema
e o referencial teórico ao protótipo.
Uma vez que o projeto de pesquisa teve foco no desenvolvimento de um produto de
software, dada a necessidade de aderência ao curso, é necessária uma maior pesquisa de mercado
para entender o perfil consumidor do educador brasileiro e se este está aberto a novas ferramentas
e plataformas para apoio de suas atividades. Entende-se que o fator cultural tem grande peso sobre
qualquer decisão de nível pessoal e por isso sem maiores dados estatísticos, é impreciso afirmar o
sucesso ou fracasso da implementação de uma ferramenta acadêmica no mercado.

## REFERÊNCIAS
ANGÉLICA, Maria. O que é e quais os tipos de avaliação da aprendizagem? 2017. Disponível em:
https://canaldoensino.com.br/blog/o-que-e-e-quais-os-tipos-de-avaliacao-da-aprendizagem. Acesso
em: 29 set. 2018.

BEAULIEU, Alan. Aprendendo SQL. 2 ed. São Paulo: Novatec, 2010.
DENSO ADC. QR Code Essentials. 2011. Disponível em:
http://www.nacs.org/LinkClick.aspx?fileticket=D1FpVAvvJuo%3D&tabid=1426&mid=4802. Acesso
em: 01 mai. 2019.

ELMASRI, Ramez; NAVATHE, Shamkant B. Sistemas de Banco de Dados. 6 ed. São Paulo: Pearson,
2010.

ESCOLAWEB. Como controlar as notas dos alunos na escola?. 2018. Disponível em:
https://www.escolaweb.com.br/blog/gestao-escolar/como-controlar-as-notas-dos-alunos-naescola/.
Acesso em: 01 mai. 2019.

HUANG, T. S. Computer Vision: Evolution and Promise, 1996. Disponível em:
https://cds.cern.ch/record/400313/files/p21.pdf. Acesso em: 30 abr. 2019.

JSON. Introdução ao JSON. Disponível em: https://json.org/json-pt.html. Acesso em: 01 mai. 2019.
KAEHLER, Adrian. BRADSKI, Gary. Learning OpenCV 3. 1 ed. Estados Unidos: O’Reilly, 2017.

LECHETA, Ricardo R. Android Essencial, 2016. Disponível em:
https://s3.novatec.com.br/capitulos/capitulo-9788575224793.pdf. Acesso em: 30 abr. 2019.

MCCARTHY, John. What is artificial intelligence? 2007. Disponível em: http://wwwformal.stanford.edu/jmc/whatisai/.
Acesso em: 05 nov. 2018.

MOZILLA. JavaScript. Disponível em: https://developer.mozilla.org/ptBR/docs/Web/JavaScript/Guide/Introduction#JavaScript_and_the_ECMAScript_Specification.
Acesso
em: 02 out. 2018. ________. HTML. Disponível em: https://developer.mozilla.org/pt-BR/docs/Web/HTML. Acesso em:
03 nov. 2018.

NASCIMENTO, Maria Mazarelo do. ASSUNÇÃO, Suzana Vieira. A tecnologia como ferramenta de
trabalho na gestão escolar. 2012. Disponível em: https://administradores.com.br/artigos/atecnologia-como-ferramenta-de-trabalho-na-gestao-escolar.
Acesso em: 01 mai. 2019.

OPENHUB. MySQL. Disponível em: https://www.openhub.net/p/mysql. Acesso em: 17 fev. 2019.
PHP. O que é PHP? Disponível em: https://secure.php.net/manual/pt_BR/intro-whatis.php. Acesso
em: 04 nov. 2018.

PYTHON SOFTWARE FOUNDATION. What is Python? Disponível em:
https://www.python.org/doc/essays/blurb/. Acesso em: 17 fev. 2019.
SILVA, Carlos Teixeira da. A relevância da avaliação na aprendizagem. Disponível em:
https://www.portaleducacao.com.br/conteudo/artigos/idiomas/a-relevancia-da-avaliacao-naaprendizagem/56103.
Acesso em: 05 nov. 2018.

SILVA, Danilo S.G. da; MATOS, Poliana M. de S.; ALMEIDA, Daniel Manzoni de; Métodos avaliativos
no processo de ensino e aprendizagem: uma revisão, 2014. Disponível em:
https://periodicos.ufpel.edu.br/ojs2/index.php/caduc/article/download/4651/3497. Acesso em: 01
mai. 2019.

SHETYE, Shweta. Introduction to Java for Android Application Development. 2014. Disponível em:
https://blog.udemy.com/java-for-android/. Acesso em: 17 fev. 2019.

U.S. DEPARTMENT OF EDUCATION - OFFICE OF EDUCATIONAL TECHNOLOGY. Reimagining the Role
of Technology in Education, 2017. Disponível em: https://tech.ed.gov/files/2017/01/NETP17.pdf.
Acesso em: 05 nov. 2018.

W3SCHOOLS. CSS Introduction. Disponível em: https://www.w3schools.com/Css/css_intro.asp.
Acesso em: 17 fev. 2019.

WPENSAR. As 15 Principais Ferramentas de Gestão Escolar do mercado educacional. 2018.
Disponível em: https://blog.wpensar.com.br/gestao-escolar/ferramentas-de-gestao-escolar-15-
principais/#!. Acesso em: 01 mai. 2019.
