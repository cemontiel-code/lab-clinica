function showResult() {
  str = document.getElementById("searchbar").value;
  if (str.length == 0) {
    document.getElementById("livesearch").innerHTML = "sin resultados";
    document.getElementById("livesearch").style.border = "0px";
    return;
  }
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("livesearch").innerHTML = this.responseText;
      document.getElementById("livesearch").style.border = "1px solid #A5ACB2";
    }
  };
  xmlhttp.open("GET", "script/pbusque.php?q=" + str, true);
  xmlhttp.send();
}

function showAll() {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("livesearch").innerHTML = this.responseText;
      document.getElementById("livesearch").style.border = "1px solid #A5ACB2";
    }
  };
  xmlhttp.open("GET", "script/allbus.php", true);
  xmlhttp.send();
}
