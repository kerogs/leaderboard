// Fonction pour stocker les données dans un cookie
function saveUserDataToCookie(pseudo, score, id) {
    // Récupérer les données existantes du cookie
    var userData = JSON.parse(localStorage.getItem('userData')) || [];

    // Ajouter les nouvelles données
    userData.push({ pseudo: pseudo, score: score, id: id });

    // Enregistrer les données mises à jour dans le cookie
    localStorage.setItem('userData', JSON.stringify(userData));
}

// Fonction pour ajouter un utilisateur et mettre à jour le tableau des scores
function addUser() {
    // Récupérer les valeurs du pseudo et du score
    var pseudo = document.getElementById("pseudo").value;
    var score = parseInt(document.getElementById("score").value);

    // Générer un identifiant unique pour l'utilisateur
    var userId = generateId();

    // Stocker les données dans un cookie
    saveUserDataToCookie(pseudo, score, userId);

    // Créer une nouvelle ligne pour l'utilisateur
    var newRow = document.createElement("tr");

    // Ajouter un attribut data-id avec l'identifiant unique
    newRow.setAttribute("data-id", userId);

    // Créer les cellules pour le rang, le pseudo et le score
    var rankCell = document.createElement("td");
    var userCell = document.createElement("td");
    var scoreCell = document.createElement("td");

    // Assigner les valeurs aux cellules
    rankCell.innerHTML = "-";
    userCell.innerHTML = pseudo;
    scoreCell.innerHTML = score + " pts";

    // Ajouter les cellules à la nouvelle ligne
    newRow.appendChild(rankCell);
    newRow.appendChild(userCell);
    newRow.appendChild(scoreCell);

    // Récupérer le tbody du tableau
    var tbody = document.querySelector("table tbody");

    // Ajouter la nouvelle ligne au tableau
    tbody.appendChild(newRow);

    // Mettre à jour le classement
    updateRanking();
}

// Fonction pour mettre à jour le classement
function updateRanking() {
    // Récupérer toutes les lignes du tableau
    var rows = Array.from(document.querySelectorAll("table tbody tr"));

    // Trier les lignes en fonction des scores
    rows.sort(function (a, b) {
        var scoreA = parseInt(a.querySelector("td:last-child").textContent);
        var scoreB = parseInt(b.querySelector("td:last-child").textContent);
        return scoreB - scoreA;
    });

    // Mettre à jour les rangs dans le tableau
    rows.forEach(function (row, index) {
        row.querySelector("td:first-child").innerHTML = (index + 1);
    });

    // Réinsérer les lignes triées dans le tableau
    var tbody = document.querySelector("table tbody");
    tbody.innerHTML = "";
    rows.forEach(function (row) {
        tbody.appendChild(row);
    });
}

// Ajouter un gestionnaire d'événements pour soumettre le formulaire
document.getElementById("add").addEventListener("submit", function (event) {
    // Empêcher le comportement par défaut du formulaire
    event.preventDefault();
    // Appeler la fonction pour ajouter un utilisateur
    addUser();
});

// Fonction pour générer un identifiant unique
function generateId() {
    return Math.random().toString(36).substring(2, 15);
}




























// Fonction pour afficher l'attribut data-id d'une ligne
function showDataId(event) {
    event.preventDefault(); // Empêcher le comportement par défaut du clic droit
    var tr = event.target.closest("tr[data-id]"); // Récupérer l'élément tr le plus proche avec un attribut data-id
    if (tr) {
        var dataId = tr.getAttribute("data-id"); // Récupérer la valeur de l'attribut data-id
        console.log("data-id de la ligne:", dataId); // Afficher la valeur dans la console
    }
}

document.addEventListener('DOMContentLoaded', function () {
    var customMenu = document.getElementById('custom-menu');
    var content = document.getElementById('content');

    // Fonction pour ajouter la classe .active au menu contextuel
    function activateContextMenu() {
        customMenu.classList.add('active');
    }

    // Fonction pour supprimer la classe .active du menu contextuel
    function deactivateContextMenu() {
        customMenu.classList.remove('active');
    }

    // Afficher le menu contextuel lors d'un clic droit sur l'élément #content
    content.addEventListener('contextmenu', function (event) {
        event.preventDefault(); // Empêcher le comportement par défaut du clic droit

        // Afficher le menu contextuel à l'endroit du clic
        customMenu.style.display = 'block';
        customMenu.style.left = event.pageX + 'px';
        customMenu.style.top = event.pageY + 'px';

        // Ajouter la classe .active au menu contextuel
        activateContextMenu();

        // Ajouter un gestionnaire d'événements pour cacher le menu contextuel lors d'un clic en dehors de celui-ci
        document.addEventListener('click', function hideMenu() {
            customMenu.style.display = 'none';
            deactivateContextMenu(); // Supprimer la classe .active
            document.removeEventListener('click', hideMenu);
        });
    });

    // Ajouter un gestionnaire d'événements pour le tableau, en utilisant la délégation d'événements
    document.querySelector("table tbody").addEventListener('contextmenu', function (event) {
        showDataId(event); // Appeler la fonction pour afficher l'attribut data-id
    });

    // Gestionnaire d'événements pour retirer une ligne lorsque vous cliquez sur #retirer
    document.getElementById("retirer").addEventListener('click', function (event) {
        event.preventDefault(); // Empêcher le comportement par défaut du lien
        var tr = customMenu.parentElement.closest("tr[data-id]"); // Récupérer l'élément tr le plus proche avec un attribut data-id
        if (tr) {
            tr.remove(); // Supprimer l'élément tr
            customMenu.style.display = 'none'; // Cacher le menu contextuel
        }
    });
});
