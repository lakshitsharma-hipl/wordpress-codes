/* 
  * Cookie Code
*/
    function setcookie(key, value, expiry) {

        var expires = new Date();
    
        expires.setTime(expires.getTime() + (expiry * 24 * 60 * 60 * 1000));
    
        document.cookie = key + '=' + value + ';path=/' + ';expires=' + expires.toUTCString();
    
    }
    
    
    
    function getcookie(key) {
    
        var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
    
        return keyValue ? keyValue[2] : null;
    
    }
    
    
    
    function erasecookie(key) {
    
        var keyValue = getcookie(key);
    
        setcookie(key, keyValue, '-1');
    
    }
