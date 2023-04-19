function calculateTip() {
    var billAmt = document.getElementById("billamt").value;
    var serviceQual = document.getElementById("serviceQual").value;
    var numOfPeople = document.getElementById("peopleamt").value;
  
    if (billAmt === "" || serviceQual == 0) {
      alert("Please enter values");
      return;
    }
  
    if (numOfPeople === "" || numOfPeople <= 1) {
      numOfPeople = 1;
    }
  
    var total = (billAmt * serviceQual) / numOfPeople;
    total = Math.round(total * 100) / 100;
    total = total.toFixed(2);
    document.getElementById("tip").innerHTML = total;
  }
  
  document.getElementById("calculate").onclick = function() {
    calculateTip();
  };