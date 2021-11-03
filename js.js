function tambahbarang(id) {
    $.get('tambahsession.php?session=' + id);
    location.reload();
}
function kurangItem(id) {
    $.get('kurangsession.php?session=' + id);
    location.reload();
}

function hapusBarang(id) {
    $.get('hapussession.php?session=' + id);
    location.reload();
}
