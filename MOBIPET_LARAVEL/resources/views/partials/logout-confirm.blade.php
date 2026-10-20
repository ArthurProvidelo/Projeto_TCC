{{-- Confirmação de logout via SweetAlert2, usada em todas as páginas autenticadas --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('a[href*="/logout"]').forEach(function (link) {
            link.addEventListener('click', function (e) {
                e.preventDefault();

                const logoutUrl = this.href;

                Swal.fire({
                    title: 'Deseja sair?',
                    text: 'Você será desconectado do Mobipet.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sim, sair',
                    cancelButtonText: 'Cancelar',
                    confirmButtonColor: '#2563eb',
                    cancelButtonColor: '#dc2626',
                    reverseButtons: true
                }).then(function (result) {
                    if (result.isConfirmed) {
                        window.location.href = logoutUrl;
                    }
                });
            });
        });
    });
</script>
