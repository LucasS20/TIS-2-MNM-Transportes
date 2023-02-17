function cancelar(event)
{
    event.preventDefault();

    return Swal.fire({
        title: 'Prosseguir?',
        text: "Você tem certeza que deseja cancelar o cadastro de serviço?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#f58d8d',
        cancelButtonColor: '#7cb2ea',
        confirmButtonText: 'Cancelar',
        cancelButtonText: 'Continuar cadastro',
    }).then((result) => {
        if (result.isConfirmed) {
            return window.location.href = window.location.origin+"/painel";
        }
    })
}

async function cadastrar(event)
{
    event.preventDefault();

    const data = {
        cliente_id: document.querySelector("#cliente_id").value,
        endereco_retirada: document.querySelector("#endereco_retirada").value,
        endereco_entrega: document.querySelector("#endereco_entrega").value,
        data: document.querySelector("#data").value,
        quantidade_itens: document.querySelector("#quantidade_itens").value
    }

    Object.keys(data).map((key) => {
        if(! data[key]) {
            toastr.error("Preencha todos os campos para prosseguir.")
            throw new Error("ERROR")
        }
    });

    if(data.quantidade_itens < 1) {
        toastr.error("Marque pelo menos 1 item para ser enviado.", 'Erro');
        throw new Error("ERROR")
    }

    const response = await axios.post("/api/cadastrar_servico", data, {
        accept: 'application/json'
    }).then(res => res).catch(err => {
        toastr.error(err.response.data.message, 'Erro')
    });

    if(response.data.status !== 'error') {
        return Swal.fire({
            icon: 'success',
            title: 'Cadastrado',
            text: 'Serviço cadastrado com sucesso!'
        }).then(() => window.location.href = window.location.origin+"/painel")
    }
}
