
const quantityBtns = document.querySelectorAll('.quantity-btn');
const removeBtns = document.querySelectorAll('.remove-btn');

quantityBtns.forEach(btn => {
    btn.addEventListener('click', () => {
        const quantityElement = btn.parentElement.querySelector('.quantity');
        let quantity = parseInt(quantityElement.textContent);
        
        if (btn.textContent === '+') {
            quantity++;
        } else if (btn.textContent === '-' && quantity > 1) {
            quantity--;
        }
        
        quantityElement.textContent = quantity;
    });
});

removeBtns.forEach(btn => {
    btn.addEventListener('click', () => {
        btn.parentElement.remove();
    });
});
