<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title') - Resto App</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/pelanggan/pelanggan.css') }}">
    
    @yield('styles')
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <nav id="sidebar">
            <!-- Brand -->
            <div class="sidebar-brand">
                <div class="brand-icon">
                    <i class="fas fa-utensils"></i>
                </div>
                <div class="brand-text">
                    <h1>HJ Nuridah</h1>
                    <p>Resto Masakan Khas Madura</p>
                </div>
            </div>
            
            <!-- User Info -->
            <div class="user-info">
                <div class="user-avatar">
                    <i class="fas fa-user"></i>
                </div>
                <div class="user-details">
                    <p class="welcome-text">Selamat Datang</p>
                    <p class="user-name" id="customerNameDisplay">Pelanggan</p>
                </div>
            </div>
            
            <!-- Main Navigation - Disederhanakan -->
            <div class="sidebar-nav">
                <a href="{{ route('pelanggan.menu') }}" class="nav-item {{ request()->routeIs('pelanggan.menu') ? 'active' : '' }}">
                    <i class="fas fa-th-large"></i>
                    <span>Menu</span>
                </a>
            </div>
            
            <!-- Category Menu -->
            <div class="sidebar-category">
                <h2>KATEGORI MENU</h2>
                
                <a href="#" class="category-item active" data-category="all">
                    <i class="fas fa-th"></i>
                    <span>Semua</span>
                </a>
                
                <a href="#" class="category-item" data-category="makanan">
                    <i class="fas fa-drumstick-bite"></i>
                    <span>Makanan Utama</span>
                </a>
                
                <a href="#" class="category-item" data-category="burger">
                    <i class="fas fa-hamburger"></i>
                    <span>Burger</span>
                </a>
                
                <a href="#" class="category-item" data-category="ayam">
                    <i class="fas fa-drumstick-bite"></i>
                    <span>Ayam</span>
                </a>
                
                <a href="#" class="category-item" data-category="minuman">
                    <i class="fas fa-glass-whiskey"></i>
                    <span>Minuman</span>
                </a>
                
                <a href="#" class="category-item" data-category="cemilan">
                    <i class="fas fa-cookie"></i>
                    <span>Cemilan</span>
                </a>
            </div>
            
            <!-- Order Summary -->
            <div class="order-summary">
                <h2>
                    <i class="fas fa-shopping-bag"></i>
                    <span>Pesanan Anda</span>
                    <span class="order-badge" id="orderCount">1</span>
                </h2>
                
                <div class="order-items">
                    <div class="order-item">
                        <div class="item-image">
                            <img src="https://images.unsplash.com/photo-1568901346375-23c9450c58cd?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=300&q=80" alt="Burger">
                        </div>
                        <div class="item-details">
                            <h3>Burger Spesial</h3>
                            <div class="item-meta">
                                <span class="quantity">x1</span>
                                <span class="remove-item"><i class="fas fa-times-circle"></i></span>
                            </div>
                        </div>
                        <div class="item-price">Rp 35.000</div>
                    </div>
                </div>
                
                <div class="order-total">
                    <span>Total</span>
                    <span>Rp 35.000</span>
                </div>
                
                <div class="order-actions">
                    <a href="{{ route('pelanggan.cart') }}" class="btn-order">
                        <i class="fas fa-eye"></i>
                        <span>Lihat</span>
                    </a>
                </div>
                    </a>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <div id="content">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn">
                        <i class="fas fa-bars"></i>
                    </button>
                    
                    <!-- Search Input -->
                    <div class="search-container">
                        <div class="search-input-wrapper">
                            <i class="fas fa-search search-icon"></i>
                            <input type="text" class="search-input" placeholder="Cari menu favorit Anda...">
                            <button class="search-clear-btn">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    
                    <div class="ms-auto d-flex align-items-center">
                        <a href="{{ route('pelanggan.cart') }}" class="btn btn-cart me-2">
                            <i class="fas fa-shopping-cart"></i>
                            <span class="badge" id="navCartCount">0</span>
                        </a>
                    </div>
                </div>
            </nav>

            <div class="content-body">
                @yield('content')
            </div>
            
            <footer class="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <p>&copy; 2023 Resto App. All rights reserved.</p>
                        </div>
                        <div class="col-md-6 text-end">
                            <div class="social-links">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- Custom JS -->
    <script src="{{ asset('js/pelanggan/pelanggan.js') }}"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get customer name from session storage
            const customerName = sessionStorage.getItem('customerName');
            if (customerName) {
                document.getElementById('customerNameDisplay').textContent = customerName;
            }
            
            // Toggle sidebar
            document.getElementById('sidebarCollapse').addEventListener('click', function() {
                document.getElementById('sidebar').classList.toggle('active');
                document.getElementById('content').classList.toggle('active');
            });
            
            // Category filtering
            const categoryItems = document.querySelectorAll('.category-item');
            const menuCategories = document.querySelectorAll('.menu-category');
            
            categoryItems.forEach(item => {
                item.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    // Remove active class from all category items
                    categoryItems.forEach(cat => cat.classList.remove('active'));
                    
                    // Add active class to clicked item
                    this.classList.add('active');
                    
                    const category = this.dataset.category;
                    
                    // Show/hide categories based on selection
                    if (category === 'all') {
                        menuCategories.forEach(cat => cat.style.display = 'block');
                    } else {
                        menuCategories.forEach(cat => {
                            if (cat.dataset.category === category) {
                                cat.style.display = 'block';
                            } else {
                                cat.style.display = 'none';
                            }
                        });
                    }
                });
            });
            
            // Search input clear button
            const searchInput = document.querySelector('.search-input');
            const searchClearBtn = document.querySelector('.search-clear-btn');
            
            if (searchInput && searchClearBtn) {
                searchInput.addEventListener('input', function() {
                    if (this.value.length > 0) {
                        searchClearBtn.style.display = 'block';
                    } else {
                        searchClearBtn.style.display = 'none';
                    }
                });
                
                searchClearBtn.addEventListener('click', function() {
                    searchInput.value = '';
                    searchInput.focus();
                    this.style.display = 'none';
                });
            }
            
            // Update order count from cart
            function updateOrderSummary() {
                const cart = JSON.parse(localStorage.getItem('restoCart')) || [];
                const orderCountElement = document.getElementById('orderCount');
                const orderItemsContainer = document.querySelector('.order-items');
                const orderTotalElement = document.querySelector('.order-total span:last-child');
                
                if (orderCountElement) {
                    orderCountElement.textContent = cart.length;
                }
                
                if (orderItemsContainer && cart.length > 0) {
                    // Clear existing items
                    orderItemsContainer.innerHTML = '';
                    
                    // Calculate total
                    let total = 0;
                    
                    // Show up to 3 items
                    const itemsToShow = cart.slice(0, 3);
                    
                    itemsToShow.forEach(item => {
                        total += item.price * item.quantity;
                        
                        const itemElement = document.createElement('div');
                        itemElement.className = 'order-item';
                        itemElement.innerHTML = `
                            <div class="item-image">
                                <img src="${item.image}" alt="${item.name}">
                            </div>
                            <div class="item-details">
                                <h3>${item.name}</h3>
                                <div class="item-meta">
                                    <span class="quantity">x${item.quantity}</span>
                                    <span class="remove-item" data-id="${item.id}"><i class="fas fa-times-circle"></i></span>
                                </div>
                            </div>
                            <div class="item-price">Rp ${item.price.toLocaleString('id-ID')}</div>
                        `;
                        
                        orderItemsContainer.appendChild(itemElement);
                    });
                    
                    // Add more indicator if there are more items
                    if (cart.length > 3) {
                        const moreElement = document.createElement('div');
                        moreElement.className = 'more-items';
                        moreElement.textContent = `+${cart.length - 3} item lainnya`;
                        orderItemsContainer.appendChild(moreElement);
                    }
                    
                    // Update total
                    if (orderTotalElement) {
                        orderTotalElement.textContent = `Rp ${total.toLocaleString('id-ID')}`;
                    }
                    
                    // Add event listeners to remove buttons
                    document.querySelectorAll('.remove-item').forEach(btn => {
                        btn.addEventListener('click', function() {
                            const itemId = this.dataset.id;
                            // Remove from cart
                            const updatedCart = cart.filter(item => item.id !== itemId);
                            localStorage.setItem('restoCart', JSON.stringify(updatedCart));
                            // Update UI
                            updateOrderSummary();
                        });
                    });
                } else if (orderItemsContainer) {
                    // Empty cart
                    orderItemsContainer.innerHTML = '<div class="empty-cart">Keranjang Anda kosong</div>';
                    if (orderTotalElement) {
                        orderTotalElement.textContent = 'Rp 0';
                    }
                }
            }
            
            // Initial update
            updateOrderSummary();
            
            // Listen for storage changes (when cart is updated)
            window.addEventListener('storage', function(e) {
                if (e.key === 'restoCart') {
                    updateOrderSummary();
                }
            });
            
            // Custom event for cart updates
            document.addEventListener('cartUpdated', function() {
                updateOrderSummary();
            });
        });
    </script>
    
    @yield('scripts')
</body>
</html>
