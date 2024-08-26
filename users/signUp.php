<?php
session_start();
require_once('../config/mysql.php');
require_once('../config/dbconnect.php'); // Ensure this sets up $mysqlClient

$postData = $_POST;

if (isset($postData['email']) && isset($postData['password'])) {
    if (!filter_var($postData['email'], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['LOGIN_ERROR_MESSAGE'] = 'Il faut un email valide pour vous inscrire !';
    } else {
        $email = trim(strip_tags($postData['email']));
        $password = trim(strip_tags($postData['password']));
        $name = trim(strip_tags($postData['name']));
        $firstName = trim(strip_tags($postData['firstName']));
        

        // Check if the user already exists
        $stmt = $mysqlClient->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $existingUser = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($existingUser) {
            $_SESSION['LOGIN_ERROR_MESSAGE'] = "L'utilisateur existe déjà";
        } else {
            // Hash the password before storing it
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            // Insert the new user into the database
            $stmt = $mysqlClient->prepare("INSERT INTO users (name, firstName, email, password) VALUES (:name, :firstName, :email, :password)");
            $stmt->execute([
               'email' => $email, 
               'password' => $hashedPassword,
               'firstName'=>$firstName,
               'name'=>$name,
            ]);

            // Get the newly inserted user ID
            $userId = $mysqlClient->lastInsertId();

            // Set session variables for the new user
            $_SESSION['newUser'] = [
                'user_id' => $userId,
                'email' => $email,
            ];
            $_SESSION['SUCCES'] = "successfull registration";
        }
    }

    // Redirect to the index page
    //header('Location: ../index.php');
    //exit();
}
?>



<?php if (!isset($_SESSION['newUser'])) : ?>
  

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

        <?php if (isset($_SESSION['LOGIN_ERROR_MESSAGE'])) : ?>
         <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 mt-4 mb-4 text-center rounded relative" role="alert">
               <strong class="font-bold">Attention!</strong>
               <span class="block sm:inline"><?php echo $_SESSION['LOGIN_ERROR_MESSAGE']; unset($_SESSION['LOGIN_ERROR_MESSAGE']); ?></span>
         </div>
       <?php endif; ?>

        <form class="max-w-sm mx-auto mt-6 p-5 shadow-md rounded-md SignUp mb-5" action="" method="POST">
            <div class="mb-5">
                <div class="flex items-center justify-between p-1 md:p-3 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900">Sign up to our platform</h3>
                    <button type="button" class="closeSignUp end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="authentication-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                    </button>
                </div>
                <div class="mb-5">
                  <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                  <input type="text" name="name" id="name"  placeholder="Your name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
               </div>
                <div class="mb-5">
                  <label for="firstName" class="block mb-2 text-sm font-medium text-gray-900">First name</label>
                  <input type="text" name="firstName" id="firstName" placeholder="Your first name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
               </div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your email</label>
                <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="name@example.com" required />
            </div>
            <div class="mb-5">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Your password</label>
                <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
            </div>
            <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm mb-2 px-5 py-2.5 text-center">Create account</button>
        </form>

        <?php require_once('../includes/footer.php'); ?>

        <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
        <script>
            document.querySelector(".closeSignUp").addEventListener("click", () => {
                window.location.href = "../index.php";
            });
        </script>
    </body>
    </html>

<?php else : ?>
   <?php require_once("signUpOkpage.php"); ?>
<?php endif; ?>
