const MAX_FILE_SIZE = 2 * 1024 * 1024;
const fileInput = document.getElementById('image');
const errorMessage = document.getElementById('image-error');
const form = document.querySelector('form');

if (fileInput && errorMessage && form) {
    fileInput.addEventListener('change', function() {
        if (this.files.length > 0) {
            const file = this.files[0];
        
            if (file.size > MAX_FILE_SIZE) {
                errorMessage.textContent = `Filen du valt är för stor. Maximal storlek är 2 MB, men du valde ${(file.size / 1024 / 1024).toFixed(2)} MB.`;
                errorMessage.style.display = 'block';
                this.value = '';
            } else {
                errorMessage.style.display = 'none';
            }
        }
    });

    form.addEventListener('submit', function(e) {
        if (fileInput.files.length > 0) {
            const file = fileInput.files[0];
            if (file.size > MAX_FILE_SIZE) {
                e.preventDefault();
                errorMessage.textContent = `Filen du valt är för stor. Maximal storlek är 2 MB, men du valde ${(file.size / 1024 / 1024).toFixed(2)} MB.`;
                errorMessage.style.display = 'block';
            }
        }
    });
}
