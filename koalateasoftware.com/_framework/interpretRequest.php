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
 * @param string $titleTag - out - put this into the title tag
 */
function interpretRequest(
    $requestURI,
    $absoluteSiteRoot,
    &$chapter,
    &$section,
    &$subSection,
    &$pageRoot,
    &$titleTag
)
{
    /** @noinspection PhpIncludeInspection */
    require_once $absoluteSiteRoot . '_framework/listSubsections.php';
    /** @noinspection PhpIncludeInspection */
    include_once $absoluteSiteRoot . "_framework/getSectionalMetaTags.php";

// make some defaults as a double-security against failure
    $chapter = "home";
    $section = "";
    $subSection = "";
    $titleTag = "Koala Tea Software";
    $pageRoot = $absoluteSiteRoot . $chapter . '/';

    /*
     * The following chapter / section handling depends on the rules in the .htaccess file, i.e
     * RewriteRule ^.*$ /index.php?%{QUERY_STRING}
     */
    error_log("Asked for:" . $requestURI);

    $majorParts = explode('?', $requestURI);
    $pathElements = explode('/', $majorParts[0]);
    $requestedChapter = isset($pathElements[1]) ? strtolower($pathElements[1]) : "";
    $requestedSection = isset($pathElements[2]) ? strtolower($pathElements[2]) : "";
    $requestedSubSection = isset($pathElements[3]) ? strtolower($pathElements[3]) : "";

    if (strlen($requestedChapter == "")) {
//    error_log("Special case, no chapter means home");
        $chapter = "home";
        $titleTag = "Home";
        $pageRoot = $absoluteSiteRoot . $chapter . '/';
    } else {
        // ($requestedSection != "") is, therefore, true
        // See if the request corresponds to a valid chapter
        $availableChapters = listSubsections($absoluteSiteRoot, "[!_]*"); // NB special pattern because the framework is at the chapter level
        if (!in_array($requestedChapter, $availableChapters)) {
            error_log("Requested chapter :". $requestedChapter.": is not one of :" . print_r($availableChapters, true));
            $chapter = "home";
            $titleTag = "Home";
            $pageRoot = $absoluteSiteRoot . $chapter . '/';
        } else {
            $chapter = $requestedChapter;
            $titleTag = ucwords(str_replace('-', ' ', $chapter));
            $pageRoot = $absoluteSiteRoot . $chapter . '/';
            if ($requestedSection != "") {
                $availableSections = listSubsections($pageRoot);
                if (!in_array($requestedSection, $availableSections)) {
                    error_log(sprintf("Requested section: %s is not in the list of possible sections: %s", $requestedSection, print_r($availableSections, true)));
                    error_log("So ignoring this and further requested path elements");
                } else {
//                  error_log("The section seems to be a possibility, so overwrite some variables.");
                    $section = $requestedSection;
                    $titleTag = ucwords(str_replace('-', ' ', $section));
                    $pageRoot .= $section . '/';
                    if ($requestedSubSection != "") {
                        $availableSubSections = listSubsections($pageRoot);
                        if (!in_array($requestedSubSection, $availableSubSections)) {
                            error_log(sprintf("Requested subSection: %s. List of possible sections: %s", $requestedSection, print_r($availableSubSections, true)));
                            error_log("So ignoring this and further requested path elements");
                        } else {
//                          error_log("The sub section seems to be a possibility, so overwrite some variables.");
                            $subSection = $requestedSubSection;
                            $titleTag = ucwords(str_replace('-', ' ', $section));
                            $pageRoot .= $subSection . '/';
                        }
                    }
                }
            }
        }
    }
}
