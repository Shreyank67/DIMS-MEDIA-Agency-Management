<!DOCTYPE html>
<html>

<head>
    <title>Campaign Registration</title>
</head>

<body>
    <div class="memory_back">
        <div class='memories__card'>
            <div align="center">
                <h1>Campaign Entery Form</h1>
            </div>
            <form action="insert_campaign.php" method="post" class="insert_form">
                <table align="center" style="font-size: 20px;" width="25%" class="form_table">
                    <tr>
                        <td>
                            <label>Campaign id</label>
                        </td>
                        <td><input type="text" name="CAMPAIGN_id" /></td>
                    </tr>

                    <tr>
                        <td>
                            <label>Advertiser id</label>
                        </td>
                        <td><input type="number" name="ADVERTISERS_id" /></td>
                    </tr>

                    <tr>
                        <td>
                            <label>Campaign Name</label>
                        </td>
                        <td><input type="text" name="CAMPAIGN_name" /></td>
                    </tr>

                    <tr>
                        <td>
                            <label>Campaign Start Date</label>
                        </td>
                        <td><input type="date" name="CAMPAIGN_start" /></td>
                    </tr>

                    <tr>
                        <td>
                            <label>Campaign End Date</label>
                        </td>
                        <td><input type="date" name="CAMPAIGN_end" /></td>
                    </tr>

                    <tr>
                        <td>
                            <label>Campaign Budget</label>
                        </td>
                        <td><input type="number" name="CAMPAIGN_budget" /></td>
                    </tr>

                    <tr>
                        <td colspan="2" align="center" class="submit_btn">
                            <input type="submit" name="save" value="Submit" class="submit_btn" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>

</html>

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

    $sql1 = "SELECT * FROM `campaign`";
    $result = mysqli_query($conn, $sql1);

    $rows = mysqli_num_rows($result);
    
    
    echo "<center><h1>CAMPAIGN DATALIST</h1></center>";
    
    if($rows > 0)
    {
        echo
        "<center>
        <table border=1 width=80% class=datalist_table>
        <tr>
            <th>Campaign id</th>
            <th>Advertiser's id</th>
            <th>Name</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Budget</th>
        </tr>";
        while($row = mysqli_fetch_assoc($result))
        {
            echo
            "<tr>
                <td>". $row["CAMPAIGN_id"]."</td>
                <td>".$row["ADVERTISERS_id"]."</td>
                <td>".$row["CAMPAIGN_name"]."</td>
                <td>".$row["CAMPAIGN_start"]."</td>
                <td>".$row["CAMPAIGN_end"]."</td>
                <td>".$row["CAMPAIGN_budget"]."</td>
            </tr>";
        }
        echo
        "</table>
        </center>";
    }
?>
<style>
@import url(" https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap");

:root {
    --primary-color: #3d5cb8;
    --primary-color-dark: #334c99;
    --text-dark: #0f172a;
    --text-light: #64748b;
    --extra-light: #f1f5f9;
    --white: #ffffff;
    --max-width: 1200px;
    --light-orange: #d46b6b;
    --dark-bluesh: #223e52;
}

* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}

.datalist_table {
    border-spacing: 1;
    border-collapse: collapse;
    background: #d46b6b;
    border-radius: 6px;
    overflow: hidden;
    max-width: 80%;
    width: 100%;
    margin: 0 auto;
    position: relative;
    text-align: center;
    font-size: 25px;
    border-color: #f1f5f9;

    th {
        background-color: #ffcca3;
    }
}

.memory_back {
    background-color: var(--extra-light);
}

.memories__card {
    padding: 5rem 4rem;
    text-align: center;
    border-radius: 15rem;
    background-color: var(--white);
    box-shadow: 5px 5px 30px rgba(0, 0, 0, 0.25);
    justify-content: space-around;
    align-items: center;
    margin-top: 10px;
    margin-bottom: 20px;
}

.insert_form {
    margin-top: 10px;
    justify-content: center;
    width: 100%;
    align-items: center;
    display: flex;
}

.insert_form .submit_btn {
    font-size: 20px;
    margin-top: 10px;
    padding-left: 5px;
    padding-right: 5px;
    border-radius: 15px;
}

.form_table {
    border-spacing: 1;

    td {
        text-align: left;
    }

    .submit_btn {
        text-align: center;
        align-items: center;
    }
}
</style>