<?php
/**
 * If a suitable file is found in the directory specified by the location parameter, then it is read
 *
 * @param $location
 * @return string - on either success, or failure, this can just be sent to the output
 */
function getExtraMetaTags($location)
{
    if (file_exists($location . "meta.htm")) {
        $data = file_get_contents($location . "meta.txt");
        if ($data)
            return '<meta name="description" content="' . $data . '">';
    }
    error_log("Contents were not read for file " . $location . "meta.txt");
    return "";
}
