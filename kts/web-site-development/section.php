<section id="projectInfo">
    <ul class="nav nav-tabs nav-fill">
        <li class="nav-item"><a class="nav-link active" href="#testPlanPane" data-toggle="tab"><h3>Test Plan</h3></a>
        </li>
        <li class="nav-item"><a class="nav-link" href="#testResultsPane" data-toggle="tab"><h3>Test Results</h3></a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade show active" id="testPlanPane">
            <?php
            // the route to the test plan file is via the absolute file path (starting at ~/public_html, as this content
            // is read through  PHP function
            /** @noinspection PhpUndefinedVariableInspection - defined in index.php */
            $testPlanFile = $sectionRoot . "testPlan.md";
            $testResultsFile = $sectionRoot . "cucumber-html-reports/overview-features.html";
            // The route to this has to be from the site's root URL, not the ~/public_html stuff,
            // because it is used in  the src attribute of an embed
            $testResultsSrc = "/kts/web-site-development/koalateasoftware/cucumber-html-reports/overview-features.html";
            if (file_exists($testPlanFile) && ($txt = file_get_contents($testPlanFile))) {
//                error_log("read markup is ...");
//                error_log($txt);
                /** @noinspection PhpUndefinedVariableInspection - defined in index.php */
                /** @noinspection SpellCheckingInspection */
                require_once $siteFileRoot . "parsdown/Parsedown.php";
                $converter = new Parsedown();
//                error_log("Converted markup is ...");
//                error_log($converter->text($txt));
                echo $converter->text($txt);
            } else {
                error_log("Unable to get a test plan from :" . $testPlanFile . ":");
                echo "<p>Sorry, no test plan</p>";
            }
            ?>
        </div>
        <div class="tab-pane fade" id="testResultsPane">
            <?
            error_log("The results file is         :" . $testResultsFile . ":");
            error_log("The results src attribute is:" . $testResultsSrc . ":");
            if (file_exists($testResultsFile) && ($txt = is_readable($testResultsFile))) {
                echo <<<EMBEDDONE
            <div class="embed-responsive embed-responsive-4by3">
                <iframe class="embed-responsive-item" src="$testResultsSrc"></iframe>
            </div>
EMBEDDONE;
            } else {
                error_log("Unable to read the test results from:" . $testResultsSrc . ":");
                echo "<p>Sorry, no test results</p>";
            }
            ?>
        </div>
    </div>
</section>
<script>
    // all links want to be opening in a new tab
    (function () {
        var links = document.getElementById("testPlanPane").getElementsByTagName("A");
        for (var i = 0, linksLength = links.length; i < linksLength; i++) {
            console.log("processing" + links[i].innerHTML);
            links[i].target = "_blank";
            links[i].setAttribute("rel", "noopener noreferrer");
            links[i].className += " externalLink";
        }
    })();
</script>
