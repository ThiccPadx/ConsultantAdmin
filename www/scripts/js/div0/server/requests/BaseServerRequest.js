var BaseServerRequest = (function () {
    function BaseServerRequest(channel, data) {
        this.channel = channel;
        this.data = data;
        this.send();
    }
    BaseServerRequest.prototype.send = function () {
        //Server
    };
    BaseServerRequest.prototype.getChannel = function () {
        return this.channel;
    };
    BaseServerRequest.prototype.getData = function () {
        return this.data;
    };
    return BaseServerRequest;
})();
//# sourceMappingURL=BaseServerRequest.js.map