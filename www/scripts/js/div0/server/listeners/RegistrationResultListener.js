var RegistrationResultListener = function(){

    var registrationCompleteChannel;
    var registrationErrorChannel;

    function onRegistrationComplete(data){
        EventBus.dispatch(ServerEvent.REGISTRATION_COMPLETE, data, this);
    }
    function onRegistrationError(data){
        EventBus.dispatch(ServerEvent.REGISTRATION_ERROR, data, this);
    }

    return{
        createListener:function(userId){
            registrationCompleteChannel = "/"+userId+"_registerComplete";
            registrationErrorChannel = "/"+userId+"_registerError";
            Server.addListener(registrationCompleteChannel, this.completeHandler);
            Server.addListener(registrationErrorChannel, this.errorHandler);
        },
        completeHandler:function(data){
            onRegistrationComplete(data);
        },
        errorHandler:function(data){
            onRegistrationError(data);
        },
        remove:function(){
            Server.removeListener(registrationCompleteChannel, this.completeHandler);
            Server.removeListener(registrationErrorChannel, this.errorHandler);
        }
    }
};
