document.getElementById("form-orcamento").addEventListener(
    "submit",
    function (event) {
      event.preventDefault();

      const comentario = document.getElementById("comentarioLabel").value;
      const valor = document.getElementById("valorlabel").value;

      console.log(`valor: ${valor} e comentario: ${comentario}`);
    }
)