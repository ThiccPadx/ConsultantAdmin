var TestUsers = function(){

    var user1 = {id:"user1", age:"23", name:"userName_1", streamId:"userStreamID", link:"http://user1/", image:"assets/lolita1.jpg",gender:"1", money:"100", lifetime:"14578"};
    var user2 = {id:"user2", age:"20", name:"userName_2", streamId:"userStreamID2", link:"http://user2/", image:"assets/lolita2.jpg",gender:"0", money:"120", lifetime:"178"};
    var user3 = {id:"user3", age:"38", name:"userName_3", streamId:"userStreamID3", link:"http://user3/", image:"assets/lolita3.jpg",gender:"0", money:"120", lifetime:"18"};
    var user4 = {id:"user4", age:"52", name:"userName_4", streamId:"userStreamID4", link:"http://user4/", image:"assets/lolita4.jpg",gender:"0", money:"120", lifetime:"8000000"};

    var users = new Array(user1, user2, user3, user4);

    return{
        getUser:function(index){
            return users[index];
        },
        getRandomUser:function(){
            var max = users.length - 1;
            var min = 0;
            var randomIndex = Math.floor(Math.random() * (max - min + 1)) + min;
            return users[randomIndex];
        }
    }
};
