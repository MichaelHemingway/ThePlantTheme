//POSSIBLY REVISE?
------------------

(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-69152759-1', 'auto');
ga('send', 'pageview');


TODO :
======

Key Features :

    1. Fix Mobile navigation
    
    2. Sidebar & Call to action banners
    
    3. Auto figure markup on images writing #the-article √
    
    4. Dark mode toggle (refine)
    
    5. Animation
    
    6. Finish Staff Page
    
    7. Add Privacy Policy to main site, add to footer.
    
    8. minify and concatinate for production


<!-- Website designed and maintained by <a itemprop="person" class="underline" href="http://mikemingway.com">Michael Hemingway</a>.-->

Today's Tasks
=============

1. Write 500+ words for the book

2. Realistically do all of this.

3. Work on facebook app

-----------------------------------------

// TODO FIX:
.search-overlay {
    display: none;
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 20;
    background-color: #fff
}

.search-overlay.open {
    display: block
}

.search-overlay.search-close {
    background: 0 0;
    border: none;
    font-size: 2em;
    outline: 0;
    position: absolute;
    top: .5em;
    right: 1em;
    z-index: 100
}

.search-overlay form input {
    background: 0 0;
    border: none;
    font-size: 50px;
    font-weight: 300;
    height: 70px;
    width: 100%;
    text-align: center
}

.search-overlay form input:focus,
.search-overlay formtextarea:focus {
    outline: 0
}

.search-button {
    color: #000;
    position: relative;
    float: right;
    margin-top: 25px;
    padding-right: .5em;
    z-index: 21
}

#dismiss-overlay {
    width: 100%;
    height: 100%;
    position: fixed;
    top: 0;
    left: 0;
    z-index: 4
}

.cd-header {
    height: 80px;
    width: 100%;
    padding-left: 5%;
    padding-right: 5%;
    background-color: #fff;
    margin: 0 auto;
    -webkit-transition: -webkit-transform .5s;
    transition: transform .5s;
    -webkit-transform: translateZ(0);
    -ms-transform: translateZ(0);
    transform: translateZ(0);
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
    position: fixed;
    z-index: 3;
    box-shadow: -2px 0 2px 0 rgba(0, 0, 0, .16), 2px 0 2px 0 rgba(0, 0, 0, .16), 0 2px 2px 0 rgba(0, 0, 0, .23)
}

.cd-header:after {
    content: "";
    display: table;
    clear: both
}

.cd-3d-nav a:before,
.cd-3d-nav:after,
.cd-marker:before {
    content: ''
}

.cd-header.nav-is-visible {
    -webkit-transform: translateY(80px);
    -ms-transform: translateY(80px);
    transform: translateY(80px)
}

@media only screen and (min-width:768px) {
    .cd-header.nav-is-visible {
        -webkit-transform: translateY(170px);
        -ms-transform: translateY(170px);
        transform: translateY(170px)
    }
}

.logo {
    float: left;
    margin-top: 1em;
    width: 200px;
    -webkit-transition: width .5s, -webkit-transform .5s;
    transition: width .5s, -webkit-transform .5s
}

.cd-3d-nav-trigger {
    position: relative;
    float: right;
    height: 45px;
    width: 45px;
    margin-top: 18px;
    overflow: hidden;
    color: transparent;
    -webkit-transition: margin .5s ease-in-out;
    transition: margin .5s ease-in-out;
    cursor: pointer;
}

.cd-3d-nav-trigger span,
.cd-3d-nav-trigger span:after,
.cd-3d-nav-trigger span:before {
    position: absolute;
    width: 28px;
    height: 3px;
    background-color: #000;
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden
}

.cd-3d-nav-trigger span {
    top: 21px;
    left: 8px;
    -webkit-transition: background .2s .5s;
    transition: background .2s .5s
}

.cd-3d-nav-trigger span:after,
.cd-3d-nav-trigger span:before {
    content: '';
    left: 0;
    -webkit-transition: -webkit-transform .2s .5s;
    transition: transform .2s .5s
}

.cd-3d-nav-trigger span:before {
    bottom: 8px
}

.cd-3d-nav-trigger span:after {
    top: 8px
}

.nav-is-visible .cd-3d-nav-trigger span {
    background-color: rgba(255, 255, 255, 0)
}

.cd-3d-nav-container,
.cd-3d-nav:after,
.nav-is-visible .cd-3d-nav-trigger span:after,
.nav-is-visible .cd-3d-nav-trigger span:before {
    background-color: #000
}

.nav-is-visible .cd-3d-nav-trigger span:before {
    -webkit-transform: translateY(8px) rotate(-45deg);
    -ms-transform: translateY(8px) rotate(-45deg);
    transform: translateY(8px) rotate(-45deg)
}

.nav-is-visible .cd-3d-nav-trigger span:after {
    -webkit-transform: translateY(-8px) rotate(45deg);
    -ms-transform: translateY(-8px) rotate(45deg);
    transform: translateY(-8px) rotate(45deg)
}

.cd-3d-nav-container {
    position: fixed;
    top: 0;
    left: 0;
    height: 80px;
    width: 100%;
    visibility: hidden;
    z-index: 5;
    font-size: 62.5%;
    -webkit-perspective: 1000px;
    perspective: 1000px;
    -webkit-transform: translateY(-100%);
    -ms-transform: translateY(-100%);
    transform: translateY(-100%);
    -webkit-transition: -webkit-transform .5s 0s, visibility 0s .5s;
    transition: transform .5s 0s, visibility 0s .5s
}

.cd-3d-nav-container.nav-is-visible {
    visibility: visible;
    -webkit-transform: translateY(0);
    -ms-transform: translateY(0);
    transform: translateY(0);
    -webkit-transition: -webkit-transform .5s 0s, visibility .5s 0s;
    transition: transform .5s 0s, visibility .5s 0s
}

@media only screen and (min-width:768px) {
    .cd-3d-nav-container {
        height: 170px
    }
}

.cd-3d-nav {
    position: relative;
    height: 100%;
    font-size: 16px;
    font-size: 1rem;
    font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
    -webkit-transform: translateZ(0);
    -ms-transform: translateZ(0);
    transform: translateZ(0);
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
    -webkit-transform-origin: center bottom;
    -ms-transform-origin: center bottom;
    transform-origin: center bottom;
    -webkit-transform: rotateX(90deg);
    -ms-transform: rotateX(90deg);
    transform: rotateX(90deg);
    -webkit-transition: -webkit-transform .5s;
    transition: transform .5s
}

.cd-3d-nav:after {
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    opacity: 1;
    filter: alpha(opacity=100);
    visibility: visible;
    -webkit-transition: opacity .5s 0s, visibility .5s 0s;
    transition: opacity .5s 0s, visibility .5s 0s
}

.cd-3d-nav li {
    height: 100%;
    width: 16.666%;
    float: left
}

.cd-3d-nav li:first-of-type a:before {
    background-image: url(http://www.theplantnewspaper.com/wp-content/themes/ThePlantTheme/img/icon-1.svg)
}

.cd-3d-nav li:nth-of-type(2) a:before {
    background-image: url(http://www.theplantnewspaper.com/wp-content/themes/ThePlantTheme/img/icon-2.svg)
}

.cd-3d-nav li:nth-of-type(3) a:before {
    background-image: url(http://www.theplantnewspaper.com/wp-content/themes/ThePlantTheme/img/icon-3.svg)
}

.cd-3d-nav li:nth-of-type(4) a:before {
    background-image: url(http://www.theplantnewspaper.com/wp-content/themes/ThePlantTheme/img/icon-4.svg)
}

.cd-3d-nav li:nth-of-type(5) a:before {
    background-image: url(http://www.theplantnewspaper.com/wp-content/themes/ThePlantTheme/img/icon-5.svg)
}

.cd-3d-nav li:nth-of-type(6) a:before {
    background-image: url(http://www.theplantnewspaper.com/wp-content/themes/ThePlantTheme/img/icon-6.svg)
}

.cd-3d-nav a {
    color: #fff!important;
    position: relative;
    display: block;
    height: 100%;
    -webkit-transition: background-color .2s;
    transition: background-color .2s;
    overflow: hidden;
    :hover {
        background-color: #508991
    }
}

.cd-3d-nav a:before {
    height: 32px;
    width: 32px;
    position: absolute;
    left: 50%;
    top: 50%;
    bottom: auto;
    right: auto;
    -webkit-transform: translateX(-50%) translateY(-50%);
    -ms-transform: translateX(-50%) translateY(-50%);
    transform: translateX(-50%) translateY(-50%);
    background-size: 32px 64px;
    background-repeat: no-repeat;
    background-position: 0 0
}

.nav-is-visible .cd-3d-nav,
.nav-is-visible .cd-marker {
    -webkit-transform: translateZ(0);
    -ms-transform: translateZ(0)
}

.cd-3d-nav a .cd-3d-nav .cd-selected a {
    background-color: #1C5139
}

.cd-3d-nav .cd-selected a:hover {
    background-color: #1C6131
}

.cd-3d-nav .cd-selected a:before {
    background-position: 0 -32px
}

.nav-is-visible .cd-3d-nav {
    transform: translateZ(0)
}

.nav-is-visible .cd-3d-nav:after {
    opacity: 0;
    filter: alpha(opacity=0);
    visibility: hidden;
    -webkit-transition: opacity .5s 0s, visibility 0s .5s;
    transition: opacity .5s 0s, visibility 0s .5s
}

@media only screen and (min-width:768px) {
    .cd-3d-nav a {
        padding: 7.6em 1em 0;
        color: #fff;
        font-weight: 600;
        text-align: center;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        text-indent: inherit
    }
    .cd-3d-nav a:before {
        top: 3em;
        left: 50%;
        right: auto;
        -webkit-transform: translateX(-50%);
        -ms-transform: translateX(-50%);
        transform: translateX(-50%)
    }
}

.cd-marker {
    position: absolute;
    bottom: 0;
    left: 0;
    height: 3px;
    width: 16.666%;
    background-color: currentColor;
    -webkit-transform-origin: center bottom;
    -ms-transform-origin: center bottom;
    transform-origin: center bottom;
    -webkit-transform: translateZ(0) rotateX(90deg);
    -ms-transform: translateZ(0) rotateX(90deg);
    transform: translateZ(0) rotateX(90deg);
    -webkit-transition: -webkit-transform .5s, left .5s, color .5s, background-color .5s;
    transition: transform .5s, left .5s, color .5s, background-color .5s
}

.cd-marker:before {
    position: absolute;
    bottom: 3px;
    left: 50%;
    right: auto;
    -webkit-transform: translateX(-50%);
    -ms-transform: translateX(-50%);
    transform: translateX(-50%);
    height: 0;
    width: 0;
    border: 10px solid transparent;
    border-bottom-color: inherit
}

.nav-is-visible .cd-marker {
    transform: translateZ(0)
}

.wrapper {
    -webkit-transition: -webkit-transform .5s;
    transition: transform .5s;
    -webkit-transform: translateZ(0);
    -ms-transform: translateZ(0);
    transform: translateZ(0);
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
    position: relative
}

.wrapper.nav-is-visible {
    -webkit-transform: translateY(80px);
    -ms-transform: translateY(80px);
    transform: translateY(80px)
}

@media only screen and (min-width:768px) {
    .wrapper.nav-is-visible {
        -webkit-transform: translateY(170px);
        -ms-transform: translateY(170px);
        transform: translateY(170px)
    }
}

[class*=icono-],
[class*=icono-] * {
    box-sizing: border-box;
    display: inline-block;
    vertical-align: middle;
    position: relative;
    font-style: normal;
    color: #000;
    text-align: left;
    text-indent: -9999px;
    direction: ltr;
    content: ''
}

.icono-search {
    border: 2px solid;
    width: 18px;
    height: 18px;
    border-radius: 50%;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
    margin: 4px 4px 8px 8px
}

.icono-search:before {
    width: 3px;
    height: 10px;
    box-shadow: inset 0 0 0 32px;
    top: 18px;
    border-radius: 0 0 1px 1px;
    position: absolute;
    left: 50%;
    -webkit-transform: translateX(-50%);
    -ms-transform: translateX(-50%);
    transform: translateX(-50%)
}
