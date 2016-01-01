<!-- Header -->
<section id="header-section">

    <!-- Navbar -->
    <nav class="navbar header-navbar navbar-fixed-top" role="navigation">
        <div class="container-fluid header-navbar-container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Logo link and image -->
                <a class="navbar-brand" href="/#top">
                    <img src="$ThemeDir/assets/img/logo.png" alt="Rook Logo" height="60" width="60">
                </a>
            </div>
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">

                <!-- Navigation Menu -->
                <% include Navigation %>

            </div>
        </div> <!-- /.container-fluid -->
    </nav>
    <!-- End Navbar -->

</section>

<% if Projects %>

<section id="projects">
    <% with Projects.First %>
        <!-- Revolution Slider -->
        <div class="tp-banner-container">
            <div class="tp-banner-1">
                <ul>

                    <!-- SLIDE NR. $Pos  -->
                    <li data-transition="fade" data-slotamount="5" data-masterspeed="700">
                        <!-- MAIN IMAGE -->
                        <img src="$Image.CroppedImage(1422,800).URL"  alt="Slider Image $Pos"  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">

                        <!-- LAYER NR. 1 -->
                        <div class="tp-caption slider-text-big lfb ltt tp-resizeme p-50"
                            data-x="center" data-hoffset="0"
                            data-y="center" data-voffset="-50"
                            data-speed="600"
                            data-start="800"
                            data-easing="Power4.easeOut"
                            data-splitin="none"
                            data-splitout="none"
                            data-elementdelay="0.01"
                            data-endelementdelay="0.1"
                            data-endspeed="500"
                            data-endeasing="Power4.easeIn">$Title
                        </div>


                        <% if Genre %>
                        <div class="tp-caption slider-text-small lfb ltt tp-resizeme"
                            data-x="center" data-hoffset="0"
                            data-y="center" data-voffset="50"
                            data-speed="600"
                            data-start="900"
                            data-easing="Power4.easeOut"
                            data-splitin="none"
                            data-splitout="none"
                            data-elementdelay="0.01"
                            data-endelementdelay="0.1"
                            data-endspeed="500"
                            data-endeasing="Power4.easeIn">$Genre
                        </div>
                        <% end_if %>


                        <% if IMDBLink %>
                        <div class="tp-caption slider-text lfb ltt tp-resizeme"
                            data-x="center" data-hoffset="0"
                            data-y="center" data-voffset="150"
                            data-speed="600"
                            data-start="900"
                            data-easing="Power4.easeOut"
                            data-splitin="none"
                            data-splitout="none"
                            data-elementdelay="0.01"
                            data-endelementdelay="0.1"
                            data-endspeed="500"
                            data-endeasing="Power4.easeIn">
                                <a class="btn btn-primary" href="$IMDBLink" role="button" target="_blank">IMDB</a>
                        </div>
                        <% end_if %>
                    </li>

                </ul>
            </div>
        </div><!-- End Revolution Slider -->
        <% end_with %>

</section>
<!-- End Header -->


 <!-- About Section -->
<section id="{$URLSegment}-section" class="section-padding">
    <!-- Head Title -->
    <div class="rk-head-title">
        <h1>$Title</h1>
        <!-- Title Devider -->
        <div class="rk-separator"></div>
    </div>
</section>
<!-- /.section -->

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

</div>
<% end_if %>

