<?php

/**
 * Envio de emails HTML simples
 * É muito simples, basta enviar um array com as configurações e enviar o email
 * O REMETENTE não é obrigatório, mas é altamente recomendado que seja passado.
 * $email = new enviaEmail('email@email.com', 'Envio de email HTML', 'Sua  <b>Mensagem</b> em <i>HTML</i>', 'seu_email@email.com');
 * $email->cc = 'email1@email.com,email2@email.com';
 * $email->bcc = 'email1@email.com,email2@email.com';
 * $envio = $email->enviar();	 
 * 
 * @author Marlon U. Marcello <marlon.marcello@gmail.com>
 * @version 1.0
 */
class enviaEmail {

    public $para;
    public $assunto;
    public $mensagem = '';
    public $remetente = '';
    protected $quebraLinha;
    public $cc;
    public $bcc;

    /**
     * 
     * Inicia a classe
     *
     * @param string $para Email do destinatário
     * @param string $assunto Assunto do email 
     * @param string $mensagem Mensagem em HTMl a ser enviada
     * @param string $remetente Email de quem esta enviando. Não é obrigatório mas é altamente recomendado
     */
    function __construct($para, $assunto, $mensagem = '', $remetente = '') {

        // Para
        if (strlen($para) <= 0)
            throw new Exception('O destinatário não foi indicado.');
        else
            $this->para = $para;

        // Assunto
        if (strlen($assunto) <= 0)
            throw new Exception('O assunto não foi informado.');
        else
            $this->assunto = $assunto;

        // Mensagem
        if (strlen($mensagem) > 0)
            $this->mensagem = $mensagem;

        // Remetente
        $this->remetente = (strlen($remetente) > 0) ? $remetente : "webmaster@" . $_SERVER[HTTP_HOST];


        // Quebra de linha no header
        $this->setQuebraLinha();
    }

    /**
     * 
     * Seta a quebra de linha para o header			
     */
    public function setQuebraLinha() {
        if (PHP_OS == "Linux")
            $this->quebraLinha = "\n";
        elseif (PHP_OS == "WINNT")
            $this->quebraLinha = "\r\n";
        else
            throw new Exception("Este script nao esta preparado para funcionar com o sistema operacional de seu servidor");
    }

    /**
     * 
     * Monta a mensagem HTML a partir de um arquivo
     *
     * @param string $arquivo Caminho até o arquivo html
     * @param array $dados Array associativo de dados
     */
    public function mensagemDeArquivo($arquivo, $dados = array()) {
        if (strlen($arquivo) <= 0)
            throw new Exception("Arquivo não informado");

        $conteudo = file_get_contents($arquivo);
        if (count($dados) > 0) {
            foreach ($dados as $key => $value) {
                $conteudo = str_replace("%$key%", ($value), $conteudo);
            }
        }
        $this->mensagem = $conteudo;
    }

    /**
     * 
     * Envia o email.
     * É importante notar que somente pelo o email ser aceito para entrega, não significa que o email alcancará o destino esperado.
     * http://php.net/manual/pt_BR/function.mail.php
     * 		
     * @return boolean Retorna TRUE se o email foi aceito com sucesso para entrega, FALSE caso contrário.
     */
    public function enviar() {

        if (strlen($this->mensagem) <= 0)
            throw new Exception("Não foi informado nenhuma mensagem a ser enviada");

        $headers = "MIME-Version: 1.1" . $this->quebraLinha;
        $headers .= "Content-type: text/html; charset=utf-8" . $this->quebraLinha;
        $headers .= "From: " . $this->remetente . $this->quebraLinha;
        $headers .= "Return-Path: " . $this->remetente . $this->quebraLinha;
        if (strlen($this->cc) > 0)
            $headers .= "Cc: " . $this->cc . $this->quebraLinha;
        if (strlen($this->bcc) > 0)
            $headers .= "Bcc: " . $this->bcc . $this->quebraLinha;
        $headers .= "Reply-To: " . $this->remetente . $this->quebraLinha;

        $email = mail($this->para, $this->assunto, $this->mensagem, $headers, "-r" . $this->remetente);

        return $email;
    }

}

?>