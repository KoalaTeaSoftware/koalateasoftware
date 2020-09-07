<div class="row">
    <nav id="mainNav" class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">Koala Tea Software</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <?=
                /** So, this will only work within the context set up by the calling file */
                /** @noinspection PhpUndefinedVariableInspection */
                drawNavItems($availableChapters, $chapter)
                ?>
            </div>
        </div>
    </nav>
</div>
<?php
/**
 * Simply produces a list of nav items based on the list given to it.
 * Note that the home one is a special case.
 * Home will not be shown as this assumes that the home link is supplied by the
 * Brand element on the nav bar
 *
 * @param $list - A menu nav item will be created foreach one of these
 * @param string $toHighlight - The one that is currently in force
 * @param string $root - if offered, it has to have a trailing '/' to work at all
 * @return string - that can be sent to the browser inside the nav framework
 * Note: This is assuming that the this bar is working on chapters. It will have to have a path if this is not the case
 */
function drawNavItems($list, $toHighlight = "", $root = "")
{
    $html = "";
    foreach ($list as $item) {
        if ($item == "home") continue;
        $name = ucwords(str_replace('_', ' ', $item));
        $id = $item . "Nav"; // this is what the menu highlighting code added in the footer depends upon

        $class = 'nav-item nav-link';
        if ($item == $toHighlight) {
            $class .= ' active';
        }

        $html .= '<a ';
        $html .= ' class="' . $class . '"';
        $html .= ' id="' . $id . '" ';
        $html .= ' href="' . $root . $item . '" ';
        $html .= '>' . $name . ' </a>';
    }
    return $html;
}
