<?php
$pageTitle = "Project Categories";
require_once "_header.php";

// Read and decode the JSON project data.
$jsonData = file_get_contents("siteData.json");
$projects = json_decode($jsonData, true);

if (!is_array($projects)) {
    $projects = [];
}

// Collect unique categories from the project data.
$categories = [];

foreach ($projects as $project) {
    if (!empty($project["category"])) {
        $categories[] = $project["category"];
    }
}

$categories = array_unique($categories);
sort($categories);
?>

<main class="w3-container">
    <h2>Project Categories</h2>

    <p>
        Select a category below to view the projects that belong to that part of my portfolio.
    </p>

    <?php if (empty($categories)): ?>

        <div class="alert alert-warning">
            No project categories were found.
        </div>

    <?php else: ?>

        <section class="row">
            <?php foreach ($categories as $category): ?>
                <article class="col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h3 class="card-title">
                                <?= htmlspecialchars($category) ?>
                            </h3>

                            <p>
                                View all projects in the
                                <strong><?= htmlspecialchars($category) ?></strong>
                                category.
                            </p>

                            <a class="btn btn-primary"
                               href="type.php?category=<?= urlencode($category) ?>">
                                View <?= htmlspecialchars($category) ?> Projects
                            </a>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </section>

    <?php endif; ?>
</main>

<div class="clear"></div>

<?php require_once "_footer.php"; ?>