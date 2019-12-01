form = document.getElementById('form-consultar')
if (form != null) {
    form.addEventListener('submit', (event) => {
        event.preventDefault()
        cpf = document.getElementsByName('cpf')[0].value;
        secretaria = document.getElementsByName('select-secretarias')[0].value;
        document.querySelector('tbody').innerHTML = 'Carregando...'
        new Ajax().post('http://localhost/marcio/sapo/app/obter', { cpf: cpf, secretaria: secretaria }, (data) => {
            console.log(data);


            agendamentos = JSON.parse(data)

            if (agendamentos.length === 0) {
                document.querySelector('tbody').innerHTML = 'Sem agendamento marcado para esse CPF'
            } else {
                render(agendamentos)
            }


        })

    })

}

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

    botaoEditar = criaBotao('Editar', 'contact100-form-btn', 'myBtn')
    botaoCancelar = criaBotao('Cancelar', 'contact100-form-btn', 'myBtn')

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






window.onload = function() {
    new Ajax().get('http://localhost/marcio/sapo/app/secretarias', (data) => {
        console.log(data);
        secretarias = JSON.parse(data)
        secretarias.forEach(element => {
            select = document.getElementsByName("select-secretarias")[0];
            montarOption(select, element.sigla + '-' + element.nome, element)
        })
    })
};