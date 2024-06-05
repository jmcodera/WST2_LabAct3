<!DOCTYPE html>
<html>
<head>
    <title>My first PHP Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
    table, th, td {
        border: 3px solid black;
        text-align: center;
        color: white; /* Set text color to white */
    }
    table {
        width: 85%;
        margin: 0 auto; /* Center the table horizontally */
    }

    body {
        background-image: url('image2.jpg');
        background-size: cover;
        text-align: center; /* Center text */
    }

    .btn-container {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .btn-primary {
        margin: 5px; /* Add margin to buttons */
    }

    h2 {
        color: white; /* Set heading color to white */
    }
</style>    
</head>
<body>
    <h2>My PHP Website</h2>
    <div class="btn-container">
        <a href="login.php" class="btn btn-primary">LOGIN HERE</a>
        <a href="register.php" class="btn btn-primary">REGISTER HERE</a>
    </div>
    <h2 align="center">My list</h2>
    <table>
        <tr>
            <th>Id</th>
            <th>Details</th>
            <th>Post Time</th>
            <th>Edit Time</th>
        </tr>
        <?php
        $servername = "localhost";
        $username_db = "root";
        $password_db = "";
        $db_name = "first_db";
        // Create connection
        $conn = mysqli_connect($servername, $username_db, $password_db, $db_name);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $query = mysqli_query($conn, "Select * from list_tbl where public = 'yes'"); //SQL Query
        while($row = mysqli_fetch_array($query)) //Display all the rows from query
        {
            Print "<tr>";
                Print "<td>".$row['id']."</td>";
                Print "<td>".$row['details']."</td>";
                Print "<td>".$row['date_posted']. "-".$row['time_posted']."</td>";
                Print "<td>".$row['date_edited']. "-".$row['time_edited']."</td>";
            Print "</tr>";
        }
        ?>
    </table>
</body>
</html>
