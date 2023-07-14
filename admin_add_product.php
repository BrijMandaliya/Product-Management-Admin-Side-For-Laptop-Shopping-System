<!DOCTYPE html>
<html lang="en">
<head>    
    <title>Lapitech</title>

    <link rel="icon" href="img/core-img/iconlogo.jpg">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">
    <style style="css/text">
    tr{
        padding: 50px;
    }
    td{

        padding: 20px;
    }
    
    table{
        color: black;
        margin-top:30px;
    }
    
.Category,.company
{
    margin-left: 100px;
    width: 250px;
    height: 40px;   
    background: none;
    text-align: center;
    border: 2px solid white;
}
.Category:hover,.company:hover
{
    background-color: white;
}
    </style>

</head>

<body>
       <?php include 'admin_header.php';
            include 'connn.php';
       ?>

      
    <section class="vh-100 gradient-custom" style="margin-bottom: 600px;margin-left: -300px;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
              <div class="card text-white" style="border-radius: 1rem;background-color: #cdd4cf;width: 800px;height: 1200px;">
                <div class="card-body p-5 text-center">
                  <div class="mb-md-5 mt-md-4 pb-5">
                    <h2 class="fw-bold mb-2 text-uppercase">Add Product</h2>
                    <form method="POST" action="add_product.php" enctype="multipart/form-data">
                        <table>
                            <tr>
                                <td><h6>Product Name</h6></td>
                                <td><input type="text" class="form-control form-control-lg" id="pname" name="p_name">
                                <span id="pnameerror" style="color:red;"></span></td>
                            </tr>
                            <tr>
                                <td><h6>Product Description</h6></td>
                                <td><input type="text" class="form-control form-control-lg" id="pdetails" name="p_description">
                                    <span id="pdetailserror" style="color:red;"></span></td>
                            </tr>
                            <tr>
                                <td><h6>Product Price</h6></td>
                                <td><input type="text" class="form-control form-control-lg" id="pprice" name="p_price">
                                    <span id="ppriceerror" style="color:red;"></span></td>
                            </tr>
                            <tr>
                                <td><h6>Select Company</h6></td>
                                <td>
                                            <select class="form-select company" id="company" name="p_company" aria-label="Default select example">
                                            <option selected>Select Company</option>
                                            <?php
                                                $query=mysqli_query($conn,"SELECT * FROM company_details");
                                                
                                                if (mysqli_num_rows($query) == 0){
                                                    echo '<script>alert("No record Found")</script>';
                                                }
                                                else{
                                                    while($row=mysqli_fetch_assoc($query))
                                                    {?>

                                                        <option value="<?php echo $row['company_name'];?>" > <?php echo $row['company_name']; ?></option>

                                                    <?php } } ?>
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
                                                $query=mysqli_query($conn,"select * from category_details");
                                                
                                                if (mysqli_num_rows($query) == 0){
                                                    echo '<script>alert("No record Found")</script>';
                                                }
                                                else{
                                                    while($row=mysqli_fetch_assoc($query))
                                                    {?>
                                            <option value="<?php echo $row['c_name'];?>"><?php echo $row['c_name']; ?></option>
                                            <?php } } ?>
                                        </select><br><br>
                                        <span id="category_error" style="color:red;"></span>
                                        
                                </td>
                            </tr>
                            <tr>
                                <td><h6>Product Image 1</h6></td>
                                <td><input type="file" class="form-control form-control-lg" id="pimage1" name="p_image_1">
                                    <span id="pimage1error" style="color:red;"></td>
                            </tr>
                            <tr>
                                <td><h6>Product Image 2</h6></td>
                                <td><input type="file" class="form-control form-control-lg" id="pimage2" name="p_image_2">
                                    <span id="pimage2error" style="color:red;"></td>
                            </tr>
                            <tr>
                                <td><h6>Product Image 3</h6></td>
                                <td><input type="file" class="form-control form-control-lg" id="pimage3" name="p_image_3">
                                    <span id="pimage3error" style="color:red;"></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <button class="btn btn-outline-light btn-lg px-5" type="submit" style="margin-bottom: 30px; color: black;" onclick="Validate()" name="submit">Submit</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    

    <?php include 'footer.php' ?>

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
        <script type="text/javascript">
            function Validate()
            {
                if($("#pname").val()=="")
                {
                    $("#pnameerror").text("Enter Product Name");
                    
                }
                if($("#pname").val()=="")
                {
                    $("#pdetailserror").text("Enter Product Description");
                }
                if($("#pprice").val()=="")
                {
                    $("#ppriceerror").text("Enter Product Price");
                }
                if(category.selectedIndex == 0 )
                {
                    $("#category_error").text("Select Category");
                }
                if(company.selectedIndex == 0)
                {
                    $("#company_error").text("Select Company");
                }
                if($(pimage1.value == null))
                {
                    $("#pimage1error").text("Select Image 1");
                }
                if($(pimage2.value == null))
                {
                    $("#pimage2error").text("Select Image 2");
                }
                if($(pimage3.value == null))
                {
                    $("#pimage3error").text("Select Image 3");
                }
               
                
            }
        </script>
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