function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("app").style.marginLeft = "250px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
  document.getElementById("overlay").style.display = "block";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("app").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
  document.getElementById("overlay").style.display = "none";
}
