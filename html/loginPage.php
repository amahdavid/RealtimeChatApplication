<?php include_once('header.php'); ?>

<body>
   <div class="wrapper">
    <section class="form login">
        <header>Chat Application</header>
        <form action="#">
            <div class="error_text"></div>
            <div class="field input">
                <label>Email</label>
                <input type="text" name = "email" placeholder="Email" required>
            </div>
            <div class="field input">
                <label>Password</label>
                <input type="password" name = "password" placeholder="Password" required>
                <i class="fas fa-eye"></i>
            </div>
            <div class="field button">
                <input type="submit" value="Login">
            </div>
            <div class="link">Don't have an Account? <a href="indexPage.php">Sign Up</a></div>
        </form>
    </section>
   </div> 

    <script src="../javascript/pass-show-hide.js"></script>
    <script src="../javascript/login.js"></script>
</body>