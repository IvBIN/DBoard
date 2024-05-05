<?php
/** @var yii\web\View $this */
/** @var $table_bdr */

//session_start();
//
//$data_table = $_SESSION['ip'];
//$data_table = $table_bdr;

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Table IP</title>
    </head>
    <body>
        <div class="table_bdr">
            <h2>Договоры (ИП)</h2>
        </div>
        <div class="table_field">
            <?php
            if (!empty($table_bdr)){
            ?>
            <table class="table_data">

<!--                --><?php //foreach ($data_table as $item) {
//
//                    echo "<tr class='table_cell'>";
//                    echo "</tr>";
//                    for ($i = 7; $i <= 12; $i++) {
//                        if ($item[$i] !== null) {
//                            echo "<td>" . $item[$i] . "</td>";
//                        }
//                    }
//                }
//
//                ?>
<!--                --><?php //var_dump($table_bdr); ?>

                <?php for ($i=0; $i <1; $i++): ?>

                    <thead>
                    <tr class="table_head">
                        <?php for ($j=7; $j <=12; $j++):
                            echo "<th>" . $table_bdr[0][$j] . "</th>";
                        endfor;?>
                    </tr>
                    </thead>

                <?php endfor; ?>
                <tbody>
                <?php for ($i=1; $i <= 12 ; $i++): ?>
                    <tr>
                        <?php for ($j=7; $j <=12; $j++):
                            if ($table_bdr[$i][$j] !== null) {
                                echo "<td>" . $table_bdr[$i][$j] . "</td>";
                            }
                        endfor;?>
                    </tr>
                <?php endfor; ?>
                </tbody>

            </table>
            <?php } else { ?>
                <span>Данных нет</span>
            <?php } ?>

        </div>
<!--        <style>-->
<!--            .table_field {-->
<!--                display: flex;-->
<!--                width: 800px;-->
<!--            }-->
<!--            th, td {-->
<!--                padding: 5px 10px;-->
<!--                font-family: "Colibri", sans-serif;-->
<!--                font-size: 12px;-->
<!--                background: #92c2e1;-->
<!--                text-align: center;-->
<!--            }-->
<!--        </style>-->
    </body>
</html>