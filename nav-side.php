<!DOCTYPE html>
<html lang="en">
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
       <link rel="stylesheet" href="css/dashbord.css"> 
</head>
<body>
 
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3" id="side-area">
                        <h4>لوحة التحكم</h4>
                        <ul class="side-area">
                            <li>
                                <a href="categories.php">
                                    <span><i class="fas fa-tags"></i></span>
                                    <span>التصنيفات</span>
                                </a>
                            </li>
                            <li data-toggle="collapse" data-target="#menu">
                                <a href="#">
                                    <span><i class="far fa-newspaper"></i></span>
                                    <span>المقالات</span>
                                </a>
                            </li>
                            <ul class="collapse" id="menu">
                                <li>
                                    <a href="newpost.php#">
                                        <span><i class="far fa-edit"></i></span>
                                        <span>مقال جديد</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="posts.php">
                                        <span><i class="fas fa-th-large"></i></span>
                                        <span>كل المقالات </span>
                                    </a>
                                </li>
                                
                            </ul>
                            <li>
                                <a href="index.php" target="_blank">
                                    <span><i class="fas fa-window-restore"></i></span>
                                    <span>عرض الموقع</span>
                                </a>
                            </li>
                            <li>
                                <a href="logout.php">
                                    <span><i class="fas fa-sign-out-alt"></i></span>
                                    <span>تسجيل الخروج</span>
                                </a>
                            </li>
                        </ul>
                 </div>