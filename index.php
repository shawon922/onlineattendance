
    <?php 
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        if(!isset($_SESSION['teacher']) && !isset($_SESSION['role_teacher'])) {
            header("Location: ../login.php");
        }
    
        require 'classes/functions.php';
        include 'includes/header.php';
            
     ?>
    
    
        
    <?php include 'includes/footer.php'; ?>