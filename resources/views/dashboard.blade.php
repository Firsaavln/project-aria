<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'cordes-blue': '#1e40af',
                        'cordes-dark': '#1e293b',
                        'cordes-light': '#f8fafc',
                        'cordes-accent': '#3b82f6'
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gray-100 text-gray-900" x-data="{ sidebarOpen: false }">
    <!-- Sidebar -->
    <!-- Mobile Header -->
    <div class="bg-blue-700 text-white px-4 py-3 flex justify-between items-center shadow md:hidden">
        <button @click="sidebarOpen = !sidebarOpen">
            <i class="fas fa-bars text-2xl"></i>
        </button>
        <span class="text-lg font-bold">Dashboard</span>
    </div>

    <div class="flex">
        <!-- Sidebar -->
        <div :class="sidebarOpen ? 'block' : 'hidden'" class="fixed inset-y-0 left-0 w-64 bg-cordes-dark shadow-xl z-50 md:block">
            <div class="flex items-center justify-center h-16 bg-cordes-blue">
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center">
                        <i class="fas fa-cube text-cordes-blue text-lg"></i>
                    </div>
                    <span class="text-white text-xl font-bold">Report</span>
                </div>
            </div>

            <nav class="mt-8 px-4">
                <div class="space-y-2">
                    <a href="#" class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white rounded-lg transition-colors group">
                        <i class="fas fa-home mr-3 text-cordes-accent group-hover:text-white"></i>
                        Dashboard
                    </a>
                    <a href="#" class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white rounded-lg transition-colors group">
                        <i class="fas fa-users mr-3 text-gray-400 group-hover:text-white"></i>
                        Users
                    </a>
                    <!-- more links -->
                </div>
            </nav>

            <div class="absolute bottom-4 left-4 right-4">
                <div class="bg-gray-800 rounded-lg p-4">
                    <div class="flex items-center space-x-3">
                        <img src="https://cdn-icons-png.flaticon.com/512/17003/17003310.png" class="w-10 h-10 rounded-full">
                        <div>
                            <p class="text-white text-sm font-medium">{{ Auth::user()->name }}</p>
                            <p class="text-gray-400 text-xs capitalize">{{ Auth::user()->role }}</p>
                        </div>
                    </div>
                    <form method="POST" action="/logout">
                        @csrf
                        <button type="submit" class="mt-5 w-full bg-red-600 hover:bg-red-700 text-white text-sm py-2 px-4 rounded-lg text-center">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <!-- Main Content -->
        <div class="flex-1 md:ml-64 p-6">
            <!-- Top Header -->
            <header class="bg-white shadow-sm border-b border-gray-200">
                <div class="px-6 py-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="text-2xl font-semibold text-gray-900">{{ $message }}</h1>
                            <p class="text-gray-600 text-sm mt-1">Welcome back, here's what's happening today</p>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Dashboard Content -->
            <main class="p-6">
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <!-- Revenue Card -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600">Total Revenue</p>
                                <p class="text-3xl font-bold text-gray-900 mt-2">$48,291</p>
                                <div class="flex items-center mt-2">
                                    <span class="text-green-600 text-sm font-medium flex items-center">
                                        <i class="fas fa-arrow-up mr-1"></i>
                                        12%
                                    </span>
                                    <span class="text-gray-500 text-sm ml-2">vs last month</span>
                                </div>
                            </div>
                            <div class="w-12 h-12 bg-cordes-blue bg-opacity-10 rounded-lg flex items-center justify-center">
                                <i class="fas fa-dollar-sign text-cordes-blue text-xl"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Users Card -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600">Total Users</p>
                                <p class="text-3xl font-bold text-gray-900 mt-2">15,847</p>
                                <div class="flex items-center mt-2">
                                    <span class="text-green-600 text-sm font-medium flex items-center">
                                        <i class="fas fa-arrow-up mr-1"></i>
                                        8%
                                    </span>
                                    <span class="text-gray-500 text-sm ml-2">vs last month</span>
                                </div>
                            </div>
                            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-users text-green-600 text-xl"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Orders Card -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600">Total Orders</p>
                                <p class="text-3xl font-bold text-gray-900 mt-2">2,847</p>
                                <div class="flex items-center mt-2">
                                    <span class="text-green-600 text-sm font-medium flex items-center">
                                        <i class="fas fa-arrow-up mr-1"></i>
                                        15%
                                    </span>
                                    <span class="text-gray-500 text-sm ml-2">vs last month</span>
                                </div>
                            </div>
                            <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-shopping-cart text-orange-600 text-xl"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Products Card -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600">Products</p>
                                <p class="text-3xl font-bold text-gray-900 mt-2">1,247</p>
                                <div class="flex items-center mt-2">
                                    <span class="text-green-600 text-sm font-medium flex items-center">
                                        <i class="fas fa-arrow-up mr-1"></i>
                                        5%
                                    </span>
                                    <span class="text-gray-500 text-sm ml-2">vs last month</span>
                                </div>
                            </div>
                            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-box text-purple-600 text-xl"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts Row -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                    <!-- Revenue Chart -->
                    <div class="lg:col-span-2 bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                        <div class="flex items-center justify-between mb-6">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900">Revenue Analytics</h3>
                                <p class="text-gray-600 text-sm">Monthly revenue overview</p>
                            </div>
                            <div class="flex items-center space-x-2">
                                <button class="px-3 py-1 text-sm bg-cordes-blue text-white rounded-md">6M</button>
                                <button class="px-3 py-1 text-sm text-gray-600 hover:bg-gray-100 rounded-md">1Y</button>
                            </div>
                        </div>
                        <div class="h-80">
                            <canvas id="revenueChart"></canvas>
                        </div>
                    </div>


                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Recent Activity</h3>
                        <div class="space-y-4">
                            <div class="flex items-start space-x-3">
                                <div class="w-2 h-2 bg-green-500 rounded-full mt-2"></div>
                                <div class="flex-1">
                                    <p class="text-sm text-gray-900">New user registered</p>
                                    <p class="text-xs text-gray-500">sarah.johnson@email.com • 2 minutes ago</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-3">
                                <div class="w-2 h-2 bg-blue-500 rounded-full mt-2"></div>
                                <div class="flex-1">
                                    <p class="text-sm text-gray-900">Order completed</p>
                                    <p class="text-xs text-gray-500">Order #15847 - $299.99 • 5 minutes ago</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-3">
                                <div class="w-2 h-2 bg-purple-500 rounded-full mt-2"></div>
                                <div class="flex-1">
                                    <p class="text-sm text-gray-900">Product updated</p>
                                    <p class="text-xs text-gray-500">iPhone 15 Pro - Stock: 25 • 8 minutes ago</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-3">
                                <div class="w-2 h-2 bg-orange-500 rounded-full mt-2"></div>
                                <div class="flex-1">
                                    <p class="text-sm text-gray-900">Payment received</p>
                                    <p class="text-xs text-gray-500">$1,245.00 from client • 12 minutes ago</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </main>
        </div>

        <script>
            // Initialize Chart.js with Cordes styling
            const ctx = document.getElementById('revenueChart').getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    datasets: [{
                        label: 'Revenue',
                        data: [25000, 32000, 28000, 35000, 42000, 48000],
                        borderColor: '#1e40af',
                        backgroundColor: 'rgba(30, 64, 175, 0.1)',
                        borderWidth: 3,
                        fill: true,
                        tension: 0.4,
                        pointBackgroundColor: '#1e40af',
                        pointBorderColor: '#ffffff',
                        pointBorderWidth: 2,
                        pointRadius: 5
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                color: '#6b7280'
                            }
                        },
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: '#f3f4f6'
                            },
                            ticks: {
                                color: '#6b7280',
                                callback: function(value) {
                                    return ' + value.toLocaleString()';
                                }
                            }
                        }
                    },
                    elements: {
                        point: {
                            hoverRadius: 8
                        }
                    }
                }
            });

            // Add some interactive functionality
            document.addEventListener('DOMContentLoaded', function() {
                // Sidebar navigation active state
                const navLinks = document.querySelectorAll('nav a');
                navLinks.forEach(link => {
                    link.addEventListener('click', function(e) {
                        e.preventDefault();
                        navLinks.forEach(l => l.classList.remove('bg-gray-700', 'text-white'));
                        navLinks.forEach(l => l.classList.add('text-gray-300'));
                        this.classList.add('bg-gray-700', 'text-white');
                        this.classList.remove('text-gray-300');
                    });
                });

                // Set dashboard as active by default
                navLinks[0].classList.add('bg-gray-700', 'text-white');
                navLinks[0].classList.remove('text-gray-300');

                // Notification bell animation
                const bellIcon = document.querySelector('.fa-bell');
                if (bellIcon) {
                    setInterval(() => {
                        bellIcon.classList.add('animate-pulse');
                        setTimeout(() => {
                            bellIcon.classList.remove('animate-pulse');
                        }, 1000);
                    }, 5000);
                }

                // Stats cards hover effects
                const statsCards = document.querySelectorAll('.hover\\:shadow-md');
                statsCards.forEach(card => {
                    card.addEventListener('mouseenter', function() {
                        this.style.transform = 'translateY(-2px)';
                    });
                    card.addEventListener('mouseleave', function() {
                        this.style.transform = 'translateY(0)';
                    });
                });
            });
        </script>
</body>

</html>