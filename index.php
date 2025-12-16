<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoEvolve - Sign In Portal</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Inter', sans-serif;
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #0f172a 0%, #000C1A 100%);
        }
        
        .card-hover {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
            transform: scale(1.02);
        }
        
        .logo-glow {
            filter: drop-shadow(0 0 20px rgba(59, 130, 246, 0.3));
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        .float-animation {
            animation: float 6s ease-in-out infinite;
        }
        
        .divider {
            position: relative;
        }
        
        .divider::before {
            content: '';
            position: absolute;
            left: 50%;
            top: 0;
            bottom: 0;
            width: 1px;
            background: linear-gradient(to bottom, transparent, #e5e7eb, transparent);
            transform: translateX(-50%);
        }
        
        @media (max-width: 768px) {
            .divider::before {
                display: none;
            }
        }
    </style>
</head>
<body class="gradient-bg min-h-screen">
    <!-- Header Section -->
    <header class="py-8 px-4">
        <div class="container mx-auto flex justify-center">
            <img src="https://coevolvegroup.com/assets/images/logos/primary-logo.png" alt="CoEvolve Logo" class="h-12 logo-glow">
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-3 md:py-10">
        <div class="max-w-6xl mx-auto">
            <!-- Welcome Text -->
            <div class="text-center mb-8">
                <h3 class="text-3xl md:text-3xl font-bold text-white mb-4">CP Portal</h3>
                <p class="text-gray-300 text-lg md:text-xl">Select your sign in type to continue</p>
            </div>

            <!-- Split Screen Login Cards -->
            <div class="grid md:grid-cols-2 gap-8 md:gap-0 relative divider">
                <!-- Organization Login -->
                <div class="p-6 md:p-12 flex items-center justify-center">
                    <div class="w-full max-w-md">
                        <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-8 md:p-10 card-hover border border-white/20">
                            <div class="text-center mb-8">
                                <div class="inline-block p-4 bg-blue-500/20 rounded-full mb-4">
                                    <svg class="w-12 h-12 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                </div>
                                <h2 class="text-2xl md:text-3xl font-bold text-white mb-3">Organization</h2>
                                <!-- <p class="text-gray-300 text-sm md:text-base">Access your organization dashboard and resources</p> -->
                            </div>
                            
                            <button onclick="handleOrgLogin()" class="w-full py-4 px-6 btn-primary text-white font-semibold rounded-xl shadow-lg hover:shadow-xl flex items-center justify-center gap-2">
                                <span>Sign In to Dashboard</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                </svg>
                            </button>
                            
                            <!-- <div class="mt-6 text-center">
                                <a href="#" class="text-sm text-gray-400 hover:text-white transition-colors">Forgot password?</a>
                            </div> -->
                        </div>
                    </div>
                </div>

                <!-- Channel Partner Login -->
                <div class="p-6 md:p-12 flex items-center justify-center">
                    <div class="w-full max-w-md">
                        <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-8 md:p-10 card-hover border border-white/20">
                            <div class="text-center mb-8">
                                <div class="inline-block p-4 bg-green-500/20 rounded-full mb-4">
                                    <svg class="w-12 h-12 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                </div>
                                <h2 class="text-2xl md:text-3xl font-bold text-white mb-3">Channel Partners</h2>
                                <!-- <p class="text-gray-300 text-sm md:text-base">Access partner portal and collaboration tools</p> -->
                            </div>
                            
                            <button onclick="handlePartnerLogin()" class="w-full py-4 px-6 bg-gradient-to-r from-green-500 to-emerald-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl hover:from-green-600 hover:to-emerald-700 transition-all duration-300 hover:scale-102 flex items-center justify-center gap-2">
                                <span>Partner Portal</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                </svg>
                            </button>
                            
                            <!-- <div class="mt-6 text-center">
                                <a href="#" class="text-sm text-gray-400 hover:text-white transition-colors">Need partner access?</a>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional Info -->
            <!-- <div class="mt-16 text-center">
                <p class="text-gray-400 text-sm">Need help? Contact our support team at <a href="mailto:support@coevolve.com" class="text-blue-400 hover:text-blue-300 transition-colors">support@coevolve.com</a></p>
            </div> -->
        </div>
    </main>

    <!-- Footer -->
    <footer class="py-8 px-4 mt-auto">
        <div class="container mx-auto text-center text-gray-400 text-sm">
            <p>&copy; 2025 CoEvolve Estates Pvt Ltd. All rights reserved.</p>
        </div>
    </footer>

    <script>
        function handleOrgLogin() {
            // alert('Redirecting to Organization Login...');
            // Add your organization login URL here
            window.open('./auth/login-org.php', '_blank');
        }

        function handlePartnerLogin() {
            // alert('Redirecting to Channel Partner Portal...');
            // Add your partner portal URL here
            window.open('./auth/login-cp.php', '_blank');
        }
    </script>
</body>
</html>