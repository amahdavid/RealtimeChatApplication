<?php 
    session_start();
    if(!isset($_SESSION['unique_id'])){
        header("location: loginPage.php");
    }

    // create a group button
    // find somewhere to place the button
    // you will be taken to a new page where you can create a group
    // you will be able to add users to the group from the list of users
    // you will then be taken to the group chat area
?>

<?php include_once('header.php'); ?>
<body>
   <div class="wrapper">
    <section class="users">
        <header>
            <?php 
                include_once('../php/config.php');
                $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
                if(mysqli_num_rows($sql) > 0){
                    $row = mysqli_fetch_assoc($sql);
                }
            ?>
            <div class="content">
                <img src="../php/images/<?php echo $row['img']?>" alt="">
                <div class="details">
                    <span><?php echo $row['fname'] . " " . $row['lname']?></span>
                    <p><?php echo $row['status']?></p>
                </div>
            </div>
            <a href="#" class="logout">Logout</a>
        </header>
        <div class="search">
            <span class="text">Select a user or group to start chatting</span>
            <input type="text" placeholder="Enter name to search...">
            <button><i class="fas fa-search"></i></button>
        </div>
        <div class="users_list"></div>
    </section>
   </div> 
    <script src="../javascript/users.js"></script>
</body>

