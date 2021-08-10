<?php
    require 'config.php';
    require 'core_inc.php';

    if(isset($_GET['remove'])){
        $status=$_GET['remove'];

        $update ="UPDATE `hos_details` set `agent_active`= 1 where `ID`='$status'";
        $query=mysqli_query($con,$update);
        if ($query) {
            echo "<script>alert('Hostel has been removed, you can always resubmit it')
                   window.history.back() </script>";
        }else{
            echo "<script>alert('Unkown error occured')
            window.history.back() </script>";
        }
    }

?>
<!-- Resubmit hostel logic -->
<?php 

    if(isset($_GET['add_back'])){
        $status=$_GET['add_back'];

        $update ="UPDATE `hos_details` set `agent_active`= 0, `isActive`= 1 where `ID`='$status'";
        $query=mysqli_query($con,$update);
        if ($query) {
            echo "<script>alert('Hostel has been resubmitted for aproval, please wait')
                 window.history.back() </script>";
        }else{
            echo "<script>alert('Unkown error occured')
            window.history.back() </script>";
        }
    }

?>