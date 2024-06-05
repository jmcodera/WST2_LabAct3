<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>  
        body {
            background-image: url('image.jpg');
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            color: white; /* Set text color to white */
        }
        .content {
            text-align: center;
        }
        table, th, td {
            border: 1px solid black;
            text-align: center;
            margin-top: 20px;
            color: white; /* Set text color to white */
        }
        table {
            width: 100%;
        }
        th {
            padding: 10px; /* Add space around the text in table headers */
        }
    </style>
</head>
<body>
    <div class="content">
        <h2>Home Page</h2>
        <?php 
            session_start(); //starts the session
            if(isset($_SESSION['user'])) { // checks if the user is logged in
                $user = $_SESSION['user']; //assigns user value
                echo "<p> Home Page $user!</p>"; //Display's user name
            } else {
                header("location: index.php"); // redirects if user is not logged in
            }
        ?>
        <br><br>
        <a href="logout.php" class="btn btn-danger rounded-pill">LOGOUT</a><br><br> <!-- Change shape of the button to rounded-pill -->
        <form action="add.php" method="POST">
            Add more: <input type="text" name="details" /> <br>
            Public post <input type="checkbox" name="public[]" value="yes" /> <br>
            <input type="submit" value="Add to list" class="btn btn-primary rounded-pill"> <!-- Change shape of the button to rounded-pill -->
        </form>
        <br><br>
        <h2 align="center">My list</h2>
        <table>
            <tr>
                <th>Id</th>
                <th>Details</th>
                <th>Post Time</th>
                <th>Edit Time</th>
                <th>Edit</th>
                <th>Delete</th>
                <th>Public Post</th>
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
            $query = mysqli_query($conn, "Select * from list_tbl"); //SQL Query
            while($row = mysqli_fetch_array($query)) //Display all the rows from query
            {
                Print "<tr>";
                Print "<td>".$row['id']."</td>";
                Print "<td>".$row['details']."</td>";
                Print "<td>".$row['date_posted']. "-". $row['time_posted']."</td>";
                Print "<td>".$row['date_edited']. "-". $row['time_edited']."</td>";
                Print "<td><a href=edit.php?id=".$row['id'].">edit</a></td>";
                Print "<td><a href='#' onclick=myFunction(".$row['id'].")>delete</a></td>";
                Print "<td>".$row['public']."</td>";
                Print "</tr>";
        }

                ?>
        </table>
        <script>
            function myFunction(id)
            {
                var r = confirm("Are you sure you want to delete this record?");
                if(r == true)
                {
                    window.location.assign("delete.php?id=" + id);
                }
            }
        </script>
    </div>
</body>
</html>
