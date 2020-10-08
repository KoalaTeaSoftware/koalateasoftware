<?php
// embed the contents of the error handler directly here, in th hope of speed improvements
// it would probably be good to use the extracted handler file in /components
$logFile = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "error_log";

error_reporting(-1); // that is every possible error will be trapped
//ini_set('display_errors', 'Off');
ini_set('log_errors', 'On');
ini_set('error_log', $logFile);

/**
 * The function used instead of the PHP default logging function. Its name is in the ini_set (above)
 * @param $errNo - system provided
 * @param $errStr - system provided
 * @param $errFile - system provided
 * @param $errLine - system provided
 */
function myErrorHandler($errNo, $errStr, $errFile, $errLine)
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

set_error_handler('myErrorHandler', E_ALL | E_STRICT);

if (file_exists($logFile)) {
    unlink($logFile);
}

error_log("-----------------------------------------------------------");
error_log("Server:" . print_r($_SERVER, true));
//error_log("Get:" . print_r($_GET, true));
//error_log("Post:" . print_r($_POST, true));
error_log("-----------------------------------------------------------");
//==============================================================================================================================
$majorParts = explode('?', $_SERVER['REQUEST_URI']);
$pathElements = explode('/', $majorParts[0]);
$chapter = isset($pathElements[1]) ? strtolower($pathElements[1]) : "";
$section = isset($pathElements[2]) ? strtolower($pathElements[2]) : "";
$subSection = isset($pathElements[3]) ? strtolower($pathElements[3]) : "";
//==============================================================================================================================
// Consider some validation, e.g. what if the section is specified, but not the chapter
// This should only be a matter of responding to malicious use, so it may slow down the UI for a dubious benefit
if ((!isset($chapter)) || empty($chapter)) {
    error_log("Special case, no chapter means home");
    $chapter = "home";
}
//==============================================================================================================================
/* In most cases (all of the addon domains), the domain name gets you to the right place in the file store.
 * ie ~/public_html/<domain-name>/
 * With this site, however, as it is the primary domain, getting the domain name gets you files starting at ~public_html
 * It said that it is possible to make .htaccess send the request to a subdomain, but this seems a tedious, and unreliable process
 * Therefore index.php is located at ~/public_html, and ~/public_html/.htaccess has code to trap all relevant
 * (koalateasoftware.com...) requests and send them to ~/public_html/index.php
 * However, so as to try to keep the file store as tidy as possible, all of the gust of this site are in a folder (reflecting the
 * organisation of the other (addon) sites).
 */
$siteFileRoot = $_SERVER['DOCUMENT_ROOT'] . "/kts/";
$chapterFileRoot = $siteFileRoot . $chapter . "/";
$chapterContentsFileName = $chapterFileRoot . "contents.php";

error_log("Chapter:" . $chapter);
error_log("Section:" . $section);
error_log("Subsection:" . $subSection);
error_log("Site file root:" . $siteFileRoot);
error_log("Chapter file root:" . $chapterFileRoot);

if (!file_exists($chapterContentsFileName)) {
    error_log("No chapter contents defined at :" . $chapterContentsFileName);
    $chapter = "home";
    $chapterFileRoot = $siteFileRoot . "chapters/" . $chapter . "/";
}
//==============================================================================================================================
// this is an optimistic setting of the title tag, if there is an error down the line, then it may well be wrong
// clearly if the path is not good (e.g. subSection, but no section) then it will be inadequate. Again speed vs robustness
// however, for SEO, it is best that the first reading of the page contains he desired title tag
if (!empty($subSection))
    $titleTag = ucwords(str_replace('-', ' ', $subSection));
elseif (!empty($section))
    $titleTag = ucwords(str_replace('-', ' ', $section));
elseif ((!empty($chapter) > 0) && ($chapter != "home"))
    $titleTag = ucwords(str_replace('-', ' ', $chapter));
else
    $titleTag = "Koala Tea Software";
//==============================================================================================================================
$metaHtml = '<meta charset="utf-8">';
$metaHtml .= '<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">';
$metaHtml .= '<meta name="robots" content="noindex,nofollow">'; //ToDo: remove this from live
$chapterMetaFileName = $chapterFileRoot . "meta.htm";
if (file_exists($chapterMetaFileName) && (($data = file_get_contents($chapterMetaFileName)) != false))
    $metaHtml .= $data;
else
    error_log("Meta data was not read for file " . $chapterMetaFileName);
//==============================================================================================================================
$randomParam = md5(rand());
?>
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
    <?= $metaHtml ?>
    <title><?= $titleTag ?></title>
    <link rel="stylesheet" href="/kts/stylesEssential.css">
    <link rel="apple-touch-icon" sizes="180x180" href="/kts/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/kts/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/kts/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
</head>
<body class="container-fluid">
<div id="furniture">
    <nav id="mainNav" class="nav navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/?<?= $randomParam ?>">Koala Tea Software</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <!--suppress HtmlUnknownTarget -->
                <a class="nav-item nav-link" href="/about?<?= $randomParam ?>">About</a>
                <!--suppress HtmlUnknownTarget -->
                <a class="nav-item nav-link" href="/web-site-development?<?= $randomParam ?>">Web Site Development</a>
                <!--suppress HtmlUnknownTarget -->
                <a class="nav-item nav-link" href="/software-quality-assurance?<?= $randomParam ?>">Software Quality
                    Assurance</a>
            </div>
        </div>
    </nav>
</div>
<div id="contents" class="container-fluid">
    <?php
    /** @noinspection PhpIncludeInspection */
    require $chapterContentsFileName;
    ?>
</div>
<!--suppress SpellCheckingInspection -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"
        async></script>
<!--suppress SpellCheckingInspection -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"
        async></script>
<!--suppress SpellCheckingInspection -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"
        async></script>
<!--suppress SpellCheckingInspection -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
      integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z"
      crossorigin="anonymous"
>
<link href="/kts/stylesRemaining.css">
<script>document.title = "<?= $titleTag ?>";</script>
<div id="footer" class="container-fluid">
    &nbsp;
</div>
</body>
