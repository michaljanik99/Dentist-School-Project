const a = document.getElementById('notification');
a.classList.add('bad');
a.textContent = `Wybrany termin wizyty jest juz zajęty ! Wybierz inną godzinę lub inny dzień wizyty`;
function closeHelpDiv() {
    document.getElementById("notification").style.display = "none";
}
window.setTimeout("closeHelpDiv();", 4000);