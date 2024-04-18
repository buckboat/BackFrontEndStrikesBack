<?php


include dirname(__FILE__) . "/config.php";
$engine = new DBConnection();
$conn = $engine->connect();

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// 3. Total number of existing users
$total_users_query = mysqli_query($conn, "SELECT COUNT(*) as total_users FROM User");
$total_users_data = mysqli_fetch_assoc($total_users_query);
$total_users = $total_users_data['total_users'];

// Close connection after use
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lumberjack Rewards</title>
    <link href="style.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>


<!--
<h1 style="text-align:center; color:white; ">

    <img src="spirit-logo-purple-rgb.png" alt="" width="64" height="64">

    Lumberjack Rewards

</h1>

<div class="main">

    <!--
    <div class="leftside">
         Your leftside navigation code goes here 
        <form style="padding-bottom:5px;" method="post">
            <input type="submit" name="mems" value="Members" />
        </form>
        <form style="padding-bottom:5px;" method="post">
            <input type="submit" name="badges" value="Badges" />
        </form>
        <form style="padding-bottom:5px;" method="post">
            <input type="submit" name="requests" value="Requests" />
        </form>
        <form style="padding-bottom:5px;" method="post">
            <input type="submit" name="Stats" value="Statistics" />
        </form>
        <form style="padding-bottom:5px;" method="post">
            <input type="submit" name="events" value="Events" />
        </form>

        <a href="https://bit.ly/3BlS71b"><img src="Donate.jpg" style="display:flex; vertical-align:middle; color:red; " width="100%" height="44"></a>

        <form style=" padding-top:266%; bottom: 20px;" method="post">
            <input type="submit" name="Logout" value="Logout" />
        </form>
    </div> -->

    <div class="chart-container">
        <!-- Chart code goes here -->
        <canvas id="chart" width="200" height="200"></canvas>
    </div>
</div>

<script>
    var totalUsers = <?php echo $total_users; ?>;

    var ctx = document.getElementById('chart').getContext('2d');
    var userChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Total Users'],
            datasets: [{
                label: 'Total Users',
                data: [totalUsers],
                //backgroundColor: ,
                //borderColor: ,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

</body>
</html>
