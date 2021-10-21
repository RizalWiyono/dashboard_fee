<?php
session_start();
if(!isset($_SESSION['email']) ) {
    header('location: ../login/login.php');
    exit;
}
/**
 * Create a bootstrap success alert
 * @param  String $bold  - First words in the alert. Will be put inside <strong> html tag for emphasis
 * @param  String $message - What will be used for the main description in the alert
 */
function successAlert($bold, $message){
  echo '<div class="container">
          <div class="alert alert-success fade in">
            <a href="../login.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>'.$bold.'</strong> '.$message.'
          </div>
        </div>';
}

/**
 * Create a bootstrap danger alert
 * @param  String $bold  - First words in the alert. Will be put inside <strong> html tag for emphasis
 * @param  String $message - What will be used for the main description in the alert
 */
function dangerAlert($bold, $message){
  echo '<div class="container">
          <div class="alert alert-danger fade in">
            <a href="../login.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>'.$bold.'</strong> '.$message.'
          </div>
        </div>';
}

/**
 * Create a bootstrap info alert
 * @param  String $bold  - First words in the alert. Will be put inside <strong> html tag for emphasis
 * @param  String $message - What will be used for the main description in the alert
 */
function infoAlert($bold, $message){
  echo '<div class="container">
          <div class="alert alert-info fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>'.$bold.'</strong> '.$message.'
          </div>
        </div>';
}

/**
 * Create a bootstrap warning alert
 * @param  String $bold  - First words in the alert. Will be put inside <strong> html tag for emphasis
 * @param  String $message - What will be used for the main description in the alert
 */
function warningAlert($bold, $message){
  echo '<div class="container">
          <div class="alert alert-warning fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>'.$bold.'</strong> '.$message.'
          </div>
        </div>';
}
                
?>