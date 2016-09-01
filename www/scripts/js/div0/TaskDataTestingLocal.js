// xPath is some kind of regexp

var taskData = new Array(
    {
        id:0,
        action:OPEN_URL,
        description: "opening site",
        elementSearchData:'http://seleniumcalendarexample/DropDown.html'
    },
    // select city
    {
        id:1,
        action:SELECT_DROP_DOWN_ITEM,
        selectionIndex:9,
        elementSearchType:BY_ID,
        description:StringUtil.encodeUTF("select city from drop down with id ctl00_plhMain_cboVAC"),
        elementSearchData:'ctl00_plhMain_cboVAC'
    }
);
