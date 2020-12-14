function confirma(id) {
    if(window.confirm("Tem certeza que deseja excluir?")) {
        location.href = 'excluir/?id='+id;
    }
}

function alterarPonto() {
    document.getElementById('preco').mask('000.000,00', { reverse: true });
}

