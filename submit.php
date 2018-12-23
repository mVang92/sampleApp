<!DOCTYPE html>
<html>
<head>
    <title>Hello, User</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
    <div class="form">
        <?php
        // New $name variable will capture value from name="name"
        // Accomplishes this via $_POST[]
        $name = $_POST["name"];
        $favFood = $_POST["favFood"];
        // Can also use the filter_input function as shown below
        // $name = filter_input(INPUT_POST, "name");
        // $favFood = filter_input(INPUT_POST, "favFood");
        $host = "localhost";
        $dbUserName = "root";
        $dbPassword = "root";
        $dbName = "users";
        // MySQL Connection
        $connection = new mysqli ($host, $dbUserName, $dbPassword, $dbName);
        // Name and favourite food cannot be null
        if (!empty($name) && !empty($favFood)){
            if (mysqli_connect_error()){
                echo "<a href='/sampleApp'>← Back To Home</a><br>";
                die('Connect Error ('. mysqli_connect_errno() .') '
                  . mysqli_connect_error());
            } else {
                // SQL Query
                $query = "INSERT INTO account (name, favFood) VALUES ('$name','$favFood')";
                if ($connection->query($query)){
                    echo "Hello, " . $name . ". Your favourite food is " . $favFood . ".";
                } else {
                    echo "Error: ". $query ."<br>". $connection->error;
                }
                $connection->close();
            }
        } else {
            echo "Cannot leave empty input values.";
        };        
        ?>
        <div>
            <br>
            <a href="/sampleApp">← Back To Home</a>
        </div>
    </div>
</body>
</html>