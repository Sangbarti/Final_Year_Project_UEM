<?php
include "common/header.php";
include "partials/dbconnect.php";
if(isset($_POST['submitpaper'])){
	//We need total question in process file too
 	$query = "SELECT * FROM questions";
	$total_questions = mysqli_num_rows(mysqli_query($connection,$query));
		
	//Here we are storing the selected option by user
 	$selected_choice = $_POST['choice'];
	
	//What will be the next question number
 	$next = $number+1;
	 $correct_choice = $row['id'];
	
	//Increase the score if selected cohice is correct
 	 if($selected_choice == $correct_choice){
 	 	$_SESSION['score']++;
 	 }
		
	//Determine the correct choice for current question
 	$query = "SELECT * FROM options WHERE question_number = $number AND is_correct = 1";
 	 $result = mysqli_query($connection,$query);
 	 $row = mysqli_fetch_assoc($result);

 	//Redirect to next question or final score page. 
 	 if($number == $total_questions){
 	 	header("LOCATION: final.php");
 	 }else{
 	 	header("LOCATION: question.php?n=". $next);
 	 }

 }
?>