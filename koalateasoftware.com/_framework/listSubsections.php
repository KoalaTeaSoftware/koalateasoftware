<?php
/**
 * A subsection is 'available' if it is a directory that contains a file called contents.php
 *
 * @param string $root - must end in a directory separator - where to look for subsections
 * @param string $pattern - if the pattern has to be anything special give. Defaults to *
 * @return array - list of eligible subsections
 */
function listSubsections($root, $pattern = "*")
{
    $actualPattern = $root . $pattern . "/contents.php"; // ie only those places that have contents
    $matchingFiles = glob($actualPattern);
    $chapterList = [];
    foreach ($matchingFiles as $filename) {
        $pathElements = explode('/', $filename);
        end($pathElements);  // this will make the file name the 'current' list element
        prev($pathElements); // ie, the name of the directory.
        $chapterList[] = current($pathElements);
    }
    return $chapterList;
}
