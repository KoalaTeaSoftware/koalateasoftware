<div class="container-fluid" id="web-site-development">
    <nav id="projNav" class="nav navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="//web-site-development?<?= $randomParam ?>">Web Site Development</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#projNavAltMarkup"
                aria-controls="projNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="projNavAltMarkup">
            <div class="navbar-nav">
                <?php
                //                echo drawNavItems($availableProjects, $section, "/projects/");
                ?>
            </div>
        </div>
    </nav>
    <section id="projectInfo">
        <div class="accordion">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
                                aria-expanded="false" aria-controls="collapseOne">
                            Test Plan
                        </button>
                    </h5>
                </div>

                <div id="collapseOne" class="collapse collapsed" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <p>Guts of Test Plan</p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo"
                                aria-expanded="true" aria-controls="collapseTwo">
                            Test Results
                        </button>
                    </h5>
                </div>
                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body">
                        <p>Guts of Test Plan</p>

                        <!--div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="< ? = //$testResultsLocation ? >"></iframe>
                        </div-->
                    </div>
                </div>
            </div>
            <!--            <div class="card">-->
            <!--                <div class="card-header" id="headingThree">-->
            <!--                    <h5 class="mb-0">-->
            <!--                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">-->
            <!--                            Collapsible Group Item #3-->
            <!--                        </button>-->
            <!--                    </h5>-->
            <!--                </div>-->
            <!--                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">-->
            <!--                    <div class="card-body">-->
            <!--                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--            </div>-->
        </div>

    </section>
</div>
