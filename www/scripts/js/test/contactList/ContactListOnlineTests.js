var ContactListOnlineTests = function(){

    var users = new TestUsers();
    var user1 = users.getUser(0);
    var user2 = users.getUser(1);

    var selfUser = users.getUser(2);

    var contactsOnline;

    function createEntity(){
        contactsOnline = new ContactsOnline();
        contactsOnline.init(selfUser.id);
    }

    return{
        execute:function(){
            createEntity();
        }
    }
};
