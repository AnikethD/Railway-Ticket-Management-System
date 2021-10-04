<?php include('header.php'); 
require '../dbconnect.php';
session_start();
if(isset($_POST['submit']))
{
	$pname=$_POST['pname'];
	$seat_no=$_POST['seat_no'];
	$date=$_POST['date'];
	$date = date($date);
	$bookdate=date('Y-m-d H:i:s',strtotime('today IST'));
	$train_no=$_POST['TrainNumber'];
	$train_status = 'confirm';


	$statement = $db->prepare("SELECT * FROM train_status WHERE TrainNumber = ?");
	$statement->execute(array($train_no));
	$result = $statement->fetch()['available_seats'];

    $random1=str_shuffle("12345678915975369740582198745632109632587410756489156324");
    $amt=substr($random1,0,3);



	if($result > $seat_no) 
	{?>
        <div class="col-md-12 forminput">
        <form style="" name="adform" action="tickets.php" method="post" class="" >
          <div class="">
            <label  class="">Amt to be Paid :<li>Amt to be paid at arrival : <?php echo $amt ;?></li> </label>
            <!-- <input type="text" class="form-control" id="inputEmail3" value="amt"> -->
            
          </div>
          </div>
		
		<div align="center" class="col-md-3">
		<table class="table tablebg">
			<tr>
				<td>Your Requested is completed </td>
			</tr>
			<tr>
				<td>You have booked : <?php echo $seat_no ;?> seats.</td>
			</tr>
            <tr>
				<td>Amt to be paid at arrival : <?php echo $amt ;?></td>
			</tr>
            <tr><td>Enter mode of payment</td><td><select name="mode" id="mode"><option value="credit card">Credit Card</option>
        <option value="debit card">Debit Card</option><option value="nb">Net Banking</option><option value="upi">UPI</option></select></td></tr>
        <tr><td><input type="reset" value="Reset"/></td><td><input type="submit" value="submit"/></td></tr>
		</table>
		</div>
        
		<?php


	} else 

	{

	?>
	<div align="center" class="col-md-5">
		<table class="table tablebg">
			<tr>
				<td>Unable to book Desired Number of seats</td>
			</tr>
			<tr>
				<td>Available Seats : <?php echo $result ;?> seats.</td>
			</tr>
		</table>
	</div>
	<?php
	}

}		
?>
			 
			  <div class="col-md-12 forminput">
	

			  </div>
			</div>
		</div>
<?php 
// include('../footer.php'); ?>
 

       