<!DOCTYPE html>
<html lang="fr" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - MaBagnole</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/@headlessui/vue@1.7.16/dist/headlessui.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: { extend: { animation: { 'fadeIn': 'fadeIn 0.3s ease-in-out' } } }
        }
    </script>
    <style>
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
        .fade-in { animation: fadeIn 0.3s ease-in-out; }
    </style>
</head>
<body class="bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 min-h-screen">
    <!-- Sidebar -->
    <div id="sidebar" class="fixed inset-y-0 left-0 z-50 w-64 bg-white dark:bg-gray-800 shadow-lg transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out">
        <div class="flex items-center justify-center h-16 px-4 border-b border-gray-200 dark:border-gray-700">
            <h1 class="text-xl font-bold text-blue-600 dark:text-blue-400">MaBagnole Admin</h1>
        </div>
        <nav class="mt-8">
            <a href="#" onclick="showSection('dashboard')" class="flex items-center px-6 py-3 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                <i class="fas fa-tachometer-alt w-5 mr-3"></i> Dashboard
            </a>
            <a href="#" onclick="showSection('vehicules')" class="flex items-center px-6 py-3 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                <i class="fas fa-car w-5 mr-3"></i> Véhicules
            </a>
            <a href="#" onclick="showSection('reservations')" class="flex items-center px-6 py-3 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                <i class="fas fa-calendar-check w-5 mr-3"></i> Réservations
            </a>
            <a href="#" onclick="showSection('avis')" class="flex items-center px-6 py-3 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                <i class="fas fa-star w-5 mr-3"></i> Avis
            </a>
        </nav>
    </div>

    <!-- Overlay pour mobile -->
    <div id="mobile-overlay" class="fixed inset-0 z-40 bg-black bg-opacity-50 lg:hidden hidden" onclick="closeSidebar()"></div>

    <!-- Contenu principal -->
    <div class="lg:ml-64">
        <!-- Header -->
        <header class="bg-white dark:bg-gray-800 shadow-sm border-b border-gray-200 dark:border-gray-700">
            <div class="px-6 py-4 flex items-center justify-between">
                <div class="flex items-center">
                    <button onclick="toggleSidebar()" class="lg:hidden p-2 rounded-md text-gray-500 hover:text-gray-900 dark:hover:text-white">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <h2 id="page-title" class="text-2xl font-bold ml-4">Dashboard</h2>
                </div>
                <div class="flex items-center space-x-4">
                    <button onclick="toggleDarkMode()" class="p-2 rounded-lg bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600">
                        <i class="fas fa-moon text-xl"></i>
                    </button>
                    <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center text-white font-bold">A</div>
                </div>
            </div>
        </header>

        <!-- Contenu des sections -->
        <main class="p-6">
            <!-- Dashboard Stats -->
            <section id="dashboard" class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 fade-in">
                        <div class="flex items-center">
                            <div class="p-3 bg-blue-100 dark:bg-blue-900 rounded-lg">
                                <i class="fas fa-car text-blue-600 dark:text-blue-400 text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Véhicules disponibles</p>
                                <p class="text-3xl font-bold text-gray-900 dark:text-white">127</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 fade-in">
                        <div class="flex items-center">
                            <div class="p-3 bg-green-100 dark:bg-green-900 rounded-lg">
                                <i class="fas fa-calendar-check text-green-600 dark:text-green-400 text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Réservations</p>
                                <p class="text-3xl font-bold text-gray-900 dark:text-white">45</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 fade-in">
                        <div class="flex items-center">
                            <div class="p-3 bg-yellow-100 dark:bg-yellow-900 rounded-lg">
                                <i class="fas fa-star text-yellow-600 dark:text-yellow-400 text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Note moyenne</p>
                                <p class="text-3xl font-bold text-gray-900 dark:text-white">4.7/5</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 fade-in">
                        <div class="flex items-center">
                            <div class="p-3 bg-purple-100 dark:bg-purple-900 rounded-lg">
                                <i class="fas fa-users text-purple-600 dark:text-purple-400 text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Clients actifs</p>
                                <p class="text-3xl font-bold text-gray-900 dark:text-white">289</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tableau récent -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden">
                    <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                        <h3 class="text-lg font-semibold">Réservations récentes</h3>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Client</th>
                                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Véhicule</th>
                                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Dates</th>
                                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Statut</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                                                <i class="fas fa-user text-blue-600 text-sm"></i>
                                            </div>
                                            <div class="ml-3">
                                                <div class="text-sm font-medium">Jean Dupont</div>
                                                <div class="text-sm text-gray-500 dark:text-gray-400">jean.dupont@email.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">Peugeot 208</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">25-28 Déc</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-3 py-1 text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300 rounded-full">Confirmée</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            <!-- Section Véhicules -->
            <section id="vehicules" class="hidden space-y-6">
                <div class="flex justify-between items-center">
                    <h3 class="text-2xl font-bold">Gestion des Véhicules</h3>
                    <button onclick="openModal('add-vehicule')" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-xl font-medium shadow-lg transition-all duration-200">
                        <i class="fas fa-plus mr-2"></i>Ajouter
                    </button>
                </div>
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Modèle</th>
                                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Immatriculation</th>
                                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Catégorie</th>
                                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Prix/Jour</th>
                                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Disponible</th>
                                    <th class="px-6 py-4 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap font-medium">Peugeot 208</td>
                                    <td class="px-6 py-4 whitespace-nowrap">AB-123-CD</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 py-1 text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300 rounded-full">Citadine</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">€45</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <i class="fas fa-check-circle text-green-500 text-lg"></i>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                        <button onclick="openModal('edit-vehicule')" class="text-blue-600 hover:text-blue-900">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="text-red-600 hover:text-red-900">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            <!-- Autres sections cachées (reservations, avis) -->
            <section id="reservations" class="hidden space-y-6">Réservations...</section>
            <section id="avis" class="hidden space-y-6">Avis...</section>
        </main>
    </div>

    <!-- Modal Ajouter/Editer Véhicule -->
    <div id="vehicule-modal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex min-h-screen items-end justify-center px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" onclick="closeModal()"></div>
            <div class="inline-block align-bottom bg-white dark:bg-gray-800 rounded-2xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full fade-in">
                <div class="px-8 pt-6 pb-8">
                    <div class="flex items-center justify-between mb-6">
                        <h3 id="modal-title" class="text-2xl font-bold text-gray-900 dark:text-white">Ajouter un Véhicule</h3>
                        <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600">
                            <i class="fas fa-times text-2xl"></i>
                        </button>
                    </div>
                    <form class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Modèle</label>
                            <input type="text" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition-all duration-200">
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Immatriculation</label>
                                <input type="text" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Prix/Jour (€)</label>
                                <input type="number" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Catégorie</label>
                            <select class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white">
                                <option>Citadine</option>
                                <option>Berline</option>
                                <option>SUV</option>
                                <option>Utilitaire</option>
                            </select>
                        </div>
                        <div class="flex justify-end space-x-3 pt-6">
                            <button type="button" onclick="closeModal()" class="px-6 py-3 border border-gray-300 text-gray-700 font-medium rounded-xl hover:bg-gray-50 transition-all duration-200">Annuler</button>
                            <button type="submit" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-xl shadow-lg transition-all duration-200">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Sidebar mobile
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('mobile-overlay');
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }

        function closeSidebar() {
            document.getElementById('sidebar').classList.add('-translate-x-full');
            document.getElementById('mobile-overlay').classList.add('hidden');
        }

        // Navigation sections
        function showSection(sectionId) {
            document.querySelectorAll('section').forEach(section => {
                section.classList.add('hidden');
            });
            document.getElementById(sectionId).classList.remove('hidden');
            document.getElementById('page-title').textContent = sectionId.charAt(0).toUpperCase() + sectionId.slice(1);
            closeSidebar();
        }

        // Modals
        function openModal(modalType) {
            document.getElementById('vehicule-modal').classList.remove('hidden');
            document.getElementById('modal-title').textContent = modalType === 'add-vehicule' ? 'Ajouter un Véhicule' : 'Modifier le Véhicule';
        }

        function closeModal() {
            document.getElementById('vehicule-modal').classList.add('hidden');
        }

        // Dark mode
        function toggleDarkMode() {
            document.documentElement.classList.toggle('dark');
        }

        // Fermer modal avec Echap
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeModal();
            }
        });
    </script>
</body>
</html>
