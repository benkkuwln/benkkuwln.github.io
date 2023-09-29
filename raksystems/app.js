showStories();

// Store to Local storage function
let addBtn = document.getElementById("addBtn");
addBtn.addEventListener("click", function (e) {
  let addTxt = document.getElementById("addTxt");
  let stories = localStorage.getItem("stories");
  if (stories == null) {
    storiesObj = [];
  } else {
    storiesObj = JSON.parse(stories);
  }
  storiesObj.push(addTxt.value);
  localStorage.setItem("stories", JSON.stringify(storiesObj));
  addTxt.value = ""; //to make the text blank after clicking the button
  console.log(storiesObj);
  showStories();
});

// Show localStorage function
function showStories() {
  let stories = localStorage.getItem("stories");
  if (stories == null) {
    storiesObj = [];
  } else {
    storiesObj = JSON.parse(stories);
  }
  let html = "";
  storiesObj.forEach(function (element, index) {
    html += `
              <div class="noteCard my-2 mx-2 card" style="width: 18rem;">
                      <div class="card-body">
                          <h4 class="card-title">Day ${index + 1}</h4>
                          <p class="card-text"> ${element}</p>
                          <button id="${index}"onclick="deleteStory(this.id)" class="btn btn-primary">Delete Story</button>
                      </div>
                  </div>`;
  });
  let storiesElm = document.getElementById("stories");
  if (storiesObj.length != 0) {
    storiesElm.innerHTML = html;
  } else {
    storiesElm.innerHTML = `Nothing to show! Use "Write a story" section above to write your story.`;
  }
}

// Function to delete a story
function deleteStory(index) {
// console.log("I am deleting", index);

  let stories = localStorage.getItem("stories");
  if (stories == null) {
    storiesObj = [];
  } else {
    storiesObj = JSON.parse(stories);
  }

  storiesObj.splice(index, 1);
  localStorage.setItem("stories", JSON.stringify(storiesObj));
  showStories();
}

let search = document.getElementById('searchTxt');
search.addEventListener("input", function () {

  let inputVal = search.value.toLowerCase();
  // console.log('Input event fired!', inputVal);
  let storyCards = document.getElementsByClassName('noteCard');
  Array.from(storyCards).forEach(function (element) {
    let cardTxt = element.getElementsByTagName("p")[0].innerText;
    if (cardTxt.includes(inputVal)) {
      element.style.display = "block";
    }
    else {
      element.style.display = "none";
    }
    // console.log(cardTxt);
  })
})
