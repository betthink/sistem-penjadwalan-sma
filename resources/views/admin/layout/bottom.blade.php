    </div>
    <script>
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
    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Berhasil!',
                    text: "{{ session('success') }}",
                    icon: 'success',
                    position: "top",
                    showConfirmButton: false,
                    timer: 1500
                });
            });
        </script>
    @endif
    @if (session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Gagal!',
                    text: "{{ session('error') }}",
                    icon: 'error',
                    position: "top",
                    showConfirmButton: false,
                    timer: 1500
                });
            });
        </script>
    @endif

    <!-- Bootstrap core JavaScript-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    </body>

    </html>
