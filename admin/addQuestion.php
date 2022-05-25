<?php
include "common/header.php";
include "../partials/dbconnect.php";
?>


<!------------------- INSERT QUESTION AND OPTIONS IN THE DATABASE ---------------------->
<?php 
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

	$sql = "INSERT INTO `questions`(`question_number`, `course_id`, `question`) VALUES ('$question_number','$cid','$question_text')";

	$result=mysqli_query($conn,$sql);
	
	//Validate First Query
	if($result){
    $last_id = mysqli_insert_id($conn);
		foreach($choice as $option => $value){
			if($value != "")
      {
				if($correct_choice == $option)
        {
					$is_correct = 1;
				}else{
					$is_correct = 0;
				}
			// $query="SELECT * FROM `questions`";
      // $getdata=mysqli_query($conn,$query);
      // $row = mysqli_fetch_assoc($getdata);
      // $qid=$row['qid'];

				//Second Query for Answers Table
				$sql1="INSERT INTO `answers`(`correct_ans`, `choice`,`qid`) VALUES ('$is_correct','$value','$last_id')";

				$insert_row = mysqli_query($conn,$sql1);
				// Validate Insertion of Answers

				if($insert_row){
					continue;
				}else{
					die("2nd Query  could not be executed" . $sql1.$conn->error);
					
				}

			}
		}
		$message = "Question has been added successfully";
	}

}

// $course_id='<script>
//           function getSelectedValue()
//           {
//             var selectedValue=document.getElementById("course").value;
//             document.writeln(selectedValue);
//           }
//       </script>';
      //echo $course_id;

// if(isset($_POST['course'])){
	// $sql2 = "SELECT * FROM questions where `course_id`='$course_id'";
	// $questions = mysqli_query($conn,$sql2);
	// $total = mysqli_num_rows($questions);
	// $next = $total+1;
  //echo $next;
// }

// if(isset($_POST['questionSubmitBtn'])){
//   $cid=$_POST['course'];
// 	$question_number = $_POST['question_number'];
// 	$question_text = $_POST['question_text'];
//   $choice1=$_POST['choice1'];

// 	$correct_choice = $_POST['correct_choice'];
//   $sql = "INSERT INTO `test`(`qid`, `course_id`, `question`, `choice1`, `choice2`, `choice3`, `choice4`, `correct_ans`) VALUES ('$question_number','$cid','$question_text')";
//   $result=mysqli_query($conn,$sql);
// }

?>






<!----------------------- for question and option input table design -------------------->


<form name="addques" action="" method="post" onsubmit="return validateQuestion()">
<!-- dropdown for choose subjects -->
  <div class="container-fluid mt-1">
    <select name="course" id="course" class="border border-info border-3">
         <!-- Display course option dynamically -->
         <?php
            $sql2="SELECT * FROM `course` WHERE `status`='active'";
            $result2 = mysqli_query($conn, $sql2);
            $count2=mysqli_num_rows($result2);
            if($count2>0){
               echo' <option value="" selected>---Please choose a Course---</option>';
               while($row2 = mysqli_fetch_assoc($result2)){?>
                <option value="<?php echo $row2['course_id']?>"><?php echo $row2['course_name']?></option>
            <?php  }
            }
            else{
                // we do not have Course
                echo'<option value="0">No Course found</option>';
            }
          ?>
    </select>
    <?php if(isset($message)){
					echo "<h4>" . $message . "</h4>";
				} ?>
  </div>
  <div class="table-responsive">
    <table class="table table-hover table-striped table-bordered mt-1">
      <thead class="table-dark">
        <tr>
          <th scope="">Question Number</th>
          <th scope="">Question</th>
          <th scope="">Option 1</th>
          <th scope="">Option 2</th>
          <th scope="">Option 3</th>
          <th scope="">Option 4</th>
          <th scope="">Correct Option</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row"><input type="text" name="question_number" value=""></th>
          <td><input type="text" name="question_text" ></td>
            <!-- <div class="mt-1">
              <select name="lesson" id="lesson" class="border border-info border-3">
                <option value="" selected>---Please choose a Level---</option>
                <option value="">Beginner</option>
                <option value="">Intermediate</option>
                <option value="">Advance</option>
              </select>
            </div> -->
          
          <td><input type="text" name="choice1"></td>
          <td><input type="text" name="choice2"></td>
          <td><input type="text" name="choice3"></td>
          <td><input type="text" name="choice4"></td>
          <td><input type="text" name="correct_choice"></td>
          <!-- <td><input type="text"></td> -->
        </tr>
      </tbody>
    </table>
  </div>
  <div style="padding-left:20px;">
    <input type="submit" class="btn btn-success" name="questionSubmitBtn" value="Save">
  </div>
  </div>
</form>




<!----------------------- display question paper and options --------------------->

<div class=" container alt"><h1 class=" alt alert alert-success text-center mb-5 p-3 mt-3">List of question papers and its options</h1></div>
<form  action="" method="post">
  <table class="table table-hover table-striped table-bordered mt-2">
    <thead class="table-dark table-hover table-striped">
      <input type="hidden" placeholder="for course id">
      <tr>
        <th scope="col">Courses</th>
        <th scope="col">Question</th>
        <th scope="col">Option 1</th>
        <th scope="col">Option 2</th>
        <th scope="col">Option 3</th>
        <th scope="col">Option 4</th>
        <th scope="col">Correct Option</th>
        <th scope="col">Action</th>
      </tr>
    </thead>

    <?php
        //join question,course table to fetch questions of corresponding course
        $q = "SELECT * FROM `questions`,`course` where questions.course_id=course.course_id";
        $res = mysqli_query($conn, $q);
        $num=mysqli_num_rows($res);
       
        if($num>0){
          //question is available
          while($row3 = mysqli_fetch_assoc($res)){
    ?>
          
          <tbody>
            <tr>
              <th scope="row"><?=$row3['course_name']?></th>
              <td><?=$row3['question']?></td>

              <?php
              //fetch ans of espective questions
              $a = "SELECT * FROM `answers` where qid={$row3['qid']}";
              $res1 = mysqli_query($conn, $a);
              while($row4 = mysqli_fetch_assoc($res1)){
              ?>

              <td><?=$row4['choice']?></td>
              
          <?php } 
              //fetch correct choice of that respective question
              $corr_ans = "SELECT * FROM `answers` where qid={$row3['qid']} and correct_ans=1";
              $res2 = mysqli_query($conn, $corr_ans);
              while($row5 = mysqli_fetch_assoc($res2)){
              ?>
              <td><?=$row5['choice']?></td>
<?php } ?>
              <td>
                <form action="" method="POST">
                <input type="hidden" name="id" value="<?=$row3['qid'] ?>">
                  <button type="submit" class="btn btn-info" name="edit">Edit</button>
                </form>
                <button type="submit" class="btn btn-warning">Deactivate</button>
              </td>
            </tr>
          </tbody>
        
    <?php }
    }
        else{
          //question is not available
        }
    ?>
  </table>
</form>



<script>  
function validateQuestion()  
{  
var course= document.addques.course.value;
var Qno= document.addques.question_number.value;
var Qes=document.addques.question_text.value;
var opt1=document.addques.choice1.value;
var opt2=document.addques.choice2.value;
var opt3=document.addques.choice3.value;
var opt4=document.addques.choice4.value;
var correctans=document.addques.correct_choice.value;

if (course == null || course == "" ){  
  alert("Please select a  course");  
  return false;  
  } 
  else if (Qno == null || Qno == "") {
    alert("Fill this place");
    return false;
  }  
  else if (Qes == null || Qes == "") {
    alert("Fill this place");
    return false;
  }
  else if (opt1== null || opt1 == "") {
    alert("Fill this place");
    return false;
  }
  else if(opt2 == null || opt2 == "") {
    alert("Fill this place");
    return false;
  }
  else if(opt3 == null || opt3 == "") {
    alert("Fill this place");
    return false;
  }
  else if(opt4 == null || opt4 == "") {
    alert("Fill this place");
    return false;
  }
  else if(correctans == null || correctans == "") {
    alert("Fill this place");
    return false;
  }
}
</script>  




