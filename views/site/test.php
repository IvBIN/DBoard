<?php
use dosamigos\chartjs\ChartJs;

///** @var $data_bdr */

?>

<?php
echo ChartJs::widget([
    'type' => 'pie',
    'id' => 'structurePie',
    'options' => [
        'height' => 200,
        'width' => 400,
    ],
    'data' => [
        'radius' =>  "90%",
        'labels' => ['Label 1', 'Label 2', 'Label 3'], // Your labels
        'datasets' => [
            [
                'data' => ['35.6', '17.5', '46.9'], // Your dataset
                'label' => '',
                'backgroundColor' => [
                    '#ADC3FF',
                    '#FF9A9A',
                    'rgba(190, 124, 145, 0.8)'
                ],
                'borderColor' =>  [
                    '#fff',
                    '#fff',
                    '#fff'
                ],
                'borderWidth' => 1,
                'hoverBorderColor'=>["#999","#999","#999"],
            ]
        ]
    ],
    'clientOptions' => [
        'legend' => [
            'display' => false,
            'position' => 'bottom',
            'labels' => [
                'fontSize' => 14,
                'fontColor' => "#425062",
            ]
        ],
        'tooltips' => [
            'enabled' => true,
            'intersect' => true
        ],
        'hover' => [
            'mode' => false
        ],
        'maintainAspectRatio' => false,

    ],
    'plugins' =>
        new \yii\web\JsExpression('
        [{
            afterDatasetsDraw: function(chart, easing) {
                var ctx = chart.ctx;
                chart.data.datasets.forEach(function (dataset, i) {
                    var meta = chart.getDatasetMeta(i);
                    if (!meta.hidden) {
                        meta.data.forEach(function(element, index) {
                            // Draw the text in black, with the specified font
                            ctx.fillStyle = "rgb(0, 0, 0)";

                            var fontSize = 16;
                            var fontStyle = "normal";
                            var fontFamily = "Helvetica";
                            ctx.font = Chart.helpers.fontString(fontSize, fontStyle, fontFamily);

                            // Just naively convert to string for now
                            var dataString = dataset.data[index].toString()+'%';

                            // Make sure alignment settings are correct
                            ctx.textAlign = "center";
                            ctx.textBaseline = "middle";

                            var padding = 5;
                            var position = element.tooltipPosition();
                            ctx.fillText(dataString, position.x, position.y - (fontSize / 2) - padding);
                        });
                    }
                });
            }
        }]')
])

 ?>


<!---->
<?php //= ChartJs::widget([
//    'type' => 'pie',
//    'options' => [
//        'height' => 400,
//        'width' => 400
//    ],
//    'data' => $data_bdr
////
//
// [
//        'labels' => ["January", "February", "March", "April", "May", "June", "July"],
//        'datasets' => [
//            [
//                'label' => "My First dataset",
//                'backgroundColor' => "rgba(179,181,198,0.2)",
//                'borderColor' => "rgba(179,181,198,1)",
//                'pointBackgroundColor' => "rgba(179,181,198,1)",
//                'pointBorderColor' => "#fff",
//                'pointHoverBackgroundColor' => "#fff",
//                'pointHoverBorderColor' => "rgba(179,181,198,1)",
//                'data' => [65, 59, 90, 81, 56, 55, 40]
//            ],
//            [
//                'label' => "My Second dataset",
//                'backgroundColor' => "rgba(255,99,132,0.2)",
//                'borderColor' => "rgba(255,99,132,1)",
//                'pointBackgroundColor' => "rgba(255,99,132,1)",
//                'pointBorderColor' => "#fff",
//                'pointHoverBackgroundColor' => "#fff",
//                'pointHoverBorderColor' => "rgba(255,99,132,1)",
//                'data' => [28, 48, 40, 19, 96, 27, 100]
//            ]
//        ]
//    ]
]);
?>
