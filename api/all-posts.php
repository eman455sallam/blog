<?php
$conn=mysqli_connect("localhost","root","","blog");
header('Content-Type: application/json');

if($_SERVER['REQUEST_METHOD'] == 'GET'){

    $query="SELECT * FROM POSTS";
$result=mysqli_query($conn ,$query);
$posts=mysqli_fetch_all($result ,MYSQLI_ASSOC);
$postsJson=json_encode($posts);


echo $postsJson;
}else{
    http_response_code(405);

    
    $message="method not allowed";
    echo $message;
}

