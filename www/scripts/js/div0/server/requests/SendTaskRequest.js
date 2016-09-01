var SendTaskRequest = function(){

    var channel = "/service/newTask";
    var requestData;

    return{
        execute:function(data){
            requestData = data;
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
