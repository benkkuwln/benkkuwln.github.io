const app = document.getElementById('root')

const logo = document.createElement('img')
logo.src = 'logo.png'

const container = document.createElement('div')
container.setAttribute('class', 'container')

app.appendChild(logo)
app.appendChild(container)

// Create a request variable and assign a new XMLHttpRequest object to it.
var request = new XMLHttpRequest()
// Open a new connection, using the GET request on the URL endpoint
request.open('GET', 'https://ghibli.rest/films', true)
request.onload = function () {
  // Begin accessing JSON data here, changed this.response to request.response due to "this" being technically incorrect. To manipulate the object's received data correctly, it should be request.response
  var data = JSON.parse(request.response)
  if (request.status >= 200 && request.status < 400) {
    data.forEach((movie) => {
        // Create a div with a card class
        const card = document.createElement('div')
        card.setAttribute('class', 'card')

        // Create an h1 and set the text content to the film's title
        const h1 = document.createElement('h1')
        h1.textContent = movie.title

        // Create a p and set the text content to the film's description
        const p = document.createElement('p')
        movie.description = movie.description.substring(0, 300)
        p.textContent = `${movie.description}...`

        // Append the cards to the container element
        container.appendChild(card)

        // Each card will contain an h1 and a p
        card.appendChild(h1)
        card.appendChild(p)
    })
} else {
    const errorMessage = document.createElement('marquee')
    errorMessage.textContent = `Error, not working!`
    app.appendChild(errorMessage)
  }
}

request.send();