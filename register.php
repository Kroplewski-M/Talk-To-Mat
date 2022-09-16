<?php
    include 'config.php';

    $name = $age = $email = $password = "";
    $nameErr = $ageErr = $emailErr = $passwordErr = $accountExists = $accountCreated = false;

    if(isset($_POST['login'])){
        header("location: login.php");
    }
    
    if(isset($_POST['register'])){
        //VALIDATE INPUT
        if($_POST['name'] == ''){
            $nameErr = true;
        }else $nameErr = false;

        if($_POST['age'] == ''){
            $ageErr = true;
        }else $ageErr = false;

        if($_POST['email'] == ''){
            $emailErr = true;
        }else $emailErr = false;

        if($_POST['password'] == ''){
            $passwordErr = true;
        }else $passwordErr = false;
        
        //CHECK IF USER ALREADY EXISTS
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if($emailErr == false){
            $check_email = mysqli_query($conn, "SELECT * FROM users where email = '$email'");
            if(mysqli_num_rows($check_email) > 0){
                $accountExists = true;
            }else $accountExists = false;
        }
        if(!$nameErr && !$ageErr && !$emailErr && !$passwordErr && !$accountExists){
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $password = password_hash(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS),PASSWORD_DEFAULT);

            //ADD TO DATABASE
            $sql = "INSERT INTO users (name,age,email,password) VALUES ('$name','$age','$email','$password')";
            if(mysqli_query($conn,$sql)){
                //SUCCESS
                $accountCreated = true;
            }else{
                echo "<script>alert('Error Occured! Please try again later!')</script>";
            }
            
        }
    }
?>

<body>
<section class="w-[100vw]">
        <div class="md:w-[60%] w-[100%] h-[100vh] md:float-left text-center text-zinc-300">

            <div class="max-w-[500px] h-[600px] rounded-md mx-auto bg-purple-800/50 md:mt-[200px] mt-[100px] text-zinc-300">
            <p class="font-bold text-center mt-[10px] text-[50px]">Register</p>

            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" class="w-[300px] mx-auto mt-10">
                <label for="name" class="font-semibold text-[20px]">Name:</label>
                <input type="text" name="name" placeholder="Enter your name here:" class="w-[300px] h-[40px] rounded-md bg-[#111111] pl-[10px]">
                <?php if($nameErr) echo "<p class='text-red-400 absolute'>invalid name</p>" ?>
                <br><br>
                <label for="age" class="font-semibold text-[20px]">Age:</label>
                <input type="number" name="age" placeholder="Enter your age here:" class="w-[300px] h-[40px] rounded-md bg-[#111111] pl-[10px]">
                <?php if($ageErr) echo "<p class='text-red-400 absolute'>invalid age</p>" ?>
                <br><br>
                <label for="email" class="font-semibold text-[20px]">Email:</label>
                <input type="email" name="email" placeholder="Enter your email here:" class="w-[300px] h-[40px] rounded-md bg-[#111111] pl-[10px]">
                <?php if($emailErr) echo "<p class='text-red-400 absolute'>invalid email</p>" ?>
                <?php if($accountExists) echo "<p class='text-red-400 absolute'>email already in use</p>" ?>
                <br><br>
                <label for="password" class="font-semibold text-[20px]">Password:</label>
                <input type="password" name="password" placeholder="Enter your password here:" class="w-[300px] h-[40px] rounded-md bg-[#111111] pl-[10px]">
                <?php if($passwordErr) echo "<p class='text-red-400 absolute'>invalid password</p>" ?>
                <div class="w-[140px] mx-auto">
                    <button name="register" type="submit" class="w-[140px] h-[40px] rounded-md font-bold bg-zinc-300 text-[#111111] mt-10 hover:bg-zinc-400">Register</button>
                </div>
                <?php if($accountCreated) echo "<p class='text-green-400 absolute pt-[10px]'>Account Created!You can login now.</p>" ?>
            </form>
            </div>
        </div>
        <div class="md:w-[40%] w-[100%] md:h-[100vh] md:float-right md:bg-purple-800/50">

            <div class="max-w-[500px] h-[400px] rounded-md mx-auto md:mt-[250px] -mt-[100px] text-zinc-300 text-center">
                <p class="font-bold text-[40px]">Already have an account?</p>
                <p class="font-light text-[30px]">Login below</p>
                <div class="w-[140px] mx-auto">
                    <form action="" method="POST">
                        <button name="login" type="submit" class="w-[140px] h-[40px] rounded-md font-bold bg-zinc-300 text-[#111111] mt-10 hover:bg-zinc-400">Login</button>
                    </form>
                </div>
            </div>
        </div>

   </section>

</body>
</html>