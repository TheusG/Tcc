<?php 
session_start();


if(!isset($_SESSION["FUNC-ID"]) || empty($_SESSION["FUNC-ID"])){
    ?>  
        <form action="../index.php" name="form" id="myForm" method="post">
            <input type="hidden" name="msg" value="0A00">
        </form>
        <script>
            document.getElementById('myForm').submit()
        </script>
    <?php


}




?>