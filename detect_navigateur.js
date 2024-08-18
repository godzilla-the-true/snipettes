/**
 * Fonction pour détecter le navigateur web et sa version.
 *
 * Cette fonction analyse la chaîne `userAgent` fournie par le navigateur pour
 * identifier le type de navigateur utilisé ainsi que sa version. Elle retourne
 * un objet contenant le nom du navigateur et sa version. Si le navigateur n'est
 * pas reconnu, la fonction retourne un objet avec des chaînes vides.
 *
 * @returns {Object} Un objet avec les propriétés suivantes :
 *                    - `name` {String} : Le nom du navigateur (ex. 'chrome', 'firefox').
 *                    - `version` {String} : La version du navigateur (ex. '92.0.4515.107').
 * @since 1.0.0
 * @author @Mister__iks
 * @link https://www.linkedin.com/in/ibrahima-samb-dev
 * @example
 * var browserInfo = getBrowser();
 * console.log(browserInfo.name);
 * console.log(browserInfo.version); 
 */
function getBrowser() {
    var userAgent = navigator.userAgent;
    var browsers = {
        'edg': /Edg\/([0-9.]+)/,                // Microsoft Edge
        'chrome': /Chrome\/([0-9.]+)(?:\s|$)/, // Google Chrome
        'firefox': /Firefox\/([0-9.]+)/,        // Mozilla Firefox
        'safari': /Version\/([0-9.]+).*Safari\/([0-9.]+)/, // Safari 
        'opera': /OPR\/([0-9.]+)|Opera\/([0-9.]+)/, // Opera
        'ie': /MSIE\s([0-9.]+)|Trident\/.*rv:([0-9.]+)/ // Internet Explorer
    };
    for (var browser in browsers) {
        var match = userAgent.match(browsers[browser]);
        if (match) {
            return {
                name: browser,
                version: match[1] || match[2] || ''
            };
        }
    }

    return {
        name: '',
        version: ''
    };
}
