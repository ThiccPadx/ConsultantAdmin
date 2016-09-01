var MyApplication = function(){

    var serverConnected = false;
    var id = Math.round(Math.random()*20784);

    var cancelSeleniumTaskButton;
    var startSeleniumTaskButton;

    function connectToServer(){
        EventBus.addEventListener(ServerEvent.CONNECTION_SUCCESS, serverConnectedHandler);
        var serverConnection = new ServerConnection();
        serverConnection.connect();
    }

    function serverConnectedHandler(){
        console.log("Server connected");

        if(!serverConnected){
            // no need to register again is server connected again. It is possible to temporary disconnect because of LongPolling
            EventBus.removeEventListener(ServerEvent.CONNECTION_SUCCESS, serverConnectedHandler);
            serverConnected = true;

            /*
            console.log("sending steps data ...");
            new SendTaskRequest().execute(taskData);
            console.log("steps data sent");
            */
        }
    }

    function log(message){
        var infoContainer = $('<div></div>').appendTo('#body');
        infoContainer.html(message);
    }

    function initView(){
        startSeleniumTaskButton = $("#startSeleniumTaskButton");
        cancelSeleniumTaskButton = $("#cancelSeleniumTaskButton");
    }

    function addCancelButtonListener() {
        cancelSeleniumTaskButton.click(function() {
            new CancelTaskRequest().execute("");
        });
    }

    function addStartButtonListener() {
        startSeleniumTaskButton.click(function() {
            console.log("sending steps data ...");
            var task = new Task();
            var taskData = task.getData("0", true, "ILAY", "VASILYEV", "02-10-1989", "Mrs.", 1, "email@mail.com", "password", "6827/0167/4291", "26-08-2025", "31-10-2016", 219);

            new SendTaskRequest().execute(taskData);
            console.log("steps data sent");
        });
    }

    return{
        init:function(){
            connectToServer();
            initView();
            addStartButtonListener();
            addCancelButtonListener();
        }
    }
};
