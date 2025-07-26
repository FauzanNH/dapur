@extends('pelanggan-template')

@section('title', 'Pembayaran')

@section('content')
    <div class="container">
        <h1 class="mb-4">Pembayaran</h1>
        
        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-header bg-white">
                        <h5 class="mb-0">Metode Pembayaran</h5>
                    </div>
                    <div class="card-body">
                        <form id="paymentForm">
                            <div class="mb-4">
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" name="paymentMethod" id="cash" value="cash" checked>
                                    <label class="form-check-label d-flex align-items-center" for="cash">
                                        <i class="fas fa-money-bill-wave me-2 text-success"></i>
                                        Tunai
                                    </label>
                                </div>
                                
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" name="paymentMethod" id="creditCard" value="credit_card">
                                    <label class="form-check-label d-flex align-items-center" for="creditCard">
                                        <i class="fas fa-credit-card me-2 text-primary"></i>
                                        Kartu Kredit/Debit
                                    </label>
                                </div>
                                
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" name="paymentMethod" id="qris" value="qris">
                                    <label class="form-check-label d-flex align-items-center" for="qris">
                                        <i class="fas fa-qrcode me-2 text-info"></i>
                                        QRIS
                                    </label>
                                </div>
                                
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="paymentMethod" id="ewallet" value="ewallet">
                                    <label class="form-check-label d-flex align-items-center" for="ewallet">
                                        <i class="fas fa-wallet me-2 text-warning"></i>
                                        E-Wallet
                                    </label>
                                </div>
                            </div>
                            
                            <!-- Payment details sections - will show/hide based on selection -->
                            <div id="cashDetails" class="payment-details">
                                <div class="alert alert-info">
                                    Silakan lakukan pembayaran tunai di kasir setelah menekan tombol "Selesaikan Pembayaran".
                                </div>
                            </div>
                            
                            <div id="creditCardDetails" class="payment-details" style="display: none;">
                                <div class="mb-3">
                                    <label for="cardNumber" class="form-label">Nomor Kartu</label>
                                    <input type="text" class="form-control" id="cardNumber" placeholder="1234 5678 9012 3456">
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="expiryDate" class="form-label">Tanggal Kadaluarsa</label>
                                        <input type="text" class="form-control" id="expiryDate" placeholder="MM/YY">
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <label for="cvv" class="form-label">CVV</label>
                                        <input type="text" class="form-control" id="cvv" placeholder="123">
                                    </div>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="cardholderName" class="form-label">Nama Pemegang Kartu</label>
                                    <input type="text" class="form-control" id="cardholderName" placeholder="Nama Lengkap">
                                </div>
                            </div>
                            
                            <div id="qrisDetails" class="payment-details" style="display: none;">
                                <div class="text-center mb-3">
                                    <img src="https://via.placeholder.com/200x200" alt="QRIS Code" class="img-fluid border">
                                </div>
                                
                                <div class="alert alert-info">
                                    Scan kode QR di atas menggunakan aplikasi e-wallet atau mobile banking Anda.
                                </div>
                            </div>
                            
                            <div id="ewalletDetails" class="payment-details" style="display: none;">
                                <div class="mb-3">
                                    <label class="form-label">Pilih E-Wallet</label>
                                    <select class="form-select">
                                        <option value="">Pilih E-Wallet</option>
                                        <option value="gopay">GoPay</option>
                                        <option value="ovo">OVO</option>
                                        <option value="dana">DANA</option>
                                        <option value="shopeepay">ShopeePay</option>
                                    </select>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="phoneNumber" class="form-label">Nomor Telepon</label>
                                    <input type="text" class="form-control" id="phoneNumber" placeholder="08xxxxxxxxxx">
                                </div>
                            </div>
                            
                            <button type="submit" class="btn btn-primary mt-3">Selesaikan Pembayaran</button>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header bg-white">
                        <h5 class="mb-0">Ringkasan Pesanan</h5>
                    </div>
                    <div class="card-body">
                        <div class="payment-summary">
                            <!-- Will be loaded dynamically -->
                            <div class="text-center py-3">
                                <div class="spinner-border text-primary" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                                <p class="mt-2">Memuat ringkasan...</p>
                            </div>
                        </div>
                        
                        <hr>
                        
                        <div class="d-flex justify-content-between mb-2">
                            <strong>Total Pembayaran</strong>
                            <strong id="paymentTotal">Rp 0</strong>
                        </div>
                        
                        <a href="{{ route('pelanggan.checkout') }}" class="btn btn-outline-secondary w-100 mt-3">Kembali ke Checkout</a>
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
        const paymentSummaryContainer = document.querySelector('.payment-summary');
        
        // Display payment summary
        if (cart.length === 0) {
            paymentSummaryContainer.innerHTML = `
                <div class="alert alert-info">
                    Keranjang Anda kosong. <a href="{{ route('pelanggan.menu') }}">Kembali ke menu</a> untuk menambahkan item.
                </div>
            `;
        } else {
            let summaryHTML = '<ul class="list-group list-group-flush">';
            
            cart.forEach(item => {
                summaryHTML += `
                    <li class="list-group-item px-0">
                        <div class="d-flex justify-content-between">
                            <span>${item.name} x ${item.quantity}</span>
                            <span>Rp ${(item.price * item.quantity).toLocaleString('id-ID')}</span>
                        </div>
                    </li>
                `;
            });
            
            summaryHTML += '</ul>';
            paymentSummaryContainer.innerHTML = summaryHTML;
            
            // Update total
            const total = cart.reduce((total, item) => total + (item.price * item.quantity), 0);
            const formatter = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            });
            
            document.getElementById('paymentTotal').textContent = formatter.format(total);
        }
        
        // Handle payment method selection
        const paymentMethods = document.querySelectorAll('input[name="paymentMethod"]');
        const paymentDetails = document.querySelectorAll('.payment-details');
        
        paymentMethods.forEach(method => {
            method.addEventListener('change', function() {
                // Hide all payment details
                paymentDetails.forEach(detail => {
                    detail.style.display = 'none';
                });
                
                // Show selected payment details
                document.getElementById(`${this.value}Details`).style.display = 'block';
            });
        });
        
        // Handle form submission
        document.getElementById('paymentForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // In a real application, you would process the payment
            // For now, just show a success message and clear the cart
            
            alert('Pembayaran berhasil! Pesanan Anda sedang diproses.');
            
            // Clear cart
            localStorage.removeItem('restoCart');
            
            // Redirect to menu page
            window.location.href = "{{ route('pelanggan.menu') }}";
        });
    });
</script>
@endsection
