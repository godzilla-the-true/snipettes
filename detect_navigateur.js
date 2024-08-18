function getBrowser() {
    var userAgent = navigator.userAgent;
    var browsers = {
        'edg': /Edg\/([0-9.]+)/, 
        'chrome': /Chrome\/([0-9.]+)/, 
        'firefox': /Firefox\/([0-9.]+)/, 
        'safari': /Safari\/([0-9.]+).*Version\/([0-9.]+)/, 
        'opera': /OPR\/([0-9.]+)|Opera\/([0-9.]+)/, 
        'ie': /MSIE\s([0-9.]+)|Trident\/.*rv:([0-9.]+)/ 
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
