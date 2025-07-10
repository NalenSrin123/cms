<?php 
    include('sidebar.php');
    if(isset($_GET['id'])){
        $id=$_GET['id'];
       global $con;
       $select_old="SELECT * FROM `tbnews` WHERE `id` = '$id'";
       $old_news=$con->query($select_old)->fetch_assoc();

    }
    $email=$_SESSION['is_login'];
    $getUserID="SELECT `user_id` FROM `tbusers` WHERE `email` ='$email'";
    $userID=$con->query($getUserID)->fetch_assoc()['user_id'];
?>
                <div class="col-10">
                    <div class="content-right">
                        <div class="top">
                            <h3 id="title"></h3>
                        </div>
                        <div class="bottom">
                            <figure>
                                <form method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" class="form-control" name="title" <?php if(isset($_GET['id'])) echo 'value="'.$old_news['title'].'"' ?>>
                                        <input type="hidden" class="form-control" name="user_id" <?php if(isset($_GET['id'])) echo 'value="'.$userID.'"' ?>>
                                    </div>
                                    <div class="form-group">
                                        <label>Type</label>
                                        <select class="form-select" name="post_type">
                                            <option value="Socail" <?php if(isset($_GET['id'])) if($old_news['post_type'] == 'Socail') echo 'selected'; ?>>Socail</option>
                                            <option value="Sport" <?php if(isset($_GET['id'])) if($old_news['post_type'] == 'Sport') echo 'selected'; ?>>Sport</option>
                                            <option value="Entertainment" <?php if(isset($_GET['id'])) if($old_news['post_type'] == 'Entertainment') echo 'selected'; ?>>Entertainment</option>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Option</label>
                                        <select name="category" id="" class="form-select">
                                            <option value="National" <?php if(isset($_GET['id'])) if($old_news['category'] == 'National') echo 'selected'; ?>>National</option>
                                            <option value="International" <?php if(isset($_GET['id'])) if($old_news['category'] == 'International') echo 'selected'; ?>>International</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>File</label>
                                        <input type="file" class="form-control" name="thumbnail">
                                        <input type="hidden" name="old_image" id="" <?php if(isset($_GET['id'])) echo 'value="'.$old_news['thumbnail'].'"' ?>>
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" name="description"><?php if(isset($_GET['id'])) echo $old_news['description']?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Submit" name="btn" id="btnSubmit" class="btn btn-primary">
                                        <input type="submit" value="Update" name="btn" id="btnUpdate" class="btn btn-success">
                                        <input type="submit" value="Cancel" name="btn" id="btnCancel" class="btn btn-danger">
                                    </div>
                                </form>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function(){
        const url=window.location.href;
        if(url=='http://localhost:8080/PHP_9_10/Project/admin/addNews.php'){
            $('#btnSubmit').show();
            $('#btnUpdate').hide();
            $('#title').html("Add News");
        }else{
            $('#btnSubmit').hide();
            $('#btnUpdate').show();
            $('#title').html("Edit News");
        }
    });
</script>
<?php 
    include './moveFile.php';
    include '../connection.php';
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $btn=$_POST['btn'];
        if($btn=='Cancel'){
            echo '<script>window.location.href="viewNews.php"</script>';
        }
        $title=$_POST['title'];
        $post_type=$_POST['post_type'];
        $category=$_POST['category'];
        $thumbnail=moveFile('thumbnail');
        $description=$_POST['description'];
        global $con;
        global $userID;
        if($btn=='Submit'){
            $insert="INSERT INTO `tbnews`(`title`, `thumbnail`, `post_type`, `category`, `description`, `userID`) 
            VALUES ('$title','$thumbnail','$post_type','$category','$description','$userID')";
            $rs=$con->query($insert);
            if($rs){
                echo '<script>window.location.href="addNews.php"</script>'; 
            }
        }else if($btn=='Update'){
            date_default_timezone_set('Asia/Phnom_Penh');
            $user_update=$_POST['user_id'];
            $update_at=date('Y-m-d H:i:s');
            global $id;
            if(empty($_FILES['thumbnail']['name'])){
                $thumbnail=$_POST['old_image'];
                echo 1;
            }
            $update="UPDATE `tbnews` SET `title`='$title',`thumbnail`='$thumbnail',`post_type`='$post_type',`category`='$category'
            ,`description`='$description',`userID`='$user_update',`update_at`='$update_at' WHERE `id`='$id'";
            $rs=$con->query($update);
            if($rs){
               echo '<script>window.location.href="viewNews.php"</script>'; 
            }

        }
    }
?>