var OnlineCollectionTest = function(){

    var users = new TestUsers();

    var totalUsersToRegister = 4;
    var registeredUsers = 0;

    function addOnlineCollectionListener(){
        new UserCollectionListener().create();
        EventBus.addEventListener(ServerEventType.USER_COLLECTION_CHANGE, onlineUserCollectionChangeHandler);
    }

    function registerOneMoreUser(){
        console.log("registering user...");
        new RegisterUserTest().execute(users.getUser(registeredUsers));

        registeredUsers++;
        if(registeredUsers<totalUsersToRegister){
            setTimeout(registerOneMoreUser, 2000);
        }
        else{
            console.log("All users registerd");
            startRemoveSequence();
        }
    }

    function startRemoveSequence(){

    }

    function onlineUserCollectionChangeHandler(event){
        console.log("ONLINE COLLECTION CHANGED "+event.data);
        var onlineCollection = JSON.parse(event.data.data);

        var collection = JSON.parse(onlineCollection.collection);
        console.log("total: "+collection.length);
        $('#body').append('<div>ONLINE:<br/>'+JSON.stringify(collection)+'  total:'+collection.length+'</div>');
        console.log("collection refresh complete");
    }

    return{
        execute:function(){
            addOnlineCollectionListener();
            new RegisterUserTest().execute(users.getUser(registeredUsers));
            setTimeout(registerOneMoreUser, 2000);
        }
    }
};
