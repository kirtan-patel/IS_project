<?php
    require 'config.php';
    require 'core_inc.php';

    if(isset($_GET['status'])){
        $status=$_GET['status'];

        $update ="UPDATE `hos_details` set `isActive`= 0 where `ID`='$status'";
        $query=mysqli_query($con,$update);
        if ($query) {
            echo "<script>alert('Hostel has been approved')
                   window.history.back() </script>";
        }else{
            echo "<script>alert('Unkown error occured')
            window.history.back() </script>";
        }
    }

?>
<!-- disapprove hostel -->
<?php 
    
    if (isset($_GET['disapprove'])) {
        $dis=$_GET['disapprove'];
        $update ="UPDATE `hos_details` set `isActive`= 1 where `ID`='$dis'";
        $query=mysqli_query($con,$update);
        if ($query) {
            echo "<script>alert('Hostel has been disapproved right away')
                   window.history.back() </script>";
        }else{
            echo "<script>alert('Unkown error occured')
            window.history.back() </script>";
        }
    }
?>