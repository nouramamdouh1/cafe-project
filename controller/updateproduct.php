<?php 
session_start();

include "./../model/products/product_operations.php";

    if(isset($_POST)){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];

        $_SESSION['errors_updated']['product'] =[];

         /////select form db

         $query = 'SELECT * FROM products WHERE id = ?'  ;          
         $sql = $db->prepare($query);
         $result  = $sql->execute([$id]);
         
         $product = $sql->fetch();

        
         if ($_FILES['image']['size'] > 0) {
            $allowed_image_extension = array(
                "png",
                "jpg",
                "jpeg"
            );
            
            // Get image file extension
            $file_extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
                
            // Validate file input to check if is with valid extension
            if (! in_array($file_extension, $allowed_image_extension)) {
                $_SESSION['updated_user_error'][0] = "image must be png or jpg or jpeg";
                $errors = 1;
            } 

            $target =  "./../images/" . time() .'.' . $file_extension;
            $result=move_uploaded_file($_FILES["image"]["tmp_name"], $target);

            
            if ($result) {
                $errors = 0;
                $image = $target;
            
            }
            
            
        }else{
            $image = $product['image'];
           
        }
        if(!empty($_POST['category'])){
            $category_id = $_POST['category'];
        }else{
            $category_id = $product['category_id'];
        }
         if(!empty($name) && !empty($price) && !empty($category_id)){
            $query = "UPDATE  products SET `name` = ? ,`price` = ? ,`category_id` = ?  ,`image` = ?  WHERE `id` = ?";

            $updated =  $db->prepare($query)->execute([$name,$price,$category_id,$image,$id]);

            if($updated){

                $_SESSION['updated_product'] = 'Success updated product';;
                $table_url='./../view/all_products.php';
                header("location:$table_url");


            }
        }else{
            $_SESSION['updated_product_error'][1] = ' try again';
            $form='./../view/editproduct.php';
            header("location:$form");
        }
    }

?>