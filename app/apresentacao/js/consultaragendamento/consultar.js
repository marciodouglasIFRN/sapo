// Importação do arquivo ajax.js
var imp = document.createElement('script')
imp.src = 'js/ajax.js'
document.head.appendChild(imp)


form = document.getElementById('form-consultar')
number = 157;
form.addEventListener('submit', (event) => {
    event.preventDefault()
    clienteAjax.post('FrontController.php', { cpt: '123', secretaria: '12' }, (data) => {
        alert(data)
    })
    number++
    document.querySelector('tbody').innerHTML = '<tr>' +
        '<td>Secretaria de Desvio de Verbas</td>' +
        '<td>Prédio ' + number + '</td>' +
        '<td>9 horas</td>' +
        '<td>12 horas</td>' +
        '</tr>'

})