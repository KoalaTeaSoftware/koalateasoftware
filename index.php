<?php
$siteRoot = $_SERVER['DOCUMENT_ROOT'] . "/koalateasoftware.com/";
require_once $siteRoot . '_framework/errorHandler.php';
require_once $siteRoot . '_framework/listSubsections.php';
include_once $siteRoot . "_framework/getSectionalMetaTags.php";

// make some deaults as a double-security against failure
$chapter = "home";
$section = "";
$subSection = "";
$titleTag = "Koala Tea Software";
$pageRoot = $siteRoot . $chapter . '/';

/*
 * The following chapter / section handling depends on the rules in the .htaccess file, i.e
 * RewriteRule ^.*$ /index.php?%{QUERY_STRING}
 */
$askedFor = $_SERVER["REQUEST_URI"]; // this is what was actually asked-for
error_log("Asked for:" . $askedFor);

$majorParts = explode('?', $askedFor);
$pathElements = explode('/', $majorParts[0]);
$requestedChapter = isset($pathElements[1]) ? strtolower($pathElements[1]) : "";
$requestedSection = isset($pathElements[2]) ? strtolower($pathElements[2]) : "";
$requestedSubSection = isset($pathElements[3]) ? strtolower($pathElements[3]) : "";

// find this now. It will be wanted whatever the chapter request is, so that the menu can be created
$availableChapters = listSubsections($siteRoot, "[!_]*"); // NB special pattern because the framework is at the chapter level

if (strlen($requestedChapter == "")) {
//    error_log("Special case, no chapter means home");
    $chapter = "home";
    $titleTag = "Home";
    $pageRoot = $siteRoot . $chapter . '/';
} else {
    // ($requestedSection != "") is, therefore, true
//    error_log("The requested chapter is:" . $requestedChapter . ". The possible chapters are: " . print_r($availableChapters, true));
    if(!in_array($requestedChapter, $availableChapters)){
        error_log("Requested chapter is not known");
        $chapter = "home";
        $titleTag = "Home";
        $pageRoot = $siteRoot . $chapter . '/';
    } else {
        $chapter = $requestedChapter;
        $titleTag = ucwords(str_replace('-', ' ', $chapter));
        $pageRoot = $siteRoot . $chapter . '/';
        if( $requestedSection != ""){
            $availableSections = listSubsections($pageRoot);
            if (!in_array($requestedSection, $availableSections)) {
                error_log(sprintf("Requested section: %s is not in the list of possible sections: %s", $requestedSection, print_r($availableSections, true)));
                error_log("So ignoring this and further requested path elements");
            } else {
//                error_log("The section seems to be a possibility, so overwrite some variables.");
                $section = $requestedSection;
                $titleTag = ucwords(str_replace('-', ' ', $section));
                $pageRoot .= $section . '/';
                if($requestedSubSection != ""){
                    $availableSubSections = listSubsections($pageRoot);
                    if(!in_array($requestedSubSection, $availableSubSections)){
                        error_log(sprintf("Requested subSection: %s. List of possible sections: %s", $requestedSection, print_r($availableSubSections, true)));
                        error_log("So ignoring this and further requested path elements");
                    } else {
//                        error_log("The sub section seems to be a possibility, so overwrite some variables.");
                        $subSection = $requestedSubSection;
                        $titleTag = ucwords(str_replace('-', ' ', $section));
                        $pageRoot .= $subSection . '/';
                    }
                }
            }
        }
    }
}

//error_log("Getting page contents from " . $pageRoot);
?>
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
    <title><?= $titleTag ?></title>
    <?php
    require_once $siteRoot . '_framework/bodyParts/head-meta.php';
    echo getExtraMetaTags($pageRoot);
    require_once $siteRoot . '_framework/bodyParts/head-bootstrap.php';
    require_once $siteRoot . '_framework/bodyParts/head-common.php';
    ?>
</head>
<body id="<?= $chapter ?>" class="container-fluid">
<section id="furniture">
    <?php require_once $siteRoot . '_framework/bodyParts/body-section-furniture.php'; ?>
</section>
<section id="contents" class="container-fluid">
    <?php
    require_once $pageRoot . "/contents.php";
    ?>
</section>
<section id="footer">
    <?php require_once $siteRoot . '_framework/bodyParts/body-section-pageFooter.php'; ?>
</section>
</body>
