// Importação do arquivo ajax.js
var imp = document.createElement('script')
imp.src = 'apresentacao/js/ajax.js'
document.head.appendChild(imp)

form = document.getElementById('form-consultar')
number = 157;
form.addEventListener('submit', (event) => {
    event.preventDefault()
    cpf = document.getElementsByName('cpf')[0].value;
    secretaria = document.getElementsByName('service')[0].value;
    document.querySelector('tbody').innerHTML = 'Carregando...'
    clienteAjax.post('http://localhost/marcio/sapo/app/obter', { cpf: cpf, secretaria: secretaria }, (data) => {
        agendamentos = JSON.parse(data)

        if (agendamentos.length === 0) {
            document.querySelector('tbody').innerHTML = 'Sem agendamento marcado para esse CPF'

        } else {
            render(agendamentos)

        }


    })

})

function render(agendamentos) {
    tabela = document.querySelector('tbody')
    document.querySelector('tbody').innerHTML = ''
    agendamentos.forEach(element => {
        linha = criaLinha(element)
        tabela.appendChild(linha)
    });
}

function criaLinha(agendamento) {

    linha = document.createElement('tr')

    id = criaCelula(agendamento.id)
    data = criaCelula(agendamento.data)
    cidadao = criaCelula(agendamento.cidadao)
    botoes = criaCelula('')

    botaoEditar = criaBotao('Editar')
    botaoCancelar = criaBotao('Cancelar')

    botaoEditar.onclick = function() {
        modal.style.display = "block"
    }

    botoes.appendChild(botaoEditar)
    botoes.appendChild(botaoCancelar)

    linha.appendChild(id)
    linha.appendChild(data)
    linha.appendChild(cidadao)
    linha.appendChild(botoes)

    return linha;
}

function criaCelula(valor) {

    celula = document.createElement('td')
    celula.innerHTML = valor

    return celula
}

function criaBotao(txt) {
    btn = document.createElement('button')
    btn.id = 'myBtn'
    btn.innerHTML = txt
    return btn
}