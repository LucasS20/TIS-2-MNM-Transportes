async function login(event)
{
    event.preventDefault();

    const data = new FormData(event.target)

    for(let value of data.values()) {
        if (! value) {
            toastr.error("Cerifique-se de preencher todos os campos.")
            throw new Error("ERROR")
        }
    }

    const response = await axios.post("/api/login_transportadora", data)
        .then(res => res).catch(err => {
            toastr.error(err.response.data.message)
            throw new Error("ERROR")
        })

    if (response.data.status === 'error') {
        return toastr.error(response.data.message)
    }

    if (! response.data.message) {
        return window.location.href = window.location.origin+'/painel'
    }
}
