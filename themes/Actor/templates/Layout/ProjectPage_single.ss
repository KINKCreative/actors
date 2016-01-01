<% with Item %>

<!-- Project Single Header -->
<div class="jumbotron project-single-header" style="background-image: url($Image.CroppedImage(1422,800).URL);">
    <div class="container">
        <div class="row">
            <!-- Title and Description -->
            <div class="elements-title text-center p-l-120 p-r-120 p-n-xs">
                <h1>$Title</h1>
                <p>$Genre</p>
            </div>
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</div>
<!-- End Project Single Header -->

<div class="container project-single-container">

    <!-- Project Single Information -->
    <div class="project-single-info">
        <div class="col-sm-6">
            <h2>What we did</h2>
            <p>Proin facilisis varius nunc. Curabitur eros risus, ultrices et dui ut, luctus accumsan nibh. Fusce convallis sapien placerat tellus suscipit vehicula. Ea mei nostrum imperdiet deterruisset, mei ludus efficiendi ei. Sea summo mazim ex, ea errem eleifend definitionem vim. Detracto erroribus et mea.</p>
        </div>

        <div class="col-sm-6">
            <h2>About Project</h2>
            <p>Btur eros risus, ultrices et dui ut, luctus accumsan nibh. Fusce convallis sapien placerat tellus suscipit vehicula. Ea mei nostrum imperdiet deterruisset, mei ludus efficiendi ei. Sea summo mazim ex, ea errem eleifend definitionem vim. Detracto erroribus et mea proin facilisis varius nunc curabi.</p>
        </div>
    </div>

    <div class="clearfix"></div>

    <!-- Project Single Video -->
    <div class="project-single-video">
        <div class="col-sm-12">
            <!-- Video -->
            <div class="embed-responsive embed-responsive-16by9">
                <!-- Video Link -->
                <iframe class="embed-responsive-item" src="//player.vimeo.com/video/52149990"></iframe>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <!-- Project Single Details -->
    <div class="project-single-details">

        <!-- Left Column -->
        <div class="col-sm-4">
            <h2>Project Details</h2>
            <ul class="list-group project-list-group">
                <li class="list-group-item project-list-group-item">
                    <span class="badge">Envato Market</span>
                    Client:
                </li>
                <li class="list-group-item project-list-group-item">
                    <span class="badge"><a href="#">www.envato.com</a></span>
                    Website:
                </li>
                <li class="list-group-item project-list-group-item">
                    <span class="badge">25 December, 2014</span>
                    Date:
                </li>
                <li class="list-group-item project-list-group-item">
                    <span class="badge">
                        <a href="#">Graphic Design</a>, <a href="#">UI/UX</a>
                    </span>
                    Category:
                </li>
            </ul>
        </div>

        <!-- Right Column -->
        <div class="col-sm-8">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In maximus ligula semper metus pellentesque mattis. Maecenas volutpat, diam enim sagittis quam, id porta quam. Sed id dolor consectetur fermentum nibh volutpat, accumsan purus. Etiam sit amet fringilla lacus. Pellentesque suscipit ante at ullamcorper pulvinar neque porttitor. Integer lectus. Praesent sed nisi eleifend, fermentum orci amet, iaculis libero. Donec vel ultricies purus. Nam dictum sem, eu aliquam. In maximus ligula semper metus pellentesque mattis. Maecenas volutpat, diam enim sagittis quam, id porta quam. Sed id dolor consectetur fermentum nibh volutpat, accumsan purus. Etiam sit amet fr.</p>
            <p>Etiam sit amet fringilla lacus. Pellentesque suscipit ante at ullamcorper pulvinar neque porttitor. Integer lectus. Praesent sed nisi eleifend, fermentum orci amet, iaculis libero. Donec vel ultricies purus. Nam dictum sem, eu aliquam. In maximus ligula semper metus pellentesque mattis. Maecenas volutpat, diam enim sagittis quam, id porta quam. Sed id dolor consectetur fermentum nibh volutpat, accumsan purus. Etiam sit amet frorem ipsum dolor sit amet, consectetur adipiscing elit. In maximus ligula semper metus pellentesque mattis. Maecenas volutpat, diam enim sagittis quam, id porta quam. Sed id dolor consectetur fermentum nibh volutpat, accumsan purus. </p>
        </div>
    </div>
</div>

<% if Images %>
<div class="container-fluid col-no-p">

    <div id="portfolio2-grid-container" class="cbp-l-grid-masonry">

        <% loop Images %>
            <!-- Item -->
            <div class="cbp-item graphic identity">
                <%-- <a class="cbp-caption" data-title="Tiger" href="$Link"> --%>
                    <%-- <div class="cbp-caption-defaultWrap"> --%>
                        <img src="$CroppedImage(800,450).URL" alt="Specify an alternate text for an image">
                    <%-- </div> --%>
                    <%-- <div class="cbp-caption-activeWrap">
                        <div class="cbp-l-caption-alignCenter">
                            <div class="cbp-l-caption-body">
                                <div class="cbp-l-caption-title">$Title</div>
                                <div class="cbp-l-caption-desc">$Genre</div>
                            </div>
                        </div>
                    </div> --%>
                </a>
            </div>
        <% end_loop %>

    </div>

</div> <!-- /.container-fluid -->
<% end_if %>




 <!-- About Section -->
<%-- <section id="header-section" class="section-padding">
    <!-- Head Title -->
    <div class="rk-head-title">
        <h1>$Title</h1>
        <!-- Title Devider -->
        <div class="rk-separator"></div>
    </div>
</section> --%>
<!-- /.section -->

<%-- <div class="container-fluid col-no-p">

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

</div> --%>
<% end_with %>

