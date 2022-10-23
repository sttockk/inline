<?php

require __DIR__ . '/DataBase.php';

$item = trim(htmlspecialchars($_POST['item']));

if (empty($item)) {
    exit("Пустой запрос");
}

if (mb_strlen($item) < 3) {
    exit("Введите больше 3 символов");
}

$bd = new DataBase();

$query = "SELECT * FROM `comments`
INNER JOIN `articles` ON `articles`.id = `comments`.postId
WHERE (`comments`.body LIKE '%{$item}%')";

$res = $bd->query($query);

if ($res == []) {
    exit("Ничего не найдено");
}

foreach($res as $item)
{
    echo "<h2>Заголовок записи:</h2>
    <p>{$item['title']}</p>
    <h2>Комментарий:</h2>
    <p>{$item[4]}</p>
    <hr>";
}




