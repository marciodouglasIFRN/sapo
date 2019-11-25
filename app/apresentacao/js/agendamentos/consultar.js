// Importação do arquivo ajax.js
var imp = document.createElement('script')
imp.src = 'apresentacao/js/ajax.js'
document.head.appendChild(imp)

form = document.getElementById('form-consultar')
form.addEventListener('submit', (event) => {
    event.preventDefault()
    cpf = document.getElementsByName('cpf')[0].value;
    secretaria = document.getElementsByName('select-secretarias')[0].value;
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

    secretaria = criaCelula(agendamento.sigla + '-' + agendamento.secretaria)
    servico = criaCelula(agendamento.servico)
    data = criaCelula(agendamento.data)
    botoes = criaCelula('')

    botaoEditar = criaBotao('Editar')
    botaoCancelar = criaBotao('Cancelar')

    botaoEditar.onclick = function() {
        modal.style.display = "block"
    }

    botoes.appendChild(botaoEditar)
    botoes.appendChild(botaoCancelar)

    linha.appendChild(secretaria)
    linha.appendChild(servico)
    linha.appendChild(data)
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
    btn.class = 'contact100-form-btn'
    btn.innerHTML = txt
    return btn
}


window.onload = function() {
    clienteAjax.get('http://localhost/marcio/sapo/app/secretarias', (data) => {
        console.log(data);

        secretarias = JSON.parse(data)
        console.log(secretarias)
        select = document.getElementsByName("select-secretarias")[0];
        montarCaixaDeSelecao(select, secretarias)
        select = document.getElementsByName("select-ecretarias-modal")[0];
        montarCaixaDeSelecao(select, secretarias)
        select.addEventListener("change", () => {
            secretaria = select.value
            clienteAjax.get('http://localhost/marcio/sapo/app/servicos', (data) => {
                console.log(data);
                servicos = JSON.parse(data);
                select = document.getElementsByName("select-servicos")[0];
                select.innerHTML = '';
                servicos.forEach(element => {
                    option = document.createElement('option');
                    option.innerHTML = element.nome;
                    option.value = element;
                    select.appendChild(option)
                })
            })
        })
    })
};

function montarCaixaDeSelecao(select, secretarias) {
    secretarias.forEach(element => {
        option = document.createElement('option');
        option.innerHTML = element.sigla + '-' + element.nome;
        option.value = element;
        select.appendChild(option)
    })
}