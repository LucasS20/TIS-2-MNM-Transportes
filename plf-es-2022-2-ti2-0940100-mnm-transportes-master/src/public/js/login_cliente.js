toastr.options = {
    "preventDuplicates": true,
    "preventOpenDuplicates": true
};

async function login()
{
    const email = document.getElementById('usuario')
    const senha = document.getElementById('senha')

    if (email.value === '' || senha.value === '') {
        return toastr.error('Certifique-se de preencher os campos corretamente!', 'Erro')
    }

    await axios.post('/api/login_cliente', {
        email: email.value,
        senha: senha.value
    }).then(() => window.location.href = window.location.origin+"/painel")
        .catch((error) => toastr.error(error.response.data.message, 'Erro'))
}
