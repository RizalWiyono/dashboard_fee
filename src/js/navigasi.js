function openNav() {
//   document.getElementById("mySidenav").style.width = "28%";
  document.getElementById("mySidenav").style.transform = "translateX(0%)";
  document.getElementById("hm").style.transform = "translateX(0%)";
}

function openNav2() {
//   document.getElementById("mySidenav").style.width = "28%";
  document.getElementById("mySidenav2").style.transform = "translateX(0%)";
  document.getElementById("hm2").style.transform = "translateX(0%)";
}

function closeNav2() {
//   document.getElementById("mySidenav").style.width = "0";
document.getElementById("mySidenav2").style.transform = "translateX(100%)";
document.getElementById("hm2").style.transform = "translateX(-100%)";
}

function closeNav() {
//   document.getElementById("mySidenav").style.width = "0";
document.getElementById("mySidenav").style.transform = "translateX(100%)";
document.getElementById("hm").style.transform = "translateX(-100%)";
}