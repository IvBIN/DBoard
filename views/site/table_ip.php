<?php
/** @var yii\web\View $this */
/** @var $table_bdr */

session_start();

$data_table = $_SESSION['ip'];
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
    <h2>TABLE IP</h2>
</div>
<div class="table_field">
    <table class="table_data">

        <?php foreach ($data_table as $item) {

            echo "<tr class='table_cell'>";
            echo "</tr>";
            for ($i = 7; $i <= 12; $i++) {
                if ($item[$i] !== null) {
                    echo "<td>" . $item[$i] . "</td>";
                }
            }
        }

        ?>

    </table>

</div>
<style>
    .table_field {
        display: flex;
        /*width: max-content;*/
        width: 800px;
    }
    .table_data {
        display: flex;
        justify-content: space-between;
        gap: 10px;
        margin-bottom: 10px;
    }
    .table_cell, td {
        padding: 5px 10px;
        font-family: "Colibri", sans-serif;
        font-size: 12px;
        background: #a4cada;
        text-align: center;
    }
</style>


</body>
</html>