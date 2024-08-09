<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dam";

session_start();

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn)
{
die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['save']))
    {	
        $ADVERTISERS_id = $_POST['ADVERTISERS_id'];
        $ADVERTISERS_Email = $_POST['ADVERTISERS_Email'];

        $sql = "select * from advertisers where ADVERTISERS_Email  = '$ADVERTISERS_Email' and ADVERTISERS_id = '$ADVERTISERS_id'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);
        
        if($count == 1){  
            // header("Location:localhost/index1.php");
            $_SESSION["ADVERTISERS_id"] = $ADVERTISERS_id;
            
            echo  '<script>
                        window.location.href = "index1.php";
                        alert("Login successfull")
                    </script>';
        }  
        else{  
            echo  '<script>
                        window.location.href = "login.php";
                        alert("Login failed. Invalid username or password!!")
                    </script>';
        }     
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>AVIBOOK LOGIN</title>
</head>

<body>
    <section>
        <div class="form-box">
            <div class="left">
                <div class="overlay">
                    <p style="font-size:55px">
                        Digital Ads Manger
                    </p>
                    <p> Manage your digital ads with us</p>
                    <span>
                        <p>login with social media</p>
                        <a href=" https://www.facebook.com/">
                            <ion-icon name="logo-facebook"></ion-icon>
                        </a>
                        <a href="https://www.google.co.in/">
                            <ion-icon name="logo-google"></ion-icon>
                        </a>
                        <a href="https://twitter.com/">
                            <ion-icon name="logo-twitter"></ion-icon>
                        </a>
                    </span>

                </div>
            </div>

            <div class="form-value">
                <form action="login.php" onsubmit="return isvalid()" method="POST">
                    <h2>Login </h2>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" name="ADVERTISERS_Email" required>
                        <label for="">Advertiser Email</label>
                    </div>
                    <div class=" inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="ADVERTISERS_id" required>
                        <label for="">Advertiser id</label>
                    </div>
                    <div class="forget">
                        <label for="">
                            <input type="checkbox"> Remember Me &emsp;&emsp;&emsp;&emsp;
                            <a href="advertiser.php">Forget email / id</a>
                        </label>
                    </div>
                    <!-- <a href="index1.php"> -->
                    <input type="submit" value="Log in" class="button" name="save">
                    <!-- </a> -->
                    <!-- <a href=" index.html"><button>Log in</button></a> -->
                    <div class="register">
                        <p>Don't have a account? <a href="advertiser.php">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>

<script>
function isvalid() {
    var user = document.form.ADVERTISERS_Email.value;
    var pass = document.form.ADVERTISERS_id.value;
    if (user.length == "" && pass.length == "") {
        alert(" Username and password field is empty!!!");
        return false;
    } else if (user.length == "") {
        alert(" Username field is empty!!!");
        return false;
    } else if (pass.length == "") {
        alert(" Password field is empty!!!");
        return false;
    }

}
</script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');

* {
    margin: 0;
    padding: 0;
    font-family: 'poppins', sans-serif;
}

section {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    width: 100%;
    background: url("background\ 2.jpg")no-repeat;
    background-position: center;
    background-size: cover;
}

.form-box {
    position: relative;
    width: 80%;
    height: 450px;
    background: transparent;
    border: 2px solid rgba(255, 255, 255, 0.5);
    border-radius: 20px;
    backdrop-filter: blur(15px);
    display: flex;
    /* justify-content: center; */
    align-items: center;

}

.form-box .left {
    color: #FFFFFF;
    text-align: left;
    margin-left: 0px;
    justify-content: left;
}

.form-box .left .overlay {
    padding-right: 200px;
    padding-left: 100px;
    width: 100%;
    height: 100%;
    overflow: hidden;
    box-sizing: border-box;
}

.form-box .left .overlay h1 {
    font-size: 7vmax;
    line-height: 1;
    font-weight: 900;
    margin-bottom: 20px;
}

.form-box .left .overlay span p {
    margin-top: 20px;
    font-weight: 900;
}

.form-box .left .overlay span a {
    color: #fff;
    background-color: transparent;
    padding-right: 50px;
    text-decoration: none;
}

.form-box .left .overlay span ion-icon {
    margin-top: 10px;
    font-size: 25px;
}

h2 {
    font-size: 2em;
    color: #fff;
    text-align: center;
}

.inputbox {
    position: relative;
    margin: 30px 0;
    width: 310px;
    border-bottom: 2px solid #fff;
}

.inputbox label {
    position: absolute;
    top: 50%;
    left: 5px;
    transform: translateY(-50%);
    color: #fff;
    font-size: 1em;
    pointer-events: none;
    transition: .5s;
}

input:focus~label,
input:valid~label {
    top: -5px;
}

.inputbox input {
    width: 100%;
    height: 50px;
    background: transparent;
    border: none;
    outline: none;
    font-size: 1em;
    padding: 0 35px 0 5px;
    color: #fff;
}

.inputbox ion-icon {
    position: absolute;
    right: 8px;
    color: #fff;
    font-size: 1.2em;
    top: 20px;
}

.forget {
    margin: -15px 0 15px;
    font-size: .9em;
    color: #fff;
    display: flex;
    justify-content: space-between;
}

.forget label input {
    margin-right: 3px;

}

.forget label a {
    color: #fff;
    text-decoration: none;
}

.forget label a:hover {
    text-decoration: underline;
}

.button {
    width: 100%;
    height: 40px;
    margin-top: 15px;
    border-radius: 40px;
    background: #fff;
    border: none;
    outline: none;
    cursor: pointer;
    font-size: 1em;
    font-weight: 600;
}

.button a {
    text-decoration: none;
    color: black;
}

.register {
    font-size: .9em;
    color: #fff;
    text-align: center;
    margin: 25px 0 10px;
}

.register p a {
    text-decoration: none;
    color: #fff;
    font-weight: 600;
}

.register p a:hover {
    text-decoration: underline;
}
</style>