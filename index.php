<?php
	$path = './';
	require $path.'../../dbConnect.inc';
?>
<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <title>Example Title</title>
    <meta name="author" content="Dev Bhatt & Steve Morrissey">
    <meta name="description" content="Faculty Research Database">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Front-End/css/style.css">
    <!--	<link rel="icon" type="image/x-icon" href=""/>-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css">
</head>

<body>
    <header></header>

    <div class="ct" id="t1">
        <div class="ct" id="t2">
            <div class="ct" id="t3">
                <div class="ct" id="t4">
                    <div class="ct" id="t5">
                        <ul id="menu">
                            <a href="#t1">
                                <li class="icon fa fa-search fa-3x" id="uno"></li>
                            </a>
                            <a href="#t2">
                                <li class="icon fa fa-plus-circle fa-3x" id="dos"></li>
                            </a>
                            <a href="#t3">
                                <li class="icon fa fa-database fa-3x" id="tres"></li>
                            </a>
                            <!--
                            <a href="#t4">
                                <li class="icon fa fa-dribbble" id="cuatro"></li>
                            </a>
                            <a href="#t5">
                                <li class="icon fa fa-plus-circle" id="cinco"></li>
                            </a>
-->
                        </ul>
                        <div class="page" id="p1">
                            <div class="title cntr">Welcome to Faculty Research Database </div>

                            <div>
                                <form class="search-container" name="OrderFrom" action="Back-End/php/searchprocess.php" onsubmit="return validateForm();" method="post">
                                    <input type="text" name="searchInterest" id="search-bar" placeholder="Search for interests">
									<div class="pads">
                                        <label for="isStudent">Filter by type:</label>

                                        <select id="isstudent" name="filter">
										
											<option value="None"> None</option>
                                            <option value="Research"> Research</option>
                                            <option value="Paper"> Paper</option>
											<option value="Project"> Project</option>
											<option value="Other"> Other</option>

                                        </select>
                                    </div>
                                    <a href="#"><img class="search-icon" src="http://www.endlessicons.com/wp-content/uploads/2012/12/search-icon.png"></a>
                                </form>
                            </div>





                        </div>
                        <div class="page" id="p2">

                            <!--                            <section class="title cntr">ADD A RECORD</section>-->

                            <div class="login-box">
                                <h2>ADD A RECORD</h2>
                                <form action="Back-End/php/addrecords.php" method="get">
                                    <div class="user-box">
                                        <input type="text" name="name" required="">
                                        <label>Name</label>
                                    </div>
                                    <div class="user-box">
                                        <input type="email" name="email" required="">
                                        <label>Email</label>
                                    </div>
									<div class="user-box">
                                        <input type="text" name="department" required="">
                                        <label>Department Name</label>
                                    </div>

                                    <div class="pads">
                                        <label for="isStudent">Student Or Professor</label>

                                        <select id="isstudent" name="StudentFlag">
                                            <option value="true"> Student</option>
                                            <option value="false"> Professor</option>

                                        </select>
                                    </div>

                                    <h4>ADD YOUR INTERESTS USING THE FIELDS BELOW</h4>

                                    <div class="user-box">
                                        <input type="text" name="keyword" required="">
                                        <label>Keyword</label>
                                    </div>

                                    <div class="user-box">
                                        <input type="text" name="description" required="">
                                        <label>Description</label>
                                    </div>

                                    <div class="pads">
                                        <label for="type"> Type </label>

                                        <select id="type" name="type">
                                            <option value="research"> Research</option>
                                            <option value="project"> Project</option>
                                            <option value="paper">Paper</option>
                                            <option value="other">Other</option>


                                        </select>
                                    </div>





                                    <a>

                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <input type="submit" value="Submit" />
                                    </a>
                                </form>
                            </div>







                        </div>
                        <div class="page" id="p3">
                            <section class="icon fa fa-rocket"><span class="title">Rocket</span></section>
							<table align="center" >
								<tr>
									<th><h2>User Interests</h2></th>
								</tr>
								<t>
									<th>Name</th>
									<th>Keyword</th>
									<th>Description</th>
									<th>Type</th>
									<th>Email</th>
								</t>
								<?php
									$sql = "SELECT Name, Keyword, Description, Type, Email From UserBase RIGHT JOIN InterestBase On UserBase.UserID = InterestBase.UserID";
									$res = mysqli_query($mysqli, $sql);
									while($row = $res->fetch_assoc()) {
								?>
									<tr>
										<td><?php echo $row['Name']; ?></td>
										<td><?php echo $row['Keyword']; ?></td>
										<td><?php echo $row['Description']; ?></td>
										<td><?php echo $row['Type']; ?></td>
										<td><?php echo $row['Email']; ?></td>
									</tr>
									<?php 
										}
										?>
								
								
								
							</table>	
							
							
							
                        </div>
                        <div class="page" id="p4">
                            <section class="icon fa fa-dribbble">
                                <span class="title">Dribbble</span>
                                <p class="hint">
                                    <a href="https://dribbble.com/albertohartzet" target="_blank">Im ready to play, <span class="hint line-trough">invite me </span> find me</a>
                                </p>
                                <p class="hint">Already invited by <a href="http://www.dribbble.com/mrpeters" target="_blank">Stan Peters</a></p>
                            </section>
                        </div>
                        <div class="page" id="p5">
                            <section class="icon fa fa-plus-circle">
                                <span class="title">More</span>
                                <p class="hint">
                                    <span>You love one page & CSS only stuff? </span><br />
                                    <a href="https://codepen.io/hrtzt/details/pgXMYb/" target="_blank">check this pen "Pure CSS One page vertical navigation"</a>
                                </p>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer></footer>
    <script type="text/javascript" src="Front-End/js/script.js"></script>
</body></html>
