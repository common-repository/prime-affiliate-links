jQuery(document).ready(($) => {

    // if ( window.location.href.indexOf( 'wp-admin' ) > -1 ) {
    //     setInterval( function () {
    //         if ( $( '#sample-permalink' ).length ) {
    //             $( '#sample-permalink' ).html( $( '#sample-permalink' ).html().replace( '/prime_affiliate_links', '' ) );
    //         }
    //     }, 100 );
    // }

    // $('#title').on('change', () => {
    //     if ( $( '#sample-permalink' ).length ) {
    //         $( '#sample-permalink' ).html( $( '#sample-permalink' ).html().replace( '/prime_affiliate_links', '' ) );
    //     }
    // });
    //
    // $('#edit-slug-buttons>button').on('click', () => {
    //     if ( $( '#sample-permalink' ).length ) {
    //         $( '#sample-permalink' ).html( $( '#sample-permalink' ).html().replace( '/prime_affiliate_links', '' ) );
    //     }
    // });


    // Banner Upload
    // $('#prime-affiliate-links-upload-link-banner-btn').click(() => {
    //
    //     let formfield = $('#prime-affiliate-links-link-banner').attr('name');
    //     tb_show('Upload Banner', 'media-upload.php?type=image&amp;TB_iframe=true');
    //     window.send_to_editor = function (html) {
    //         let imgurl = $(html).attr('src');
    //         $('#prime-affiliate-links-link-banner').val(imgurl);
    //         $('#prime-affiliate-links-link-banner-img').attr('src', imgurl);
    //         tb_remove();
    //     };
    //
    //     return false;
    // });
    let prime_affiliate_links_custom_uploader;
    $('#prime-affiliate-links-upload-link-banner-btn').click(() => {

        //If the uploader object has already been created, reopen the dialog
        if (prime_affiliate_links_custom_uploader) {
            prime_affiliate_links_custom_uploader.open();
            return;
        }

        //Extend the wp.media object
        prime_affiliate_links_custom_uploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Banner Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });

        //When a file is selected, grab the URL and set it as the text field's value
        prime_affiliate_links_custom_uploader.on('select', function () {
            console.log(prime_affiliate_links_custom_uploader.state().get('selection').toJSON());
            let attachment = prime_affiliate_links_custom_uploader.state().get('selection').first().toJSON();
            $('#prime-affiliate-links-link-banner').val(attachment.url);
            $('#prime-affiliate-links-link-banner-img').prop('src', attachment.url);
        });

        //Open the uploader dialog
        prime_affiliate_links_custom_uploader.open();
    });

    // Click to copy short urls
    $('.prime-affiliate-links-copy').on('click', function (evt) {

        // let link = evt.target;
        navigator.clipboard.writeText($(this).text());

        $('#short_link')
            .text('Short Link (Copied!)')
            .css('color', '#056bd8');

        $('th.column-short_link')
            .text('Short Link (Copied!)')
            .css('color', '#056bd8');

        setTimeout(() => {

            $('#short_link')
                .text('Short Link (Click to Copy)')
                .css('color', 'inherit');

            $('th.column-short_link')
                .text('Short Link (Click to Copy)')
                .css('color', 'inherit');

        }, 1000);

    });

    

    let clicks_dates = $('#prime-affiliate-links-stats-dates').data('clicks');
    let clicks_links = $('#prime-affiliate-links-stats-links').data('clicks');
    let clicks_countries = $('#prime-affiliate-links-stats-countries').data('clicks');

    // Stats - Dates
    if ($('#prime-affiliate-links-stats-dates').length) {
        let chart_dates = new Chart($('#prime-affiliate-links-stats-dates'), {
            type: 'bar',
            data: {
                labels: Object.keys(clicks_dates),
                datasets: [{
                    label: '# of Clicks',
                    data: Object.values(clicks_dates),
                    backgroundColor: '#2271B1'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function (label, index, labels) {
                                if (Math.floor(label) === label) {
                                    return label;
                                }
                            }
                        }
                    },

                }
            }
        })
    }

    // Stats - Links
    if ($('#prime-affiliate-links-stats-links').length) {
        let chart_links = new Chart($('#prime-affiliate-links-stats-links'), {
            type: 'bar',
            data: {
                labels: Object.keys(clicks_links),
                datasets: [{
                    label: '# of Clicks',
                    data: Object.values(clicks_links),
                    backgroundColor: '#2271B1'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function (label, index, labels) {
                                if (Math.floor(label) === label) {
                                    return label;
                                }
                            }
                        }
                    },

                }
            }
        })
    }

    // Stats - Countries
    if ($('#prime-affiliate-links-stats-countries').length) {
        let chart_countries = new Chart($('#prime-affiliate-links-stats-countries'), {
            type: 'bar',
            data: {
                labels: Object.keys(clicks_countries),
                datasets: [{
                    label: '# of Clicks',
                    data: Object.values(clicks_countries),
                    backgroundColor: '#2271B1'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function (label, index, labels) {
                                if (Math.floor(label) === label) {
                                    return label;
                                }
                            }
                        }
                    },

                }
            }
        });
    }


    $('#bl-stats-selector').on('change', function () {
        window.location.href = `${prime_affiliate_links.admin_url}edit.php?post_type=${prime_affiliate_links.cpt}&page=stats&view=${$(this).val()}`;
    });

    $('#bl-stats-link-selector').on('change', function () {
        window.location.href = `${prime_affiliate_links.admin_url}edit.php?post_type=${prime_affiliate_links.cpt}&page=stats&type=link&link=${$(this).data('link')}&view=${$(this).val()}`;
    });

});
