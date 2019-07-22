const a = document.getElementById('notification');
a.classList.add('bad');
a.textContent = `Jesteś już zarejestrowany w danym dniu i na podaną godzinę`;
function closeHelpDiv() {
    document.getElementById("notification").style.display = "none";
}
window.setTimeout("closeHelpDiv();", 4000);