<script>
    // Mendapatkan elemen-elemen yang dibutuhkan
    const imageInput = document.getElementById('image');
    const imagePreview = document.getElementById('image-preview');

    // Simpan URL gambar awal sebagai nilai default
    const defaultImageSrc = imagePreview.src;

    // Fungsi untuk menampilkan pratinjau gambar
    function showImagePreview(file) {
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                imagePreview.src = e.target.result;
                imagePreview.style.display = 'block'; // Menampilkan tag img saat gambar tersedia
            };
            reader.readAsDataURL(file);
        }
    }

    // Event listener ketika gambar diubah di input file
    imageInput.addEventListener('change', function () {
        const selectedFile = this.files[0];
        showImagePreview(selectedFile);
    });

    // Event listener untuk menghilangkan pratinjau gambar dan mereset input file
    imageInput.addEventListener('click', function () {
        if (imageInput.value === '') {
            imagePreview.style.display = 'none'; // Menghilangkan tag img saat tidak ada gambar yang dipilih
        }
    });
</script>
