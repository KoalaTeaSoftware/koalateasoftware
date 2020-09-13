<?php
$projectsToIgnore[] = "";
/** @noinspection PhpUndefinedVariableInspection */
require_once $absoluteSiteRoot . "_framework/listSubsections.php";
$availableProjects = listSubordinates($absoluteSiteRoot . "projects/*/testPlan.htm", $projectsToIgnore);

/** @noinspection PhpUndefinedVariableInspection */
if (!in_array($section, $availableProjects)) {
    error_log("Requested section :" . $section . ": is not one of the known projects." . print_r($availableProjects, true));

    $section = $availableProjects[0];
    $titleTag = ucwords(str_replace('-', ' ', $section)); // until a chapter or section changes it
}
error_log("Section is :" . $section . ":");



require_once $absoluteSiteRoot . "_framework/PHP Markdown 1.0.2/markdown.php";
$junk = Markdown("# Hwllo");
?>
<div class="container-fluid">
    <nav id="projNav" class="nav navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/projects">Projects</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#projNavAltMarkup"
                aria-controls="projNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="projNavAltMarkup">
            <div class="navbar-nav">
                <?php
                echo drawNavItems($availableProjects, "rose-goldthorp", "projects/");
                ?>
            </div>
        </div>
    </nav>
    <section id="projectInfo">
        <?= $junk ?>
    </section>
</div>
