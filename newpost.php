<?php include 'nav-side.php' ;
      include 'connect.php' ; ?>




                <div class="col-md-9" id="main-area">
                    <button class="btn-custom Article">مقال جديد</button>
                    <div class="add-category">
                        <form action="newpost.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="title">عنوان المقال</label>
                                    <input type="text" name="title" class="form-control"> 
                                </div>
                                <div class="form-group">
                                    <label>اسم الكاتب</label>
                                    <input type="text" name="Arname" class="form-control"> 
                                </div>
                                <div class="form-group">
                                    <label for="cate">التصنيف</label>
                                    <select class="form-control" name="post_cat">
                                    <?php
                                            $read_date = $conn->query ("SELECT * FROM category") ;
                                            foreach($read_date as $data){ ?>
                                    <option>
                                          <?php  echo $data['categoryName'] ; ?> 
                                    </option>
                                            <?php } ?>
                                    </select> 
                                </div>
                                <div class="form-group">
                                    <label for="image">صورة المقال</label>
                                    <input type="file" class="form-control" name="post_img">                                    
                                </div>
                                <div>
                                    <label for="text">نص المقال</label>
                                    <textarea name="post" rows="4" class="form-control" ></textarea>
                                </div>
                                <button class="btn-custom form-control" name="add"> نشر المقال </button>
                                <?php

                                 @ $postimage =$_POST['post_img'] ;

                                 if(isset($_POST['add'])){
                                      if(empty($_POST['title']) || empty($_POST['post'])){
                                           echo "<div class='alert alert-danger'>" . "يرجى ملئ كافة الحقول" ."</div>" ;
                                      }else{
                                           $postimage =$_FILES['post_img']['name'] ;
                                           move_uploaded_file($_FILES['post_img']['tmp_name'] , "uploads\\" . $_FILES['post_img']['name'] ) ;
                                           @ $query = "INSERT INTO posts(title,Arname,post_cat,post_image,post_conntent)
                                           VALUES ('$_POST[title]','$_POST[Arname]','$_POST[post_cat]','$postimage','$_POST[post]')" ;
                                            $res = mysqli_query($conn, $query) ;
                                       }
                                 }
                                  ?>
                                
                        </form>
                    </div>
                </div>




                <?php include 'footer.php' ?>