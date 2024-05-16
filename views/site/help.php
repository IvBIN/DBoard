<?php
/** @var yii\web\View $this */

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!--    <link rel="stylesheet" href="/web/css/site.css">-->
        <title>Help</title>
    </head>
    <body>
        <div class="container">
            <a class="btn" href="/">На главную</a>
            <div class="help_head">
                <h2 class="logo_header">DBoard</h2>
                <h2 class="welcome">Добро пожаловать!</h2>
            </div>
            <div class="help_field">
                <h2 class="terms_title">Терминология</h2>
                <span class="term"><b>Дашборд</b> — электронный документ, где лаконично представлены статистические данные, отчёты и элементы инфографики.</span>
                <h2 class="terms_title">Инструкция</h2>
                <ol>
                    <li>Зарегистрироваться (кнопка "Регистрация" в header);</li>
                    <li>Скачать шаблон файла загрузки (кнопка "⬇️Скачать шаблон" в header);</li>
                    <li>Заполнить данными шаблон (скачанный файл загрузки: test02.xls);</li>
                    <li>Загрузить файл загрузки через форму загрузки (выбрав необходимый файл после нажатия кноки "Обзор");</li>
                    <li>После загрузки файла производится построение диаграммы (При наведении курсора на сектор диаграммы отображается окно со "Способом закупки" и "Количеством договоров");</li>
                    <li>Для получения детальной информации необходимо нажать на кнопку "Раскрыть БДР/ИП" (кнопки под диаграммами);</li>
                    <li>Для скрытия открывшегося окна с таблицей необходимо нажать на кнопку "Скрыть БДР/ИП" (кнопки под диаграммами);</li>
                </ol>
    <!--            <h2>&copy;LLC DBoard</h2>-->

            </div>
        </div>
    </body>
    <footer class="container footer_field">
            <h2>&copy;LLC DBoard</h2>
    </footer>

</html>
