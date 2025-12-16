<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Channel Partner Portal - CoEvolve</title>
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Inter', sans-serif;
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #065f46 0%, #047857 50%, #059669 100%);
        }
        
        .input-focus {
            transition: all 0.3s ease;
        }
        
        .input-focus:focus {
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(5, 150, 105, 0.2);
        }
        
        .btn-green {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            transition: all 0.3s ease;
        }
        
        .btn-green:hover {
            background: linear-gradient(135deg, #059669 0%, #047857 100%);
            transform: translateY(-2px);
            box-shadow: 0 12px 24px rgba(5, 150, 105, 0.4);
        }
        
        .btn-green:active {
            transform: translateY(0);
        }
        
        .logo-container {
            filter: drop-shadow(0 0 30px rgba(16, 185, 129, 0.4));
        }
        
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .slide-in {
            animation: slideIn 0.6s ease-out;
        }
        
        .tab-active {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
        }
        
        .tab-inactive {
            background: transparent;
            color: #6b7280;
        }
        
        .loading {
            display: none;
        }
        
        .loading.active {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid #ffffff;
            border-radius: 50%;
            border-top-color: transparent;
            animation: spin 0.8s linear infinite;
        }
        
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
        
        .error-message, .success-message {
            display: none;
            animation: slideIn 0.3s ease-out;
        }
        
        .error-message.active, .success-message.active {
            display: block;
        }
        
        .form-hidden {
            display: none;
        }
        
        .radio-custom {
            appearance: none;
            width: 20px;
            height: 20px;
            border: 2px solid #d1d5db;
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .radio-custom:checked {
            border-color: #10b981;
            background-color: #10b981;
            box-shadow: inset 0 0 0 4px white;
        }
    </style>
</head>
<body class="gradient-bg min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md slide-in">
        <!-- Logo -->
        <div class="text-center mb-8 logo-container">
        <div class="container mx-auto flex justify-center">
            <img src="https://coevolvegroup.com/assets/images/logos/primary-logo.png" alt="CoEvolve Logo" class="h-12 logo-glow">
        </div>
            <h1 class="text-white text-2xl font-bold mt-4">Channel Partner Sign In</h1>
            <!-- <p class="text-blue-200 text-sm mt-2">Sign in to access your dashboard</p> -->
        </div>

        <!-- Tab Navigation -->
        <div class="bg-white rounded-t-2xl shadow-2xl p-2 flex gap-2">
            <button 
                onclick="switchTab('login')" 
                id="loginTab"
                class="flex-1 py-3 px-4 rounded-lg font-semibold transition-all duration-300 tab-active"
            >
                Sign In
            </button>
            <button 
                onclick="switchTab('register')" 
                id="registerTab"
                class="flex-1 py-3 px-4 rounded-lg font-semibold transition-all duration-300 tab-inactive"
            >
                Register
            </button>
        </div>

        <!-- Forms Container -->
        <div class="bg-white rounded-b-2xl shadow-2xl p-8 overflow-y-auto" style="max-height: 75vh;">
            <!-- Success Message -->
            <div id="successMessage" class="success-message bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-6">
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span id="successText" class="text-sm font-medium"></span>
                </div>
            </div>

            <!-- Error Message -->
            <div id="errorMessage" class="error-message bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-6">
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                    </svg>
                    <span id="errorText" class="text-sm font-medium"></span>
                </div>
            </div>

            <!-- Login Form -->
            <form id="loginForm" onsubmit="handleLogin(event)">
                <!-- Email/Phone Field -->
                <div class="mb-6">
                    <label for="loginUsername" class="block text-gray-700 font-semibold mb-2">
                        Email
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        <input 
                            type="text" 
                            id="loginUsername" 
                            name="loginUsername"
                            class="w-full pl-10 pr-4 py-3 border-2 border-gray-200 rounded-lg focus:border-green-500 focus:outline-none input-focus" 
                            placeholder="Enter your email"
                            required
                        >
                    </div>
                </div>

                <!-- Password Field -->
                <div class="mb-6">
                    <label for="loginPassword" class="block text-gray-700 font-semibold mb-2">
                        Password
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </div>
                        <input 
                            type="password" 
                            id="loginPassword" 
                            name="loginPassword"
                            class="w-full pl-10 pr-12 py-3 border-2 border-gray-200 rounded-lg focus:border-green-500 focus:outline-none input-focus" 
                            placeholder="Enter your password"
                            required
                        >
                        <button 
                            type="button" 
                            onclick="togglePassword('loginPassword')"
                            class="absolute inset-y-0 right-0 pr-3 flex items-center"
                        >
                            <svg class="w-5 h-5 text-gray-400 hover:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Remember Me -->
                <!-- <div class="flex items-center mb-6">
                    <input 
                        type="checkbox" 
                        id="loginRemember" 
                        class="w-4 h-4 text-green-600 border-gray-300 rounded focus:ring-green-500"
                    >
                    <label for="loginRemember" class="ml-2 text-sm text-gray-600">
                        Remember me on this device
                    </label>
                </div> -->

                <!-- Login Button -->
                <button 
                    type="submit" 
                    id="loginBtn"
                    class="w-full py-3 px-4 btn-green text-white font-semibold rounded-lg shadow-lg flex items-center justify-center gap-2"
                >
                    <span id="loginText">Sign In</span>
                    <span class="loading" id="loginSpinner"></span>
                    <svg id="loginArrow" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </button>

                <!-- Forgot Password Info -->
                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600">
                        Forgot password? 
                        <!-- <button type="button" onclick="showAdminContact()" class="text-green-600 hover:text-green-700 font-semibold"> -->
                            Check your initial welcome email or contact admin
                        <!-- </button> -->
                    </p>
                    <p class="text-sm text-gray-400">Demo Credentials: partner1@example.com | partner123</p>
                </div>
            </form>

            <!-- Register Form -->
            <form id="registerForm" onsubmit="handleRegister(event)" class="form-hidden">
                <!-- Partner Type -->
                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-3">
                        Partner Type <span class="text-red-500">*</span>
                    </label>
                    <div class="flex gap-6">
                        <label class="flex items-center cursor-pointer">
                            <input 
                                type="radio" 
                                name="partnerType" 
                                value="individual" 
                                class="radio-custom"
                                onchange="togglePartnerType('individual')"
                                checked
                            >
                            <span class="ml-2 text-gray-700">Individual</span>
                        </label>
                        <label class="flex items-center cursor-pointer">
                            <input 
                                type="radio" 
                                name="partnerType" 
                                value="company" 
                                class="radio-custom"
                                onchange="togglePartnerType('company')"
                            >
                            <span class="ml-2 text-gray-700">Company</span>
                        </label>
                    </div>
                </div>

                <!-- Name Field (Dynamic) -->
                <div class="mb-6">
                    <label for="partnerName" class="block text-gray-700 font-semibold mb-2">
                        <span id="nameLabel">Individual Name</span> <span class="text-red-500">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="partnerName" 
                        name="partnerName"
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-green-500 focus:outline-none input-focus" 
                        placeholder="Enter your full name"
                        required
                    >
                </div>

                <!-- Phone and Email -->
                <!-- <div class="grid md:grid-cols-2 gap-4 mb-6"> -->
                    <div class="mb-6">
                        <label for="regPhone" class="block text-gray-700 font-semibold mb-2">
                            Phone Number <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="tel" 
                            id="regPhone" 
                            name="regPhone"
                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-green-500 focus:outline-none input-focus" 
                            placeholder="+91 9876543210"
                            pattern="[0-9+\s-]+"
                            required
                        >
                    </div>
                    <div class="mb-6">
                        <label for="regEmail" class="block text-gray-700 font-semibold mb-2">
                            Email Address <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="email" 
                            id="regEmail" 
                            name="regEmail"
                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-green-500 focus:outline-none input-focus" 
                            placeholder="your@email.com"
                            required
                        >
                    </div>
                <!-- </div> -->

                <!-- PAN Card -->
                <div class="mb-6">
                    <label for="panCard" class="block text-gray-700 font-semibold mb-2">
                        PAN Card Number <span class="text-red-500">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="panCard" 
                        name="panCard"
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-green-500 focus:outline-none input-focus uppercase" 
                        placeholder="ABCDE1234F"
                        pattern="[A-Z]{5}[0-9]{4}[A-Z]{1}"
                        maxlength="10"
                        required
                    >
                    <p class="text-xs text-gray-500 mt-1">Format: ABCDE1234F</p>
                </div>

                <!-- RERA Registration -->
                <div class="mb-6">
                    <label for="reraReg" class="block text-gray-700 font-semibold mb-2">
                        RERA Registration No <span class="text-red-500">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="reraReg" 
                        name="reraReg"
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-green-500 focus:outline-none input-focus uppercase" 
                        placeholder="Enter RERA registration number"
                        required
                    >
                </div>

                <!-- GST Number -->
                <div class="mb-6">
                    <label for="gstNo" class="block text-gray-700 font-semibold mb-2">
                        GST Number <span class="text-red-500">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="gstNo" 
                        name="gstNo"
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-green-500 focus:outline-none input-focus uppercase" 
                        placeholder="22AAAAA0000A1Z5"
                        pattern="[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}"
                        maxlength="15"
                        required
                    >
                    <p class="text-xs text-gray-500 mt-1">Format: 22AAAAA0000A1Z5</p>
                </div>

                <!-- Password Fields -->
                <!-- <div class="grid md:grid-cols-2 gap-4 mb-6">
                    <div>
                        <label for="regPassword" class="block text-gray-700 font-semibold mb-2">
                            Password <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="password" 
                            id="regPassword" 
                            name="regPassword"
                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-green-500 focus:outline-none input-focus" 
                            placeholder="Create password"
                            minlength="8"
                            required
                        >
                    </div>
                    <div>
                        <label for="regConfirmPassword" class="block text-gray-700 font-semibold mb-2">
                            Confirm Password <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="password" 
                            id="regConfirmPassword" 
                            name="regConfirmPassword"
                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-green-500 focus:outline-none input-focus" 
                            placeholder="Confirm password"
                            minlength="8"
                            required
                        >
                    </div>
                </div> -->

                <!-- Terms and Conditions -->
                <div class="flex items-start mb-6">
                    <input 
                        type="checkbox" 
                        id="terms" 
                        class="w-4 h-4 mt-1 text-green-600 border-gray-300 rounded focus:ring-green-500"
                        required
                    >
                    <label for="terms" class="ml-2 text-sm text-gray-600">
                        I agree to the <a href="#" class="text-green-600 hover:text-green-700 font-semibold">Terms & Conditions</a> and <a href="#" class="text-green-600 hover:text-green-700 font-semibold">Privacy Policy</a>
                    </label>
                </div>

                <!-- Register Button -->
                <button 
                    type="submit" 
                    id="registerBtn"
                    class="w-full py-3 px-4 btn-green text-white font-semibold rounded-lg shadow-lg flex items-center justify-center gap-2"
                >
                    <span id="registerText">Submit</span>
                    <span class="loading" id="registerSpinner"></span>
                    <svg id="registerArrow" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </button>
            </form>

            <!-- Support Link -->
            <!-- <div class="mt-6 text-center">
                <a href="mailto:partners@coevolve.com" class="text-sm text-gray-600 hover:text-green-600 transition-colors">
                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    partners@coevolve.com
                </a>
            </div> -->
        </div>

        <!-- Back to Home -->
        <div class="text-center mt-6">
            <a href="../index.php" class="text-green-100 hover:text-white text-sm font-medium transition-colors inline-flex items-center gap-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back to Home
            </a>
        </div>
    </div>

    <!-- Modal for Support Contact -->
    <div id="supportModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50">
        <div class="bg-white rounded-xl shadow-2xl max-w-md w-full p-6 slide-in">
            <div class="text-center">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100 mb-4">
                    <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Contact Partner Support</h3>
                <p class="text-sm text-gray-600 mb-4">
                    For password reset or account issues, please contact our partner support team:
                </p>
                
                <div class="bg-green-50 rounded-lg p-4 mb-4">
                    <p class="text-sm font-semibold text-gray-700 mb-2">Support Contact:</p>
                    <p class="text-sm text-gray-600">Email: partners@coevolve.com</p>
                    <p class="text-sm text-gray-600">Phone: +91 76763 33666</p>
                    <p class="text-sm text-gray-600">Hours: Mon-Sat, 9 AM - 6 PM</p>
                </div>
                <button 
                    onclick="closeSupportModal()" 
                    class="w-full py-2 px-4 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg transition-colors"
                >
                    Got it
                </button>
            </div>
        </div>
    </div>

    <script>
        // Mock database for partners
        const partnersDB = [
            { email: 'partner1@example.com', phone: '9876543210', password: 'partner123', partnerId: 'P001' },
            { email: 'partner2@example.com', phone: '9876543211', password: 'partner123', partnerId: 'P002' }
        ];

        let registeredPartners = [];

        function switchTab(tab) {
            const loginTab = document.getElementById('loginTab');
            const registerTab = document.getElementById('registerTab');
            const loginForm = document.getElementById('loginForm');
            const registerForm = document.getElementById('registerForm');
            const errorMessage = document.getElementById('errorMessage');
            const successMessage = document.getElementById('successMessage');

            errorMessage.classList.remove('active');
            successMessage.classList.remove('active');

            if (tab === 'login') {
                loginTab.classList.remove('tab-inactive');
                loginTab.classList.add('tab-active');
                registerTab.classList.remove('tab-active');
                registerTab.classList.add('tab-inactive');
                loginForm.classList.remove('form-hidden');
                registerForm.classList.add('form-hidden');
            } else {
                registerTab.classList.remove('tab-inactive');
                registerTab.classList.add('tab-active');
                loginTab.classList.remove('tab-active');
                loginTab.classList.add('tab-inactive');
                registerForm.classList.remove('form-hidden');
                loginForm.classList.add('form-hidden');
            }
        }

        function togglePartnerType(type) {
            const nameLabel = document.getElementById('nameLabel');
            const partnerName = document.getElementById('partnerName');
            
            if (type === 'individual') {
                nameLabel.textContent = 'Individual Name';
                partnerName.placeholder = 'Enter your full name';
            } else {
                nameLabel.textContent = 'Company Name';
                partnerName.placeholder = 'Enter company name';
            }
        }

        function togglePassword(fieldId) {
            const passwordInput = document.getElementById(fieldId);
            passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password';
        }

        function showError(message) {
            const errorMessage = document.getElementById('errorMessage');
            const errorText = document.getElementById('errorText');
            const successMessage = document.getElementById('successMessage');
            
            successMessage.classList.remove('active');
            errorText.textContent = message;
            errorMessage.classList.add('active');
            
            setTimeout(() => {
                errorMessage.classList.remove('active');
            }, 5000);
        }

        function showSuccess(message) {
            const successMessage = document.getElementById('successMessage');
            const successText = document.getElementById('successText');
            const errorMessage = document.getElementById('errorMessage');
            
            errorMessage.classList.remove('active');
            successText.textContent = message;
            successMessage.classList.add('active');
            
            setTimeout(() => {
                successMessage.classList.remove('active');
            }, 5000);
        }

        function showAdminContact() {
            document.getElementById('supportModal').classList.remove('hidden');
        }

        function closeSupportModal() {
            document.getElementById('supportModal').classList.add('hidden');
        }

        async function handleLogin(event) {
            event.preventDefault();
            
            const loginBtn = document.getElementById('loginBtn');
            const loginText = document.getElementById('loginText');
            const loginSpinner = document.getElementById('loginSpinner');
            const loginArrow = document.getElementById('loginArrow');
            
            const username = document.getElementById('loginUsername').value.trim();
            const password = document.getElementById('loginPassword').value;
            
            loginBtn.disabled = true;
            loginText.textContent = 'Signing in...';
            loginSpinner.classList.add('active');
            loginArrow.classList.add('hidden');
            
            await new Promise(resolve => setTimeout(resolve, 1500));
            
            const allPartners = [...partnersDB, ...registeredPartners];
            const partner = allPartners.find(p => 
                (p.email === username || p.phone === username) && 
                p.password === password
            );
            
            if (partner) {
                loginText.textContent = 'Success! Redirecting...';
                
                setTimeout(() => {
                    console.log(`Redirecting to: /partner/dashboard/${partner.partnerId || partner.email}`);
                    
                    // In production, uncomment:
                    window.location.href = `../cp/index.php`;
                    // window.location.href = `cp/index.php/${partner.partnerId || partner.email}`;
                    
                    // alert(`Login successful!\nPartner ID: ${partner.partnerId || 'NEW'}\nRedirecting to dashboard...`);
                    
                    document.getElementById('loginForm').reset();
                    loginBtn.disabled = false;
                    loginText.textContent = 'Sign In';
                    loginSpinner.classList.remove('active');
                    loginArrow.classList.remove('hidden');
                }, 1000);
            } else {
                loginBtn.disabled = false;
                loginText.textContent = 'Sign In';
                loginSpinner.classList.remove('active');
                loginArrow.classList.remove('hidden');
                
                showError('Invalid email/phone or password. Please try again.');
            }
        }

        async function handleRegister(event) {
            event.preventDefault();
            
            const registerBtn = document.getElementById('registerBtn');
            const registerText = document.getElementById('registerText');
            const registerSpinner = document.getElementById('registerSpinner');
            const registerArrow = document.getElementById('registerArrow');
            
            // Get form values
            const partnerType = document.querySelector('input[name="partnerType"]:checked').value;
            const name = document.getElementById('partnerName').value.trim();
            const phone = document.getElementById('regPhone').value.trim();
            const email = document.getElementById('regEmail').value.trim();
            const pan = document.getElementById('panCard').value.trim().toUpperCase();
            const rera = document.getElementById('reraReg').value.trim().toUpperCase();
            const gst = document.getElementById('gstNo').value.trim().toUpperCase();
            const password = document.getElementById('regPassword').value;
            const confirmPassword = document.getElementById('regConfirmPassword').value;
            
            // Validate passwords match
            if (password !== confirmPassword) {
                showError('Passwords do not match. Please try again.');
                return;
            }
            
            // Check if email or phone already exists
            const allPartners = [...partnersDB, ...registeredPartners];
            const existingPartner = allPartners.find(p => p.email === email || p.phone === phone);
            
            if (existingPartner) {
                showError('Email or phone number already registered. Please login instead.');
                return;
            }
            
            // Show loading state
            registerBtn.disabled = true;
            registerText.textContent = 'Creating Account...';
            registerSpinner.classList.add('active');
            registerArrow.classList.add('hidden');
            
            // Simulate API call
            await new Promise(resolve => setTimeout(resolve, 2000));
            
            // Generate partner ID
            const partnerId = 'P' + String(allPartners.length + 1).padStart(3, '0');
            
            // Create new partner object
            const newPartner = {
                partnerId: partnerId,
                partnerType: partnerType,
                name: name,
                phone: phone,
                email: email,
                pan: pan,
                rera: rera,
                gst: gst,
                password: password,
                registeredAt: new Date().toISOString()
            };
            
            // Add to registered partners
            registeredPartners.push(newPartner);
            
            console.log('New partner registered:', newPartner);
            
            // Show success message
            registerBtn.disabled = false;
            registerText.textContent = 'Create Account';
            registerSpinner.classList.remove('active');
            registerArrow.classList.remove('hidden');
            
            showSuccess(`Registration successful! Your Partner ID is ${partnerId}. You can now login.`);
            
            // Reset form and switch to login tab after 3 seconds
            setTimeout(() => {
                document.getElementById('registerForm').reset();
                switchTab('login');
                document.getElementById('loginUsername').value = email;
            }, 3000);
        }

        // Close modal when clicking outside
        document.getElementById('supportModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeSupportModal();
            }
        });

        // Demo credentials info
        console.log('=== Demo Credentials ===');
        console.log('Partner 1 - Email: partner1@example.com, Phone: 9876543210, Password: partner123');
        console.log('Partner 2 - Email: partner2@example.com, Phone: 9876543211, Password: partner123');
        console.log('Or register a new account using the Register tab!');
    </script>
</body>
</html>