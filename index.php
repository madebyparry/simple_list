<?php
include 'constants.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>\\ simple_list web</title>
</head>
<body>
    <?php 
    session_start();
    if (isset($_SESSION['status_message'])): ?>
    <div class="status-message">
        <?php echo $_SESSION['status_message']; ?>
        <span class="close" id="close-status-message">X</span>
    </div>    
    <?php unset($_SESSION['status_message']); endif; ?>
    <div class="current_list_wrapper">
        <div class="current_list_inner" id="current_list_render">
            <form action="check_off_items.php" method="post">
                <?php require_once('./display_list.php'); ?>
                <input type="submit" value="save list">
            </form>
        </div>
    </div>
    <div class="list_entry_wrapper">
        <div class="list_entry_inner">
            <form action="get_list_entry.php" method="post">
                <input type="text" name="new_list_entry" class="new_entry_input">
                <input type="submit" value="submit" class="new_entry_submit">
            </form>
        </div>
    </div>
    <div class="devel-wrapper">
        <div class="devel-inner">
            <div class="log_screen">
                <?php require_once('./devel_display.php'); ?>
            </div>
            <form action="devel.php" method="post">
                <input type="text" name="devel_input" id="devel_input"/>
                <input type="checkbox" name="clear_cache_check" id="clear_cache_check"/>
                <label for="clear_cache_check">Clear caches?</label>
                <input type="submit" value="send" name="devel_submit">
            </form>
        </div>
    </div>
    <script src="interface.js?v=1"></script>
</body>
</html>