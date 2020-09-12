<?php
/**
 * part 1 => chapter and so on
 * A valid chapter, section, or sub-section contains a file called contents.php
 * If any are invalid, it gives back a blank for that part, and subsequent parts
 * a blank chapter => home
 *
 * @param string $requestURI - same as $_SERVER[ request uri ] emphasise the need
 * @param string $absoluteSiteRoot - this could vary a bit depending on hosting scheme
 * @param string $chapter - out - extracted from the request uri
 * @param string $section - out
 * @param string $subSection - out
 * @param string $pageRoot - out - require this and you should get what the user has asked for
 */
function interpretRequest(
    $requestURI,
    $absoluteSiteRoot,
    &$chapter,
    &$section,
    &$subSection,
    &$pageRoot
)
{
    /** @noinspection PhpIncludeInspection */
    require_once $absoluteSiteRoot . '_framework/listSubsections.php';
    /** @noinspection PhpIncludeInspection */
    include_once $absoluteSiteRoot . "_framework/getSectionalMetaTags.php";

    /*
     * The following chapter / section handling depends on the rules in the .htaccess file, i.e
     * RewriteRule ^.*$ /index.php?%{QUERY_STRING}
     */
    error_log("Asked for:" . $requestURI);

    $majorParts = explode('?', $requestURI);
    $pathElements = explode('/', $majorParts[0]);
    $chapter = isset($pathElements[1]) ? strtolower($pathElements[1]) : "";
    $section = isset($pathElements[2]) ? strtolower($pathElements[2]) : "";
    $subSection = isset($pathElements[3]) ? strtolower($pathElements[3]) : "";

    if (strlen($chapter == "")) {
//    error_log("Special case, no chapter means home");
        $chapter = "home";
    }


//        // ($requestedSection != "") is, therefore, true
//        // See if the request corresponds to a valid chapter
//        $availableChapters = listSubsections($absoluteSiteRoot . "[!_]*/contents.php");
//        if (in_array($requestedChapter, $availableChapters)) {
//            $chapter = $requestedChapter;
//            $titleTag = ucwords(str_replace('-', ' ', $chapter));
//            $pageRoot = $absoluteSiteRoot . $chapter . '/';
//        } else {
//            error_log("Requested chapter :". $requestedChapter.": is not one of :" . print_r($availableChapters, true));
//            $chapter = "home";
//            $titleTag = "Home";
//            $pageRoot = $absoluteSiteRoot . $chapter . '/';
//        }
//    }
}
