<?php
include 'dbCreate.php';
if(isset($_POST['import-btn']))
{
    if($_FILES['file']['name'])
    {
        $arrFileName = explode('.',$_FILES['file']['name']);
        if($arrFileName[1] == 'csv')
        {
            $handle = fopen($_FILES['file']['tmp_name'], "r");
            while (($data = fgetcsv($handle, 10000, ",")) !== FALSE)
            {
                $name = mysqli_real_escape_string($connection,$data[0]);
                $price = mysqli_real_escape_string($connection,$data[1]);
                $image = mysqli_real_escape_string($connection,$data[2]);
                $category_id = mysqli_real_escape_string($connection,$data[3]);
                $quantity = mysqli_real_escape_string($connection,$data[4]);
                $description = mysqli_real_escape_string($connection,$data[5]);
                $is_featured = mysqli_real_escape_string($connection,$data[6]);
                
                $import="INSERT into products (name,price,image,category_id,quantity,description,is_featured) values('$name','$price','$image','$category_id','$quantity','$description','$is_featured')";
             
                $result = mysqli_query($connection, $import);
                if($result)
                {
                    echo "Import done";
                } else
                {
                    echo "Error: " . $import . "<br>" . $connection->error;
                    
                }
            }
              fclose($handle);
        }
    }
}
?>