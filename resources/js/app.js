
    $(document).ready(function () {
        // Quando o botão "Eliminar" é clicado, atualiza o action do formulário
        $('.delete-product-btn').on('click', function () {
            var productId = $(this).data('product-id'); // Obtém o ID do produto do atributo de dados
            var form = $('#deleteProductForm'); // Seleciona o formulário de exclusão
            var url = "{{ url('/company/deleteproduct') }}/" + productId; // URL base para a rota de exclusão

            // Atualiza o atributo action do formulário com a URL correta
            form.attr('action', url);

            // Abre o modal
            $('#confirmDeleteModal').modal('show');
        });

    // Quando o formulário for submetido
    $('#deleteProductForm').on('submit', function(event) {
        // Fecha o modal
        $('#confirmDeleteModal').modal('hide');
        });
    });

