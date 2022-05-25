<?php 
session_start();
include "../partials/dbconnect.php";
if(isset($_POST['questionSubmitBtn'])){
    $cid=$_POST['course'];
	$question_number = $_POST['question_number'];
	$question_text = $_POST['question_text'];
	$correct_choice = $_POST['correct_choice'];
	// Choice Array
	$choice = array();
	$choice[1] = $_POST['choice1'];
	$choice[2] = $_POST['choice2'];
	$choice[3] = $_POST['choice3'];
	$choice[4] = $_POST['choice4'];
	//$choice[5] = $_POST['choice5'];

 // First Query for Questions Table

	$sql = "INSERT INTO `questions`(`course_id`, `question`) VALUES ('$cid','$question_text')";

	$result=mysqli_query($conn,$sql);
	
	//Validate First Query
	if($result){
		foreach($choice as $option => $value){
			if($value != ""){
				if($correct_choice == $option){
					$is_correct = 1;
				}else{
					$is_correct = 0;
				}
			


				//Second Query for Choices Table
				$sql1="INSERT INTO `answers`(`q_no`, `correct_ans`, `choice`) VALUES ('$question_number','$is_correct','$value')";

				$insert_row = mysqli_query($conn,$sql1);
				// Validate Insertion of Choices

				if($insert_row){
					continue;
				}else{
					die("2nd Query for Choices could not be executed" . $query);
					
				}

			}
		}
		$_SESSION['message'] = "Question has been added successfully";
	}

	




}

		$sql3 = "SELECT * FROM questions";
		$questions = mysqli_query($conn,$sql3);
		$total = mysqli_num_rows($questions);
		$next = $total+1;
        $_SESSION['next']=$next;

?>