<div id="projectInfo">
    <ul class="nav nav-tabs nav-fill">
        <li class="nav-item"><a class="nav-link active" href="#testPlanPane" data-toggle="tab">Test Plan</a></li>
        <li class="nav-item"><a class="nav-link" href="#testResultsPane" data-toggle="tab">Test Results</a></li>
    </ul>
    <div class="tab-content">
        <section class="tab-pane fade show active" id="testPlanPane">
            <?php
            // the route to the test plan file is via the absolute file path (starting at ~/public_html, as this content
            // is read through  PHP function
            /** @noinspection PhpUndefinedVariableInspection - defined in index.php */
            $testPlanFile = $sectionContentsRoot . "testPlan.md";
            // This absolute file path variable is used for determining if there is any suitable data
            $testResultsFile = $sectionContentsRoot . "cucumber-html-reports/overview-features.html";
            // This relative-to-site-root is used in  the src attribute of an embed
            /** @noinspection PhpUndefinedVariableInspection */
            $testResultsSrc = "/kts/web-site-development/" . $section . "/cucumber-html-reports/overview-features.html";
            if (file_exists($testPlanFile) && ($txt = file_get_contents($testPlanFile))) {
                /** @noinspection PhpUndefinedVariableInspection - defined in index.php */
                /** @noinspection SpellCheckingInspection */
                require_once $siteFileRoot . "parsdown/Parsedown.php";
                $converter = new Parsedown();
                echo $converter->text($txt);
            } else {
                error_log("Unable to get a test plan from :" . $testPlanFile . ":");
                echo "<p class='text-warning'>Sorry, no test plan</p>";
            }
            ?>
        </section>
        <section class="tab-pane fade" id="testResultsPane">
            <h1>Test Results For <?=
                /** @noinspection PhpUndefinedVariableInspection */
                $titleTag ?></h1>
            <?
            //            error_log("The results file is         :" . $testResultsFile . ":");
            error_log("The results src attribute is:" . $testResultsSrc . ":");
            if (file_exists($testResultsFile) && ($txt = is_readable($testResultsFile))) {
                echo <<<EMBEDDONE
            <div class="embed-responsive embed-responsive-4by3">
                <iframe class="embed-responsive-item" src="$testResultsSrc?$randomParam" id="resultsFrame"></iframe>
            </div>
EMBEDDONE;
            } else {
                error_log("Unable to read the test results from:" . $testResultsSrc . ":");
                echo "<p class='text-warning'>Sorry, no test results</p>";
            }
            ?>
        </section>
    </div>
</div>
<script>
    // all links must be opening in a new tab. It is not possible to specify this using the MarkDown parser that Is used here
    (function () {
        const planlinks = document.getElementById("testPlanPane").getElementsByTagName("A");
        for (let i = 0, linksLength = planlinks.length; i < linksLength; i++) {
            console.log("processing" + planlinks[i].innerHTML);
            planlinks[i].target = "_blank";
            planlinks[i].setAttribute("rel", "noopener noreferrer");
            planlinks[i].className += " externalLink";
        }

        const repLinks = document.getElementById("testResultsPane").getElementsByTagName("A");
        for (let i = 0, linksLength = repLinks.length; i < repLinks; i++) {
            console.log("processing" + repLinks[i].innerHTML);
            repLinks[i].target = "_blank";
            repLinks[i].setAttribute("rel", "noopener noreferrer");
            repLinks[i].href += "?<?=$randomParam?>";
        }

    })();
</script>
