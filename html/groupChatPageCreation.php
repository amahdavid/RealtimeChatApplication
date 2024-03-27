<?php include_once('header.php'); ?>

<body>
   <div class="wrapper">
    <section class="form group">
        <header>Chat Application</header>
        <form action="#">
            <div class="error_text"></div>
            <div class="field input">
                <label>Group Name</label>
                <input type="text" name = "email" placeholder="Group Name" required>
            </div>
            <div class="field image">
                <label>Profile Picture</label>
                <input type="file" name = "image" required>
            </div>
            <div class="field members">
                <label>Select Group Members</label>
                <select name="members[]" multiple required>
                    <option value="member1">Member 1</option>
                    <option value="member2">Member 2</option>
                    <option value="member3">Member 3</option>
                    <!-- Add more options as needed -->
                </select>
            </div>
            <div class="field button">
                <input type="submit" value="Create Group">
            </div>
        </form>
    </section>
   </div> 
    <script src="../javascript/groupCreation.js"></script>
</body>