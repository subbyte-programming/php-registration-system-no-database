<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration | Subbyte Programming</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #6366F1;
            --primary-light: #818CF8;
            --primary-dark: #4F46E5;
            --secondary: #10B981;
            --accent: #F59E0B;
            --danger: #EF4444;
            --light: #F8FAFC;
            --dark: #1E293B;
            --gray: #64748B;
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
            --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            --gradient: linear-gradient(135deg, #6366F1 0%, #8B5CF6 50%, #EC4899 100%);
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #F1F5F9 0%, #E2E8F0 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            color: var(--dark);
            position: relative;
            overflow-x: hidden;
        }

        /* Animated Background */
        .animated-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
        }

        .particle {
            position: absolute;
            border-radius: 50%;
            background: var(--gradient);
            opacity: 0.1;
            animation: float 20s infinite linear;
        }

        .particle:nth-child(1) { width: 300px; height: 300px; top: -150px; right: -150px; }
        .particle:nth-child(2) { width: 200px; height: 200px; bottom: -100px; left: -100px; animation-delay: -5s; }
        .particle:nth-child(3) { width: 150px; height: 150px; top: 50%; left: -75px; animation-delay: -10s; }

        /* Main Container */
        .container {
            width: 100%;
            max-width: 1200px;
            display: grid;
            grid-template-columns: 1.2fr 0.8fr;
            gap: 30px;
            animation: fadeIn 1s ease-out;
        }

        /* Left Panel - Hero Section */
        .hero-panel {
            background: white;
            border-radius: 24px;
            padding: 50px;
            box-shadow: var(--shadow-xl);
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .hero-panel::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: var(--gradient);
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 40px;
        }

        .logo-icon {
            width: 60px;
            height: 60px;
            background: var(--gradient);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 28px;
            box-shadow: 0 10px 25px rgba(99, 102, 241, 0.3);
        }

        .logo-text {
            font-size: 28px;
            font-weight: 700;
            background: var(--gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 20px;
            background: linear-gradient(135deg, var(--dark) 0%, var(--primary) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-subtitle {
            font-size: 1.2rem;
            color: var(--gray);
            margin-bottom: 40px;
            line-height: 1.6;
        }

        /* Features Grid */
        .features-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 25px;
            margin: 40px 0;
        }

        .feature-card {
            background: var(--light);
            padding: 25px;
            border-radius: 16px;
            transition: var(--transition);
            border: 1px solid #E2E8F0;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
            border-color: var(--primary-light);
        }

        .feature-icon {
            width: 50px;
            height: 50px;
            background: rgba(99, 102, 241, 0.1);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
            color: var(--primary);
            font-size: 20px;
        }

        .feature-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 8px;
            color: var(--dark);
        }

        .feature-desc {
            font-size: 0.9rem;
            color: var(--gray);
            line-height: 1.5;
        }

        /* Right Panel - Form */
        .form-panel {
            background: white;
            border-radius: 24px;
            padding: 40px;
            box-shadow: var(--shadow-xl);
            position: relative;
        }

        .form-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .form-title {
            font-size: 2.2rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 10px;
        }

        .form-subtitle {
            color: var(--gray);
            font-size: 1rem;
        }

        /* Form Elements */
        .form-group {
            margin-bottom: 25px;
        }

        .input-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--dark);
            font-size: 0.95rem;
        }

        .input-group {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray);
            font-size: 18px;
            z-index: 2;
        }

        .form-input {
            width: 100%;
            padding: 16px 16px 16px 48px;
            border: 2px solid #E2E8F0;
            border-radius: 12px;
            font-size: 16px;
            font-family: 'Inter', sans-serif;
            transition: var(--transition);
            background: white;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
        }

        .form-input:focus + .input-icon {
            color: var(--primary);
        }

        select.form-input {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%2364748b'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 16px center;
            background-size: 20px;
            padding-right: 50px;
        }

        /* Submit Button */
        .submit-btn {
            width: 100%;
            padding: 18px;
            background: var(--gradient);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-top: 10px;
            position: relative;
            overflow: hidden;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 30px rgba(99, 102, 241, 0.3);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        .ripple {
            position: absolute;
            background: rgba(255, 255, 255, 0.4);
            border-radius: 50%;
            transform: scale(0);
            animation: ripple 0.6s linear;
        }

        /* Messages */
        .alert {
            padding: 16px;
            border-radius: 12px;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 12px;
            animation: slideIn 0.5s ease-out;
        }

        .alert-success {
            background: rgba(16, 185, 129, 0.1);
            border: 1px solid rgba(16, 185, 129, 0.2);
            color: #065F46;
        }

        .alert-error {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.2);
            color: #991B1B;
        }

        .alert-icon {
            font-size: 20px;
        }

        /* Progress Steps */
        .progress-steps {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 40px;
            position: relative;
        }

        .progress-steps::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 2px;
            background: #E2E8F0;
            transform: translateY(-50%);
            z-index: 1;
        }

        .step {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: white;
            border: 2px solid #E2E8F0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            color: var(--gray);
            position: relative;
            z-index: 2;
            transition: var(--transition);
        }

        .step.active {
            background: var(--primary);
            border-color: var(--primary);
            color: white;
            transform: scale(1.1);
            box-shadow: 0 5px 15px rgba(99, 102, 241, 0.3);
        }

        .step.completed {
            background: var(--secondary);
            border-color: var(--secondary);
        }

        /* YouTube Badge */
        .youtube-badge {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: linear-gradient(135deg, #FF0000 0%, #CC0000 100%);
            color: white;
            padding: 12px 24px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            margin-top: 30px;
            transition: var(--transition);
            box-shadow: 0 10px 20px rgba(255, 0, 0, 0.2);
        }

        .youtube-badge:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(255, 0, 0, 0.3);
        }

        /* Footer */
        .footer {
            text-align: center;
            margin-top: 40px;
            padding-top: 30px;
            border-top: 1px solid #E2E8F0;
            color: var(--gray);
            font-size: 0.9rem;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 15px;
        }

        .social-link {
            width: 40px;
            height: 40px;
            background: var(--light);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gray);
            text-decoration: none;
            transition: var(--transition);
        }

        .social-link:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-3px);
        }

        /* Animations */
        @keyframes float {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            33% { transform: translate(30px, -30px) rotate(120deg); }
            66% { transform: translate(-20px, 20px) rotate(240deg); }
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes ripple {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .container {
                grid-template-columns: 1fr;
                max-width: 700px;
            }
            
            .hero-title {
                font-size: 2.8rem;
            }
        }

        @media (max-width: 768px) {
            .features-grid {
                grid-template-columns: 1fr;
            }
            
            .hero-title {
                font-size: 2.2rem;
            }
            
            .form-title {
                font-size: 1.8rem;
            }
            
            .hero-panel, .form-panel {
                padding: 30px;
            }
        }

        @media (max-width: 480px) {
            .hero-panel, .form-panel {
                padding: 25px;
            }
            
            .hero-title {
                font-size: 1.8rem;
            }
            
            .form-title {
                font-size: 1.5rem;
            }
            
            .progress-steps {
                gap: 5px;
            }
            
            .step {
                width: 30px;
                height: 30px;
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
    <!-- Animated Background -->
    <div class="animated-bg">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
    </div>

    <div class="container">
        <!-- Left Panel - Hero Section -->
        <div class="hero-panel">
            <div class="logo-container">
                <div class="logo-icon">
                    <i class="fas fa-code"></i>
                </div>
                <div class="logo-text">Subbyte</div>
            </div>

            <h1 class="hero-title">Start Your Programming Journey Today</h1>
            <p class="hero-subtitle">
                Join thousands of students learning from Subbyte Programming & Learning Hub. 
                Master in-demand skills with our comprehensive courses and expert guidance.
            </p>

            <!-- Features Grid -->
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-video"></i>
                    </div>
                    <h3 class="feature-title">Video Tutorials</h3>
                    <p class="feature-desc">High-quality tutorials with practical examples</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-hands-helping"></i>
                    </div>
                    <h3 class="feature-title">Live Support</h3>
                    <p class="feature-desc">24/7 community support and mentorship</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-project-diagram"></i>
                    </div>
                    <h3 class="feature-title">Real Projects</h3>
                    <p class="feature-desc">Build portfolio-worthy projects</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-certificate"></i>
                    </div>
                    <h3 class="feature-title">Certification</h3>
                    <p class="feature-desc">Earn industry-recognized certificates</p>
                </div>
            </div>

            <a href="https://youtube.com/@SubbyteProgramming" target="_blank" class="youtube-badge">
                <i class="fab fa-youtube"></i>
                Subscribe on YouTube
            </a>
        </div>

        <!-- Right Panel - Registration Form -->
        <div class="form-panel">
            <!-- Progress Steps -->
            <div class="progress-steps">
                <div class="step active">1</div>
                <div class="step">2</div>
                <div class="step">3</div>
                <div class="step">4</div>
            </div>

            <!-- Messages -->
            <?php
            if(isset($_GET['success']) && $_GET['success'] == '1') {
                echo '<div class="alert alert-success">
                        <i class="fas fa-check-circle alert-icon"></i>
                        <div>
                            <strong>Registration Successful!</strong><br>
                            Welcome to Subbyte Programming. Check your email for confirmation.
                        </div>
                      </div>';
            }
            
            if(isset($_GET['error'])) {
                echo '<div class="alert alert-error">
                        <i class="fas fa-exclamation-circle alert-icon"></i>
                        <div>
                            <strong>Registration Error</strong><br>
                            ' . htmlspecialchars($_GET['error']) . '
                        </div>
                      </div>';
            }
            ?>

            <div class="form-header">
                <h2 class="form-title">Create Account</h2>
                <p class="form-subtitle">Join our community of developers</p>
            </div>

            <form action="process.php" method="POST" id="registrationForm">
                <div class="form-group">
                    <label class="input-label">Full Name</label>
                    <div class="input-group">
                        <i class="fas fa-user input-icon"></i>
                        <input type="text" name="name" class="form-input" placeholder="Subbyte" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="input-label">Email Address</label>
                    <div class="input-group">
                        <i class="fas fa-envelope input-icon"></i>
                        <input type="email" name="email" class="form-input" placeholder="subbyte@example.com" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="input-label">Phone Number</label>
                    <div class="input-group">
                        <i class="fas fa-phone input-icon"></i>
                        <input type="tel" name="phone" class="form-input" placeholder="+92 1234567899">
                    </div>
                </div>

                <div class="form-group">
                    <label class="input-label">Select Course</label>
                    <div class="input-group">
                        <i class="fas fa-book input-icon"></i>
                        <select name="course" class="form-input" required>
                            <option value="">Choose a course</option>
                            <option value="Full Stack Web Development">Full Stack Web Development</option>
                            <option value="Python & Django">Python & Django</option>
                            <option value="React & Node.js">React & Node.js</option>
                            <option value="Mobile App Development">Mobile App Development</option>
                            <option value="Data Science">Data Science</option>
                            <option value="Cyber Security">Cyber Security</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="submit-btn" id="submitBtn">
                    <i class="fas fa-user-plus"></i>
                    Create Account
                </button>
            </form>

            <div class="footer">
                <p>By registering, you agree to our Terms & Privacy Policy</p>
                <div class="social-links">
                    <a href="#" class="social-link">
                        <i class="fab fa-youtube"></i>
                    </a>
                    <a href="#" class="social-link">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="social-link">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    <a href="#" class="social-link">
                        <i class="fab fa-twitter"></i>
                    </a>
                </div>
                <p style="margin-top: 15px;">© 2026 Subbyte Programming. All rights reserved.</p>
            </div>
        </div>
    </div>

    <script>
        // Ripple Effect for Button
        document.getElementById('submitBtn').addEventListener('click', function(e) {
            const btn = e.currentTarget;
            const ripple = document.createElement('span');
            const rect = btn.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;
            
            ripple.style.width = ripple.style.height = size + 'px';
            ripple.style.left = x + 'px';
            ripple.style.top = y + 'px';
            ripple.classList.add('ripple');
            
            btn.appendChild(ripple);
            
            setTimeout(() => {
                ripple.remove();
            }, 600);
        });

        // Form Validation
        document.getElementById('registrationForm').addEventListener('submit', function(e) {
            const form = e.target;
            let isValid = true;
            
            // Name validation
            const name = form.querySelector('input[name="name"]');
            if(name.value.trim().length < 2) {
                showError(name, 'Please enter a valid name');
                isValid = false;
            } else {
                clearError(name);
            }
            
            // Email validation
            const email = form.querySelector('input[name="email"]');
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if(!emailRegex.test(email.value)) {
                showError(email, 'Please enter a valid email address');
                isValid = false;
            } else {
                clearError(email);
            }
            
            if(!isValid) {
                e.preventDefault();
            }
        });

        function showError(input, message) {
            const formGroup = input.closest('.form-group');
            input.style.borderColor = 'var(--danger)';
            
            let errorDiv = formGroup.querySelector('.error-message');
            if(!errorDiv) {
                errorDiv = document.createElement('div');
                errorDiv.className = 'error-message';
                errorDiv.style.color = 'var(--danger)';
                errorDiv.style.fontSize = '0.85rem';
                errorDiv.style.marginTop = '5px';
                formGroup.appendChild(errorDiv);
            }
            errorDiv.textContent = message;
        }

        function clearError(input) {
            const formGroup = input.closest('.form-group');
            input.style.borderColor = '';
            
            const errorDiv = formGroup.querySelector('.error-message');
            if(errorDiv) {
                errorDiv.remove();
            }
        }

        // Animate form elements on load
        document.addEventListener('DOMContentLoaded', function() {
            const formGroups = document.querySelectorAll('.form-group');
            formGroups.forEach((group, index) => {
                group.style.opacity = '0';
                group.style.transform = 'translateY(20px)';
                
                setTimeout(() => {
                    group.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                    group.style.opacity = '1';
                    group.style.transform = 'translateY(0)';
                }, index * 100);
            });

            // Animate feature cards on hover
            const featureCards = document.querySelectorAll('.feature-card');
            featureCards.forEach(card => {
                card.addEventListener('mouseenter', () => {
                    card.style.transform = 'translateY(-8px)';
                });
                card.addEventListener('mouseleave', () => {
                    card.style.transform = 'translateY(0)';
                });
            });
        });

        // Pulse animation for YouTube badge
        const youtubeBadge = document.querySelector('.youtube-badge');
        setInterval(() => {
            youtubeBadge.style.animation = 'pulse 1s ease-in-out';
            setTimeout(() => {
                youtubeBadge.style.animation = '';
            }, 1000);
        }, 3000);
    </script>
</body>
</html>