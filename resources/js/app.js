try {
    window.$ = window.jQuery = require('jquery');
    window.coreui = require('@coreui/coreui');

    require('@popperjs/core');
    require('bootstrap');
    require('simplebar');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
} catch (e) {
    console.error(e)
}
