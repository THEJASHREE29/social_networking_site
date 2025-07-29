<?php
include('dbcon.php');

if (isset($_POST['save'])) {
    // Sanitize input
    $id = $_POST['member_id'];
    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $birthdate = $_POST['birthdate'];
    $address = $_POST['address'];
    $status = $_POST['status'];
    $mobile = $_POST['mobile'];
    $work = $_POST['work'];
    $religion = $_POST['religion'];

    // --- Update 'members' table ---
    $updateMembers = $conn->prepare("UPDATE members SET 
        username = :username,
        firstname = :firstname,
        lastname = :lastname,
        gender = :gender
        WHERE member_id = :member_id
    ");

    $updateMembers->execute([
        ':username' => $username,
        ':firstname' => $firstname,
        ':lastname' => $lastname,
        ':gender' => $gender,
        ':member_id' => $id
    ]);

    // --- Check if profile already exists ---
    $checkProfile = $conn->prepare("SELECT * FROM profile WHERE member_id = :member_id");
    $checkProfile->execute([':member_id' => $id]);

    if ($checkProfile->rowCount() > 0) {
        // --- Update profile table ---
        $updateProfile = $conn->prepare("UPDATE profile SET 
            birthdate = :birthdate,
            address = :address,
            status = :status,
            mobile = :mobile,
            work = :work,
            religion = :religion
            WHERE member_id = :member_id
        ");
        $updateProfile->execute([
            ':birthdate' => $birthdate,
            ':address' => $address,
            ':status' => $status,
            ':mobile' => $mobile,
            ':work' => $work,
            ':religion' => $religion,
            ':member_id' => $id
        ]);
    } else {
        // --- Insert into profile table ---
        $insertProfile = $conn->prepare("INSERT INTO profile 
            (member_id, birthdate, address, status, mobile, work, religion)
            VALUES (:member_id, :birthdate, :address, :status, :mobile, :work, :religion)
        ");
        $insertProfile->execute([
            ':member_id' => $id,
            ':birthdate' => $birthdate,
            ':address' => $address,
            ':status' => $status,
            ':mobile' => $mobile,
            ':work' => $work,
            ':religion' => $religion
        ]);
    }

    // Redirect after successful update
    header("Location: profile.php?success=1");
    exit();
}
?>
