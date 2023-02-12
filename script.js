function toggleTheme() {
    var body = document.body;
    if (body.className === "light-theme") {
        body.className = "dark-theme";
    } else {
        body.className = "light-theme";
    }
}
