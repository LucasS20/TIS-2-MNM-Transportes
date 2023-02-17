toastr.options = {
    "preventDuplicates": true,
    "preventOpenDuplicates": true
};

async function cadastrar(event)
{
    event.preventDefault();

    const data = {
        nome_completo: document.getElementById('nome_completo').value,
        email: document.getElementById('email').value,
        senha: document.getElementById('senha').value,
        senha_confirmation: document.getElementById('senha_confirmation').value,
        telefone: document.getElementById('telefone').value,
        cpf: document.getElementById('cpf').value
    };

    Object.keys(data).map((key) => {
        if(!data[key]) {
            toastr.error('Preenche todos os campos antes de prosseguir.', 'Erro');
            throw new Error("ERROR")
        }
    })

    if(data.senha !== data.senha_confirmation) {
        toastr.error('As senhas informadas não coincidem', 'Erro');
        throw new Error("ERROR")
    }

    await axios.post('/api/cadastrar_cliente', data).then(() => window.location.href = window.location.origin+"/painel")
        .catch((error) => toastr.error(error.response.data.message, 'Erro'));
}
