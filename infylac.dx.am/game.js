var gameContainer = document.getElementById("game-container");
var obstacleIndex = 0;
var score = 0;
var obstacles = ["Rencor", "Envidia", "Egoísmo", "Cansancio", "Incredulidad", "Vicios", "Competencia", "División", "Celos", "Orgullo"];

function createObstacle() {
  var obstacle = document.createElement("div");
  obstacle.classList.add("obstacle");
  obstacle.textContent = obstacles[obstacleIndex];
  gameContainer.appendChild(obstacle);
  obstacleIndex++;
  if (obstacleIndex >= obstacles.length) {
    obstacleIndex = 0;
  }
}

function moveLeft() {
  var player = document.getElementById("player");
  var currentPosition = parseInt(player.style.left);
  if (currentPosition > 0) {
    player.style.left = (currentPosition - 10) + "px";
  }
}

function moveRight() {
  var player = document.getElementById("player");
  var currentPosition = parseInt(player.style.left);
  var containerWidth = parseInt(gameContainer.offsetWidth);
  if (currentPosition < (containerWidth - 50)) {
    player.style.left = (currentPosition + 10) + "px";
  }
}

function startGame(obstacleType) {
  // Oculta el botón de inicio
  document.getElementById("start-button").style.display = "none";
  
  // Inicia el intervalo para crear obstáculos
  var obstacleInterval = setInterval(createObstacle, 1000);
  
  // Agrega un event listener para detectar cuando se presionan las teclas de dirección
  document.addEventListener("keydown", function(event) {
    if (event.code === "ArrowLeft") {
      moveLeft();
    } else if (event.code === "ArrowRight") {
      moveRight();
    }
  });
  
  // Inicia el intervalo para detectar colisiones entre el jugador y los obstáculos
  var collisionInterval = setInterval(function() {
    var obstacles = document.getElementsByClassName("obstacle");
    var player = document.getElementById("player");
    for (var i = 0; i < obstacles.length; i++) {
      var obstacle = obstacles[i];
      var playerPosition = player.getBoundingClientRect();
      var obstaclePosition = obstacle.getBoundingClientRect();
      if (playerPosition.bottom > obstaclePosition.top &&
          playerPosition.top < obstaclePosition.bottom &&
          playerPosition.right > obstaclePosition.left &&
          playerPosition.left < obstaclePosition.right) {
        clearInterval(obstacleInterval);
        clearInterval(collisionInterval);
        alert("¡Has perdido! Puntuación: " + score);
        break;
      }
    }
  }, 100);
}

// Agrega un event listener para detectar cuando se presiona el botón de inicio
document.getElementById("start-button").addEventListener("click", function() {
  // Obtiene el tipo de obstáculo seleccionado
  var obstacleType = document.getElementById("obstacle-type").value;
  
  // Llama a la función startGame con el tipo de obstáculo como parámetro
  startGame(obstacleType);
});

// Configura la posición inicial del jugador
var player = document.getElementById("player");
player.style.left = "225px";
player.style.bottom = "0px";
