const a = document.getElementById('notification');
a.classList.add('bad');
a.textContent = `Data jest niepoprawna ! Proszę podać inną datę`;
function closeHelpDiv() {
  document.getElementById("notification").style.display = "none";
}
window.setTimeout("closeHelpDiv();", 4000);