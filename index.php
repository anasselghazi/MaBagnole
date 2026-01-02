










<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>DriveNow | Car Rental</title>

<!-- Tailwind CDN -->
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

<!-- NAVBAR -->
<nav class="fixed top-0 w-full z-50 backdrop-blur bg-white/10 border-b border-white/10">
  <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
    <h1 class="text-2xl font-black">🚗 Drive<span class="text-blue-400">Now</span></h1>

    <div class="hidden md:flex gap-8">
      <a href="#" class="hover:text-blue-400">Home</a>
      <a href="#" class="hover:text-blue-400">Cars</a>
      <a href="#" class="hover:text-blue-400">Contact</a>
    </div>

    <button onclick="openAuth()" class="bg-blue-500 px-5 py-2 rounded-full hover:bg-blue-600">
      Sign In
    </button>
  </div>
</nav>

<!-- HERO -->
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
        <button class="bg-blue-500 px-8 py-4 rounded-full hover:bg-blue-600">
          Explore Cars
        </button>
        <button class="border border-white/30 px-8 py-4 rounded-full hover:bg-white/10">
          How it works
        </button>
      </div>
    </div>

    <!-- Booking Card -->
    <div class="backdrop-blur-xl bg-white/10 border border-white/20 rounded-3xl p-8 shadow-2xl">
      <h3 class="text-xl font-bold mb-6">Quick Booking</h3>
      <input class="w-full mb-4 bg-white/10 p-4 rounded-xl" placeholder="City">
      <input type="date" class="w-full mb-4 bg-white/10 p-4 rounded-xl">
      <button class="w-full bg-blue-500 py-4 rounded-xl hover:bg-blue-600">
        Search Car
      </button>
    </div>

  </div>
</section>

<!-- CARS -->
<section class="py-32">
  <div class="max-w-7xl mx-auto px-6">
    <h3 class="text-center text-4xl font-black mb-16">
      Our <span class="text-blue-400">Fleet</span>
    </h3>

    <div class="grid md:grid-cols-3 gap-12">

      <div class="bg-white/5 backdrop-blur border border-white/10 rounded-3xl overflow-hidden hover:scale-105 transition">
        <img src="https://images.unsplash.com/photo-1619767886558-efdc7b9b4d9c" class="h-52 w-full object-cover">
        <div class="p-6">
          <h4 class="text-2xl font-bold">BMW M4</h4>
          <p class="text-gray-400">Automatic • Petrol</p>
          <div class="flex justify-between mt-6">
            <span class="text-blue-400 font-bold">120€ / day</span>
            <button class="bg-blue-500 px-4 py-2 rounded-full">Rent</button>
          </div>
        </div>
      </div>

      <div class="bg-white/5 backdrop-blur border border-white/10 rounded-3xl overflow-hidden hover:scale-105 transition">
        <img src="https://images.unsplash.com/photo-1503376780353-7e6692767b70" class="h-52 w-full object-cover">
        <div class="p-6">
          <h4 class="text-2xl font-bold">Mercedes C-Class</h4>
          <p class="text-gray-400">Automatic • Diesel</p>
          <div class="flex justify-between mt-6">
            <span class="text-blue-400 font-bold">95€ / day</span>
            <button class="bg-blue-500 px-4 py-2 rounded-full">Rent</button>
          </div>
        </div>
      </div>

      <div class="bg-white/5 backdrop-blur border border-white/10 rounded-3xl overflow-hidden hover:scale-105 transition">
        <img src="https://images.unsplash.com/photo-1605559424843-9e4c228bf1c2" class="h-52 w-full object-cover">
        <div class="p-6">
          <h4 class="text-2xl font-bold">Tesla Model 3</h4>
          <p class="text-gray-400">Electric</p>
          <div class="flex justify-between mt-6">
            <span class="text-blue-400 font-bold">110€ / day</span>
            <button class="bg-blue-500 px-4 py-2 rounded-full">Rent</button>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- AUTH MODAL -->
<div id="authModal" class="fixed inset-0 hidden items-center justify-center bg-black/60 z-[999]">
  <div class="relative w-[90%] max-w-md backdrop-blur-xl bg-white/10 border border-white/20 rounded-3xl p-8 animate-scale">

    <button onclick="closeAuth()" class="absolute top-4 right-4 text-xl">✕</button>

    <div class="flex mb-8 bg-white/10 rounded-full overflow-hidden">
      <button id="loginTab" onclick="showLogin()" class="w-1/2 py-3 bg-blue-500 rounded-full">Login</button>
      <button id="signupTab" onclick="showSignup()" class="w-1/2 py-3">Sign Up</button>
    </div>

    <div id="loginForm">
      <input class="w-full mb-4 bg-white/10 p-4 rounded-xl" placeholder="Email">
      <input type="password" class="w-full mb-6 bg-white/10 p-4 rounded-xl" placeholder="Password">
      <button class="w-full bg-blue-500 py-4 rounded-xl">Login</button>
    </div>

    <div id="loginForm">
    <form action="connexion.php" method="POST">
        <input type="email" name="email" required
               class="w-full mb-4 bg-white/10 p-4 rounded-xl border border-white/10 focus:border-blue-500 outline-none" 
               placeholder="Email">
        
        <input type="password" name="password" required
               class="w-full mb-6 bg-white/10 p-4 rounded-xl border border-white/10 focus:border-blue-500 outline-none" 
               placeholder="Password">
        
        <button type="submit" name="submit_login" 
                class="w-full bg-blue-500 py-4 rounded-xl hover:bg-blue-600 transition font-bold">
            Login
        </button>
    </form>
</div>

  </div>
</div>

<!-- JS -->
<script>
const modal = document.getElementById("authModal");
const loginForm = document.getElementById("loginForm");
const signupForm = document.getElementById("signupForm");
const loginTab = document.getElementById("loginTab");
const signupTab = document.getElementById("signupTab");

function openAuth() {
  modal.classList.remove("hidden");
  modal.classList.add("flex");
}
function closeAuth() {
  modal.classList.add("hidden");
  modal.classList.remove("flex");
}
function showLogin() {
  loginForm.classList.remove("hidden");
  signupForm.classList.add("hidden");
  loginTab.classList.add("bg-blue-500");
  signupTab.classList.remove("bg-blue-500");
}
function showSignup() {
  signupForm.classList.remove("hidden");
  loginForm.classList.add("hidden");
  signupTab.classList.add("bg-blue-500");
  loginTab.classList.remove("bg-blue-500");
}
modal.addEventListener("click", e => {
  if (e.target === modal) closeAuth();
});
</script>

</body>
</html>
