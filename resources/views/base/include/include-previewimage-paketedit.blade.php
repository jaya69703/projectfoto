<script>
    // Mendapatkan elemen-elemen yang dibutuhkan
    const imageInputs = document.querySelectorAll('input[type="file"]');
    const imagePreviews = document.querySelectorAll('img[id^="image-preview"]');

    // Fungsi untuk menampilkan pratinjau gambar
    function showImagePreview(file, index) {
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                imagePreviews[index].src = e.target.result;
                imagePreviews[index].style.display = 'block'; // Menampilkan tag img saat gambar tersedia
            };
            reader.readAsDataURL(file);
        }
    }

    // Loop untuk menambahkan event listener ke setiap input file
    imageInputs.forEach((input, index) => {
        input.addEventListener('change', function () {
            const selectedFile = this.files[0];
            showImagePreview(selectedFile, index);
        });

        // Event listener untuk menghilangkan pratinjau gambar dan mereset input file
        input.addEventListener('click', function () {
            const currentIndex = index;
            if (input.value === '') {
                imagePreviews[currentIndex].style.display = 'none'; // Menghilangkan tag img saat tidak ada gambar yang dipilih
                input.value = ''; // Mereset input file
            }
        });
    });
</script>