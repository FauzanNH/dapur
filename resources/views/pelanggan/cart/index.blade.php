@extends('pelanggan-template')

@section('title', 'Keranjang Belanja')

@section('content')
    <div class="container-fluid">
        <!-- Cart Header -->
        <div class="cart-header animate__animated animate__fadeInDown">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="d-flex align-items-center">
                        <div class="cart-icon-wrapper">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <div class="cart-title-section">
                            <h1 class="cart-title">Keranjang Belanja</h1>
                            <p class="cart-subtitle">Periksa pesanan Anda sebelum checkout</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-end">
                    <a href="{{ route('pelanggan.menu') }}" class="btn btn-continue-shopping">
                        <i class="fas fa-arrow-left me-2"></i>
                        Lanjut Belanja
                    </a>
                </div>
            </div>
        </div>

        <!-- Main Cart Content -->
        <div class="cart-main-content">
            <div class="row g-4">
                <!-- Cart Items Section -->
                <div class="col-lg-8">
                    <div class="cart-items-section animate__animated animate__fadeInLeft">
                        <div class="section-header">
                            <h3><i class="fas fa-list-ul me-2"></i>Item Pesanan</h3>
                            <div class="items-count">
                                <span id="itemsCountBadge">0</span> item
                            </div>
                        </div>
                        
                        <div class="cart-items-container">
                            <!-- Cart items will be loaded dynamically -->
                            <div class="cart-loading text-center py-5">
                                <div class="loading-spinner">
                                    <div class="spinner-border text-primary" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                                <p class="loading-text mt-3">Memuat keranjang belanja...</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Order Summary Section -->
                <div class="col-lg-4">
                    <div class="order-summary-section animate__animated animate__fadeInRight">
                        <div class="summary-card">
                            <div class="summary-header">
                                <h3><i class="fas fa-receipt me-2"></i>Ringkasan Pesanan</h3>
                            </div>
                            
                            <div class="summary-body">
                                <div class="summary-row">
                                    <span>Subtotal</span>
                                    <span id="cartSubtotal" class="amount">Rp 0</span>
                                </div>
                                <div class="summary-row">
                                    <span>Biaya Layanan</span>
                                    <span class="amount">Rp 2.500</span>
                                </div>
                                <div class="summary-row">
                                    <span>Pajak (10%)</span>
                                    <span id="cartTax" class="amount">Rp 0</span>
                                </div>
                                
                                <div class="summary-divider"></div>
                                
                                <div class="summary-total">
                                    <span>Total Pembayaran</span>
                                    <span id="cartTotal" class="total-amount">Rp 0</span>
                                </div>
                                
                                <div class="promo-section">
                                    <div class="promo-input-group">
                                        <input type="text" class="form-control" placeholder="Kode promo" id="promoCode">
                                        <button class="btn btn-promo" type="button">
                                            <i class="fas fa-tag"></i>
                                        </button>
                                    </div>
                                </div>
                                
                                <div class="checkout-actions">
                                    <button class="btn btn-checkout w-100" id="checkoutBtn">
                                        <i class="fas fa-credit-card me-2"></i>
                                        Lanjut ke Pembayaran
                                    </button>
                                    <div class="payment-methods">
                                        <small class="text-muted">
                                            <i class="fas fa-shield-alt me-1"></i>
                                            Pembayaran aman dengan berbagai metode
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Recommended Items -->
                        <div class="recommended-section mt-4">
                            <h4><i class="fas fa-star me-2"></i>Rekomendasi untuk Anda</h4>
                            <div class="recommended-items">
                                <!-- Will be populated dynamically -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get cart from localStorage
        const cart = JSON.parse(localStorage.getItem('restoCart')) || [];
        const cartItemsContainer = document.querySelector('.cart-items-container');
        const itemsCountBadge = document.getElementById('itemsCountBadge');
        
        // Update items count
        if (itemsCountBadge) {
            itemsCountBadge.textContent = cart.length;
        }
        
        // Display cart items or empty message
        if (cart.length === 0) {
            showEmptyCart();
        } else {
            displayCartItems(cart);
            updateOrderSummary(cart);
        }
        
        function showEmptyCart() {
            cartItemsContainer.innerHTML = `
                <div class="empty-cart-state animate__animated animate__fadeIn">
                    <div class="empty-cart-icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <h3>Keranjang Anda Kosong</h3>
                    <p>Sepertinya Anda belum menambahkan item apapun ke keranjang belanja.</p>
                    <a href="{{ route('pelanggan.menu') }}" class="btn btn-start-shopping">
                        <i class="fas fa-utensils me-2"></i>
                        Mulai Belanja Sekarang
                    </a>
                </div>
            `;
        }
        
        function displayCartItems(cart) {
            let cartHTML = '';
            
            cart.forEach((item, index) => {
                cartHTML += `
                    <div class="cart-item-card animate__animated animate__fadeInUp" data-id="${item.id}" style="animation-delay: ${index * 0.1}s">
                        <div class="item-image-section">
                            <img src="${item.image}" alt="${item.name}" class="item-image">
                            <div class="item-badge">
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                        
                        <div class="item-details-section">
                            <div class="item-info">
                                <h4 class="item-name">${item.name}</h4>
                                <p class="item-description">Menu spesial dengan cita rasa autentik</p>
                                <div class="item-price-section">
                                    <span class="item-price">Rp ${parseInt(item.price).toLocaleString('id-ID')}</span>
                                    <span class="price-per-item">per item</span>
                                </div>
                            </div>
                            
                            <div class="item-actions">
                                <div class="quantity-controls">
                                    <button class="quantity-btn decrease-quantity" data-id="${item.id}">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <span class="quantity-display">${item.quantity}</span>
                                    <button class="quantity-btn increase-quantity" data-id="${item.id}">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                                
                                <div class="item-total-price">
                                    <span class="total-label">Total:</span>
                                    <span class="total-amount">Rp ${(item.price * item.quantity).toLocaleString('id-ID')}</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="item-remove-section">
                            <button class="btn-remove-item" data-id="${item.id}" title="Hapus item">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </div>
                `;
            });
            
            cartItemsContainer.innerHTML = cartHTML;
            
            // Add event listeners
            addEventListeners();
        }
        
        function addEventListeners() {
            // Quantity controls
            document.querySelectorAll('.decrease-quantity').forEach(button => {
                button.addEventListener('click', function() {
                    const itemId = this.dataset.id;
                    updateQuantity(itemId, -1);
                });
            });
            
            document.querySelectorAll('.increase-quantity').forEach(button => {
                button.addEventListener('click', function() {
                    const itemId = this.dataset.id;
                    updateQuantity(itemId, 1);
                });
            });
            
            // Remove buttons
            document.querySelectorAll('.btn-remove-item').forEach(button => {
                button.addEventListener('click', function() {
                    const itemId = this.dataset.id;
                    removeFromCart(itemId);
                });
            });
        }
        
        function updateQuantity(itemId, change) {
            let cart = JSON.parse(localStorage.getItem('restoCart')) || [];
            const itemIndex = cart.findIndex(item => item.id == itemId);
            
            if (itemIndex !== -1) {
                cart[itemIndex].quantity += change;
                
                if (cart[itemIndex].quantity <= 0) {
                    cart.splice(itemIndex, 1);
                }
                
                localStorage.setItem('restoCart', JSON.stringify(cart));
                
                // Refresh display
                if (cart.length === 0) {
                    showEmptyCart();
                } else {
                    displayCartItems(cart);
                    updateOrderSummary(cart);
                }
                
                // Update count badge
                if (itemsCountBadge) {
                    itemsCountBadge.textContent = cart.length;
                }
                
                // Trigger custom event
                document.dispatchEvent(new Event('cartUpdated'));
            }
        }
        
        function removeFromCart(itemId) {
            let cart = JSON.parse(localStorage.getItem('restoCart')) || [];
            cart = cart.filter(item => item.id != itemId);
            localStorage.setItem('restoCart', JSON.stringify(cart));
            
            // Refresh display
            if (cart.length === 0) {
                showEmptyCart();
            } else {
                displayCartItems(cart);
                updateOrderSummary(cart);
            }
            
            // Update count badge
            if (itemsCountBadge) {
                itemsCountBadge.textContent = cart.length;
            }
            
            // Trigger custom event
            document.dispatchEvent(new Event('cartUpdated'));
        }
        
        function updateOrderSummary(cart) {
            const subtotal = cart.reduce((total, item) => total + (item.price * item.quantity), 0);
            const serviceFee = 2500;
            const tax = Math.round(subtotal * 0.1);
            const total = subtotal + serviceFee + tax;
            
            document.getElementById('cartSubtotal').textContent = `Rp ${subtotal.toLocaleString('id-ID')}`;
            document.getElementById('cartTax').textContent = `Rp ${tax.toLocaleString('id-ID')}`;
            document.getElementById('cartTotal').textContent = `Rp ${total.toLocaleString('id-ID')}`;
        }
        
        // Checkout button
        document.getElementById('checkoutBtn').addEventListener('click', function() {
            const cart = JSON.parse(localStorage.getItem('restoCart')) || [];
            if (cart.length > 0) {
                window.location.href = "{{ route('pelanggan.checkout') }}";
            } else {
                alert('Keranjang Anda kosong!');
            }
        });
        
        // Promo code functionality
        document.querySelector('.btn-promo').addEventListener('click', function() {
            const promoCode = document.getElementById('promoCode').value;
            if (promoCode) {
                // Simple promo validation (you can expand this)
                if (promoCode.toLowerCase() === 'diskon10') {
                    alert('Kode promo berhasil diterapkan! Diskon 10%');
                } else {
                    alert('Kode promo tidak valid');
                }
            }
        });
    });
</script>
@endsection
