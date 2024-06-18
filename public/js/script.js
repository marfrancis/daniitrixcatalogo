$(document).ready(function () {
    let currentPage = 1;
    const itemsPerPage = 12;

    function loadProducts() {
        console.log('Iniciando carregamento de produtos...');
        $.ajax({
            url: `http://www.daniitrix.com.br/api.php?page=${currentPage}&limit=${itemsPerPage}`,
            method: 'GET',
            success: function (response) {
                console.log('Resposta da API:', response);

                if (response.error) {
                    console.log('Erro na resposta:', response.error);
                    return;
                }

                if (response.length === 0) {
                    console.log('Nenhum produto encontrado.');
                    return;
                }

                response.forEach(product => {
                    $('#product-list').append(`
                        <div class="col-6 col-md-3">
                            <div class="product-card">
                                <img src="${product.imagem}" alt="${product.titulo}">
                                <div class="product-title">${product.titulo}</div>
                                <div class="product-code">Código: ${product.codigo}</div>
                                <div class="product-price">R$ ${product.valor}</div>
                            </div>
                        </div>
                    `);
                });

                currentPage++;
            },
            error: function (err) {
                console.error('Erro ao carregar produtos:', err);
                console.log('Detalhes do erro:', err);
                console.log('readyState:', err.readyState);
                console.log('status:', err.status);
                console.log('responseText:', err.responseText);
            }
        });
    }

    $('#load-more').click(loadProducts);

    loadProducts(); // Carregar os primeiros produtos
});
