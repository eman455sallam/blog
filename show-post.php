<?php require('inc/header.php'); ?>
<?php require('inc/navbar.php'); ?>
<?php 
 if(isset($_GET['id'])){
     $id=$_GET['id'];
 }else{
     $id=1;//deafult
 }

 $conn=mysqli_connect("localhost","root","","blog");
 $query="SELECT title ,body FROM POSTS WHERE id=$id";
 $result=mysqli_query($conn ,$query);

 if(mysqli_num_rows($result)== 0){
     http_response_code(404);
 }else{
    $post=mysqli_fetch_assoc($result );
 }
 

?>

<div class="container-fluid pt-4">
    <div class="row">
        <?php if(isset($post)) :?>
        <div class="col-md-10 offset-md-1">

            <div class="d-flex justify-content-between border-bottom mb-5">
                <div>
                    <h3><?= $post['title'] ;?></h3>
                </div>
                <div>
                    <a href="index.php" class="text-decoration-none">Back</a>
                </div>
            </div>
            <div>
            <?= $post['body'] ;?>
            </div>
        </div>
        <?php else :echo"no post found" ; endif;?>
    </div>
</div>

<?php require('inc/footer.php'); ?>