// Pelanggan JavaScript

document.addEventListener('DOMContentLoaded', function() {
    // Initialize cart from localStorage or create empty cart
    let cart = JSON.parse(localStorage.getItem('restoCart')) || [];
    updateCartCount();
    
    // Add to cart functionality
    const addToCartButtons = document.querySelectorAll('.add-to-cart');
    if (addToCartButtons) {
        addToCartButtons.forEach(button => {
            button.addEventListener('click', function() {
                const menuItem = {
                    id: this.dataset.id,
                    name: this.dataset.name,
                    price: parseFloat(this.dataset.price),
                    image: this.dataset.image,
                    quantity: 1
                };
                
                addToCart(menuItem);
                showNotification(`${menuItem.name} ditambahkan ke keranjang`);
            });
        });
    }
    
    // Search functionality
    const searchInput = document.querySelector('.search-input');
    const searchClearBtn = document.querySelector('.search-clear-btn');
    
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase().trim();
            filterMenuItems(searchTerm);
            
            // Show/hide clear button
            if (searchTerm.length > 0) {
                searchClearBtn.style.display = 'block';
            } else {
                searchClearBtn.style.display = 'none';
            }
        });
        
        // Clear search
        if (searchClearBtn) {
            searchClearBtn.addEventListener('click', function() {
                searchInput.value = '';
                filterMenuItems('');
                this.style.display = 'none';
                searchInput.focus();
            });
        }
    }
    
    // Function to filter menu items
    function filterMenuItems(searchTerm) {
        const menuItems = document.querySelectorAll('.menu-item');
        
        if (menuItems.length === 0) return;
        
        if (searchTerm === '') {
            // Show all items and categories
            menuItems.forEach(item => {
                item.style.display = 'block';
            });
            
            // Show all category sections
            document.querySelectorAll('.menu-category').forEach(cat => {
                cat.style.display = 'block';
            });
            
            return;
        }
        
        // Filter items
        menuItems.forEach(item => {
            const title = item.querySelector('.menu-item-title').textContent.toLowerCase();
            const description = item.querySelector('.menu-item-description').textContent.toLowerCase();
            
            if (title.includes(searchTerm) || description.includes(searchTerm)) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
        
        // Hide empty categories
        document.querySelectorAll('.menu-category').forEach(category => {
            const visibleItems = category.querySelectorAll('.menu-item[style="display: block;"]');
            if (visibleItems.length === 0) {
                category.style.display = 'none';
            } else {
                category.style.display = 'block';
            }
        });
    }
    
    // Quantity control in cart page
    const quantityInputs = document.querySelectorAll('.quantity-input');
    if (quantityInputs) {
        quantityInputs.forEach(input => {
            input.addEventListener('change', function() {
                const itemId = this.dataset.id;
                updateQuantity(itemId, parseInt(this.value));
            });
        });
    }
    
    // Remove item from cart
    const removeButtons = document.querySelectorAll('.remove-item');
    if (removeButtons) {
        removeButtons.forEach(button => {
            button.addEventListener('click', function() {
                const itemId = this.dataset.id;
                removeFromCart(itemId);
            });
        });
    }
    
    // Functions
    function addToCart(item) {
        // Check if item already exists in cart
        const existingItemIndex = cart.findIndex(cartItem => cartItem.id === item.id);
        
        if (existingItemIndex > -1) {
            // Item exists, increment quantity
            cart[existingItemIndex].quantity += 1;
        } else {
            // Item doesn't exist, add to cart
            cart.push(item);
        }
        
        // Save to localStorage
        saveCart();
        updateCartCount();
        
        // Dispatch custom event for cart updates
        document.dispatchEvent(new CustomEvent('cartUpdated'));
    }
    
    function updateQuantity(itemId, quantity) {
        const itemIndex = cart.findIndex(item => item.id === itemId);
        
        if (itemIndex > -1) {
            if (quantity > 0) {
                cart[itemIndex].quantity = quantity;
            } else {
                // If quantity is 0 or negative, remove item
                removeFromCart(itemId);
                return;
            }
            
            saveCart();
            updateCartTotal();
            updateCartCount();
            
            // Dispatch custom event for cart updates
            document.dispatchEvent(new CustomEvent('cartUpdated'));
        }
    }
    
    function removeFromCart(itemId) {
        cart = cart.filter(item => item.id !== itemId);
        saveCart();
        updateCartCount();
        
        // Dispatch custom event for cart updates
        document.dispatchEvent(new CustomEvent('cartUpdated'));
        
        // If on cart page, remove the item from DOM
        const cartItemElement = document.querySelector(`.cart-item[data-id="${itemId}"]`);
        if (cartItemElement) {
            cartItemElement.remove();
            updateCartTotal();
            
            // If cart is empty, show empty message
            if (cart.length === 0) {
                const cartContainer = document.querySelector('.cart-items');
                if (cartContainer) {
                    cartContainer.innerHTML = '<div class="alert alert-info">Keranjang Anda kosong</div>';
                }
            }
        }
    }
    
    function saveCart() {
        localStorage.setItem('restoCart', JSON.stringify(cart));
    }
    
    function updateCartCount() {
        const totalItems = cart.reduce((total, item) => total + item.quantity, 0);
        
        // Update cart count in sidebar
        const cartCount = document.getElementById('cartCount');
        if (cartCount) {
            cartCount.textContent = totalItems;
        }
        
        // Update cart count in navbar
        const navCartCount = document.getElementById('navCartCount');
        if (navCartCount) {
            navCartCount.textContent = totalItems;
        }
    }
    
    function updateCartTotal() {
        const subtotalElement = document.getElementById('cartSubtotal');
        const totalElement = document.getElementById('cartTotal');
        
        if (subtotalElement && totalElement) {
            const subtotal = cart.reduce((total, item) => total + (item.price * item.quantity), 0);
            
            // Format as IDR currency
            const formatter = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            });
            
            subtotalElement.textContent = formatter.format(subtotal);
            totalElement.textContent = formatter.format(subtotal);
        }
    }
    
    function showNotification(message) {
        // Create notification element
        const notification = document.createElement('div');
        notification.className = 'toast-notification';
        notification.textContent = message;
        
        // Add to DOM
        document.body.appendChild(notification);
        
        // Show notification
        setTimeout(() => {
            notification.classList.add('show');
        }, 10);
        
        // Hide and remove after 3 seconds
        setTimeout(() => {
            notification.classList.remove('show');
            setTimeout(() => {
                document.body.removeChild(notification);
            }, 300);
        }, 3000);
    }
    
    // Initialize cart display if on cart page
    if (window.location.href.includes('cart')) {
        updateCartTotal();
    }
    
    // Add CSS for notifications
    const style = document.createElement('style');
    style.textContent = `
        .toast-notification {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #ff5e62;
            color: white;
            padding: 12px 20px;
            border-radius: 5px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
            transform: translateY(100px);
            opacity: 0;
            transition: all 0.3s;
            z-index: 9999;
        }
        
        .toast-notification.show {
            transform: translateY(0);
            opacity: 1;
        }
    `;
    document.head.appendChild(style);
});
