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

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="apple-touch-icon" href="apple-touch-icon.png" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap-theme.min.css" />
    <link rel="stylesheet" href="css/fontAwesome.css" />
    <!-- <link rel="stylesheet" href="css/hero-slider.css" />
    <link rel="stylesheet" href="css/owl-carousel.css" /> -->
    <!-- <link rel="stylesheet" href="css/datepicker.css" /> -->
    <link rel="stylesheet" href="css/tooplate-style.css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet" />
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>

<body>
    <form action="inex1.php" method="post">
        <section class="page-heading" id="top">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <nav>
                            <div class="logo">
                                <h1>
                                    Digital advertising Management system
                                    Id:
                                    <?php echo $_SESSION["ADVERTISERS_id"] ?>
                                </h1>
                                <a href="logout.php">
                                    <input type="button" class="view__all" value="Log Out">
                                </a>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </section>

        <section class="memories">
            <div class="section__container memories__container">
                <div class="memories__header">
                    <h1 class="section__header">
                        Manage your Digital Ads
                    </h1>
                    <button class="view__all">Manage</button>
                </div>
                <div class="memories__grid">
                    <!-- <div class="memories__card">
                    <span><i class="ri-calendar-2-line"></i></span>
                    <h4>User Entery</h4>
                    <p>
                        <button class="view__all"><a href="users.php">User Entry</a></button>
                    </p>
                </div>
                <div class="memories__card">
                    <span><i class="ri-shield-check-line"></i></span>
                    <h4>Advertiser's Entery</h4>
                    <p>
                        <button class="view__all"><a href="advertiser.php">Advertiser's Entry</a></button>
                    </p>
                </div> -->
                    <div class="memories__card">
                        <span><i class="ri-bookmark-2-line"></i></span>
                        <h4>My Campaign</h4>
                        <p>
                            <a href="campaign.php">
                                <input type="button" class="view__all" value="My Campaign's" name="save">
                            </a>
                            <!-- <button class=" view__all"><a href="campaign.php">My Campaign's</a></button> -->
                        </p>
                    </div>
                    <div class="memories__card">
                        <span><i class="ri-bookmark-2-line"></i></span>
                        <h4>My Adset</h4>
                        <p>
                            <a href="adset.php">
                                <input type="button" class="view__all" value="My Adset's" name="save">
                            </a>
                            <!-- <button class="view__all"><a href="adset.php">My Adset</a></button> -->
                        </p>
                    </div>
                    <div class="memories__card">
                        <span><i class="ri-bookmark-2-line"></i></span>
                        <h4>My Ad's</h4>
                        <p>
                            <a href="ads.php">
                                <input type="button" class="view__all" value="My Ad's" name="save">
                            </a>
                            <!-- <button class="view__all"><a href="ads.php">My Ad's </a></button> -->
                        </p>
                    </div>
                </div>
            </div>
            <div class="memories__card">
                <?php
                $ADVERTISERS_id = $_SESSION["ADVERTISERS_id"];

                $sql1 = "SELECT * FROM `campaign` where ADVERTISERS_id = $ADVERTISERS_id";
                $result = mysqli_query($conn, $sql1);

                $rows = mysqli_num_rows($result);


                echo "<center><h1>CAMPAIGN DATALIST</h1></center><br>";

                if($rows > 0)
                {
                    echo
                    "<center>
                    <table border=1 width=80% class=datalist_table>
                    <tr>
                        <th>Campaign id</th>
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
                else{
                        echo '<script>
                                alert("There are no Campaigns on this ID); 
                            </script>';
                }
                // }
                // if ($rows == 0) {
                //     // If there are no campaigns associated with the advertiser ID, show error message
                //     // echo "Error: No campaigns found for advertiser ID: $advertiser_id";
                //     echo '<script>
                //                 alert("There are no Campaigns on this ID!!!");
                //             </script>';
                // }
                ?>
            </div> <br><br><br><br>
            <div class="memories__card">
                <?php
                $ADVERTISERS_id = $_SESSION["ADVERTISERS_id"];
                $sql1= "SELECT * FROM adset WHERE CAMPAIGN_id IN ( SELECT CAMPAIGN_id FROM campaign WHERE ADVERTISERS_id = $ADVERTISERS_id );";
                $result = mysqli_query($conn, $sql1);

                $rows = mysqli_num_rows($result);

                echo "<center>
                    <h1>ADSET DATALIST</h1> <br>
                </center>";


                if($rows > 0)
                {
                echo
                "<center>
                    <table border=1 width=80% class=datalist_table>
                        <tr>
                            <th>ADset id</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Type</th>
                            <th>Campaign id</th>
                        </tr>";
                        while($row = mysqli_fetch_assoc($result))
                        {
                        echo
                        "<tr>
                            <td>". $row["ADSET_id"]."</td>
                            <td>".$row["ADSET_name"]."</td>
                            <td>".$row["ADSET_Description"]."</td>
                            <td>".$row["ADSET_type"]."</td>
                            <td>".$row["CAMPAIGN_id"]."</td>
                        </tr>";
                        }
                        echo
                        "
                    </table>
                </center>";
                }
            ?>
            </div> <br><br><br><br>
            <div class="memories__card">
                <?php
                    $ADVERTISERS_id = $_SESSION["ADVERTISERS_id"];
                    $sql2 = "SELECT a.*
                    FROM ads a
                    JOIN adset ad ON a.ADSET_id = ad.ADSET_id
                    JOIN campaign c ON ad.CAMPAIGN_id = c.CAMPAIGN_id
                    JOIN advertisers adv ON c.ADVERTISERS_id = adv.ADVERTISERS_id
                    WHERE adv.ADVERTISERS_id = $ADVERTISERS_id;
                    ";
                    $sql1 = "SELECT * FROM ads WHERE ADSET_id IN ( SELECT CAMPAIGN_id FROM campaign WHERE ADVERTISERS_id = $ADVERTISERS_id );";
                    $result = mysqli_query($conn, $sql2);

                    $rows = mysqli_num_rows($result);

                    echo "<center><h1>AD's DATALIST</h1></center> <br>";

                    if($rows > 0)
                    {
                        echo
                        "<center>
                        <table border=1 width=80% class=datalist_table>
                        <tr>
                            <th>AD's id</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>file</th>
                            <th>ADSet id</th>
                            <th>User id</th>
                        </tr>";
                        while($row = mysqli_fetch_assoc($result))
                        {
                            echo
                            "<tr>
                                <td>". $row["AD_id"]."</td>
                                <td>".$row["AD_title"]."</td>
                                <td>".$row["AD_description"]."</td>
                                <td>".$row["AD_file"]."</td>
                                <td>".$row["AD_file"]."</td>
                                <td>".$row["USER_id"]."</td>
                            </tr>";
                        }
                        echo
                        "</table>
                        </center>";
                    }
                ?>
            </div>
            <br><br><br><br>
            <div class="memories__card">
                <?php
                    $ADVERTISERS_id = $_SESSION["ADVERTISERS_id"];
                    $sql1 = "SELECT DISTINCT u.*
                    FROM users u
                    JOIN ads a ON u.USER_id = a.USER_id
                    JOIN adset ad ON a.ADSET_id = ad.ADSET_id
                    JOIN campaign c ON ad.CAMPAIGN_id = c.CAMPAIGN_id
                    JOIN advertisers adv ON c.ADVERTISERS_id = adv.ADVERTISERS_id
                    WHERE adv.ADVERTISERS_id = $ADVERTISERS_id
                    ORDER BY u.USER_id ASC;
                    ";
                    $result = mysqli_query($conn, $sql1);

                    $rows = mysqli_num_rows($result);
                    
                    
                    echo "<center><h1>USERS DATALIST</h1></center> <br>";
                    
                    if($rows > 0)
                    {
                        echo
                        "<center>
                        <table border=1 width=80% align=center class=datalist_table>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Email</th>
                            <th>Ph no.</th>
                            <th>Country</th>
                        </tr>";
                        while($row = mysqli_fetch_assoc($result))
                        {
                            echo
                            "<tr>
                                <td>". $row["USER_id"]."</td>
                                <td>".$row["USER_name"]."</td>
                                <td>".$row["USER_gender"]."</td>
                                <td>".$row["USER_Email"]."</td>
                                <td>".$row["USER_number"]."</td>
                                <td>".$row["USER_address"]."</td>
                            </tr>";
                        }
                        echo
                        "</table>
                        </center>";
                    }
                ?>
            </div>
        </section>
    </form>
</body>

</html>


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
    --dark-bluesh:
        #223e52;
}

* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}

.page-heading {
    background-image:
        url(background\ 2.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    background-position:
        center center;
    text-align: center;
    position: relative;
}

.page-heading .logo {
    padding: 60px 0px;
    text-align: left;
}

.logo {
    width: 100%;
    justify-content: space-between;
    font-size: 2rem;
    font-weight:
        600;
    color: var(--white);
    align-items: center;
    display: flex;
}

nav {
    max-width: var(--max-width);
    margin: auto;
    padding: 1rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap:
        1rem;
}

.memories {
    background-color: var(--extra-light);
}

.memories__header {
    display: flex;
    align-items: center;
    justify-content: space-around;
    padding-top: 50px;
}

.memories__header .section__header {
    max-width: 700px;
    font-weight: 650;
}

.view__all {
    padding: 1rem 5rem;
    font-size:
        15px;
    font-weight: 500;
    color: var(--text-dark);
    background: transparent;
    white-space: nowrap;
    outline:
        none;
    border: 1px solid var(--text-light);
    border-radius: 2rem;
    box-shadow: 5px 5px 30px rgba(0, 0, 0,
            0.1);
    cursor: pointer;
}

a {
    color: black;
    text-decoration: none;
}

.view__all:hover {
    color:
        var(--white);
    background-color: var(--light-orange);
    transition: 0.4s;
}

.memories__grid {
    margin-top:
        4rem;
    padding-bottom: 4rem;
    margin-left: 6rem;
    margin-right: 6rem;
    display: grid;
    grid-template-columns:
        repeat(3, 1fr);
    gap: 2rem;
}

.memories__card {
    padding: 5rem 4rem;
    text-align: center;
    border-radius:
        15rem;
    background-color: var(--white);
    box-shadow: 5px 5px 30px rgba(0, 0, 0, 0.05);
}

.memories__card:hover {
    animation: bounce 0.6s ease;
}

@keyframes bounce {
    0% {
        transform:
            translateY(0);
    }

    25% {
        transform: translateY(-10px);
    }

    50% {
        transform: translateY(0);
    }

    75% {
        transform: translateY(-5px);
    }

    100% {
        transform: translateY(0);
    }
}

.memories__card span {
    display:
        inline-block;
    padding: 20px 32px;
    margin-bottom: 2rem;
    font-size: 5rem;
    color: var(--white);
    background-color: #d46b6b;
    border-radius: 100%;
}

.memories__card:nth-child(2) span {
    background-color:
        #e98b6d;
}

.memories__card:nth-child(3) span {
    background-color: #ffcca3;
}

.memories__card h4 {
    margin-bottom: 1.5rem;
    font-size: 2.5rem;
    font-weight: 700;
    color: var(--text-dark);
}

.memories__card p {
    color: var(--text-light);
    font-size: 15px;
    line-height: 2.75rem;
}

.memories__card .datalist_table {
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
</style>