<?php
include ("conexao.php");

$executa = $db->prepare("select * from responsavel where email=:email");

$executa->bindParam(':email',$_POST['email']);
$executa->execute();


$linha=$executa->fetch(PDO::FETCH_OBJ);

$dados['email'] = $linha->email;
$dados['nome'] = $linha->nome;
$string_to_encrypt = json_encode($dados);

$encrypted_string = openssl_encrypt($string_to_encrypt,"AES-128-ECB",$password_encrypt);

$url = "http://localhost/Clementina/trocar_senha.php?id=" . urlencode($encrypted_string);


include_once ("PHPMailer_5.2.0/class.phpmailer.php");

$mail = new PHPMailer(true);
$mail->IsSMTP(); // Define que a mensagem será SMTP
try {
    $mail->Host = 'smtp.face.br'; // Endereço do servidor SMTP (Autenticação, utilize o host smtp.seudomínio.com.br)
    $mail->SMTPAuth   = true;  // Usar autenticação SMTP (obrigatório para smtp.seudomínio.com.br)
    $mail->Port       = 587; //  Usar 587 porta SMTP
    $mail->Username = 'col.gustavo.moreira'; // Usuário do servidor SMTP (endereço de email)
    $mail->Password = 'fabiolam'; // Senha do servidor SMTP (senha do email usado)

    //Define o remetente
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    $mail->SetFrom('col.gustavo.moreira@uniuv.edu.br', 'Gustavo'); //Seu e-mail
    $mail->AddReplyTo('col.gustavo.moreira@uniuv.edu.br', 'Gustavo'); //Seu e-mail
    $mail->Subject = 'Recuperar senha Clementina Lona Costa';//Assunto do e-mail


    //Define os destinatário(s)
    //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    $mail->AddAddress($linha->email, $linha->nome);

    //Campos abaixo são opcionais
    //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    //$mail->AddCC('destinarario@dominio.com.br', 'Destinatario'); // Copia
    //$mail->AddBCC('destinatario_oculto@dominio.com.br', 'Destinatario2`'); // Cópia Oculta
    //$mail->AddAttachment('images/phpmailer.gif');      // Adicionar um anexo


    //Define o corpo do email
    $mensagem = "Clique abaixo para trocar sua senha:<br>
    <a href='{$url}'>{$url}</a>";

    $mail->MsgHTML($mensagem);

    ////Caso queira colocar o conteudo de um arquivo utilize o método abaixo ao invés da mensagem no corpo do e-mail.
    //$mail->MsgHTML(file_get_contents('arquivo.html'));

   if( $mail->Send()) {

    $ret['status'] =1;
    $ret['mensagem'] = 'Por favor, Verifique seu email';
   }
   

    //caso apresente algum erro é apresentado abaixo com essa exceção.
}catch (phpmailerException $e) {
    echo $e->errorMessage();
     //Mensagem de erro costumizada do PHPMailer
}
echo json_encode($ret);