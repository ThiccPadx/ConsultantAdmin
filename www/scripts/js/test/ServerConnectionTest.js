var ServerConnectionTest = function(){

    function serverConnectedHandler(){
        console.log("ServerConnected");
        //EventBus.removeEventListener(ServerEvent.CONNECTION_SUCCESS, serverConnectedHandler);
    }

    return{
        testConnection:function(){
            console.log("Start server connection test");
            EventBus.addEventListener(ServerEvent.CONNECTION_SUCCESS, serverConnectedHandler);
            Server.connect();
        }
    }
};
