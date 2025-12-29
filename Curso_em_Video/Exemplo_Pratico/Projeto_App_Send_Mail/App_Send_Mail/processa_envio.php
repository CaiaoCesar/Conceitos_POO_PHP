<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    require_once __DIR__ . '/../../env.php'; // Caminho correto para seu env.php

    class Mensagem {
        private $para = null; 
        private $assunto = null; 
        private $mensagem = null; 
        public $status = array('codigo_status' => null, 'descricao_status' => '');

        public function __get($atributo) {
            return $this->$atributo;
        }

        public function __set($atributo, $valor) {
            $this->$atributo = $valor;
        }

        public function mensagemValida() {
            if(empty($this->para) || empty($this->assunto) || empty($this->mensagem)) {
                return false;
            }
            return true; 
        }
    }

    $mensagem = new Mensagem();

    $mensagem->__set('para', $_POST['para']);
    $mensagem->__set('assunto', $_POST['assunto']);
    $mensagem->__set('mensagem', $_POST['mensagem']);

    if(!$mensagem->mensagemValida()) {
        echo 'Mensagem inválida. Preencha todos os campos.';
        die();
    }

    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = false;
        $mail->isSMTP();
        $mail->Host       = $_ENV['EMAIL_HOST'] ?? 'smtp.gmail.com'; 
        $mail->SMTPAuth   = true;
        $mail->Username   = $_ENV['EMAIL_USER'] ?? ''; 
         $mail->Password   = $_ENV['EMAIL_PASSWORD'] ?? '';                     
        $mail->SMTPSecure = $_ENV['EMAIL_SECURE'] ?? PHPMailer::ENCRYPTION_STARTTLS; 
        $mail->Port       = $_ENV['EMAIL_PORT'] ?? 587; 

        //Recipients
        $mail->setFrom(
            $_ENV['EMAIL_USER'] ?? '',                                     
            $_ENV['EMAIL_FROM_NAME'] ?? 'App Send Mail'                      
        );
        $mail->addAddress($mensagem->__get('para'));


        //Content
        $mail->isHTML(true);
        $mail->Subject = $mensagem->__get('assunto');
        $mail->Body    = $mensagem->__get('mensagem');
        $mail->AltBody = 'É necessário utilizar um client que suporte HTML para ter acesso total ao conteúdo dessa mensagem';

        $mail->send();

        $mensagem->status['codigo_status'] = 1;
        $mensagem->status['descricao_status'] = 'Email enviado com sucesso! ';
    } catch (Exception $e) {
        $mensagem->status['codigo_status'] = 2;
        $mensagem->status['descricao_status'] = 'Não foi possível enviar este email. Detalhes: ' . $mail->ErrorInfo;
    }
?>

<!DOCTYPE html>
<html>  
    <head>
        <meta charset="utf-8" />
        <title>App Mail Send</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>

    <body> 
        <div class="container">  
            <div class="py-3 text-center">
                <img class="d-block mx-auto mb-2" src="logo.png" alt="" width="72" height="72">
                <h2>Send Mail</h2>
                <p class="lead">Seu app de envio de e-mails particular!</p>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <?php if($mensagem->status['codigo_status'] == 1) { ?>
                        <div class="container">
                            <h1 class="display-4 text-success">Sucesso!</h1>
                            <p><?php echo $mensagem->status['descricao_status']; ?></p>
                            <a href="index.php" class="btn btn-success btn-lg mt-5 text-white">Voltar</a>
                        </div>
                    <?php } ?>

                    <?php if($mensagem->status['codigo_status'] == 2) { ?>
                        <div class="container">
                            <h1 class="display-4 text-danger">Ops!</h1>
                            <p><?php echo $mensagem->status['descricao_status']; ?></p>
                            <a href="index.php" class="btn btn-success btn-lg mt-5 text-white">Voltar</a>
                        </div>
                    <?php } ?>
                </div>
            </div>    
        </div>
    </body>
</html>