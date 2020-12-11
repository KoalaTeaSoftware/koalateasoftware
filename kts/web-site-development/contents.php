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
                <a class="nav-item nav-link"
                   href="/web-site-development/the-greenlands?<?= $randomParam ?>">The Greenlands</a>
                <a class="nav-item nav-link"
                   href="/web-site-development/pblf?<?= $randomParam ?>">PBLF</a>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <?php
        // handles a path like http://koalateasoftware.com/web-site-development/koala-tea-software
        /** @noinspection PhpUndefinedVariableInspection */

        $sectionContentsRoot = $chapterFileRoot . $section . "/";
        $sectionContentsFile = $chapterFileRoot . "section.php";

        // ensure that we have a chance of being able to show the section
        // and prevent a crash in the case where the site is not properly set up
        if (isset($section) && !empty($section)
            && is_dir($sectionContentsRoot)
            && is_readable($sectionContentsFile
            )
        ) {
            error_log("Drawing the section");
            /** @noinspection PhpIncludeInspection */
            require $sectionContentsFile;
        } else {
            // the route to the test plan file is via the absolute file path (starting at ~/public_html, as this content
            // is read through  PHP function
            /** @noinspection PhpUndefinedVariableInspection - defined in index.php */
            $contentsFile = $chapterFileRoot . "/contents.md";
            if (file_exists($contentsFile) && ($txt = file_get_contents($contentsFile))) {
                /** @noinspection PhpUndefinedVariableInspection - defined in index.php */
                /** @noinspection SpellCheckingInspection */
                require_once $siteFileRoot . "parsdown/Parsedown.php";
                $converter = new Parsedown();
                echo $converter->text($txt);
            } else {
                error_log("Unable to get a test plan from :" . $contentsFile . ":");
                echo "<p class='text-warning'>Sorry, no contents</p>";
            }
        }
        ?>
    </div>
</div>
