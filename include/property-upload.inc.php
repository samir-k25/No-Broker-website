<?

if(isset($_POST['submit'])){
    $newfileName = $_POST['filename'];
    if (empty($_POST($newfileName))){
        $newfileName = "property";
    }
    else {
        $newfileName = strtolower(str_replace(" ", "-", $newfileName))
    }
    $propertyTitle = $_POST['']
    $propertyAddress1 = $_POST['address1'];
    $propertyAddress2 = $_POST['address2'];
    $propertyStreet = $_POST['street'];
    $propertyCity = $_POST['city'];
    $propertyState = $_POST['state'];
    $sellerName = $_POST['name'];
    $sellerPhone = $_POST['phone'];
    $propertyPrice = $_POST['price'];
    $propertyType = $_POST['apartmenttype'];
    $propertyBedroom = $_POST['bedroom'];

    $file = $_FILES['file'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file'size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowed)){
        if ($fileError === 0){
            if ($fileSize < 100000){
                $fileNameNew = $newfileName . "." . uniqid('', true) . "." . $fileActualExt;
                $fileDestination = '../uploads/'.$fileNameNew;

                
                $serverName = "localhost";
                $dBUsername = "root";
                $dBPassword = "";
                $dBName = "property";

                $conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

                if(!$conn){
                    die("Connection failed: ".mysqli_connect_error());
                }

                if (empty($propertyPrice)) {
                    header("Location: ../gallery.php?error=emptyfield");
                    exit();
                }
                else{
                    $sql = "SELECT * FROM apartment;";
                    $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt, $conn)) {
                        echo "SQL statement failed.";
                    }
    
                    else {
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        $rowCount = mysqli_stmt_rows();
                        $setpropertycount = $rowCount + 1;
                        
                        $sql = "INSERT INTO property (imgfullname, address1, address2, street, city, country_state, seller_name, seller_number, price, apartment_type, no_of_bedroom, order_post) VALUES (?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?);";
                        if(!mysqli_stmt_prepare($stmt, $conn)) {
                            echo "SQL statement error";
                        }
                        else {
                            mysqli_stmt_bind_param($stmt, "sssssssssss", $propertyAddress1, $propertyAddress2, $propertyStreet, $propertyCity, $propertyState, $sellerName, $sellerPhone, $propertyPrice, $propertyType, $propertyBedroom, $setpropertycount, $fileNameNew);
                            mysqli_stmt_execute($stmt);
                            
                            move_uploaded_file($fileTmpName, $fileDestination);
                            header("Location:gallery.php?uploadsuccess");
    
                        }
                    }

                }



            }
            else{
                echo '<script>alert("File too big!")</script>';
                exit();
            }
        }
        else{
            echo '<script>alert("There was an error uploading your file....try again!")</script>';
            exit();
        }
    }
    else{
        echo '<script>alert("You cannot upload this type of file...try again!")</script>';
        exit();
    }
}