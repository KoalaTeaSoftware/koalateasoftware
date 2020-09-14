<?php
/**
 * part 1 => chapter and so on
 * A valid chapter, section, or sub-section contains a file called contents.php
 * If any are invalid, it gives back a blank for that part, and subsequent parts
 * a blank chapter => home
 *
 * @param string $requestURI - same as $_SERVER[ request uri ] emphasise the need
 * @param string $chapter - out - extracted from the request uri
 * @param string $section - out
 * @param string $subSection - out
 */
function interpretRequest(
    $requestURI,
    &$chapter,
    &$section,
    &$subSection
)
{
    error_log("Asked for:" . $requestURI);

    $majorParts = explode('?', $requestURI);
    $pathElements = explode('/', $majorParts[0]);
    $chapter = isset($pathElements[1]) ? strtolower($pathElements[1]) : "";
    $section = isset($pathElements[2]) ? strtolower($pathElements[2]) : "";
    $subSection = isset($pathElements[3]) ? strtolower($pathElements[3]) : "";

    if ((!isset($chapter)) || ($chapter == "")) {
//    error_log("Special case, no chapter means home");
        $chapter = "home";
    }
}
