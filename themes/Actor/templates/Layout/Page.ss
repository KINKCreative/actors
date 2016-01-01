<!-- Project Single Header -->
<div class="jumbotron page-header m-0" <% if Image %>style="background-image: url($Image.CroppedImage(1422,800).URL);"<% end_if %>>
    <div class="container">
        <div class="row">
            <!-- Title and Description -->
            <div class="elements-title text-center p-l-120 p-r-120 p-n-xs">
                <h1>$Title</h1>
            </div>
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</div>
<!-- End Project Single Header -->

<% if Content %>
<section id="{$URLSegment}-section" class="">

    <div class="container">
        <div class="about-content text-center">
            <!-- Description -->
            <p>$Content</p>
            $Form

        </div>
    </div>

</section>
<% end_if %>

<% if Images %>
<div class="container-fluid col-no-p m-t--5">

    <div id="portfolio2-grid-container" class="cbp-l-grid-masonry">

        <% loop Images %>
        <div class="cbp-item graphic identity">
            <a class="cbp-lightbox cpb-caption" data-title="Image {$ID}" href="$Fit(1000,1000).URL">
                <div class="cbp-caption-defaultWrap">
                    <img src="$FocusFill(600,600).URL" alt="Specify an alternate text for an image">
                </div>
                <div class="cbp-caption-activeWrap">
                    <div class="cbp-l-caption-alignCenter">
                        <div class="cbp-l-caption-body">
                            <div class="cbp-l-caption-title">Four Things I Wanted To Do With You</div>
                            <div class="cbp-l-caption-desc">Comedy</div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <% end_loop %>

    </div>

</div> <!-- /.container-fluid -->
<% end_if %>

<div class="container-fluid text-center p-30">
    <div data-sr="enter bottom over 1.3s and move 65px">
        <a class="btn btn-black" href="/" role="button">Return to Home</a>
    </div>
</div> <!-- /.container -->
