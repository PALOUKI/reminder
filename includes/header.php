
<script src="https://cdn.tailwindcss.com"></script>
<!-- <div class="container mx-auto w-full max-w-screen-lg"> -->
   <style>
      .header{
         border-top: 10px solid orange;
      }
      .icon{
         height: 40%;
      }
      .welcome{
        font-family: "Rowdies";
        font-size: xx-large;
        font-weight: 400;
        text-align: center;
        color: black;
    }
    .reminderDefinition{
        text-align: center;
        /* margin: 0 5px 0 5px; */
        background-color: gray;
    }
   </style>
<nav class=" header bg-teal-500 border-gray-200   ">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
               <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
                  <svg class="h-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M224 0c-17.7 0-32 14.3-32 32l0 19.2C119 66 64 130.6 64 208l0 18.8c0 47-17.3 92.4-48.5 127.6l-7.4 8.3c-8.4 9.4-10.4 22.9-5.3 34.4S19.4 416 32 416l384 0c12.6 0 24-7.4 29.2-18.9s3.1-25-5.3-34.4l-7.4-8.3C401.3 319.2 384 273.9 384 226.8l0-18.8c0-77.4-55-142-128-156.8L256 32c0-17.7-14.3-32-32-32zm45.3 493.3c12-12 18.7-28.3 18.7-45.3l-64 0-64 0c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7z"/></svg>
                  <span class="self-center text-5xl font-bold whitespace-nowrap text-white boldReminder ">Reminder</span>
               </a>
               <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
               
                  <?php if(isset($_SESSION['loggedUser'])) :?>
                     <?php //if (basename($_SERVER['PHP_SELF']) === 'connectContenuAcceuil.php')://pour éviter d'avoir le boutton addReminder sur les autres pages ?>
                        <button  style="margin-left: 45%;"  data-drawer-target="drawer-form" data-drawer-show="drawer-form" aria-controls="drawer-form" type="button" class="mr-6 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center ">Add a Reminder</button>
                     <?php //endif; ?>
                     <button  style="margin-left: 0%;" type="button" class=" text-white bg-orange-700 hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center "><a href="users/logout.php">Logout</a></button>
                     <!-- <a href=""><span class="icon">👤</span></a> -->
                     
                     <svg style="display: block; margin-left: 4%;" width="5%" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#71716f" d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z"/></svg>

                     
                  <?php else : ?> 
                     <button type="button" class=" mr-3 text-white bg-cyan-700 hover:bg-blue-800 focus:ring-4 focus:outline-none  font-medium rounded-lg text-sm px-4 py-2 text-center signUpBtn"><a href="users/signUp.php">sign up</a></button>
                     <button type="button" class="text-white bg-orange-700 hover:bg-orange-800 focus:ring-4 focus:outline-none  font-medium rounded-lg text-sm px-4 py-2 text-center loginBtn"><a href="#">Login</a></button>
                  <?php endif ; ?> 
               </div>  
            </div>
         </nav>
         <p class="reminderDefinition shadow-xl">
            A reminder is a tool used to notify or prompt a person about a specific task, event, deadline, or important
            information at a designated time or in the future.
      </p>
      <p class="welcome uppercase">
          Reminder Maker
      </p>