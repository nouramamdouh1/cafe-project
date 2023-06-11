<?php
 include"./../layouts.php";
 include"./../model/products/product_operations.php";


 

// $name = $_POST['name'];
// $image = $_FILES['image']['tmp_name'];
// $imagePath = 'uploads/' . $_FILES['image']['name'];
// $price = $_POST['price'];
// $quantity = $_POST['quantity'];
// $category_id = $_POST['category_id'];




session_start();
$db= connect_to_database($dbuser,$dbpassword,$dbhost,$dbname);
    if(isset($_POST)){
        $name = $_POST['name'];
        $price = $_POST['price'];
        $category = $_POST['category'];
        $quantity=$_POST['quantity'];
        $errors =0;
        $image=0;

        ///image 
        $_SESSION['errors']['image'] =[];
        if (isset($_FILES["image"])) {

            echo"gggggggggggggggggggggggg";
            $allowed_image_extension = array(
                "png",
                "jpg",
                "jpeg"
            );
            
            // Get image file extension
            $file_extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
            
            // Validate file input to check if is not empty
            if (! file_exists($_FILES["image"]["tmp_name"])) {
                echo"error";
                $_SESSION['errors']['product'][0] = "choose an image plz";
                $errors = 1;
                

            }    
            // Validate file input to check if is with valid extension
            else if (! in_array($file_extension, $allowed_image_extension)) {
                $_SESSION['errors']['product'][1] = "image must be png or jpg or jpeg";
                $errors = 1;

            }   
  

             var_dump($_FILES["image"]);
             $target =  "./../images/" . time() .'.' . $file_extension;
           $result=move_uploaded_file($_FILES["image"]["tmp_name"], $target);
         
           

           
            if ($result) {
                
                $errors = 0;
                $image = $target;
            
            }
            
        }else{
            $_SESSION['errors']['image']['choose'] = "choose an image please";
            echo"helooooooooooooo22222222222";
            // header('location:add_product.php');
            $errors = 1;
        }

        if(empty($_FILES['image'])){
            echo"ssssssssssss";
            // header('location:add_product.php');
            $errors = 1;
        }



            if(!empty($name) && !empty($price) && !empty($category) && $errors ==0  ){
                $query = "INSERT INTO  products (`name`,`price`,`category_id`,`quantity`,`image`) VALUES (?,?,?,?,?)  ";
    
                $inserted =  $db->prepare($query)->execute([$name,$price,$category,$quantity,$target]);
    
                if($inserted){
    
                        $_SESSION['inserted_product'] = 'Success inserted product';;
                        $data_url='./../view/all_products.php';
                        header("location:$data_url");
    
                }else{
                    $_SESSION['errors']['product'][3] = 'not added product  try again';
                    $create_url='./../view/createproduct.php';
                    header("location:$create_url");
                }
            }
            else{
                $_SESSION['errors']['product'][4] = 'you cant add empty field  try again';
                $create_url='./../view/createproduct.php';
                header("location:$create_url");
                
            }


        


        
              
            

        

    }



?>



