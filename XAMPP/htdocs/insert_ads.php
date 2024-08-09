<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dam";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // // Check connection
    // if (!$conn) 
    // {
    //     die("Connection failed: " . mysqli_connect_error());
    // }
    
    // // Prepare and bind parameters
    // $stmt = $conn->prepare("INSERT INTO USERS (USER_name, USERS_gender, USER_Emaill, USER_number, USER_address) VALUES (?,
    // ?, ?, ?, ?)");
    // $stmt->bind_param("sssis", $name, $gender, $email, $number, $address);

    // // Set parameters and execute
    // $name = $_POST['name'];
    // $gender = $_POST['gender'];
    // $email = $_POST['email'];
    // $number = $_POST['number'];
    // $address = $_POST['address'];

    // $stmt->execute();

    // echo "New record created successfully";

    // $stmt->close();
    // $conn->close();

    if(isset($_POST['save']))
    {	
        $AD_id = $_POST['AD_id'];
        $AD_title = $_POST['AD_title'];
        $AD_description = $_POST['AD_description'];
        $AD_file = $_POST['AD_file'];
        $ADSET_id = $_POST['ADSET_id'];
        $USER_id = $_POST['USER_id'];

        $sql_query = "INSERT INTO ads (AD_id,AD_title,AD_description,AD_file,ADSET_id,USER_id)
        VALUES ('$AD_id','$AD_title','$AD_description','$AD_file','$ADSET_id','$USER_id')";

        if (mysqli_query($conn, $sql_query)) 
        {
            // echo "New Details Entry inserted successfully !";
            echo '<script>
                    window.location.href = "ads.php";
                    alert("New ADS Entry inserted successfully!")
                </script>';
        } 
        else
        {
            echo "Error: " . $sql . "" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
?>