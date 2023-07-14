<?php 
        include 'connn.php';
        $p_id = $_GET['id'];
        $query=mysqli_query($conn,"DELETE FROM `product_details` WHERE ID='$p_id'");

        if(isset($query))
        {
            
            echo '<script>alert("Product Deleted Successfully")</script>';
            echo '<script> window.location= "admin_product.php" </script>';
        }
        else
        {
            mysqli_error($query);
        }
?>