 
<?php
session_start(); 
require_once "classes/database.php";
require_once "classes/client.php";

$logerrors = [];

 
            
 
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');


    if (empty($email) || empty($password)) {
        $logerrors[] = "Veuillez remplir tous les champs.";
    } 
    else {
         $client = Client::trouverParEmail($email);

         if ($client && $client->verifierMotDePasse($password)) {
            
             $_SESSION['id_client'] = $client->getId();
            $_SESSION['nom'] = $client->getNom();
            $_SESSION['role'] = $client->getRole();

             if ($client->getRole() === 'admin') {
                header("Location: dashboard/dashboard_admin.php");
            } else {
                header("Location: dashboard/dashboard_client.php");
            }
            exit();
        } else {
            $logerrors[] = "Email ou mot de passe incorrect.";
        }
    }
}
?>








 <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>DriveNow | Car Rental</title>

<script src="https://cdn.tailwindcss.com"></script>

<style>
body {
  background: radial-gradient(circle at top, #0f172a, #020617);
}
@keyframes scale {
  from { transform: scale(.8); opacity: 0; }
  to { transform: scale(1); opacity: 1; }
}
.animate-scale {
  animation: scale .3s ease-out;
}
</style>
</head>

<body class="text-white">

<nav class="fixed top-0 w-full z-50 backdrop-blur bg-white/10 border-b border-white/10">
  <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
    <h1 class="text-2xl font-black">🚗 Drive<span class="text-blue-400">Now</span></h1>

    <div class="hidden md:flex gap-8">
      <a href="#" class="hover:text-blue-400">Home</a>
      <a href="#" class="hover:text-blue-400">Cars</a>
      <a href="#" class="hover:text-blue-400">Contact</a>
    </div>

    <button onclick="openAuth()" class="bg-blue-500 px-5 py-2 rounded-full hover:bg-blue-600 transition">
      Sign In
    </button>
  </div>
</nav>

<section class="min-h-screen flex items-center pt-32">
  <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-16 items-center">

    <div>
      <h2 class="text-5xl md:text-6xl font-black leading-tight">
        Rent the <span class="text-blue-400">Future</span><br>Drive with Style
      </h2>
      <p class="mt-6 text-gray-300">
        Premium car rental service with modern & luxury vehicles.
      </p>

      <div class="mt-10 flex gap-4">
        <button class="bg-blue-500 px-8 py-4 rounded-full hover:bg-blue-600 transition">
          Explore Cars
        </button>
        <button class="border border-white/30 px-8 py-4 rounded-full hover:bg-white/10 transition">
          How it works
        </button>
      </div>
    </div>

    <div class="backdrop-blur-xl bg-white/10 border border-white/20 rounded-3xl p-8 shadow-2xl">
      <h3 class="text-xl font-bold mb-6">Quick Booking</h3>
      <input class="w-full mb-4 bg-white/10 p-4 rounded-xl outline-none focus:ring-2 ring-blue-500" placeholder="City">
      <input type="date" class="w-full mb-4 bg-white/10 p-4 rounded-xl outline-none focus:ring-2 ring-blue-500">
      <button class="w-full bg-blue-500 py-4 rounded-xl hover:bg-blue-600 transition font-bold">
        Search Car
      </button>
    </div>

  </div>
</section>

<section class="py-32">
  <div class="max-w-7xl mx-auto px-6">
    <h3 class="text-center text-4xl font-black mb-16">
      Our <span class="text-blue-400">Fleet</span>
    </h3>

    <div class="grid md:grid-cols-3 gap-12">
      <div class="bg-white/5 backdrop-blur border border-white/10 rounded-3xl overflow-hidden hover:scale-105 transition duration-300">
        <img src="https://images.unsplash.com/photo-1619767886558-efdc7b9b4d9c" class="h-52 w-full object-cover">
        <div class="p-6">
          <h4 class="text-2xl font-bold">BMW M4</h4>
          <p class="text-gray-400">Automatic • Petrol</p>
          <div class="flex justify-between mt-6">
            <span class="text-blue-400 font-bold text-xl">120€ / day</span>
            <button class="bg-blue-500 px-4 py-2 rounded-full hover:bg-blue-600">Rent</button>
          </div>
        </div>
      </div>

      <div class="bg-white/5 backdrop-blur border border-white/10 rounded-3xl overflow-hidden hover:scale-105 transition duration-300">
        <img src="https://images.unsplash.com/photo-1503376780353-7e6692767b70" class="h-52 w-full object-cover">
        <div class="p-6">
          <h4 class="text-2xl font-bold">Mercedes C-Class</h4>
          <p class="text-gray-400">Automatic • Diesel</p>
          <div class="flex justify-between mt-6">
            <span class="text-blue-400 font-bold text-xl">95€ / day</span>
            <button class="bg-blue-500 px-4 py-2 rounded-full hover:bg-blue-600">Rent</button>
          </div>
        </div>
      </div>

      <div class="bg-white/5 backdrop-blur border border-white/10 rounded-3xl overflow-hidden hover:scale-105 transition duration-300">
        <img src="https://images.unsplash.com/photo-1605559424843-9e4c228bf1c2" class="h-52 w-full object-cover">
        <div class="p-6">
          <h4 class="text-2xl font-bold">Tesla Model 3</h4>
          <p class="text-gray-400">Electric</p>
          <div class="flex justify-between mt-6">
            <span class="text-blue-400 font-bold text-xl">110€ / day</span>
            <button class="bg-blue-500 px-4 py-2 rounded-full hover:bg-blue-600">Rent</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<div id="authModal" class="fixed inset-0 <?php echo !empty($logerrors) ? 'flex' : 'hidden'; ?> items-center justify-center bg-black/70 z-[999] backdrop-blur-sm">
   <div class="relative w-[90%] max-w-md backdrop-blur-2xl bg-white/10 border border-white/20 rounded-3xl p-10 animate-scale shadow-2xl">

    <button onclick="closeAuth()" class="absolute top-5 right-5 text-gray-400 hover:text-white transition text-2xl">✕</button>

    <div class="text-center mb-8">
      <h2 class="text-3xl font-black mb-2">Welcome Back</h2>
      <p class="text-gray-400">Login to your account to continue</p>
    </div>

    <?php if (!empty($logerrors)): ?>
    <div class="mb-4 p-3 bg-red-500/20 border border-red-500 text-red-200 text-sm rounded-xl text-center">
        <?php foreach ($logerrors as $error) echo $error; ?>
    </div>
<?php endif; ?>

   <form id="loginForm" method="POST" action="index.php">
  <div class="space-y-4">
    <div>
      <label class="block text-sm font-medium text-gray-400 mb-1">Email Address</label>
      <input type="email" name="email" required class="w-full bg-white/5 border border-white/10 p-4 rounded-xl outline-none focus:ring-2 ring-blue-500">
    </div>
    
    <div>
      <label class="block text-sm font-medium text-gray-400 mb-1">Password</label>
      <input type="password" name="password" required class="w-full bg-white/5 border border-white/10 p-4 rounded-xl outline-none focus:ring-2 ring-blue-500">
    </div>

    <button type="submit" name="login" class="w-full bg-blue-500 py-4 rounded-xl font-bold hover:bg-blue-600 shadow-lg shadow-blue-500/20">
      Sign In
    </button>
  </div>
</form>
    <p class="mt-8 text-center text-gray-400 text-sm">
      Don't have an account? <a href="#" class="text-blue-400 font-bold hover:underline">Contact us</a>
    </p>

  </div>
</div>

<script>
 const modal = document.getElementById("authModal");

function openAuth() {
    modal.classList.remove("hidden");
    modal.classList.add("flex");
}

function closeAuth() {
    modal.classList.add("hidden");
    modal.classList.remove("flex");
}

 modal.addEventListener("click", e => {
    if (e.target === modal) closeAuth();
});
</script>

</body>
</html>