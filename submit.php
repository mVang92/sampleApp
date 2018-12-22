<!DOCTYPE html>
<html>
<head>
    <title>Hello, User</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <script type="text/javascript" src="assets/logic/submit.js"></script>
    <div class="form">
        <?php
        // New $name variable will capture value from name="name"
        // Accomplishes this via $_POST[]
        $name = $_POST["name"];
        $favFood = $_POST["favFood"];
        if (!empty($name) && !empty($favFood)){
            $host = "localhost";
            $dbUserName = "root";
            $dbPassword = "root";
            $dbName = "sample";
            echo "Hello, " . $name . ". Your favourite food is " . $favFood . ".";
        } else {
            echo "Input values cannot be of type null.";
        };
        // MySQL Connection

        ?>
        <div>
            <button onclick="home()">Back</button>
        </div>
    </div>
</head>
<body>
    
</body>
</html>