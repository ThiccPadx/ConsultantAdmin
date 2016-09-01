var OpenUrlRequest = function(){

    var channel = "/service/openUrl";
    var requestData;

    return{
        execute:function(url){
            requestData = url;
            Server.send(this);
        },
        getChannel:function(){
            return channel;
        },
        getData:function(){
            return requestData;
        }
    }
};
