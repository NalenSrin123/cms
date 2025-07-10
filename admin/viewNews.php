<?php 
    include('sidebar.php');
?>
                <div class="col-10">
                    <div class="content-right">
                        <div class="top">
                            <h3>All Sport News</h3>
                        </div>
                        <div class="bottom view-post">
                            <figure>
                                <form method="post" enctype="multipart/form-data">
                                    <!-- <div class="block-search">
                                        <input type="text" class="form-control" placeholder="SEARCH HERE">
                                        <button type="submit">
                                        <img src="search.png" alt=""></button>
                                    </div> -->
                                    <table class="table text-center align-middle"  style="table-layout: fixed;">
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Post Type</th>
                                            <th>Categories</th>
                                            <th>Thumbnail</th>
                                            <th>Publish Date</th>
                                            <th>Publisher</th>
                                            <th>Actions</th>
                                        </tr>
                                        <?php
                                            global $con;
                                            $select="SELECT *,`profile` FROM `tbnews` INNER JOIN `tbusers` ON `user_id`=`userID`";
                                            $res=$con->query($select);
                                            while($row=$res->fetch_assoc()){
                                                echo '<tr>
                                                            <td>'.$row['id'].'</td>
                                                            <td style="width: 200px;  white-space: nowrap; overflow: hidden; text-overflow: ellipsis; ">'.$row['title'].'</td>
                                                            <td>'.$row['post_type'].'</td>
                                                            <td>'.$row['category'].'</td>
                                                            <td><img width="65"  src="./assets/image/'.$row['thumbnail'].'"/></td>
                                                            <td>'.$row['create_at'].'</td>
                                                            <td><img width="65" src="./assets/image/'.$row['profile'].'"/></td>
                                                            <td width="150px">
                                                                <a href="addNews.php?id='.$row['id'].'" class="btn btn-primary">Update</a>
                                                                <button type="button" remove-id="'.$row['id'].'" class="btn btn-danger btn-remove" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                    Remove
                                                                </button>
                                                            </td>
                                                        </tr>';
                                            }
                                        ?>
                                        
                                        
                                    </table>
                                    <ul class="pagination">
                                        <li>
                                            <a href="">1</a>
                                            <a href="">2</a>
                                            <a href="">3</a>
                                            <a href="">4</a>
                                        </li>
                                    </ul>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <h5 class="modal-title" id="exampleModalLabel">Are you sure to remove this post?</h5>
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="" method="post">
                                                        <input type="hidden" class="value_remove" name="remove_id">
                                                        <button type="submit" class="btn btn-danger">Yes</button>
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>  
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
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
<?php 
    include '../connection.php';
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $id=$_POST['remove_id'];
        global $con;
        $delete="DELETE FROM `tbnews` WHERE `id`='$id'";
        $re=$con->query($delete);
        if($re){
             echo '<script>window.location.href="viewNews.php"</script>';
        }
    }
?>