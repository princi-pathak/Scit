

$(window).scroll(function () {
    if ($(this).scrollTop() > 250) {
        $('.sticky-top').addClass('sticky-nav').css('top', '0px');
    } else {
        $('.sticky-top').removeClass('sticky-nav').css('top', '-100px');
    }
  });


//   Data Table Js


$(document).ready(function() {
    $('#exampleOne').DataTable( {
        columnDefs: [ {
            orderable: false,
            className: 'select-checkbox',
            targets:   0
        } ],
        select: {
            style:    'os',
            selector: 'td:first-child'
        },
        order: [[ 1, 'asc' ]]
    } );
} );