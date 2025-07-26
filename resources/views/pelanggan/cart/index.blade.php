@extends('pelanggan-template')

@section('title', 'Keranjang Belanja')

@section('styles')
<style>
    /* Modern Cart Styles - McDonald's Inspired */
    .cart-page {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        min-height: calc(100vh - 200px);
        padding: 20px 0;
    }

    .cart-header {
        background: white;
        border-radius: 20px;
        padding: 25px;
        margin-bottom: 25px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
        position: relative;
        overflow: hidden;
    }

    .cart-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
    }

    .cart-title {
        font-size: 2rem;
        font-weight: 800;
        color: var(--dark-color);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .cart-title i {
        color: var(--primary-color);
        font-size: 1.8rem;
    }

    .cart-subtitle {
        color: #666;
        margin: 8px 0 0;
        font-size: 1rem;
    }

    .cart-main {
        display: grid;
        grid-template-columns: 1fr 380px;
        gap: 25px;
    }

    .cart-items-section {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
    }

    .cart-items-header {
        background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        padding: 20px 25px;
        border-bottom: 2px solid #f0f0f0;
    }

    .cart-items-header h3 {
        margin: 0;
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--dark-color);
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .items-count {
        background: var(--primary-color);
        color: white;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.9rem;
        font-weight: 600;
    }

    .cart-items-body {
        padding: 0;
        max-height: 600px;
        overflow-y: auto;
    }

    .cart-item {
        padding: 20px 25px;
        border-bottom: 1px solid #f0f0f0;
        transition: all 0.3s ease;
        position: relative;
    }

    .cart-item:hover {
        background: #fafafa;
        transform: translateX(5px);
    }

    .cart-item:last-child {
        border-bottom: none;
    }

    .item-content {
        display: grid;
        grid-template-columns: 80px 1fr auto;
        gap: 20px;
        align-items: center;
    }

    .item-image {
        width: 80px;
        height: 80px;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        position: relative;
    }

    .item-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s;
    }

    .cart-item:hover .item-image img {
        transform: scale(1.05);
    }

    .item-details {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .item-name {
        font-size: 1.2rem;
        font-weight: 700;
        color: var(--dark-color);
        margin: 0;
        line-height: 1.3;
    }

    .item-price {
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--primary-color);
        margin: 0;
    }

    .item-description {
        font-size: 0.9rem;
        color: #666;
        line-height: 1.4;
    }

    .item-actions {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        gap: 15px;
    }

    .quantity-controls {
        display: flex;
        align-items: center;
        background: #f8f9fa;
        border-radius: 25px;
        padding: 5px;
        border: 2px solid #e9ecef;
        transition: all 0.3s;
    }

    .quantity-controls:hover {
        border-color: var(--secondary-color);
        box-shadow: 0 0 0 3px rgba(255, 188, 13, 0.1);
    }

    .quantity-btn {
        width: 35px;
        height: 35px;
        border: none;
        background: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 1.1rem;
        cursor: pointer;
        transition: all 0.3s;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .quantity-btn:hover {
        background: var(--secondary-color);
        color: var(--dark-color);
        transform: scale(1.1);
    }

    .quantity-btn:disabled {
        opacity: 0.5;
        cursor: not-allowed;
        transform: none;
    }

    .quantity-display {
        min-width: 50px;
        text-align: center;
        font-weight: 700;
        font-size: 1.1rem;
        color: var(--dark-color);
        padding: 0 10px;
    }

    .item-total {
        font-size: 1.3rem;
        font-weight: 800;
        color: var(--primary-color);
    }

    .remove-btn {
        background: none;
        border: none;
        color: #dc3545;
        font-size: 1.2rem;
        cursor: pointer;
        padding: 8px;
        border-radius: 50%;
        transition: all 0.3s;
        width: 35px;
        height: 35px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .remove-btn:hover {
        background: #dc3545;
        color: white;
        transform: scale(1.1);
    }

    .cart-summary {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
        height: fit-content;
        position: sticky;
        top: 20px;
    }

    .summary-header {
        background: linear-gradient(135deg, var(--primary-color), #d32f2f);
        color: white;
        padding: 20px 25px;
        text-align: center;
    }

    .summary-header h3 {
        margin: 0;
        font-size: 1.3rem;
        font-weight: 700;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .summary-body {
        padding: 25px;
    }

    .summary-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px 0;
        border-bottom: 1px solid #f0f0f0;
        font-size: 1rem;
    }

    .summary-row:last-child {
        border-bottom: none;
        padding-top: 20px;
        margin-top: 10px;
        border-top: 2px solid #f0f0f0;
    }

    .summary-row.total {
        font-size: 1.3rem;
        font-weight: 800;
        color: var(--primary-color);
    }

    .checkout-btn {
        width: 100%;
        background: linear-gradient(135deg, var(--secondary-color), #ffa000);
        color: var(--dark-color);
        border: none;
        padding: 18px;
        border-radius: 15px;
        font-size: 1.1rem;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s;
        margin-top: 20px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        box-shadow: 0 8px 25px rgba(255, 188, 13, 0.3);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        text-decoration: none;
    }

    .checkout-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 30px rgba(255, 188, 13, 0.4);
        color: var(--dark-color);
    }

    .empty-cart {
        text-align: center;
        padding: 60px 25px;
        color: #666;
    }

    .empty-cart-icon {
        font-size: 4rem;
        color: #ddd;
        margin-bottom: 20px;
    }

    .empty-cart h3 {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--dark-color);
        margin-bottom: 15px;
    }

    .empty-cart p {
        font-size: 1rem;
        margin-bottom: 25px;
        line-height: 1.6;
    }

    .continue-shopping {
        background: var(--secondary-color);
        color: var(--dark-color);
        border: none;
        padding: 15px 30px;
        border-radius: 25px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 10px;
    }

    .continue-shopping:hover {
        background: var(--primary-color);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .loading-spinner {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 60px 25px;
        color: #666;
    }

    .spinner {
        width: 50px;
        height: 50px;
        border: 4px solid #f3f3f3;
        border-top: 4px solid var(--primary-color);
        border-radius: 50%;
        animation: spin 1s linear infinite;
        margin-bottom: 20px;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    /* Mobile Responsive */
    @media (max-width: 991px) {
        .cart-main {
            grid-template-columns: 1fr;
            gap: 20px;
        }
        
        .cart-summary {
            position: static;
        }
    }

    @media (max-width: 767px) {
        .cart-page {
            padding: 15px 0;
        }
        
        .cart-header {
            padding: 20px;
            margin-bottom: 20px;
        }
        
        .cart-title {
            font-size: 1.6rem;
        }
        
        .item-content {
            grid-template-columns: 60px 1fr;
            gap: 15px;
        }
        
        .item-image {
            width: 60px;
            height: 60px;
        }
        
        .item-actions {
            grid-column: 1 / -1;
            flex-direction: row;
            justify-content: space-between;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid #f0f0f0;
        }
        
        .cart-item {
            padding: 15px 20px;
        }
        
        .cart-items-header,
        .summary-body {
            padding: 20px;
        }
    }

    @media (max-width: 576px) {
        .cart-header {
            padding: 15px;
        }
        
        .cart-title {
            font-size: 1.4rem;
        }
        
        .cart-items-header {
            padding: 15px;
        }
        
        .cart-item {
            padding: 15px;
        }
        
        .summary-body {
            padding: 20px 15px;
        }
        
        .quantity-controls {
            padding: 3px;
        }
        
        .quantity-btn {
            width: 30px;
            height: 30px;
            font-size: 1rem;
        }
    }
</style>
@endsection

@section('content')
<div class="cart-page">
    <div class="container">
        <!-- Cart Header -->
        <div class="cart-header">
            <h1 class="cart-title">
                <i class="fas fa-shopping-bag"></i>
                Keranjang Belanja
            </h1>
            <p class="cart-subtitle">Review pesanan Anda sebelum melanjutkan ke checkout</p>
        </div>

        <!-- Cart Content -->
        <div class="cart-main">
            <!-- Cart Items Section -->
            <div class="cart-items-section">
                <div class="cart-items-header">
                    <h3>
                        Item Pesanan
                        <span class="items-count" id="itemsCount">0</span>
                    </h3>
                </div>
                <div class="cart-items-body">
                    <div class="cart-items-container">
                        <!-- Loading State -->
                        <div class="loading-spinner">
                            <div class="spinner"></div>
                            <p>Memuat keranjang belanja...</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cart Summary -->
            <div class="cart-summary">
                <div class="summary-header">
                    <h3>
                        <i class="fas fa-receipt"></i>
                        Ringkasan Pesanan
                    </h3>
                </div>
                <div class="summary-body">
                    <div class="summary-row">
                        <span>Subtotal</span>
                        <span id="cartSubtotal">Rp 0</span>
                    </div>
                    <div class="summary-row">
                        <span>Pajak (0%)</span>
                        <span>Rp 0</span>
                    </div>
                    <div class="summary-row">
                        <span>Biaya Layanan</span>
                        <span>Rp 0</span>
                    </div>
                    <div class="summary-row total">
                        <span>Total</span>
                        <span id="cartTotal">Rp 0</span>
                    </div>
                    <a href="{{ route('pelanggan.checkout') }}" class="checkout-btn" id="checkoutBtn">
                        <i class="fas fa-credit-card"></i>
                        Lanjut ke Pembayaran
                    </a>
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
        const itemsCountEl = document.getElementById('itemsCount');
        const subtotalEl = document.getElementById('cartSubtotal');
        const totalEl = document.getElementById('cartTotal');
        const checkoutBtn = document.getElementById('checkoutBtn');
        
        // Update cart display
        function updateCartDisplay() {
            const currentCart = JSON.parse(localStorage.getItem('restoCart')) || [];
            
            // Update items count
            itemsCountEl.textContent = currentCart.length;
            
            if (currentCart.length === 0) {
                // Show empty cart
                cartItemsContainer.innerHTML = `
                    <div class="empty-cart">
                        <div class="empty-cart-icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <h3>Keranjang Anda Kosong</h3>
                        <p>Sepertinya Anda belum menambahkan item apapun ke keranjang. Mari mulai berbelanja!</p>
                        <a href="{{ route('pelanggan.menu') }}" class="continue-shopping">
                            <i class="fas fa-utensils"></i>
                            Lihat Menu
                        </a>
                    </div>
                `;
                
                // Update totals
                subtotalEl.textContent = 'Rp 0';
                totalEl.textContent = 'Rp 0';
                checkoutBtn.style.opacity = '0.5';
                checkoutBtn.style.pointerEvents = 'none';
                
            } else {
                // Show cart items
                let cartHTML = '';
                let subtotal = 0;
                
                currentCart.forEach((item, index) => {
                    const itemTotal = item.price * item.quantity;
                    subtotal += itemTotal;
                    
                    cartHTML += `
                        <div class="cart-item" data-id="${item.id}">
                            <div class="item-content">
                                <div class="item-image">
                                    <img src="${item.image}" alt="${item.name}" loading="lazy">
                                </div>
                                <div class="item-details">
                                    <h4 class="item-name">${item.name}</h4>
                                    <p class="item-price">Rp ${parseInt(item.price).toLocaleString('id-ID')}</p>
                                    <p class="item-description">Makanan lezat dengan cita rasa autentik</p>
                                </div>
                                <div class="item-actions">
                                    <div class="quantity-controls">
                                        <button class="quantity-btn decrease-qty" data-id="${item.id}" ${item.quantity <= 1 ? 'disabled' : ''}>
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <span class="quantity-display">${item.quantity}</span>
                                        <button class="quantity-btn increase-qty" data-id="${item.id}">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                    <div class="item-total">Rp ${itemTotal.toLocaleString('id-ID')}</div>
                                    <button class="remove-btn" data-id="${item.id}" title="Hapus item">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    `;
                });
                
                cartItemsContainer.innerHTML = cartHTML;
                
                // Update totals
                subtotalEl.textContent = `Rp ${subtotal.toLocaleString('id-ID')}`;
                totalEl.textContent = `Rp ${subtotal.toLocaleString('id-ID')}`;
                checkoutBtn.style.opacity = '1';
                checkoutBtn.style.pointerEvents = 'auto';
                
                // Add event listeners
                addEventListeners();
            }
        }
        
        // Add event listeners for cart actions
        function addEventListeners() {
            // Decrease quantity
            document.querySelectorAll('.decrease-qty').forEach(btn => {
                btn.addEventListener('click', function() {
                    const itemId = this.dataset.id;
                    updateQuantity(itemId, -1);
                });
            });
            
            // Increase quantity
            document.querySelectorAll('.increase-qty').forEach(btn => {
                btn.addEventListener('click', function() {
                    const itemId = this.dataset.id;
                    updateQuantity(itemId, 1);
                });
            });
            
            // Remove item
            document.querySelectorAll('.remove-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const itemId = this.dataset.id;
                    removeItem(itemId);
                });
            });
        }
        
        // Update quantity
        function updateQuantity(itemId, change) {
            let currentCart = JSON.parse(localStorage.getItem('restoCart')) || [];
            const itemIndex = currentCart.findIndex(item => item.id === itemId);
            
            if (itemIndex !== -1) {
                currentCart[itemIndex].quantity += change;
                
                if (currentCart[itemIndex].quantity <= 0) {
                    currentCart.splice(itemIndex, 1);
                }
                
                localStorage.setItem('restoCart', JSON.stringify(currentCart));
                updateCartDisplay();
                
                // Dispatch custom event for other components
                document.dispatchEvent(new CustomEvent('cartUpdated'));
                
                // Show toast notification
                showToast(change > 0 ? 'Item ditambahkan!' : 'Jumlah item dikurangi');
            }
        }
        
        // Remove item
        function removeItem(itemId) {
            if (confirm('Apakah Anda yakin ingin menghapus item ini dari keranjang?')) {
                let currentCart = JSON.parse(localStorage.getItem('restoCart')) || [];
                currentCart = currentCart.filter(item => item.id !== itemId);
                
                localStorage.setItem('restoCart', JSON.stringify(currentCart));
                updateCartDisplay();
                
                // Dispatch custom event for other components
                document.dispatchEvent(new CustomEvent('cartUpdated'));
                
                // Show toast notification
                showToast('Item dihapus dari keranjang', 'warning');
            }
        }
        
        // Show toast notification
        function showToast(message, type = 'success') {
            // Remove existing toast
            const existingToast = document.querySelector('.toast-notification');
            if (existingToast) {
                existingToast.remove();
            }
            
            // Create new toast
            const toast = document.createElement('div');
            toast.className = `toast-notification ${type}`;
            toast.innerHTML = `
                <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-triangle'}"></i>
                <span>${message}</span>
            `;
            
            document.body.appendChild(toast);
            
            // Show toast
            setTimeout(() => toast.classList.add('show'), 100);
            
            // Hide toast
            setTimeout(() => {
                toast.classList.remove('show');
                setTimeout(() => toast.remove(), 300);
            }, 3000);
        }
        
        // Initial display
        updateCartDisplay();
        
        // Listen for storage changes (when cart is updated from other pages)
        window.addEventListener('storage', function(e) {
            if (e.key === 'restoCart') {
                updateCartDisplay();
            }
        });
        
        // Listen for custom cart update events
        document.addEventListener('cartUpdated', function() {
            updateCartDisplay();
        });
    });
</script>
@endsection
