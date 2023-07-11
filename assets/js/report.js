var ctx3= document.getElementById('diagrame_2').getContext('2d');
var data = {
  // labels: ['Rouge', 'Bleu', 'Vert'],
  datasets: [{
    data: [30,70],
    backgroundColor: ['pink', 'greenyellow'] // Couleurs des segments du diagramme
  }]
};

// Créez le graphe
var myChart_3 = new Chart(ctx3, {
  type: 'pie', // Type de graphe (diagramme circulaire)
  data: data,
  options: {
    responsive: true // Rend le graphe réactif à la taille de la fenêtre
  }
});