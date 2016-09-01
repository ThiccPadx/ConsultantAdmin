// xPath is some kind of regexp

var Task = function(){

    var taskId;
    var isManualFinish;

    return{
        getData:function(taskId, isManualFinish, clientFirstName, clientLastName, clientDateOfBirth,
                         clientPersonStatus, clientPurposeId, clientEmail, clientPassword,
                         clientPTN, clientPassportExpire, clientBackDate, clientNationalityId){
            var arr = new Array();

            arr.push({
                id:-1,
                action:TASK_SETTING,
                description: "opening site",
                payload:{id:taskId, isManualFinish:isManualFinish}
            });

            arr.push({
                id:0,
                action:OPEN_URL,
                description: "opening site",
                elementSearchData:'http://www.polandvisa-ukraine.com/scheduleappointment.html'
            });
            arr.push({
                id:1,
                action:CLICK_LINK,
                elementSearchType:BY_HREF,
                overrideHrefTarget:true,
                description:StringUtil.encodeUTF("clicking link"),
                elementSearchData:'scheduleappointment_2.html'
            });
            arr.push({
                id:2,
                action:SWITCH_TO_IFRAME,
                elementType:"mainIFrame",
                elementSearchType:BY_XPATH,
                isMainFrame:1,
                description:StringUtil.encodeUTF("Switch to main iframe. find iframe by xPath /html/body/div/div[4]/table/tbody/tr[1]/td[3]/table/tbody/tr[1]/td/div[2]/iframe"),
                elementSearchData:'/html/body/div/div[4]/table/tbody/tr[1]/td[3]/table/tbody/tr[1]/td/div[2]/iframe'
            });
            arr.push({
                id:3,
                action:CLICK_LINK,
                elementSearchType:BY_ID,
                description:StringUtil.encodeUTF("link click by idctl00_plhMain_lnkSchApp"),
                elementSearchData:'ctl00_plhMain_lnkSchApp'
            });

            // City
            arr.push({
                id:4,
                action:SELECT_DROP_DOWN_ITEM,
                selectionIndex:9,
                elementSearchType:BY_ID,
                description:StringUtil.encodeUTF("select city from drop down with id ctl00_plhMain_cboVAC"),
                elementSearchData:'ctl00_plhMain_cboVAC'
            });

            // Purpose
            arr.push({
                id:5,
                action:SELECT_DROP_DOWN_ITEM,
                //selectionVisibleText:"Подача документів",
                selectionIndex:clientPurposeId,
                elementSearchType:BY_ID,
                description:StringUtil.encodeUTF("select purpose from drop down with id ctl00_plhMain_cboPurpose"),
                elementSearchData:'ctl00_plhMain_cboPurpose'
            });

            // click submit button
            arr.push({
                id:6,
                action:CLICK_ELEMENT,
                elementSearchType:BY_ID,
                description:StringUtil.encodeUTF("click submit button. element by id ctl00_plhMain_btnSubmit"),
                elementSearchData:'ctl00_plhMain_btnSubmit'
            });

            // visa category selection
            arr.push({
                id:7,
                action:SELECT_DROP_DOWN_ITEM,
                //selectionVisibleText:"Національна Віза",
                selectionIndex:1,
                elementSearchType: BY_ID,
                description:StringUtil.encodeUTF("selecting visa category from drop down with id ctl00_plhMain_cboVisaCategory"),
                elementSearchData:'ctl00_plhMain_cboVisaCategory'
            });
            arr.push({
                id:8,
                action:SOLVE_RECAPTCHA,
                elementSearchType: BY_XPATH, // cannot be empty :(
                description:StringUtil.encodeUTF("aolving recaptcha"),
                elementSearchData:'1' // cannot be empty :(
            });

            arr.push({
                id:9,
                action:CLICK_ELEMENT,
                elementSearchType:BY_ID,
                description:StringUtil.encodeUTF("click submit button. element by id ctl00_plhMain_btnSubmit"),
                elementSearchData:'ctl00_plhMain_btnSubmit'
            });

            // check // No date(s) available for appointment ???
            arr.push({
                id:10,
                action:DETECT_DATES_AVAILABLE_FOR_SELECTED_CITY,
                elementSearchType: BY_XPATH,
                description:StringUtil.encodeUTF("detecting dates available fot selected city by xpath //*[contains(text(), 'No date(s) available for appointment')]"),
                elementSearchData:"//*[contains(text(), 'No date(s) available for appointment')]"
            });

            // PTN
            arr.push({
                id:11,
                action:INSERT_TEXT,
                elementSearchType: BY_ID,
                description:StringUtil.encodeUTF("detecting dates available fot selected city by xpath //*[contains(text(), 'No date(s) available for appointment')]"),
                elementSearchData:"ctl00_plhMain_repAppReceiptDetails_ctl01_txtReceiptNumber",
                //payload:"6827/0167/4291",
                payload:clientPTN
            });

            // click submit
            arr.push({
                id:12,
                action:CLICK_ELEMENT,
                elementSearchType: BY_ID,
                description:StringUtil.encodeUTF("click submit button. element by id ctl00_plhMain_btnSubmit"),
                elementSearchData:'ctl00_plhMain_btnSubmit'
            });

            // email
            arr.push({
                id:13,
                action:INSERT_TEXT,
                elementSearchType: BY_ID,
                description:StringUtil.encodeUTF("entering email"),
                elementSearchData:"ctl00_plhMain_txtEmailID",
                payload:clientEmail
            });

            // client password
            arr.push({
                id:14,
                action:INSERT_TEXT,
                elementSearchType: BY_ID,
                description:StringUtil.encodeUTF("entering password"),
                elementSearchData:"ctl00_plhMain_txtPassword",
                payload:clientPassword
            });

            // submit
            arr.push({
                id:15,
                action:CLICK_ELEMENT,
                elementSearchType: BY_ID,
                description:StringUtil.encodeUTF("click submit button. element by id ctl00_plhMain_btnSubmitDetails"),
                elementSearchData:'ctl00_plhMain_btnSubmitDetails'
            });

            // passport expire date
            arr.push({
                id:16,
                action:INSERT_TEXT,
                elementSearchType: BY_ID,
                description:StringUtil.encodeUTF("entering date"),
                elementSearchData:"ctl00_plhMain_repAppVisaDetails_ctl01_tbxPPTEXPDT",
                payload:clientPassportExpire
            });

            // client first name
            arr.push({
                id:17,
                action:INSERT_TEXT,
                elementSearchType: BY_ID,
                description:StringUtil.encodeUTF("entering 1st name"),
                elementSearchData:"ctl00_plhMain_repAppVisaDetails_ctl01_tbxFName",
                payload:clientFirstName
            });

            // client second name
            arr.push({
                id:18,
                action:INSERT_TEXT,
                elementSearchType: BY_ID,
                description:StringUtil.encodeUTF("entering 2nd name"),
                elementSearchData:"ctl00_plhMain_repAppVisaDetails_ctl01_tbxLName",
                payload:clientLastName
            });

            // date of birth
            arr.push({
                id:19,
                action:INSERT_TEXT,
                elementSearchType: BY_ID,
                description:StringUtil.encodeUTF("entering date of birth"),
                elementSearchData:"ctl00_plhMain_repAppVisaDetails_ctl01_tbxDOB",
                payload:clientDateOfBirth
            });

            // date of returning
            arr.push({
                id:20,
                action:INSERT_TEXT,
                elementSearchType: BY_ID,
                description:StringUtil.encodeUTF("entering date of returning"),
                elementSearchData:"ctl00_plhMain_repAppVisaDetails_ctl01_tbxReturn",
                payload:clientBackDate
            });

            // person status
            arr.push({
                id:21,
                action:SELECT_DROP_DOWN_ITEM,
                selectionVisibleText:clientPersonStatus,
                //selectionIndex:3,
                elementSearchType: BY_ID,
                description:StringUtil.encodeUTF("selecting person status from drop down with id ctl00_plhMain_repAppVisaDetails_ctl01_cboTitle"),
                elementSearchData:'ctl00_plhMain_repAppVisaDetails_ctl01_cboTitle'
            });

            // nationality
            arr.push({
                id:22,
                action:SELECT_DROP_DOWN_ITEM,
                //selectionVisibleText:"UKRAINE",
                selectionIndex:clientNationalityId,
                elementSearchType: BY_ID,
                description:StringUtil.encodeUTF("selecting person nationality from drop down with id ctl00_plhMain_repAppVisaDetails_ctl01_cboNationality"),
                elementSearchData:'ctl00_plhMain_repAppVisaDetails_ctl01_cboNationality'
            });

            // recaptcha
            arr.push({
                id:23,
                action:SOLVE_RECAPTCHA,
                elementSearchType: BY_XPATH, // cannot be empty :(
                description:StringUtil.encodeUTF("solving recaptcha"),
                elementSearchData:'1' // cannot be empty :(
            });

            // submit
            arr.push({
                id:24,
                action:CLICK_ELEMENT,
                elementSearchType: BY_ID,
                description:StringUtil.encodeUTF("click submit button. element by id ctl00_plhMain_btnSubmit"),
                elementSearchData:'ctl00_plhMain_btnSubmit'
            });

            // select available date
            arr.push({
                id:25,
                action:SELECT_CALENDAR_AVAILABLE_DATE,
                elementSearchType: BY_ID,
                description:StringUtil.encodeUTF("selecting calendar available date"),
                elementSearchData:'ctl00_plhMain_cldAppointment'
            });

            // recaptcha
            arr.push({
                id:26,
                action:SOLVE_RECAPTCHA,
                elementSearchType: BY_XPATH, // cannot be empty :(
                description:StringUtil.encodeUTF("solving recaptcha"),
                elementSearchData:'1' // cannot be empty :(
            });

            // select available time
            arr.push({
                id:27,
                action:SELECT_AVAILABLE_TIME,
                elementSearchType: BY_ID,
                description:StringUtil.encodeUTF("selecting available time"),
                elementSearchData:'ctl00_plhMain_gvSlot_ctl01_lnktime'
            });

            return arr;
        }
    }
};

/*
var taskData = new Array(
    {
        id:0,
        action:OPEN_URL,
        description: "opening site",
        elementSearchData:'http://www.polandvisa-ukraine.com/scheduleappointment.html'
    },
    {
        id:1,
        action:CLICK_LINK,
        elementSearchType:BY_HREF,
        overrideHrefTarget:true,
        description:StringUtil.encodeUTF("clicking link"),
        elementSearchData:'scheduleappointment_2.html'
    },
    {
        id:2,
        action:SWITCH_TO_IFRAME,
        elementType:"mainIFrame",
        elementSearchType:BY_XPATH,
        isMainFrame:1,
        description:StringUtil.encodeUTF("Switch to main iframe. find iframe by xPath /html/body/div/div[4]/table/tbody/tr[1]/td[3]/table/tbody/tr[1]/td/div[2]/iframe"),
        elementSearchData:'/html/body/div/div[4]/table/tbody/tr[1]/td[3]/table/tbody/tr[1]/td/div[2]/iframe'
    },
    {
        id:3,
        action:CLICK_LINK,
        elementSearchType:BY_ID,
        description:StringUtil.encodeUTF("link click by idctl00_plhMain_lnkSchApp"),
        elementSearchData:'ctl00_plhMain_lnkSchApp'
    },
    // select city
    {
        id:4,
        action:SELECT_DROP_DOWN_ITEM,
        selectionIndex:9,
        elementSearchType:BY_ID,
        description:StringUtil.encodeUTF("select city from drop down with id ctl00_plhMain_cboVAC"),
        elementSearchData:'ctl00_plhMain_cboVAC'
    }

    ,
    // select purpose
    {
        id:5,
        action:SELECT_DROP_DOWN_ITEM,
        //selectionVisibleText:"Подача документів",
        selectionIndex:1,
        elementSearchType:BY_ID,
        description:StringUtil.encodeUTF("select purpose from drop down with id ctl00_plhMain_cboPurpose"),
        elementSearchData:'ctl00_plhMain_cboPurpose'
    },

    // click submit button
    {
        id:6,
        action:CLICK_ELEMENT,
        elementSearchType:BY_ID,
        description:StringUtil.encodeUTF("click submit button. element by id ctl00_plhMain_btnSubmit"),
        elementSearchData:'ctl00_plhMain_btnSubmit'
    },

    // select visa category
    {
        id:7,
        action:SELECT_DROP_DOWN_ITEM,
        //selectionVisibleText:"Національна Віза",
        selectionIndex:1,
        elementSearchType: BY_ID,
        description:StringUtil.encodeUTF("selecting visa category from drop down with id ctl00_plhMain_cboVisaCategory"),
        elementSearchData:'ctl00_plhMain_cboVisaCategory'
    },

    // solve recaptcha
    {
        id:8,
        action:SOLVE_RECAPTCHA,
        elementSearchType: BY_XPATH, // cannot be empty :(
        description:StringUtil.encodeUTF("aolving recaptcha"),
        elementSearchData:'1' // cannot be empty :(
    },
    // click submit button
    {
        id:9,
        action:CLICK_ELEMENT,
        elementSearchType:BY_ID,
        description:StringUtil.encodeUTF("click submit button. element by id ctl00_plhMain_btnSubmit"),
        elementSearchData:'ctl00_plhMain_btnSubmit'
    },
    // check // No date(s) available for appointment ???
    {
        id:10,
        action:DETECT_DATES_AVAILABLE_FOR_SELECTED_CITY,
        elementSearchType: BY_XPATH,
        description:StringUtil.encodeUTF("detecting dates available fot selected city by xpath //*[contains(text(), 'No date(s) available for appointment')]"),
        elementSearchData:"//*[contains(text(), 'No date(s) available for appointment')]"
    },

    // inserting PTN
    {
        id:11,
        action:INSERT_TEXT,
        elementSearchType: BY_ID,
        description:StringUtil.encodeUTF("detecting dates available fot selected city by xpath //*[contains(text(), 'No date(s) available for appointment')]"),
        elementSearchData:"ctl00_plhMain_repAppReceiptDetails_ctl01_txtReceiptNumber",
        //payload:"6827/0167/4291",
        payload:"6827/0167/4тгдд" // incorrect
    },
    {
        id:12,
        action:CLICK_ELEMENT,
        elementSearchType: BY_ID,
        description:StringUtil.encodeUTF("click submit button. element by id ctl00_plhMain_btnSubmit"),
        elementSearchData:'ctl00_plhMain_btnSubmit'
    },
    // enter email
    {
        id:13,
        action:INSERT_TEXT,
        elementSearchType: BY_ID,
        description:StringUtil.encodeUTF("entering email"),
        elementSearchData:"ctl00_plhMain_txtEmailID",
        payload:"yakovenko.vikusia@gmail.com"
    },

    // enter password
    {
        id:14,
        action:INSERT_TEXT,
        elementSearchType: BY_ID,
        description:StringUtil.encodeUTF("entering password"),
        elementSearchData:"ctl00_plhMain_txtPassword",
        payload:"123456789"
    },
    {
        id:15,
        action:CLICK_ELEMENT,
        elementSearchType: BY_ID,
        description:StringUtil.encodeUTF("click submit button. element by id ctl00_plhMain_btnSubmitDetails"),
        elementSearchData:'ctl00_plhMain_btnSubmitDetails'
    },
    // enter passport expire date
    {
        id:16,
        action:INSERT_TEXT,
        elementSearchType: BY_ID,
        description:StringUtil.encodeUTF("entering date"),
        elementSearchData:"ctl00_plhMain_repAppVisaDetails_ctl01_tbxPPTEXPDT",
        payload:"26-08-2025"
    },

    // enter 1st Name
    {
        id:17,
        action:INSERT_TEXT,
        elementSearchType: BY_ID,
        description:StringUtil.encodeUTF("entering 1st name"),
        elementSearchData:"ctl00_plhMain_repAppVisaDetails_ctl01_tbxFName",
        payload:"VIKTORIIA"
    },

    // enter 2nd Name
    {
        id:18,
        action:INSERT_TEXT,
        elementSearchType: BY_ID,
        description:StringUtil.encodeUTF("entering 2nd name"),
        elementSearchData:"ctl00_plhMain_repAppVisaDetails_ctl01_tbxLName",
        payload:"YAKOVENKO"
    },

    // enter date of birth
    {
        id:19,
        action:INSERT_TEXT,
        elementSearchType: BY_ID,
        description:StringUtil.encodeUTF("entering date of birth"),
        elementSearchData:"ctl00_plhMain_repAppVisaDetails_ctl01_tbxDOB",
        payload:"02-10-1989"
    },

    // enter date of returning
    {
        id:20,
        action:INSERT_TEXT,
        elementSearchType: BY_ID,
        description:StringUtil.encodeUTF("entering date of returning"),
        elementSearchData:"ctl00_plhMain_repAppVisaDetails_ctl01_tbxReturn",
        payload:"30-11-2016"
    },

    // select person status
    {
        id:21,
        action:SELECT_DROP_DOWN_ITEM,
        //selectionVisibleText:"Mrs.",
        selectionIndex:3,
        elementSearchType: BY_ID,
        description:StringUtil.encodeUTF("selecting person status from drop down with id ctl00_plhMain_repAppVisaDetails_ctl01_cboTitle"),
        elementSearchData:'ctl00_plhMain_repAppVisaDetails_ctl01_cboTitle'
    },

    // select nationality
    {
        id:22,
        action:SELECT_DROP_DOWN_ITEM,
        //selectionVisibleText:"UKRAINE",
        selectionIndex:216,
        elementSearchType: BY_ID,
        description:StringUtil.encodeUTF("selecting person nationality from drop down with id ctl00_plhMain_repAppVisaDetails_ctl01_cboNationality"),
        elementSearchData:'ctl00_plhMain_repAppVisaDetails_ctl01_cboNationality'
    },
    // solve recaptcha
    {
        id:23,
        action:SOLVE_RECAPTCHA,
        elementSearchType: BY_XPATH, // cannot be empty :(
        description:StringUtil.encodeUTF("solving recaptcha"),
        elementSearchData:'1' // cannot be empty :(
    },
    {
        id:24,
        action:CLICK_ELEMENT,
        elementSearchType: BY_ID,
        description:StringUtil.encodeUTF("click submit button. element by id ctl00_plhMain_btnSubmit"),
        elementSearchData:'ctl00_plhMain_btnSubmit'
    },
    {
        id:25,
        action:SELECT_CALENDAR_AVAILABLE_DATE,
        elementSearchType: BY_ID,
        description:StringUtil.encodeUTF("selecting calendar available date"),
        elementSearchData:'ctl00_plhMain_cldAppointment'
    },
    {
        id:26,
        action:SOLVE_RECAPTCHA,
        elementSearchType: BY_XPATH, // cannot be empty :(
        description:StringUtil.encodeUTF("solving recaptcha"),
        elementSearchData:'1' // cannot be empty :(
    },
    {
        id:27,
        action:SELECT_AVAILABLE_TIME,
        elementSearchType: BY_ID,
        description:StringUtil.encodeUTF("selecting available time"),
        elementSearchData:'ctl00_plhMain_gvSlot_ctl01_lnktime'
    }
);
*/
