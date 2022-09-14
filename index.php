<?php
    include 'config.php';

    if(isset($_POST['login'])){
        header("location: login.php");
    }
    if(isset($_POST['register'])){
        header("location: register.php");
    }
?>
<body>
    <section class="w-[99vw]">
         <div class="md:w-[40%] w-[100%] md:h-[100vh] h-[200px] md:float-right md:bg-purple-800/50">
            <img src="./assets/mat.png" alt="" class="md:w-[500px] w-[100px] h-[100px] md:h-[500px] relative z-10 rounded-full mx-auto mt-[100px] border-solid border-2 border-zinc-300">
        </div>

        <div class="md:w-[60%] w-[100%] h-[100vh] md:float-left text-center text-zinc-300">
            <p class="text-[60px] font-bold mt-16">Welcome to</p>
            <p class="text-[50px] font-light mt-5">talk to Mat</p>

        <div class="md:w-[500px] w-[100%] mx-auto mt-[100px]">
            <div class="blob w-[660px] h-[660px] absolute -z-50 left-0 hidden md:inline"></div>
            <p class="text-left font-semibold pl-[10px] md:pl-[0px]">please start with:</p>
            <form action="" method="POST">
                <button name="register" class="w-[300px] h-[50px] bg-purple-800 font-bold rounded-md mt-5 hover:bg-purple-900">Registering Account</button>
            </form>
            <p class="text-left font-semibold mt-10 pl-[10px] md:pl-[0px]">Or:</p>
            <form action="" method="POST">
                <button name="login" class="w-[300px] h-[50px] bg-purple-800 font-bold rounded-md mt-5 hover:bg-purple-900">Log into account</button>
            </form>
        </div>
        </div>
   </section>
</body>
</html>
<style>
.blob { 
  background-size: cover;
  background-repeat: no-repeat;
  background-image: url("data:image/svg+xml;utf8, %3Csvg width=%22100%25%22 height=%22100%25%22 viewBox=%220 0 1000 1000%22 xmlns=%22http:%2F%2Fwww.w3.org%2F2000%2Fsvg%22 %3E %3Cdefs%3E %3CclipPath id=%22shape%22%3E %3Cpath fill=%22currentColor%22 d=%22M868.5%2C619Q828%2C738%2C737.5%2C844.5Q647%2C951%2C503%2C942Q359%2C933%2C228.5%2C862.5Q98%2C792%2C65.5%2C646Q33%2C500%2C103%2C381Q173%2C262%2C273%2C186.5Q373%2C111%2C512%2C73Q651%2C35%2C741.5%2C147Q832%2C259%2C870.5%2C379.5Q909%2C500%2C868.5%2C619Z%22%3E%3C%2Fpath%3E %3C%2FclipPath%3E %3C%2Fdefs%3E %3Cg clip-path=%22url(%23shape)%22%3E %3Cpath fill=%22%23222222%22 d=%22M868.5%2C619Q828%2C738%2C737.5%2C844.5Q647%2C951%2C503%2C942Q359%2C933%2C228.5%2C862.5Q98%2C792%2C65.5%2C646Q33%2C500%2C103%2C381Q173%2C262%2C273%2C186.5Q373%2C111%2C512%2C73Q651%2C35%2C741.5%2C147Q832%2C259%2C870.5%2C379.5Q909%2C500%2C868.5%2C619Z%22 %2F%3E %3C%2Fg%3E %3C%2Fsvg%3E");
}

</style>