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
        $CAMPAIGN_id = $_POST['CAMPAIGN_id'];
        $ADVERTISERS_id = $_POST['ADVERTISERS_id'];
        $CAMPAIGN_name = $_POST['CAMPAIGN_name'];
        $CAMPAIGN_start = $_POST['CAMPAIGN_start'];
        $CAMPAIGN_end = $_POST['CAMPAIGN_end'];
        $CAMPAIGN_budget = $_POST['CAMPAIGN_budget'];

        $sql_query = "INSERT INTO campaign (CAMPAIGN_id,ADVERTISERS_id,CAMPAIGN_name,CAMPAIGN_start,CAMPAIGN_end,CAMPAIGN_budget)
        VALUES ('$CAMPAIGN_id','$ADVERTISERS_id','$CAMPAIGN_name','$CAMPAIGN_start','$CAMPAIGN_end','$CAMPAIGN_budget')";

        if (mysqli_query($conn, $sql_query)) 
        {
            // echo "New Campaign Entry inserted successfully !";
            echo '<script>
                    window.location.href = "campaign.php";
                    alert("New Campaign Entry inserted successfully!")
                </script>';
        } 
        else
        {
            echo "Error: " . $sql . "" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
?>