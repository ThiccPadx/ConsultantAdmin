var RegisterUserTest = function(){
    var user;

    function registerUser(){
        var isServerConnected = Server.isConnected();

        if(isServerConnected===true){
            var listener = new RegistrationResultListener();
            listener.createListener(user.id);
            new RegisterUserRequest().execute(user);
        }
        else{
            console.error("Server disconnected");
        }
    }

    function createResultListener(){
        EventBus.addEventListener(ServerEventType.REGISTRATION_COMPLETE, registrationCompleteHandler);
        EventBus.addEventListener(ServerEventType.REGISTRATION_ERROR, registrationErrorHandler);
    }
    function removeResultListener(){
        EventBus.removeEventListener(ServerEventType.REGISTRATION_COMPLETE, registrationCompleteHandler);
        EventBus.removeEventListener(ServerEventType.REGISTRATION_ERROR, registrationErrorHandler);
    }

    function registrationCompleteHandler(event){
        console.log("registrationCompleteHandler "+event.data);
        $('#body').append('<div>registration result:'+JSON.stringify(event.data)+'</div>');
        removeResultListener();
    }
    function registrationErrorHandler(event){
        console.log("registrationErrorHandler "+event.data);
        $('#body').append('<div>registration ERROR:'+JSON.stringify(event.data)+'</div>');
        removeResultListener();
    }

    return{
        execute:function(_user){
            user = _user;
            createResultListener();
            registerUser();
        }
    }
};
