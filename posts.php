<?php  include 'nav-side.php' ;
       include 'connect.php' ; ?>

     

   
   <div class="col-sm-9" id="main-area">
   <?php
        @ $id = $_GET['id'] ;
          if(isset($id)){
               $query = "DELETE FROM posts where id= '$id' ";
               $res = mysqli_query($conn,$query);

          if(isset($res)){
                echo "<div class='alert alert-success form-control'>" . "تم حذف المقال بنجاح" . "</div>" ;
           }else{
                 echo "<div class='alert alert-danger form-control'>" . "حدث خطأ يرجى اعادة المحاولة" . "</div>" ;
              
           }
          }
    ?>
   
     <button class="btn-custom Article allarticle">عرض جميع المقالات</button>
     <table class="table table-ordered table-control">
                <tr id="table">
                    <th>رقم المقال</th>  
                    <th>عنوان المقال</th>
                    <th>كاتب المقال</th>                          
                    <th>تاريخ المقال </th>  
                    <th>حذف المقال</th>     
                </tr>
                <?php
                     $query = "SELECT * FROM posts ORDER BY id desc" ;
                     $res = mysqli_query($conn,$query) ;
                     $num = 0 ;
                      while($row = mysqli_fetch_assoc($res)){
                         $num++ ;
                 ?>  
                <tr>
                    <th><?php echo $num ; ?></th>
                    <th><?php echo $row['title'] ; ?></th>
                    <th><?php echo $row['Arname'] ; ?></th>                    
                    <th><?php echo $row['post_date'] ; ?></th>
                    <th><a href="posts.php?id=<?php echo $row['id']; ?>"><button class="custom-btn"> حذف المقال</button></a></td>

                
                </tr>         
            
              <?php
              
          }
          ?>
          </table>
     </div>
    


<?php include 'footer.php' ; ?>