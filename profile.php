<?php include('header.php'); ?>
<?php include('session.php'); ?>

<body>
<?php include('navbar.php'); ?>

<div id="masthead">  
  <div class="container">
    <?php include('heading1.php'); ?>
  </div>
</div>

<?php
// Fetch basic member info
$member_query = $conn->query("SELECT * FROM members WHERE member_id = '$session_id'");
$member = $member_query->fetch();

// Fetch additional profile info (if exists)
$profile_query = $conn->query("SELECT * FROM profile WHERE member_id = '$session_id'");
$profile = $profile_query->fetch();

$image = $member['image'];
?>

<div class="container">
  <div class="row">
    <div class="col-md-2">
      <hr>
      <center>
        <img class="pp" src="<?php echo htmlspecialchars($image ?? ''); ?>" height="140" width="160">
      </center>
      <hr>
      <a class="btn btn-success" href="change_pic.php">Change Profile Picture</a>
    </div>

    <div class="col-md-10">
      <hr>
      <div class="pull-right">
        <a href="edit_profile.php" class="btn btn-info"><i class="icon-pencil"></i> Edit</a>
      </div>
      <p><strong>Personal Info</strong></p>
      <hr>

      <p>
        <strong>Name:</strong> <?php echo htmlspecialchars($member['firstname'] . " " . $member['lastname']); ?>
        <span class="margin-p"> | </span>
        <strong>Gender:</strong> <?php echo htmlspecialchars($member['gender'] ?? ''); ?>
      </p>
      <hr>

      <p><strong>Address:</strong> <?php echo htmlspecialchars($profile['address'] ?? ''); ?></p>
      <hr>

      <p><strong>Birthdate:</strong> <?php echo htmlspecialchars($profile['birthdate'] ?? ''); ?></p>
      <hr>

      <p><strong>Contact No:</strong> <?php echo htmlspecialchars($profile['mobile'] ?? ''); ?></p>
      <hr>

      <p><strong>Status:</strong> <?php echo htmlspecialchars($profile['status'] ?? ''); ?></p>
      <hr>

      <p><strong>Work:</strong> <?php echo htmlspecialchars($profile['work'] ?? ''); ?></p>
      <hr>

      <p><strong>Religion:</strong> <?php echo htmlspecialchars($profile['religion'] ?? ''); ?></p>
      <hr>
    </div>
  </div>
</div>

<?php include('footer.php'); ?>
</body>
</html>
