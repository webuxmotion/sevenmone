import './bootstrap';
import { localized_url } from './utils';

toastr.options = {
    "positionClass": "toast-top-center", 
};

window.showLoader = function () {
    document.querySelector('.js-global-loader')?.style.setProperty('display', 'flex');
};

window.hideLoader = function () {
    document.querySelector('.js-global-loader')?.style.setProperty('display', 'none');
};

window.deleteCartItem = function(id) {
    showLoader();

    axios.post(localized_url(`/cart/delete/${id}`))
        .then(response => {
            toastr.clear();
            toastr.success(response.data?.message || 'Item deleted');
            document.querySelector('.js-count-items').innerHTML = response.data?.cart?.quantity;

            if (response.data?.cart?.quantity === 0) {
                document.querySelector('.js-clear-cart-button')?.classList.add('d-none');
            }

            return axios.get(localized_url('/cart/modal'));
        })
        .then(response => {
            document.querySelector('.js-modal-body').innerHTML = response.data;
        })
        .catch(error => {
            toastr.clear();    
            toastr.error('Failed to delete item');
            console.error(error);
        })
        .finally(() => {
            hideLoader();
        });
};

window.clearCart = function() {
    axios.post(localized_url(`/cart/clear`))
        .then(response => {
            toastr.clear();
            
            toastr.success(response.data?.message || 'Cart cleared');
            document.querySelector('.js-count-items').innerHTML = 0;

            document.querySelector('.js-clear-cart-button')?.classList.add('d-none');

            return axios.get(localized_url('/cart/modal'));
        })
        .then(response => {
            document.querySelector('.js-modal-body').innerHTML = response.data;
        })
        .catch(error => {
            toastr.clear();    
            toastr.error('Failed to delete item');
            console.error(error);
        })
        .finally(() => {
            hideLoader();
        });
}


document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.js-add-to-cart').forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();

            const productId = this.dataset.id;

            axios.post(localized_url('/cart/add'), { id: productId, quantity: 1 })
                .then(response => {
                    // ✅ Update cart count
                    document.querySelector('.js-count-items').innerHTML = response.data?.cart?.quantity;

                    // ✅ Show clear cart button
                    document.querySelector('.js-clear-cart-button')?.classList.remove('d-none');

                    // ✅ Show toast
                    toastr.clear();
                    toastr.success(response.data?.message);
                })
                .catch(error => {
                    console.error('Error adding to cart:', error);
                    alert('Failed to add to cart.');
                });
        });
    });


    document.querySelector('.js-show-modal').addEventListener('click', (e) => {
        e.preventDefault();

        axios.get(localized_url('/cart/modal'))
            .then(response => {
                document.querySelector('.js-modal-body').innerHTML = response.data;
            })
            .catch(error => {
                console.error('Error adding to cart:', error);
                alert('failed');
            });
    });
});
