<!DOCTYPE html>
<html lang="en">
<head>
    <title>Lapitech</title>

    
    <link rel="icon" href="img/core-img/iconlogo.jpg">
    

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">
    <style style="css/text">
    td{
        padding-left: 30px;
    }
    th{
        padding-left: 30px;
        text-align: center;
    }
    table{
        color: black;
    }
    </style>

</head>

<body>
    <?php
    include 'admin_header.php';
    include 'connn.php';
    ?>
    
    <section class="vh-100 gradient-custom">
        
        <div class="container py-5 h-100">
            <div class="row" ><h1 >Product Page</h1></div>      
          <div class="row d-flex justify-content-center align-items-center h-100">
            
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    
              <div class="card text-white" style="border-radius: 1rem;background-color: #cdd4cf;width: 1550px;margin-left: -550px;">
                <div class="card-body p-5 text-center">
                   
                  <div class="mb-md-5 mt-md-4 pb-5">
                    <form action="admin_add_product.php">
                        <button class="btn btn-outline-light btn-lg px-5" type="submit" style="margin-bottom: 20px; color: black;"  data-toggle="modal" data-target="#exampleModal">Add Product</button>
                    </form>
                    
                    <table>
                        <tr>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Company</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        <?php
                            $query=mysqli_query($conn,"select * from product_details");
                            $path="img/product_images/";
                            if (mysqli_num_rows($query) == 0){
                                echo '<script>alert("No record Found")</script>';
                            }
                            else{   
                                while($row=mysqli_fetch_assoc($query))
                                {
                                    
                                
                        ?>
                        <tr>
                            <td><?php echo $row['p_name']; ?></td>
                            <td><?php echo $row['p_category']; ?></td>
                            <td><?php echo $row['p_company']; ?></td>
                            <td><?php echo $row['p_description']; ?></td>
                            <td><?php echo 'Rs '.$row['p_price']; ?></td>
                            <td><img src=<?php echo $path.$row['p_image_1']; ?> style="width: 100px;height: 100px;"></td>
                            <td><a class="btn btn-outline-light btn-lg px-5"  data-toggle="modal" data-target="#exampleModal" style="color:black" name="edit_product">Edit</a>
                            <a class="btn btn-outline-light btn-lg px-5" href="admin_delete_product.php?id=<?php echo $row['ID'] ?>" style="margin-left: 20px;color: black;" name="delete_product">Delete</a>

                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content" style="width:900px;margin-left:-100px;">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form method="POST" action="update_product.php" enctype="multipart/form-data">        
                                            <?php
                                                $id = $row['ID'];
                                                $query=mysqli_query($conn,"SELECT * FROM product_details where ID='$id'");
                                                if (mysqli_num_rows($query) == 0){
                                                       echo '<script>alert("No record Found")</script>';
                                                   }
                                                 else{
                                                     while($row=mysqli_fetch_assoc($query))
                                            {?>                               
                                            <div class="modal-body">
                                                <table>
                                                   
                                                        <tr>
                                                            <td><h6>Product Name</h6></td>
                                                            <td><input type="text" class="form-control form-control-lg" id="pname" name="p_name" value="<?php echo $row['p_name']; ?>">
                                                            
                                                        </tr>
                                                        <tr>
                                                            <td><h6>Product Description</h6></td>
                                                            <td><input type="text" class="form-control form-control-lg" id="pdetails" name="p_description" value="<?php echo $row['p_description']; ?>">
                                                                <span id="pdetailserror" style="color:red;"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td><h6>Product Price</h6></td>
                                                            <td><input type="text" class="form-control form-control-lg" id="pprice" name="p_price" value="<?php echo $row['p_price']; ?>">
                                                                <span id="ppriceerror" style="color:red;"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td><h6>Select Company</h6></td>
                                                            <td>
                                                                        <select class="form-select company" id="company" name="p_company" aria-label="Default select example">
                                                                        <option selected>Select Company</option>
                                                                        <?php
                                                                                    
                                                                                    $name = $row['p_company'];
                                                                                    $query1=mysqli_query($conn,"SELECT * FROM company_details order by company_name='$name' ");
                                                                            
                                                                                    if (mysqli_num_rows($query1) == 0)
                                                                                    {
                                                                                        echo '<script>alert("No record Found")</script>';
                                                                                    }
                                                                                    else{
                                                                                        while($row1=mysqli_fetch_assoc($query1))
                                                                                        {?>
                                                                                                    
                                                                                    <option value="<?php echo $row1['company_name'];?>" selected> <?php echo $row1['company_name']; ?></option>

                                                                                <?php } }  ?>
                                                                        </select><br><br>
                                                                        <span id="company_error" style="color:red;"></span>
                                                                        
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><h6>Select Category</h6></td>
                                                            <td>
                                                                    <select class="form-select Category" id="category" name="p_category" aria-label="Default select example">
                                                                        <option selected>Select Category</option>
                                                                        <?php
                                                                            $name1 = $row['p_category'];
                                                                            $query2=mysqli_query($conn,"SELECT * FROM category_details order by c_name='$name1'");
                                                                            
                                                                            if (mysqli_num_rows($query2) == 0){
                                                                                echo '<script>alert("No record Found")</script>';
                                                                            }
                                                                            else{
                                                                                while($row2=mysqli_fetch_assoc($query2))
                                                                                {?>
                                                                                    <option value="<?php echo $row2['c_name'];?>" selected><?php echo $row2['c_name']; ?></option>
                                                                        <?php } } ?>
                                                                    </select><br><br>
                                                                    <span id="category_error" style="color:red;"></span>
                                                                    
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><h6>Product Image 1</h6></td>
                                                            <td><input type="file" class="form-control form-control-lg" id="pimage1" name="p_image_1">
                                                            <td><img src=<?php echo $path.$row['p_image_1']; ?> style="width: 100px;height: 100px;" >
                                                                <input type="hidden" value="<?php echo $row['p_image_1']; ?>" name = "old_p_image_1"></td>
                                                                
                                                        </tr>
                                                        <tr>
                                                            <td><h6>Product Image 2</h6></td>
                                                            <td><input type="file" class="form-control form-control-lg" id="pimage2" name="p_image_2">
                                                            <td><img src=<?php echo $path.$row['p_image_2']; ?> style="width: 100px;height: 100px;">
                                                            <input type="hidden" value="<?php echo $row['p_image_2']; ?>" name = "old_p_image_2"></td>
                                                                
                                                        </tr>
                                                        <tr>
                                                            <td><h6>Product Image 3</h6></td>
                                                            <td><input type="file" class="form-control form-control-lg" id="pimage3" name="p_image_3">
                                                            <td><img src=<?php echo $path.$row['p_image_3']; ?> style="width: 100px;height: 100px;" >
                                                            <input type="hidden" value="<?php echo $row['p_image_3']; ?>" name = "old_p_image_3"></td>
                                                        </tr>                            
                                                </table>
                                            </div>
                                            
                                            <div class="modal-footer">
                                                <a type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                                                <button type="submit" class="btn btn-primary"  name="update" value="<?php echo $row['ID'];?>">Update</button>
                                            </div>
                                            <?php } } ?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </tr>
                    <?php } } ?>
                    </table>
                    
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer_area clearfix">
        <div class="container">
            <div class="row">
                <!-- Single Widget Area -->
                <div class="col-12 col-md-6">
                    <div class="single_widget_area d-flex mb-30">
                        <!-- Logo -->
                        <div class="footer-logo mr-50">
                            <a href="#"><h3 style="color:white;">Lapitech</h3></a>
                        </div>
                        <!-- Footer Menu -->
                        <!-- <div class="footer_menu">
                            <ul>
                                <li><a href="shop.html">Shop</a></li>
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </div> -->
                    </div>
                </div>
                <!-- Single Widget Area -->
                <div class="col-12 col-md-6">
                    <div class="single_widget_area mb-30">
                        <ul class="footer_widget_menu">
                            <li><a href="#">Order Status</a></li>
                            <li><a href="#">Payment Options</a></li>
                            <li><a href="#">Shipping and Delivery</a></li>
                            <li><a href="#">Guides</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms of Use</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row align-items-end">
                <!-- Single Widget Area -->
                <div class="col-12 col-md-6">
                    <div class="single_widget_area">
                        <div class="footer_heading mb-30">
                            <h6>Subscribe</h6>
                        </div>
                        <div class="subscribtion_form">
                            <form action="#" method="post">
                                <input type="email" name="mail" class="mail" placeholder="Your email here">
                                <button type="submit" class="submit"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Single Widget Area -->
                <div class="col-12 col-md-6">
                    <div class="single_widget_area">
                        <div class="footer_social_area">
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Youtube"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>

<div class="row mt-5">
                <div class="col-md-12 text-center">
                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Made with <i class="fa fa-heart-o" aria-hidden="true"></i> </a>
    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>

        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Classy Nav js -->
    <script src="js/classy-nav.min.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>

</body>

</html>