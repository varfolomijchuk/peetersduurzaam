let $ = jQuery.noConflict();

// <!-- Loadmore posts
// $(document).on("click", ".loadmore-posts", function (e) {
//     e.preventDefault();
//     let url = $(this).attr('href');
//     $.get(url, function (responce) {
//         let loadmoreLink = $(responce).find('.loadmore-posts').attr('href'), posts = $(responce).find('.blogs-row.row').html();
//
//         if (typeof loadmoreLink != 'undefined') $('.loadmore-posts').attr('href', loadmoreLink);
//         else $('.loadmore-posts').fadeOut(function () {
//             $(this).remove();
//         });
//
//         $('.blogs-row.row').append(posts);
//     });
// });
// Loadmore posts -->

// if ($(".calendly-inline-widget").length) {
    // $(".calendly-inline-widget").bind("DOMSubtreeModified", function () {
        setTimeout(function () {
            $('.full-preloader').addClass('hide');
        }, 1000)
    // });
// }

$(document).ready(function () {
    let dateNow = new Date(),
        hours = dateNow.getHours(),
        minutes = dateNow.getMinutes(),
        workNow = true;
    if ((hours < 8 || (hours === 8 && minutes <= 30)) || (hours > 17 || (hours === 17 && minutes >= 30))) workNow = false;
    if (dateNow.getDay() == 0 || dateNow.getDay() == 6) workNow = false;
    if (workNow === false) $('.phone-dot, #phone').addClass('phone-dot--red');
});

// Ajax filter/load CPT Projecten ()
function projectenFilter(cat, type, paged, loadMore) {
    const data = {
        action: 'projects_load',
        cat: cat,
        type: type,
        paged: paged,
        loadMore: loadMore,
    };

    $.ajax({
        url: ajax_object.ajaxurl,
        type: 'post',
        dataType: 'json',
        data,
        success: function (response) {
            if (response.loadMore) {
                $('.projects-row').append(response.html);
            } else {
                $('.projects-row').html(response.html);
            }
            if (response.postsAvailable === 0) {
                $('.projects-row').html('<div><h2>Geen posts gevonden</h2></div>');
                $('.load-more-wrapper').find('.load-more').hide();
            }

            if ($('.single-project').length >= response.postsAvailable || response.postsAvailable < response.perPage) {
                $('.load-more-wrapper').find('.load-more').hide();
            } else {
                $('.load-more-wrapper').find('.load-more').show();
            }
        },
        error: function (e) {
            console.log('error', e);
        },
    });
}

function postsFilter(cat, paged, year, loadMore) {
    const data = {
        action: 'posts_load',
        cat: cat,
        paged: paged,
        year: year,
        loadMore: loadMore,
    };

    $.ajax({
        url: ajax_object.ajaxurl,
        type: 'post',
        dataType: 'json',
        data,
        success: function (response) {
            if (response.loadMore) {
                $('.blogs-row').append(response.html);
            } else {
                $('.blogs-row').html(response.html);
            }
            if (response.postsAvailable === 0) {
                $('.blogs-row').html('<div><h2>Geen posts gevonden</h2></div>');
                $('.load-more-wrapper').find('.load-more').hide();
            }

            if ($('.single-blog-in-archive-wrapper').length >= response.postsAvailable || response.postsAvailable < response.perPage) {
                $('.load-more-wrapper').find('.load-more').hide();
            } else {
                $('.load-more-wrapper').find('.load-more').show();
            }
        },
        error: function (e) {
            console.log('error', e);
        },
    });
}
$(document).on('ready', function () {
    if ($('.post-filter-wrapper').length) {
        let loadMore =  $('.load-more-wrapper').find('.load-more'),
            clientTypes = $('.cat-block__select').find('.client-type-items'),
            cats = 'all',
            type = 'all',
            paged = 1,
            accordionBlock = $('.accordion-wrapper');


        if ($('.category-item').length) {
            $('.category-item').on('click', function (e) {
                let post = $(this).data('post');
                paged = 1;
                cats = $(this).data('cat');
                 if (cats === 'toggle') {
                     $(this).next(accordionBlock).toggle();
                 } else {
                     if (post === 'post') {
                         postsFilter(cats, paged, '', false);
                     } else {
                        projectenFilter(cats, type, paged, false);
                     }
                 }
                 if ($(this).data('cat') === 'all') {
                     $('.category-item.chevron-items').toggleClass('is-active').html('Categorieën');
                 } else {
                     $('.category-item.chevron-items').toggleClass('is-active').html($(this).text());
                 }
                 $(this).closest('.accordion-wrapper').hide();
            });
        }

        if ($('.client-type-block').length) {
            clientTypes.on('click', function () {
                let post = $(this).data('post'),
                    typeText = post === 'post' ? 'Jaar' : 'Types';
                paged = 1;
                type = $(this).data('client-type');
                if ($(this).data('client-type') === 'toggle') {
                    $(this).next(accordionBlock).toggle();
                } else {
                    if (post === 'post') {
                        let year = $(this).data('year');
                        postsFilter(cats, paged, year, false);
                    } else {
                        projectenFilter(cats, type, paged, false);
                    }
                }
                if ($(this).data('client-type') === 'all' || $(this).data('year') === 'all') {
                    $('.client-type-items.chevron-items').toggleClass('is-active').html(typeText);
                } else {
                    $('.client-type-items.chevron-items').toggleClass('is-active').html($(this).text());
                }
                // $('.client-type-items.chevron-items').toggleClass('is-active');
                $(this).closest('.accordion-wrapper').hide();
            });
        }

        if ($('.load-more-wrapper').length) {

            loadMore.on('click', function() {
                let post = $(this).data('post');
                ++paged
                if (post === 'post') {
                    postsFilter(cats, paged, '', true);
                } else {
                    projectenFilter(cats, type, paged, true);
                }
            });
        }
    }
})