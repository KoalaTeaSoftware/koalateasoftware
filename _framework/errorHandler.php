<?php
$logFile = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "error_log";
error_reporting(-1); // that is every possible error will be trapped
ini_set('display_errors', 'Off');
ini_set('log_errors', 'On');
ini_set('error_log', $logFile);

set_error_handler('errorHandler', E_ALL | E_STRICT);

if (file_exists($logFile)) {
    unlink($logFile);
}

error_log("Server:" . print_r($_SERVER, true));
error_log("Get:" . print_r($_GET, true));
error_log("Post:" . print_r($_POST, true));
error_log("-----------------------------------------------------------");
/**
 * The function used instead of the PHP default logging function. Its name is in the ini_set (above)
 * @param $errNo - system provided
 * @param $errStr - system provided
 * @param $errFile - system provided
 * @param $errLine - system provided
 */
function errorHandler($errNo, $errStr, $errFile, $errLine)
{
    /** @noinspection SpellCheckingInspection */
    error_log(
        "\n-------------------------------------------\n" .
        "ErrStr: " . $errStr . "\n" .
        "Locn: " . $errFile . "\n" .
        "Line: " . $errLine . "\n" .
        "ErrNo: " . $errNo . "\n" .
        "-------------------------------------------\n");
}
