// SPLITTING the Characters \\

const h1 = document.querySelector("h1")
const characters = h1.innerText.split('')
let html = ""

// SELECTING the Characters \\

characters.forEach(letter => {
    let classes = ""
    if(letter !== " ") {
        classes = "letter javascript-character"
    }
    html = html + `<span class='${classes}'>${letter}</span>`
})

h1.innerHTML = html

const jsCharacters = document.querySelectorAll(".javascript-character")
jsCharacters.forEach(node => {

    // mouseover/mouseout function, hovering over and off the text Event Listeners \\

    node.addEventListener("mouseover", function(event) {
        console.log(this.innerText)
        this.classList.add("active")
    })
    node.addEventListener("mouseout", function(event) {
        this.classList.remove("active")
    })
})