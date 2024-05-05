<?php
/** @var yii\web\View $this
 * @var $data_bdr
 * @var $data_ip
 * @var $count_contract
 * @var $model
 */


//var_dump($data_bdr);
//var_dump($count_contract);
use dosamigos\chartjs\ChartJs;
use yii\widgets\ActiveForm;

$this->title = 'Главная';
?>

<div class="container">
    <div class="field_dash">
        <div class="left_part">
            <div class="input_file_block">

            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data', 'class'=>"form_input_file"]]) ?>
                <div class="input">
                    <?= $form->field($model, 'file')->fileInput(['class'=>"input_file"]) ?>
                </div>

            <button class="btn">Загрузить</button>

            <?php ActiveForm::end() ?>
            </div>

            <div class="block_charts">
                <div class="chart">
                    <h4>Договоры (БДР)</h4>
                    <div class="chart_field">
                        <?= ChartJs::widget([
                            'type' => 'pie',
                            'options' => [
                                'height' => 300,
                                'width' => 300
                            ],
                            'data' => $data_bdr
//                            'data' => [300,50,60,40,100,10,20,15]
                        ]);
//                                                var_dump($data_bdr);
                        ?>
                    </div>
                </div>

                <div class="chart">
                    <h4>Договоры (ИП)</h4>
                    <div class="chart_field">
                        <?= ChartJs::widget([
                            'type' => 'pie',
                            'options' => [
                                'height' => 300,
                                'width' => 300
                            ],
                            'data' => $data_ip
//                            'data' => [300,50,60,40,100,10,20,15]
                        ]);
                        ?>
                    </div>
                </div>
            </div>

<!--            <div class="iframeWindow"></div>-->
            <div class="block_info">
                <div class="bdr_line">
                    <div class="info_block">
                        <span><b>Договоры БДР</b></span><br>
                        <span>Заключено: <b><?php echo $count_contract[0] ?></b></span><br>
                        <span>Исполнено: <b><?php echo $count_contract[1] ?></b></span><br>
                    </div>
                    <div class="button_block">
                        <button id="buttonOpenBdr" class="btn">Раскрыть БДР</button>
                        <button id="buttonCloseBdr" class="btn">Cкрыть БДР</button>
                    </div>
                </div>

                <div class="ip_line">
                    <div class="info_block">
                        <span><b>Договоры ИП</b></span><br>
                        <span>Заключено: <b><?php echo $count_contract[2] ?></b></span><br>
                        <span>Исполнено: <b><?php echo $count_contract[3] ?></b></span><br>
                    </div>
                    <div class="button_block">
                        <button id="buttonOpenIp" class="btn">Раскрыть ИП</button>
                        <button id="buttonCloseIp" class="btn">Cкрыть ИП</button>
                    </div>
                </div>
            </div>

            <iframe id="iframe" class="active iframe" name="table_bdr" width="740" height="295"></iframe>
        </div>

        <div class="right_part">
            <div class="block_right_up">
                <h4 class="title_info">Отчеты</h4>
                <span class="title_context">Пояснение: Приказ № : Отчеты</span>
                <div class="info_graf_report1">
                    <span class="title_context title_report">ЕАЭС</span>
                    <div class="report_block">
                        <span class="report_part">I</span>
                        <span class="report_part">II</span>
                        <span class="report_part">III</span>
                        <span class="report_part">IV</span>
                    </div>
                </div>
            </div>
            <div class="block_right_medium">
                <h4 class="title_info">Налоговый мониторинг</h4>
                <span class="title_context">Пояснение: Приказ № : НМ</span>
                <div class="info_graf_control">
                    <div class="block_control">
                        <span class="title_context title_control">ПХД :</span>
                        <div class="block_part_contr">
                            <span class="control_part">1</span>
                            <span class="control_part">2</span>
                            <span class="control_part">3</span>
                            <span class="control_part">4</span>
                            <span class="control_part">5</span>
                            <span class="control_part">6</span>
                            <span class="control_part">7</span>
                            <span class="control_part">8</span>
                            <span class="control_part">9</span>
                            <span class="control_part">10</span>
                            <span class="control_part">11</span>
                            <span class="control_part">12</span>
                        </div>
                    </div>
                    <div class="block_control">
                        <span class="title_context title_control">ЭЦС :</span>
                        <div class="block_part_contr">
                            <span class="control_part">1</span>
                            <span class="control_part">2</span>
                            <span class="control_part">3</span>
                            <span class="control_part">4</span>
                            <span class="control_part">5</span>
                            <span class="control_part">6</span>
                            <span class="control_part">7</span>
                            <span class="control_part">8</span>
                            <span class="control_part">9</span>
                            <span class="control_part">10</span>
                            <span class="control_part">11</span>
                            <span class="control_part">12</span>
                        </div>
                    </div>
                    <div class="block_control">
                        <span class="title_context title_control">Акты сверки :</span>
                        <div class="block_part_contr">
                            <span class="control_part">1 квартал</span>
                            <span class="control_part">2 квартал</span>
                            <span class="control_part">3 квартал</span>
                            <span class="control_part">4 квартал</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="block_right_down"></div>
        </div>

    </div>

</div>

<script>

    let iframe = document.getElementById('iframe');
    iframe.style.display = 'none';
    let buttonOpenBdr = document.getElementById('buttonOpenBdr');
    let buttonCloseBdr = document.getElementById('buttonCloseBdr');

    let buttonOpenIp = document.getElementById('buttonOpenIp');
    let buttonCloseIp = document.getElementById('buttonCloseIp');

    buttonOpenBdr.addEventListener('click', () => {
        iframe.style.display = 'block';
        iframe.src = '/site/table-bdr';
    });

    buttonCloseBdr.addEventListener('click', () => {
        iframe.style.display = 'none';
    });

    buttonOpenIp.addEventListener('click', () => {
        iframe.style.display = 'block';
        iframe.src = '/site/table-ip';
    });

    buttonCloseIp.addEventListener('click', () => {
        iframe.style.display = 'none';
    });

</script>


<!--<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>-->
<!---->
<!--<script>-->
<!---->
<!--    /**-->
<!--     * Построение диаграммы (БДР)-->
<!--     */-->
<!---->
<!--    const ctx2 = document.getElementById('myChart2');-->
<!---->
<!--    /**-->
<!--     * Преобразование элементов полученного массива ( из PHP)-->
<!--     * из string в integer(требуемой для параметра data для диаграмм)-->
<!--     */-->
<!---->
<!--    let bdr_data = "--><?php //= json_encode($chart_bdr) ?><!--//";-->
<!--//-->
<!--//    bdr_data = bdr_data.replace(/[\[\] ]/g, '').split(',');-->
<!--//-->
<!--//    new Chart(ctx2, {-->
<!--//        type: 'pie',-->
<!--//        data: {-->
<!--//            labels: ['ТП', 'КЗ', 'Прейскурант', 'ГПК', 'ТП_в', 'КЗ_в', 'Прейскурант_в', 'ГПК_в'],-->
<!--//            datasets: [{-->
<!--//                label: 'Количество',-->
<!--//                data : bdr_data,-->
<!--//-->
<!--//                data : [300,50,60,40,100,10,20,15],-->
<!--//                backgroundColor: [-->
<!--//                    'rgb(55,56,128)',-->
<!--//                    'rgb(57,81,150)',-->
<!--//                    'rgb(27,72,105)',-->
<!--//                    'rgb(64,147,164)',-->
<!--//                    'rgb(55,56,128, 0.2)',-->
<!--//                    'rgb(15,48,154, 0.2)',-->
<!--//                    'rgb(27,72,105, 0.2)',-->
<!--//                    'rgb(64,147,164, 0.2)',-->
<!--//-->
<!--//                ],-->
<!--//                borderWidth: 1,-->
<!--//                hoverOffset: 20-->
<!--//            }]-->
<!--//        },-->
<!--//        // options: {-->
<!--//        //     scales: {-->
<!--//        //         y: {-->
<!--//        //             beginAtZero: true-->
<!--//        //         }-->
<!--//        //     }-->
<!--//        // }-->
<!--//    });-->
<!--//-->
<!--//    /**-->
<!--//     * Построение диаграммы (ИП)-->
<!--//     */-->
<!--//    const ctx3 = document.getElementById('myChart3');-->
<!--//-->
<!--//    /**-->
<!--//     * Преобразование элементов полученного массива ( из PHP)-->
<!--//     * из string в integer(требуемой для параметра data для диаграмм)-->
<!--//     */-->
<!--//-->
<!--//    let ip_data = "--><?php ////= json_encode($chart_ip) ?><!--//";-->
<!--//-->
<!--//    ip_data = ip_data.replace(/[\[\] ]/g, '').split(',');-->
<!--//    // console.log(typeof(ip_data));-->
<!--//    // console.log(ip_data)-->
<!--//-->
<!--//-->
<!--//    new Chart(ctx3, {-->
<!--//        type: 'pie',-->
<!--//        data: {-->
<!--//            label: 'Договоры (ИП)',-->
<!--//            labels: ['ТП', 'КЗ', 'Прейскурант', 'ГПК', 'ТП_в', 'КЗ_в', 'Прейскурант_в', 'ГПК_в'],-->
<!--//            datasets: [{-->
<!--//                label: 'Количество',-->
<!--//                data : ip_data,-->
<!--//-->
<!--//                // data : [300,50,60,40,100,10,20,15],-->
<!--//                backgroundColor: [-->
<!--//                    'rgb(255, 99, 132)',-->
<!--//                    'rgb(15,48,154)',-->
<!--//                    'rgb(255, 205, 86)',-->
<!--//                    'rgb(117,255,86)',-->
<!--//                    'rgb(255, 99, 132, 0.2)',-->
<!--//                    'rgb(54, 162, 235, 0.2)',-->
<!--//                    'rgb(255, 205, 86, 0.2)',-->
<!--//                    'rgb(117,255,86, 0.2)',-->
<!--//-->
<!--//                ],-->
<!--//                borderWidth: 1,-->
<!--//                hoverOffset: 20-->
<!--//            }]-->
<!--//        },-->
<!--//        // options: {-->
<!--//        //     scales: {-->
<!--//        //         y: {-->
<!--//        //             beginAtZero: true-->
<!--//        //         }-->
<!--//        //     }-->
<!--//        // }-->
<!--//    });-->
<!--//</script>-->

</div>
