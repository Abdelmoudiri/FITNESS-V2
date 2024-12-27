<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pages</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer>
        // Logique JS pour gérer les onglets
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
            // Activer le premier onglet par défaut
            switchTab("tab1");
        });
    </script>
</head>
<body class="bg-gray-100">
    <?php include '../../includes/header.php' ?>
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-96 bg-rose-900 text-white p-4 pt-8">
            <div class="border border-b p-4 mb-4">
            <h2 class="text-2xl font-bold text-center">ESPACE ADMIN</h2>
            </div>
            <div class="mb-4 pt-4">
                <h2 class="text-lg font-bold mb-4">Informations Personnelles</h2>
                <p><span class="font-bold">- Nom    :</span> John</p>
                <p><span class="font-bold">- Prénom :</span> Doe</p>
                <p><span class="font-bold">- Email  :</span> john@gmail.com</p>
                <p><span class="font-bold">- Rôle   :</span> Membre</p>
            </div>
            <button class="bg-gradient-to-r from-pink-500 to-rose-500 px-4 py-2 rounded hover:bg-gradient-to-l from-pink-500 to-rose-500 mx-auto" onclick="alert('Modifier les informations personnelles')">Modifier mes informations</button>
        </aside>
        <!-- Main Content -->
        <main class="flex-1 p-6">
            <div class="mb-4">
                <!-- Onglets -->
                <div class="flex space-x-4 border-b">
                    <button data-tab-button="tab1" onclick="switchTab('tab1')" class="w-1/3 px-4 py-2 text-center text-white bg-pink-700 hover:bg-pink-900">Liste des Membres</button>
                    <button data-tab-button="tab2" onclick="switchTab('tab2')" class="w-1/3 px-4 py-2 text-center text-white bg-pink-700 hover:bg-pink-900">Liste des Activités</button>
                    <button data-tab-button="tab3" onclick="switchTab('tab3')" class="w-1/3 px-4 py-2 text-center text-white bg-pink-700 hover:bg-pink-900">Statistiques</button>
                </div>
            </div>

            <!-- Contenu des onglets -->
            <div id="tab1" data-tab-content class="hidden">
                <h2 class="text-xl font-bold mb-4">Liste des Membres</h2>
                <table class="w-full bg-white rounded shadow">
                    <thead class="bg-rose-900 text-white">
                        <tr>
                            <th class="border px-4 py-2">Nom</th>
                            <th class="border px-4 py-2">Prénom</th>
                            <th class="border px-4 py-2">Email</th>
                            <th class="border px-4 py-2">Téléphone</th>
                            <th class="border px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border px-4 py-2">Doe</td>
                            <td class="border px-4 py-2">John</td>
                            <td class="border px-4 py-2">john.doe@example.com</td>
                            <td class="border px-4 py-2">123456789</td>
                            <td class="border px-4 py-2">
                                <button class="bg-red-500 text-white px-2 py-1 rounded" onclick="confirm('Êtes-vous sûr de vouloir supprimer ce membre ?')">Supprimer</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div id="tab2" data-tab-content class="hidden">
                <h2 class="text-xl font-bold mb-4">Liste des Activités</h2>
                <table class="w-full bg-white rounded shadow">
                    <thead class="bg-rose-900 text-white">
                        <tr>
                            <th class="border px-4 py-2">Nom Activité</th>
                            <th class="border px-4 py-2">Description</th>
                            <th class="border px-4 py-2">Capacité</th>
                            <th class="border px-4 py-2">Date Début</th>
                            <th class="border px-4 py-2">Date Fin</th>
                            <th class="border px-4 py-2">Disponibilité</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border px-4 py-2">Yoga</td>
                            <td class="border px-4 py-2">Cours de yoga relaxant</td>
                            <td class="border px-4 py-2">20</td>
                            <td class="border px-4 py-2">2024-01-01</td>
                            <td class="border px-4 py-2">2024-01-31</td>
                            <td class="border px-4 py-2">
                                <button class="bg-green-500 text-white px-2 py-1 rounded">Disponible</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div id="tab3" data-tab-content class="hidden">
                <h2 class="text-xl font-bold mb-4">Statistiques</h2>
                <p>Graphiques et données des statistiques ici.</p>
            </div>
        </main>
    </div>
    <?php include '../../includes/footer.php' ?>
</body>
</html>





