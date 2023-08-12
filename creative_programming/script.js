// custom variable
const canvas = document.getElementById('canvas1');

//context variable
const ctx = canvas.getContext('2d');
canvas.width = 700;
canvas.height = 900;

// console.log(ctx);

// ctx.fillStyle = 'red';
// ctx.fillRect(100, 150, 200, 150);
// ctx.lineWidth = 10;
// ctx.strokeStyle = 'blue';
// ctx.strokeRect(100, 150, 200, 150);

// ctx.beginPath();
// ctx.moveTo(300, 300);
// //this creates the line between the coordinates
// ctx.lineTo(350, 400);
// ctx.lineTo(450, 500);
// ctx.stroke();

// const line1 = new Line(canvas);
// line1.draw(ctx);

// class Line {
//     constructor(canvas){
//         this.canvas = canvas;
//         this.startX = Math.random() * canvas.width;
//         this.startY = Math.random() * canvas.height;
//         this.endX = Math.random() * canvas.width;
//         this.endY = Math.random() * canvas.height;
//         this.lineWidth = Math.floor(Math.random() * 15 + 1);
//         this.hue = Math.floor(Math.random() * 360);
//     }

// global settings
ctx.lineWidth = 10;
ctx.strokeStyle = 'violet';

class Line {
    constructor(canvas){
        this.canvas = canvas;
        this.x = Math.random() * canvas.width;
        this.y = Math.random() * canvas.height;
        this.history = [{x: this.x, y: this.y}];
        this.lineWidth = Math.floor(Math.random() * 15 + 1);
        this.hue = Math.floor(Math.random() * 360);
    }
    draw(context){
        // changes the hue of the line to a random color on the hsl spectrum
        context.strokeStyle = 'hsl(' + this.hue + ', 100%, 50%)';
        context.lineWidth = this.lineWidth;
        context.beginPath();
        context.moveTo(this.history[0].x, this.history[0].y);
        for (let i = 0; i < 30; i++){
            this.x = Math.random() * this.canvas.width;
            this.y = Math.random() * this.canvas.height;
            this.history.push({x: this.x, y: this.y});
        }
        for (let i = 0; i < this.history.length; i++){
            context.lineTo(this.history[i].x, this.history[i].y);
        }
        context.stroke();
    }
}

const linesArray = [];
const numberOfLines = 1;
for (let i = 0; i < numberOfLines; i++){
    linesArray.push(new Line(canvas));
}
console.log(linesArray);
linesArray.forEach(line => line.draw(ctx));