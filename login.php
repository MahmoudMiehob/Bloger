<?php include 'connect.php' ;
       session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>login</title>
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
       <style> 

            .login{
                width:400px;
                margin:9% auto ;
                border:1px solid blue ;
                border-radius:10px;
                padding:10px;
            }
            .login h5{
                text-align:center ;
                padding:20px;
            }
            .login .custom-css{
                margin-right:125px;
                background-color:rgb(61, 61, 226);
                color:white;
                font-size:18px;
                font-weight:bold;

            }
       
       </style>
</head>
<body>
     
     <div class="login">
     <?php
          @ $adminMail = $_POST['email'];
          @ $adminpass = $_POST['password'];
          @ $login     = $_POST['log'];


          if(isset($login)){
              if(empty($adminMail) || empty($adminpass)){

                echo "<div class='alert alert-danger text-center'>" . " يرجى ملئ كافة الحقول " ."</div>" ;
              }else{
                  $query = " SELECT * FROM admin WHERE email='$adminMail' and pass='$adminpass' " ;
                  $res   = mysqli_query($conn,$query) ;
                 @ $row  = mysqli_fetch_assoc($res) ;

                  if($adminMail==$row['email'] && $adminpass==$row['pass']){
                    echo "<div class='alert alert-success text-center'>" . " تم تسجيل الدخول بنجاح" ."</div>" ;
                    $_SESSION['id']=$row['id'];
                    header('REFRESH:2;URL=categories.php');
                  }else{
                    echo "<div class='alert alert-success text-center'>" . "يرجى التأكد من البيانات المدخلة واعادة المحاولة" ."</div>" ;
                  }
              }
          }
     ?>
         <form action="login.php" method="POST">
              <h5>تسجيل الدخول</h5>
              <div class="form-group">
                    <label for="mail">البريد الالكتروني</label>
                    <input typy="text" class="form-control" id="mail" name="email">
              </div>
              <div class="form-group">
                    <label for="pass">كلمة السر</label>
                    <input typy="text" class="form-control" id="pass" name="password">
              </div>
              <button class="custom-css" name="log">تسجيل الدخول</button>
         </form>
     </div>



 
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
     integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
      crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
     integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s"
      crossorigin="anonymous"></script>
</body>
</html>