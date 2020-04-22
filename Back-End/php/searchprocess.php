<?php
	$path = './';
	require $path.'../../../../dbConnect.inc';
?>
<h2>Search Results</h2>



<?php
//-----------------------------------------------------------

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}


// Get the user's Information
$interest =  test_input($_POST['searchInterest']) ;
$filter = test_input($_POST['filter']);



$sqlName = "SELECT * FROM UserBase where Name LIKE '%$interest%'";
$res = mysqli_query($mysqli, $sqlName);
while($row = $res->fetch_assoc()) {
		$id = $row["UserID"];
		$name = $row["Name"];
		$email = $row["email"];
		$type = $row["isStudent"];
		
		if ($filter == "None"){
			$selectName = "SELECT * FROM InterestBase where UserID = '$id'";
		}
		else{
			$selectName = "SELECT * FROM InterestBase where Type = '$filter' AND UserID = '$id'";
		}
		
		$InterestInfo = mysqli_query($mysqli, $selectName);
		while ($interestRow = $InterestInfo->fetch_assoc()){
			echo "Name: " . $name. " - Keyword: " . $interestRow["Keyword"]. " -Description: " . $interestRow["Description"]. " - Type: ". $interestRow["Type"] . " -Email: ". $email;
			if ($type == 1){
				echo " - Student <br>";
			}
			else{
				echo " - Faculty <br>";
			}
		}
		
		
		
}    


if ($filter == "None"){
	$sql = "SELECT * FROM InterestBase where Keyword LIKE '%$interest%' or Description LIKE '%$interest%'";
}
else{
	$sql = "SELECT * FROM InterestBase where Type = '$filter' AND (Keyword LIKE '%$interest%' or Description LIKE '%$interest%')";
}
$res = mysqli_query($mysqli, $sql);

if ($res->num_rows > 0) {
    // output data of each row
    while($row = $res->fetch_assoc()) {
		$id = $row["UserID"];
		$selectName = "SELECT * FROM UserBase where UserID='$id'";
		$personInfo = mysqli_query($mysqli, $selectName);
		$personArray = $personInfo->fetch_assoc();
		
		$name = $personArray["Name"];
		$email = $personArray["email"];
		$type = $personArray["isStudent"];
		
        echo "Name: " . $name. " - Keyword: " . $row["Keyword"]. " -Description: " . $row["Description"]. " - Type: ". $row["Type"] . " -Email: ". $email;
		if ($type == 1){
			echo " - Student <br>";
		}
		else {
			echo " - Faculty <br>";
		}
    }
} else {
    echo "0 results";
}

?>

<?php

	mysqli_close($mysqli);
?>
