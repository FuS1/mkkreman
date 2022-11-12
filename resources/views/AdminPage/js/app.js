window.$    = require("jquery");
window._    = require('lodash');
window.Swal = require("sweetalert2");

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
    return form.serializeArray().reduce(function(obj, item) {
        if(item.value===''){
            item.value=null;
        }
        obj[item.name] = item.value;
        return obj;
    }, mergeData);
}

window.setLocalStorage = function(storageName, obj) {
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
        if(i=="file"){
            haveFile=true;
        }
    }

    if(haveFile){
        formData = new FormData();
        for(var i in data){
            if(i=="file"){
                formData.append(i, data[i], data[i].name);
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

$(function() {
    // 取消form按鈕預設功能
    $("form").on('submit',function(e){
        e.preventDefault();
    });
});

