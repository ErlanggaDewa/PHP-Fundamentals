let keyword = document.getElementById("keywordCari");

keyword.addEventListener("keyup", function () {
    let xhttp = new XMLHttpRequest();
    xhttp.open("GET", "AJAX/ajax.php?keyword=" + keyword.value, true);
    xhttp.send();
    xhttp.onreadystatechange = function () {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById("container").innerHTML = xhttp.responseText;
        }
    };
});
