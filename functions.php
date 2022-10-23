<?php

function loadArticles($articlesData, $bd): int {
    $query = "INSERT INTO `articles` (`userId`,`Id`,`title`,`body`) VALUES (:userId,:Id,:title,:body)";

    $count_articles = 0;

    foreach($articlesData as $article)
    {
        
        $userId = $article['userId'];
        $Id = $article['id'];
        $title = $article['title'];
        $body = $article['body'];
        
        $params = [
            ':userId' => $userId,
            ':Id' => $Id,
            ':title' => $title,
            ':body' => $body,
    
        ];
        $res = $bd->query($query, $params);
        
        if(isset($res)) {
            $count_articles++;
        }
        
    }
    return $count_articles;
}

function loadComments($commentsData, $bd): int {
    $query = "INSERT INTO `comments` (`postId`,`Id`,`name`,`email`,`body`) VALUES (:postId,:Id,:name,:email,:body)";
    
    $count_comments = 0;
    
    foreach($commentsData as $comment)
    {
        $postId = $comment['postId'];
        $Id = $comment['id'];
        $name = $comment['name'];
        $email = $comment['email'];
        $body = $comment['body'];
        
        $params = [
            ':postId' => $postId,
            ':Id' => $Id,
            ':name' => $name,
            ':email' => $email,
            ':body' => $body,
    
        ];
        $res2 = $bd->query($query, $params);
    
        if(isset($res2)) {
            $count_comments++;
        }
    }
    return $count_comments;
}
