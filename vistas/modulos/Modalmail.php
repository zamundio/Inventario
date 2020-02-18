<!--=====================================
MODAL EDITAR USUARIO
======================================-->

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';


//Import PHPMailer classes into the global namespace


if (isset($_POST["submit"])) {
    //Create a new PHPMailer instance
    $mail = new PHPMailer;

    //Tell PHPMailer to use SMTP
    $mail->isSMTP();

    //Enable SMTP debugging
    // SMTP::DEBUG_OFF = off (for production use)
    // SMTP::DEBUG_CLIENT = client messages
    // SMTP::DEBUG_SERVER = client and server messages
    $mail->SMTPDebug = SMTP::DEBUG_OFF;

    //Set the hostname of the mail server
    $mail->Host = 'smtp.gmail.com';
    // use
    // $mail->Host = gethostbyname('smtp.gmail.com');
    // if your network does not support SMTP over IPv6

    //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
    $mail->Port = 465;

    //Set the encryption mechanism to use - STARTTLS or SMTPS
    $mail->SMTPSecure = 'ssl';

    //Whether to use SMTP authentication
    $mail->SMTPAuth = true;

    //Username to use for SMTP authentication - use full email address for gmail
    $mail->Username = 'helpdeskcegaf@menarini.es';

    //Password to use for SMTP authentication
    $mail->Password = 'Menarini2018';

    //Set who the message is to be sent from
    $mail->setFrom('sefernandez@menarini.es', 'Helpdesk Cegaf');

    //Set an alternative reply-to address
    //$mail->addReplyTo('sergio_fs@hotmail.com', 'First Last');

    //Set who the message is to be sent to
    $mail->addAddress($_POST["email"], $_POST["apellidos"] . ", " . $_POST["nombre"]);

    //Set the subject line
    $mail->Subject = $_POST["need"];

    //Read an HTML message body from an external file, convert referenced images to embedded,
    //convert HTML into a basic plain-text alternative body
    $mail->msgHTML($_POST["mensaje"]); //file_get_contents('contents.html'), __DIR__);//

    //Replace the plain text body with one created manually
    $mail->AltBody = $_POST["mensaje"];

    //Attach an image file
    //$mail->addAttachment('images/phpmailer_mini.png');

    //send the message, check for errors

    if (!$mail->send()) {

        echo '
			<script>
				$(document).ready(function(){
					swal("Ops ' . utf8_encode($nome) . '...","Houve um erro ao enviar a mensagem, tente novamente!", "error");
				});
			</script>';



    } else {

        echo '
		<script>
			$(document).ready(function(){
				swal("Mensaje Enviado !' . utf8_encode($nome) . '", "", "success")
			});
		</script>';

    }

    //Section 2: IMAP
    //IMAP commands requires the PHP IMAP Extension, found at: https://php.net/manual/en/imap.setup.php
    //Function to call which uses the PHP imap_*() functions to save messages: https://php.net/manual/en/book.imap.php
    //You can use imap_getmailboxes($imapStream, '/imap/ssl', '*' ) to get a list of available folders or labels, this can
    //be useful if you are trying to get this working on a non-Gmail IMAP server.
    function save_mail($mail)
    {
        //You can change 'Sent Mail' to any other folder or tag
        $path = '{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail';

        //Tell your server to open an IMAP connection using the same username and password as you used for SMTP
        $imapStream = imap_open($path, $mail->Username, $mail->Password);

        $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
        imap_close($imapStream);

        return $result;
    }
}

?>



<div id="modalMail" class="modal fade" role="dialog">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <form id="contact-form" method="post" role="form">

                <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Enviar Mail</h4>

                </div>

                <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

                <div class="modal-body">

                    <div class="box-body">

                        <div class="messages"></div>

                        <div class="controls">

                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="nombre">Nombre *</label>
                                        <input id="nombre" type="text" name="nombre" class="form-control" placeholder="Please enter your firstname *" required="required" data-error="Firstname is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="apellidos">Apellidos *</label>
                                        <input id="apellidos" type="text" name="apellidos" class="form-control" placeholder="Please enter your lastname *" required="required" data-error="Lastname is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email *</label>
                                        <input id="email" type="email" name="email" class="form-control" placeholder="Please enter your email *" required="required" data-error="Valid email is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_need">Requerimiento *</label>
                                        <select id="form_need" name="need" class="form-control" required="required" data-error="Please specify your need.">
                                            <option value=""></option>
                                            <option value="Peticion datos">Petición datos</option>
                                            <option value="Envio equipo">Envio equipo</option>
                                            <option value="Solicitud equipo">Solicitud equipo</option>
                                            <option value="Otros">Otros</option>
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="row">
                                            <!-- reply content -->
                                            <div class="form-group " id="reply_content_class">
                                                <div class="col-md-2">
                                                    <label for="Reply Content">Mensaje:</label><span class="text-red"> *</span>
                                                </div>
                                                <div class="col-md-10">
                                                    <div id="newtextarea">
                                                        <textarea style="width:98%;height:20%;" name="mensaje" class="form-control" id="mensaje"></textarea>
                                                    </div>

                                                    <script src="//cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
                                                    <script>
                                                        CKEDITOR.replace('mensaje', {
                                                            toolbarGroups: [{
                                                                    "name": "basicstyles",
                                                                    "groups": ["basicstyles"]
                                                                },
                                                                {
                                                                    "name": "links",
                                                                    "groups": ["links"]
                                                                },
                                                                {
                                                                    "name": "paragraph",
                                                                    "groups": ["list", "blocks"]
                                                                },
                                                                {
                                                                    "name": "document",
                                                                    "groups": ["mode"]
                                                                },
                                                                {
                                                                    "name": "insert",
                                                                    "groups": ["insert"]
                                                                },
                                                                {
                                                                    "name": "styles",
                                                                    "groups": ["styles"]
                                                                },
                                                                {
                                                                    "name": "about",
                                                                    "groups": ["about"]
                                                                }
                                                            ],

                                                            removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Styles,Specialchar'
                                                        });
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <input type="submit" class="btn btn-success btn-send" name="submit" value="Enviar mensaje">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p class="text-muted">
                                    <strong>*</strong> Datos requeridos

                            </div>
                        </div>
                    </div>





                </div>

        </div>

        </form>


    </div>

</div>




