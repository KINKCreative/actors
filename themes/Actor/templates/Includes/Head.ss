<head>
    <% base_tag %>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><% if $MetaTitle %>$MetaTitle<% else %>$Title<% end_if %> | $SiteConfig.Title</title>
    <% if $MetaDescription %>$MetaTags(false)<% else %><meta name="description" content="{$SiteConfig.Title}: {$Title}"><% end_if %>

    <link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16" />

    <!-- CSS Plugins -->
    <link rel="stylesheet" href="$ThemeDir/assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="$ThemeDir/assets/plugins/rs-plugin/css/settings.css">
    <link rel="stylesheet" href="$ThemeDir/assets/plugins/cubeportfolio/css/cubeportfolio.min.css">
    <link rel="stylesheet" href="$ThemeDir/assets/plugins/magnific/magnific-popup.css">
    <link rel="stylesheet" href="$ThemeDir/assets/plugins/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="$ThemeDir/assets/plugins/owl-carousel/owl.theme.css">

    <!-- Main CSS -->
    <link href="$ThemeDir/styles/main.css" rel="stylesheet">

    <!-- Google Web Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Raleway:200,700|Material+Icons' rel='stylesheet' type='text/css'>

    <!-- Font Awesome -->
    <%-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"> --%>

    <!-- <script src="$ThemeDir/scripts/jquery.min.js"></script> -->

    <% include GoogleAnalytics %>
</head>








