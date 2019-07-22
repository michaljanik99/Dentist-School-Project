const a = document.getElementById('notification');
a.classList.add('good');
a.textContent = `Wizyta pomyślnie dodana do rejestru`;
function closeHelpDiv() {
    document.getElementById("notification").style.display = "none";
}
window.setTimeout("closeHelpDiv();", 4000);