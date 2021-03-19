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
<?php
      session_start();
      if(!isset($_SESSION['id'])){
        echo "<div class='alert alert-danger text-center'>" . " غير مسموح الوصول لهذه الصفحة " ."</div>" ;
        header('REFRESH:2 ;URL=login.php');}
        else{

       include 'nav-side.php' ;
       include 'connect.php';?>
 


               <div class="col-md-9" id="main-area">
               <?php 
                     if(isset($_POST['submit'])){
                          if(empty($_POST['categoryNames'])){
                                echo "<div class='alert alert-danger form-control'>" . " حقل التصنيف فارغ" . "</div>" ;
                          }
                          elseif(($_POST['categoryNames'])>50){

                                 echo 'اسم التصنيف كبير جدا' ;
                     }else{
                          $query  = "INSERT INTO category(categoryName) VALUES ('$_POST[categoryNames]')" ;
                          $result = mysqli_query($conn , $query);
                          echo 'تم اضافة التصنيف بنجاح' ;
                          }
                     }
               ?>
               <?php
                    @ $id = $_GET['id'] ;
                      if(isset($id)){
                           $query = "DELETE FROM category where id= '$id' ";
                           $res = mysqli_query($conn,$query);

                      if(isset($res)){
                            echo "<div class='alert alert-success form-control'>" . "تم حذف التصنيف بنجاح" . "</div>" ;
                       }else{
                             echo "<div class='alert alert-danger form-control'>" . "حدث خطأ يرجى اعادة المحاولة" . "</div>" ;
                          
                       }
                      }
                ?>
                    <div class="add-category"> 
                        <form action="categories.php" method="post">
                                <div class="form-group">
                                    <label for="category">تصنيف جديد</label>
                                    <input type="text" name="categoryNames" class="form-control"> 
                                </div>
                                <button class="btn-custom form-control" name="submit"> اضافة </button>
                         </form>
                    </div>

                    <div class="display-cat mt-5">
                         <table class="table table-border">
                                 <tr id="table">
                                    <th>رقم الفئة </th>
                                    <th>اسم الفئة</th>
                                    <th>تاريخ الاضافة</th>
                                    <th> حذف التصنيف</th>
                                 </tr>  
                                 <?php 
                                 $query = "SELECT * FROM category ORDER BY categoryName desc " ;
                                 $res = mysqli_query($conn,$query) ;
                                 $num = 0 ;
                                 while($row = mysqli_fetch_assoc($res)){
                                     $num++ ;
                                     ?>
                                 <tr>
                                     <td><?php echo $num ; ?></td>
                                     <td><?php echo $row['categoryName'] ; ?></td>
                                     <td><?php echo $row['categoryData'] ; ?></td>
                                     <td><a href="categories.php?id=<?php echo $row['id']; ?>"><button class="custom-btn">حذف التصنيف</button></a></td>
                                 </tr>
                                 <?php

                                 }
                                 
                                 ?>                      
                         </table>                    
                    </div>
                </div>
            </div>
        </div>
    </div>
                                <?php } ?>
    <?php include 'footer.php' ?>