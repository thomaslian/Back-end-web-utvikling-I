<?php
include("inc/data.php");

$pageTitle = "Full Catalog";
$section = null;

if (isset($_GET["cat"])) {
    if ($_GET["cat"] == "books") {
        $pageTitle = "Books";
        $section = "books";
    } else if ($_GET["cat"] == "movies") {
        $pageTitle = "Movies";
        $section = "movies";
    } else if ($_GET["cat"] == "music") {
        $pageTitle = "Music";
        $section = "music";
    }
}

include("inc/header.php"); ?>

    <div class="section catalog catalog page">

        <div class="wrapper">

            <h1><?php echo $pageTitle; ?></h1>

            <ul class="items">
                <?php
                foreach ($catalog as $item) {
                    echo "<li><a href='#'><img src='"
                        . $item["img"] . "' alt='"
                        . $item["title"] . "'/>"
                        . "<p>View details</p>"
                        . "</a></li>";
                } ?>
            </ul>
        </div>
    </div>


<?php include("inc/footer.php"); ?>