var Server = (function(){
    var cometd = $.cometd;
    var cometURL = "http://localhost:8080/Consultant/cometd";
    //var cometURL = "http://localhost:8080/ConsultantServerTomcat/cometd";
    //var cometURL = "http://185.86.79.247:8080/RomanSeletskyChatServerMaven-0.0.1-SNAPSHOT/cometd";

    var _connected = false;
    var logLevel = "warn"; // warn", "info", "debug"
    //var logLevel = "debug"; // warn", "info", "debug"

    function _metaDisconnect(message)
    {
        console.log("_metaDisconnect message.successful=" + message.successful);
    }

    // Function invoked when first contacting the server and
    // when the server has lost the state of this client
    function _metaHandshake(handshake) {
        console.log('handshake successful='+handshake.successful);
        if (handshake.successful === true) {
            cometd.batch(function() {
                cometd.subscribe('/message', function(message) {
                    var messageObject = JSON.parse(message.data);
                    console.log(messageObject.data);
                });

                cometd.subscribe('/taskResult', function(message) {
                    var messageObject = JSON.parse(message.data);
                    console.log("Task result: ");
                    console.log(messageObject);
                });


                cometd.subscribe('/stepInfo', function(message) {
                    console.log("Server stepInfo " + message.data);
                    var messageData = JSON.parse(message.data);

                    console.log(messageData);
                    var stepId = messageData.step;
                    var stepInfo = messageData.info;

                    logStepServerInfo(stepId, stepInfo);
                    /*
                    var infoContainer = $('<div></div>').appendTo('#body');
                    infoContainer.html("Step "+taskData[stepId].id+". <font color='blue'>'" + taskData[stepId].description+"'</font> <font color='green'>"+messageData.info+"</font>");
                    */
                });
            });
        }
    }

    function logStepServerInfo(stepId, stepInfo){
        var infoContainer = $('<div></div>').appendTo('#body');
        infoContainer.html("Step "+taskData[stepId].id+". <font color='blue'>'" + taskData[stepId].description+"'</font> <font color='green'>"+stepInfo+"</font>");
    }


    function _metaConnect(message) {
        if (cometd.isDisconnected()) {
            _connected = false;
            _connectionClosed();
            return;
        }

        var wasConnected = _connected;
        _connected = message.successful === true;
        if (!wasConnected && _connected) {
            _connectionEstablished();
        } else if (wasConnected && !_connected) {
            _connectionBroken();
        }
    }

    function _connectionEstablished() {
        console.log("CometD Connection Established");
        EventBus.dispatch(ServerEvent.CONNECTION_SUCCESS);
    }

    function _connectionBroken() {
        console.log("CometD Connection Broken");
    }

    function _connectionClosed() {
        console.log("CometD Connection Closed");
    }

    function addSystemListeners(){
        cometd.addListener('/meta/handshake', _metaHandshake);
        cometd.addListener('/meta/connect', _metaConnect);
        cometd.addListener('/meta/disconnect', _metaDisconnect); // срабатывает в IE
    }

    return{
        connect:function(url){
            if(url!=undefined){
                cometURL = url;
            }

            //cometd.unregisterTransport('websocket');
            // Disconnect when the page unloads
            $(window).unload(function() {
                cometd.disconnect(true);
            });

            cometd.configure({
                url: cometURL,
                logLevel: logLevel
            });

            console.log('connecting to '+cometURL);
            addSystemListeners();
            cometd.handshake();
        },
        disconnect:function(){
            cometd.disconnect();
        },
        isConnected:function(){
            return _connected === true;
        },
        send:function(request){
            var channel = request.getChannel();
            var data = JSON.stringify(request.getData());
            console.log("sending to channel "+channel+"  data="+data);
            cometd.publish(channel, data);
            console.log("request sent");
        },
        addListener:function(channel, callback){
            cometd.subscribe(channel, this, callback);
        },
        removeListener:function(channel, callback){
            cometd.unsubscribe(callback);
        }
    }
})();
