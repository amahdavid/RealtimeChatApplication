<?php
    session_start();
    include_once("config.php");
    
    if(isset($_SESSION['unique_id']))
    {
        $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $output = "";

        $sql = "SELECT  * FROM Messages 
                LEFT JOIN Users ON Users.unique_id = Messages.outgoing_msg_id 
                WHERE (outgoing_msg_id = {$outgoing_id} 
                AND incoming_msg_id = {$incoming_id}) 
                OR (outgoing_msg_id = {$incoming_id} 
                AND incoming_msg_id = {$outgoing_id}) 
                ORDER BY msg_id ASC";

        $query = mysqli_query($conn, $sql);

        if(mysqli_num_rows($query) > 0)
        {
            while($row = mysqli_fetch_assoc($query))
            {
                if($row['outgoing_msg_id'] === $outgoing_id)
                {
                    $output .= '<div class="chat outgoing">
                                    <div class="details">
                                        <p>'.$row['msg'].'</p>
                                    </div>
                                </div>';
                } 
                else 
                {
                    $output .= '<div class="chat incoming">
                                    <img src="../php/images/'.$row['img'].'" alt="">
                                    <div class="details">
                                        <p>'.$row['msg'].'</p>
                                    </div>
                                </div>';
                }
            }
            echo $output;
        }
    } 
    else 
    {
        header("location: ../html/loginPage.php");
    }
?>