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
        $USER_id = $_POST['USER_id'];
        $USER_name = $_POST['USER_name'];
        $USER_gender = $_POST['USER_gender'];
        $USER_Email = $_POST['USER_Email'];
        $USER_number = $_POST['USER_number'];
        $USER_address = $_POST['USER_address'];

        $sql_query = "INSERT INTO users (USER_id,USER_name,USER_gender,USER_Email,USER_number,USER_address)
        VALUES ('$USER_id','$USER_name','$USER_gender','$USER_Email','$USER_number','$USER_address')";

        // $sql1 = "SELECT * FROM `users`";
        // $result = mysqli_query($conn, $sql1);

        // $rows = mysqli_num_rows($result);
        
        // if($rows > 0)
        // {
        //     while($row = mysqli_fetch_assoc($result))
        //     {
        //         // $user_id = $row["user_id"];
        //         $userdata = "Id: ". $row["USER_id"]. "     Name: ".$row["USER_name"]. "     Email: ".$row["USER_Email"]. "<br>";
        //     }
        // }

        if (mysqli_query($conn, $sql_query)) 
        {
            // echo "New Details Entry inserted successfully !";
            echo '<script>
                    window.location.href = "user.php";
                    alert("New User Entry inserted successfully!")
                </script>';
        } 
        else
        {
            echo "Error: " . $sql . "" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
    
    $sql1 = "SELECT * FROM `users`";
    $result = mysqli_query($conn, $sql1);

    $rows = mysqli_num_rows($result);
    
    
    echo "<center><h1>USERS DATALIST</h1></center>";
    
    if($rows > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            $userdata = "&emsp;&emsp;Id: ". $row["USER_id"]. "&emsp;&emsp;&emsp;&emsp; Name: ".$row["USER_name"]. "&emsp;&emsp; Gender: ".$row["USER_gender"]. "&emsp;&emsp; Email: ".$row["USER_Email"]. "&emsp;&emsp; Ph no: ".$row["USER_number"]. "&emsp;&emsp; Country: ".$row["USER_address"].  "<br>";
            echo "<center>". $userdata. "</center>";
        }
    }
?>