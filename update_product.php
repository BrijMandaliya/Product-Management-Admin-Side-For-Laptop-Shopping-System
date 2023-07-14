<?php
    include 'connn.php';
    if(isset($_POST['update']))
    {
        $id = $_POST['update'];
        $prod_name = $_POST['p_name'];
        $prod_description = $_POST['p_description'];
        $prod_price = $_POST['p_price'];
        $prod_company = $_POST['p_company'];
        $prod_category = $_POST['p_category'];
        $image_file_1=$_POST['old_p_image_1'];
        $image_file_2=$_POST['old_p_image_2'];
        $image_file_3=$_POST['old_p_image_3'];
   
        if($_FILES['p_image_1']['tmp_name']!='')
        {
            $Folder="img/product_images/";
            $image_file_1=$_FILES['p_image_1']['name'];
            $file_1=$_FILES['p_image_1']['tmp_name'];
            $path=$Folder.$image_file_1;
            $target_file=$Folder.basename($image_file_1);
            $imagefiletype=pathinfo($target_file,PATHINFO_EXTENSION);    
            move_uploaded_file($file_1,$target_file);
        }
        if($_FILES['p_image_2']['tmp_name']!='')
        {
            $Folder="img/product_images/";
            $image_file_2=$_FILES['p_image_2']['name'];
            $file_2=$_FILES['p_image_2']['tmp_name'];
            $path=$Folder.$image_file_2;
            $target_file=$Folder.basename($image_file_2);
            $imagefiletype=pathinfo($target_file,PATHINFO_EXTENSION);    
            move_uploaded_file($file_2,$target_file);
        }
        if($_FILES['p_image_3']['tmp_name']!='')
        {
            $Folder="img/product_images/";
            $image_file_3=$_FILES['p_image_3']['name'];
            $file_3=$_FILES['p_image_3']['tmp_name'];
            $path=$Folder.$image_file_3;
            $target_file=$Folder.basename($image_file_3);
            $imagefiletype=pathinfo($target_file,PATHINFO_EXTENSION);    
            move_uploaded_file($file_3,$target_file);
        }
        
        
        $query=mysqli_query($conn,"UPDATE `product_details` SET `p_name`='$prod_name',`p_category`='$prod_category',`p_company`=' $prod_company',`p_description`='$prod_description',`p_price`='$prod_price',`p_image_1`='$image_file_1',`p_image_2`='$image_file_2',`p_image_3`='$image_file_3' WHERE ID='$id'");
        if(isset($query))
        {
            
            echo '<script>alert("Product Updated Successfully")</script>';
            echo '<script> window.location= "admin_product.php" </script>';
        }
        else
        {
            mysqli_error($query);
        }
    }
     

?>