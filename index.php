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
        $connection = new mysqli($host, $dbUserName, $dbPassword, $dbName);
        // Check connection
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        };

        $query = "SELECT name, favFood FROM account";
        $res = $connection->query($query);

        if ($res->num_rows > 0) {
            while($row = $res->fetch_assoc()){
                echo "<br> Name: ". $row["name"]. " - Favourite Food: ". $row["favFood"]."<br>";
            };
        } else {
            echo "No results";
        };

        $connection->close();

        // $query = mysql_query("SELECT name, favFood FROM account");
        // while ($rows = mysql_fetch_array($query)) {
        //     $name = $rows["name"];
        //     $favFood = $rows["favFood"];

        //     echo "$name<br>$favFood<br>";
        // }
    ?>
</body>
<script type="text/javascript" src="assets/logic/index.js"></script>
</html>