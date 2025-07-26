@extends('pelanggan-template')

@section('title', 'Menu Hidangan')

@section('content')
    <!-- Hero Banner -->
    <div class="mega-banner">
        <div class="banner-content">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="banner-text animate__animated animate__fadeInLeft">
                        <h1>Rumah Makan <span class="highlight">HJ Nuridah</span></h1>
                        <p class="banner-subtitle">Resto Masakan Kuliner khas Madura</p>
                        <div class="banner-features">
                            <div class="feature">
                                <i class="fas fa-check-circle"></i>
                                <span>Menu Berkualitas</span>
                            </div>
                            <div class="feature">
                                <i class="fas fa-check-circle"></i>
                                <span>Pelayanan Cepat</span>
                            </div>
                            <div class="feature">
                                <i class="fas fa-check-circle"></i>
                                <span>Harga Terjangkau</span>
                            </div>
                        </div>
                        <button class="btn-banner">
                            <span>Lihat Promo</span>
                            <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="banner-images animate__animated animate__fadeInRight">
                        <img src="https://images.unsplash.com/photo-1594212699903-ec8a3eca50f5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=600&q=80" alt="Promo" class="main-image">
                        <div class="floating-image floating-image-1">
                            <img src="https://images.unsplash.com/photo-1513104890138-7c749659a591?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=300&q=80" alt="Food 1">
                        </div>
                        <div class="floating-image floating-image-2">
                            <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=300&q=80" alt="Food 2">
                        </div>
                        <div class="discount-badge">
                            <span>20%</span>
                            <span>OFF</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Category Pills -->
    <div class="category-pills">
        <button class="category-pill active" data-category="all">Semua</button>
        <button class="category-pill" data-category="makanan">Makanan</button>
        <button class="category-pill" data-category="minuman">Minuman</button>
        <button class="category-pill" data-category="dessert">Dessert</button>
    </div>

    <!-- Menu Container -->
    <div class="menu-container">
        <!-- Makanan -->
        <div class="menu-category" data-category="makanan">
            <h2 class="category-title">Makanan</h2>
            <div class="menu-items">
                <!-- Menu Item 1 -->
                <div class="menu-item animate__animated animate__fadeIn">
                    <div class="menu-item-badge">Bestseller</div>
                    <div class="menu-item-image">
                        <img src="https://images.unsplash.com/photo-1512058564366-18510be2db19?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=600&q=80" alt="Nasi Goreng Spesial">
                    </div>
                    <div class="menu-item-body">
                        <h3 class="menu-item-title">Nasi Goreng Spesial</h3>
                        <div class="menu-item-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <span>4.5</span>
                        </div>
                        <div class="menu-item-price">Rp 35.000</div>
                        <p class="menu-item-description">Nasi goreng dengan telur, ayam, udang, dan sayuran segar.</p>
                        <div class="menu-item-actions">
                            <button class="btn add-to-cart" 
                                data-id="1" 
                                data-name="Nasi Goreng Spesial" 
                                data-price="35000" 
                                data-image="https://images.unsplash.com/photo-1512058564366-18510be2db19?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=600&q=80">
                                <i class="fas fa-cart-plus"></i> Tambah ke Keranjang
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Menu Item 2 -->
                <div class="menu-item animate__animated animate__fadeIn">
                    <div class="menu-item-image">
                        <img src="https://images.unsplash.com/photo-1555939594-58d7cb561ad1?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=600&q=80" alt="Ayam Bakar Madu">
                    </div>
                    <div class="menu-item-body">
                        <h3 class="menu-item-title">Ayam Bakar Madu</h3>
                        <div class="menu-item-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <span>4.0</span>
                        </div>
                        <div class="menu-item-price">Rp 45.000</div>
                        <p class="menu-item-description">Ayam bakar dengan saus madu spesial dan lalapan segar.</p>
                        <div class="menu-item-actions">
                            <button class="btn add-to-cart" 
                                data-id="2" 
                                data-name="Ayam Bakar Madu" 
                                data-price="45000" 
                                data-image="https://images.unsplash.com/photo-1555939594-58d7cb561ad1?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=600&q=80">
                                <i class="fas fa-cart-plus"></i> Tambah ke Keranjang
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Menu Item 3 -->
                <div class="menu-item animate__animated animate__fadeIn">
                    <div class="menu-item-image">
                        <img src="https://images.unsplash.com/photo-1529563021893-cc83c992d75d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=600&q=80" alt="Sate Ayam">
                    </div>
                    <div class="menu-item-body">
                        <h3 class="menu-item-title">Sate Ayam</h3>
                        <div class="menu-item-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <span>5.0</span>
                        </div>
                        <div class="menu-item-price">Rp 30.000</div>
                        <p class="menu-item-description">10 tusuk sate ayam dengan bumbu kacang spesial.</p>
                        <div class="menu-item-actions">
                            <button class="btn add-to-cart" 
                                data-id="3" 
                                data-name="Sate Ayam" 
                                data-price="30000" 
                                data-image="https://images.unsplash.com/photo-1529563021893-cc83c992d75d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=600&q=80">
                                <i class="fas fa-cart-plus"></i> Tambah ke Keranjang
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Menu Item 4 -->
                <div class="menu-item animate__animated animate__fadeIn">
                    <div class="menu-item-badge">Promo</div>
                    <div class="menu-item-image">
                        <img src="https://images.unsplash.com/photo-1563379926898-05f4575a45d8?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=600&q=80" alt="Mie Goreng Spesial">
                    </div>
                    <div class="menu-item-body">
                        <h3 class="menu-item-title">Mie Goreng Spesial</h3>
                        <div class="menu-item-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <i class="far fa-star"></i>
                            <span>3.5</span>
                        </div>
                        <div class="menu-item-price">Rp 28.000</div>
                        <p class="menu-item-description">Mie goreng dengan telur, ayam, seafood, dan sayuran.</p>
                        <div class="menu-item-actions">
                            <button class="btn add-to-cart" 
                                data-id="4" 
                                data-name="Mie Goreng Spesial" 
                                data-price="28000" 
                                data-image="https://images.unsplash.com/photo-1563379926898-05f4575a45d8?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=600&q=80">
                                <i class="fas fa-cart-plus"></i> Tambah ke Keranjang
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Minuman -->
        <div class="menu-category" data-category="minuman">
            <h2 class="category-title">Minuman</h2>
            <div class="menu-items">
                <!-- Menu Item 5 -->
                <div class="menu-item animate__animated animate__fadeIn">
                    <div class="menu-item-image">
                        <img src="https://images.unsplash.com/photo-1572490122747-3968b75cc699?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=600&q=80" alt="Es Teh Manis">
                    </div>
                    <div class="menu-item-body">
                        <h3 class="menu-item-title">Es Teh Manis</h3>
                        <div class="menu-item-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <span>4.0</span>
                        </div>
                        <div class="menu-item-price">Rp 8.000</div>
                        <p class="menu-item-description">Teh manis dengan es batu.</p>
                        <div class="menu-item-actions">
                            <button class="btn add-to-cart" 
                                data-id="5" 
                                data-name="Es Teh Manis" 
                                data-price="8000" 
                                data-image="https://images.unsplash.com/photo-1572490122747-3968b75cc699?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=600&q=80">
                                <i class="fas fa-cart-plus"></i> Tambah ke Keranjang
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Menu Item 6 -->
                <div class="menu-item animate__animated animate__fadeIn">
                    <div class="menu-item-badge">Bestseller</div>
                    <div class="menu-item-image">
                        <img src="https://images.unsplash.com/photo-1589733955941-5eeaf752f6dd?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=600&q=80" alt="Jus Alpukat">
                    </div>
                    <div class="menu-item-body">
                        <h3 class="menu-item-title">Jus Alpukat</h3>
                        <div class="menu-item-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <span>4.5</span>
                        </div>
                        <div class="menu-item-price">Rp 15.000</div>
                        <p class="menu-item-description">Jus alpukat segar dengan susu dan sirup.</p>
                        <div class="menu-item-actions">
                            <button class="btn add-to-cart" 
                                data-id="6" 
                                data-name="Jus Alpukat" 
                                data-price="15000" 
                                data-image="https://images.unsplash.com/photo-1589733955941-5eeaf752f6dd?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=600&q=80">
                                <i class="fas fa-cart-plus"></i> Tambah ke Keranjang
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Menu Item 7 -->
                <div class="menu-item animate__animated animate__fadeIn">
                    <div class="menu-item-image">
                        <img src="https://images.unsplash.com/photo-1556679343-c1306ee3f376?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=600&q=80" alt="Lemon Tea">
                    </div>
                    <div class="menu-item-body">
                        <h3 class="menu-item-title">Lemon Tea</h3>
                        <div class="menu-item-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <span>4.0</span>
                        </div>
                        <div class="menu-item-price">Rp 12.000</div>
                        <p class="menu-item-description">Teh dengan perasan lemon segar dan es batu.</p>
                        <div class="menu-item-actions">
                            <button class="btn add-to-cart" 
                                data-id="7" 
                                data-name="Lemon Tea" 
                                data-price="12000" 
                                data-image="https://images.unsplash.com/photo-1556679343-c1306ee3f376?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=600&q=80">
                                <i class="fas fa-cart-plus"></i> Tambah ke Keranjang
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Menu Item 8 -->
                <div class="menu-item animate__animated animate__fadeIn">
                    <div class="menu-item-badge">Promo</div>
                    <div class="menu-item-image">
                        <img src="https://images.unsplash.com/photo-1563805042-7684c019e1cb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=600&q=80" alt="Milkshake Coklat">
                    </div>
                    <div class="menu-item-body">
                        <h3 class="menu-item-title">Milkshake Coklat</h3>
                        <div class="menu-item-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <span>5.0</span>
                        </div>
                        <div class="menu-item-price">Rp 18.000</div>
                        <p class="menu-item-description">Milkshake coklat dengan whipped cream dan choco chips.</p>
                        <div class="menu-item-actions">
                            <button class="btn add-to-cart" 
                                data-id="8" 
                                data-name="Milkshake Coklat" 
                                data-price="18000" 
                                data-image="https://images.unsplash.com/photo-1563805042-7684c019e1cb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=600&q=80">
                                <i class="fas fa-cart-plus"></i> Tambah ke Keranjang
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Dessert Section -->
        <div class="menu-category" data-category="dessert">
            <h2 class="category-title">Dessert</h2>
            <div class="menu-items">
                <!-- Menu Item 9 -->
                <div class="menu-item animate__animated animate__fadeIn">
                    <div class="menu-item-image">
                        <img src="https://images.unsplash.com/photo-1587314168485-3236d6710814?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=600&q=80" alt="Chocolate Lava Cake">
                    </div>
                    <div class="menu-item-body">
                        <h3 class="menu-item-title">Chocolate Lava Cake</h3>
                        <div class="menu-item-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <span>4.5</span>
                        </div>
                        <div class="menu-item-price">Rp 25.000</div>
                        <p class="menu-item-description">Kue coklat dengan lelehan coklat di tengahnya.</p>
                        <div class="menu-item-actions">
                            <button class="btn add-to-cart" 
                                data-id="9" 
                                data-name="Chocolate Lava Cake" 
                                data-price="25000" 
                                data-image="https://images.unsplash.com/photo-1587314168485-3236d6710814?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=600&q=80">
                                <i class="fas fa-cart-plus"></i> Tambah ke Keranjang
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Menu Item 10 -->
                <div class="menu-item animate__animated animate__fadeIn">
                    <div class="menu-item-badge">New</div>
                    <div class="menu-item-image">
                        <img src="https://images.unsplash.com/photo-1551024506-0bccd828d307?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=600&q=80" alt="Ice Cream Sundae">
                    </div>
                    <div class="menu-item-body">
                        <h3 class="menu-item-title">Ice Cream Sundae</h3>
                        <div class="menu-item-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <span>5.0</span>
                        </div>
                        <div class="menu-item-price">Rp 20.000</div>
                        <p class="menu-item-description">Es krim dengan topping buah, sirup, dan kacang.</p>
                        <div class="menu-item-actions">
                            <button class="btn add-to-cart" 
                                data-id="10" 
                                data-name="Ice Cream Sundae" 
                                data-price="20000" 
                                data-image="https://images.unsplash.com/photo-1551024506-0bccd828d307?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=600&q=80">
                                <i class="fas fa-cart-plus"></i> Tambah ke Keranjang
                            </button>
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
        // Category filtering
        const categoryPills = document.querySelectorAll('.category-pill');
        const menuCategories = document.querySelectorAll('.menu-category');
        
        categoryPills.forEach(pill => {
            pill.addEventListener('click', function() {
                // Remove active class from all pills
                categoryPills.forEach(p => p.classList.remove('active'));
                
                // Add active class to clicked pill
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
        
        // Animation on scroll
        const animateItems = document.querySelectorAll('.animate__animated');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate__fadeIn');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });
        
        animateItems.forEach(item => {
            observer.observe(item);
        });
    });
</script>
@endsection
