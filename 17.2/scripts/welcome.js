var name = prompt("What is your name?")
var welcomeNode = document.getElementById("welcome")

if(name.toLowerCase() == "benkku") {
    welcomeNode.innerText = "Welcome to your website";
}