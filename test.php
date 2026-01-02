<?php
// test_login.php
require_once "classes/database.php";
require_once "classes/client.php";

// جرّب البحث عن مستخدم
$email = "anass@gmail.com"; // غيّر هذا إلى email موجود في قاعدتك
$password = "123456";        // غيّر هذا إلى كلمة المرور الصحيحة

echo "<h2>🔍 Test Login</h2>";

$client = Client::trouverParEmail($email);

if ($client) {
    echo "✅ Client trouvé:<br>";
    echo "- Nom: " . $client->getNom() . "<br>";
    echo "- Email: " . $client->getEmail() . "<br>";
    echo "- Role: " . $client->getRole() . "<br>";
    echo "- Hash (first 30 chars): " . substr($client->getMotDePasseHash(), 0, 30) . "...<br>";
    echo "- Hash length: " . strlen($client->getMotDePasseHash()) . "<br><br>";
    
    if ($client->verifierMotDePasse($password)) {
        echo "✅✅✅ <strong style='color:green;'>MOT DE PASSE CORRECT!</strong><br>";
        echo "Le login devrait fonctionner!";
    } else {
        echo "❌ <strong style='color:red;'>MOT DE PASSE INCORRECT!</strong><br>";
        echo "Vérifiez que le mot de passe est correct.";
    }
} else {
    echo "❌ <strong style='color:red;'>CLIENT NON TROUVÉ!</strong><br>";
    echo "L'email '$email' n'existe pas dans la base de données.";
}
?>