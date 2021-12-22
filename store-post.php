<?php

session_start();
$conn=mysqli_connect("localhost","root","","blog");


if (isset($_POST['submit'])){
    $title=trim(htmlspecialchars($_POST['title']));
    $body=trim(htmlspecialchars($_POST['body']));

    $errors=[];
    if(empty($title)){
        $errors=['title is required'];
    }elseif(! is_string($title)){
        $errors=['title must be string'];
    }elseif(strlen($title) > 255){
        $errors=['title must be <= 255'];
    }

    if(empty($body)){
        $errors=['body is required'];
    }elseif(! is_string($body)){
        $errors=['title must be string'];
    }
    //insert
   if(empty($errors)){
    $query="INSERT INTO posts (title,body, user_id) VALUES ('$title','$body',1)";
    $result= mysqli_query($conn,$query);
  
    if($result ==1){
        header("Location: index.php");
        
    }else{
        //display errors
        

    }
   }else{
    $_SESSION['errors']=$errors;
    header("Location: create-post.php");

   }
}



?>