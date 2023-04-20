const canvas = document.getElementById('gameArea');
const ctx = canvas.getContext("2d");

let x = 100;
let y = 100;
let radius = 20;
let speed = 10;

let upPressed = false;
let downPressed = false;
let leftPressed = false;
let rightPressed = false;

function drawGame(){
    requestAnimationFrame(drawGame);
    clearScreen();
    inputs();
    boundryCheck();
    drawPurBlob();
}

function boundryCheck(){
    //UP
    if( y < radius){
        y = radius;
    }
    //DOWN
    if(y > canvas.height - radius) {
        y = canvas.height - radius;
    }
    //LEFT
    if(x < radius) {
        x = radius;
    }
    //RIGHT
    if(x > canvas.width - radius) {
        x = canvas.width - radius;
    }
}

function inputs(){
    if(upPressed){
         y = y - speed;
    }
    if(downPressed){
        y = y + speed;
    }
    if(leftPressed){
        x = x - speed;
    }
    if(rightPressed){
        x = x + speed;
    }
}

function drawPurBlob() {
    ctx.fillStyle = "pink";
if(upPressed) {
    ctx.fillStyle = "purple";
}
if(downPressed) {
    ctx.fillStyle = "red";
}
if(leftPressed) {
    ctx.fillStyle = "violet";
}
if(rightPressed) {
    ctx.fillStyle = "magenta";
}
    ctx.beginPath();
    ctx.arc(x, y, radius, 0, Math.PI * 2);
    ctx.fill();
}

function clearScreen(){
    ctx.fillStyle = "blue";
    ctx.fillRect(0,0, canvas.width, canvas.height);
}

function refreshPage() {
    window.location.reload();
} 

document.body.addEventListener('keydown', keyDown);
document.body.addEventListener('keyup', keyUp);

function keyDown(event) {
    //up
    if(event.keyCode == 87) {
            upPressed = true;
    }

    //down
    if(event.keyCode == 83){
        downPressed = true;
    }

    //left
    if(event.keyCode == 65){
        leftPressed = true;
    }

    //right
    if(event.keyCode == 68){
        rightPressed = true;
    }
}

function keyUp(event) {
    //up
    if(event.keyCode == 87) {
        upPressed = false;
}

    //down
    if(event.keyCode == 83){
        downPressed = false;
}

    //left
    if(event.keyCode == 65){
        leftPressed = false;
}

    //right
    if(event.keyCode == 68){
        rightPressed = false;
}
}

drawGame();