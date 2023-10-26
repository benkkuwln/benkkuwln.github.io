const itemlist = document.getElementById('itemlist');
const removebtn = document.getElementById('removebtn');
const bigbtn = document.getElementById('bigbtn');

var uusiId = 0;

bigbtn.addEventListener('click', function addTask() {
    var li = document.createElement('li');
    var uusitask = document.getElementById('uusitask');
    li.setAttribute('class', 'list-group-item');
    li.setAttribute('id', uusiId)
    itemlist.appendChild(li);
    li.innerHTML = uusitask.value + '<button class="p-1 bg-danger text-white rounded border-0 mx-1" onclick="remove(' + uusiId + ')">Poista</button>';
    uusiId++;
    logStorage();
})

removebtn.addEventListener('click', function removeTask() {
itemlist.removeChild(itemlist.lastElementChild);
    logStorage();
})

function remove(id) {
    document.getElementById(id).remove();
    logStorage();
}

function logStorage() {
    localStorage.setItem('tasks', itemlist.innerHTML)
}

itemlist.innerHTML = localStorage.getItem('tasks')
