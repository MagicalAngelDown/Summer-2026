<?php
$pageTitle = "Filtered Projects";
require_once "_header.php";

// Read and decode the JSON project data.
$jsonData = file_get_contents("siteData.json");
$projects = json_decode($jsonData, true);

if (!is_array($projects)) {
    $projects = [];
}

// Get the category from the URL, such as type.php?category=Portfolio
$selectedCategory = $_GET["category"] ?? "";
$selectedCategory = trim($selectedCategory);

// Collect all unique categories for navigation links.
$categories = [];

foreach ($projects as $project) {
    if (!empty($project["category"])) {
        $categories[] = $project["category"];
    }
}

$categories = array_unique($categories);
sort($categories);

// Filter projects by the selected category.
$filteredProjects = [];

if ($selectedCategory !== "") {
    foreach ($projects as $project) {
        $projectCategory = $project["category"] ?? "";

        if (strcasecmp($projectCategory, $selectedCategory) === 0) {
            $filteredProjects[] = $project;
        }
    }
}
?>

<main class="w3-container">
    <h2>Filtered Project Results</h2>

    <h2>
        Choose a category below to view projects from that part of my portfolio.
    </h2>

    <div class="mb-3">
        <?php foreach ($categories as $category): ?>
            <a class="btn btn-primary mb-2"
               href="type.php?category=<?= urlencode($category) ?>">
                <?= htmlspecialchars($category) ?>
            </a>
        <?php endforeach; ?>
    </div>

    <?php if ($selectedCategory === ""): ?>

        <div class="alert alert-info">
            Please choose a category to view filtered projects.
        </div>

    <?php elseif (empty($filteredProjects)): ?>

        <div class="alert alert-warning">
            No projects were found for the category:
            <strong><?= htmlspecialchars($selectedCategory) ?></strong>
        </div>

    <?php else: ?>

        <h3>
            Category:
            <?= htmlspecialchars($selectedCategory) ?>
        </h3>

        <section class="row">
            <?php foreach ($filteredProjects as $project): ?>
                <article class="col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">

                            <h4 class="card-title">
                                <?= htmlspecialchars($project["title"] ?? "Untitled Project") ?>
                            </h4>

                            <p>
                                <strong>ID:</strong>
                                <?= htmlspecialchars($project["id"] ?? "Not listed") ?>
                            </p>

                            <p>
                                <strong>Category:</strong>
                                <?= htmlspecialchars($project["category"] ?? "Not listed") ?>
                            </p>

                            <p>
                                <strong>Status:</strong>
                                <?= htmlspecialchars($project["status"] ?? "Not listed") ?>
                            </p>

                            <p>
                                <strong>Description:</strong>
                                <?= htmlspecialchars($project["description"] ?? "No description provided.") ?>
                            </p>

                            <p>
                                <strong>Link:</strong>
                                <?php if (!empty($project["link"])): ?>
                                    <a href="<?= htmlspecialchars($project["link"]) ?>">
                                        <?= htmlspecialchars($project["link"]) ?>
                                    </a>
                                <?php else: ?>
                                    Not available yet
                                <?php endif; ?>
                            </p>

                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </section>

    <?php endif; ?>
</main>

<div class="clear"></div>

<?php require_once "_footer.php"; ?>