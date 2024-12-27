<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pages</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer>
        function switchTab(tabId) {
            const tabs = document.querySelectorAll("[data-tab-content]");
            tabs.forEach(tab => {
                tab.classList.add("hidden");
            });

            document.getElementById(tabId).classList.remove("hidden");

            const tabButtons = document.querySelectorAll("[data-tab-button]");
            tabButtons.forEach(button => {
                button.classList.remove("bg-pink-900", "text-white");
                button.classList.add("bg-pink-700", "text-white");
            });

            document.querySelector(`[data-tab-button="${tabId}"]`).classList.add("bg-pink-700", "text-white");
        }

        document.addEventListener("DOMContentLoaded", () => {
            switchTab("tab1");
        });
    </script>
</head>
<body class="bg-gray-100">
    <?php include '../includes/header.php' ?>
    <!-- ----------------------------------------------------------------------------------------------------------------- -->
    <section id="home" class="bg-cover bg-center h-screen flex items-center justify-center"
        style="background-image: url('https://img.freepik.com/photos-premium/salle-gym-lumiere-mur-tapis-roulant_808092-1997.jpg?w=1060');">
        <div class="w-full text-center items-center">
            <div class="w-full h-full bg-black opacity-75 p-10">
                <h1 class="text-4xl md:text-6xl mb-6 text-purple-200" id="bienvenue">Bienvenue à Notre Salle de Sport</h1>
                <p class="text-2xl font-bold text-white md:text-2xl mb-8">Votre partenaire fitness pour atteindre vos objectifs 💪💪.</p>
                <a href="#services" class="bg-rose-900 hover:bg-rose-700 text-white font-bold py-3 px-6 rounded">Découvrir
                nos activités</a>
            </div>
        </div>
    </section>
    <!-- ----------------------------------------------------------------------------------------------------------------- -->
    <section id="all-activities" class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-8 text-rose-900">Nos Activités :</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php foreach ($result as $res): ?>
                <div class="relative group p-6 shadow-lg rounded-lg hover:shadow-xl transition-shadow duration-300 bg-purple-300">
                    <img src="" alt="<?= htmlspecialchars($res['nom_activite']) ?>" class="w-full rounded-lg">
                    <h3 class="text-xl font-semibold mb-4 mt-4 text-purple-700"><?= htmlspecialchars($res['nom_activite']) ?></h3>
                    <p class="text-gray-600"><?= htmlspecialchars($res['description']) ?></p>
                    <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center rounded-lg">
                        <a href="#<?= htmlspecialchars($res['id_activity']) ?>" class="bg-white text-purple-700 font-semibold px-4 py-2 rounded-lg shadow-lg hover:bg-purple-700 hover:text-white transition-colors">
                            Voir détails
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

     <!-- ---------------------------------------------------------------------------------------------------------------------------- -->
     <section id="reservation" class="py-16 bg-rose-200">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-3xl font-bold mb-8 text-rose-900 text-center">Veuillez vous connecter ou vous inscrire</h2>
        <?php if (isset($_GET['success'])): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                Inscription réussie !
            </div>
        <?php endif; ?>
        <?php if (isset($_GET['error'])): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                Une erreur est survenue lors de l'inscription.
            </div>
        <?php endif; ?>
        <div class="flex flex-col md:flex-row justify-center items-center md:items-start space-y-8 md:space-y-0 md:space-x-8">
             <!-- --------------------------------Formulaire de connexion début------------------------------------------------------------------ -->
            <div class="w-full max-w-xl">
                <h3 class="text-2xl font-bold mb-6 text-rose-900 text-center">Connexion</h3>
                <form action="#" method="post" class="space-y-4">
                    <div class="mb-4">
                        <label for="login-email"></label>
                        <input type="email" name="login-email" id="login-email" placeholder="Email" class="w-full border-rose-300 focus:border-rose-900 focus:ring focus:ring-rose-900 rounded p-3" required>
                    </div>
                    <div class="mb-4">
                        <label for="login-password"></label>
                        <input type="password" name="login-password" id="login-password" placeholder="Mot de passe" class="w-full border-rose-300 focus:border-rose-900 focus:ring focus:ring-rose-900 rounded p-3" required>
                    </div>
                    <button type="submit" class="w-full bg-rose-600 hover:bg-rose-700 text-white font-bold py-3 px-6 rounded">Se connecter</button>
                </form>
            </div>
             <!-- --------------------------------Formulaire de connexion fin------------------------------------------------------------------ -->
            <div class="hidden md:block w-px bg-rose-300 h-96"></div>
            <div class="w-full md:hidden h-px bg-rose-300"></div>
            <div class="w-full max-w-xl">
                <h3 class="text-2xl font-bold mb-6 text-rose-900 text-center">Inscription</h3>
                <form class="space-y-4" action="#" method="post">
                    <div class="mb-4">
                        <label for="nom"></label>
                        <input type="text" name="nom" placeholder="Nom" class="w-full border-rose-300 focus:border-rose-900 focus:ring focus:ring-rose-900 rounded p-3" required>
                    </div>
                    <div class="mb-4">
                        <label for="prenom"></label>
                        <input type="text" name="prenom" placeholder="Prénom" class="w-full border-rose-300 focus:border-rose-900 focus:ring focus:ring-rose-900 rounded p-3" required>
                    </div>
                    <div class="mb-4">
                        <label for="email"></label>
                        <input type="email" name="email" placeholder="Email" class="w-full border-rose-300 focus:border-rose-900 focus:ring focus:ring-rose-900 rounded p-3" required>
                    </div>
                    <div class="mb-4">
                        <label for="telephone"></label>
                        <input type="tel" name="telephone" placeholder="N° de téléphone" pattern="[0-9]*" class="w-full border-rose-300 focus:border-rose-900 focus:ring focus:ring-rose-900 rounded p-3" required>
                    </div>
                    <div class="mb-4">
                        <label for="password"></label>
                        <input type="password" name="password" placeholder="Mot de passe" class="w-full border-rose-300 focus:border-rose-900 focus:ring focus:ring-rose-900 rounded p-3" required>
                    </div>
                    <button type="submit" class="w-full bg-rose-600 hover:bg-rose-700 text-white font-bold py-3 px-6 rounded">S'inscrire</button>
                </form>
            </div>
        </div>
    </div>
</section>    
    <?php include '../includes/footer.php' ?>
</body>
</html>








































