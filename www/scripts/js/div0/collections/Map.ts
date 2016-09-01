/// <reference path="iterators/MapIterator.ts"/>
class Map<T> {
    private items: { [key: string]: T };
    private keys:string[] = new Array();

    constructor() {
        this.items = {};
    }

    private removeKey(key):void{
        var index = this.keys.indexOf(key);
        this.keys.splice(index, 1);
    }

    add(key: string, value: T): void {
        this.items[key] = value;
        this.keys.push(key);
    }

    remove(key: string): void {
        delete this.items[key];

        // remove key
        this.removeKey(key);
    }

    clear():void{
        this.keys = new Array();
        this.items = {};
    }

    has(key: string): boolean {
        return key in this.items;
    }

    get(key: string): T {
        return this.items[key];
    }

    getKeys():string[]{
        return this.keys;
    }

    size(): number {
        return this.keys.length;
    }
    getIterator():MapIterator{
        return new MapIterator(this);
    }
}
