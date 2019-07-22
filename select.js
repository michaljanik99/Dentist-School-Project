function opcja() {
    const o = document.getElementById('lista').value;
    const a = document.getElementById('price');
    document.getElementById('price').style.display = "block";
    a.classList.add('message');
    a.textContent = `Cena zabiegu ${o} zł `;
    window.setTimeout('document.getElementById("price").style.display = "none"', 3000);
}