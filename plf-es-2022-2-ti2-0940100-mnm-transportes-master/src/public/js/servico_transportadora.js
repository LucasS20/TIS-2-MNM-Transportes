$('#multiselect').multiSelect({

    // Custom templates
    'containerHTML': '<div class="multi-select-container mt-2 text-sm text-gray-700">',
    'menuHTML': '<div class="multi-select-menu text-gray-700 text-sm">',
    'buttonHTML': '<span class="multi-select-button border-0 border-b border-blue-400 rounded-none text-start shadow-none w-1/2">',
    'menuItemsHTML': '<div class="flex flex-col p-2 max-h-32 overflow-y-auto">',
    'menuItemHTML': '<label class="flex justify-start items-center cursor-pointer">',
    'presetsHTML': '<div class="multi-select-presets">',

    // sets some HTML (eg: <div class="multi-select-modal">) to enable the modal overlay.
    'modalHTML': undefined,

    // Active CSS class
    'activeClass': 'multi-select-container--open',

    // Text to show when no option is selected
    'noneText': 'Selecionar',

    // Text to show when all options are selected
    'allText': undefined,

    // an array of preset option groups
    // presets: [{
    //   name: 'All categories',
    //   all: true // select all
    // },{
    //   name: 'My categories',
    //   options: ['a', 'c']
    // }]
    'presets': undefined,

    // CSS class added to the container, when the menu is about to extend beyond the right edge of the position<a href="https://www.jqueryscript.net/menu/">Menu</a>Within element
    'positionedMenuClass': 'multi-select-container--positioned',

    // If you provide a jQuery object here, the plugin will add a class (see positionedMenuClass option) to the container when the right edge of the dropdown menu is about to extend outside the specified element, giving you the opportunity to use CSS to prevent the menu extending, for example, by allowing the option labels to wrap onto multiple lines.
    'positionMenuWithin': undefined,

    // The plugin will attempt to keep this distance, in pixels, clear between the bottom of the menu and the bottom of the viewport, by setting a fixed height style if the menu would otherwise approach this distance from the bottom edge of the viewport.
    'viewportBottomGutter': 20,

    // minimal height
    'menuMinHeight': 200

});

function moneyMask(value) {
    value = value.replace('.', '').replace(',', '').replace(/\D/g, '')

    const options = { minimumFractionDigits: 2 }
    const result = new Intl.NumberFormat('pt-BR', options).format(
        parseFloat(value) / 100
    )

    return 'R$ ' + result
}

function setMask(event) {
    if(/\d/.test(event.target.value)) {
        event.target.value = moneyMask(event.target.value)
    } else event.target.value = ""
}


async function fazerOrcamento(event)
{
    event.preventDefault();

    const data = {
        servico_id: document.querySelector("#servico_id").value,
        cliente_id: document.querySelector("#cliente_id").value,
        transportadora_id: document.querySelector("#transportadora_id").value,
        funcionarios: $("#multiselect").val(),
        orcamento: document.querySelector("#orcamento").value,
    };

    if (! data.servico_id) {
        return Swal.fire({
            'icon': 'error',
            'title': 'Erro',
            'text': 'Selecione os funcionários para o serviço.'
        })
    }

    if (! data.funcionarios) {
        return Swal.fire({
            'icon': 'error',
            'title': 'Erro',
            'text': 'Selecione os funcionários para o serviço.'
        })
    }

    const response = await axios.post('/api/fazer_orcamento/'+data.servico_id, data)
        .then((res) => res).catch((err) => {
            console.log(err.response);
            return Swal.fire({
                'icon': 'error',
                'title': 'Erro',
                'text': err.response.data.message
            })
        })

    return Swal.fire({
        'icon': 'success',
        'title': 'Sucesso',
        'text': response.data.message
    }).then(() => window.location.reload())
}


function aceitarProposta(event)
{
    event.preventDefault();

    const data = {
        valor_proposta: document.querySelector("#proposta_oferecida").value,
        servico_id: document.querySelector("#servico_id").value
    }

    Swal.fire({
        'icon': 'question',
        title: 'Confirmar valor',
        text: "Deseja confirmar o valor de "+data.valor_proposta+" como proposta para sua entrega?",
        showCancelButton: true,
        confirmButtonColor: '#7cb2ea',
        cancelButtonColor: '#f58d8d',
        confirmButtonText: 'Confirmar valor',
        cancelButtonText: 'Revisar',
        reverseButtons: true
    }).then(async (res) => {
        if (res.isConfirmed) {
            const response = await axios.post('/api/aceitar_proposta/'+data.servico_id, data)
                .then(res => res)
                .catch(err => {
                    console.log(err.response);
                    return Swal.fire({
                        'icon': 'error',
                        'title': 'Erro',
                        'text': err.response.data.message
                    })
                })

            return Swal.fire({
                'icon': 'success',
                'title': 'Sucesso',
                'text': response.data.message
            }).then(() => window.location.reload())
        }
    });
}

function cancelarServico(event)
{
    event.preventDefault();

    const data = {
        cancel_by: 'transportadora',
        servico_id: document.querySelector("#servico_id").value
    }

    Swal.fire({
        'icon': 'question',
        title: 'Confirmar valor',
        text: "Você tem certeza que deseja cancelar o serviço?",
        showCancelButton: true,
        confirmButtonColor: '#7cb2ea',
        cancelButtonColor: '#f58d8d',
        confirmButtonText: 'Cancelar',
        cancelButtonText: 'Voltar',
        reverseButtons: true
    }).then(async (res) => {
        if (res.isConfirmed) {
            const response = await axios.post('/api/cancelar_servico/'+data.servico_id, data)
                .then(res => res)
                .catch((err) => {
                    console.log(err.response);
                    return Swal.fire({
                        'icon': 'error',
                        'title': 'Erro',
                        'text': err.response.data.message
                    })
                })

            return Swal.fire({
                'icon': 'success',
                'title': 'Sucesso',
                'text': response.data.message
            }).then(() => window.location.reload())
        }
    })
}

function finalizarServico(event)
{
    event.preventDefault();

    const data = {
        servico_id: document.querySelector("#servico_id").value
    }

    Swal.fire({
        icon: 'question',
        title: 'Confirmar valor',
        text: "Você tem certeza que deseja finalizar o serviço?",
        showCancelButton: true,
        confirmButtonColor: '#7cb2ea',
        cancelButtonColor: '#f58d8d',
        confirmButtonText: 'Finalizar',
        cancelButtonText: 'Voltar',
        reverseButtons: true
    }).then(async (res) => {
        if (res.isConfirmed) {
            const response = await axios.post('/api/finalizar_servico/'+data.servico_id)
                .then(res => res)
                .catch((err) => {
                    console.log(err.response);
                    return Swal.fire({
                        'icon': 'error',
                        'title': 'Erro',
                        'text': err.response.data.message
                    })
                })

            return Swal.fire({
                'icon': 'success',
                'title': 'Sucesso',
                'text': response.data.message
            }).then(() => window.location.reload())
        }
    })
}
