<?php
$pageTitle = "Portfolio";
require_once "_header.php";
?>
        <main class="w3-container">
            <div id="github-projects"></div>
            <h3>My GitHub Projects</h3>
        </main>
    <script>
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
            </script>

        <script src="scripts.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>      
    

    <div class="clear"></div>

<?php require_once "_footer.php"; ?>