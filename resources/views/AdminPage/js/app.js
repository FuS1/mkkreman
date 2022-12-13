window.ENV = {
    APP_URL : process.env.MIX_APP_URL,
    APP_API_URL : process.env.MIX_APP_API_URL,
};


window.$    = require("jquery");
require("form-serializer");
window._    = require('lodash'); 
window.Swal = require("sweetalert2");
window.moment = require("moment");

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */
window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });

window._typeof = typeof Symbol === "function" && typeof Symbol.iterator === "symbol" ? function (obj) { return typeof obj; } : function (obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol ? "symbol" : typeof obj; };

window.getFormData = function(form,mergeData={}){
    return Object.assign(form.serializeObject(), mergeData);
}

window.setLocalStorage = function(storageName, obj) {
    if(obj===null){
        localStorage.removeItem(storageName);
        return null;
    }

    if (_typeof(obj) == 'object' || typeof obj == 'array') {
        obj = JSON.stringify(obj);
    }
  
    return localStorage.setItem(storageName, obj);        
};
  
window.getLocalStorage = function(storageName) {
    let obj = localStorage.getItem(storageName);
  
    if (obj != undefined && (obj.charAt(0) == "[" || obj.charAt(0) == "{")) {
        obj = JSON.parse(obj);
    }
  
    return obj;
};

//getUrlParam("id") 或 getUrlParam("id","網址")，不需要特别编码
window.getUrlParam = function (name,url) {	
    var reg = RegExp ('[?&]' + name.replace (/([[\]])/, '\\$1') + '=([^&#]*)');
    var r = (url) ? (url.match (reg) || ['', ''])[1] : decodeURI((window.location.href.match (reg) || ['', ''])[1]);
    if(r===''){
        return null;
    }
    return r;
}

window.flattenObject = function(ob) {
    var toReturn = {};
    for (var i in ob) {
        if (!ob.hasOwnProperty(i)) continue;
        if ((typeof ob[i]) == 'object' && ob[i] !== null && !Array.isArray(ob[i])) {
            var flatObject = flattenObject(ob[i]);
            for (var x in flatObject) {
                if (!flatObject.hasOwnProperty(x)) continue;
                toReturn[i + '.' + x] = flatObject[x];
            }
        } else {
            toReturn[i] = ob[i];
        }
    }
    return toReturn;
}

window.replaceAll = function(string, search, replace) {
    return string.split(search).join(replace);
}

window.delUrlParam = function(key,url1) {
    let url = (url1) ? url1 : window.location.href;
    let baseUrl = url.split('?')[0] + '?';
    let query = url.split('?')[1];
    if (query.indexOf(key) > -1) {
        let obj = {};
        let arr = query.split('&');
        for (let i = 0; i < arr.length; i++) {
            arr[i] = arr[i].split('=');
            obj[arr[i][0]] = arr[i][1];
        }
        delete obj[key];
        let url =
            baseUrl +
            JSON.stringify(obj)
                .replace(/[\"\{\}]/g, '')
                .replace(/\:/g, '=')
                .replace(/\,/g, '&');
        return url;
    } else {
        return url;
    }
}

window.exec = function(url,type,data,successFunction,failFunction){
    let adminData = getLocalStorage('adminData');
    let config = {
        type: type,
        dataType: 'json',
        url: ENV['APP_API_URL'] + 'admin/' + url,
        dataType:'json',
        headers: {
            Authorization: "Bearer "+(adminData ? adminData['token']['plainTextToken'] : '')
        },
        statusCode: {
            200: function(xhr){
                successFunction(xhr);
            },
            400: function(xhr) {
                if( typeof failFunction == "function" ){
                    failFunction(xhr.ERR_MSG) 
                    return;
                }

                if(!xhr.ERR_MSG){
                    xhr.ERR_MSG = xhr.responseJSON.ERR_MSG;
                }
                if(typeof xhr.ERR_MSG == 'object'){
                    xhr.ERR_MSG = JSON.stringify(xhr.ERR_MSG);
                }
                
                if(Swal.isVisible()){
                    Swal.hideLoading()
                    Swal.showValidationMessage(xhr.ERR_MSG)
                }else{   
                    Swal.fire({
                        title: xhr.ERR_MSG ? (xhr.ERR_MSG.length < 20 ? xhr.ERR_MSG : '' ):'',
                        html: xhr.ERR_MSG ? (xhr.ERR_MSG.length >= 20 ? xhr.ERR_MSG : '' ):'',
                        icon: "error",
                        showConfirmButton: false,
                        showCancelButton: true,
                        cancelButtonText: '確定'
                    });
                }
            },
            401: function(xhr) {
                window.location.assign('login');
            },
            429: function(xhr) {
                if(typeof failFunction == "function"){
                    failFunction(xhr.ERR_MSG);
                    return;
                }
                if(Swal.isVisible()){
                    Swal.hideLoading();
                    Swal.showValidationMessage('短期呼叫次數過多，請稍後再試')
                }
                Swal.fire({
                    icon: 'error',
                    html: '短期呼叫次數過多，請稍後再試',
                });
            },
            500:function(xhr){
                if(typeof failFunction == "function"){
                    failFunction(xhr); 
                    return;
                }
                if(Swal.isVisible()){
                    Swal.hideLoading();
                    Swal.showValidationMessage(xhr.responseJSON.message + ' at ' + xhr.responseJSON.file + ' line ' +  xhr.responseJSON.line)
                }
                Swal.fire({
                    icon: 'error',
                    width:'70%',
                    html: xhr.responseJSON.message + ' at ' + xhr.responseJSON.file + ' line ' +  xhr.responseJSON.line,
                });
                console.log(xhr.responseJSON);
            },
            503:function(xhr){
                if(typeof failFunction == "function"){
                    failFunction(xhr);
                    return;
                }
                if(Swal.isVisible()){
                    Swal.hideLoading();
                    Swal.showValidationMessage('伺服器連線超時');
                }
                Swal.fire({
                    icon: 'error',
                    html: '伺服器連線超時',
                });
                console.log(JSON.stringify(xhr.responseJSON) || xhr.responseText)
            }
        },
        // success: function(msg) {
        //     console.log(msg);
        //     successFunction(msg);
        // }
    };

    let haveFile=false;
    for(var i in data){
        if(i=="file" && data[i]!==undefined){
            haveFile=true;
        }
    }

    if(haveFile){
        formData = new FormData();
        for(var i in data){
            if(i=="file"){
                if( data[i]!==undefined){
                    formData.append(i, data[i], data[i].name);
                }
            }else{
                if(Array.isArray(data[i]) ){
                    formData.append(i+'[]', data[i]);
                }else{
                    formData.append(i, data[i]);  
                }
            }
        }
        //如何取得登入資訊待確認
        config['data']        =   formData;
        config['mimeType']    =   "multipart/form-data";
        config['processData'] =   false;
        config['contentType'] =   false;
        
    }else{
        config['data']        =   data;
    }
    console.log("exec("+type+"): "+url,"request: ");
    console.log(config['data'])
    $.ajax(config);
}


window.tabulator_config = {
    autoColumns: false,
    columnDefaults:{
        width:100,
        minWidth: 100,
        hozAlign: "center",
        headerFilterLiveFilter:false,
        headerSortTristate:true
    },
    resizable: true,
    pagination: true,
    paginationSize: 10,
    paginationSizeSelector: [10,20,50,100,true],
    paginationCounter: function(pageSize, currentRow, currentPage, totalRows, totalPages){
        return "共 "+ totalRows + " 筆資料";
    },
    layout: "fitColumns",
    responsiveLayout: "collapse",
    sortMode: "remote", 
    columnHeaderSortMulti: true,
    paginationMode: "remote",
    filterMode: "remote",
    ajaxConfig:{
        method:"get",
        headers: {
            Authorization: "Bearer "+(getLocalStorage('adminData') ? getLocalStorage('adminData')['token']['plainTextToken'] : ''),
        },
    },
    placeholder: "查無資料",
    locale: true,
    langs: {
        "zh-tw":{
            "data":{
                "loading":"讀取中", 
                "error":"資料異常", 
            },
            "pagination":{
                "page_size":"每頁筆數", 
                "first":"第一頁", 
                "last":"最後一頁",
                "prev":"前一頁",
                "next":"下一頁",
                "all":"全部",
            },
            "headerFilters":{
                "default":"",
            }
        }
    },
    dataSendParams: {
        page: "page"
    },
    dataReceiveParams: {
        last_row: "total"
    }
}

window.minMaxFilterEditorDate = function(cell, onRendered, success, cancel, editorParams){
    var container = document.createElement("span");
    //create and style inputs
    var start = document.createElement("input");
    start.setAttribute("type", "date");
    start.setAttribute("placeholder", "Min");
    start.style.padding = "4px";
    start.style.margin = "1px 0";
    start.style.width = "90px";
    start.style.boxSizing = "border-box";
    var end = start.cloneNode();
    if(editorParams){
        start.value = editorParams.start;
        end.value = editorParams.end;
    }

    function buildValues(){
        if(start.value=='' && end.value==''){
            success();
        }else{
            success({
                start: start.value=='' ? '1800-01-01 23:59:59' : start.value+' 00:00:00',
                end: end.value=='' ? '9999-12-31 23:59:59' : end.value+' 23:59:59',
            });
        }
                
    }
    
    function keypress(e){
        if(e.keyCode == 13){
            buildValues();
        }
        if(e.keyCode == 27){
            cancel();
        }
    }
    
    end.setAttribute("placeholder", "Max");
    
    start.addEventListener("change", buildValues);
    start.addEventListener("blur", buildValues);
    start.addEventListener("keydown", keypress);
    
    end.addEventListener("change", buildValues);
    end.addEventListener("blur", buildValues);
    end.addEventListener("keydown", keypress);
    
    
    container.appendChild(start);
    container.appendChild(document.createElement("br"));
    container.appendChild(end);
    
    return container;
}

window.tabulator_link_cell = function(cell, formatterParams){
    console.log(cell.getColumn(),formatterParams);
    return '<span class="tabulator_link">'+(cell.getValue()||'未設定')+'</span>';
}

window.initTabulator = function(tableId, customConfig){
    let table = new Tabulator(tableId,Object.assign(JSON.parse(JSON.stringify(tabulator_config)), customConfig));
    table.on("dataLoadError", function(error){
        if(error['status']==401){
            window.location.assign('./login');
        }
    });
    return table;
}

//custom max min filter function
window.minMaxFilterFunctionDate = function(headerValue, rowValue, rowData, filterParams){
    return true; //must return a boolean, true if it passes the filter.
}


window.initTinymce = function(dom_id, customConfig){

    let tinyConfig = Object.assign(JSON.parse(JSON.stringify({
        selector: dom_id,
        height: 500,
        language: 'zh_TW',
        automatic_uploads: true,
        plugins: [
          'advlist autolink lists link image charmap print preview anchor emoticons help',
          'searchreplace visualblocks code fullscreen',
          'insertdatetime media table paste wordcount'
        ],
        menubar: 'file edit view tools help',
        toolbar: 'undo redo | fontselect fontsizeselect formatselect | forecolor backcolor lineheight bold italic underline strikethrough alignleft aligncenter alignright alignjustify formatpainter removeformat | bullist numlist outdent indent | link image media | table | charmap emoticons',
        // icons: 'material',
        image_advtab: true,
        toolbar_mode: 'sliding',
        skin: 'oxide',// useDarkMode ? 'oxide-dark' : 'oxide',
        content_css: 'default',
        fullscreen_native: true,
        statusbar: false,
        default_link_target: '_blank',
        paste_data_images: true,
        smart_paste: true,
        image_file_types: 'jpg,jpeg,svg,png,webp,gif',
        // images_upload_url: ENV['APP_API_URL'] + 'admin/tinymce/image',
    })), customConfig);

    // 不可放入前面的Object中進行深拷貝，會導致此function失效
    tinyConfig.images_upload_handler = function(blobInfo, success, failure, progress) {
        exec('tinymce/image','POST',{
            file:blobInfo.blob()
        },function(response){
            console.log(response);
            success(response.location);
        });
    };

    // 不可放入前面的Object中進行深拷貝，會導致此function失效
    tinyConfig.file_picker_callback = function (callback, value, meta) {
        let x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth
        let y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight

        tinymce.activeEditor.windowManager.openUrl({
            url : '/file-manager/tinymce5',
            title : 'Laravel File manager',
            width : x * 0.8,
            height : y * 0.8,
            onMessage: (api, message) => {
                callback(message.content, { text: message.text })
            }
        })
    };

    return tinymce.init(tinyConfig);
}


$(function() {
    // 取消form按鈕預設功能
    $("form").on('submit',function(e){
        e.preventDefault();
    });
});

