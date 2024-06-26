<?php
include 'constants.php';
$devel_enable = FALSE;
session_start();
if (isset($_SESSION['status_message'])) {
  $status_message = $_SESSION['status_message'];
  unset($_SESSION['status_message']);
}
?>
<!DOCTYPE html>
<html lang="en" style="height: 100%;">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/iconoir-icons/iconoir@main/css/iconoir.css" />
  <link rel="stylesheet" href="style.css">
  <title>\\ simple_list web</title>
</head>

<body>
  <?php
  require_once('./header.php');
  session_start();
  if (isset($status_message)) : ?>
    <div class="status-message" id="status-message">
      <span class="status-inner">
        <?php echo $status_message; ?>
      </span>
      <span class="close" id="close-status-message" onclick="close_status()"><?php include("./assets/icons/simple_list_close.svg"); ?></span>
    </div>
  <?php endif; ?>
  <div class="current_list_wrapper section-wrapper">
    <div class="current_list_inner" id="current_list_render">
      <form action="check_off_items.php" method="post">
        <div class="current_list_items">
          <?php require_once('./display_list.php'); ?>
        </div>
        <button type="submit" value="Clear checked items" class="form-button">
          <span class="button-symbol"><?php include("./assets/icons/simple_list_close.svg"); ?></span>
          <span class="button-text">Clear Checked Items</span>
        </button>
      </form>
    </div>
  </div>
  <div class="list_entry_wrapper section-wrapper">
    <div class="list_entry_inner">
      <form action="get_list_entry.php" method="post">
        <input type="text" name="new_list_entry" class="new_entry_input">
        <button type="submit" value="submit" class="new_entry_submit form-button">
          <span class="button-symbol"><?php include_once("./assets/icons/simple_list_submit.svg"); ?></span>
          <span class="button-text">Submit</span>
        </button>
      </form>
    </div>
  </div>
  <?php if ($devel_enable) : ?>
    <div class="devel-wrapper section-wrapper">
      <div class="devel-inner">
        <div class="log_screen">
          <?php require_once('./devel_display.php'); ?>
        </div>
        <form action="devel.php" method="post" class="devel-form">
          <div class="form-item form-input">
            <input type="text" name="devel_input" id="devel_input" />
          </div>
          <div class="form-item form-checkbox">
            <input type="checkbox" name="clear_cache_check" id="clear_cache_check" />
            <label for="clear_cache_check">Clear caches?</label>
          </div>
          <div class="form-item form-submit">
            <input type="submit" value="send" name="devel_submit">
          </div>
        </form>
      </div>
    </div>
  <?php endif; ?>
  <?php require_once('background.php'); ?>
  <script src="interface.js?v=1"></script>
</body>

</html>
