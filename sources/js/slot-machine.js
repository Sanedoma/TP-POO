document.getElementById("spinButton").addEventListener("click", async () => {
    const result = document.getElementById("result");
    try {
        const response = await fetch("/play");
        const data = await response.json();
        if (data.success) {
            document.getElementById("reel1").textContent = data.reels[0];
            document.getElementById("reel2").textContent = data.reels[1];
            document.getElementById("reel3").textContent = data.reels[2];
            result.textContent = data.gain > 0
                ? `✨ Félicitations ! Vous avez gagné ${data.gain} points ! ✨`
                : "😢 Pas de gain cette fois. Réessayez !";
        }
    } catch (error) {
        result.textContent = "Erreur réseau. Veuillez réessayer.";
    }
});
