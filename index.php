<?php

require __DIR__ . '/DataBase.php';
require __DIR__ . '/functions.php';

$jsonArticlesData = file_get_contents('https://jsonplaceholder.typicode.com/posts');
$articlesData = json_decode($jsonArticlesData, true);

$bd = new DataBase();

$loadedArticles = loadArticles($articlesData, $bd);

$jsonCommentsData = file_get_contents('https://jsonplaceholder.typicode.com/comments');
$commentsData = json_decode($jsonCommentsData, true);

$loadedComments = loadComments($commentsData, $bd);

echo "Загружено {$loadedArticles} записей и {$loadedComments} комментариев";


