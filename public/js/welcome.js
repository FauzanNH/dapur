document.addEventListener('DOMContentLoaded', function() {
    const customerForm = document.getElementById('customerForm');
    const errorMessage = document.getElementById('errorMessage');
    
    // Animate food images on load
    setTimeout(() => {
        const foodImages = document.querySelectorAll('.food-image');
        foodImages.forEach(image => {
            image.classList.add('animate__fadeInUp');
        });
    }, 500);
    
    // Form validation
    if (customerForm) {
        customerForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const customerName = document.getElementById('customerName').value.trim();
            
            if (!customerName) {
                showError('Silakan masukkan nama Anda untuk melanjutkan.');
                shakeElement(document.getElementById('customerName'));
                return;
            }
            
            if (customerName.length < 3) {
                showError('Nama harus minimal 3 karakter.');
                shakeElement(document.getElementById('customerName'));
                return;
            }
            
            // Show loading state
            const submitButton = customerForm.querySelector('button[type="submit"]');
            const originalText = submitButton.innerHTML;
            submitButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memproses...';
            submitButton.disabled = true;
            
            // Store customer name in session storage for use across pages
            sessionStorage.setItem('customerName', customerName);
            
            // Submit the form after a short delay to show the loading state
            setTimeout(() => {
                this.submit();
            }, 800);
        });
        
        // Add input animation
        const formInput = document.getElementById('customerName');
        formInput.addEventListener('focus', function() {
            this.parentElement.classList.add('input-focused');
        });
        
        formInput.addEventListener('blur', function() {
            this.parentElement.classList.remove('input-focused');
        });
    }
    
    function showError(message) {
        errorMessage.textContent = message;
        errorMessage.style.display = 'block';
        
        // Hide error message after 3 seconds
        setTimeout(() => {
            errorMessage.style.display = 'none';
        }, 3000);
    }
    
    function shakeElement(element) {
        element.classList.add('animate__animated', 'animate__shakeX');
        
        element.addEventListener('animationend', () => {
            element.classList.remove('animate__animated', 'animate__shakeX');
        }, {once: true});
    }
    
    // Add CSS for animations
    const style = document.createElement('style');
    style.textContent = `
        .input-focused {
            transform: translateY(-3px);
        }
        
        .input-icon {
            transition: all 0.3s ease;
        }
        
        .input-focused i {
            color: var(--secondary-color);
        }
        
        .input-focused input {
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
    `;
    document.head.appendChild(style);
});
