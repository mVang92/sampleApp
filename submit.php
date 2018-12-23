<!DOCTYPE html>
<html>
<head>
    <title>Hello, User</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <script type="text/javascript" src="assets/logic/submit.js"></script>
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
        $dbName = "sample";

        // Name and favourite food cannot be null
        if (!empty($name) && !empty($favFood)){
            
            // MySQL Connection
            $connection = new mysqli ($host, $dbUserName, $dbPassword, $dbName);
            if (mysqli_connect_error()){
                die('Connect Error ('. mysqli_connect_errno() .') '
                  . mysqli_connect_error());
            } else {
                // SQL Query
                $sql = "INSERT INTO account (name, favFood) values ('$name','$favFood')";
                if ($connection->query($sql)){
                    echo "Hello, " . $name . ". Your favourite food is " . $favFood . ".";
                } else {
                    echo "Error: ". $sql ."<br>". $connection->error;
                }
                $connection->close();
            }
        } else {
            echo "Input values cannot be of type null.";
        };        
        ?>
        <div>
            <button onclick="home()">Back</button>
        </div>
    </div>
</body>
</html>