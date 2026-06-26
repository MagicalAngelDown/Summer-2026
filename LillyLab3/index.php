<?php
$pageTitle = "Home";

// Read the JSON file before the page displays.
$jsonFile = __DIR__ . "/siteData.json";
$projects = [];
$errorMessage = "";

if (file_exists($jsonFile)) {
    $jsonText = file_get_contents($jsonFile);
    $projects = json_decode($jsonText, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        $projects = [];
        $errorMessage = "The project data could not be decoded.";
    }
} else {
    $errorMessage = "The project data file could not be found.";
}

require_once "_header.php";
?>

                <main class="w3-container">
                    <h1>Welcome to My Website</h1>
                    <p>This is going to be my playground for experimenting with web development! Although I will be using this website to showcase my work, creativity and will link other websites I have already made.</p>

                    <h3>Skills</h3>
                    <p>Here are some of the skills I have developed:</p>
                    <ul>
                        <li>HTML</li>
                        <li>CSS</li>
                        <li>JavaScript</li>
                        <li>Java</li>
                        <li>Python</li>
                    </ul>

                    <section class="row">
                        <article class="column">
                            <h2>Why Web Development?</h2>
                            <p>I first was going into nursing when I graduated from High School. Although my love of gaming and technology led me to explore web development as a career path. 
                                Also the fact I found out I am squimish when it comes to nursing.</p>
                            <img src="img/EasterPhoto.jpg" alt="Family Picture Easter">    
                        </article>

                        <aside class="column">
                            <h2>Fun Facts about Me!</h2>
                            <ul>
                                <li>I have a 2 dogs and a cat. Our cat is named Lola, and our two dogs are Artemis and Zephyr.</li>
                                <li>I currently have a 10 month old baby boy, named Michael</li>
                                <li>My favorite game is Minecraft, Dead by Daylight and Sims 4.</li>
                                <li>Me and My husband own our own Discord Server with 2000 members. With about 3 active playing servers: Garrys mod, Minecraft, and Project Zomboid</li>
                            </ul>

                            <img src="img/cuddlePile.png" alt="Family Picture Cuddles">
                        </aside>
                    </section>

                    <section class="project-timeline">
                        <h2>Project Timeline</h2>

                        <?php if ($errorMessage !== ""): ?>

                            <div class="alert alert-warning" role="alert">
                                <?= htmlspecialchars($errorMessage) ?>
                            </div>

                        <?php elseif (empty($projects)): ?>

                            <p>No projects were found.</p>

                        <?php else: ?>

                            <div class="row">
                                <?php foreach ($projects as $project): ?>
                                    <article class="col-md-6 mb-4">
                                        <div class="card h-100">
                                            <div class="card-body">

                                                <h3 class="card-title">
                                                    <?= htmlspecialchars($project["title"] ?? "Untitled Project") ?>
                                                </h3>

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
                            </div>

                        <?php endif; ?>
                    </section>
                        
                </main>

                <div class="clear"></div>

                
<?php require_once "_footer.php" ?>