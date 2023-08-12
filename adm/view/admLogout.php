<?php 
session_start();
session_destroy();
    
    ?>  
        <form action="../index.php" name="form" id="myForm" method="post">
            <input type="hidden" name="msg" value="OP51">
        </form>
        <script>
            document.getElementById('myForm').submit()
        </script>
    <?php
?>