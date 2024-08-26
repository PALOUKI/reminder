<?php if (!isset($_SESSION['loggedUser'])) : ?>
    <?php if (isset($_SESSION['LOGIN_ERROR_MESSAGE'])) : ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 mt-4 mb-4 text-center rounded relative" role="alert">
            <strong class="font-bold">Attention!</strong>
            <span class="block sm:inline"><?php echo $_SESSION['LOGIN_ERROR_MESSAGE']; unset($_SESSION['LOGIN_ERROR_MESSAGE']); ?></span>
        </div>
    <?php endif; ?>

    <style>
        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }

        .borderTop {
            border-top: 5px solid orange;
            display: none;
            animation: fadeIn 3.5s ease-in-out forwards;
        }
    </style>

    <form class="max-w-sm mx-auto mt-6 p-5 shadow-md rounded-md borderTop mb-5" action="../Rappel/submit/submitLogin.php" method="POST">
        <div class="mb-5">
            <div class="flex items-center justify-between p-1 md:p-3 border-b rounded-t">
                <h3 class="text-xl font-semibold text-gray-900">Sign in to our platform</h3>
                <button type="button" class="closeSvg end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="authentication-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your email</label>
            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="name@example.com" required />
        </div>
        <div class="mb-5">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Your password</label>
            <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
        </div>
        <div class="flex justify-between">
            <div class="flex items-start">
                <div class="flex items-center h-5">
                    <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300" required />
                </div>
                <label for="remember" class="ms-2 text-sm font-medium pb-2 text-gray-900">Remember me</label>
            </div>
            <a href="#" class="text-sm text-blue-700 hover:underline">Lost Password?</a>
        </div>
        <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm mb-2 px-5 py-2.5 text-center">Login to your account</button>
        <div class="text-sm font-medium text-gray-500">
            Not registered? <a href="users/signUp.php" class="text-blue-700 hover:underline">Create account</a>
        </div>
    </form>

    <?php require_once('../Rappel/home/contenuAcceuil.php'); ?>

<?php else : ?>
    <div class="bg-green-100 border mt-2 border-green-400 text-green-700 px-4 py-3 text-center rounded relative" role="alert">
        <strong class="font-bold">Bienvenue sur Reminder!</strong>
        <span class="block sm:inline"> monsieur <?php echo $_SESSION['loggedUser']['email']; ?><?php echo $_SESSION['loggedUser']['user_id']; ?></span>
    </div>
<?php endif; ?>


