<?php
/** @var yii\web\View $this
 * @var $data_bdr
 * @var $data_ip
 * @var $count_contract
 * @var $date_report
 * @var $model
 */

//var_dump($data_bdr);
//var_dump($count_contract);
//var_dump($date_report);

use dosamigos\chartjs\ChartJs;
use yii\widgets\ActiveForm;

$this->title = 'Главная';
?>

<div class="container">
    <div class="field_dash">
        <div class="left_part">


            <?php if (!Yii::$app->user->isGuest): ?>
                <?php if ($_SESSION['welcome']): unset($_SESSION['welcome'])?>
                    <div class="welcome_box">
                        <h1 class="welcome">Добро пожаловать в DBoard!</h1>
                    </div>
                <?php endif;?>


            <div class="input_file_block">

            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data', 'class'=>"form_input_file"]]) ?>
                <div class="input">
                    <?= $form->field($model, 'file')->fileInput(['class'=>"input_file"]) ?>
                </div>

            <button class="btn">Загрузить</button>

            <?php ActiveForm::end() ?>
            </div>
            <?php endif;?>

            <iframe id="iframe2" class="active iframe2" name="comment" width="295" height="749"></iframe>

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
<!--            <iframe id="iframe2" class="active iframe2" name="comment" width="295" height="795"></iframe>-->
        </div>

        <div class="right_part">
            <div class="block_right_up">
                <h4 class="title_info">Отчеты</h4>
                <span class="title_context">Пояснение: Приказ № : Отчеты</span>
                <div class="info_graf_report1">
                    <span class="title_context title_report">ЕАЭС</span>
                    <div class="report_block">
                        <div class="report_parts">
                            <span class="report_part">I</span>
<!--                            <span class="rep_date">--><?php //echo $date_report[0]?><!--</span>-->
                            <span class="report_part rep_date"><?php echo $date_report[0]?></span>
                        </div>
                        <div class="report_parts">
                            <span class="report_part">II</span>
                            <span class="report_part rep_date"><?php echo $date_report[1]?></span>
                        </div>
                        <div class="report_parts">
                            <span class="report_part">III</span>
                            <span class="report_part rep_date"><?php echo $date_report[2]?></span>
                        </div>
                        <div class="report_parts">
                            <span class="report_part">IV</span>
                            <span class="report_part rep_date"><?php echo $date_report[3]?></span>
                        </div>

<!--                        <span class="report_part">II</span>-->
<!--                        <span class="report_part">III</span>-->
<!--                        <span class="report_part">IV</span>-->
<!--                    </div>-->
<!--                    <div class="report_date_block">-->
<!--                        <span class="report_part rep_date">--><?php //echo $date_report[0]?><!--</span>-->
<!--                        <span class="report_part rep_date">--><?php //echo $date_report[1]?><!--</span>-->
<!--                        <span class="report_part rep_date">--><?php //echo $date_report[2]?><!--</span>-->
<!--                        <span class="report_part rep_date">--><?php //echo $date_report[3]?><!--</span>-->
<!--                    </div>-->
                </div>
            </div>
            <div class="block_right_medium">
                <h4 class="title_info">Налоговый мониторинг</h4>
                <span class="title_context">Пояснение: Приказ № : НМ</span>
                <div class="info_graf_control">
                    <div class="block_control">
                        <span class="title_context title_control">Проверка предоставленных документов:</span>
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
                        <span class="title_context title_control">Экономическая целесообразность сделки:</span>
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
                            <span class="control_part qartal">1 квартал</span>
                            <span class="control_part qartal">2 квартал</span>
                            <span class="control_part qartal">3 квартал</span>
                            <span class="control_part qartal">4 квартал</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="block_right_down"></div>
        </div>

    </div>

</div>

<script>

    // let iframe = document.getElementById('iframe');
    // iframe.style.display = 'none';
    // let buttonOpenBdr = document.getElementById('buttonOpenBdr');
    // let buttonCloseBdr = document.getElementById('buttonCloseBdr');
    //
    // let buttonOpenIp = document.getElementById('buttonOpenIp');
    // let buttonCloseIp = document.getElementById('buttonCloseIp');
    //
    // buttonOpenBdr.addEventListener('click', () => {
    //     iframe.style.display = 'block';
    //     iframe.src = '/site/table-bdr';
    // });
    //
    // buttonCloseBdr.addEventListener('click', () => {
    //     iframe.style.display = 'none';
    // });
    //
    // buttonOpenIp.addEventListener('click', () => {
    //     iframe.style.display = 'block';
    //     iframe.src = '/site/table-ip';
    // });
    //
    // buttonCloseIp.addEventListener('click', () => {
    //     iframe.style.display = 'none';
    // });
    //
    //
    // // let report_cell = document.querySelector('.report_part');
    // // report_cell.addEventListener('click', () => {
    // //     report_cell.style.background = '#92c2e1';
    // // });
    //
    // // const today = new Date();
    // const today = new Date().toLocaleDateString() ;
    //
    // let report_cell = document.querySelectorAll('.report_part');
    //
    // report_cell.forEach((report_part) => {
    //     report_part.addEventListener('click', () => {
    //         report_part.style.background = '#92c2e1';
    //         // report_part.innerHTML = today;
    //
    //     });
    // });
    //
    // let rep_date_cell = document.querySelectorAll('.rep_date');
    // rep_date_cell.forEach((rep_date) => {
    //     if (rep_date.textContent !== '') {
    //             rep_date.style.background = '#92c2e1';
    //     }
    // });
    //
    // let control_cell = document.querySelectorAll('.control_part');
    //
    // control_cell.forEach((control_part) => {
    //     control_part.addEventListener('click', () => {
    //         control_part.style.background = '#92c2e1';
    //         // control_part.innerHTML = today;
    //
    //         console.log(control_part);
    //     });
    // });
    //
    // let qartal_cell = document.querySelectorAll('.qartal');
    //
    // qartal_cell.forEach((qartal) => {
    //     qartal.addEventListener('click', () => {
    //         qartal.style.background = '#92c2e1';
    //
    //         console.log(qartal);
    //     });
    // });
    //
    // // ***** Music *****
    //
    // let music = new Audio();
    // music.src = './sound/Silver.mp3';
    //
    // let sound = document.querySelector('.music');
    // sound.addEventListener('click', () => {
    //     sound.classList.add('playM');
    //     music.loop = true;
    //     music.play();
    // });
    //
    //
    //
    // // ***** Welcome *****
    //
    // // let leftPart = document.querySelector(".left_part");
    // // leftPart.style.position = 'relative';
    // let welcome = document.querySelector(".welcome");
    //
    // setTimeout( () => {
    //     welcome.remove()
    // }, 2000);
    //
    //
    // // let welcome = document.createElement("h1");
    // // welcome.classList.add('wellClass');
    // // welcome.style.position = 'absolute';
    // // welcome.style.top = '40%';
    // // welcome.style.left = '30%';
    // // welcome.style.zIndex = '50';
    // // welcome.style.width = 'max-content';
    // // welcome.style.padding = '50px 50px';
    // // welcome.style.height = '200px';
    // // welcome.style.borderRadius = '5px';
    // // welcome.style.background = '#7084BBFF';
    // //
    // // welcome.style.fontFamily = 'Colibri, sans-serif';
    // // welcome.style.fontSize = '40px';
    // // welcome.style.fontWeight = 'bold';
    // // welcome.style.color = '#F0F0F3';
    // // welcome.innerText = 'Добро пожаловать в DBoard!';
    //
    //
    //
    // // setTimeout( () => {
    // //     leftPart.appendChild(welcome);
    // //     setTimeout( () => {
    // //         leftPart.removeChild(welcome);
    // //     }, 2000);
    // // }, 100);

</script>

