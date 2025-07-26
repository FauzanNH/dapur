@extends('pelanggan-template')

@section('title', 'Checkout')

@section('styles')
<style>
    .checkout-container {
        max-width: 1000px;
        margin: 0 auto;
    }
    
    .checkout-header {
        text-align: center;
        margin-bottom: 30px;
    }
    
    .checkout-header h1 {
        font-weight: 700;
        color: var(--dark-color);
        margin-bottom: 10px;
    }
    
    .checkout-header p {
        color: #666;
        font-size: 1.1rem;
    }
    
    /* Steps Indicator */
    .checkout-steps {
        display: flex;
        justify-content: space-between;
        margin-bottom: 30px;
        position: relative;
    }
    
    .checkout-steps::before {
        content: '';
        position: absolute;
        top: 24px;
        left: 0;
        right: 0;
        height: 2px;
        background: #e0e0e0;
        z-index: 1;
    }
    
    .step {
        position: relative;
        z-index: 2;
        background: white;
        width: 33.333%;
        text-align: center;
        padding: 0 15px;
    }
    
    .step-number {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: #f0f0f0;
        color: #999;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        font-size: 1.2rem;
        margin: 0 auto 10px;
        transition: all 0.3s;
    }
    
    .step-title {
        font-weight: 600;
        color: #999;
        margin-bottom: 5px;
        transition: all 0.3s;
    }
    
    .step-desc {
        font-size: 0.85rem;
        color: #999;
        display: none;
    }
    
    .step.active .step-number {
        background: var(--primary-color);
        color: white;
    }
    
    .step.active .step-title {
        color: var(--primary-color);
    }
    
    .step.active .step-desc {
        display: block;
    }
    
    .step.completed .step-number {
        background: var(--secondary-color);
        color: var(--dark-color);
    }
    
    .step.completed .step-title {
        color: var(--dark-color);
    }
    
    /* Step Content */
    .step-content {
        background: white;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        padding: 30px;
        margin-bottom: 30px;
        display: none;
    }
    
    .step-content.active {
        display: block;
        animation: fadeIn 0.5s;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    /* Order Type Selection */
    .order-type-options {
        display: flex;
        gap: 20px;
        margin-bottom: 30px;
    }
    
    .order-type-option {
        flex: 1;
        border: 2px solid #e0e0e0;
        border-radius: 15px;
        padding: 20px;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s;
    }
    
    .order-type-option:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
    }
    
    .order-type-option.selected {
        border-color: var(--primary-color);
        background-color: rgba(255, 87, 34, 0.05);
    }
    
    .order-type-icon {
        font-size: 2.5rem;
        color: #666;
        margin-bottom: 15px;
        transition: all 0.3s;
    }
    
    .order-type-option.selected .order-type-icon {
        color: var(--primary-color);
    }
    
    .order-type-title {
        font-weight: 600;
        margin-bottom: 5px;
    }
    
    .order-type-desc {
        font-size: 0.9rem;
        color: #666;
    }
    
    /* Form Controls */
    .form-control {
        border: 2px solid #e0e0e0;
        border-radius: 10px;
        padding: 12px 15px;
        font-size: 1rem;
        transition: all 0.3s;
    }
    
    .form-control:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(255, 87, 34, 0.1);
    }
    
    .form-label {
        font-weight: 600;
        margin-bottom: 8px;
        color: var(--dark-color);
    }
    
    /* Navigation Buttons */
    .step-navigation {
        display: flex;
        justify-content: space-between;
        margin-top: 30px;
    }
    
    .btn-prev {
        background-color: #f0f0f0;
        color: var(--dark-color);
        border: none;
        border-radius: 50px;
        padding: 12px 25px;
        font-weight: 600;
        transition: all 0.3s;
    }
    
    .btn-prev:hover {
        background-color: #e0e0e0;
    }
    
    .btn-next {
        background-color: var(--primary-color);
        color: white;
        border: none;
        border-radius: 50px;
        padding: 12px 25px;
        font-weight: 600;
        transition: all 0.3s;
    }
    
    .btn-next:hover {
        background-color: #e53935;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(255, 87, 34, 0.3);
    }
    
    /* Order Summary */
    .order-summary {
        background: white;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        overflow: hidden;
    }
    
    .order-summary-header {
        background-color: var(--primary-color);
        color: white;
        padding: 15px 20px;
    }
    
    .order-summary-header h3 {
        margin: 0;
        font-size: 1.2rem;
        font-weight: 600;
    }
    
    .order-summary-body {
        padding: 20px;
    }
    
    .order-summary-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 0;
        border-bottom: 1px solid #f0f0f0;
    }
    
    .order-summary-item:last-child {
        border-bottom: none;
    }
    
    .item-details h4 {
        margin: 0;
        font-size: 1rem;
        font-weight: 600;
    }
    
    .item-details p {
        margin: 0;
        font-size: 0.9rem;
        color: #666;
    }
    
    .item-price {
        font-weight: 600;
    }
    
    .order-summary-total {
        background-color: #f9f9f9;
        padding: 15px 20px;
        border-top: 1px solid #f0f0f0;
    }
    
    .total-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 8px;
    }
    
    .total-row:last-child {
        margin-bottom: 0;
        font-weight: 700;
        font-size: 1.1rem;
        color: var(--primary-color);
    }
    
    /* Table Number */
    .table-number-container {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        margin-top: 20px;
    }
    
    .table-number-option {
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 2px solid #e0e0e0;
        border-radius: 10px;
        font-weight: 600;
        font-size: 1.2rem;
        cursor: pointer;
        transition: all 0.3s;
    }
    
    .table-number-option:hover {
        border-color: #ccc;
        background-color: #f9f9f9;
    }
    
    .table-number-option.selected {
        border-color: var(--primary-color);
        background-color: rgba(255, 87, 34, 0.05);
        color: var(--primary-color);
    }
</style>
@endsection

@section('content')
<div class="checkout-container">
    <div class="checkout-header">
        <h1>Checkout</h1>
        <p>Selesaikan pesanan Anda dalam 3 langkah mudah</p>
    </div>
    
    <!-- Steps Indicator -->
    <div class="checkout-steps">
        <div class="step step-1 active">
            <div class="step-number">1</div>
            <div class="step-title">Tipe Pesanan</div>
            <div class="step-desc">Pilih cara Anda menikmati pesanan</div>
        </div>
        <div class="step step-2">
            <div class="step-number">2</div>
            <div class="step-title">Detail Pesanan</div>
            <div class="step-desc">Lengkapi informasi pesanan Anda</div>
        </div>
        <div class="step step-3">
            <div class="step-number">3</div>
            <div class="step-title">Ringkasan</div>
            <div class="step-desc">Periksa pesanan Anda sebelum melanjutkan</div>
        </div>
    </div>
    
    <!-- Step 1: Order Type -->
    <div class="step-content step-1-content active">
        <h2>Pilih Tipe Pesanan</h2>
        <p>Bagaimana Anda ingin menikmati makanan Anda?</p>
        
        <div class="order-type-options">
            <div class="order-type-option" data-type="dine_in">
                <div class="order-type-icon">
                    <i class="fas fa-utensils"></i>
                </div>
                <div class="order-type-title">Makan di Tempat</div>
                <div class="order-type-desc">Nikmati hidangan di restoran kami</div>
            </div>
            <div class="order-type-option" data-type="take_away">
                <div class="order-type-icon">
                    <i class="fas fa-shopping-bag"></i>
                </div>
                <div class="order-type-title">Bawa Pulang</div>
                <div class="order-type-desc">Ambil pesanan Anda untuk dinikmati di tempat lain</div>
            </div>
        </div>
        
        <div class="step-navigation">
            <div></div> <!-- Empty div for flex spacing -->
            <button class="btn-next" id="step1Next" disabled>Lanjutkan</button>
        </div>
    </div>
    
    <!-- Step 2: Order Details -->
    <div class="step-content step-2-content">
        <h2>Detail Pesanan</h2>
        
        <!-- Table Number (only for dine-in) -->
        <div id="tableNumberSection" style="display: none;">
            <div class="mb-4">
                <label class="form-label">Pilih Nomor Meja</label>
                <div class="table-number-container">
                    <div class="table-number-option" data-table="1">1</div>
                    <div class="table-number-option" data-table="2">2</div>
                    <div class="table-number-option" data-table="3">3</div>
                    <div class="table-number-option" data-table="4">4</div>
                    <div class="table-number-option" data-table="5">5</div>
                    <div class="table-number-option" data-table="6">6</div>
                    <div class="table-number-option" data-table="7">7</div>
                    <div class="table-number-option" data-table="8">8</div>
                </div>
            </div>
        </div>
        
        <!-- Additional Notes -->
        <div class="mb-4">
            <label for="notes" class="form-label">Catatan Tambahan (opsional)</label>
            <textarea class="form-control" id="notes" rows="3" placeholder="Instruksi khusus untuk pesanan Anda (opsional)"></textarea>
        </div>
        
        <div class="step-navigation">
            <button class="btn-prev" id="step2Prev">Kembali</button>
            <button class="btn-next" id="step2Next">Lanjutkan</button>
        </div>
    </div>
    
    <!-- Step 3: Order Summary -->
    <div class="step-content step-3-content">
        <div class="row">
            <div class="col-md-7">
                <h2>Ringkasan Pesanan</h2>
                <div class="mb-4">
                    <div class="order-details">
                        <div class="mb-3">
                            <strong>Tipe Pesanan:</strong> 
                            <span id="summaryOrderType">Makan di Tempat</span>
                        </div>
                        <div class="mb-3" id="summaryTableNumber">
                            <strong>Nomor Meja:</strong> 
                            <span>1</span>
                        </div>
                        <div class="mb-3">
                            <strong>Catatan:</strong> 
                            <span id="summaryNotes">-</span>
                        </div>
                    </div>
                </div>
                
                <h3>Item Pesanan</h3>
                <div class="checkout-items">
                    <!-- Items will be loaded dynamically -->
                </div>
            </div>
            
            <div class="col-md-5">
                <div class="order-summary">
                    <div class="order-summary-header">
                        <h3>Total Pembayaran</h3>
                    </div>
                    <div class="order-summary-body">
                        <div class="total-row">
                            <span>Subtotal</span>
                            <span id="checkoutSubtotal">Rp 0</span>
                        </div>
                        <div class="total-row">
                            <span>Pajak (10%)</span>
                            <span id="checkoutTax">Rp 0</span>
                        </div>
                    </div>
                    <div class="order-summary-total">
                        <div class="total-row">
                            <span>Total</span>
                            <span id="checkoutTotal">Rp 0</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="step-navigation">
            <button class="btn-prev" id="step3Prev">Kembali</button>
            <button class="btn-next" id="completeOrder">Selesaikan Pesanan</button>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Variables
        let currentStep = 1;
        let orderType = '';
        let tableNumber = '';
        let notes = '';
        
        // Get cart from localStorage
        const cart = JSON.parse(localStorage.getItem('restoCart')) || [];
        
        // Check if cart is empty
        if (cart.length === 0) {
            document.querySelector('.checkout-container').innerHTML = `
                <div class="alert alert-info text-center p-5">
                    <i class="fas fa-shopping-cart fa-3x mb-3"></i>
                    <h3>Keranjang Anda kosong</h3>
                    <p>Silakan tambahkan beberapa item ke keranjang Anda terlebih dahulu.</p>
                    <a href="{{ route('pelanggan.menu') }}" class="btn btn-primary mt-3">
                        <i class="fas fa-utensils me-2"></i>Lihat Menu
                    </a>
                </div>
            `;
            return;
        }
        
        // Step 1: Order Type Selection
        const orderTypeOptions = document.querySelectorAll('.order-type-option');
        const step1NextBtn = document.getElementById('step1Next');
        
        orderTypeOptions.forEach(option => {
            option.addEventListener('click', function() {
                // Remove selected class from all options
                orderTypeOptions.forEach(opt => opt.classList.remove('selected'));
                
                // Add selected class to clicked option
                this.classList.add('selected');
                
                // Store selected order type
                orderType = this.dataset.type;
                
                // Enable next button
                step1NextBtn.removeAttribute('disabled');
            });
        });
        
        // Step 2: Table Number Selection
        const tableNumberOptions = document.querySelectorAll('.table-number-option');
        
        tableNumberOptions.forEach(option => {
            option.addEventListener('click', function() {
                // Remove selected class from all options
                tableNumberOptions.forEach(opt => opt.classList.remove('selected'));
                
                // Add selected class to clicked option
                this.classList.add('selected');
                
                // Store selected table number
                tableNumber = this.dataset.table;
            });
        });
        
        // Navigation buttons
        step1NextBtn.addEventListener('click', function() {
            goToStep(2);
            
            // Show/hide table number section based on order type
            if (orderType === 'dine_in') {
                document.getElementById('tableNumberSection').style.display = 'block';
            } else {
                document.getElementById('tableNumberSection').style.display = 'none';
            }
        });
        
        document.getElementById('step2Prev').addEventListener('click', function() {
            goToStep(1);
        });
        
        document.getElementById('step2Next').addEventListener('click', function() {
            // Get notes
            notes = document.getElementById('notes').value;
            
            // Validate table number if dine-in
            if (orderType === 'dine_in' && !tableNumber) {
                alert('Silakan pilih nomor meja Anda.');
                return;
            }
            
            // Update summary
            document.getElementById('summaryOrderType').textContent = orderType === 'dine_in' ? 'Makan di Tempat' : 'Bawa Pulang';
            
            if (orderType === 'dine_in') {
                document.getElementById('summaryTableNumber').style.display = 'block';
                document.getElementById('summaryTableNumber').querySelector('span').textContent = tableNumber;
            } else {
                document.getElementById('summaryTableNumber').style.display = 'none';
            }
            
            document.getElementById('summaryNotes').textContent = notes || '-';
            
            // Go to step 3
            goToStep(3);
            
            // Load checkout items
            loadCheckoutItems();
        });
        
        document.getElementById('step3Prev').addEventListener('click', function() {
            goToStep(2);
        });
        
        document.getElementById('completeOrder').addEventListener('click', function() {
            // In a real application, you would send the order to the server
            // For now, just show a success message and clear the cart
            
            // Store order details in localStorage for reference
            const orderDetails = {
                orderType: orderType,
                tableNumber: tableNumber,
                notes: notes,
                items: cart,
                total: calculateTotal(),
                orderDate: new Date().toISOString()
            };
            
            localStorage.setItem('lastOrder', JSON.stringify(orderDetails));
            
            // Clear cart
            localStorage.removeItem('restoCart');
            
            // Redirect to success page or show success message
            alert('Pesanan Anda telah berhasil dikirim!');
            window.location.href = "{{ route('pelanggan.menu') }}";
        });
        
        // Helper functions
        function goToStep(step) {
            // Update current step
            currentStep = step;
            
            // Update steps indicator
            document.querySelectorAll('.step').forEach((stepEl, index) => {
                if (index + 1 < step) {
                    stepEl.classList.remove('active');
                    stepEl.classList.add('completed');
                } else if (index + 1 === step) {
                    stepEl.classList.add('active');
                    stepEl.classList.remove('completed');
                } else {
                    stepEl.classList.remove('active', 'completed');
                }
            });
            
            // Show current step content, hide others
            document.querySelectorAll('.step-content').forEach((content, index) => {
                if (index + 1 === step) {
                    content.classList.add('active');
                } else {
                    content.classList.remove('active');
                }
            });
        }
        
        function loadCheckoutItems() {
            const checkoutItemsContainer = document.querySelector('.checkout-items');
            
            if (cart.length === 0) {
                checkoutItemsContainer.innerHTML = `
                    <div class="alert alert-info">
                        Keranjang Anda kosong.
                    </div>
                `;
                return;
            }
            
            let checkoutHTML = '';
            
            cart.forEach(item => {
                checkoutHTML += `
                    <div class="order-summary-item">
                        <div class="item-details">
                            <h4>${item.name}</h4>
                            <p>${item.quantity} x Rp ${parseInt(item.price).toLocaleString('id-ID')}</p>
                        </div>
                        <div class="item-price">Rp ${(item.price * item.quantity).toLocaleString('id-ID')}</div>
                    </div>
                `;
            });
            
            checkoutItemsContainer.innerHTML = checkoutHTML;
            
            // Update totals
            updateTotals();
        }
        
        function calculateTotal() {
            const subtotal = cart.reduce((total, item) => total + (item.price * item.quantity), 0);
            const tax = subtotal * 0.1; // 10% tax
            return subtotal + tax;
        }
        
        function updateTotals() {
            const subtotal = cart.reduce((total, item) => total + (item.price * item.quantity), 0);
            const tax = subtotal * 0.1; // 10% tax
            const total = subtotal + tax;
            
            const formatter = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            });
            
            document.getElementById('checkoutSubtotal').textContent = formatter.format(subtotal);
            document.getElementById('checkoutTax').textContent = formatter.format(tax);
            document.getElementById('checkoutTotal').textContent = formatter.format(total);
        }
    });
</script>
@endsection
