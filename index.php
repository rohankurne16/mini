<!DOCTYPE html>
<html>
<head>
    <title>Register Page</title>
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #f0f4f8;
            margin: 0;
            padding: 0;
        }

        .box {
            width: 320px;
            margin: 80px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
	    display: flex;
    	    flex-direction: column;
            align-items: center;
        }

        h2 {
            text-align: center;
            color: #334e68;
            margin-top: 0;
            margin-bottom: 20px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 1px solid #bcccdc;
            border-radius: 5px;
            font-size: 14px;
        }

        input:focus {
            outline: none;
            border-color: #627d98;
        }

        .btns {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
        }

        input[type="submit"] {
            width: 48%;
            background-color: #48bb78;
            color: white;
            border: none;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.2s;
        }

        input[type="submit"]:hover {
            background-color: #38a169;
        }

        input[type="reset"] {
            width: 48%;
            background-color: #9fb3c8;
            color: white;
            border: none;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.2s;
        }

        input[type="reset"]:hover {
            background-color: #829ab1;
        }

	a{
		text-decoration:none;
		font-weight:700;
	}

    </style>
</head>
<body>

    <?php
    $servername = "192.168.1.45";
    $username = "root";
    $password = "root";
    $db = "mini";
    $st="";
	
        
    if(isset($_POST['name'])){

	echo "<pre>";
print_r($_POST);
echo "</pre>";

        $conn = new mysqli($servername, $username, $password, $db);

        if($conn->connect_error){
            die("Connection Failed" . $conn->connect_error);
        }
	echo "Database Connected Successfully<br>";
	
	$name = $_POST["name"];    
        $email = $_POST["email"];
        $mobile = $_POST["mobile"];
        $password = $_POST["password"];
        $conpass = $_POST["confirm_password"];

	$sql="select * from register where email='$email'";

	$result = $conn->query($sql);

	if($result->num_rows>0){
		
		$st='Already registere please login';	
	}
	else{
	      if($password == $conpass){
           		$sql = "insert into register(name,email,mobile,password)values('$name','$email','$mobile','$password')";
            		if($conn->query($sql) === true){
				$st='Registered successfully';
              	  		echo "<script>
    					
    					window.location.href='Login.php';
		      		      </script>";
				
           		 }    
        	} else {
            		$st='Password dont matched';            
       		 } 				
	} 
	$conn->close();
    }
    ?>

    <div class="box">

        <h2>Registration</h2>

        <form action="index.php" method="POST">


            <input type="text" name="name" placeholder="Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="tel" name="mobile" placeholder="Mobile" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="confirm_password" placeholder="Confirm Password" required>

            <div class="btns">
                <input type="submit" value="Register">
                <input type="reset" value="Clear">
            </div>
	
        </form>

	 <p>Already Registered ? <a href="Login.php">Login here !</a></p>

	<p style="color:red"><?php echo $st ?></p>

    </div>

</body>
</html>