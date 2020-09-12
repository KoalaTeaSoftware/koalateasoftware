<?php
$relativeSiteRoot = "/koalateasoftware.com/"; // used when telling the browser to get files
$absoluteSiteRoot = $_SERVER['DOCUMENT_ROOT'] . $relativeSiteRoot; // used when telling the interpreter to get files

require_once $absoluteSiteRoot . '_framework/errorHandler.php';

$chapter = "";
$section = "";
$subSection = "";
$pageRoot = "";
$titleTag = "";

require_once $absoluteSiteRoot . "_framework/interpretRequest.php";

interpretRequest(
    $_SERVER['REQUEST_URI'],
    $absoluteSiteRoot,
    $chapter,
    $section,
    $subSection,
    $pageRoot
);
$pageRoot = $absoluteSiteRoot . $chapter . '/';
$titleTag = ucwords(str_replace('-', ' ', $chapter)); // until a chapter or section changes it
$chaptersToIgnore[] = "home";
$availableChapters = listSubordinates($absoluteSiteRoot . "[!_]*/contents.php", $chaptersToIgnore);
?>
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
    <title><?= $titleTag ?></title>
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <?php
    require_once $absoluteSiteRoot . '_framework/bodyParts/head-meta.php';
    echo getExtraMetaTags($pageRoot);
    require_once $absoluteSiteRoot . '_framework/bodyParts/head-bootstrap.php';
    require_once $absoluteSiteRoot . '_framework/bodyParts/head-common.php';
    ?>
</head>
<body id="<?= $chapter ?>" class="container-fluid">
<section id="furniture">
    <?php require_once $absoluteSiteRoot . '_framework/bodyParts/body-section-furniture.php'; ?>
</section>
<section id="contents" class="container-fluid">
    <?php
    /** @noinspection PhpIncludeInspection */
    require_once $pageRoot . "/contents.php";
    ?>
</section>
<section id="footer">
    <?php require_once $absoluteSiteRoot . '_framework/bodyParts/body-section-pageFooter.php'; ?>
</section>
</body>
