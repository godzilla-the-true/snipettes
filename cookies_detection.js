/**
 * Fonction pour définir un cookie
 *
 * @param {string} name - Le nom du cookie
 * @param {string} value - La valeur du cookie
 * @param {number} days - La durée de vie du cookie en jours
 */
function setCookie(name, value, days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
}


/**
 * Fonction pour vérifier si un cookie existe dans le navigateur du client.
 *
 * @param {string} name - Le nom du cookie à vérifier
 * @return {boolean} Retourne true si le cookie existe, false sinon
 */
function checkCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return true;
    }
    return false;
}


/**
 * Fonction pour obtenir la valeur d'un cookie
 *
 * @param {string} name - Le nom du cookie dont on souhaite obtenir la valeur
 * @return {string|null} La valeur du cookie ou null si le cookie n'existe pas
 */
function getCookieValue(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}
