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
        $ADVERTISERS_id = $_POST['ADVERTISERS_id'];
        $ADVERTISER_name = $_POST['ADVERTISER_name'];
        $ADVERTISERS_Email = $_POST['ADVERTISERS_Email'];
        $ADVERTISER_number = $_POST['ADVERTISER_number'];
        

        $sql_query = "INSERT INTO advertisers (ADVERTISERS_id,ADVERTISER_name,ADVERTISERS_Email,ADVERTISER_number)
        VALUES ('$ADVERTISERS_id','$ADVERTISER_name','$ADVERTISERS_Email','$ADVERTISER_number')";

        if (mysqli_query($conn, $sql_query)) 
        {
            // echo "New Advertiser's Entry inserted successfully !";
            echo '<script>
                    window.location.href = "advertiser.php";
                    alert("New Advertisers Entry inserted successfully!")
                </script>';
        } 
        else
        {
            echo "Error: " . $sql . "" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
?>