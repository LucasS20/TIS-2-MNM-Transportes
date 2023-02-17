async function cadastrarFuncionario(event)
{
    event.preventDefault();

    const data = {
        nome: document.querySelector("#nome").value,
        transportadora_id: document.querySelector("#transportadora_id").value,
    }

    if (! data.nome) {
        return Swal.fire({
            icon: 'error',
            title: 'Erro ao cadastrar!',
            text: 'Certifique-se de preencher o campo nome antes de prosseguir.'
        })
    }

    await axios.post("/api/cadastrar_entregador", data)
        .then(() => {
            return Swal.fire({
                icon: 'success',
                title: 'Sucesso!',
                text: 'Funcionário cadastrado com sucesso!'
            }).then(() => window.location.reload())
        }).catch((err) => {
            return Swal.fire({
                icon: 'error',
                title: 'Erro ao cadastrar!',
                text: err.response.data.message
            })
        })
}

async function deletarFuncionario(event)
{
    let id = event.target.getAttribute('data-id-funcionario');

    const response = await Swal.fire({
        icon: 'question',
        title: 'Você tem certeza?',
        text: 'Você tem certeza que deseja remover o funcionário do sistema?',
        showCancelButton: true,
        showConfirmButton: true,
        cancelButtonText: 'Não',
        cancelButtonColor: "#3f79c3",
        confirmButtonText: "Remover",
        confirmButtonColor: "#e74b4b",
        reverseButtons: true
    }).then((response) => response)

    if (response.isConfirmed) {
        await axios.delete("/api/deletar_entregador/"+id)
            .then(() => {
                return Swal.fire({
                    icon: 'success',
                    title: 'Sucesso!',
                    text: 'Funcionário removido com sucesso!'
                }).then(() => window.location.reload())
            })
            .catch(err => {
                return Swal.fire({
                    icon: 'error',
                    title: 'Erro ao remover!',
                    text: err.response.data.message
                })
            })
    }
}

document.querySelector("#default-search").addEventListener('change', function (event) {

    if (event.target.value) {
        document.querySelector("#search").href = window.location.origin += "/funcionarios?search=" + encodeURI(event.target.value)
    } else
        document.querySelector("#search").href = "#"
});
