function obterServicos(id) {
    new Ajax().get('http://localhost/marcio/sapo/app/servicos?secretaria_id=' + id, (data) => {
        // console.log(data)
        servicos = JSON.parse(data);
        selectservicos = document.getElementsByName("select-servico")[0];
        selectservicos.innerHTML = '';
        servicos.forEach(element => {
            montarOption(selectservicos, element.nome, element)
        })
    })
}

function obterDias(id) {
    new Ajax().get('http://localhost/marcio/sapo/app/dias?secretaria_id=' + id, (data) => {
        dias = JSON.parse(data)
        htable = document.getElementsByTagName('thead')[0]
        htable.innerHTML = ''
        btable = document.getElementsByTagName('tbody')[0]
        btable.innerHTML = ''
        diaAtendimento = document.getElementsByName('dt-atendimento')[0]
        diaAtendimento.innerHTML = ''
        tr = document.createElement('tr')
        dias.forEach((dia, index) => {

            tdia = document.createElement('th')
            tdia.innerHTML = dia.nome
            htable.appendChild(tdia)
            montarOption(diaAtendimento, dia.nome, dia)
            td = criaCelula(dia.atendimentos)
            tr.appendChild(td)
            btable.appendChild(tr)
        })


    })
}

function obterSecretarias() {
    new Ajax().get('http://localhost/marcio/sapo/app/secretarias', (data) => {
        secretarias = JSON.parse(data)
        obterServicos(secretarias[0].id)
        secretarias.forEach(element => {
            select = document.getElementsByName("select-secretarias")[0];
            montarOption(select, element.sigla + '-' + element.nome, element)
        })

        select.addEventListener("change", () => {
            secretaria = JSON.parse(select.value)
            obterServicos(secretaria.id)
            obterDias(secretaria.id)
        })
    })
}

function agendar() {
    form = document.getElementById('form-agendar')
    form.addEventListener('submit', (event) => {
        event.preventDefault()
        cpf = document.getElementsByName('cpf')[0].value
        nome = document.getElementsByName('nome')[0].value
        servico = JSON.parse(document.getElementsByName('select-servico')[0].value)
        dia = document.getElementsByName('dt-atendimento')
        new Ajax().post('http://localhost/marcio/sapo/app/agendamentos', { cpf: cpf, nome: nome, servico_id: servico.id }, (data) => {
            console.log(data);

        })
    })
}
window.onload = function() {
    obterSecretarias()
    obterDias(1)
    agendar()

}