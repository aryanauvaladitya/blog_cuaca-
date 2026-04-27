<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Login ke Blog Cuaca - Portal informasi cuaca terkini dan terpercaya">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Masuk — Blog Cuaca</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <!-- Animated Weather Background -->
    <div class="weather-bg">
        <img src="{{ asset('images/weather-bg.png') }}" alt="" class="bg-image">
        <div class="bg-overlay"></div>

        <!-- Floating Clouds -->
        <div class="cloud cloud-1">
            <svg viewBox="0 0 200 100" fill="none">
                <ellipse cx="70" cy="60" rx="60" ry="30" fill="rgba(255,255,255,0.15)"/>
                <ellipse cx="110" cy="50" rx="50" ry="25" fill="rgba(255,255,255,0.12)"/>
                <ellipse cx="140" cy="60" rx="40" ry="20" fill="rgba(255,255,255,0.1)"/>
            </svg>
        </div>
        <div class="cloud cloud-2">
            <svg viewBox="0 0 180 80" fill="none">
                <ellipse cx="60" cy="50" rx="50" ry="25" fill="rgba(255,255,255,0.1)"/>
                <ellipse cx="100" cy="42" rx="45" ry="22" fill="rgba(255,255,255,0.08)"/>
                <ellipse cx="130" cy="50" rx="35" ry="18" fill="rgba(255,255,255,0.06)"/>
            </svg>
        </div>
        <div class="cloud cloud-3">
            <svg viewBox="0 0 160 70" fill="none">
                <ellipse cx="55" cy="45" rx="45" ry="22" fill="rgba(255,255,255,0.12)"/>
                <ellipse cx="90" cy="38" rx="40" ry="20" fill="rgba(255,255,255,0.09)"/>
                <ellipse cx="115" cy="45" rx="30" ry="15" fill="rgba(255,255,255,0.07)"/>
            </svg>
        </div>

        <!-- Rain Drops -->
        <div class="rain-container" id="rainContainer"></div>

        <!-- Particles -->
        <div class="particles" id="particles"></div>
    </div>

    <!-- Main Login Container -->
    <main class="login-wrapper">
        <div class="login-card" id="loginCard">
            <!-- Left Side -->
            <div class="login-left">
                <!-- Logo & Branding -->
                <div class="brand-section">
                <div class="logo-icon">
                    <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="20" cy="24" r="8" fill="url(#sunGradient)" />
                        <g class="sun-rays">
                            <line x1="20" y1="12" x2="20" y2="8" stroke="url(#rayGradient)" stroke-width="2.5" stroke-linecap="round"/>
                            <line x1="20" y1="36" x2="20" y2="40" stroke="url(#rayGradient)" stroke-width="2.5" stroke-linecap="round"/>
                            <line x1="8" y1="24" x2="4" y2="24" stroke="url(#rayGradient)" stroke-width="2.5" stroke-linecap="round"/>
                            <line x1="32" y1="24" x2="36" y2="24" stroke="url(#rayGradient)" stroke-width="2.5" stroke-linecap="round"/>
                            <line x1="11.5" y1="15.5" x2="8.7" y2="12.7" stroke="url(#rayGradient)" stroke-width="2.5" stroke-linecap="round"/>
                            <line x1="28.5" y1="32.5" x2="31.3" y2="35.3" stroke="url(#rayGradient)" stroke-width="2.5" stroke-linecap="round"/>
                            <line x1="11.5" y1="32.5" x2="8.7" y2="35.3" stroke="url(#rayGradient)" stroke-width="2.5" stroke-linecap="round"/>
                            <line x1="28.5" y1="15.5" x2="31.3" y2="12.7" stroke="url(#rayGradient)" stroke-width="2.5" stroke-linecap="round"/>
                        </g>
                        <path d="M30 28C30 24.5 32 22 35 22C35 18.5 37 16 40 16C43 16 45 18 45 21C47 21.5 48 23 48 25C48 27.5 46 29 43.5 29H30" fill="url(#cloudGradient)" opacity="0.9"/>
                        <defs>
                            <linearGradient id="sunGradient" x1="12" y1="16" x2="28" y2="32">
                                <stop offset="0%" stop-color="#FFD700"/>
                                <stop offset="100%" stop-color="#FF8C00"/>
                            </linearGradient>
                            <linearGradient id="rayGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" stop-color="#FFD700"/>
                                <stop offset="100%" stop-color="#FFA500"/>
                            </linearGradient>
                            <linearGradient id="cloudGradient" x1="30" y1="16" x2="48" y2="29">
                                <stop offset="0%" stop-color="#E8F0FE"/>
                                <stop offset="100%" stop-color="#C5D5E8"/>
                            </linearGradient>
                        </defs>
                    </svg>
                </div>
                <h1 class="brand-title">Blog Cuaca</h1>
                <p class="brand-subtitle">Masuk ke akun Anda</p>
            </div>
            </div> <!-- End Left Side -->

            <!-- Right Side -->
            <div class="login-right">
            <!-- Alert Messages -->
            <div class="alert alert-error" id="alertError" style="display: none;">
                <svg class="alert-icon" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                </svg>
                <span id="alertErrorText"></span>
            </div>

            <div class="alert alert-success" id="alertSuccess" style="display: none;">
                <svg class="alert-icon" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <span id="alertSuccessText"></span>
            </div>

            <!-- Login Form -->
            <form id="loginForm" class="login-form" novalidate>
                <div class="input-group" id="emailGroup">
                    <label for="email" class="input-label">Email</label>
                    <div class="input-wrapper">
                        <svg class="input-icon" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                        </svg>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="input-field"
                            placeholder="nama@email.com"
                            autocomplete="email"
                            required
                        >
                        <div class="input-focus-ring"></div>
                    </div>
                    <span class="input-error" id="emailError"></span>
                </div>

                <div class="input-group" id="passwordGroup">
                    <label for="password" class="input-label">Kata Sandi</label>
                    <div class="input-wrapper">
                        <svg class="input-icon" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/>
                        </svg>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="input-field"
                            placeholder="Masukkan kata sandi"
                            autocomplete="current-password"
                            required
                        >
                        <button type="button" class="toggle-password" id="togglePassword" aria-label="Tampilkan kata sandi">
                            <svg class="eye-icon eye-open" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
                            </svg>
                            <svg class="eye-icon eye-closed" viewBox="0 0 20 20" fill="currentColor" style="display:none;">
                                <path fill-rule="evenodd" d="M3.707 2.293a1 1 0 00-1.414 1.414l14 14a1 1 0 001.414-1.414l-1.473-1.473A10.014 10.014 0 0019.542 10C18.268 5.943 14.478 3 10 3a9.958 9.958 0 00-4.512 1.074l-1.78-1.781zm4.261 4.26l1.514 1.515a2.003 2.003 0 012.45 2.45l1.514 1.514a4 4 0 00-5.478-5.478z" clip-rule="evenodd"/>
                                <path d="M12.454 16.697L9.75 13.992a4 4 0 01-3.742-3.741L2.335 6.578A9.98 9.98 0 00.458 10c1.274 4.057 5.065 7 9.542 7 .847 0 1.669-.105 2.454-.303z"/>
                            </svg>
                        </button>
                        <div class="input-focus-ring"></div>
                    </div>
                    <span class="input-error" id="passwordError"></span>
                </div>

                <div class="form-options">
                    <label class="checkbox-label" for="rememberMe">
                        <input type="checkbox" id="rememberMe" class="checkbox-input">
                        <span class="checkbox-custom">
                            <svg viewBox="0 0 12 12" fill="none">
                                <path d="M2 6L5 9L10 3" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </span>
                        <span class="checkbox-text">Ingat saya</span>
                    </label>
                </div>

                <button type="submit" class="btn-login" id="btnLogin">
                    <span class="btn-text">Masuk</span>
                    <div class="btn-loader" id="btnLoader">
                        <div class="spinner"></div>
                    </div>
                    <svg class="btn-arrow" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                    </svg>
                </button>
            </form>

            <!-- Divider -->
            <div class="divider">
                <span class="divider-line"></span>
                <span class="divider-text">atau</span>
                <span class="divider-line"></span>
            </div>

            <!-- Register CTA -->
            <div class="register-cta">
                <p>Belum punya akun?</p>
                <a href="#" class="btn-register" id="btnRegister">
                    Daftar Sekarang
                    <svg viewBox="0 0 20 20" fill="currentColor" class="register-arrow">
                        <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                    </svg>
                </a>
            </div>

            <!-- Footer -->
            <div class="card-footer">
                <p>&copy; {{ date('Y') }} Blog Cuaca. Semua hak dilindungi.</p>
            </div>
            </div> <!-- End Right Side -->
        </div>
    </main>

    <script>
        // ===== Animated Rain Drops =====
        function createRain() {
            const container = document.getElementById('rainContainer');
            const dropCount = 40;
            for (let i = 0; i < dropCount; i++) {
                const drop = document.createElement('div');
                drop.classList.add('raindrop');
                drop.style.left = Math.random() * 100 + '%';
                drop.style.animationDuration = (Math.random() * 1 + 0.8) + 's';
                drop.style.animationDelay = Math.random() * 2 + 's';
                drop.style.opacity = Math.random() * 0.3 + 0.1;
                container.appendChild(drop);
            }
        }

        // ===== Floating Particles =====
        function createParticles() {
            const container = document.getElementById('particles');
            const count = 20;
            for (let i = 0; i < count; i++) {
                const particle = document.createElement('div');
                particle.classList.add('particle');
                particle.style.left = Math.random() * 100 + '%';
                particle.style.top = Math.random() * 100 + '%';
                particle.style.width = (Math.random() * 4 + 2) + 'px';
                particle.style.height = particle.style.width;
                particle.style.animationDuration = (Math.random() * 8 + 6) + 's';
                particle.style.animationDelay = Math.random() * 5 + 's';
                container.appendChild(particle);
            }
        }

        // ===== Toggle Password Visibility =====
        const toggleBtn = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        const eyeOpen = toggleBtn.querySelector('.eye-open');
        const eyeClosed = toggleBtn.querySelector('.eye-closed');

        toggleBtn.addEventListener('click', () => {
            const isPassword = passwordInput.type === 'password';
            passwordInput.type = isPassword ? 'text' : 'password';
            eyeOpen.style.display = isPassword ? 'none' : 'block';
            eyeClosed.style.display = isPassword ? 'block' : 'none';
        });

        // ===== Form Validation & Submit =====
        const loginForm = document.getElementById('loginForm');
        const emailInput = document.getElementById('email');
        const emailError = document.getElementById('emailError');
        const passwordError = document.getElementById('passwordError');
        const alertError = document.getElementById('alertError');
        const alertErrorText = document.getElementById('alertErrorText');
        const alertSuccess = document.getElementById('alertSuccess');
        const alertSuccessText = document.getElementById('alertSuccessText');
        const btnLogin = document.getElementById('btnLogin');
        const btnLoader = document.getElementById('btnLoader');

        // Clear errors on input
        emailInput.addEventListener('input', () => {
            document.getElementById('emailGroup').classList.remove('has-error');
            emailError.textContent = '';
        });
        passwordInput.addEventListener('input', () => {
            document.getElementById('passwordGroup').classList.remove('has-error');
            passwordError.textContent = '';
        });

        function showError(group, errorEl, message) {
            document.getElementById(group).classList.add('has-error');
            document.getElementById(errorEl).textContent = message;
        }

        function hideAlerts() {
            alertError.style.display = 'none';
            alertSuccess.style.display = 'none';
        }

        loginForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            hideAlerts();

            let valid = true;
            const email = emailInput.value.trim();
            const password = passwordInput.value;

            // Validate email
            if (!email) {
                showError('emailGroup', 'emailError', 'Email wajib diisi');
                valid = false;
            } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                showError('emailGroup', 'emailError', 'Format email tidak valid');
                valid = false;
            }

            // Validate password
            if (!password) {
                showError('passwordGroup', 'passwordError', 'Kata sandi wajib diisi');
                valid = false;
            }

            if (!valid) return;

            // Show loading
            btnLogin.classList.add('loading');
            btnLogin.disabled = true;

            try {
                const response = await fetch('/api/login', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({ email, password })
                });

                const data = await response.json();

                if (!response.ok) {
                    // Show error
                    const errorMsg = data.message || data.errors?.email?.[0] || 'Email atau kata sandi salah';
                    alertError.style.display = 'flex';
                    alertErrorText.textContent = errorMsg;

                    // Shake animation
                    document.getElementById('loginCard').classList.add('shake');
                    setTimeout(() => {
                        document.getElementById('loginCard').classList.remove('shake');
                    }, 600);
                } else {
                    // Success
                    localStorage.setItem('auth_token', data.access_token);
                    localStorage.setItem('user', JSON.stringify(data.user));

                    alertSuccess.style.display = 'flex';
                    alertSuccessText.textContent = `Selamat datang, ${data.user.name}! Mengalihkan...`;

                    // Success animation on card
                    document.getElementById('loginCard').classList.add('success');

                    setTimeout(() => {
                        window.location.href = `/auth/token/${data.access_token}`;
                    }, 1500);
                }
            } catch (err) {
                alertError.style.display = 'flex';
                alertErrorText.textContent = 'Terjadi kesalahan jaringan. Silakan coba lagi.';
            } finally {
                btnLogin.classList.remove('loading');
                btnLogin.disabled = false;
            }
        });

        // ===== Input Focus Animations =====
        document.querySelectorAll('.input-field').forEach(input => {
            input.addEventListener('focus', () => {
                input.closest('.input-wrapper').classList.add('focused');
            });
            input.addEventListener('blur', () => {
                input.closest('.input-wrapper').classList.remove('focused');
            });
        });

        // ===== Initialize =====
        createRain();
        createParticles();

        // Entrance animation
        window.addEventListener('load', () => {
            document.getElementById('loginCard').classList.add('animate-in');
        });
    </script>
</body>
</html>
