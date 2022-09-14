<?php
    include 'config.php';
?>

<body>
<section class="w-[100vw]">
        <div class="md:w-[60%] w-[100%] h-[100vh] md:float-left text-center text-zinc-300">

            <div class="max-w-[500px] h-[600px] rounded-md mx-auto bg-purple-800/50 md:mt-[200px] mt-[100px] text-zinc-300">
            <p class="font-bold text-center mt-[10px] text-[50px]">Register</p>

            <form action="" class="w-[300px] mx-auto mt-10">
                <label for="name" class="font-semibold text-[20px]">Name:</label>
                <input type="text" name="name" placeholder="Enter your name here:" class="w-[300px] h-[40px] rounded-md bg-[#111111] pl-[10px]">
                <br><br>
                <label for="age" class="font-semibold text-[20px]">Age:</label>
                <input type="number" name="age" placeholder="Enter your age here:" class="w-[300px] h-[40px] rounded-md bg-[#111111] pl-[10px]">
                <br><br>
                <label for="email" class="font-semibold text-[20px]">Email:</label>
                <input type="email" name="email" placeholder="Enter your email here:" class="w-[300px] h-[40px] rounded-md bg-[#111111] pl-[10px]">
                <br><br>
                <label for="password" class="font-semibold text-[20px]">Password:</label>
                <input type="password" name="password" placeholder="Enter your password here:" class="w-[300px] h-[40px] rounded-md bg-[#111111] pl-[10px]">
                <div class="w-[140px] mx-auto">
                    <button name="login" type="submit" class="w-[140px] h-[40px] rounded-md font-bold bg-zinc-300 text-[#111111] mt-10 hover:bg-zinc-400">Login</button>
                </div>
            </form>
            </div>
        </div>
        <div class="md:w-[40%] w-[100%] md:h-[100vh] md:float-right md:bg-purple-800/50">

            <div class="max-w-[500px] h-[400px] rounded-md mx-auto md:mt-[250px] -mt-[100px] text-zinc-300 text-center">
                <p class="font-bold text-[40px]">Already have an account?</p>
                <p class="font-light text-[30px]">Login below</p>
                <div class="w-[140px] mx-auto">
                    <button name="register" type="submit" class="w-[140px] h-[40px] rounded-md font-bold bg-zinc-300 text-[#111111] mt-10 hover:bg-zinc-400">Login</button>
                </div>
            </div>
        </div>

   </section>

</body>
</html>