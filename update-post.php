<?php
session_start();
$conn=mysqli_connect("localhost","root","","blog");


if (isset($_POST['submit'])){
    $id=$_POST['id'];
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
    //update
   if(empty($errors)){
    $query="UPDATE posts SET title='$title' ,body='$body' WHERE  id=$id ";
    $result= mysqli_query($conn,$query);
  
    if($result ==1){
        header("Location: index.php");
        
    }else{
        //display errors
        
        $_SESSION['errors']=['error occured'];
        header("Location: edit-post.php?id=$id");
    }
   }else{
    $_SESSION['errors']=$errors;
    header("Location: create-post.php");

   }
}



?>
