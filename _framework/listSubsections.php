<?php
/**
 * A subsection is 'available' if it is a directory that contains a file called contents.php
 *
 * @param string $pattern - Give it the entire path, and some good file names within the requred directores
 * @param $ignore -  an array of strings - element not to be added to the list
 * @return array - list of eligible subsections
 */
function listSubordinates($pattern, $ignore)
{
    $matchingFiles = glob($pattern);
    error_log("Listing chapters for pattern :" . $pattern . ". glob returned " . print_r($matchingFiles, true));
    $chapterList = [];
    foreach ($matchingFiles as $filename) {
        $pathElements = explode('/', $filename);
        end($pathElements);  // this will make the file name the 'current' list element
        prev($pathElements); // ie, the name of the directory.
        $candidate = current($pathElements);
        if (!in_array($candidate, $ignore)) {
            error_log("Adding " . $candidate);
            $chapterList[] = $candidate;
        } else {
            error_log($candidate . " is one of the candidates to ignore");
        }
    }
    return $chapterList;
}
