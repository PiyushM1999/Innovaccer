<?php

$id=$_COOKIE['id'];
$link = mysqli_connect("localhost", "root", "", "drdo");

$query="SELECT * FROM sign where id='$id'";
$result=mysqli_query($link,$query);
$row=mysqli_fetch_array($result);
if(isset($row)){
    $id=$row['id'];
    $name = $row['name1'];
    $password = $row['pass'];
    
    $town = $row['town'];
    $phone = $row['phone'];
    $DOB = $row['dob'];
    $email = $row['email'];
    $job = $row['job'];
    $rank = $row['rank'];
    $dept = $row['dept'];
    $unique=uniqid($dept);
    $doj = $row['doj'];
}
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $company=$_POST['company'];
    $purpose = $_POST['purpose'];
    $dtfr = $_POST['dtfr'];
    $dtto = $_POST['dtto'];
    $special = $_POST['special'];
    $query = "INSERT INTO details(name1,cmpny,purpose,datefrom,dateto,special) VALUES ('$name','$company','$purpose','$dtfr','$dtto','$special') ";
    $result=mysqli_query($link,$query);

    }


$now = new DateTime();

?>


<html>
	<head>
		<title>Employee list</title>
		<link rel="stylesheet" type="text/css" href="styleemp.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	</head>
	<body>
	<section>
            <div class="container-fluid">
                <div class="container">
                    <div class="formbox">
                        <form>
                            <div class="row">
                                <div class="col-sm-12">
                                    <h1>Employee Database</h1>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="inputbox">
                                            <div style="font-size:20px;color:#0091C9">Name</div>
                                            <input type="text" name="name" value=<?php echo $name;?> class="input">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="inputbox">
                                            <div style="font-size:20px;color:#0091C9">Department</div>
                                                <input type="text" name="name" class="input" value=<?php echo $dept;?>>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="inputbox">
                                            <div style="font-size:20px;color:#0091C9">Employee ID</div>
                                                <input type="text" name="name" class="input" value=<?php echo $id;?>>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="inputbox">
                                            <div style="font-size:20px;color:#0091C9">Designation</div>
                                                <input type="text" name="name" class="input" value=<?php $a=$job.":-";$a .=$rank; echo $a;?>>
                                        </div>
                                    </div>
								</div>
								<div class="row">
                                    <div class="col-sm-6">
                                        <div class="inputbox">
                                            <div style="font-size:20px;color:#0091C9">Application ID</div>
                                            <input type="text" name="name" class="input" value=<?php echo $unique;?>>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="inputbox">
                                            <div style="font-size:20px;color:#0091C9">Date</div>
												<input type="text" name="name" class="input" value=<?php echo $now->format('Y-m-d H:i:s');?> >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
		
		<br>
		<form name="add_name" id="add_name" method="POST" action="index.php">
			<div class="table-gr">
				<table class="table table-bordered" id="dynamic_field">
				<h2>Visitors Details</h2>
					<tr>
						<td><input type="text" name="name" placeholder="Visitors Name" value=<?php if(isset($row['name'])){echo $name;}else{echo " ";}?>></td>
						<td><input type="text" name="company" placeholder="company" value=<?php if(isset($row['Company/Dept.'])){echo $company;}else{echo " ";}?> ></td>
						<td><input type="text" name="purpose" placeholder="purpose" value=<?php if(isset($row['Purpose'])){echo $purpose;}else{echo " ";}?>></td>
						<td><input type="text" name="dtfr" onfocus="(this.type='date')" onfocusout="(this.type='text')" placeholder="date from" value=<?php if(isset($row['Date from'])){echo $dt_fr;}else{echo " ";}?>></td>
						<td><input type="text" name="dtto" onfocus="(this.type='date')" onfocusout="(this.type='text')" placeholder="date to" value=<?php if(isset($row['Date to'])){echo $dt_to;}else{echo " ";}?>></td>
						<td><input type="text" name="special" placeholder="Moblie,Laptops,..." value=<?php if(isset($row['Special permissions'])){echo $special;}else{echo " ";}?>></td>
                        
						<td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td>
					</tr>
				</table>
			</div>
			<br><br>
			<input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />
		</form>
	</body>
</html>

<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script type="text/javascript">
        $(".input").focus(function(){
            $(this).parent().addClass("focus");
            }).blur(function(){
                if($(this).val() === ''){
                    $(this).parent().removeClass("focus");
                }
            })
    </script>
<script>
$(document).ready(function(){
	var i=1;
    var c=1;
	$('#add').click(function(){
		i++;
		$('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="name" placeholder="Visitors Name" ></td><td><input type="text" name="company" placeholder="company" ></td><td><input type="text" name="purpose" placeholder="purpose" ></td><td><input type="date" name="dt_fr" placeholder="date from" ></td><td><input type="date" name="dt_to" placeholder="date to" ><input type="hidden" id="custId" name="i" ></td><td><input type="text" name="special" placeholder="Moblie,Laptops,..." ></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>')
        c++;
	});
	
	$(document).on('click', '.btn_remove', function(){
		var button_id = $(this).attr("id"); 
		$('#row'+button_id+'').remove();
	});
	
	$('#submit').click(function(){		
		$.ajax({
			url:"name.php",
			method:"POST",
			data:$('#add_name').serialize(),
			success:function(data)
			{
				alert(data);
				$('#add_name')[0].reset();
			}
		});
	});

});
</script>