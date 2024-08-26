<?php
 session_start();
 require_once("../config/mysql.php");
 require_once("../config/dbconnect.php");
 require_once("../functions.php");


  $getData=$_GET;
if(!isset($getData['id']) && !is_numeric($getData['id'])){
    echo "Il faut un identifiant de reminder pour le modifier";
}
// Récupérer l'id du reminder passez dans l'url depuis connectContenuAcceuil
$editReminderStatement=$mysqlClient->prepare("SELECT * FROM reminders WHERE reminder_id=:id");
$editReminderStatement->execute([
    'id'=>(int)$getData['id'],
]);
$reminder=$editReminderStatement->fetch(PDO::FETCH_ASSOC);

//Récupérer l'id de l'image passez dans l'url depuis connectContenuAcceuil
    $image_id=htmlspecialchars($getData['image_id']);
$editImageStatement=$mysqlClient->prepare("SELECT * FROM images WHERE image_id=:image_id");
$editImageStatement->bindParam(':image_id', $image_id);
$editImageStatement->execute();
//Récupérer les informations de l'image
$image=$editImageStatement->fetch(PDO::FETCH_ASSOC);

  // Vérifier si l'image a été trouvée
  if ($image) {
    // L'image a été trouvée, je peux maintenant afficher le formulaire avec les détails de l'image
    $current_image = htmlspecialchars($image['image']); // Chemin ou URL de l'image actuelle
} else {
    echo "Image not found.";
    exit;
}
   
?>
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
    

 </div>  
      <!--                                       DRAWER COMPONENT                                        -->
      <!-- drawer component -->
      <div id="drawer-form" class="fixed  top-0 left-0 z-40 h-screen p-4 overflow-y-auto  bg-white w-90 " tabindex="-1" aria-labelledby="drawer-form-label">
            <h5 id="drawer-label" class="inline-flex  items-center mb-6 text-base font-semibold text-gray-500 uppercase "><svg class="w-3.5 h-3.5 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
               <path d="M0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm14-7.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm-5-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm-5-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4Z"/>
               </svg>Edit Reminder
            </h5>
               
         
   
         <!--                                         FORMULAIRE DU REMINDER                                       -->
         <!--formulaire du reminder -->
            <form class="mb-6" method="POST" enctype="multipart/form-data" action="postEditReminder.php">
                <div class="mb-3 hidden">
                    <label for="id" class="block text-sm font-medium text-gray-700">Identifiant du reminder et de l'image</label>
                    <input type="hidden" id="id" name="id" value="<?php echo htmlspecialchars($getData['id']); ?>" class="block w-full mt-1 border border-gray-300 rounded-lg bg-gray-50 text-gray-900">
                    <input type="hidden" id="image_id" name="image_id" value="<?php echo htmlspecialchars($getData['image_id']); ?>" class="block w-full mt-1 border border-gray-300 rounded-lg bg-gray-50 text-gray-900">
                </div>

               <!--title or event name-->
                  <div class="mb-6">
                     <label for="title" class="block mb-2 text-sm font-medium text-gray-900 ">Title</label>
                     <input type="text" name="title" id="title"  value="<?php echo htmlspecialchars($reminder["title"]); ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "  required/>
                  </div>
               <!--event description-->
                  <div class="mb-6">
                     <label for="description" class="block mb-2 text-sm font-medium text-gray-900 ">Description</label>
                     <textarea name="event"  id="event" rows="4"  class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "  required>
                        <?php echo htmlspecialchars($reminder["event"]); ?>
                     </textarea>
                  </div>
               <!--date-->
                  <div class="relative mb-6">
                     <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                           <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                        </svg>
                     </div>
                     <input name="date" id="date"  type="date" value="<?php echo htmlspecialchars($reminder["date"]); ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 "  required>
                  </div>
               <!--Importance de l'évènement-->
                <div class="mb-6">
                        <label for="importance" class="block mb-2 text-sm font-medium text-gray-900">Importance</label>
                    <select name="importance" id="importance" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                        <option value="low" <?php if ($reminder["importance"] === "low") echo 'selected'; ?>>Low</option>
                        <option value="Medium" <?php if ($reminder["importance"] === "Medium") echo 'selected'; ?>>Medium</option>
                        <option value="high" <?php if ($reminder["importance"] === "high") echo 'selected'; ?>>High</option>
                    </select>
                </div>

               <!--statut de l'évènement-->
                  <div class="mb-6">
                     <label for="statut" class="block mb-2 text-sm font-medium text-gray-900">Statut</label>
                     <select name="statut" id="statut" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                        <option value="ended" <?php if($reminder["statut"]==="ended") echo 'selected'; ?> >Ended</option>
                        <option value="current" <?php if($reminder["statut"]==="current") echo 'selected'; ?> >Current</option>
                        <option value="coming" <?php if($reminder["statut"]==="coming") echo 'selected'; ?>  >Coming</option>
                     </select>
                  </div>

               <!--add an image-->
                  <div class="mb-4">
                     <label for="image" class="mb-2 text-sm font-medium text-gray-900 sr-only ">Invite guests</label>
                     <div class="relative">
                        <input type="file" name="newImage" id="newImage" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="Add an image" required />
                     </div>
                  </div>
               <!--submit button -->
                  <button type="submit" name="submit" class="text-white justify-center flex items-center bg-blue-700 hover:bg-blue-800 w-full focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2  focus:outline-none "><svg class="w-3.5 h-3.5 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M18 2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2ZM2 18V7h6.7l.4-.409A4.309 4.309 0 0 1 15.753 7H18v11H2Z"/>
                  <path d="M8.139 10.411 5.289 13.3A1 1 0 0 0 5 14v2a1 1 0 0 0 1 1h2a1 1 0 0 0 .7-.288l2.886-2.851-3.447-3.45ZM14 8a2.463 2.463 0 0 0-3.484 0l-.971.983 3.468 3.468.987-.971A2.463 2.463 0 0 0 14 8Z"/>
                  </svg> Edit event</button>
            </form>
         <!--fin formulaire -->
            <!-- button to cancel the edition of the reminder -->
             <button type="button" id="cancelBtn" class="text-white justify-center flex items-center bg-teal-500 hover:bg-blue-800 w-full focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2  focus:outline-none ">
               cancel
            </button>
         
      </div>





    <?php //require_once('footer.php'); ?>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
<script>
    let cancelBtn=document.getElementById("cancelBtn");
        cancelBtn.addEventListener("click",()=>{
            window.location.href="../index.php";
        })
</script>
</body>
</html>