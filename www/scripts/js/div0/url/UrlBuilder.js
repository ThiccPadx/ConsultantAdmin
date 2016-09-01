var UrlBuilder = function(){

    var stateObj = { foo: "bar" };
    function change_my_url(url)
    {
        history.pushState(stateObj, "page 2", url);
    }

    return{
        updateId:function(id){
            window.history.replaceState(baseUrl+"#"+id, "Chat", baseUrl+"?"+id);
            //console.log("url updated");
        }
    }
};
