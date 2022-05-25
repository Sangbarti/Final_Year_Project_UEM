<?php
if(isset($_POST['questionSubmitBtn'])){
    $cid=$_POST['course'];
    echo $cid;
  }
  else{
   echo "not";
  }
?>