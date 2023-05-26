const h1 = document.querySelector("h1")
const letters = h1.innerText.split('')
let html = ""

letters.forEach(letter => {
    let classes = ""
    if(letter !== " ") {
        classes = "letter js-letter"
    }
    html = html + `<span class='${classes}'>${letter}</span>`
})

h1.innerHTML = html
const jsLetters = document.querySelectorAll(".js-letter")
jsLetters.forEach(node => {
    node.addEventListener("mouseover", function(event) {
        console.log(this.innerText)
        this.classList.add("active")
    })
    node.addEventListener("mouseout", function(event) {
        this.classList.remove("active")
    })
})