import './bootstrap';

document.addEventListener('DOMContentLoaded', function () {
    const checkboxes = document.querySelectorAll('.form-check-input');

    checkboxes.forEach(function (checkbox) {
        checkbox.addEventListener('change', function () {
            this.value = this.checked ? 1 : 0;
        });
    });
});

