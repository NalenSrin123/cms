<?php include('header.php'); ?>
<link rel="stylesheet" href="./assets/css/style.css">
<main class="home">
    <section class="trending">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="content-trending">
                        <div class="content-left">
                            TRENDING NOW
                        </div>   
                        <div class="content-right">
                            <marquee behavior="" direction="left">
                                <div class="text-news">
                                <?php 
                                    include '../connection.php';
                                    global $con;
                                    $selectTitle="SELECT `title` FROM `tbnews` ORDER BY `id` DESC LIMIT 5";
                                    $title=$con->query($selectTitle);
                                    while ($row=$title->fetch_assoc()){
                                        echo '<i class="fas fa-angle-double-right"></i>
                                            <a href="">'.$row['title'].' </a> &ensp;';
                                    }
                                ?>
                                
                                    
                                 
                                </div>
                            </marquee>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="latest-news">
        <div class="container">
            <div class="row">
                <?php 
                   include '../connection.php';
                    function tredingNews(){
                        global $con;
                        $select="SELECT * FROM `tbnews` ORDER BY `id` DESC LIMIT 1";
                        $res=$con->query($select);
                        $data=$res->fetch_assoc();
                        echo '<div class="col-8 content-left">
                                    <figure>
                                        <a href="news-detail.php">
                                            <div class="thumbnail">
                                                <img width="100%" height="420px" src="../admin/assets/image/'.$data['thumbnail'].'" alt="">
                                                <div class="title" style="width:100%" >'.$data['title'].'</div>
                                            </div>
                                        </a>
                                    </figure>
                                </div>';
                    }
                    tredingNews();   
                ?>
                <div class="col-4 content-right">
                    <?php
                        global $con;
                        $getData="SELECT * FROM `tbnews` ORDER BY `id` DESC LIMIT 2 OFFSET 1";
                        
                        $re=$con->query($getData);
                     
                            while($row=$re->fetch_assoc()){
                                echo '
                                <div class="col-4">
                                    <figure>
                                        <a href="">
                                            <div class="thumbnail">
                                                <img width="320px" height="200px" src="../admin/assets/image/'.$row['thumbnail'].'" alt="">
                                            <div class="title" style="width:320px;">
                                                '.$row['title'].'
                                            </div>
                                            </div>
                                        </a>
                                    </figure>
                                </div>
                                ';
                            }
                        
                    ?>
                </div>
            </div>
        </div>
    </section>
    <?php 
         function getNews($type){
        global $con;
        $news="SELECT * FROM `tbnews` WHERE `post_type`='$type' ORDER BY `id` DESC LIMIT 3";
        $data=$con->query($news);
        while($row=$data->fetch_assoc()){
            echo '
                <div class="col-4">
                    <figure>
                        <a href="">
                            <div class="thumbnail">
                                <img width="350px" height="200px" src="../admin/assets/image/'.$row['thumbnail'].'" alt="">
                            <div class="title">
                                '.$row['title'].'
                            </div>
                            </div>
                        </a>
                    </figure>
                </div>
            ';
        }
    }
    ?>
    <section class="trending">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="content-trending">
                        <div class="content-left">
                            SPORT NEWS
                        </div>   
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="news">
        <div class="container">
            <div class="row">
                <?php 
              
                getNews('Sport');
                ?>
            </div>
        </div>
    </section>

    <section class="trending">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="content-trending">
                        <div class="content-left">
                            SOCIAL NEWS
                        </div>   
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="news">
        <div class="container">
            <div class="row">
                 <?php 
              
                getNews('Socail');
                ?>
            </div>
        </div>
    </section>
    <section class="trending">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="content-trending">
                        <div class="content-left">
                            ENTERTAINMENT NEWS
                        </div>   
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="news">
        <div class="container">
            <div class="row">
                 <?php 
              
                getNews('Entertainment');
                ?>
            </div>
        </div>
    </section>
</main>
<?php include('footer.php'); ?>