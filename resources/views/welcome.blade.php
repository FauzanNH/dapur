<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Resto App - Selamat Datang</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
        
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        
        <!-- Animate.css -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
        
        <!-- CSS -->
        <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    </head>
    <body>
        <div class="welcome-container">
            <div class="welcome-content">
                <div class="welcome-left animate__animated animate__fadeInLeft">
                    <div class="welcome-logo">
                        <svg viewBox="0 0 50 50" width="80" height="80">
                            <circle cx="25" cy="25" r="20" fill="#e51636" />
                            <text x="25" y="30" font-family="Arial" font-size="12" font-weight="bold" text-anchor="middle" fill="white">RESTO</text>
                        </svg>
                    </div>
                    
                    <h1 class="welcome-title">KASIR VIRTUAL</h1>
                    <p class="welcome-subtitle">Nikmati pengalaman kuliner terbaik dengan menu menu spesial kami dan kemudahan dalam pemesanan</p>
                    
                    <div class="features">
                        <div class="feature-item">
                            <i class="fas fa-utensils"></i>
                            <span>Menu Lezat</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-truck"></i>
                            <span>Pengantaran Cepat</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-tag"></i>
                            <span>Promo Menarik</span>
                        </div>
                    </div>
                </div>
                
                <div class="welcome-right animate__animated animate__fadeInRight">
                    <div class="welcome-card">
                        <h2>Mulai Pemesanan</h2>
                        <p>Silakan masukkan nama Anda untuk melanjutkan</p>
                        
                        <form id="customerForm" action="{{ route('process.customer') }}" method="POST" class="customer-form">
                            @csrf
                            <div class="form-group">
                                <div class="input-icon">
                                    <i class="fas fa-user"></i>
                                    <input type="text" id="customerName" name="customer_name" class="form-control" placeholder="Nama Anda" required>
                                </div>
                            </div>
                            
                            <div id="errorMessage" class="error-message"></div>
                            
                            <button type="submit" class="btn-primary">
                                <span>Mulai Pesan</span>
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </form>
                        
                        <div class="divider">
                            <span>atau</span>
                        </div>
                        
                        <div class="qr-section">
                            <p>Scan QR untuk pesan via smartphone</p>
                            <div class="qr-code">
                                <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=https://resto-app.com" alt="QR Code">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        
        <!-- JavaScript -->
        <script src="{{ asset('js/welcome.js') }}"></script>
    </body>
</html>
