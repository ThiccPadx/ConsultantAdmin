var ContactListItemViewTests = function(){
    var users = new TestUsers();
    var testItem = new ContactListItemView();

    function onNewMessage(){
        console.log("on New message");
        testItem.newMessageReceived();
    }

    function onMessageClickTest(){
        console.log("sending on message click");
        testItem.testOnMessageClick();
    }

    return{
        execute:function(){
            testItem.setData(users.getRandomUser());
            testItem.setContainer('#contactListUsesOnlineContainer');
            setTimeout(onNewMessage, 1000);
            setTimeout(onMessageClickTest, 2000);
        }
    }
};
