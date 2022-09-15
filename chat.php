<?php
    include 'config.php'
?>

<body>
    <section class="max-w-[800px] h-[90vh] mx-auto rounded-md bg-purple-900 mt-10 mb-[50px] pb-10 md:pb-0">
        <nav class="pl-5 pb-[70px]">
            <img src="./assets/user.png" alt="" class="w-[35px] mt-[10px] float-left">
            <p class="float-left mt-[13px] font-bold ml-5">Mateusz Kroplewski</p>
            <img src="./assets/settings.png" alt="" class="w-[35px] mt-[8px] float-right mr-5">
        </nav>
        <div class="w-[90%] h-[88%] bg-[#111111] mx-auto rounded-md relative">
           <div class="absolute bottom-0 w-[100%] h-[60px] bg-[#222222] rounded-b-md">
                <input type="text" name="" id="" class="mt-[15px] w-[85%] bg-transparent text-zinc-300 ml-5" placeholder="Type your message here....">
                <img src="./assets/send.png" alt="" class="float-right w-[30px] mt-[13px] mr-[15px]">
           </div>
        </div>
    </section>
</body>
</html>
<style>
    input{
        outline-width: 0;
    }
</style>