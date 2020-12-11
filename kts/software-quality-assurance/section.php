<div id="sqa-section">
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
