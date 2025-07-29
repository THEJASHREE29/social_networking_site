<?php include('header.php'); ?>    
<?php include('session.php'); ?>    

<body>
  <?php include('navbar.php'); ?>
  <div id="masthead">  
    <div class="container">
      <div class="row">
        <div class="col-md-2">
          <hr>
          <center>
            <img class="pp" src="<?php echo $image ?? 'default.jpg'; ?>" height="140" width="160">
          </center>
          <hr>
          <button class="btn btn-success">Change Profile Picture</button>
        </div>

        <div class="col-md-10">
          <?php
          $query = $conn->query("SELECT * FROM members WHERE member_id = '$session_id'");
          $row = $query->fetch();
          $id = $row['member_id'] ?? '';
          $username = $row['username'] ?? '';
          $firstname = $row['firstname'] ?? '';
          $lastname = $row['lastname'] ?? '';
          $gender = $row['gender'] ?? '';
          $birthdate = $row['birthdate'] ?? '';
          $address = $row['address'] ?? '';
          $status = $row['status'] ?? '';
          $mobile = $row['mobile'] ?? '';
          $work = $row['work'] ?? '';
          $religion = $row['religion'] ?? '';
          ?>
          
          <hr>
          <form method="post" action="save_edit.php">
            <input type="hidden" name="member_id" value="<?php echo $id; ?>">

            <label>Username:</label>
            <input type="text" name="username" value="<?php echo $username; ?>">
            <hr>

            <label>Firstname:</label>
            <input type="text" name="firstname" value="<?php echo $firstname; ?>">
            <hr>

            <label>Lastname:</label>
            <input type="text" name="lastname" value="<?php echo $lastname; ?>">
            <hr>

            <label>Gender:</label>
            <select name="gender">
              <option selected><?php echo $gender ?: 'Select'; ?></option>
              <option>Male</option>
              <option>Female</option>
              <option>Other</option>
            </select>
            <hr>

            <label>Birthdate:</label>
            <input name="birthdate" type="text" value="<?php echo $birthdate; ?>">
            <hr>

            <label>Address:</label>
            <input name="address" type="text" value="<?php echo $address; ?>">
            <hr>

            <label>Status:</label>
            <input name="status" type="text" value="<?php echo $status; ?>">
            <hr>

            <label>Mobile:</label>
            <input name="mobile" type="text" value="<?php echo $mobile; ?>">
            <hr>

            <label>Work:</label>
            <input name="work" type="text" value="<?php echo $work; ?>">
            <hr>

            <label>Religion:</label>
            <input name="religion" type="text" value="<?php echo $religion; ?>">
            <hr>

            <br>
            <center>
              <button name="save" class="btn edit">Save</button>
            </center>
            <br>
          </form>

        </div>
      </div> 
    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="top-spacer"> </div>
        </div>
      </div> 
    </div>
  </div>

  <?php include('footer.php'); ?>
</body>
</html>
