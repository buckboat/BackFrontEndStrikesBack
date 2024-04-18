<?php

/*
// Server credentials
$servername = "localhost";
$username = "test";
$password = "test";
$dbname = "4267DB";

// Create server/database connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

*/


// uncomment the top part and comment these bottom 3 for it to work on your database
include "..//database_operations/DBConnection.php";
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

<style>
canvas{
		color:red;
    background-color: white;}
    </style>
<body>


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
