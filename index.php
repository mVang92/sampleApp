<!DOCTYPE html>
<html>
<head>
    <title>Sample App</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
    <form action="query.php" method="post" class="form">
        <div>
            Custom SQL query:
            <input id="query" name="query" type="text">
            <input type="submit">
        </div>
    </form>
    
    <?php
        $host = "localhost";
        $dbUserName = "root";
        $dbPassword = "root";
        $dbName = "users";
        // MySQL Connection
        $connection = new mysqli($host, $dbUserName, $dbPassword, $dbName);
        // Check connection
        if ($connection->connect_error) {
            die("<br><div id='error'>" . "Connection failed: " . $connection->connect_error . "</div>");
        };

        $query = "SELECT name, favFood FROM account";
        $res = $connection->query($query);

        if ($res->num_rows > 0) {
            if ($res->num_rows == 1) {
                echo "<div class='results'>". "There is $res->num_rows result in $dbName database.";
            } else {
                echo "<div class='results'>". "There are $res->num_rows results in $dbName database.";
            };
            while ($row = $res->fetch_assoc()) {
                echo "<div class='results'>". $row["name"]. " likes ". $row["favFood"]."</div>";
            };
        } else {
            echo "<div class='results'>There are no results in $dbName database.</div>";
        };

        $connection->close();
    ?>
    <br>
    <form action="submit.php" method="post" class="form">
        <br>
        <div>
            Enter your name.
            <input id="name" name="name" type="text" placeholder="John">
        </div>
        <br>
        <div>
            What is your favourite food?
            <input id="favFood" name="favFood" type="text" placeholder="Steak">  
        </div>
        <br>
        <input type="submit">
    </form>
</body>
</html>