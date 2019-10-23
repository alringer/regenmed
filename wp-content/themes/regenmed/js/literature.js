(function() {
    var literature = {
        location: location.origin
    };
    function getCard(post) {
        typeName = post.type == 'whitepapers' ? 'WHITE PAPERS' : 'BLOG';
        return `
            <article class="rgn-literature-page__card">
                <div class="rgn-literature-page__card__image rgn-background-image" style="background-image:url('${post.featured_img_src}')"></div>
                <div class="rgn-literature-page__card__info">
                    <div class="rgn-literature-page__card__type">
                        ${typeName}
                    </div>
                    <div class="rgn-literature-page__card__title">
                        <p>${post.title}</p>
                    </div>
                    <div class="rgn-literature-page__card__description">
                        ${post.excerpt}
                    </div>
                    <a class="rgn-literature-page__card__read-more rgn-read-more-link" href="${post.permalink}">READ MORE <i class="icon icon-sm icon-right-arrow"></i></a>
                </div>
            </article>
        `;
    }

    function getMore(type, page, perPage) {
        var theUrl;
        if (!page) page = 2;
        if (!perPage) perPage = 6;
        if (!type) type = 'literature';
        theUrl =
            '/rgn/v1/literature?posttype=' +
            type +
            '&page=' +
            page +
            '&per-page=' +
            perPage +
            '&offset=1';
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var response = JSON.parse(this.responseText);
                var cardsContainer = $('#cardsContainer');
                if (response && response.length >= 0) {
                    for (post of response) {
                        var cardText = getCard(post);
                        $(cardText).appendTo(cardsContainer);
                    }
                }
                hasMore = response.length >= perPage;
                if (hasMore) {
                    viewMoreButton.disabled = false;
                } else {
                    viewMoreButton.hidden = true;
                }
            }
        };
        xhttp.open('GET', `${literature.location}/wp-json` + theUrl, true);
        xhttp.send();
    }
    function initTabIndicator() {
        var items = $('.rgn-literature-page__nav__list__item');
        var indicator = $('#rgnListIndicator');
        var activeItem = items.filter('.active');
        indicator.width(activeItem.width());
        indicator.offset({
            top: indicator.position().top,
            left: activeItem.position().left
        });
        items.hover(
            function(event) {
                event.stopPropagation();
                var hoveredItem = $(this);

                //Set width
                indicator.width(hoveredItem.width());

                //Set X Position
                var hoveredPosition = hoveredItem.position();
                var indictatorPosition = indicator.position();
                indicator.offset({
                    top: indictatorPosition.top,
                    left: hoveredPosition.left
                });
                $(this).addClass('hovered');
            },
            function(event) {
                var activeItem = $(
                    '.rgn-literature-page__nav__list__item.active'
                );

                //Set width
                indicator.width(activeItem.width());

                //Set X Position
                var activePosition = activeItem.position();
                var indictatorPosition = indicator.position();
                indicator.offset({
                    top: indictatorPosition.top,
                    left: activePosition.left
                });
                // console.log(this);
                $(this).removeClass('hovered');
            }
        );
    }

    var hasMore = false;
    var currentPage = 1;
    var viewMoreButton = document.getElementById('rgnLiteratureViewMore');
    viewMoreButton.addEventListener('click', function() {
        viewMoreButton.disabled = true;
        getMore(this.dataset.posttype, currentPage);
        currentPage++;
    });

    initTabIndicator();
})();
