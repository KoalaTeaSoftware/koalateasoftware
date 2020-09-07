<?php
/* This script is run just before the drawing of the footer just to try to make the drawing of the footer seem to be
 * diagnostic of completion of the request processing
 */
?>
<script>
    document.title = "<?=
        // This makes sure that the browser tab id updated to the correct vale
        /** @noinspection PhpUndefinedVariableInspection */
        $titleTag ?>";
    document.getElementById("<?=
        // This makes the appropriate item on the nav bar seem selected (if the css makes it so)
        /** @noinspection PhpUndefinedVariableInspection */
        $requestedChapter ?>Nav").classList.add("active");
</script>
<section id="footer" class="row">
</section>

