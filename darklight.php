<?php
session_start();
    if(isset($_POST["darklight"])){
        
        $_SESSION['sidebarku'] = "light";
        if(isset($_GET['pages'])){
            ?>
                <script>
                    window.location.href="index.php?pages=<?php echo $_GET['pages'];?>";
                </script>
            <?php
        }else {
            ?>
                <script>
                    window.location.href="index.php";
                </script>
            <?php
        }
    }else {
        
        $_SESSION['sidebarku'] = "dark";
        if(isset($_GET['pages'])){
            ?>
                <script>
                    window.location.href="index.php?pages=<?php echo $_GET['pages'];?>";
                </script>
            <?php
        }else {
            ?>
                <script>
                    window.location.href="index.php";
                </script>
            <?php
        }
    }
    
?>