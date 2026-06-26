<?php
$pageTitle = "Project Timeline and Portfolio";
require_once "_header.php";

$jsonData = file_get_contents("siteData.json");
$projects = json_decode($jsonData, true);

if (!is_array($projects)) {
    $projects = [];
}

$statusOrder = [
    "In Progress" => 1,
    "Planned" => 2,
    "Finished" => 3,
    "Active" => 4
];

usort($projects, function ($a, $b) use ($statusOrder) {
    $statusA = $a["status"] ?? "";
    $statusB = $b["status"] ?? "";

    $rankA = $statusOrder[$statusA] ?? 999;
    $rankB = $statusOrder[$statusB] ?? 999;

    if ($rankA !== $rankB) {
        return $rankA <=> $rankB;
    }

    return strcasecmp($a["title"] ?? "", $b["title"] ?? "");
});
?>

        <main class="w3-container">
            <h2>Project Timeline and Portfolio</h2>
            <p>
                This page shows my current, planned, and completed web development projects.
                Each card is loaded from my JSON project data.
            </p>

            <?php if (empty($projects)): ?>
                <p>No projects were found.</p>
            <?php else: ?>
                <section class="row">
                    <?php foreach ($projects as $project): ?>
                        <article class="col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h3 class="card-title">
                                        <?= htmlspecialchars($project["title"] ?? "Untitled Project") ?>
                                    </h3>

                                    <p>
                                        <strong>Status:</strong>
                                        <?= htmlspecialchars($project["status"] ?? "Unknown") ?>
                                    </p>

                                    <p>
                                        <strong>Category:</strong>
                                        <?= htmlspecialchars($project["category"] ?? "Unknown") ?>
                                    </p>

                                    <p>
                                        <strong>Description:</strong>
                                        <?= htmlspecialchars($project["description"] ?? "No description available.") ?>
                                    </p>

                                    <?php if (!empty($project["link"])): ?>
                                        <a href="<?= htmlspecialchars($project["link"]) ?>" class="btn btn-primary">
                                            View Project
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </section>
            <?php endif; ?>



            <hr>
                <div id="github-projects"></div>
                <h3><center>My GitHub Projects</center></h3>
                <p><center>Github Project information coming soon!</center></p>
        </main>
    <!-- <script>
                console.log('Script is running');

                fetch('https://api.github.com/users/MagicalAngelDown/repos')
                .then(response => {
                    console.log('Received response:', response);
                    if (!response.ok) {
                    throw new Error('Network response was not ok ' + response.statusText);
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Received data:', data);
                    const container = document.getElementById('github-projects');
                    if (!container) {
                    console.error('Container element not found');
                    return;
                    }
                    data.forEach(repo => {
                    const repoDiv = document.createElement('div');
                    repoDiv.className = 'repo';

                    const repoName = document.createElement('h3');
                    const repoLink = document.createElement('a');
                    repoLink.href = repo.html_url;
                    repoLink.textContent = repo.name;
                    repoName.appendChild(repoLink);

                    const repoDescription = document.createElement('p');
                    repoDescription.textContent = repo.description || 'No description provided.';

                    repoDiv.appendChild(repoName);
                    repoDiv.appendChild(repoDescription);

                    container.appendChild(repoDiv);
                    });
                })
                .catch(error => console.error('Error fetching repositories:', error));
            </script> -->

        <script src="scripts.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>      
    

    <div class="clear"></div>

<?php require_once "_footer.php"; ?>