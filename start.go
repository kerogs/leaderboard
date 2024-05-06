package main

import (
    "net/http"
    "os/exec"
)

func main() {
    http.HandleFunc("/", func(w http.ResponseWriter, r *http.Request) {
        // Récupérer le chemin du fichier demandé
        filePath := "." + r.URL.Path
        // Vérifier si le fichier est un script PHP
        if isPHPFile(filePath) {
            // Exécuter le script PHP
            cmd := exec.Command("php", filePath)
            output, err := cmd.Output()
            if err != nil {
                http.Error(w, "Erreur lors de l'exécution du script PHP", http.StatusInternalServerError)
                return
            }
            // Écrire la sortie du script PHP dans la réponse HTTP
            w.Write(output)
            return
        }
        // Servir les autres fichiers statiques normalement
        http.ServeFile(w, r, filePath)
    })

    // Démarrer le serveur sur le port 8080
    http.ListenAndServe(":8080", nil)
}

// Fonction pour vérifier si le fichier est un script PHP
func isPHPFile(filePath string) bool {
    return filePath[len(filePath)-4:] == ".php"
}
