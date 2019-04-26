$(document).ready(function () {

    // Grafico do comparativo entre a nota do aluno na P1 x P2
    Highcharts.chart('aluno-p1-p2', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Nota P1 x P2'
        },
        subtitle: {
            text: 'Comparativo de desempenho do aluno nas provas'
        },
        xAxis: {
            categories: [
                'Igor Guimarães'
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Notas'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Prova 1',
            data: [7.00]

        }, {
            name: 'Prova 2',
            data: [9.50]

        }]
    });

    // Comparativo entre duas turmas
    var categories = [
        'Turmas'
    ];

    Highcharts.chart('comparativo-turmas', {
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Comparativos entre Turmas'
        },
        subtitle: {
            text: 'Baseado na média das turmas'
        },
        xAxis: [{
            categories: categories,
            reversed: false,
            labels: {
                step: 1
            }
        }, { // mirror axis on right side
            opposite: true,
            reversed: false,
            categories: categories,
            linkedTo: 0,
            labels: {
                step: 1
            }
        }],
        yAxis: {
            title: {
                text: null
            },
            labels: {
                formatter: function () {
                    return Math.abs(this.value);
                }
            }
        },

        plotOptions: {
            series: {
                stacking: 'normal'
            }
        },

        tooltip: {
            formatter: function () {
                return '<b>' + this.series.name + '</b><br/>' +
                    'Média notas: ' + Math.abs(this.point.y);
            }
        },

        series: [{
            name: 'Turma A',
            data: [
                -8.30
            ]
        }, {
            name: 'Turma B',
            data: [
                9.00
            ]
        }]
    });

    // Média da turma
    Highcharts.chart('media-turma', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: 0,
            plotShadow: false
        },
        title: {
            text: 'Média Notas<br> Turma',
            align: 'center',
            verticalAlign: 'middle',
            y: 40
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y:.1f}</b>'
        },
        plotOptions: {
            pie: {
                dataLabels: {
                    enabled: true,
                    distance: -50,
                    style: {
                        fontWeight: 'bold',
                        color: 'white'
                    }
                },
                startAngle: -90,
                endAngle: 90,
                center: ['50%', '75%'],
                size: '110%'
            }
        },
        series: [{
            type: 'pie',
            name: 'Nota',
            innerSize: '50%',
            data: [
                ['Média', 8.5],
                {
                    name: 'Other',
                    y: 1.5,
                    dataLabels: {
                        enabled: false
                    }
                }
            ]
        }]
    });

    // Questões certas por questões erradas
    Highcharts.chart('questoes-certas-erradas', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Questões'
        },
        subtitle: {
            text: 'Erros e acertos'
        },
        xAxis: {
            categories: [
                '1',
                '2',
                '3',
                '4',
                '5',
                '6',
                '7',
                '8',
                '9',
                '10'
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Rainfall (mm)'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">Questão {point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Acertos',
            data: [15, 11, 3, 5, 9, 20, 12, 14, 10, 4]

        }, {
            name: 'Erros',
            data: [5, 9, 17, 15, 11, 0, 8, 6, 10, 16]

        }]
    });


});