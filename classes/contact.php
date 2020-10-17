<?php if ( !isset( $_SESSION ) ) session_start();

if ( !$_POST ) exit;

if ( !defined( "PHP_EOL" ) ) define( "PHP_EOL", "\r\n" );

///////////////////////////////////////////////////////////////////////////

// Simple Configuration Options

// Enter the email address that you want to emails to be sent to.
// Example $address = "joe.doe@yourdomain.com";

$address = "siniestros@laparaguaya.com.py";





// END OF Simple Configuration Options

///////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////
//
// Do not edit the following lines
//
///////////////////////////////////////////////////////////////////////////

$postValues = array();
foreach ( $_POST as $name => $value ) {
    $postValues[$name] = trim( $value );
}
extract( $postValues );

$error = '';

///////////////////////////////////////////////////////////////////////////
//
// Begin verification process
//
// You may add or edit lines in here.
//
// To make a field not required, simply delete the entire if statement for that field.
//
///////////////////////////////////////////////////////////////////////////


////////////////////////
// Required fields
/*
if ( empty( $name )) {
    $error .= '<li>El nombre es requerido.</li>';
}
if ( empty( $telefono )) {
    $error .= '<li>El telefono es requerido.</li>';
}
if ( empty( $tipo )) {
    $error .= '<li>El tipo de auto es requerido.</li>';
}
if ( empty( $marca )) {
    $error .= '<li>La marca del auto es requerido</li>';
}
if ( empty( $chapa_n )) {
    $error .= '<li>El número de chapa es requerido.</li>';
}
if ( empty( $nombre_asegurado )) {
    $error .= '<li>El nombre del asegurado es requerido</li>';
}
if ( empty( $guiado )) {
    $error .= '<li>Quien lo guiaba es requerido.</li>';
}
if ( empty( $registro )) {
    $error .= '<li>El numero de registro es requerido.</li>';
}
if ( empty( $categoria )) {
    $error .= '<li>La categoria es requerida.</li>';
}
if ( empty( $otorgado )) {
    $error .= '<li>A quien fue otorgado es requerido.</li>';
}
if ( empty( $direccion_accidente )) {
    $error .= '<li>La direccion del accidente de es requerida.</li>';
}
if ( empty( $narracion )) {
    $error .= '<li>La narración completa es requerida.</li>';
}
////////////////////////


////////////////////////
// Email field is required
if ( empty( $email ) ) {
    $error .= '<li>El email es requerido.</li>';
} elseif ( !isEmail( $email ) ) {
    $error .= '<li>Ingresaste un email invalido.</li>';
}
////////////////////////



////////////////////////


////////////////////////
// Verification code is required

if ( $session_verify != $posted_verify ) {
    $error .= '<li>El codigo de verificacion es incorrecto.</li>';
}
////////////////////////
*/
if ( !empty($error) ) {
    echo '<div class="error_message"><h2>ERROR!</h2>';
    echo '<ul class="error_messages">' . $error . '</ul>';
    echo '</div>';

    // Important to have return false in here.
    return false;
}

// Advanced Configuration Option.
// i.e. The standard subject will appear as, "You've been contacted by John Doe."

$e_subject = "Denuncia online de " . $name.' en La Paraguaya SA de Seguros';

// Advanced Configuration Option.
// You can change this if you feel that you need to.
// Developers, you may wish to add more fields to the form, in which case you must be sure to add them here.

/*$msg  = "Te contacto $name via la web de Panal. Comento esto: " . PHP_EOL . PHP_EOL;
$msg .= $comments . PHP_EOL . PHP_EOL;
$msg .= "Su email de contacto es:  $email" . PHP_EOL . PHP_EOL;
//$msg .= "$name chose option: $agree";
$msg .= "-------------------------------------------------------------------------------------------" . PHP_EOL;
$msg .= "Este email se envio via la web de PanalCobranzas.com.py";


$msg = wordwrap( $msg, 70 ); */
include ('basic.php');


$headers = "From: La Paraguaya SA de Seguros <" . $address . ">\r\n";
$headers .= "Reply-To: ". $email . "\r\n";
$headers .= "CC: ".$email."\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

if ( mail( $address, $e_subject, $msg, $headers ) ) {

    echo "<fieldset>";
    echo "<div id='success_page'>";
    echo "<h2>Excelente!</h2>";
    echo "<p>Tu Email ha sido enviado y sera respondido en la brevedad posible. <br/>
    Por seguridad y para su tranquilidad,hemos enviado esta copia que ve aqui a su email!</p>";
    echo "</div>";
    echo "</fieldset>";
    echo $msg;
    // Important to have return false in here.
    return false;
}


///////////////////////////////////////////////////////////////////////////
//
// Do not edit below this line
//
///////////////////////////////////////////////////////////////////////////
echo 'ERROR! Please confirm PHP mail() is enabled.';
return false;

function isEmail( $email ) { // Email address verification, do not edit.

    return preg_match( "/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|me|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i", $email );

}
?>
