<!DOCTYPE html>
<html>
<head>
    <title>Query</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
    <div class="form">
        <?php
            $query = $_POST["query"];
            $host = "localhost";
            $dbUserName = "root";
            $dbPassword = "root";
            $dbName = "";
            // MySQL Connection
            $connection = new mysqli($host, $dbUserName, $dbPassword, $dbName);
            if (!empty($query)) {
                // Check connection
                if ($connection->connect_error) {
                    echo "<a href='/sampleApp'>← Back To Home</a><br>";
                    die("Connection failed: " . $connection->connect_error);
                } else {
                    if ($connection->query($query)){
                        echo "Query '" . $query . "' processed successfully." . "<br><br>";
                        echo "<a href='/sampleApp'>← Back To Home</a>";
                    } else {
                        echo "Error: ". $query ."<br>". $connection->error . "<br>";
                        echo "<a href='/sampleApp'>← Back To Home</a>";
                    }
                    $connnection->close();
                };
            } else {
                echo "Query cannot be empty." . "<br><br>";
                echo "<a href='/sampleApp'>← Back To Home</a>";
            };
        ?>
    </div>
</body>
</html>