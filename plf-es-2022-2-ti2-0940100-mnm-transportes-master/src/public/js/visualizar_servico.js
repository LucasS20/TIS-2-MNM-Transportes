function moneyMask(value) {
    value = value.replace('.', '').replace(',', '').replace(/\D/g, '')

    const options = { minimumFractionDigits: 2 }
    const result = new Intl.NumberFormat('pt-BR', options).format(
        parseFloat(value) / 100
    )

    console.log(result)

    return 'R$ ' + result
}

function setMask(event) {
    if(/\d/.test(event.target.value)) {
        event.target.value = moneyMask(event.target.value)
    } else event.target.value = ""
}

function enviarProposta(event)
{
    event.preventDefault();

    const data = {
        orcamento: document.querySelector("#proposta_cliente").value,
        servico_id: document.querySelector("#servico_id").value,
        transportadora_id: document.querySelector("#transportadora_id").value,
        cliente_id: document.querySelector("#cliente_id").value
    }

    if (! data.orcamento) {
        return toastr.error("Digite o valor da sua proposta.");
    }

    return Swal.fire({
        title: 'Confirmar valor',
        text: "Deseja confirmar o valor de "+data.orcamento+" como proposta para sua entrega?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#7cb2ea',
        cancelButtonColor: '#f58d8d',
        confirmButtonText: 'Confirmar valor',
        cancelButtonText: 'Revisar',
        reverseButtons: true
    }).then(async (result) => {
        if (result.isConfirmed) {
            const response = await axios.post("/api/fazer_orcamento/"+data.servico_id, data)
                .then(res => res)
                .catch((err) => {
                    return Swal.fire({
                        icon: 'error',
                        title: 'Erro',
                        text: err.response.data.message,
                        confirmButtonText: 'Ok'
                    })
                })

            return Swal.fire({
                icon: 'success',
                title: 'Confirmado',
                text: response.data.message,
                confirmButtonText: 'Prosseguir'
            }).then(() => window.location.reload())
        }
    })
}

function aceitarValor(event, idServico)
{
    event.preventDefault();

    const data = {
        valor_proposta: document.querySelector("#proposta_transportadora").value
    }

    return Swal.fire({
        title: 'Confirmar valor',
        text: "Deseja confirmar o valor de R$ "+data.valor_proposta+" como proposta para sua entrega?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#7cb2ea',
        cancelButtonColor: '#f58d8d',
        confirmButtonText: 'Confirmar valor',
        cancelButtonText: 'Revisar',
        reverseButtons: true
    }).then(async (result) => {
        if (result.isConfirmed) {
            const response = await axios.post(`/api/aceitar_proposta/${idServico}`, data)
                .then(res => res).catch((err) => {
                    return toastr.error(err.response.data.message)
                })

            if (response.data.status !== 'ok') {
                return toastr.error(response.data.message)
            }

            return Swal.fire({
                icon: 'success',
                title: 'Confirmado',
                text: response.data.message,
                confirmButtonText: 'Pagar'
            }).then(() => window.location.href = response.data.preference)
        }
    })
}

let rateValue;

async function avaliar(event)
{
    event.preventDefault();

    if (! rateValue) {
        return Swal.fire({
            icon: 'warning',
            text: 'Certifique-se de selecionar uma nota valida antes de avaliar.'
        })
    }

    const data = {
        cliente_id: $("#cliente_id").val(),
        nota: rateValue,
        comentario: $("#comentario").val()
    }

    const response = await axios.post("/api/servico/"+$("#servico_id").val()+"/avaliar", data)
        .then(res => res)
        .catch((err) => {
            return Swal.fire({
                icon: 'error',
                title: 'Erro',
                text: err.response.data.message,
            });
        });


    return Swal.fire({
        icon: 'success',
        title: 'Sucesso!',
        text: response.data.message,
    }).then(() => window.location.reload());
}

$(':radio').change(function() {
    $(".comment-page").slideDown();
    rateValue = this.value
});
