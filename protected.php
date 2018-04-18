<?php
    /* Admin page for checking RSVP details of guests saved in database.
        Requires the following files:
        - login.php (contains DB hostname, database and user settings)
        - user.txt (hash of user name)
        - pass.txt (hash of user password)
    */

    require_once 'login.php';
    $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);

    if ($connection->connect_error) die($connection->connect_error);

    $query ="USE wedding";
    $result = $connection->query($query);
    if (!$result) die($connection->error);

    $query ="SELECT * FROM guests WHERE coming = 1";
    $result = $connection->query($query);
    if (!$result) die($connection->error);

    echo "<h3>Guests coming:</h3>";
    echo "<table>";
    echo "<tr style='font-weight: bold'><td width='30'>#</td><td width='200'>Name</td><td width='200'>Email</td><td width='300'>Comment</td><td width='100'>IP</td><td width='200'>Date</td></tr>";

    $count = 0;
    while($row = mysqli_fetch_array($result)) {
        $count++;
        echo "<tr><td>" . $count . "</td><td>" . $row['name'] . "</td><td>" . $row['email'] . "</td><td>" . $row['comment'] . "</td><td>" . $row['ip'] . "</td><td>" . $row['date'] . "</td></tr>";
    }

    echo "</table>";

    $query ="SELECT * FROM guests WHERE coming = 0";
    $result = $connection->query($query);
    if (!$result) die($connection->error);

    echo "<h3>Guests not coming:</h3>";
    echo "<table>";
    echo "<tr style='font-weight: bold'><td width='30'>#</td><td width='200'>Name</td><td width='200'>Email</td><td width='300'>Comment</td><td width='100'>IP</td><td width='200'>Date</td></tr>";

    $count = 0;
    while($row = mysqli_fetch_array($result)) {
    $count++;
    echo "<tr><td>" . $count . "</td><td>" . $row['name'] . "</td><td>" . $row['email'] . "</td><td>" . $row['comment'] . "</td><td>" . $row['ip'] . "</td><td>" . $row['date'] . "</td></tr>";
    }

    echo "</table>";

    $result->close();
    $connection->close();
?>