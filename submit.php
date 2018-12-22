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
        echo "Hello, " . $name . ". Your favourite food is " . $favFood . ".";
        ?>
        <div>
            <button onclick="home()">Back</button>
        </div>
    </div>
</head>
<body>
    
</body>
</html>