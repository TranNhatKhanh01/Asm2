<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

<?php
    session_start();
    session_unset();
    session_destroy();
    echo "<div class='alert alert-success' role='alert'>You have cleaned session!</div>";
    
    header("Refresh:2; URL=index.php");
?>