<?php
    session_start();
    session_destroy();
?>
<script>
    location.replace('/BankManagmentSystem?msg=Logout Successfully');
</script>