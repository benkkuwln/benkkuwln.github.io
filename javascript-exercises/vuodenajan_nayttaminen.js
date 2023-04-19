var month = prompt("What month were you born?")
let answer = month.toLowerCase

/* Doesn't work */
//var winter = ["December", "January", "February"]
//var spring = ["March", "April", "May"]
//var summer = ["June", "July", "August"]
//var autumn = ["September", "October", "November"]

if (answer == "December"|| answer == "January"|| answer == "February") {
    answer.innerHTML = "You were born in winter!"
}
if (answer == "March"|| answer == "April"|| answer == "May") {
    answer.innerHTML = "You were born in the spring!"
}
if (answer == "June"|| answer == "July"|| answer == "August") {
    answer.innerHTML = "You were born in the summer!"
}
if (answer == "September"|| answer == "October"|| answer == "November") {
    answer.innerHTML = "You were born in autumn!"
}