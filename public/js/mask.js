$(document).ready(function(){

    const options = {
        onKeyPress: function (cpf, ev, el, op) {
            const masks = ['000.000.000-000', '00.000.000/0000-00'];
            $('#cpfcnpj').mask((cpf.length > 14) ? masks[1] : masks[0], op);
        }
    }
    $('#cpfcnpj').length > 11 ? $('#cpfcnpj').mask('00.000.000/0000-00', options) : $('#cpfcnpj').mask('000.000.000-00#', options);

    $('#fone').mask('(00) 00000-0000');
    $('#cep').mask('00.000-000');
    $('#search_cep').mask('00.000-000');
    $('#search_code').mask('000000000000000');
});