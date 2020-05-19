toastr.options.closeButton = true;
//toastr.options.closeHtml = '<button><i class="icon-off"></i></button>';

// Progress Bar
toastr.options.progressBar = true;

//toastr.options.closeMethod = 'fadeOut';
//toastr.options.closeDuration = 300;
//toastr.options.closeEasing = 'swing';

//Show newest toast at bottom (top is default)
//toastr.options.newestOnTop = false;


// Define a callback for when the toast is shown/hidden/clicked
//toastr.options.onShown = function() { console.log('hello'); }
//toastr.options.onHidden = function() { console.log('goodbye'); }
//toastr.options.onclick = function() { console.log('clicked'); }
//toastr.options.onCloseClick = function() { console.log('close button clicked'); }

//toastr.options.showEasing = 'swing';
//toastr.options.hideEasing = 'linear';
//toastr.options.closeEasing = 'linear';

//toastr.options.showMethod = 'slideDown';
//toastr.options.hideMethod = 'slideUp';
//toastr.options.closeMethod = 'slideUp';

//toastr.options.preventDuplicates = true;

//toastr.options.timeOut = 30; // How long the toast will display without user interaction
//toastr.options.extendedTimeOut = 60; // How long the toast will display after a user hovers over it

//Prevent from Auto Hiding
//To prevent toastr from closing based on the timeouts, set the timeOut and extendedTimeOut options to 0. The toastr will persist until selected.

//toastr.options.timeOut = 0;
//toastr.options.extendedTimeOut = 0;



// Flip the toastr to be displayed properly for right-to-left languages.
//toastr.options.rtl = true;

// method when toastr came from JavaScript calss
const valids_methods = ['warning', 'success', 'error'];
const defaultMethod = valids_methods[0];
// vars from php
if(typeof App_ == 'object') {
    if(App_.toastr) {
        let t = App_.toastr;

        if(!valids_methods.includes(t.method)) {
            t.method = defaultMethod;
        }
        toastr[t.method](t.message, t.title || '', t.options || {});
    }
}


// method when toastr came from session
let toastr_messages = document.querySelectorAll('input[type="hidden"][data-type="toastr"]');

for(let _i = 0; _i < toastr_messages.length; _i++) {

    let item = toastr_messages[_i];

    let level = item.getAttribute('data-level') || 'warning';
    let message = item.getAttribute('data-message');
    let title = item.getAttribute('data-title') || '';
    let options = item.getAttribute('data-options') || {};

    toastr[level](message, title, options);
}
