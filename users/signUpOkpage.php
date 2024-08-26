
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



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/99d6117b83.js" crossorigin="anonymous"></script>
    <title>Reminder</title>
</head>
<body>


<nav class=" header bg-teal-500 border-gray-200   ">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
               <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
                  <svg class="h-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M224 0c-17.7 0-32 14.3-32 32l0 19.2C119 66 64 130.6 64 208l0 18.8c0 47-17.3 92.4-48.5 127.6l-7.4 8.3c-8.4 9.4-10.4 22.9-5.3 34.4S19.4 416 32 416l384 0c12.6 0 24-7.4 29.2-18.9s3.1-25-5.3-34.4l-7.4-8.3C401.3 319.2 384 273.9 384 226.8l0-18.8c0-77.4-55-142-128-156.8L256 32c0-17.7-14.3-32-32-32zm45.3 493.3c12-12 18.7-28.3 18.7-45.3l-64 0-64 0c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7z"/></svg>
                  <span class="self-center text-5xl font-bold whitespace-nowrap text-white boldReminder ">Reminder</span>
               </a>
               <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
               

                     
                  
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

        <?php if (isset($_SESSION['SUCCES'])) : ?>
            <div class="bg-green-100 border mt-2 border-green-400 text-green-700 px-4 py-3 text-center rounded relative" role="alert">
                <span class="block sm:inline"><?php echo $_SESSION['SUCCES']; ?></span>
            </div>
        <?php endif; ?>

      <p class="text-center pt-10">
        You are now registered on Reminder!
      </p>
       
       <div class="text-center pt-5 " >
        <button type="button" class="text-white bg-orange-700 hover:bg-orange-800 focus:ring-4 focus:outline-none  font-medium rounded-lg text-sm px-4 py-2 text-center loginBtn"><a href="../index.php">Login</a></button>
       </div>




       <?php //require_once('../includes/footer.php'); ?>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
<script src="script.js"></script>
</body>
</html>