<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #f0f4f8;
            margin: 0;
            padding: 0;
        }

        .box {
            width: 320px;
            margin: 120px auto;
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

        input[type="submit"] {
            background-color: #48bb78;
            color: white;
            border: none;
            font-weight: bold;
            cursor: pointer;
            margin-top: 15px;
            transition: background 0.2s;
        }

        input[type="submit"]:hover {
            background-color: #38a169;
        }

        .link {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
            color: #486581;
        }

        .link a {
            color: #3182ce;
            text-decoration: none;
            font-weight: bold;
        }

        .link a:hover {
            text-decoration: underline;
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
        
    		if(isset($_POST['email'])){
        		$conn = new mysqli($servername, $username, $password, $db);

        		if($conn->connect_error){
            			die("Connection Failed" . $conn->connect_error);
       	 		}
	
		    
        		$email = $_POST["email"];
          		$password = $_POST["password"];
       
			$sql="select * from register where email='$email'";

			$result = $conn->query($sql);

			if($result->num_rows>0){
			
				$sql="select * from register where email='$email' and password='$password'";

					$rest = $conn->query($sql);

					if($rest->num_rows>0){
						$st='login success';
						echo "<script>
							
							window.location.href='Welcome.php';
						     </script>";
	
					}
					else{
						$st='Invalid credentials';
					}
					
			}
			else{
	
				$st='not login please registere';			
			}
		}

		 ?>

    <div class="box">
        <h2>Login</h2>

        <form action="Login.php" method="POST">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>

            <input type="submit" value="Login">
        </form>

        <div class="link">
            Don't have an account? <a href="index.php">Register</a>
        </div>
	
	<p style="color:red"><?php echo $st ?></p>


    </div>

</body>
</html>