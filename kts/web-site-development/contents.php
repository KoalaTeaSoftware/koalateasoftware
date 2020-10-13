<div class="container-fluid" id="web-site-development">
    <nav id="projNav" class="nav navbar navbar-expand-lg navbar-light bg-light">
        <!--suppress HtmlUnknownTarget -->
        <a class="navbar-brand" href="/web-site-development?<?=
        /** @noinspection PhpUndefinedVariableInspection */
        $randomParam
        ?>">Web Site Development</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#projNavAltMarkup"
                aria-controls="projNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="projNavAltMarkup">
            <div class="navbar-nav">
                <!--suppress HtmlUnknownTarget -->
                <a class="nav-item nav-link"
                   href="/web-site-development/koala-tea-software?<?= $randomParam ?>">Koala Tea Software</a>
                <a class="nav-item nav-link"
                   href="/web-site-development/swords-and-clapboards?<?= $randomParam ?>">Swords and Clapboards</a>
                <a class="nav-item nav-link"
                   href="/web-site-development/rose-goldthorp?<?= $randomParam ?>">Rose Goldthorp</a>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <?
        // handles a path like http://koalateasoftware.com/web-site-development/koala-tea-software
        /** @noinspection PhpUndefinedVariableInspection */

        $sectionContentsRoot = $chapterFileRoot . $section . "/";
        $sectionContentsFile = $chapterFileRoot . "section.php";

        if (isset($section) && !empty($section)
            && is_dir($sectionContentsRoot) // ensure that we have a chance of being able to show the section
            && is_readable($sectionContentsFile // prevent a crash in the case where the site is not properly set up
            )) {
            error_log("Drawing the section");
            /** @noinspection PhpIncludeInspection */
            require $sectionContentsFile;
        } else {
            // Otherwise (section is not asked-for, or is not valid), draw the 'welcome to the software development' version of the page
            // It could have been that there was a bad section in the request, so make sure the title tag indicates what is actually being drawn
            $titleTag = "Web Site Development";
            ?>
            <h1>Web Site Development</h1>
            <p class="lead">Koala Tea Software also develops web sites. Use the nav-bar above to see more details for
                specific web sites.
            </p>
            <h2>Dev. Stack / Options</h2>
            <ul class="list-group">
                <li class="list-group-item">HTML</li>
                <li class="list-group-item">JavaScript (raw and / JQuery)</li>
                <li class="list-group-item">CSS (from SCSS and compressed)</li>
                <li class="list-group-item">PHP</li>
                <li class="list-group-item">
                    Integrations with:
                    <ul class="list-group">
                        <li class="list-group-item">Mailchimp</li>
                        <li class="list-group-item">WordPress (i.e. using WP to provide a simple CMS for The Business to
                            provide contents)
                        </li>
                    </ul>
                </li>
                <li class="list-group-item">APIs (the Mailchimp and WP integrations pass data via RESsTful APIs</li>
            </ul>
            <h2>Quality Management</h2>
            <p>Development takes a test driven approach (tempered by pragmatic considerations). Quality Control is
                effected
                using the Cucumber / Java test framework detailed elsewhere on this site. The results of the mst recent
                run
                of the test are displayed on this site. Here are some of the rest of the tools used:
            </p>
            <ul class="list-group">
                <li class="list-group-item">Chrome Lighthouse - This is a manual, dev-stage activity. We aim for 100%
                    reports on all the aspects tested (but a pinch of salt, and client consultation tempers this aim).
                </li>
                <li class="list-group-item">
                    <a href="https://www.jetbrains.com/youtrack/" rel="noreferrer"
                       title="The project management tool designed for agile teams" target="_blank">YouTrack</a> this is
                    used to record non-urgent fixes / features) vital fixes bypass this.
                </li>
                <li class="list-group-item">GitHub</li>
                <li class="list-group-item">
                    <a href="https://www.jetbrains.com/phpstorm/" rel="noreferrer"
                       title="The Lightning-Smart PHP IDE" target="_blank">PHPStorm</a> another IntelliJ product. It
                    actually lives up to its claims, and eases the producing good quality code.
                </li>
                <li class="list-group-item">Cucumber / Java test framework - this both captures and verifies the
                    implementation of required functionality.
                </li>
            </ul>
            <?php
            // this ends the 'no need to try to draw the section' branch
        }
        ?>
    </div>
</div>

