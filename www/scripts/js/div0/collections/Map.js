/// <reference path="iterators/MapIterator.ts"/>
var Map = (function () {
    function Map() {
        this.keys = new Array();
        this.items = {};
    }
    Map.prototype.removeKey = function (key) {
        var index = this.keys.indexOf(key);
        this.keys.splice(index, 1);
    };
    Map.prototype.add = function (key, value) {
        this.items[key] = value;
        this.keys.push(key);
    };
    Map.prototype.remove = function (key) {
        delete this.items[key];
        // remove key
        this.removeKey(key);
    };
    Map.prototype.clear = function () {
        this.keys = new Array();
        this.items = {};
    };
    Map.prototype.has = function (key) {
        return key in this.items;
    };
    Map.prototype.get = function (key) {
        return this.items[key];
    };
    Map.prototype.getKeys = function () {
        return this.keys;
    };
    Map.prototype.size = function () {
        return this.keys.length;
    };
    Map.prototype.getIterator = function () {
        return new MapIterator(this);
    };
    return Map;
})();
//# sourceMappingURL=Map.js.map