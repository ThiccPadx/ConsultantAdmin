var Cookie = function(){

    function getCookie(name) {
        var matches = document.cookie.match(new RegExp(
            "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"

        ));
        return matches ? decodeURIComponent(matches[1]) : undefined;
    }

    /**
     * Sets cookie
     * @param cname
     * @param cvalue
     * @param exdays
     */
    function setCookie(cname, cvalue)
    {
        //log("set cookie "+cname+" "+cvalue);
        var d = new Date();
        d.setTime(d.getTime() + ($.cookieAliveDays*24*60*60*1000));
        var expires = "expires="+d.toUTCString();
        document.cookie = cname + "=" + cvalue + "; path=/; " + expires;
    }

    return{
        saveRoomToEnter:function(id){
            setCookie('roomToEnter', id);
        },
        clear:function(){
            var cookies = document.cookie.split(";");

            for (var i = 0; i < cookies.length; i++) {
                var cookie = cookies[i];
                var eqPos = cookie.indexOf("=");
                var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
                document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
            }
        }
    }
};
