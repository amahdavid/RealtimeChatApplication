<?php 
    session_start();
    if(!isset($_SESSION['unique_id'])){
        header("location: loginPage.php");
    }
?>

<?php include_once('header.php'); ?>
<body>
   <div class="wrapper">
    <section class="chat_area">
        <header>
            <?php 
                include_once('../php/config.php');
                $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
                $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
                if(mysqli_num_rows($sql) > 0){
                    $row = mysqli_fetch_assoc($sql);
                }
            ?>
            <a href="usersPage.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
            <img src="../php/images/<?php echo $row['img']?>" alt="">
            <div class="details">
                <span><?php echo $row['fname'] . " " . $row['lname']?></span>
                <p><?php echo $row['status']?></p>
            </div>
        </header>
        <div class="chat_box"></div>
        <form action="#" class="typing-area" autocomplete="off">
            <input type="text" name="outgoing_id" value="<?php echo $_SESSION['unique_id']; ?>" hidden>
            <input type="text" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
            <input type="text" name="message" class="input-field" placeholder="Type a message here...">
            <button><i class="fab fa-telegram-plane"></i></button>
        </form>
    </section>
   </div>
    <script src="../javascript/chat.js"></script> 
</body>
