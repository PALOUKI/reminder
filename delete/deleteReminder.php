<?php 
    session_start();

        $getData=$_GET;
    if(!isset($getData['id']) && !is_numeric($getData['id'])){
        echo "il faut un identifiant de Reminder pour pouvoir le modifier";
    }
    if(!isset($getData['image_id']) && !is_numeric($getData['image_id'])){
        echo "il faut un identifiant de l'image pour pouvoir le modifier";
    }
        $id=(int)$getData['id'];
    require_once("../config/mysql.php");
    require_once("../config/dbconnect.php");
    $sqlQuery="SELECT * FROM reminders WHERE reminder_id=:id";
    $stmt=$mysqlClient->prepare($sqlQuery);
    $stmt->bindParam(':id',$id);
    $ok=$stmt->execute();
    $stmt->fetch(PDO::FETCH_ASSOC);
    if(!$ok){
        echo "On a une erreur PDO lors de la récupération de Reminder";
    }

    $sqlQuery="SELECT * FROM images WHERE image_id=:id";
    $stmt=$mysqlClient->prepare($sqlQuery);
    $stmt->execute([
        "id"=>(int)$getData['image_id'],
    ]);
    $oksecond=$stmt->execute();
    $stmt->fetch(PDO::FETCH_ASSOC);
    if(!$oksecond){
        echo "On a une erreur PDO lors de la recupération de l'image";
    }
?>

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
    
    <?php require_once('../includes/header.php'); ?>
    
    <h1 class="text-2xl text-center font-bold mt-20 mb-4">Etes vous sûr de vouloir supprimer le reminder ?</h1>
    <form action="postDeleteReminder.php" method="POST">
        <div class="hidden">
        <!-- Je ne veux pas supprimer le reminder avec la méthode GET pour éviter les failles. 
        D'ou ce formulaire qui envoie les id qui seront récupérer par la méthode POST -->
            <label for="id" class="sr-only">Identifiant du reminder</label>
            <input type="hidden" id="id" name="id" value="<?php echo $getData['id']; ?>">
            <label for="image_id" class="sr-only">Identifiant de l'image</label>
            <input type="hidden" id="image_id" name="image_id" value="<?php echo $getData['image_id']; ?>">
        </div>

        <div class="text-center">
            <button type="submit" class=" bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
                La suppression est définitive
            </button>
        </div>
        <div class="text-center mt-5">
            <button type="button" id="cancelBtn" class=" bg-teal-500 text-white px-4 py-2 rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
                Cancel
            </button>
        </div>
     
    </form>
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <?php require_once('../includes/footer.php'); ?>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
<script>
    let cancelBtn=document.getElementById("cancelBtn");
        cancelBtn.addEventListener("click",()=>{
            window.location.href="../index.php";
        })
</script>
</body>
</html>