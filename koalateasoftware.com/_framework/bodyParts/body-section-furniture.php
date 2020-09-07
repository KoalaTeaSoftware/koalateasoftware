<div class="row">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
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
                drawNavItems($availableChapters)
                ?>
            </div>
        </div>
    </nav>
</div>
<?php
/**
 * Simply produces a list of nav items based on the list given to it.
 * Note that the home one is a special case. This assumes that the home link is supplied by the
 * Brand element on the nav bar
 *
 * @param $list
 * @return string
 */
function drawNavItems($list)
{
    $html = "";
    foreach ($list as $item) {
        if ($item == "home") continue;
        $name = ucwords(str_replace('_', ' ', $item));
        $html .= '<a class="nav-item nav-link" href="' . $item . '">' . $name . '</a>';
    }
    return $html;
}
