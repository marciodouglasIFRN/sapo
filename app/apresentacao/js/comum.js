// Importação do arquivo ajax.js
var imp = document.createElement('script')
imp.src = 'apresentacao/js/ajax.js'
document.head.appendChild(imp)

function criaCelula(valor) {

    celula = document.createElement('td')
    celula.innerHTML = valor

    return celula
}

function montarOption(select, html, value) {
    option = document.createElement('option')
    option.innerHTML = html
    option.value = JSON.stringify(value)
    select.appendChild(option)
}

function criaBotao(txt, classe, id) {
    btn = document.createElement('button')
    btn.id = id
    btn.class = classe
    btn.innerHTML = txt
    return btn
}