<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Задание 2</title>
</head>
<body>
<form method="post">
    <p><label>Введите количество фатальных ошибок
            <input type="number" size="10" name="fatal">
        </label></p>
    <p><label>Введите количество ворнингов
            <input type="number" size="10" name="warning">
        </label></p>
    <input type="submit" value="Отправить">
</form>
<?php
if (isset($_POST['fatal']) && isset($_POST['warning'])) {
    $number_commit = 0;
    $number_fatal = $_POST['fatal'];
    $number_warnings = $_POST['warning'];
    if (0 > $number_fatal) { //если введенное количество ошибок меньше нуля
        echo "<b>Ошибка</b><br>Количество ошибок должно быть больше или рано 0";
        return;
    }
    if ($number_warnings > 1000) { // //если введенное количество ворнингов меньше нуля
        echo "<b>Ошибка</b><br>Количество ворнингов должно быть больше или рано 1000";
        return;
    }
    if (($number_warnings == 0) && ($number_fatal % 2 != 0)){ //если нет ворнингов и нечетное количество ошибок, тогда нельзя исправить код
        echo -1;
        return;
    }
    while ((0 < $number_fatal) || ($number_warnings > 0 && $number_warnings <= 1000)) {
        if ($number_fatal % 2 == 0 && $number_fatal != 0) {  //если количество ошибок кратно двум и не равно нулю
            $number_fatal = $number_fatal - 2; // исправляем две ошибки
            $number_commit++; //увеличиваем количество коммитов на один
        }
        if ($number_fatal % 2 != 0 || $number_fatal == 0) { // если количество ошибок не кратно двум или равно нулю
            if ($number_warnings == 2 && $number_fatal == 0) { // если количество ворнингов равно двум и количество ошибок равно нулю
                $number_warnings++; //увеличиваем количество ворнингов на один
                $number_commit++; //увеличиваем количество коммитов на один
            }
            if ($number_warnings != 0) { // если количество ворнингов не равно нулю
                if ($number_warnings % 2 != 0) {  //если количество ворнингов не кратно двум
                    $number_warnings++; // увеличиваем колличество ошибок на один
                    $number_commit++;//увеличиваем количество коммитов на один
                }
                if ($number_warnings % 2 == 0) { //если количество ворнингов кратно двум
                    $number_warnings = $number_warnings - 2; //уменьшаем колличество ворнингов на два
                    $number_fatal++; //увеличиваем колличество ошибок на один
                    $number_commit++;//увеличиваем количество коммитов на один
                }
            }
        }
    }
    echo "Минимальное количество коммитов: " . $number_commit;
}
?>
</body>
</html>