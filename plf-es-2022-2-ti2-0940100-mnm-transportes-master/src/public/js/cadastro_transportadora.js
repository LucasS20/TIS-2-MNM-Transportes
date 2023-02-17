async function cadastro(event)
{
    event.preventDefault();

    const data = new FormData(event.target);

    for (let value of data.values()) {
        if (! value) {
            toastr.error('Preencha os campos corretamente para prosseguir.');
            throw new Error("ERROR");
        }
    }

    if (data.get('senha') !== data.get('senha_confirmation')) {
        return toastr.error('As senhas informadas não coincidem.');
    }


    const response = await axios.post('/api/cadastrar_transportadora', data)
        .then(res => res).catch(err => {
            toastr.error(err.response.data.message)
        });

    if (! response.data.message) {
        return window.location.href = window.location.origin+'/painel'
    }
}

