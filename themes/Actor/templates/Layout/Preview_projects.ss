<!-- Portfolio Section -->
<div class="p-60">
    <div class="container-fluid">
        <div class="row">
            <div class="rk-head-title">
                <h1>$Title</h1>
                <!-- Title Devider -->
                <div class="rk-separator m-b-5"></div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid col-no-p">

    <div id="portfolio2-grid-container" class="cbp-l-grid-masonry">

        <% loop Projects %>
            <!-- Item -->
            <div class="cbp-item graphic identity">
                <a class="cbp-caption" data-title="Tiger" href="$Link">
                    <div class="cbp-caption-defaultWrap">
                        <img src="$Images.First.CroppedImage(800,450).URL" alt="Specify an alternate text for an image">
                    </div>
                    <div class="cbp-caption-activeWrap">
                        <div class="cbp-l-caption-alignCenter">
                            <div class="cbp-l-caption-body">
                                <div class="cbp-l-caption-title">$Title</div>
                                <div class="cbp-l-caption-desc">$Genre</div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        <% end_loop %>

    </div>

</div> <!-- /.container-fluid -->

