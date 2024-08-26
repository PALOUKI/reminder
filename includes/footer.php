

    <style>
        .main{
    /* background-color: rgba(240, 240, 240, 0.5); */
    
    display: flex;
    /* flex-wrap: wrap; */
}
.icon{
    background-color: white;
    height: 40px;
    width: 40px;
    border-radius: 25%;
    margin: 10px;
    text-align: center;
    /* padding-top: 10px; */
    font-size: 17.5px;
    line-height: 40px;
    font-family: sans-serif;
    overflow: hidden;
    box-shadow: 5px 10px 10px rgb(71, 71, 71);
    transition:  0.5s; 
}
.icon:hover{
    width: 125px;
    border-radius: 50px;
    cursor: pointer;
    display: flex;
    justify-content: space-evenly;
    align-items: center;
    background-color: white;
    
} 

.icon .fa-facebook-f{
    color: blue;
}
.icon .fa-telegram{
    color: rgb(71, 70, 70);
}
.icon .fa-whatsapp{
    color: rgb(40, 211, 40);
}
.icon .fa-youtube{
    color: red;
} 
    </style>

    <footer class="bg-gray-400 flex flex-wrap justify-around  mt-6  text-sm text-gray-600 py-4 px-2">
    <div class="main">
            <div>
                <div class="icon fb">
                    <!-- Facebook icon -->
                    <i class="fa-brands fa-facebook-f"></i>
                    <span>Facebook</span>
                </div>

                <div class="icon tl">
                    <!-- Telegram icon -->
                    <i class="fa-brands fa-telegram"></i>
                    <span>Telegram</span>
                </div>
            </div>
            <div>
                <div class="icon wh">
                    <!-- Whasapp icon -->
                    <i class="fa-brands fa-whatsapp"></i>
                    <span>Whasapp</span>
                </div>

                <div class="icon yt">
                    <!-- Youtube icon -->
                    <i class="fa-brands fa-youtube"></i>
                    <span>Youtube</span>
                </div>
            </div>
        </div>
        <div class=" ">
            <p class="mt-7 ">
                &copy; 2024 Copyright:
                <a class="text-gray-800 hover:text-black-900 font-medium" href="#">Reminders</a>
            </p>
        </div>
        
    </footer>

