<?php if(isset($_SESSION['message'])):?> 
<?=$_SESSION['message'] ?>
<?php unset($_SESSION['message']);?>
<?php endif;?>