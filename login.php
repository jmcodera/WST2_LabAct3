<!DOCTYPE html>
<html>
<head>
    <title>My first PHP Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            background-image: url('image2.jpg');
            background-size: cover;
        }

        .container {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        h2 {
            text-align: center; /* Center the login text */
        }
    </style>
</head>
<body>
    <a href="index.php"></a><br/><br/>

    <div class="container">
        <form action="checklogin.php" method="POST">
            <h2>Login</h2>
            <!-- NAME TEXTBOX -->
            <div class="form-group">
                <label for="exampleInputEmail1">Name:</label>
                <input type="text" name="username" required="required" class="form-control" aria-describedby="emailHelp" placeholder="Enter Name">
            </div><br/>

            <!-- PASSWORD TEXTBOX -->
            <div class="form-group">
                <label for="exampleInputEmail1">Password:</label>
                <input type="password" name="password" required="required" class="form-control" aria-describedby="emailHelp" placeholder="Enter Password">
            </div><br/>

            <!-- SUBMIT BUTTON -->
            <input class="btn btn-primary" type="submit" value="Login">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="index.php" class="btn btn-danger" value="Cancel">Cancel</a>
        </form>
    </div>
</body>
</html>
