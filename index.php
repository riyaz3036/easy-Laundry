<?php
include('dbcon.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT-dByWAgbS_9OR_-I5F3lv3mzrobuutzXElQ&usqp=CAU" type="image/icon type">

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <title>User view</title>
</head>
<body>



    <h1 style="text-align:center;margin-top:150px;">View your Laundry Status here</h1>
    <div class="container">
    <br/>
 
	<div class="row justify-content-center">
                        <div class="col-12 col-md-8 ">
                            <form class="card card-sm" action="" method="post">
                                <div class="card-body row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <i class="fas fa-search h4 text-body"></i>
                                    </div>
                                    <!--end of col-->
                                    <div class="col">
                                        <input class="form-control form-control-lg form-control-borderless" name="coupan" type="search" placeholder="Enter Coupan ID for your Laundry status">
                                    </div>
                                    <!--end of col-->
                                    <div class="col-auto">
                                        <button class="btn btn-lg btn-success" type="submit" name="submit">Search</button>
                                    </div>
                                    <!--end of col-->
                                </div>
                            </form>
                        </div>
                        <!--end of col-->
                    </div>
</div>
<br>
<?php



if(isset($_POST['submit'])){
    $user_view=mysqli_query($link,"SELECT * FROM user_view  WHERE  `coupan`='$_POST[coupan]'");
    
      echo "<table class='table table-dark container '>
    <tr>
    <th scope='col'>Name</th>
    <th scope='col'>Heavy</th>
    <th scope='col'>Delicate</th>
    <th scope='col'>Kids</th>
    <th scope='col'>Others </th>
    <th scope='col'>Total amount</th>
    <th scope='col'>Laundry status</th>
    <th scope='col'>Payment status</th>
    </tr>";



    while($row=mysqli_fetch_array($user_view)){
        // $name=$row['name'];
        // $heavy=$row['heavy'];
        // $delicate=$row['delicate'];
        // $kids=$row['kids'];
        // $other=$row['other'];
        // $t_amt=$row['t_amount'];
        // $l_status=$row['L_status'];
        // $p_status=$row['P_status'];

        echo "<tr>";
        echo "<td>"; echo $row['name'];echo "</td>";
        echo "<td>"; echo $row['heavy'];echo "</td>"; 
        echo "<td>"; echo $row['delicate'];echo "</td>";
        echo "<td>"; echo $row['kids'];echo "</td>";
        echo "<td>"; echo $row['other'];echo "</td>";
        echo "<td>"; echo $row['t_amount'];echo "</td>";
        echo "<td>"; echo $row['L_status'];echo "</td>";
        echo "<td>"; echo $row['P_status'];echo "</td>";
        echo "</tr>";
        }
    $unp = mysqli_query($link,"SELECT sum(t_amount) as unpaid from user_view where P_status ='Not paid' ");
    $unpaid = mysqli_fetch_array($unp);


    
    ?>
    <center>
    <h3>Total unpaid amount : ₹ <?=$unpaid['unpaid'] ?> /- </h3>
    </center>
<?php  
    }

    
?>


    <script>
function myFunction() {
  let text;
  let person = prompt("Please enter your name:", "Admin");
  if (person == null || person == "") {
    text = "User cancelled the prompt.";
  } else {
    window.location.href='login.php';
  }
  document.getElementById("demo").innerHTML = text;
}
</script>
</div>
</body>
</html>
