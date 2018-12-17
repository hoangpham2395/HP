function showLoading() {
    $.LoadingOverlay("show", {zIndex: 999999999});
}

function hideLoading() {
    $.LoadingOverlay("hide");
}

function showSuccessFlash(messages) {
    var html = '<hr><div class="row"><div class="col-md-12"><ul class="col-md-12 alert alert-success">';
    if (typeof messages === 'string') {
        html += '<li><i class="fa fa-check"></i><strong>' + messages + '</strong></li>';
    } else {
        messages.forEach(function (e) {
            html += '<li><i class="fa fa-check"></i><strong>' + e + '</strong></li>';
        });
    }
    html += '</ul></div></div>';
    $('#success_msg').html(html);
}

function showErrorFlash(messages, parent, scroll) {
    var html = '<div class="alert alert-danger"><ul>';
    if (typeof messages === 'string') {
        html += '<li>' + messages + '</li>';
    } else {
        messages.forEach(function (e) {
            html += '<li>' + e + '</li>';
        });
    }

    html + '</ul></div>';
    $(parent).find('#error_msg').html(html);
    typeof scroll == 'undefined' ? scrollToTop() : '';
}

function showErrorFlashWithFieldName(messages, parent) {
    clearFlash(parent);
    if (typeof parent === 'undefined') {
        parent = 'body';
    }
    if (typeof messages === 'string') {
        return showErrorFlash(messages, parent);
    }
    for (var i in messages) {
        messages[i].forEach(function (e) {
            var input = $(parent).find('[name="' + i + '"]');
            var parentx = input.parent();
            $("<div class='has-error help-block-container'><span class='help-block'>" + e + "</span></div>").insertAfter(parentx);
            parentx.addClass('has-error');
        });
    }
}


function clearFlash(parent) {
    clearSuccessFlash();
    clearErrorFlash();
    clearErrorFlashWithFieldName(parent);
}

function clearErrorFlash() {
    $('[id="error_msg"]').html('');
}

function clearErrorFlashWithFieldName(parent) {
    if (typeof parent === 'undefined') {
        parent = 'body';
    }
    $(parent).find('.help-block-container.has-error').remove();
    $(parent).find('.has-error').removeClass('has-error');
}

function clearSuccessFlash() {
    $('[id="success_msg"]').html('');
}

function redirect(url) {
    //todo validate limit redriect by url and tab session
    return url == '' ? window.location.reload() : window.location.href = url;
}

function isUrl(url) {
    url = url.replace('https://', '').replace('http://');
    var currentUrl = getCurrentUrl();
    return currentUrl.indexOf(url) !== -1;
}

function previewFile(input) {
    if (!input.files || !input.files[0]) {
        return false;
    }
    var previewId = '#preview-file-' + $(input).attr('name');

    if (!validateFile(input)) {
        input.value = '';
        $(previewId).find('img').remove();
        $(previewId).find('p').remove();
        $(previewId).find('input[type="hidden"]').val('');
        return false;
    }
    clearFlash();
    var reader = new FileReader();
    reader.onload = function (e) {
        var imgWrapper = $(previewId);
        var imgName = input.files[0].name !== undefined ? input.files[0].name : '';
        // create temporary img tag
        var img = $(document.createElement('img'));
        isImage = isImageFile(input);
        img.attr('src', isImage ? e.target.result : documentIcon);
        img.attr('height', isImage ? '250' : '100');

        // remove img exist
        imgWrapper.find('img').remove();
        imgWrapper.find('p').remove();
        // change file name upload
        imgWrapper.append(img);
        if (!isImage) {
            imgWrapper.append('<p>' + imgName + '</p>');
        }
        imgWrapper.closest('form').find('#file-name').empty().html(imgName);
    };
    reader.readAsDataURL(input.files[0]);

}

function validateFile(input) {
    var sizeAllow = input.getAttribute('size');
    var extAllow = input.getAttribute('ext');
    var extsAllow = extAllow.split(',');
    sizeAllow = sizeAllow.split(',');
    var minSize = parseFloat(sizeAllow[0]);
    var maxSize = parseFloat(sizeAllow[1]);

    var file = input.files[0];
    var size = file.size / 1024 / 1024;
    var extension = input.value.substr(input.value.lastIndexOf('.') + 1).toLowerCase();
    var label = input.getAttribute('data-label');
    // file type
    var modal = $(input).closest('.modal').length ? $(input).closest('.modal') : $('body');
    if (extension.length <= 0 || extsAllow.indexOf(extension) === -1) {
        var msg = validateFileMsg._g('mimes').replace(':attribute', label).replace(':values', extAllow);
        showErrorFlash(msg, modal);
        return false;
    }
    // size
    if (size < minSize) {
        var msg = validateFileMsg._g('min').replace(':attribute', label).replace(':min', minSize);
        showErrorFlash(msg, modal);
        return false;
    }
    if (size > maxSize) {
        var msg = validateFileMsg._g('max').replace(':attribute', label).replace(':max', maxSize);
        showErrorFlash(msg, modal);
        return false;
    }

    return true;
}

function isImageFile(input) {
    return false;
}

function fillForm(val) {
    if (val === undefined) {
        val = 1;
    }
    $('form').first().find('input[type!="hidden"],select,textarea').val(val).trigger('change');
}

var GoogleMap = {
    enabledDragMarker: true,
    enableClickMarker: true,
    marker: {},
    createMapWithMarker: function (elementId, latLngWrapper, latitude, longitude) {
        // create google map
        var map = new google.maps.Map(document.getElementById(elementId), {
            zoom: 12,
            center: new google.maps.LatLng(latitude, longitude),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });
        // create marker
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(latitude, longitude),
            draggable: true
        });
        // change marker position when drag or click on map
        GoogleMap.dragMarker(latLngWrapper, marker);
        GoogleMap.clickToChangeMarker(latLngWrapper, map);
        map.setCenter(marker.position);
        marker.setMap(map);
        // save old marker
        GoogleMap.marker = marker;
    },
    dragMarker: function (element, marker) {
        if (!GoogleMap.enabledDragMarker || element.length <= 0) {
            marker.setDraggable(false);
            return;
        }
        google.maps.event.addListener(marker, 'dragend', function (event) {
            // change display latitude, longitude
            element.val(event.latLng.lat().toFixed(6) + ',' + event.latLng.lng().toFixed(6));
        });
    },
    clickToChangeMarker: function (element, map) {
        if (!GoogleMap.enableClickMarker || element.length <= 0) {
            return;
        }
        google.maps.event.addListener(map, 'click', function (event) {
            // remove old marker
            GoogleMap.removeMarker();
            // add new marker
            GoogleMap.addMarker(map, element, event.latLng);
            // change display latitude, longitude
            element.val(event.latLng.lat().toFixed(6) + ',' + event.latLng.lng().toFixed(6));
        });
    },
    addMarker: function (map, latLngWrapper, location) {
        var marker = new google.maps.Marker({
            position: location,
            draggable: true,
            map: map
        });
        GoogleMap.dragMarker(latLngWrapper, marker);
        marker.setMap(map);
        // save old marker
        GoogleMap.marker = marker;
    },
    removeMarker: function () {
        GoogleMap.marker.setMap(null);
    }
};