    </div>
    <script>
        // Hilangkan notifikasi setelah 3 detik
        // setTimeout(function() {
        //     const notification = document.getElementById('notification');
        //     if (notification) {
        //         notification.remove();
        //     }
        // }, 3000);

        // Menambahkan event listener untuk tombol tutup
        const closeButton = document.getElementById('closeButton');
        if (closeButton) {
            closeButton.addEventListener('click', function() {
                const notification = document.getElementById('notification');
                // console.log('test');
                if (notification) {
                    notification.remove();
                }
            });
        }
    </script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}

    </body>

    </html>
