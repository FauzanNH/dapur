@extends('pelanggan-template')

@section('title', 'Keranjang Belanja')

@section('content')
    <div class="container">
        <h1 class="mb-4">Keranjang Belanja</h1>
        
        <div class="cart-container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-header bg-white">
                            <h5 class="mb-0">Item Pesanan</h5>
                        </div>
                        <div class="card-body">
                            <div class="cart-items">
                                <!-- Cart items will be loaded dynamically via JavaScript -->
                                <div class="text-center py-5">
                                    <div class="spinner-border text-primary" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                    <p class="mt-2">Memuat keranjang...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h5 class="mb-0">Ringkasan Pesanan</h5>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <span>Subtotal</span>
                                <span id="cartSubtotal">Rp 0</span>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <span>Pajak (0%)</span>
                                <span>Rp 0</span>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between mb-4">
                                <strong>Total</strong>
                                <strong id="cartTotal">Rp 0</strong>
                            </div>
                            <a href="{{ route('pelanggan.checkout') }}" class="btn btn-primary w-100">Lanjut ke Checkout</a>
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
        const cartItemsContainer = document.querySelector('.cart-items');
        
        // Display cart items or empty message
        if (cart.length === 0) {
            cartItemsContainer.innerHTML = `
                <div class="alert alert-info">
                    Keranjang Anda kosong. <a href="{{ route('pelanggan.menu') }}">Kembali ke menu</a> untuk menambahkan item.
                </div>
            `;
        } else {
            let cartHTML = '';
            
            cart.forEach(item => {
                cartHTML += `
                    <div class="cart-item mb-3" data-id="${item.id}">
                        <div class="row align-items-center">
                            <div class="col-md-2">
                                <img src="${item.image}" alt="${item.name}" class="img-fluid rounded">
                            </div>
                            <div class="col-md-4">
                                <h5 class="mb-1">${item.name}</h5>
                                <p class="text-muted mb-0">Rp ${parseInt(item.price).toLocaleString('id-ID')}</p>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <button class="btn btn-outline-secondary decrease-quantity" type="button">-</button>
                                    <input type="number" class="form-control text-center quantity-input" value="${item.quantity}" min="1" data-id="${item.id}">
                                    <button class="btn btn-outline-secondary increase-quantity" type="button">+</button>
                                </div>
                            </div>
                            <div class="col-md-2 text-end">
                                <span class="fw-bold">Rp ${(item.price * item.quantity).toLocaleString('id-ID')}</span>
                            </div>
                            <div class="col-md-1 text-end">
                                <button class="btn btn-sm btn-danger remove-item" data-id="${item.id}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                `;
                
                if (cart.indexOf(item) < cart.length - 1) {
                    cartHTML += '<hr>';
                }
            });
            
            cartItemsContainer.innerHTML = cartHTML;
            
            // Add event listeners for quantity buttons
            document.querySelectorAll('.decrease-quantity').forEach(button => {
                button.addEventListener('click', function() {
                    const input = this.nextElementSibling;
                    if (parseInt(input.value) > 1) {
                        input.value = parseInt(input.value) - 1;
                        input.dispatchEvent(new Event('change'));
                    }
                });
            });
            
            document.querySelectorAll('.increase-quantity').forEach(button => {
                button.addEventListener('click', function() {
                    const input = this.previousElementSibling;
                    input.value = parseInt(input.value) + 1;
                    input.dispatchEvent(new Event('change'));
                });
            });
            
            // Add event listeners for remove buttons
            document.querySelectorAll('.remove-item').forEach(button => {
                button.addEventListener('click', function() {
                    const itemId = this.dataset.id;
                    removeFromCart(itemId);
                });
            });
        }
    });
</script>
@endsection
