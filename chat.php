<?php
    include 'config.php';
    $name = "Guest";
    $email = "unknown";
    $age = "unkown";
    $password="none";
    $is_logged = false;
    $UID = "Guest";
    $guestError = "You must be logged in to send a message!";
    $showGuestError = false;

    //SET LOGGED IN USER
    if(isset($_SESSION['name'])){
        $name = $_SESSION['name'];
        $email = $_SESSION['email'];
        $UID = $_SESSION['UID'];
        $age = $_SESSION['age'];
        $password="*********";
        $is_logged = true;

    }
    if(isset($_POST['logout'])){
        session_destroy();
        header("location: index.php");
    }
    if(isset($_POST['login'])){
        session_destroy();
        header("location: login.php");
    }

    //UPDATE INFO
    $updatedName = $updatedEmail = $updatedPassword = '';
    //


    //SEND MESSAGE
    $message = "";
    if(isset($_POST['send'])){
        if($name != "Guest"){
            $message = $_POST['message'];
            if($message != ''){
                $sql = "INSERT INTO messages (uid,body) VALUES ('$UID','$message')";
                mysqli_query($conn,$sql);
                $message = "";
            }
        }else{
            $showGuestError = true;
        }
    }

        //RETRIEVE MESSAGES
        function getMessages($conn,$UID,$name){
            $sql = "SELECT * FROM messages";
            $result = $conn->query($sql);
            if($result->num_rows >0){
                //OUTPUT MESSAGES
                while($row = $result->fetch_assoc()){
                    if($row["uid"] == $UID){
                        echo '
                        <div class="w-[100%] min-h-[150px]">
                            <div class="max-w-[400px] min-w-[150px] min-h-[30px] rounded-md bg-blue-800 ml-5 pl-[5px] mt-5 float-right mr-5 relative">
                                <p class="text-zinc-500 font-light w-[100%]">'. $name . '</p>
                                <p class="text-zinc-300 font-semibold w-[90%] mb-[5px] pb-5">'. $row['body'] . '</p>
                                <p class="text-zinc-500 font-light w-[100%] text-[10px] absolute pt-[5px]">'. $row['time'] . '</p>
                            </div>
                        </div>
                        ';
                    }else{
                        $sql2 = "SELECT * FROM users WHERE uid=$row[uid]";
                        $result2 = $conn->query($sql2);
                        $getName = $result2->fetch_assoc();
                        echo '
                        <div class="max-w-[300px] min-w-[100px] min-h-[100px] rounded-md bg-purple-800 ml-5 pl-[5px] mt-5 relative">
                        <p class="text-zinc-500 font-light w-[100%]">'. $getName['name'] .'</p>
                        <p class="text-zinc-300 font-semibold w-[90%] pb-5">'. $row['body'] . '</p>
                       <p class="text-zinc-500 font-light w-[100%] text-[10px] absolute bottom-0 pt-[5px]">'. $row['time'] . '</p>
                    </div>
                        ';
                    }
                }
            }

        }
 
?>

<body>
    <section class="max-w-[1000px] h-[100vh] mx-auto rounded-md bg-purple-900  mb-[50px] pb-10 md:pb-0 pt-5 relative">
        <nav class="pl-10 rounded-md bg-[#222222] mb-5 mx-auto w-[90%] h-[60px]">
            <img src="./assets/user.png" alt="" class="w-[35px] mt-[10px] float-left hover:cursor-pointer">
            <p class="float-left mt-[13px] font-bold ml-5 text-zinc-300"><?php echo $name ?></p>
            <img src="./assets/settings.png" alt="" class="w-[35px] mt-[8px] float-right mr-10 hover:cursor-pointer" id="showSettings">
        </nav>
        <div class="messages w-[90%] h-[88%] bg-[#111111] mx-auto rounded-md relative pt-5">
            <div class="h-[100%]">
                <?php
                    getMessages($conn,$UID,$name);
                ?>
            </div>
        </div>
        <div class="absolute -bottom-5 w-[100%] h-[60px] bg-[#222222] rounded-b-md">
         <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
             <input type="text" name="message" id="" class="mt-[15px] w-[85%] bg-transparent text-zinc-300 ml-5" placeholder="Type your message here....">
             <img src="./assets/send.png" alt="" class="float-right w-[30px] -mt-[25px] md:mt-[10px] mr-[15px] hover:cursor-pointer">
             <button value="submit" name="send" class="absolute right-4 mt-[16px] bg-transparent w-[30px] h-[30px]"></button>
         </form>
        </div>
    </section>
      <!--ACCOUNT SETTINGS -->
      <section class="w-[99vw] h-[100vh] backdrop-blur-md absolute top-0 hidden" id="settings">
            <div class="max-w-[500px] h-[500px] bg-[#111111] mx-auto rounded-md mt-10 text-zinc-300 relative">
                <img src="./assets/close.png" alt="" class="w-[30px] absolute right-2 mt-[3px] hover:cursor-pointer" id="closeSettings">
                <p class="text-[30px] text-center font-bold">Account Settings</p>
                <!--IF ITS A GUEST-->
                <div class="text-center font-bold text-[20px] mt-[50px]" id="guest">
                    <p class="text-[25px]">You are not logged in!</p>
                    <form action="" method="POST">
                        <button value="submit" name="login" class="w-[300px] h-[45px] bg-purple-900 rounded-md mt-10 mb-10 float-left ml-10 md:ml-[100px] px-[5px] font-bold" id="login">Login</button>
                    </form>
                </div>
                <!--SHOW INFO-->
                <div class="text-center font-bold text-[20px] mt-[50px] hidden" id="information">
                    <p class="border-solid border-2 border-zinc-300 rounded-sm h-[40px] max-w-[400px] mx-auto">Name: <span class="font-normal ml-5"> <?= $name ?> </span></p>
                    <p class="mt-10 border-solid border-2 border-zinc-300 rounded-sm h-[40px] max-w-[400px] mx-auto">Email: <span class="font-normal ml-5"> <?= $email ?> </span></p>
                    <p class="mt-10 border-solid border-2 border-zinc-300 rounded-sm h-[40px] max-w-[400px] mx-auto">Age: <span class="font-normal ml-5"> <?= $age ?> </span></p>
                    <p class="mt-10 border-solid border-2 border-zinc-300 rounded-sm h-[40px] max-w-[400px] mx-auto">Password: <span class="font-normal ml-5"> <?= $password ?> </span></p>
                    <button class="max-w-[200px] h-[35px] bg-purple-900 rounded-md mt-10 mb-10 float-left ml-[40px] md:ml-[100px] px-[5px] font-bold" id="toggleForm">Change Information</button>
                    <form action="" method="POST">
                        <button value="submit" name="logout" class="max-w-[200px] h-[35px] bg-purple-900 rounded-md mt-10 mb-10 float-left ml-5 px-[5px] font-bold" id="logout">Logout</button>
                    </form>
                </div>
                <!--SHOW FORM-->
                <div class="text-center font-bold text-[20px] mt-[50px] hidden" id="accountForm">  
                    <p class='text-red-400 '>Only input fields you want to change</p>
                    <form action="">
                        <label for="name">Name:</label>
                        <br>
                        <input type="text" placeholder="<?php echo $name ?>" class="w-[200px] h-[30px] bg-[#222222] rounded-md text-zinc-300 pl-[5px]">
                        <br><br>
                        <label for="email">Email:</label>
                        <br>
                        <input type="email" placeholder="<?php echo $email ?>" class="w-[200px] h-[30px] bg-[#222222] rounded-md text-zinc-300 pl-[5px]">
                        <br><br>
                        <label for="email">Password:</label>
                        <br>
                        <input type="password" class="w-[200px] h-[30px] bg-[#222222] rounded-md text-zinc-300 pl-[5px]">
                        <br>
                        <button value="submit" name="submit" class="max-w-[200px] h-[35px] bg-purple-900 rounded-md mt-10 mb-10 float-left ml-5 px-[5px] font-bold ml-[40px] md:ml-[165px]" id="submit">Submit</button>
                        <button name="back" class="max-w-[200px] h-[35px] bg-purple-900 rounded-md mt-10 mb-10 float-left ml-5 px-[5px] font-bold ml-[20px]"id="back">Back</button>
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

<script>
    let messages = document.querySelector('.messages');
    messages.scrollTop = messages.scrollHeight;


    let guestSettings =  document.querySelector('#guest');
    let info = document.querySelector('#information');
    //CHECK IF USER IS LOGGED IN    
    let loggedIn = '<?= $is_logged ?>';
    if(loggedIn){
        guestSettings.classList.add('hidden');
        information.classList.remove('hidden');
    }


    //TOGGLE SETTINGS
    let settingsBtn = document.querySelector('#showSettings');
    let settings = document.querySelector('#settings');
    let closeSettings = document.querySelector('#closeSettings');
    let showSettings = false;

    settingsBtn.addEventListener("click", ()=>{
        showSettings = !showSettings;
        toggleShowSettings();
    });
    closeSettings.addEventListener("click", ()=>{
        showSettings = !showSettings;
        toggleShowSettings();
    });

    function toggleShowSettings(){
        if(showSettings){
            settings.classList.remove('hidden');
        }
        else{
            settings.classList.add('hidden');
        }
    }
    //TOGGLE FORM
    let showForm = false;
    let toggleForm = document.querySelector('#toggleForm');
    let accountForm = document.querySelector('#accountForm');
    let back = document.querySelector('#back');

    toggleForm.addEventListener("click", ()=>{
        showForm = !showForm;
        displayForm();
    });
    back.addEventListener("click", (event)=>{
        event.preventDefault();
        showForm = !showForm;
        displayForm();
    });

    function displayForm(){
        if(showForm){
            info.classList.add("hidden");
            accountForm.classList.remove("hidden");
        }else{
            info.classList.remove("hidden");
            accountForm.classList.add("hidden");
        }
    }
    
    if(<?php echo $showGuestError ?>){
        showSettings = !showSettings;
        toggleShowSettings();
    }
</script>