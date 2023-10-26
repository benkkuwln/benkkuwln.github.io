// Clears function values
function clearScreen() {
    document.getElementById("result").value = "";
}
 
// Displays function values
function display(value) {
    document.getElementById("result").value += value;
}
 
// Displays the result
function calculate() {
    var p = document.getElementById("result").value;
    var q = eval(p);
    document.getElementById("result").value = q;
}

console.log("Joo ei ole SELECT elementin sisällä, mutta laskin funktioi oikein ja olen iloinen sen kanssa.")