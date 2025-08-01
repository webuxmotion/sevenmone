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
            let quantity = 1;

            const wrapper = button.closest('.js-add-to-cart-wrapper');
            if (wrapper) {
                const input = wrapper.querySelector('.js-add-to-cart-count');
                quantity = input ? parseInt(input.value) || 1 : 1;
            }
            

            axios.post(localized_url('/cart/add'), { id: productId, quantity })
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

    document.querySelectorAll('.js-add-to-wishlist').forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();

            const productId = this.dataset.id;

            axios.post(localized_url('/wishlist/add'), { id: productId })
                .then(response => {
                    button.closest('.js-wishlist-button').classList.add('is-added');
                    toastr.success(response.data?.message);
                })
                .catch(error => {
                    console.error('Error adding to wishlist:', error);
                    toastr.error('Failed to add to wishlist.');
                });
        });
    });

    document.querySelectorAll('.js-delete-from-wishlist').forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();

            const productId = this.dataset.id;

            axios.post(localized_url('/wishlist/delete'), { id: productId })
                .then(response => {
                    button.closest('.js-wishlist-button').classList.remove('is-added');
                    toastr.success(response.data?.message);
                })
                .catch(error => {
                    console.error('Error deleting from wishlist:', error);
                    toastr.error('Failed to delete from wishlist.');
                });
        });
    });
});
