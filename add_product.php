<?php
include 'connn.php';
    if(isset($_POST['submit']))
    {
        $prod_name = $_POST['p_name'];
        $prod_description = $_POST['p_description'];
        $prod_price = $_POST['p_price'];
        $prod_company = $_POST['p_company'];
        $prod_category = $_POST['p_category'];
        $image_file_1='';
        $image_file_2='';
        $image_file_3='';

        if($_FILES['p_image_1']['tmp_name']!="")
        {
            $Folder="img/product_images/";
            $image_file_1=$_FILES['p_image_1']['name'];
            $file_1=$_FILES['p_image_1']['tmp_name'];
            $path=$Folder.$image_file_1;
            $target_file=$Folder.basename($image_file_1);
            $imagefiletype=pathinfo($target_file,PATHINFO_EXTENSION);    
            move_uploaded_file($file_1,$target_file);
        }
        if($_FILES['p_image_2']['tmp_name']!="")
        {
            $Folder="img/product_images/";
            $image_file_2=$_FILES['p_image_2']['name'];
            $file_2=$_FILES['p_image_2']['tmp_name'];
            $path=$Folder.$image_file_2;
            $target_file=$Folder.basename($image_file_2);
            $imagefiletype=pathinfo($target_file,PATHINFO_EXTENSION);    
            move_uploaded_file($file_2,$target_file);
        }
        if($_FILES['p_image_3']['tmp_name']!="")
        {
            $Folder="img/product_images/";
            $image_file_3=$_FILES['p_image_3']['name'];
            $file_3=$_FILES['p_image_3']['tmp_name'];
            $path=$Folder.$image_file_3;
            $target_file=$Folder.basename($image_file_3);
            $imagefiletype=pathinfo($target_file,PATHINFO_EXTENSION);    
            move_uploaded_file($file_3,$target_file);
        }
        

        if($imagefiletype != "jpg" && $imagefiletype != "png" && $imagefiletype != "jpeg")
        {
            echo "<script> $('#pimage1error').text('Only accept jpg,png and jpeg')</script>";
            exit();
        }
        if($_FILES['p_image_1']['size']>1048576)
        {
            echo "<script> $('#pimage1error').text('Your file size is large')</script>";
            exit();
        }
        

       
        $query=mysqli_query($conn,"INSERT INTO `product_details`(`p_name`, `p_category`, `p_company`, `p_description`, `p_price`, `p_image_1`, `p_image_2`, `p_image_3`) VALUES ('$prod_name','$prod_category','$prod_company','$prod_description','$prod_price','$image_file_1','$image_file_2','$image_file_3')");

        if(isset($query))
        {
            
            echo '<script>alert("Product Added Successfully")</script>';
            echo '<script> window.location= "admin_product.php" </script>';
        }
        else
        {
            mysqli_error($query);
        }
        

        

    }

    if(isset($_GET['delete_product']))
    {
       


    }

?>
