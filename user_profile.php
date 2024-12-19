<?php require_once 'updateprofile.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="icon" href="img/school_logo.png" type="image/x-icon"/>
    <link rel="stylesheet" href="style/user_profile.css">
</head>
<body>
<div class="container">
    <form id="userForm" method="POST"></form>
    <div id="userDetails" class="profile-details">
        <i class='fas fa-user-alt'></i>
        <?php if (isset($userinfo) && !empty($userinfo)) : ?>
        <p><strong>Name:</strong>
            <?php echo htmlspecialchars($userinfo['name']);?></p>
        <p><strong>Address:</strong>
            <?php echo htmlspecialchars($userinfo['age']); ?></p>
        <p><strong>Contact number:</strong> 
            <?php echo htmlspecialchars($userinfo['contact_num']); ?></p>
        <p><strong>Email:</strong> 
            <?php echo htmlspecialchars($userinfo['email']); ?></p>
        <button id="openModalBtn">Edit Profile</button>
        <a href="useraccess.php" id="back">Back to Home</a>
    <?php else : ?>
        <p><strong>No profile details available.</strong></p>
    <?php endif; ?>
        
    </div>

    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Edit Profile</h2>
            <form id="userForm" method="POST">
                
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($userinfo['name']); ?>" required>
                
                <label for="age">Age:</label>
                <input type="text" id="age" name="age" value="<?php echo htmlspecialchars($userinfo['age']); ?>" required>


                <label for="contact_num">Contact number:</label>
                <input type="text" id="contact_num" name="contact_num" value="<?php echo htmlspecialchars($userinfo['contact_num']); ?>" required>
                
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" value="<?php echo htmlspecialchars($userinfo['email']); ?>" required>

                <button class="done" type="submit">Done</button>
            </form>
        </div>
    </div>
</div>  
<script src="JS/updateprofile.js"></script>
<script src="https://kit.fontawesome.com/e083c3d576.js" crossorigin="anonymous"></script>
</body>
</html>