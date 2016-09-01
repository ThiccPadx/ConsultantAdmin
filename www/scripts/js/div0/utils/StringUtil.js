var StringUtil = (function(){
    return{
        encodeUTF:function(string){
            return unescape(encodeURIComponent(string));
        },
        decodeUTF:function(string){
            return decodeURIComponent(escape(string));
        }
    }
})();
