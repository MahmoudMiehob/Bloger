<?php include 'connect.php' ; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>tadwinaty</title>
    <script
     src="https://code.jquery.com/jquery-3.5.1.min.js"
      integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
       crossorigin="anonymous"></script>
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
       integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
       integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
       <link rel="stylesheet" href="css/bootstrap-rtl.css">
       <link rel="stylesheet" href="css/styless.css"> 
</head>
<body>

    <!--start navbar-->
    <nav class="navbar sticky-top navbar-expand-sm  bg-dark navbar-light">
        <div class="container">
            <a href="#" class="navbar-brand">تدويناتي</a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="#" class="nav-link">عن المدونة </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">شروحات</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">منوعات</a>
                    </li>
                    <li class="nav-item">
                        <a href="newpost.php" class="nav-link">اضافة مقال </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--end navbar-->
    <!--start content-->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                <?php
                   @ $id = $_GET['id'] ;
                   @ $query = "SELECT * FROM posts where id = $id";
                   @ $res = mysqli_query($conn,$query) ;
                     $row=mysqli_fetch_assoc($res);?>


                    
                    <div class="post">
                        <div class="post-image">
                           <a href="post.php?id=<?php echo $row['id'] ?>"> <img src="uploads/<?php echo $row['post_image'] ; ?>" alt="image"></a>
                        </div>
                        <div class="post-title">
                            <a href="post.php?id=<?php echo $row['id'] ?>"><h4><?php echo $row['title'] ; ?></h4></a>
                        </div>
                        <div class="post-details">
                            <p class="post-info">
                                <span><i class="fas fa-user"><?php echo $row['Arname'];  ?></i></span>
                                <span><i class="far fa-calendar-alt"></i> <?php echo $row['post_date'];  ?> </span>
                                <span><i class="fas fa-tags"></i><?php echo $row['post_cat'];  ?></span>
                            </p>
                            <p class="postContent">
                            <?php echo $row['post_conntent']; ?>
                            </p>
                        </div>
                    </div>
                  
                </div>
                <div class="col-md-4">
                    <div class="categories">
                        <h4>التصنيفات</h4>
                        <ul>
                        <?php
                           @ $query = "SELECT * FROM category ORDER BY id desc";
                           @ $res = mysqli_query($conn,$query) ;
                            while($row=mysqli_fetch_assoc($res)){
                        ?>
                            <li>
                                <a href="category.php?category=<?php echo $row['categoryName']; ?>">
                                    <span>
                                        <i class="fas fa-tags"></i>
                                    </span>
                                    <span>
                                            <?php echo $row['categoryName'] ; ?>                                   
                                    </span>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <!--end categories-->      
                    <div class="last_bost">
                        <h4>أحدث المنشورات</h4>
                        <ul>
                        <?php
                           @ $query = "SELECT * FROM posts ORDER BY id desc LIMIT 5";
                           @ $res = mysqli_query($conn,$query) ;
                            while($row=mysqli_fetch_assoc($res)){
                        ?>
                            <li>
                                <a href="post.php?id=<?php echo $row['id'] ?>">
                                    <span class="float-left"><img src="uploads/<?php echo $row['post_image'] ; ?>" alt="" width="70px" height="50px"></span>
                                    <span><?php echo $row['title'] ?> </span>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>             
                </div>
            </div>
        </div>
    </div>
    <!--end content-->

    <footer>
        <p>جميع الحقوق محفوظة &copy; 2020</p>
    </footer>

    <?php include 'footer.php' ?>