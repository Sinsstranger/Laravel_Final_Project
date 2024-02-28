document.addEventListener('DOMContentLoaded', function () {
    var addPaymentMethodBtn = document.getElementById('addPaymentMethodBtn');
    var addPaymentMethodForm = document.getElementById('addPaymentMethodForm');
    var cancelPaymentMethodBtn = document.getElementById('cancelPaymentMethodBtn');
    var paymentMethodForm = document.getElementById('paymentMethodForm');

    addPaymentMethodBtn.addEventListener('click', function () {
        addPaymentMethodForm.style.display = 'block';
    });

    cancelPaymentMethodBtn.addEventListener('click', function () {
        addPaymentMethodForm.style.display = 'none';
    });

    paymentMethodForm.addEventListener('submit', function (e) {
        e.preventDefault();

        addPaymentMethodForm.style.display = 'none';
    });
});