<?php include_once('header.php'); ?>
<body>
   <div class="wrapper">
    <section class="form signup">
        <header>Chat Application</header>
        <form action="#" enctype="multipart/form-data">
            <div class="error_text"></div>
            <div class="name_details">
                <div class="field input">
                    <label>First Name</label>
                    <input type="text" name = "fname" placeholder="First Name" required>
                </div>
                <div class="field input">
                    <label>Last Name</label>
                    <input type="text" name = "lname" placeholder="Last Name" required>
                </div>
            </div>
            <div class="field input">
                <label>Email</label>
                <input type="text" name = "email" placeholder="Email" required>
            </div>
            <div class="field input">
                <label>Password</label>
                <input type="password" name = "password" placeholder="Password" required>
                <i class="fas fa-eye"></i>
            </div>
            <div class="field image">
                <label>Profile Picture</label>
                <input type="file" name = "image">
            </div>
            <div class="field button">
                <input type="submit" value="Sign Up">
            </div>
            <div class="link">Already signed up? <a href="loginPage.php">Login now</a></div>
        </form>
    </section>
   </div> 

   <script src="../javascript/pass-show-hide.js"></script>
    <script src="../javascript/signup.js"></script>    
</body>
