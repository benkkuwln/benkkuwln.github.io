var max = prompt("Give me a number")
var num = 0
var answer = false
var correctNum = Math.round(Math.random() * max);

if(correctNum == 0) {
correctNum = 1;
}

while(answer == false) {
num = prompt("Give me a number between 1 and " + max + " ")
if(num == correctNum) {
    answer = true
    alert("Nice " + correctNum + " is correct")
    break;
} else {
    alert("Try again")
    num = 0
 }
}