<!DOCTYPE html>
<html>
<head>
    <title>Sample App</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
    <form action="submit.php" method="post" class="form">
        <div>
            Enter your name.
            <input id="name" name="name" type="text">
        </div>
        <br>
        <div>
            What is your favourite food?
            <input id="favFood" name="favFood" type="text">  
        </div>
        <br>
        <input type="submit">
    </form>
    <?php
        $host = "localhost";
        $dbUserName = "root";
        $dbPassword = "root";
        $dbName = "sample";
        // MySQL Connection
        $connection = new mysqli($host, $dbUserName, $dbPassword, $dbName);
        // Check connection
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        };

        $query = "SELECT name, favFood FROM account";
        $res = $connection->query($query);

        if ($res->num_rows > 0) {
            if ($res->num_rows == 1) {
                echo "<div class='results'>". "There is ". $res->num_rows. " result.";
            } else {
                echo "<div class='results'>". "There are ". $res->num_rows. " results.";
            };
            while ($row = $res->fetch_assoc()) {
                echo "<div class='results'>". $row["name"]. " likes ". $row["favFood"]."</div>";
            };
        } else {
            echo "<div class='results'>There are no results.</div>";
        };

        $connection->close();
    ?>
</body>
</html>