<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Задание 1</title>
</head>
<body>
<?php

$articleText = "PHP англ. PHP: Hypertext Preprocessor — «PHP: препроцессор гипертекста»; первоначально PHP/FI (Personal Home Page / Form Interpreter), а позже Personal Home Page Tools — «Инструменты для создания персональных веб-страниц») — скриптовый язык общего назначения, интенсивно применяемый для разработки веб-приложений. В настоящее время поддерживается подавляющим большинством хостинг-провайдеров и является одним из лидеров среди языков, применяющихся для создания динамических веб-сайтов."; //текст статьи
$articleLink = "https://ru.wikipedia.org/wiki/PHP"; //сслыка на статью
$articlePreview = substr($articleText, 0, 199) . "..."; //обрезание до 200 символов и добавление в конец многоточия

$array_articlePreview = explode(" ", $articlePreview); //массив слов анонса статьи

//в цикле заменяются последние три слова на ссылку
for ($i=3; $i>0; --$i){
    $array_articlePreview[count($array_articlePreview) - $i] = "<a href=$articleLink>".$array_articlePreview[count($array_articlePreview) - $i]."</a>";
}
$articlePreview=implode(" ", $array_articlePreview); //массив переводится в строку
echo $articlePreview;
?>
</body>
</html>
