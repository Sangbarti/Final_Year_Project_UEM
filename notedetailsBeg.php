<?php 
// session_start();
include "partials/dbconnect.php";
?>
<html>
<head>
    <title>Certification Platform | C++ Class</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<style>
      *{
    margin:2px;
    padding: 10px;
}
    .xtra{
        border: double;
        border-color: black;
        border-radius: 5px;
        padding: 5px;
    }
</style>
<body class="xtra">
    
    <?php 
    $id=$_POST['txt1'];
    $sql = "SELECT * FROM `lesson` WHERE lesson_id='$id'"; 
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);?>
   
    <h1> <?php echo $row['lesson_name'];?></h1>
    <h4><?php echo $row['lesson_desc'];?></h4>
    <h5>Download Notes</h5>
    <a href="<?=str_replace('..','.',$row['lesson_note'])?>" class="btn btn-success">Notes</a>
    <br>
    <a href="notes.php?course_id=<?php echo $row['course_id']?>">Back</a>

</body>
</html>
