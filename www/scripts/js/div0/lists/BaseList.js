var BaseList = function(){

    var container;
    var parser;
    var collection;

    function createDataParser(){
        parser = new DataParserJS();
    }

    function clear(){
        if(collection){
            var iterator = collection.getIterator();
            while(iterator.hasNext()){
                var listItem = iterator.next();
                listItem.destroy();
                listItem = null;
            }
        }
    }

    return{
        create:function(_container){
            container = _container;
            createDataParser();
        },
        setData:function(jsonData, exceptId){
            clear();
            collection = parser.parse(jsonData, exceptId);
            var iterator = collection.getIterator();

            while(iterator.hasNext()){
                var listItem = iterator.next();
                listItem.setContainer(container);
            }
        }
    }
};
