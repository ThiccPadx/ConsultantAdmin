class BaseServerRequest{
    private channel:string;
    private data:any;


    constructor(channel:string, data:any){
        this.channel = channel;
        this.data = data;
        this.send();
    }

    private send():void{
        //Server
    }

    public getChannel():string{
        return this.channel;
    }
    public getData():any{
        return this.data;
    }
}
