<?php
    include 'config.php';
    $name = "Guest";
    $email = "unknown";
    $age = "unkown";
    $password="none";
    $is_logged = false;

    if(isset($_SESSION['name'])){
        $name = $_SESSION['name'];
        $email = $_SESSION['email'];
        $age = "20";
        $password="*********";
        $is_logged = true;

    }
    if(isset($_POST['logout'])){
        session_destroy();
        header("location: index.php");
    }
?>

<body>
    <section class="max-w-[1000px] h-[100vh] mx-auto rounded-md bg-purple-900  mb-[50px] pb-10 md:pb-0 pt-5">
        <nav class="pl-10 rounded-md bg-[#222222] mb-5 mx-auto w-[90%] h-[60px]">
            <img src="./assets/user.png" alt="" class="w-[35px] mt-[10px] float-left hover:cursor-pointer">
            <p class="float-left mt-[13px] font-bold ml-5 text-zinc-300"><?php echo $name ?></p>
            <img src="./assets/settings.png" alt="" class="w-[35px] mt-[8px] float-right mr-10 hover:cursor-pointer">
        </nav>
        <div class="messages w-[90%] h-[88%] bg-[#111111] mx-auto rounded-md relative pt-5">

            <div class="max-w-[300px] min-h-[100px] rounded-md bg-purple-800 ml-5 pl-[5px] relative">
                <p class="text-zinc-500 font-light w-[100%]">Jake-</p>
                <p class="text-zinc-300 font-semibold w-[90%]">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Suscipit, fuga.</p>
                <p class="text-zinc-500 font-light w-[100%] text-[10px] sticky bottom-0 pt-[5px]">10:05</p>
            </div>
            <div class="max-w-[300px] min-h-[100px] rounded-md bg-purple-800 ml-5 pl-[5px] mt-5">
                <p class="text-zinc-500 font-light w-[100%]">Callum-</p>
                <p class="text-zinc-300 font-semibold w-[90%]">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Suscipit, fuga.</p>
                <p class="text-zinc-500 font-light w-[100%] text-[10px] sticky bottom-0 pt-[5px]">10:05</p>
            </div>
            <div class="max-w-[300px] min-h-[100px] rounded-md bg-purple-800 ml-5 pl-[5px] mt-5">
                <p class="text-zinc-500 font-light w-[100%]">Cameron-</p>
                <p class="text-zinc-300 font-semibold w-[90%]">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Suscipit, fuga.</p>
                <p class="text-zinc-500 font-light w-[100%] text-[10px] sticky bottom-0 pt-[5px]">10:05</p>
            </div>
            <div class="w-[100%] min-h-[150px]">
                <div class="max-w-[300px] min-h-[100px] rounded-md bg-blue-800 ml-5 pl-[5px] mt-5 float-right mr-5">
                    <p class="text-zinc-500 font-light w-[100%]">Mateusz-</p>
                    <p class="text-zinc-300 font-semibold w-[90%]">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Suscipit, fuga.</p>
                    <p class="text-zinc-500 font-light w-[100%] text-[10px] sticky bottom-0 pt-[5px]">10:05</p>
                </div>
            </div>
                <div class="max-w-[300px] min-h-[100px] rounded-md bg-purple-800 ml-5 pl-[5px] mt-5">
                    <p class="text-zinc-500 font-light w-[100%]">Cameron-</p>
                    <p class="text-zinc-300 font-semibold w-[90%]">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Suscipit, fuga.</p>
                   <p class="text-zinc-500 font-light w-[100%] text-[10px] sticky bottom-0 pt-[5px]">10:05</p>
                </div>

                <div class="max-w-[300px] min-h-[100px] rounded-md bg-purple-800 ml-5 pl-[5px] mt-5">
                <p class="text-zinc-500 font-light w-[100%]">Jake-</p>
                <p class="text-zinc-300 font-semibold w-[90%]">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Suscipit, fuga.</p>
                <p class="text-zinc-500 font-light w-[100%] text-[10px] sticky bottom-0 pt-[5px]">10:05</p>
            </div>
            <div class="max-w-[300px] min-h-[100px] rounded-md bg-purple-800 ml-5 pl-[5px] mt-5">
                <p class="text-zinc-500 font-light w-[100%]">Callum-</p>
                <p class="text-zinc-300 font-semibold w-[90%]">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Suscipit, fuga.</p>
                <p class="text-zinc-500 font-light w-[100%] text-[10px] sticky bottom-0 pt-[5px]">10:05</p>
            </div>
            <div class="max-w-[300px] min-h-[100px] rounded-md bg-purple-800 ml-5 pl-[5px] mt-5">
                <p class="text-zinc-500 font-light w-[100%]">Cameron-</p>
                <p class="text-zinc-300 font-semibold w-[90%]">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Suscipit, fuga.</p>
                <p class="text-zinc-500 font-light w-[100%] text-[10px] sticky bottom-0 pt-[5px]">10:05</p>
            </div>

           <div class="sticky bottom-0 w-[100%] h-[60px] bg-[#222222] rounded-b-md mt-10">
                <input type="text" name="" id="" class="mt-[15px] w-[85%] bg-transparent text-zinc-300 ml-5" placeholder="Type your message here....">
                <img src="./assets/send.png" alt="" class="float-right w-[30px] mt-[13px] mr-[15px] hover:cursor-pointer">
           </div>
        </div>
    </section>
      <!--ACCOUNT SETTINGS -->
      <section class="w-[99vw] h-[100vh] backdrop-blur-md absolute top-0">
            <div class="max-w-[500px] h-[500px] bg-[#111111] mx-auto rounded-md mt-10 text-zinc-300 relative">
                <img src="./assets/close.png" alt="" class="w-[30px] absolute right-2 mt-[3px] hover:cursor-pointer">
                <p class="text-[30px] text-center font-bold">Account Settings</p>

                <div class="text-center font-bold text-[20px] mt-[50px]">
                    <p class="border-solid border-2 border-zinc-300 rounded-sm h-[40px] max-w-[400px] mx-auto">Name: <span class="font-normal ml-5"> <?= $name ?> </span></p>
                    <p class="mt-10 border-solid border-2 border-zinc-300 rounded-sm h-[40px] max-w-[400px] mx-auto">Email: <span class="font-normal ml-5"> <?= $email ?> </span></p>
                    <p class="mt-10 border-solid border-2 border-zinc-300 rounded-sm h-[40px] max-w-[400px] mx-auto">Age: <span class="font-normal ml-5"> <?= $age ?> </span></p>
                    <p class="mt-10 border-solid border-2 border-zinc-300 rounded-sm h-[40px] max-w-[400px] mx-auto">Password: <span class="font-normal ml-5"> <?= $password ?> </span></p>
                    <button class="max-w-[200px] h-[35px] bg-purple-900 rounded-md mt-10 mb-10 float-left ml-[40px] md:ml-[100px] px-[5px]">Change Information</button>
                    <form action="" method="POST">
                        <button value="submit" name="logout" class="max-w-[200px] h-[35px] bg-purple-900 rounded-md mt-10 mb-10 float-left ml-5 px-[5px]" id="logout">Logout</button>
                    </form>
                </div>
            </div>
      </section>  
</body>
</html>
<style>
    input{
        outline-width: 0;
    }
    .messages{
        overflow-y: scroll;
    }
    /* width */
    ::-webkit-scrollbar {
        width: 10px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
        box-shadow: inset 0 0 5px grey; 
        border-radius: 10px;
    }
    
    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: rgb(99,38,145); 
        border-radius: 10px;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: rgb(110,48,155); 
    }
</style>
