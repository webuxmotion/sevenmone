import './bootstrap';
import { localized_url } from './utils';

document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.js-add-to-cart').forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();

            const productId = this.dataset.id;

            axios.post(localized_url('/cart/add'), { id: productId, quantity: 1 })
                .then(response => {
                    // ✅ Successfully added
                    console.log('Added to cart:', response.data);
                    alert(response.data?.message);
                })
                .catch(error => {
                    console.error('Error adding to cart:', error);
                    alert('Failed to add to cart.');
                });
        });
    });
});
