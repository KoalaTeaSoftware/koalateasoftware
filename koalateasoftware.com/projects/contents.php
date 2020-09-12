<?php
$projectsToIgnore[] = "contents.php";
/** @noinspection PhpUndefinedVariableInspection */
require_once $absoluteSiteRoot . "_framework/listSubsections.php";
$availableProjects = listSubordinates( $absoluteSiteRoot . "projects/*/testPlan.htm", $projectsToIgnore);
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
                echo drawNavItems( $availableProjects, "rose-goldthorp","projects/");
                ?>
            </div>
        </div>
    </nav>
</div>
