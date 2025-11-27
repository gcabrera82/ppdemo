<?php

$serverName = "tcp:ent1sqlsrv.database.windows.net,1433";
$database   = "ppdemo-db";
$uid        = "sqladminuser";
$pwd        = "SqlP@ssw0rd1234!";

try {
    $conn = new PDO("sqlsrv:Server=$serverName;Database=$database;", $uid, $pwd);

    $tsql = "SELECT @@VERSION AS SQL_VERSION";
    $stmt = $conn->query($tsql);

} catch (PDOException $exception1) {
    echo "<h1>Error de conexión:</h1>";
    echo $exception1->getMessage() . "<br>";
    echo "<h2>PHP Info (debug)</h2>";
    phpinfo();
    exit();
}

?>

<h1>Success!</h1>
<h2>Connected to Azure SQL:</h2>

<?php
try {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<pre>" . $row['SQL_VERSION'] . "</pre>";
    }
} catch (PDOException $exception2) {
    echo "<h1>Error ejecutando consulta:</h1>";
    echo $exception2->getMessage();
}

unset($stmt);
unset($conn);
?>
