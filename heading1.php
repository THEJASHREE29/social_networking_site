<?php
$query = $conn->query("SELECT * FROM members WHERE member_id = '$session_id'");
$row = $query->fetch();
?>

<h1>Welcome, <?php echo htmlspecialchars($row['firstname'] . " " . $row['lastname']); ?></h1>
