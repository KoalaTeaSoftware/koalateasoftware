<h1>Projects</h1>
<ul class="nav nav-tabs" id="rolesNav" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="p1-tab" data-toggle="tab" href="#p1" role="tab"
           aria-controls="home"
           aria-selected="true">Rose Goldthorp</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="p2-tab" data-toggle="tab" href="#p2" role="tab"
           aria-controls="profile"
           aria-selected="false">Project 2</a>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="p1" role="tabpanel" aria-labelledby="p1-tab">
        <div class="row">
            <div class="col">
                <h2>Agile(ish) Test Plan</h2>
                <?php include "rose-goldthorp/test-plan.htm" ?>
            </div>
            <div class="col">
                <h2>Test Results</h2>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="p2" role="tabpanel" aria-labelledby="p2-tab">
        <div class="row">
            <div class="col">
                <h2>Agile(ish) Test Plan for second project</h2>
                <?php include "rose-goldthorp/test-plan.htm" ?>
            </div>
            <div class="col">
                <h2>Test Results</h2>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(() => {
        const url = window.location.href;
        if (url.indexOf("#") > 0) {
            const activeTab = url.substring(url.indexOf("#") + 1);
            $('.nav[role="tablist"] a[href="#' + activeTab + '"]').tab('show');
        }

        $('a[role="tab"]').on("click", function () {
            const hash = $(this).attr("href");
            let newUrl = url.split("#")[0] + hash;
            history.replaceState(null, null, newUrl);
        });
    });
</script>

<?php
// actually, validate the section here, and take the validation of section and sub-section out of index.php
