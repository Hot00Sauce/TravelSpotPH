// Form validation and smooth interactions
document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');

    if (form) {
        form.addEventListener('submit', function (e) {
            const inputs = form.querySelectorAll('#text');
            let isValid = true;

            inputs.forEach(input => {
                if (input.value.trim() === '') {
                    isValid = false;
                    input.style.borderColor = 'red';
                } else {
                    input.style.borderColor = 'rgba(255, 255, 255, 0.3)';
                }
            });

            if (!isValid) {
                e.preventDefault();
                alert('Please fill in all fields');
            }
        });

        // Remove error styling on input
        const inputs = form.querySelectorAll('#text');
        inputs.forEach(input => {
            input.addEventListener('input', function () {
                this.style.borderColor = 'rgba(255, 255, 255, 0.3)';
            });
        });
    }
});
