<?php
    include 'config.php';


    $email = $password = "";
    $emailErr = $passwordErr = $accountNotFound = false;

    if(isset($_POST['register'])){
        header("location: register.php");
    }
    if(isset($_POST['login'])){
        if($_POST['email'] == ''){
            $emailErr = true;
        }else $emailErr = false;

        if($_POST['password'] == ''){
            $passwordErr = true;
        }else $passwordErr = false;

        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
        $result = mysqli_query($conn, $user_check_query);
        $user = mysqli_fetch_assoc($result);

        if($user && password_verify($password, $user['password'])){
            $_SESSION['name'] = $user['name'];
            $_SESSION['UID'] = $user['uid'];
            $_SESSION['email'] = $user['email'];
            header('location: chat.php');
        }else{
            if($_POST['email'] !== '' && $_POST['password'] !== ''){
                $accountNotFound = true;
            }
        }
    }
?>

<body>
<section class="w-[100vw]">
        <div class="md:w-[60%] w-[100%] h-[100vh] md:float-left text-center text-zinc-300">

            <div class="max-w-[500px] h-[400px] rounded-md mx-auto bg-purple-800/50 md:mt-[200px] mt-[100px] text-zinc-300">
            <p class="font-bold text-center mt-[10px] text-[50px]">Login</p>

            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" class="w-[300px] mx-auto mt-10">
                <label for="email" class="font-semibold text-[20px]">Email:</label>
                <input type="email" name="email" placeholder="Enter your email here:" class="w-[300px] h-[40px] rounded-md bg-[#111111] pl-[10px]">
                <?php if($emailErr) echo "<p class='text-red-400 absolute'>This field has to be filled</p>" ?>
                <br><br>
                <label for="password" class="font-semibold text-[20px]">Password:</label>
                <input type="password" name="password" placeholder="Enter your password here:" class="w-[300px] h-[40px] rounded-md bg-[#111111] pl-[10px]">
                <?php if($emailErr) echo "<p class='text-red-400 absolute'>This field has to be filled</p>" ?>
                <?php if($accountNotFound) echo "<p class='text-red-400 absolute'>Email or password incorrect</p>" ?>

                <div class="w-[140px] mx-auto">
                    <button name="login" type="submit" class="w-[140px] h-[40px] rounded-md font-bold bg-zinc-300 text-[#111111] mt-10 hover:bg-zinc-400">Login</button>
                </div>
            </form>
            </div>
        </div>
        <div class="md:w-[40%] w-[100%] md:h-[100vh] md:float-right md:bg-purple-800/50">

            <div class="max-w-[500px] h-[400px] rounded-md mx-auto md:mt-[250px] -mt-[100px] text-zinc-300 text-center">
                <p class="font-bold text-[40px]">Dont have an account?</p>
                <p class="font-light text-[30px]">Register one now below</p>
                <div class="w-[140px] mx-auto">
                    <form action="" method="POST">
                        <button name="register" type="submit" class="w-[140px] h-[40px] rounded-md font-bold bg-zinc-300 text-[#111111] mt-10 hover:bg-zinc-400">Register Account</button>
                    </form>
                </div>
            </div>
        </div>
   </section>
</body>
</html>