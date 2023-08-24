// custom variable
const canvas = document.getElementById('canvas1');

//context variable
const ctx = canvas.getContext('2d');
canvas.width = 2560;
canvas.height = 7680;

// global settings
ctx.lineWidth = 10;
const gradient1 = ctx.createLinearGradient(0, 0, canvas.width, canvas.height);
gradient1.addColorStop('0.2', '#0349fc');
gradient1.addColorStop('0.4', '#c203fc');
// gradient1.addColorStop('0.6', '#ff00b7');
gradient1.addColorStop('0.8', '#ff005d');
gradient1.addColorStop('1.0', '#ff0019');
// const gradient2 = ctx.createRadialGradient(0, 0, canvas.width * 0.5, canvas.height * 0.5, 70, canvas.width * 0.5, canvas.height * 0.5, 200,);
// gradient2.addColorStop('0.4', 'green');
// gradient2.addColorStop('0.6', 'blue');
// gradient2.addColorStop('0.8', 'red');

ctx.strokeStyle = gradient1;

class Line {
    constructor(canvas){
        this.canvas = canvas;
        this.x = Math.random() * canvas.width;
        this.y = Math.random() * canvas.height;
        this.history = [{x: this.x, y: this.y}];
        this.lineWidth = Math.floor(Math.random() * 15 + 1);
        this.hue = Math.floor(Math.random() * 360);
        this.maxLength = Math.floor(Math.random() * 20 + 10);
        this.speedX = Math.random() * 5 - 2.5;
        this.speedY = -5;
        this.lifeSpan = this.maxLength * 5;
        this.timer = 0;
    }
    draw(context){
        // changes the hue of the line to a random color on the hsl spectrum
        //context.strokeStyle = 'hsl(' + this.hue + ', 100%, 50%)';
        context.lineWidth = this.lineWidth;
        context.beginPath();
        context.moveTo(this.history[0].x, this.history[0].y);
        // for (let i = 0; i < 30; i++){
        //     this.x = Math.random() * this.canvas.width;
        //     this.y = Math.random() * this.canvas.height;
        //     this.history.push({x: this.x, y: this.y});
        // }
        for (let i = 0; i < this.history.length; i++){
            context.lineTo(this.history[i].x, this.history[i].y);
        }
        context.stroke();
    }
    update(){
        this.timer++;
        if (this.timer < this.lifeSpan){
        this.x += this.speedX + Math.random() * 20 - 10;
        this.y += this.speedY + Math.random() * 20 - 10;
        // this.x = Math.random() * this.canvas.width;
        // this.y = Math.random() * this.canvas.height;
        this.history.push({x: this.x, y: this.y});
        if (this.history.length > this.maxLength){
            this.history.shift();
            }
        } else if (this.history.length <= 1) {
            this.reset();
        } else {
            this.history.shift();
        }
    }
    reset(){
        this.x = Math.random() * canvas.width;
        this.y = Math.random() * canvas.height;
        this.history = [{x: this.x, y: this.y}];
        this.timer = 0;
    }
}

const linesArray = [];
const numberOfLines = 10;
for (let i = 0; i < numberOfLines; i++){
    linesArray.push(new Line(canvas));
}
console.log(linesArray);


function animate(){
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    // draw line
    linesArray.forEach(line => {
        line.draw(ctx);
        line.update();
    });
    requestAnimationFrame(animate);
}
animate();