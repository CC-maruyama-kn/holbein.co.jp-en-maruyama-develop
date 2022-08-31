  


<!DOCTYPE html>
<html>
  <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# githubog: http://ogp.me/ns/fb/githubog#">
    <meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>jquery.belatedPNG/js/jquery.belatedPNG.js at master · wakuworks/jquery.belatedPNG · GitHub</title>
    <link rel="search" type="application/opensearchdescription+xml" href="/opensearch.xml" title="GitHub" />
    <link rel="fluid-icon" href="https://github.com/fluidicon.png" title="GitHub" />
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-114.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-144.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144.png" />
    <link rel="logo" type="image/svg" href="http://github-media-downloads.s3.amazonaws.com/github-logo.svg" />
    <link rel="assets" href="https://a248.e.akamai.net/assets.github.com/">
    <link rel="xhr-socket" href="/_sockets" />
    


    <meta name="msapplication-TileImage" content="/windows-tile.png" />
    <meta name="msapplication-TileColor" content="#ffffff" />
    <meta name="selected-link" value="repo_source" data-pjax-transient />
    <meta content="collector.githubapp.com" name="octolytics-host" /><meta content="github" name="octolytics-app-id" />

    
    
    <link rel="icon" type="image/x-icon" href="/favicon.ico" />

    <meta content="authenticity_token" name="csrf-param" />
<meta content="dS06OSOSnWuL90+YSglxhlxLfnGYrTtc54EvtNO8/IY=" name="csrf-token" />

    <link href="https://a248.e.akamai.net/assets.github.com/assets/github-7f2800ae16a63fd14eead781f3eca593fa5694c5.css" media="all" rel="stylesheet" type="text/css" />
    <link href="https://a248.e.akamai.net/assets.github.com/assets/github2-a9290f739c3d9b791e60ea043537f392e380b2b6.css" media="all" rel="stylesheet" type="text/css" />
    


      <script src="https://a248.e.akamai.net/assets.github.com/assets/frameworks-4c434fa1705bf526e191eec0cd8fab1a5ce3e326.js" type="text/javascript"></script>
      <script src="https://a248.e.akamai.net/assets.github.com/assets/github-ca9e64c646b09540d9b25626c744f64163979f2b.js" type="text/javascript"></script>
      
      <meta http-equiv="x-pjax-version" content="0061c768c8b54c5450e52eabade89ed6">

        <link data-pjax-transient rel='permalink' href='/wakuworks/jquery.belatedPNG/blob/3bd742683d14b8aaacb63f751cb4413009da239e/js/jquery.belatedPNG.js'>
    <meta property="og:title" content="jquery.belatedPNG"/>
    <meta property="og:type" content="githubog:gitrepository"/>
    <meta property="og:url" content="https://github.com/wakuworks/jquery.belatedPNG"/>
    <meta property="og:image" content="https://secure.gravatar.com/avatar/6f3e04d53396393a150a32f5c0ffedd4?s=420&amp;d=https://a248.e.akamai.net/assets.github.com%2Fimages%2Fgravatars%2Fgravatar-user-420.png"/>
    <meta property="og:site_name" content="GitHub"/>
    <meta property="og:description" content="jquery.belatedPNG - DD_belatedPNG を改造、jQuery 用のプラグインとして移植（Ver 0.0.4）"/>
    <meta property="twitter:card" content="summary"/>
    <meta property="twitter:site" content="@GitHub">
    <meta property="twitter:title" content="wakuworks/jquery.belatedPNG"/>

    <meta name="description" content="jquery.belatedPNG - DD_belatedPNG を改造、jQuery 用のプラグインとして移植（Ver 0.0.4）" />


    <meta content="305405" name="octolytics-dimension-user_id" /><meta content="wakuworks" name="octolytics-dimension-user_login" /><meta content="1308192" name="octolytics-dimension-repository_id" /><meta content="wakuworks/jquery.belatedPNG" name="octolytics-dimension-repository_nwo" /><meta content="true" name="octolytics-dimension-repository_public" /><meta content="false" name="octolytics-dimension-repository_is_fork" /><meta content="1308192" name="octolytics-dimension-repository_network_root_id" /><meta content="wakuworks/jquery.belatedPNG" name="octolytics-dimension-repository_network_root_nwo" />
  <link href="https://github.com/wakuworks/jquery.belatedPNG/commits/master.atom" rel="alternate" title="Recent Commits to jquery.belatedPNG:master" type="application/atom+xml" />

  </head>


  <body class="logged_out page-blob windows vis-public env-production  ">
    <div id="wrapper">

      
      
      

      
      <div class="header header-logged-out">
  <div class="container clearfix">

    <a class="header-logo-wordmark" href="https://github.com/">Github</a>

    <div class="header-actions">
      <a class="button primary" href="/signup">Sign up</a>
      <a class="button" href="/login?return_to=%2Fwakuworks%2Fjquery.belatedPNG%2Fblob%2Fmaster%2Fjs%2Fjquery.belatedPNG.js">Sign in</a>
    </div>

    <div class="command-bar js-command-bar  in-repository">


      <ul class="top-nav">
          <li class="explore"><a href="/explore">Explore</a></li>
        <li class="features"><a href="/features">Features</a></li>
          <li class="enterprise"><a href="http://enterprise.github.com/">Enterprise</a></li>
          <li class="blog"><a href="/blog">Blog</a></li>
      </ul>
        <form accept-charset="UTF-8" action="/search" class="command-bar-form" id="top_search_form" method="get">
  <a href="/search/advanced" class="advanced-search-icon tooltipped downwards command-bar-search" id="advanced_search" title="Advanced search"><span class="octicon octicon-gear "></span></a>

  <input type="text" data-hotkey="/ s" name="q" id="js-command-bar-field" placeholder="Search or type a command" tabindex="1" autocapitalize="off"
    
      data-repo="wakuworks/jquery.belatedPNG"
      data-branch="master"
      data-sha="bf6019dc1a02006f28ab43c633253ee6e50a3b3b"
  >

    <input type="hidden" name="nwo" value="wakuworks/jquery.belatedPNG" />

    <div class="select-menu js-menu-container js-select-menu search-context-select-menu">
      <span class="minibutton select-menu-button js-menu-target">
        <span class="js-select-button">This repository</span>
      </span>

      <div class="select-menu-modal-holder js-menu-content js-navigation-container">
        <div class="select-menu-modal">

          <div class="select-menu-item js-navigation-item selected">
            <span class="select-menu-item-icon octicon octicon-check"></span>
            <input type="radio" class="js-search-this-repository" name="search_target" value="repository" checked="checked" />
            <div class="select-menu-item-text js-select-button-text">This repository</div>
          </div> <!-- /.select-menu-item -->

          <div class="select-menu-item js-navigation-item">
            <span class="select-menu-item-icon octicon octicon-check"></span>
            <input type="radio" name="search_target" value="global" />
            <div class="select-menu-item-text js-select-button-text">All repositories</div>
          </div> <!-- /.select-menu-item -->

        </div>
      </div>
    </div>

  <span class="octicon help tooltipped downwards" title="Show command bar help">
    <span class="octicon octicon-question"></span>
  </span>


  <input type="hidden" name="ref" value="cmdform">

  <div class="divider-vertical"></div>

</form>
    </div>

  </div>
</div>


      


            <div class="site hfeed" itemscope itemtype="http://schema.org/WebPage">
      <div class="hentry">
        
        <div class="pagehead repohead instapaper_ignore readability-menu ">
          <div class="container">
            <div class="title-actions-bar">
              

<ul class="pagehead-actions">



    <li>
      <a href="/login?return_to=%2Fwakuworks%2Fjquery.belatedPNG"
        class="minibutton with-count js-toggler-target star-button entice tooltipped upwards"
        title="You must be signed in to use this feature" rel="nofollow">
        <span class="octicon octicon-star"></span>Star
      </a>
      <a class="social-count js-social-count" href="/wakuworks/jquery.belatedPNG/stargazers">
        43
      </a>
    </li>
    <li>
      <a href="/login?return_to=%2Fwakuworks%2Fjquery.belatedPNG"
        class="minibutton with-count js-toggler-target fork-button entice tooltipped upwards"
        title="You must be signed in to fork a repository" rel="nofollow">
        <span class="octicon octicon-git-branch"></span>Fork
      </a>
      <a href="/wakuworks/jquery.belatedPNG/network" class="social-count">
        15
      </a>
    </li>
</ul>

              <h1 itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="entry-title public">
                <span class="repo-label"><span>public</span></span>
                <span class="mega-octicon octicon-repo"></span>
                <span class="author vcard">
                  <a href="/wakuworks" class="url fn" itemprop="url" rel="author">
                  <span itemprop="title">wakuworks</span>
                  </a></span> /
                <strong><a href="/wakuworks/jquery.belatedPNG" class="js-current-repository">jquery.belatedPNG</a></strong>
              </h1>
            </div>

            
  <ul class="tabs">
    <li class="pulse-nav"><a href="/wakuworks/jquery.belatedPNG/pulse" class="js-selected-navigation-item " data-selected-links="pulse /wakuworks/jquery.belatedPNG/pulse" rel="nofollow"><span class="octicon octicon-pulse"></span></a></li>
    <li><a href="/wakuworks/jquery.belatedPNG" class="js-selected-navigation-item selected" data-selected-links="repo_source repo_downloads repo_commits repo_tags repo_branches /wakuworks/jquery.belatedPNG">Code</a></li>
    <li><a href="/wakuworks/jquery.belatedPNG/network" class="js-selected-navigation-item " data-selected-links="repo_network /wakuworks/jquery.belatedPNG/network">Network</a></li>
    <li><a href="/wakuworks/jquery.belatedPNG/pulls" class="js-selected-navigation-item " data-selected-links="repo_pulls /wakuworks/jquery.belatedPNG/pulls">Pull Requests <span class='counter'>0</span></a></li>

      <li><a href="/wakuworks/jquery.belatedPNG/issues" class="js-selected-navigation-item " data-selected-links="repo_issues /wakuworks/jquery.belatedPNG/issues">Issues <span class='counter'>0</span></a></li>



    <li><a href="/wakuworks/jquery.belatedPNG/graphs" class="js-selected-navigation-item " data-selected-links="repo_graphs repo_contributors /wakuworks/jquery.belatedPNG/graphs">Graphs</a></li>


  </ul>
  
<div class="tabnav">

  <span class="tabnav-right">
    <ul class="tabnav-tabs">
          <li><a href="/wakuworks/jquery.belatedPNG/tags" class="js-selected-navigation-item tabnav-tab" data-selected-links="repo_tags /wakuworks/jquery.belatedPNG/tags">Tags <span class="counter blank">0</span></a></li>
    </ul>
  </span>

  <div class="tabnav-widget scope">


    <div class="select-menu js-menu-container js-select-menu js-branch-menu">
      <a class="minibutton select-menu-button js-menu-target" data-hotkey="w" data-ref="master">
        <span class="octicon octicon-git-branch"></span>
        <i>branch:</i>
        <span class="js-select-button">master</span>
      </a>

      <div class="select-menu-modal-holder js-menu-content js-navigation-container">

        <div class="select-menu-modal">
          <div class="select-menu-header">
            <span class="select-menu-title">Switch branches/tags</span>
            <span class="octicon octicon-remove-close js-menu-close"></span>
          </div> <!-- /.select-menu-header -->

          <div class="select-menu-filters">
            <div class="select-menu-text-filter">
              <input type="text" id="commitish-filter-field" class="js-filterable-field js-navigation-enable" placeholder="Filter branches/tags">
            </div>
            <div class="select-menu-tabs">
              <ul>
                <li class="select-menu-tab">
                  <a href="#" data-tab-filter="branches" class="js-select-menu-tab">Branches</a>
                </li>
                <li class="select-menu-tab">
                  <a href="#" data-tab-filter="tags" class="js-select-menu-tab">Tags</a>
                </li>
              </ul>
            </div><!-- /.select-menu-tabs -->
          </div><!-- /.select-menu-filters -->

          <div class="select-menu-list select-menu-tab-bucket js-select-menu-tab-bucket css-truncate" data-tab-filter="branches">

            <div data-filterable-for="commitish-filter-field" data-filterable-type="substring">

                <div class="select-menu-item js-navigation-item ">
                  <span class="select-menu-item-icon octicon octicon-check"></span>
                  <a href="/wakuworks/jquery.belatedPNG/blob/develop/js/jquery.belatedPNG.js" class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target" data-name="develop" rel="nofollow" title="develop">develop</a>
                </div> <!-- /.select-menu-item -->
                <div class="select-menu-item js-navigation-item selected">
                  <span class="select-menu-item-icon octicon octicon-check"></span>
                  <a href="/wakuworks/jquery.belatedPNG/blob/master/js/jquery.belatedPNG.js" class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target" data-name="master" rel="nofollow" title="master">master</a>
                </div> <!-- /.select-menu-item -->
            </div>

              <div class="select-menu-no-results">Nothing to show</div>
          </div> <!-- /.select-menu-list -->


          <div class="select-menu-list select-menu-tab-bucket js-select-menu-tab-bucket css-truncate" data-tab-filter="tags">
            <div data-filterable-for="commitish-filter-field" data-filterable-type="substring">

            </div>

            <div class="select-menu-no-results">Nothing to show</div>

          </div> <!-- /.select-menu-list -->

        </div> <!-- /.select-menu-modal -->
      </div> <!-- /.select-menu-modal-holder -->
    </div> <!-- /.select-menu -->

  </div> <!-- /.scope -->

  <ul class="tabnav-tabs">
    <li><a href="/wakuworks/jquery.belatedPNG" class="selected js-selected-navigation-item tabnav-tab" data-selected-links="repo_source /wakuworks/jquery.belatedPNG">Files</a></li>
    <li><a href="/wakuworks/jquery.belatedPNG/commits/master" class="js-selected-navigation-item tabnav-tab" data-selected-links="repo_commits /wakuworks/jquery.belatedPNG/commits/master">Commits</a></li>
    <li><a href="/wakuworks/jquery.belatedPNG/branches" class="js-selected-navigation-item tabnav-tab" data-selected-links="repo_branches /wakuworks/jquery.belatedPNG/branches" rel="nofollow">Branches <span class="counter ">2</span></a></li>
  </ul>

</div>

  
  
  


            
          </div>
        </div><!-- /.repohead -->

        <div id="js-repo-pjax-container" class="container context-loader-container" data-pjax-container>
          


<!-- blob contrib key: blob_contributors:v21:a43657f2071aae63367b86490aafc3a6 -->
<!-- blob contrib frag key: views10/v8/blob_contributors:v21:a43657f2071aae63367b86490aafc3a6 -->


<div id="slider">
    <div class="frame-meta">

      <p title="This is a placeholder element" class="js-history-link-replace hidden"></p>

        <div class="breadcrumb">
          <span class='bold'><span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="/wakuworks/jquery.belatedPNG" class="js-slide-to" data-branch="master" data-direction="back" itemscope="url"><span itemprop="title">jquery.belatedPNG</span></a></span></span><span class="separator"> / </span><span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="/wakuworks/jquery.belatedPNG/tree/master/js" class="js-slide-to" data-branch="master" data-direction="back" itemscope="url"><span itemprop="title">js</span></a></span><span class="separator"> / </span><strong class="final-path">jquery.belatedPNG.js</strong> <span class="js-zeroclipboard zeroclipboard-button" data-clipboard-text="js/jquery.belatedPNG.js" data-copied-hint="copied!" title="copy to clipboard"><span class="octicon octicon-clippy"></span></span>
        </div>

      <a href="/wakuworks/jquery.belatedPNG/find/master" class="js-slide-to" data-hotkey="t" style="display:none">Show File Finder</a>


        
  <div class="commit file-history-tease">
    <img class="main-avatar" height="24" src="https://secure.gravatar.com/avatar/6f3e04d53396393a150a32f5c0ffedd4?s=140&amp;d=https://a248.e.akamai.net/assets.github.com%2Fimages%2Fgravatars%2Fgravatar-user-420.png" width="24" />
    <span class="author"><a href="/wakuworks" rel="author">wakuworks</a></span>
    <time class="js-relative-date" datetime="2011-05-24T03:17:03-07:00" title="2011-05-24 03:17:03">May 24, 2011</time>
    <div class="commit-title">
        <a href="/wakuworks/jquery.belatedPNG/commit/4581c4548ae0fcea72c773455fc358f94fe948ec" class="message"> jQuery 1.6 以上 + IE8 で jQuery.support.style が正しく評価されないバグの対処</a>
    </div>

    <div class="participation">
      <p class="quickstat"><a href="#blob_contributors_box" rel="facebox"><strong>1</strong> contributor</a></p>
      
    </div>
    <div id="blob_contributors_box" style="display:none">
      <h2>Users on GitHub who have contributed to this file</h2>
      <ul class="facebox-user-list">
        <li>
          <img height="24" src="https://secure.gravatar.com/avatar/6f3e04d53396393a150a32f5c0ffedd4?s=140&amp;d=https://a248.e.akamai.net/assets.github.com%2Fimages%2Fgravatars%2Fgravatar-user-420.png" width="24" />
          <a href="/wakuworks">wakuworks</a>
        </li>
      </ul>
    </div>
  </div>


    </div><!-- ./.frame-meta -->

    <div class="frames">
      <div class="frame" data-permalink-url="/wakuworks/jquery.belatedPNG/blob/3bd742683d14b8aaacb63f751cb4413009da239e/js/jquery.belatedPNG.js" data-title="jquery.belatedPNG/js/jquery.belatedPNG.js at master · wakuworks/jquery.belatedPNG · GitHub" data-type="blob">

        <div id="files" class="bubble">
          <div class="file">
            <div class="meta">
              <div class="info">
                <span class="icon"><b class="octicon octicon-file-text"></b></span>
                <span class="mode" title="File Mode">executable file</span>
                  <span>395 lines (391 sloc)</span>
                <span>11.809 kb</span>
              </div>
              <div class="actions">
                <div class="button-group">
                      <a class="minibutton js-entice" href=""
                         data-entice="You must be signed in and on a branch to make or propose changes">Edit</a>
                  <a href="/wakuworks/jquery.belatedPNG/raw/master/js/jquery.belatedPNG.js" class="button minibutton " id="raw-url">Raw</a>
                    <a href="/wakuworks/jquery.belatedPNG/blame/master/js/jquery.belatedPNG.js" class="button minibutton ">Blame</a>
                  <a href="/wakuworks/jquery.belatedPNG/commits/master/js/jquery.belatedPNG.js" class="button minibutton " rel="nofollow">History</a>
                </div><!-- /.button-group -->
              </div><!-- /.actions -->

            </div>
                <div class="blob-wrapper data type-javascript js-blob-data">
      <table class="file-code file-diff">
        <tr class="file-code-line">
          <td class="blob-line-nums">
            <span id="L1" rel="#L1">1</span>
<span id="L2" rel="#L2">2</span>
<span id="L3" rel="#L3">3</span>
<span id="L4" rel="#L4">4</span>
<span id="L5" rel="#L5">5</span>
<span id="L6" rel="#L6">6</span>
<span id="L7" rel="#L7">7</span>
<span id="L8" rel="#L8">8</span>
<span id="L9" rel="#L9">9</span>
<span id="L10" rel="#L10">10</span>
<span id="L11" rel="#L11">11</span>
<span id="L12" rel="#L12">12</span>
<span id="L13" rel="#L13">13</span>
<span id="L14" rel="#L14">14</span>
<span id="L15" rel="#L15">15</span>
<span id="L16" rel="#L16">16</span>
<span id="L17" rel="#L17">17</span>
<span id="L18" rel="#L18">18</span>
<span id="L19" rel="#L19">19</span>
<span id="L20" rel="#L20">20</span>
<span id="L21" rel="#L21">21</span>
<span id="L22" rel="#L22">22</span>
<span id="L23" rel="#L23">23</span>
<span id="L24" rel="#L24">24</span>
<span id="L25" rel="#L25">25</span>
<span id="L26" rel="#L26">26</span>
<span id="L27" rel="#L27">27</span>
<span id="L28" rel="#L28">28</span>
<span id="L29" rel="#L29">29</span>
<span id="L30" rel="#L30">30</span>
<span id="L31" rel="#L31">31</span>
<span id="L32" rel="#L32">32</span>
<span id="L33" rel="#L33">33</span>
<span id="L34" rel="#L34">34</span>
<span id="L35" rel="#L35">35</span>
<span id="L36" rel="#L36">36</span>
<span id="L37" rel="#L37">37</span>
<span id="L38" rel="#L38">38</span>
<span id="L39" rel="#L39">39</span>
<span id="L40" rel="#L40">40</span>
<span id="L41" rel="#L41">41</span>
<span id="L42" rel="#L42">42</span>
<span id="L43" rel="#L43">43</span>
<span id="L44" rel="#L44">44</span>
<span id="L45" rel="#L45">45</span>
<span id="L46" rel="#L46">46</span>
<span id="L47" rel="#L47">47</span>
<span id="L48" rel="#L48">48</span>
<span id="L49" rel="#L49">49</span>
<span id="L50" rel="#L50">50</span>
<span id="L51" rel="#L51">51</span>
<span id="L52" rel="#L52">52</span>
<span id="L53" rel="#L53">53</span>
<span id="L54" rel="#L54">54</span>
<span id="L55" rel="#L55">55</span>
<span id="L56" rel="#L56">56</span>
<span id="L57" rel="#L57">57</span>
<span id="L58" rel="#L58">58</span>
<span id="L59" rel="#L59">59</span>
<span id="L60" rel="#L60">60</span>
<span id="L61" rel="#L61">61</span>
<span id="L62" rel="#L62">62</span>
<span id="L63" rel="#L63">63</span>
<span id="L64" rel="#L64">64</span>
<span id="L65" rel="#L65">65</span>
<span id="L66" rel="#L66">66</span>
<span id="L67" rel="#L67">67</span>
<span id="L68" rel="#L68">68</span>
<span id="L69" rel="#L69">69</span>
<span id="L70" rel="#L70">70</span>
<span id="L71" rel="#L71">71</span>
<span id="L72" rel="#L72">72</span>
<span id="L73" rel="#L73">73</span>
<span id="L74" rel="#L74">74</span>
<span id="L75" rel="#L75">75</span>
<span id="L76" rel="#L76">76</span>
<span id="L77" rel="#L77">77</span>
<span id="L78" rel="#L78">78</span>
<span id="L79" rel="#L79">79</span>
<span id="L80" rel="#L80">80</span>
<span id="L81" rel="#L81">81</span>
<span id="L82" rel="#L82">82</span>
<span id="L83" rel="#L83">83</span>
<span id="L84" rel="#L84">84</span>
<span id="L85" rel="#L85">85</span>
<span id="L86" rel="#L86">86</span>
<span id="L87" rel="#L87">87</span>
<span id="L88" rel="#L88">88</span>
<span id="L89" rel="#L89">89</span>
<span id="L90" rel="#L90">90</span>
<span id="L91" rel="#L91">91</span>
<span id="L92" rel="#L92">92</span>
<span id="L93" rel="#L93">93</span>
<span id="L94" rel="#L94">94</span>
<span id="L95" rel="#L95">95</span>
<span id="L96" rel="#L96">96</span>
<span id="L97" rel="#L97">97</span>
<span id="L98" rel="#L98">98</span>
<span id="L99" rel="#L99">99</span>
<span id="L100" rel="#L100">100</span>
<span id="L101" rel="#L101">101</span>
<span id="L102" rel="#L102">102</span>
<span id="L103" rel="#L103">103</span>
<span id="L104" rel="#L104">104</span>
<span id="L105" rel="#L105">105</span>
<span id="L106" rel="#L106">106</span>
<span id="L107" rel="#L107">107</span>
<span id="L108" rel="#L108">108</span>
<span id="L109" rel="#L109">109</span>
<span id="L110" rel="#L110">110</span>
<span id="L111" rel="#L111">111</span>
<span id="L112" rel="#L112">112</span>
<span id="L113" rel="#L113">113</span>
<span id="L114" rel="#L114">114</span>
<span id="L115" rel="#L115">115</span>
<span id="L116" rel="#L116">116</span>
<span id="L117" rel="#L117">117</span>
<span id="L118" rel="#L118">118</span>
<span id="L119" rel="#L119">119</span>
<span id="L120" rel="#L120">120</span>
<span id="L121" rel="#L121">121</span>
<span id="L122" rel="#L122">122</span>
<span id="L123" rel="#L123">123</span>
<span id="L124" rel="#L124">124</span>
<span id="L125" rel="#L125">125</span>
<span id="L126" rel="#L126">126</span>
<span id="L127" rel="#L127">127</span>
<span id="L128" rel="#L128">128</span>
<span id="L129" rel="#L129">129</span>
<span id="L130" rel="#L130">130</span>
<span id="L131" rel="#L131">131</span>
<span id="L132" rel="#L132">132</span>
<span id="L133" rel="#L133">133</span>
<span id="L134" rel="#L134">134</span>
<span id="L135" rel="#L135">135</span>
<span id="L136" rel="#L136">136</span>
<span id="L137" rel="#L137">137</span>
<span id="L138" rel="#L138">138</span>
<span id="L139" rel="#L139">139</span>
<span id="L140" rel="#L140">140</span>
<span id="L141" rel="#L141">141</span>
<span id="L142" rel="#L142">142</span>
<span id="L143" rel="#L143">143</span>
<span id="L144" rel="#L144">144</span>
<span id="L145" rel="#L145">145</span>
<span id="L146" rel="#L146">146</span>
<span id="L147" rel="#L147">147</span>
<span id="L148" rel="#L148">148</span>
<span id="L149" rel="#L149">149</span>
<span id="L150" rel="#L150">150</span>
<span id="L151" rel="#L151">151</span>
<span id="L152" rel="#L152">152</span>
<span id="L153" rel="#L153">153</span>
<span id="L154" rel="#L154">154</span>
<span id="L155" rel="#L155">155</span>
<span id="L156" rel="#L156">156</span>
<span id="L157" rel="#L157">157</span>
<span id="L158" rel="#L158">158</span>
<span id="L159" rel="#L159">159</span>
<span id="L160" rel="#L160">160</span>
<span id="L161" rel="#L161">161</span>
<span id="L162" rel="#L162">162</span>
<span id="L163" rel="#L163">163</span>
<span id="L164" rel="#L164">164</span>
<span id="L165" rel="#L165">165</span>
<span id="L166" rel="#L166">166</span>
<span id="L167" rel="#L167">167</span>
<span id="L168" rel="#L168">168</span>
<span id="L169" rel="#L169">169</span>
<span id="L170" rel="#L170">170</span>
<span id="L171" rel="#L171">171</span>
<span id="L172" rel="#L172">172</span>
<span id="L173" rel="#L173">173</span>
<span id="L174" rel="#L174">174</span>
<span id="L175" rel="#L175">175</span>
<span id="L176" rel="#L176">176</span>
<span id="L177" rel="#L177">177</span>
<span id="L178" rel="#L178">178</span>
<span id="L179" rel="#L179">179</span>
<span id="L180" rel="#L180">180</span>
<span id="L181" rel="#L181">181</span>
<span id="L182" rel="#L182">182</span>
<span id="L183" rel="#L183">183</span>
<span id="L184" rel="#L184">184</span>
<span id="L185" rel="#L185">185</span>
<span id="L186" rel="#L186">186</span>
<span id="L187" rel="#L187">187</span>
<span id="L188" rel="#L188">188</span>
<span id="L189" rel="#L189">189</span>
<span id="L190" rel="#L190">190</span>
<span id="L191" rel="#L191">191</span>
<span id="L192" rel="#L192">192</span>
<span id="L193" rel="#L193">193</span>
<span id="L194" rel="#L194">194</span>
<span id="L195" rel="#L195">195</span>
<span id="L196" rel="#L196">196</span>
<span id="L197" rel="#L197">197</span>
<span id="L198" rel="#L198">198</span>
<span id="L199" rel="#L199">199</span>
<span id="L200" rel="#L200">200</span>
<span id="L201" rel="#L201">201</span>
<span id="L202" rel="#L202">202</span>
<span id="L203" rel="#L203">203</span>
<span id="L204" rel="#L204">204</span>
<span id="L205" rel="#L205">205</span>
<span id="L206" rel="#L206">206</span>
<span id="L207" rel="#L207">207</span>
<span id="L208" rel="#L208">208</span>
<span id="L209" rel="#L209">209</span>
<span id="L210" rel="#L210">210</span>
<span id="L211" rel="#L211">211</span>
<span id="L212" rel="#L212">212</span>
<span id="L213" rel="#L213">213</span>
<span id="L214" rel="#L214">214</span>
<span id="L215" rel="#L215">215</span>
<span id="L216" rel="#L216">216</span>
<span id="L217" rel="#L217">217</span>
<span id="L218" rel="#L218">218</span>
<span id="L219" rel="#L219">219</span>
<span id="L220" rel="#L220">220</span>
<span id="L221" rel="#L221">221</span>
<span id="L222" rel="#L222">222</span>
<span id="L223" rel="#L223">223</span>
<span id="L224" rel="#L224">224</span>
<span id="L225" rel="#L225">225</span>
<span id="L226" rel="#L226">226</span>
<span id="L227" rel="#L227">227</span>
<span id="L228" rel="#L228">228</span>
<span id="L229" rel="#L229">229</span>
<span id="L230" rel="#L230">230</span>
<span id="L231" rel="#L231">231</span>
<span id="L232" rel="#L232">232</span>
<span id="L233" rel="#L233">233</span>
<span id="L234" rel="#L234">234</span>
<span id="L235" rel="#L235">235</span>
<span id="L236" rel="#L236">236</span>
<span id="L237" rel="#L237">237</span>
<span id="L238" rel="#L238">238</span>
<span id="L239" rel="#L239">239</span>
<span id="L240" rel="#L240">240</span>
<span id="L241" rel="#L241">241</span>
<span id="L242" rel="#L242">242</span>
<span id="L243" rel="#L243">243</span>
<span id="L244" rel="#L244">244</span>
<span id="L245" rel="#L245">245</span>
<span id="L246" rel="#L246">246</span>
<span id="L247" rel="#L247">247</span>
<span id="L248" rel="#L248">248</span>
<span id="L249" rel="#L249">249</span>
<span id="L250" rel="#L250">250</span>
<span id="L251" rel="#L251">251</span>
<span id="L252" rel="#L252">252</span>
<span id="L253" rel="#L253">253</span>
<span id="L254" rel="#L254">254</span>
<span id="L255" rel="#L255">255</span>
<span id="L256" rel="#L256">256</span>
<span id="L257" rel="#L257">257</span>
<span id="L258" rel="#L258">258</span>
<span id="L259" rel="#L259">259</span>
<span id="L260" rel="#L260">260</span>
<span id="L261" rel="#L261">261</span>
<span id="L262" rel="#L262">262</span>
<span id="L263" rel="#L263">263</span>
<span id="L264" rel="#L264">264</span>
<span id="L265" rel="#L265">265</span>
<span id="L266" rel="#L266">266</span>
<span id="L267" rel="#L267">267</span>
<span id="L268" rel="#L268">268</span>
<span id="L269" rel="#L269">269</span>
<span id="L270" rel="#L270">270</span>
<span id="L271" rel="#L271">271</span>
<span id="L272" rel="#L272">272</span>
<span id="L273" rel="#L273">273</span>
<span id="L274" rel="#L274">274</span>
<span id="L275" rel="#L275">275</span>
<span id="L276" rel="#L276">276</span>
<span id="L277" rel="#L277">277</span>
<span id="L278" rel="#L278">278</span>
<span id="L279" rel="#L279">279</span>
<span id="L280" rel="#L280">280</span>
<span id="L281" rel="#L281">281</span>
<span id="L282" rel="#L282">282</span>
<span id="L283" rel="#L283">283</span>
<span id="L284" rel="#L284">284</span>
<span id="L285" rel="#L285">285</span>
<span id="L286" rel="#L286">286</span>
<span id="L287" rel="#L287">287</span>
<span id="L288" rel="#L288">288</span>
<span id="L289" rel="#L289">289</span>
<span id="L290" rel="#L290">290</span>
<span id="L291" rel="#L291">291</span>
<span id="L292" rel="#L292">292</span>
<span id="L293" rel="#L293">293</span>
<span id="L294" rel="#L294">294</span>
<span id="L295" rel="#L295">295</span>
<span id="L296" rel="#L296">296</span>
<span id="L297" rel="#L297">297</span>
<span id="L298" rel="#L298">298</span>
<span id="L299" rel="#L299">299</span>
<span id="L300" rel="#L300">300</span>
<span id="L301" rel="#L301">301</span>
<span id="L302" rel="#L302">302</span>
<span id="L303" rel="#L303">303</span>
<span id="L304" rel="#L304">304</span>
<span id="L305" rel="#L305">305</span>
<span id="L306" rel="#L306">306</span>
<span id="L307" rel="#L307">307</span>
<span id="L308" rel="#L308">308</span>
<span id="L309" rel="#L309">309</span>
<span id="L310" rel="#L310">310</span>
<span id="L311" rel="#L311">311</span>
<span id="L312" rel="#L312">312</span>
<span id="L313" rel="#L313">313</span>
<span id="L314" rel="#L314">314</span>
<span id="L315" rel="#L315">315</span>
<span id="L316" rel="#L316">316</span>
<span id="L317" rel="#L317">317</span>
<span id="L318" rel="#L318">318</span>
<span id="L319" rel="#L319">319</span>
<span id="L320" rel="#L320">320</span>
<span id="L321" rel="#L321">321</span>
<span id="L322" rel="#L322">322</span>
<span id="L323" rel="#L323">323</span>
<span id="L324" rel="#L324">324</span>
<span id="L325" rel="#L325">325</span>
<span id="L326" rel="#L326">326</span>
<span id="L327" rel="#L327">327</span>
<span id="L328" rel="#L328">328</span>
<span id="L329" rel="#L329">329</span>
<span id="L330" rel="#L330">330</span>
<span id="L331" rel="#L331">331</span>
<span id="L332" rel="#L332">332</span>
<span id="L333" rel="#L333">333</span>
<span id="L334" rel="#L334">334</span>
<span id="L335" rel="#L335">335</span>
<span id="L336" rel="#L336">336</span>
<span id="L337" rel="#L337">337</span>
<span id="L338" rel="#L338">338</span>
<span id="L339" rel="#L339">339</span>
<span id="L340" rel="#L340">340</span>
<span id="L341" rel="#L341">341</span>
<span id="L342" rel="#L342">342</span>
<span id="L343" rel="#L343">343</span>
<span id="L344" rel="#L344">344</span>
<span id="L345" rel="#L345">345</span>
<span id="L346" rel="#L346">346</span>
<span id="L347" rel="#L347">347</span>
<span id="L348" rel="#L348">348</span>
<span id="L349" rel="#L349">349</span>
<span id="L350" rel="#L350">350</span>
<span id="L351" rel="#L351">351</span>
<span id="L352" rel="#L352">352</span>
<span id="L353" rel="#L353">353</span>
<span id="L354" rel="#L354">354</span>
<span id="L355" rel="#L355">355</span>
<span id="L356" rel="#L356">356</span>
<span id="L357" rel="#L357">357</span>
<span id="L358" rel="#L358">358</span>
<span id="L359" rel="#L359">359</span>
<span id="L360" rel="#L360">360</span>
<span id="L361" rel="#L361">361</span>
<span id="L362" rel="#L362">362</span>
<span id="L363" rel="#L363">363</span>
<span id="L364" rel="#L364">364</span>
<span id="L365" rel="#L365">365</span>
<span id="L366" rel="#L366">366</span>
<span id="L367" rel="#L367">367</span>
<span id="L368" rel="#L368">368</span>
<span id="L369" rel="#L369">369</span>
<span id="L370" rel="#L370">370</span>
<span id="L371" rel="#L371">371</span>
<span id="L372" rel="#L372">372</span>
<span id="L373" rel="#L373">373</span>
<span id="L374" rel="#L374">374</span>
<span id="L375" rel="#L375">375</span>
<span id="L376" rel="#L376">376</span>
<span id="L377" rel="#L377">377</span>
<span id="L378" rel="#L378">378</span>
<span id="L379" rel="#L379">379</span>
<span id="L380" rel="#L380">380</span>
<span id="L381" rel="#L381">381</span>
<span id="L382" rel="#L382">382</span>
<span id="L383" rel="#L383">383</span>
<span id="L384" rel="#L384">384</span>
<span id="L385" rel="#L385">385</span>
<span id="L386" rel="#L386">386</span>
<span id="L387" rel="#L387">387</span>
<span id="L388" rel="#L388">388</span>
<span id="L389" rel="#L389">389</span>
<span id="L390" rel="#L390">390</span>
<span id="L391" rel="#L391">391</span>
<span id="L392" rel="#L392">392</span>
<span id="L393" rel="#L393">393</span>
<span id="L394" rel="#L394">394</span>
<span id="L395" rel="#L395">395</span>

          </td>
          <td class="blob-line-code">
                  <div class="highlight"><pre><div class='line' id='LC1'><span class="cm">/**</span></div><div class='line' id='LC2'><span class="cm">* DD_belatedPNG: Adds IE6 support: PNG images for CSS background-image and HTML &lt;IMG/&gt;.</span></div><div class='line' id='LC3'><span class="cm">* Author: Drew Diller</span></div><div class='line' id='LC4'><span class="cm">* Email: drew.diller@gmail.com</span></div><div class='line' id='LC5'><span class="cm">* URL: http://www.dillerdesign.com/experiment/DD_belatedPNG/</span></div><div class='line' id='LC6'><span class="cm">* Version: 0.0.8a</span></div><div class='line' id='LC7'><span class="cm">* Licensed under the MIT License: http://dillerdesign.com/experiment/DD_belatedPNG/#license</span></div><div class='line' id='LC8'><span class="cm">*</span></div><div class='line' id='LC9'><span class="cm">* Example usage:</span></div><div class='line' id='LC10'><span class="cm">* DD_belatedPNG.fix(&#39;.png_bg&#39;); // argument is a CSS selector</span></div><div class='line' id='LC11'><span class="cm">* DD_belatedPNG.fixPng( someNode ); // argument is an HTMLDomElement</span></div><div class='line' id='LC12'><span class="cm">**/</span></div><div class='line' id='LC13'><br/></div><div class='line' id='LC14'><span class="cm">/*</span></div><div class='line' id='LC15'><span class="cm">PLEASE READ:</span></div><div class='line' id='LC16'><span class="cm">Absolutely everything in this script is SILLY.  I know this.  IE&#39;s rendering of certain pixels doesn&#39;t make sense, so neither does this code!</span></div><div class='line' id='LC17'><span class="cm">*/</span></div><div class='line' id='LC18'><br/></div><div class='line' id='LC19'><span class="cm">/**</span></div><div class='line' id='LC20'><span class="cm">* jquery.belatedPNG: Adds IE6/7/8 support: PNG images for CSS background-image and HTML &lt;IMG/&gt;.</span></div><div class='line' id='LC21'><span class="cm">* Author: Kazunori Ninomiya</span></div><div class='line' id='LC22'><span class="cm">* Email: Kazunori.Ninomiya@gmail.com</span></div><div class='line' id='LC23'><span class="cm">* Version: 0.0.4</span></div><div class='line' id='LC24'><span class="cm">* Licensed under the MIT License: http://dillerdesign.com/experiment/DD_belatedPNG/#license</span></div><div class='line' id='LC25'><span class="cm">*</span></div><div class='line' id='LC26'><span class="cm">* Example usage:</span></div><div class='line' id='LC27'><span class="cm">* $(&#39;.png_bg&#39;).fixPng();</span></div><div class='line' id='LC28'><span class="cm">**/</span></div><div class='line' id='LC29'><br/></div><div class='line' id='LC30'><span class="p">(</span><span class="kd">function</span><span class="p">(</span><span class="nx">$</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC31'>	<span class="kd">var</span> <span class="nx">doc</span> <span class="o">=</span> <span class="nb">document</span><span class="p">;</span></div><div class='line' id='LC32'>	<span class="kd">var</span> <span class="nx">DD_belatedPNG</span> <span class="o">=</span> <span class="p">{</span></div><div class='line' id='LC33'>		<span class="nx">ns</span><span class="o">:</span> <span class="s1">&#39;DD_belatedPNG&#39;</span><span class="p">,</span></div><div class='line' id='LC34'>		<span class="nx">imgSize</span><span class="o">:</span> <span class="p">{},</span></div><div class='line' id='LC35'>		<span class="nx">delay</span><span class="o">:</span> <span class="mi">10</span><span class="p">,</span></div><div class='line' id='LC36'>		<span class="nx">nodesFixed</span><span class="o">:</span> <span class="mi">0</span><span class="p">,</span></div><div class='line' id='LC37'>		<span class="nx">createVmlNameSpace</span><span class="o">:</span> <span class="kd">function</span> <span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC38'>			<span class="k">if</span> <span class="p">(</span><span class="nx">doc</span><span class="p">.</span><span class="nx">namespaces</span> <span class="o">&amp;&amp;</span> <span class="o">!</span><span class="nx">doc</span><span class="p">.</span><span class="nx">namespaces</span><span class="p">[</span><span class="k">this</span><span class="p">.</span><span class="nx">ns</span><span class="p">])</span> <span class="p">{</span></div><div class='line' id='LC39'>				<span class="nx">doc</span><span class="p">.</span><span class="nx">namespaces</span><span class="p">.</span><span class="nx">add</span><span class="p">(</span><span class="k">this</span><span class="p">.</span><span class="nx">ns</span><span class="p">,</span> <span class="s1">&#39;urn:schemas-microsoft-com:vml&#39;</span><span class="p">);</span></div><div class='line' id='LC40'>			<span class="p">}</span></div><div class='line' id='LC41'>		<span class="p">},</span></div><div class='line' id='LC42'>		<span class="nx">createVmlStyleSheet</span><span class="o">:</span> <span class="kd">function</span> <span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC43'>			<span class="kd">var</span> <span class="nx">screenStyleSheet</span><span class="p">,</span> <span class="nx">printStyleSheet</span><span class="p">;</span></div><div class='line' id='LC44'>			<span class="nx">screenStyleSheet</span> <span class="o">=</span> <span class="nx">doc</span><span class="p">.</span><span class="nx">createElement</span><span class="p">(</span><span class="s1">&#39;style&#39;</span><span class="p">);</span></div><div class='line' id='LC45'>			<span class="nx">screenStyleSheet</span><span class="p">.</span><span class="nx">setAttribute</span><span class="p">(</span><span class="s1">&#39;media&#39;</span><span class="p">,</span> <span class="s1">&#39;screen&#39;</span><span class="p">);</span></div><div class='line' id='LC46'>			<span class="nx">doc</span><span class="p">.</span><span class="nx">documentElement</span><span class="p">.</span><span class="nx">firstChild</span><span class="p">.</span><span class="nx">insertBefore</span><span class="p">(</span><span class="nx">screenStyleSheet</span><span class="p">,</span> <span class="nx">doc</span><span class="p">.</span><span class="nx">documentElement</span><span class="p">.</span><span class="nx">firstChild</span><span class="p">.</span><span class="nx">firstChild</span><span class="p">);</span></div><div class='line' id='LC47'>			<span class="k">if</span> <span class="p">(</span><span class="nx">screenStyleSheet</span><span class="p">.</span><span class="nx">styleSheet</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC48'>				<span class="kd">var</span> <span class="nx">selector</span> <span class="o">=</span> <span class="o">!</span><span class="nx">doc</span><span class="p">.</span><span class="nx">documentMode</span> <span class="o">||</span> <span class="nx">doc</span><span class="p">.</span><span class="nx">documentMode</span> <span class="o">&lt;</span> <span class="mi">8</span></div><div class='line' id='LC49'>					<span class="o">?</span> <span class="k">this</span><span class="p">.</span><span class="nx">ns</span> <span class="o">+</span> <span class="s1">&#39;\\:*&#39;</span> <span class="o">:</span> <span class="k">this</span><span class="p">.</span><span class="nx">ns</span> <span class="o">+</span> <span class="s1">&#39;\\:shape, &#39;</span> <span class="o">+</span> <span class="k">this</span><span class="p">.</span><span class="nx">ns</span> <span class="o">+</span> <span class="s1">&#39;\\:fill&#39;</span><span class="p">;</span></div><div class='line' id='LC50'>				<span class="nx">screenStyleSheet</span> <span class="o">=</span> <span class="nx">screenStyleSheet</span><span class="p">.</span><span class="nx">styleSheet</span><span class="p">;</span></div><div class='line' id='LC51'>				<span class="nx">screenStyleSheet</span><span class="p">.</span><span class="nx">addRule</span><span class="p">(</span><span class="nx">selector</span><span class="p">,</span> <span class="s1">&#39;behavior:url(#default#VML);&#39;</span><span class="p">);</span></div><div class='line' id='LC52'>				<span class="nx">screenStyleSheet</span><span class="p">.</span><span class="nx">addRule</span><span class="p">(</span><span class="k">this</span><span class="p">.</span><span class="nx">ns</span> <span class="o">+</span> <span class="s1">&#39;\\:shape&#39;</span><span class="p">,</span> <span class="s1">&#39;position:absolute;&#39;</span><span class="p">);</span></div><div class='line' id='LC53'>				<span class="nx">screenStyleSheet</span><span class="p">.</span><span class="nx">addRule</span><span class="p">(</span><span class="s1">&#39;img.&#39;</span> <span class="o">+</span> <span class="k">this</span><span class="p">.</span><span class="nx">ns</span> <span class="o">+</span> <span class="s1">&#39;_sizeFinder&#39;</span><span class="p">,</span> <span class="p">[</span></div><div class='line' id='LC54'>					<span class="s1">&#39;behavior:none&#39;</span><span class="p">,</span></div><div class='line' id='LC55'>					<span class="s1">&#39;border:none&#39;</span><span class="p">,</span></div><div class='line' id='LC56'>					<span class="s1">&#39;position:absolute&#39;</span><span class="p">,</span></div><div class='line' id='LC57'>					<span class="s1">&#39;z-index:-1&#39;</span><span class="p">,</span></div><div class='line' id='LC58'>					<span class="s1">&#39;top:-10000px&#39;</span><span class="p">,</span></div><div class='line' id='LC59'>					<span class="s1">&#39;visibility:hidden&#39;</span></div><div class='line' id='LC60'>				<span class="p">].</span><span class="nx">join</span><span class="p">(</span><span class="s1">&#39;;&#39;</span><span class="p">));</span></div><div class='line' id='LC61'>				<span class="k">this</span><span class="p">.</span><span class="nx">screenStyleSheet</span> <span class="o">=</span> <span class="nx">screenStyleSheet</span><span class="p">;</span></div><div class='line' id='LC62'>				<span class="nx">printStyleSheet</span> <span class="o">=</span> <span class="nx">doc</span><span class="p">.</span><span class="nx">createElement</span><span class="p">(</span><span class="s1">&#39;style&#39;</span><span class="p">);</span></div><div class='line' id='LC63'>				<span class="nx">printStyleSheet</span><span class="p">.</span><span class="nx">setAttribute</span><span class="p">(</span><span class="s1">&#39;media&#39;</span><span class="p">,</span> <span class="s1">&#39;print&#39;</span><span class="p">);</span></div><div class='line' id='LC64'>				<span class="nx">doc</span><span class="p">.</span><span class="nx">documentElement</span><span class="p">.</span><span class="nx">firstChild</span><span class="p">.</span><span class="nx">insertBefore</span><span class="p">(</span><span class="nx">printStyleSheet</span><span class="p">,</span> <span class="nx">doc</span><span class="p">.</span><span class="nx">documentElement</span><span class="p">.</span><span class="nx">firstChild</span><span class="p">.</span><span class="nx">firstChild</span><span class="p">);</span></div><div class='line' id='LC65'>				<span class="nx">printStyleSheet</span> <span class="o">=</span> <span class="nx">printStyleSheet</span><span class="p">.</span><span class="nx">styleSheet</span><span class="p">;</span></div><div class='line' id='LC66'>				<span class="nx">printStyleSheet</span><span class="p">.</span><span class="nx">addRule</span><span class="p">(</span><span class="nx">selector</span><span class="p">,</span> <span class="s1">&#39;display: none !important;&#39;</span><span class="p">);</span></div><div class='line' id='LC67'>				<span class="nx">printStyleSheet</span><span class="p">.</span><span class="nx">addRule</span><span class="p">(</span><span class="s1">&#39;img.&#39;</span> <span class="o">+</span> <span class="k">this</span><span class="p">.</span><span class="nx">ns</span> <span class="o">+</span> <span class="s1">&#39;_sizeFinder&#39;</span><span class="p">,</span> <span class="s1">&#39;display: none !important;&#39;</span><span class="p">);</span></div><div class='line' id='LC68'>			<span class="p">}</span></div><div class='line' id='LC69'>		<span class="p">},</span></div><div class='line' id='LC70'>		<span class="nx">readPropertyChange</span><span class="o">:</span> <span class="kd">function</span> <span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC71'>			<span class="kd">var</span> <span class="nx">el</span><span class="p">,</span> <span class="nx">display</span><span class="p">,</span> <span class="nx">v</span><span class="p">;</span></div><div class='line' id='LC72'>			<span class="nx">el</span> <span class="o">=</span> <span class="nx">event</span><span class="p">.</span><span class="nx">srcElement</span><span class="p">;</span></div><div class='line' id='LC73'>			<span class="k">if</span> <span class="p">(</span><span class="o">!</span><span class="nx">el</span><span class="p">.</span><span class="nx">vmlInitiated</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC74'>				<span class="k">return</span><span class="p">;</span></div><div class='line' id='LC75'>			<span class="p">}</span></div><div class='line' id='LC76'>			<span class="kd">var</span> <span class="nx">propName</span> <span class="o">=</span> <span class="nx">event</span><span class="p">.</span><span class="nx">propertyName</span><span class="p">;</span></div><div class='line' id='LC77'>			<span class="k">if</span> <span class="p">(</span><span class="nx">propName</span><span class="p">.</span><span class="nx">search</span><span class="p">(</span><span class="s1">&#39;background&#39;</span><span class="p">)</span> <span class="o">!=</span> <span class="o">-</span><span class="mi">1</span> <span class="o">||</span> <span class="nx">propName</span><span class="p">.</span><span class="nx">search</span><span class="p">(</span><span class="s1">&#39;border&#39;</span><span class="p">)</span> <span class="o">!=</span> <span class="o">-</span><span class="mi">1</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC78'>				<span class="nx">DD_belatedPNG</span><span class="p">.</span><span class="nx">applyVML</span><span class="p">(</span><span class="nx">el</span><span class="p">);</span></div><div class='line' id='LC79'>			<span class="p">}</span></div><div class='line' id='LC80'>			<span class="k">if</span> <span class="p">(</span><span class="nx">propName</span> <span class="o">==</span> <span class="s1">&#39;style.display&#39;</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC81'>				<span class="nx">display</span> <span class="o">=</span> <span class="p">(</span><span class="nx">el</span><span class="p">.</span><span class="nx">currentStyle</span><span class="p">.</span><span class="nx">display</span> <span class="o">==</span> <span class="s1">&#39;none&#39;</span><span class="p">)</span> <span class="o">?</span> <span class="s1">&#39;none&#39;</span> <span class="o">:</span> <span class="s1">&#39;block&#39;</span><span class="p">;</span></div><div class='line' id='LC82'>				<span class="k">for</span> <span class="p">(</span><span class="nx">v</span> <span class="k">in</span> <span class="nx">el</span><span class="p">.</span><span class="nx">vml</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC83'>					<span class="k">if</span> <span class="p">(</span><span class="nx">el</span><span class="p">.</span><span class="nx">vml</span><span class="p">.</span><span class="nx">hasOwnProperty</span><span class="p">(</span><span class="nx">v</span><span class="p">))</span> <span class="p">{</span></div><div class='line' id='LC84'>						<span class="nx">el</span><span class="p">.</span><span class="nx">vml</span><span class="p">[</span><span class="nx">v</span><span class="p">].</span><span class="nx">shape</span><span class="p">.</span><span class="nx">style</span><span class="p">.</span><span class="nx">display</span> <span class="o">=</span> <span class="nx">display</span><span class="p">;</span></div><div class='line' id='LC85'>					<span class="p">}</span></div><div class='line' id='LC86'>				<span class="p">}</span></div><div class='line' id='LC87'>			<span class="p">}</span></div><div class='line' id='LC88'>			<span class="k">if</span> <span class="p">(</span><span class="nx">propName</span><span class="p">.</span><span class="nx">search</span><span class="p">(</span><span class="s1">&#39;filter&#39;</span><span class="p">)</span> <span class="o">!=</span> <span class="o">-</span><span class="mi">1</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC89'>				<span class="nx">DD_belatedPNG</span><span class="p">.</span><span class="nx">vmlOpacity</span><span class="p">(</span><span class="nx">el</span><span class="p">);</span></div><div class='line' id='LC90'>			<span class="p">}</span></div><div class='line' id='LC91'>		<span class="p">},</span></div><div class='line' id='LC92'>		<span class="nx">vmlOpacity</span><span class="o">:</span> <span class="kd">function</span> <span class="p">(</span><span class="nx">el</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC93'>			<span class="k">if</span> <span class="p">(</span><span class="nx">el</span><span class="p">.</span><span class="nx">currentStyle</span><span class="p">.</span><span class="nx">filter</span><span class="p">.</span><span class="nx">search</span><span class="p">(</span><span class="s1">&#39;lpha&#39;</span><span class="p">)</span> <span class="o">!=</span> <span class="o">-</span><span class="mi">1</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC94'>				<span class="kd">var</span> <span class="nx">trans</span> <span class="o">=</span> <span class="nx">el</span><span class="p">.</span><span class="nx">currentStyle</span><span class="p">.</span><span class="nx">filter</span><span class="p">;</span></div><div class='line' id='LC95'>				<span class="nx">trans</span> <span class="o">=</span> <span class="nb">parseInt</span><span class="p">(</span><span class="nx">trans</span><span class="p">.</span><span class="nx">substring</span><span class="p">(</span><span class="nx">trans</span><span class="p">.</span><span class="nx">lastIndexOf</span><span class="p">(</span><span class="s1">&#39;=&#39;</span><span class="p">)</span> <span class="o">+</span> <span class="mi">1</span><span class="p">,</span></div><div class='line' id='LC96'>												 <span class="nx">trans</span><span class="p">.</span><span class="nx">lastIndexOf</span><span class="p">(</span><span class="s1">&#39;)&#39;</span><span class="p">)),</span> <span class="mi">10</span><span class="p">)</span> <span class="o">/</span> <span class="mi">100</span><span class="p">;</span></div><div class='line' id='LC97'>				<span class="nx">el</span><span class="p">.</span><span class="nx">vml</span><span class="p">.</span><span class="nx">color</span><span class="p">.</span><span class="nx">shape</span><span class="p">.</span><span class="nx">style</span><span class="p">.</span><span class="nx">filter</span> <span class="o">=</span> <span class="nx">el</span><span class="p">.</span><span class="nx">currentStyle</span><span class="p">.</span><span class="nx">filter</span><span class="p">;</span></div><div class='line' id='LC98'>				<span class="nx">el</span><span class="p">.</span><span class="nx">vml</span><span class="p">.</span><span class="nx">image</span><span class="p">.</span><span class="nx">fill</span><span class="p">.</span><span class="nx">opacity</span> <span class="o">=</span> <span class="nx">trans</span><span class="p">;</span></div><div class='line' id='LC99'>			<span class="p">}</span></div><div class='line' id='LC100'>		<span class="p">},</span></div><div class='line' id='LC101'>		<span class="nx">handlePseudoHover</span><span class="o">:</span> <span class="kd">function</span> <span class="p">(</span><span class="nx">el</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC102'>			<span class="nx">setTimeout</span><span class="p">(</span><span class="kd">function</span> <span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC103'>				<span class="nx">DD_belatedPNG</span><span class="p">.</span><span class="nx">applyVML</span><span class="p">(</span><span class="nx">el</span><span class="p">);</span></div><div class='line' id='LC104'>			<span class="p">},</span> <span class="mi">1</span><span class="p">);</span></div><div class='line' id='LC105'>		<span class="p">},</span></div><div class='line' id='LC106'>		<span class="nx">applyVML</span><span class="o">:</span> <span class="kd">function</span> <span class="p">(</span><span class="nx">el</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC107'>			<span class="nx">el</span><span class="p">.</span><span class="nx">runtimeStyle</span><span class="p">.</span><span class="nx">cssText</span> <span class="o">=</span> <span class="s1">&#39;&#39;</span><span class="p">;</span></div><div class='line' id='LC108'>			<span class="k">this</span><span class="p">.</span><span class="nx">vmlFill</span><span class="p">(</span><span class="nx">el</span><span class="p">);</span></div><div class='line' id='LC109'>			<span class="k">this</span><span class="p">.</span><span class="nx">vmlOffsets</span><span class="p">(</span><span class="nx">el</span><span class="p">);</span></div><div class='line' id='LC110'>			<span class="k">this</span><span class="p">.</span><span class="nx">vmlOpacity</span><span class="p">(</span><span class="nx">el</span><span class="p">);</span></div><div class='line' id='LC111'>			<span class="k">if</span> <span class="p">(</span><span class="nx">el</span><span class="p">.</span><span class="nx">isImg</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC112'>				<span class="k">this</span><span class="p">.</span><span class="nx">copyImageBorders</span><span class="p">(</span><span class="nx">el</span><span class="p">);</span></div><div class='line' id='LC113'>			<span class="p">}</span></div><div class='line' id='LC114'>		<span class="p">},</span></div><div class='line' id='LC115'>		<span class="nx">attachHandlers</span><span class="o">:</span> <span class="kd">function</span> <span class="p">(</span><span class="nx">el</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC116'>			<span class="kd">var</span> <span class="nx">self</span><span class="p">,</span> <span class="nx">handlers</span><span class="p">,</span> <span class="nx">handler</span><span class="p">,</span> <span class="nx">moreForAs</span><span class="p">,</span> <span class="nx">a</span><span class="p">,</span> <span class="nx">h</span><span class="p">;</span></div><div class='line' id='LC117'>			<span class="nx">self</span> <span class="o">=</span> <span class="k">this</span><span class="p">;</span></div><div class='line' id='LC118'>			<span class="nx">handlers</span> <span class="o">=</span> <span class="p">{</span><span class="nx">resize</span><span class="o">:</span> <span class="s1">&#39;vmlOffsets&#39;</span><span class="p">,</span> <span class="nx">move</span><span class="o">:</span> <span class="s1">&#39;vmlOffsets&#39;</span><span class="p">};</span></div><div class='line' id='LC119'>			<span class="k">if</span> <span class="p">(</span><span class="nx">el</span><span class="p">.</span><span class="nx">nodeName</span> <span class="o">==</span> <span class="s1">&#39;A&#39;</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC120'>				<span class="nx">moreForAs</span> <span class="o">=</span> <span class="p">{</span></div><div class='line' id='LC121'>					<span class="nx">mouseleave</span><span class="o">:</span> <span class="s1">&#39;handlePseudoHover&#39;</span><span class="p">,</span></div><div class='line' id='LC122'>					<span class="nx">mouseenter</span><span class="o">:</span> <span class="s1">&#39;handlePseudoHover&#39;</span><span class="p">,</span></div><div class='line' id='LC123'>					<span class="nx">focus</span><span class="o">:</span> <span class="s1">&#39;handlePseudoHover&#39;</span><span class="p">,</span></div><div class='line' id='LC124'>					<span class="nx">blur</span><span class="o">:</span> <span class="s1">&#39;handlePseudoHover&#39;</span></div><div class='line' id='LC125'>				<span class="p">};</span></div><div class='line' id='LC126'>				<span class="k">for</span> <span class="p">(</span><span class="nx">a</span> <span class="k">in</span> <span class="nx">moreForAs</span><span class="p">)</span> <span class="p">{</span>			</div><div class='line' id='LC127'>					<span class="k">if</span> <span class="p">(</span><span class="nx">moreForAs</span><span class="p">.</span><span class="nx">hasOwnProperty</span><span class="p">(</span><span class="nx">a</span><span class="p">))</span> <span class="p">{</span></div><div class='line' id='LC128'>						<span class="nx">handlers</span><span class="p">[</span><span class="nx">a</span><span class="p">]</span> <span class="o">=</span> <span class="nx">moreForAs</span><span class="p">[</span><span class="nx">a</span><span class="p">];</span></div><div class='line' id='LC129'>					<span class="p">}</span></div><div class='line' id='LC130'>				<span class="p">}</span></div><div class='line' id='LC131'>			<span class="p">}</span></div><div class='line' id='LC132'>			<span class="k">for</span> <span class="p">(</span><span class="nx">h</span> <span class="k">in</span> <span class="nx">handlers</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC133'>				<span class="k">if</span> <span class="p">(</span><span class="nx">handlers</span><span class="p">.</span><span class="nx">hasOwnProperty</span><span class="p">(</span><span class="nx">h</span><span class="p">))</span> <span class="p">{</span></div><div class='line' id='LC134'>					<span class="nx">handler</span> <span class="o">=</span> <span class="kd">function</span> <span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC135'>						<span class="nx">self</span><span class="p">[</span><span class="nx">handlers</span><span class="p">[</span><span class="nx">h</span><span class="p">]](</span><span class="nx">el</span><span class="p">);</span></div><div class='line' id='LC136'>					<span class="p">};</span></div><div class='line' id='LC137'>					<span class="nx">el</span><span class="p">.</span><span class="nx">attachEvent</span><span class="p">(</span><span class="s1">&#39;on&#39;</span> <span class="o">+</span> <span class="nx">h</span><span class="p">,</span> <span class="nx">handler</span><span class="p">);</span></div><div class='line' id='LC138'>				<span class="p">}</span></div><div class='line' id='LC139'>			<span class="p">}</span></div><div class='line' id='LC140'>			<span class="nx">el</span><span class="p">.</span><span class="nx">attachEvent</span><span class="p">(</span><span class="s1">&#39;onpropertychange&#39;</span><span class="p">,</span> <span class="k">this</span><span class="p">.</span><span class="nx">readPropertyChange</span><span class="p">);</span></div><div class='line' id='LC141'>		<span class="p">},</span></div><div class='line' id='LC142'>		<span class="nx">giveLayout</span><span class="o">:</span> <span class="kd">function</span> <span class="p">(</span><span class="nx">el</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC143'>			<span class="nx">el</span><span class="p">.</span><span class="nx">style</span><span class="p">.</span><span class="nx">zoom</span> <span class="o">=</span> <span class="mi">1</span><span class="p">;</span></div><div class='line' id='LC144'>			<span class="k">if</span> <span class="p">(</span><span class="nx">el</span><span class="p">.</span><span class="nx">currentStyle</span><span class="p">.</span><span class="nx">position</span> <span class="o">==</span> <span class="s1">&#39;static&#39;</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC145'>				<span class="nx">el</span><span class="p">.</span><span class="nx">style</span><span class="p">.</span><span class="nx">position</span> <span class="o">=</span> <span class="s1">&#39;relative&#39;</span><span class="p">;</span></div><div class='line' id='LC146'>			<span class="p">}</span></div><div class='line' id='LC147'>		<span class="p">},</span></div><div class='line' id='LC148'>		<span class="nx">copyImageBorders</span><span class="o">:</span> <span class="kd">function</span> <span class="p">(</span><span class="nx">el</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC149'>			<span class="kd">var</span> <span class="nx">styles</span><span class="p">,</span> <span class="nx">s</span><span class="p">;</span></div><div class='line' id='LC150'>			<span class="nx">styles</span> <span class="o">=</span> <span class="p">{</span></div><div class='line' id='LC151'>				<span class="s1">&#39;borderStyle&#39;</span><span class="o">:</span> <span class="kc">true</span><span class="p">,</span></div><div class='line' id='LC152'>				<span class="s1">&#39;borderWidth&#39;</span><span class="o">:</span> <span class="kc">true</span><span class="p">,</span></div><div class='line' id='LC153'>				<span class="s1">&#39;borderColor&#39;</span><span class="o">:</span> <span class="kc">true</span></div><div class='line' id='LC154'>			<span class="p">};</span></div><div class='line' id='LC155'>			<span class="k">for</span> <span class="p">(</span><span class="nx">s</span> <span class="k">in</span> <span class="nx">styles</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC156'>				<span class="k">if</span> <span class="p">(</span><span class="nx">styles</span><span class="p">.</span><span class="nx">hasOwnProperty</span><span class="p">(</span><span class="nx">s</span><span class="p">))</span> <span class="p">{</span></div><div class='line' id='LC157'>					<span class="nx">el</span><span class="p">.</span><span class="nx">vml</span><span class="p">.</span><span class="nx">color</span><span class="p">.</span><span class="nx">shape</span><span class="p">.</span><span class="nx">style</span><span class="p">[</span><span class="nx">s</span><span class="p">]</span> <span class="o">=</span> <span class="nx">el</span><span class="p">.</span><span class="nx">currentStyle</span><span class="p">[</span><span class="nx">s</span><span class="p">];</span></div><div class='line' id='LC158'>				<span class="p">}</span></div><div class='line' id='LC159'>			<span class="p">}</span></div><div class='line' id='LC160'>		<span class="p">},</span></div><div class='line' id='LC161'>		<span class="nx">vmlFill</span><span class="o">:</span> <span class="kd">function</span> <span class="p">(</span><span class="nx">el</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC162'>			<span class="k">if</span> <span class="p">(</span><span class="o">!</span><span class="nx">el</span><span class="p">.</span><span class="nx">currentStyle</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC163'>				<span class="k">return</span><span class="p">;</span></div><div class='line' id='LC164'>			<span class="p">}</span></div><div class='line' id='LC165'>			<span class="k">else</span> <span class="p">{</span></div><div class='line' id='LC166'>				<span class="kd">var</span> <span class="nx">elStyle</span><span class="p">,</span> <span class="nx">noImg</span><span class="p">,</span> <span class="nx">lib</span><span class="p">,</span> <span class="nx">v</span><span class="p">,</span> <span class="nx">img</span><span class="p">,</span> <span class="nx">imgLoaded</span><span class="p">;</span></div><div class='line' id='LC167'>				<span class="nx">elStyle</span> <span class="o">=</span> <span class="nx">el</span><span class="p">.</span><span class="nx">currentStyle</span><span class="p">;</span></div><div class='line' id='LC168'>			<span class="p">}</span></div><div class='line' id='LC169'>			<span class="k">for</span> <span class="p">(</span><span class="nx">v</span> <span class="k">in</span> <span class="nx">el</span><span class="p">.</span><span class="nx">vml</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC170'>				<span class="k">if</span> <span class="p">(</span><span class="nx">el</span><span class="p">.</span><span class="nx">vml</span><span class="p">.</span><span class="nx">hasOwnProperty</span><span class="p">(</span><span class="nx">v</span><span class="p">))</span> <span class="p">{</span></div><div class='line' id='LC171'>					<span class="nx">el</span><span class="p">.</span><span class="nx">vml</span><span class="p">[</span><span class="nx">v</span><span class="p">].</span><span class="nx">shape</span><span class="p">.</span><span class="nx">style</span><span class="p">.</span><span class="nx">zIndex</span> <span class="o">=</span> <span class="nx">elStyle</span><span class="p">.</span><span class="nx">zIndex</span><span class="p">;</span></div><div class='line' id='LC172'>				<span class="p">}</span></div><div class='line' id='LC173'>			<span class="p">}</span></div><div class='line' id='LC174'>			<span class="nx">el</span><span class="p">.</span><span class="nx">runtimeStyle</span><span class="p">.</span><span class="nx">backgroundColor</span> <span class="o">=</span> <span class="s1">&#39;&#39;</span><span class="p">;</span></div><div class='line' id='LC175'>			<span class="nx">el</span><span class="p">.</span><span class="nx">runtimeStyle</span><span class="p">.</span><span class="nx">backgroundImage</span> <span class="o">=</span> <span class="s1">&#39;&#39;</span><span class="p">;</span></div><div class='line' id='LC176'>			<span class="nx">noImg</span> <span class="o">=</span> <span class="kc">true</span><span class="p">;</span></div><div class='line' id='LC177'>			<span class="k">if</span> <span class="p">(</span><span class="nx">elStyle</span><span class="p">.</span><span class="nx">backgroundImage</span> <span class="o">!=</span> <span class="s1">&#39;none&#39;</span> <span class="o">||</span> <span class="nx">el</span><span class="p">.</span><span class="nx">isImg</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC178'>				<span class="k">if</span> <span class="p">(</span><span class="o">!</span><span class="nx">el</span><span class="p">.</span><span class="nx">isImg</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC179'>					<span class="nx">el</span><span class="p">.</span><span class="nx">vmlBg</span> <span class="o">=</span> <span class="nx">elStyle</span><span class="p">.</span><span class="nx">backgroundImage</span><span class="p">;</span></div><div class='line' id='LC180'>					<span class="nx">el</span><span class="p">.</span><span class="nx">vmlBg</span> <span class="o">=</span> <span class="nx">el</span><span class="p">.</span><span class="nx">vmlBg</span><span class="p">.</span><span class="nx">substr</span><span class="p">(</span><span class="mi">5</span><span class="p">,</span> <span class="nx">el</span><span class="p">.</span><span class="nx">vmlBg</span><span class="p">.</span><span class="nx">lastIndexOf</span><span class="p">(</span><span class="s1">&#39;&quot;)&#39;</span><span class="p">)</span><span class="o">-</span><span class="mi">5</span><span class="p">);</span></div><div class='line' id='LC181'>				<span class="p">}</span></div><div class='line' id='LC182'>				<span class="k">else</span> <span class="p">{</span></div><div class='line' id='LC183'>					<span class="nx">el</span><span class="p">.</span><span class="nx">vmlBg</span> <span class="o">=</span> <span class="nx">el</span><span class="p">.</span><span class="nx">src</span><span class="p">;</span></div><div class='line' id='LC184'>				<span class="p">}</span></div><div class='line' id='LC185'>				<span class="nx">lib</span> <span class="o">=</span> <span class="k">this</span><span class="p">;</span></div><div class='line' id='LC186'>				<span class="k">if</span> <span class="p">(</span><span class="o">!</span><span class="nx">lib</span><span class="p">.</span><span class="nx">imgSize</span><span class="p">[</span><span class="nx">el</span><span class="p">.</span><span class="nx">vmlBg</span><span class="p">])</span> <span class="p">{</span></div><div class='line' id='LC187'>					<span class="nx">img</span> <span class="o">=</span> <span class="nx">doc</span><span class="p">.</span><span class="nx">createElement</span><span class="p">(</span><span class="s1">&#39;img&#39;</span><span class="p">);</span></div><div class='line' id='LC188'>					<span class="nx">lib</span><span class="p">.</span><span class="nx">imgSize</span><span class="p">[</span><span class="nx">el</span><span class="p">.</span><span class="nx">vmlBg</span><span class="p">]</span> <span class="o">=</span> <span class="nx">img</span><span class="p">;</span></div><div class='line' id='LC189'>					<span class="nx">img</span><span class="p">.</span><span class="nx">className</span> <span class="o">=</span> <span class="nx">lib</span><span class="p">.</span><span class="nx">ns</span> <span class="o">+</span> <span class="s1">&#39;_sizeFinder&#39;</span><span class="p">;</span></div><div class='line' id='LC190'>					<span class="nx">img</span><span class="p">.</span><span class="nx">runtimeStyle</span><span class="p">.</span><span class="nx">cssText</span> <span class="o">=</span> <span class="p">[</span></div><div class='line' id='LC191'>						<span class="s1">&#39;behavior:none&#39;</span><span class="p">,</span></div><div class='line' id='LC192'>						<span class="s1">&#39;position:absolute&#39;</span><span class="p">,</span></div><div class='line' id='LC193'>						<span class="s1">&#39;left:-10000px&#39;</span><span class="p">,</span></div><div class='line' id='LC194'>						<span class="s1">&#39;top:-10000px&#39;</span><span class="p">,</span></div><div class='line' id='LC195'>						<span class="s1">&#39;border:none&#39;</span><span class="p">,</span></div><div class='line' id='LC196'>						<span class="s1">&#39;margin:0&#39;</span><span class="p">,</span></div><div class='line' id='LC197'>						<span class="s1">&#39;padding:0&#39;</span></div><div class='line' id='LC198'>					<span class="p">].</span><span class="nx">join</span><span class="p">(</span><span class="s1">&#39;;&#39;</span><span class="p">);</span></div><div class='line' id='LC199'>					<span class="nx">imgLoaded</span> <span class="o">=</span> <span class="kd">function</span> <span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC200'>						<span class="k">this</span><span class="p">.</span><span class="nx">width</span> <span class="o">=</span> <span class="k">this</span><span class="p">.</span><span class="nx">offsetWidth</span><span class="p">;</span></div><div class='line' id='LC201'>						<span class="k">this</span><span class="p">.</span><span class="nx">height</span> <span class="o">=</span> <span class="k">this</span><span class="p">.</span><span class="nx">offsetHeight</span><span class="p">;</span></div><div class='line' id='LC202'>						<span class="nx">lib</span><span class="p">.</span><span class="nx">vmlOffsets</span><span class="p">(</span><span class="nx">el</span><span class="p">);</span></div><div class='line' id='LC203'>					<span class="p">};</span></div><div class='line' id='LC204'>					<span class="nx">img</span><span class="p">.</span><span class="nx">attachEvent</span><span class="p">(</span><span class="s1">&#39;onload&#39;</span><span class="p">,</span> <span class="nx">imgLoaded</span><span class="p">);</span></div><div class='line' id='LC205'>					<span class="nx">img</span><span class="p">.</span><span class="nx">src</span> <span class="o">=</span> <span class="nx">el</span><span class="p">.</span><span class="nx">vmlBg</span><span class="p">;</span></div><div class='line' id='LC206'>					<span class="nx">img</span><span class="p">.</span><span class="nx">removeAttribute</span><span class="p">(</span><span class="s1">&#39;width&#39;</span><span class="p">);</span></div><div class='line' id='LC207'>					<span class="nx">img</span><span class="p">.</span><span class="nx">removeAttribute</span><span class="p">(</span><span class="s1">&#39;height&#39;</span><span class="p">);</span></div><div class='line' id='LC208'>					<span class="nx">doc</span><span class="p">.</span><span class="nx">body</span><span class="p">.</span><span class="nx">insertBefore</span><span class="p">(</span><span class="nx">img</span><span class="p">,</span> <span class="nx">doc</span><span class="p">.</span><span class="nx">body</span><span class="p">.</span><span class="nx">firstChild</span><span class="p">);</span></div><div class='line' id='LC209'>				<span class="p">}</span></div><div class='line' id='LC210'>				<span class="nx">el</span><span class="p">.</span><span class="nx">vml</span><span class="p">.</span><span class="nx">image</span><span class="p">.</span><span class="nx">fill</span><span class="p">.</span><span class="nx">src</span> <span class="o">=</span> <span class="nx">el</span><span class="p">.</span><span class="nx">vmlBg</span><span class="p">;</span></div><div class='line' id='LC211'>				<span class="nx">noImg</span> <span class="o">=</span> <span class="kc">false</span><span class="p">;</span></div><div class='line' id='LC212'>			<span class="p">}</span></div><div class='line' id='LC213'>			<span class="nx">el</span><span class="p">.</span><span class="nx">vml</span><span class="p">.</span><span class="nx">image</span><span class="p">.</span><span class="nx">fill</span><span class="p">.</span><span class="nx">on</span> <span class="o">=</span> <span class="o">!</span><span class="nx">noImg</span><span class="p">;</span></div><div class='line' id='LC214'>			<span class="nx">el</span><span class="p">.</span><span class="nx">vml</span><span class="p">.</span><span class="nx">image</span><span class="p">.</span><span class="nx">fill</span><span class="p">.</span><span class="nx">color</span> <span class="o">=</span> <span class="s1">&#39;none&#39;</span><span class="p">;</span></div><div class='line' id='LC215'>			<span class="nx">el</span><span class="p">.</span><span class="nx">vml</span><span class="p">.</span><span class="nx">color</span><span class="p">.</span><span class="nx">shape</span><span class="p">.</span><span class="nx">style</span><span class="p">.</span><span class="nx">backgroundColor</span> <span class="o">=</span> <span class="nx">elStyle</span><span class="p">.</span><span class="nx">backgroundColor</span><span class="p">;</span></div><div class='line' id='LC216'>			<span class="nx">el</span><span class="p">.</span><span class="nx">runtimeStyle</span><span class="p">.</span><span class="nx">backgroundImage</span> <span class="o">=</span> <span class="s1">&#39;none&#39;</span><span class="p">;</span></div><div class='line' id='LC217'>			<span class="nx">el</span><span class="p">.</span><span class="nx">runtimeStyle</span><span class="p">.</span><span class="nx">backgroundColor</span> <span class="o">=</span> <span class="s1">&#39;transparent&#39;</span><span class="p">;</span></div><div class='line' id='LC218'>		<span class="p">},</span></div><div class='line' id='LC219'>		<span class="nx">vmlOffsets</span><span class="o">:</span> <span class="kd">function</span> <span class="p">(</span><span class="nx">el</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC220'>			<span class="kd">var</span> <span class="nx">thisStyle</span><span class="p">,</span> <span class="nx">size</span><span class="p">,</span> <span class="nx">fudge</span><span class="p">,</span> <span class="nx">makeVisible</span><span class="p">,</span> <span class="nx">bg</span><span class="p">,</span> <span class="nx">bgR</span><span class="p">,</span> <span class="nx">dC</span><span class="p">,</span> <span class="nx">altC</span><span class="p">,</span> <span class="nx">b</span><span class="p">,</span> <span class="nx">c</span><span class="p">,</span> <span class="nx">v</span><span class="p">;</span></div><div class='line' id='LC221'>			<span class="nx">thisStyle</span> <span class="o">=</span> <span class="nx">el</span><span class="p">.</span><span class="nx">currentStyle</span><span class="p">;</span></div><div class='line' id='LC222'>			<span class="nx">size</span> <span class="o">=</span> <span class="p">{</span></div><div class='line' id='LC223'>				<span class="s1">&#39;W&#39;</span><span class="o">:</span><span class="nx">el</span><span class="p">.</span><span class="nx">clientWidth</span><span class="o">+</span><span class="mi">1</span><span class="p">,</span></div><div class='line' id='LC224'>				<span class="s1">&#39;H&#39;</span><span class="o">:</span><span class="nx">el</span><span class="p">.</span><span class="nx">clientHeight</span><span class="o">+</span><span class="mi">1</span><span class="p">,</span></div><div class='line' id='LC225'>				<span class="s1">&#39;w&#39;</span><span class="o">:</span><span class="k">this</span><span class="p">.</span><span class="nx">imgSize</span><span class="p">[</span><span class="nx">el</span><span class="p">.</span><span class="nx">vmlBg</span><span class="p">].</span><span class="nx">width</span><span class="p">,</span></div><div class='line' id='LC226'>				<span class="s1">&#39;h&#39;</span><span class="o">:</span><span class="k">this</span><span class="p">.</span><span class="nx">imgSize</span><span class="p">[</span><span class="nx">el</span><span class="p">.</span><span class="nx">vmlBg</span><span class="p">].</span><span class="nx">height</span><span class="p">,</span></div><div class='line' id='LC227'>				<span class="s1">&#39;L&#39;</span><span class="o">:</span><span class="nx">el</span><span class="p">.</span><span class="nx">offsetLeft</span><span class="p">,</span> <span class="s1">&#39;T&#39;</span><span class="o">:</span><span class="nx">el</span><span class="p">.</span><span class="nx">offsetTop</span><span class="p">,</span></div><div class='line' id='LC228'>				<span class="s1">&#39;bLW&#39;</span><span class="o">:</span><span class="nx">el</span><span class="p">.</span><span class="nx">clientLeft</span><span class="p">,</span></div><div class='line' id='LC229'>				<span class="s1">&#39;bTW&#39;</span><span class="o">:</span><span class="nx">el</span><span class="p">.</span><span class="nx">clientTop</span></div><div class='line' id='LC230'>			<span class="p">};</span></div><div class='line' id='LC231'>			<span class="nx">fudge</span> <span class="o">=</span> <span class="p">(</span><span class="nx">size</span><span class="p">.</span><span class="nx">L</span> <span class="o">+</span> <span class="nx">size</span><span class="p">.</span><span class="nx">bLW</span> <span class="o">==</span> <span class="mi">1</span><span class="p">)</span> <span class="o">?</span> <span class="mi">1</span> <span class="o">:</span> <span class="mi">0</span><span class="p">;</span></div><div class='line' id='LC232'>			<span class="nx">makeVisible</span> <span class="o">=</span> <span class="kd">function</span> <span class="p">(</span><span class="nx">vml</span><span class="p">,</span> <span class="nx">l</span><span class="p">,</span> <span class="nx">t</span><span class="p">,</span> <span class="nx">w</span><span class="p">,</span> <span class="nx">h</span><span class="p">,</span> <span class="nx">o</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC233'>				<span class="nx">vml</span><span class="p">.</span><span class="nx">coordsize</span> <span class="o">=</span> <span class="nx">w</span><span class="o">+</span><span class="s1">&#39;,&#39;</span><span class="o">+</span><span class="nx">h</span><span class="p">;</span></div><div class='line' id='LC234'>				<span class="nx">vml</span><span class="p">.</span><span class="nx">coordorigin</span> <span class="o">=</span> <span class="nx">o</span><span class="o">+</span><span class="s1">&#39;,&#39;</span><span class="o">+</span><span class="nx">o</span><span class="p">;</span></div><div class='line' id='LC235'>				<span class="nx">vml</span><span class="p">.</span><span class="nx">path</span> <span class="o">=</span> <span class="s1">&#39;m0,0l&#39;</span><span class="o">+</span><span class="nx">w</span><span class="o">+</span><span class="s1">&#39;,0l&#39;</span><span class="o">+</span><span class="nx">w</span><span class="o">+</span><span class="s1">&#39;,&#39;</span><span class="o">+</span><span class="nx">h</span><span class="o">+</span><span class="s1">&#39;l0,&#39;</span><span class="o">+</span><span class="nx">h</span><span class="o">+</span><span class="s1">&#39; xe&#39;</span><span class="p">;</span></div><div class='line' id='LC236'>				<span class="nx">vml</span><span class="p">.</span><span class="nx">style</span><span class="p">.</span><span class="nx">width</span> <span class="o">=</span> <span class="nx">w</span> <span class="o">+</span> <span class="s1">&#39;px&#39;</span><span class="p">;</span></div><div class='line' id='LC237'>				<span class="nx">vml</span><span class="p">.</span><span class="nx">style</span><span class="p">.</span><span class="nx">height</span> <span class="o">=</span> <span class="nx">h</span> <span class="o">+</span> <span class="s1">&#39;px&#39;</span><span class="p">;</span></div><div class='line' id='LC238'>				<span class="nx">vml</span><span class="p">.</span><span class="nx">style</span><span class="p">.</span><span class="nx">left</span> <span class="o">=</span> <span class="nx">l</span> <span class="o">+</span> <span class="s1">&#39;px&#39;</span><span class="p">;</span></div><div class='line' id='LC239'>				<span class="nx">vml</span><span class="p">.</span><span class="nx">style</span><span class="p">.</span><span class="nx">top</span> <span class="o">=</span> <span class="nx">t</span> <span class="o">+</span> <span class="s1">&#39;px&#39;</span><span class="p">;</span></div><div class='line' id='LC240'>			<span class="p">};</span></div><div class='line' id='LC241'>			<span class="nx">makeVisible</span><span class="p">(</span><span class="nx">el</span><span class="p">.</span><span class="nx">vml</span><span class="p">.</span><span class="nx">color</span><span class="p">.</span><span class="nx">shape</span><span class="p">,</span></div><div class='line' id='LC242'>						<span class="p">(</span><span class="nx">size</span><span class="p">.</span><span class="nx">L</span> <span class="o">+</span> <span class="p">(</span><span class="nx">el</span><span class="p">.</span><span class="nx">isImg</span> <span class="o">?</span> <span class="mi">0</span> <span class="o">:</span> <span class="nx">size</span><span class="p">.</span><span class="nx">bLW</span><span class="p">)),</span></div><div class='line' id='LC243'>						<span class="p">(</span><span class="nx">size</span><span class="p">.</span><span class="nx">T</span> <span class="o">+</span> <span class="p">(</span><span class="nx">el</span><span class="p">.</span><span class="nx">isImg</span> <span class="o">?</span> <span class="mi">0</span> <span class="o">:</span> <span class="nx">size</span><span class="p">.</span><span class="nx">bTW</span><span class="p">)),</span></div><div class='line' id='LC244'>						<span class="p">(</span><span class="nx">size</span><span class="p">.</span><span class="nx">W</span><span class="o">-</span><span class="mi">1</span><span class="p">),</span> <span class="p">(</span><span class="nx">size</span><span class="p">.</span><span class="nx">H</span><span class="o">-</span><span class="mi">1</span><span class="p">),</span> <span class="mi">0</span><span class="p">);</span></div><div class='line' id='LC245'>			<span class="nx">makeVisible</span><span class="p">(</span><span class="nx">el</span><span class="p">.</span><span class="nx">vml</span><span class="p">.</span><span class="nx">image</span><span class="p">.</span><span class="nx">shape</span><span class="p">,</span></div><div class='line' id='LC246'>						<span class="p">(</span><span class="nx">size</span><span class="p">.</span><span class="nx">L</span> <span class="o">+</span> <span class="nx">size</span><span class="p">.</span><span class="nx">bLW</span><span class="p">),</span></div><div class='line' id='LC247'>						<span class="p">(</span><span class="nx">size</span><span class="p">.</span><span class="nx">T</span> <span class="o">+</span> <span class="nx">size</span><span class="p">.</span><span class="nx">bTW</span><span class="p">),</span></div><div class='line' id='LC248'>						<span class="p">(</span><span class="nx">size</span><span class="p">.</span><span class="nx">W</span><span class="p">),</span> <span class="p">(</span><span class="nx">size</span><span class="p">.</span><span class="nx">H</span><span class="p">),</span> <span class="mi">1</span><span class="p">);</span></div><div class='line' id='LC249'>			<span class="nx">bg</span> <span class="o">=</span> <span class="p">{</span><span class="s1">&#39;X&#39;</span><span class="o">:</span><span class="mi">0</span><span class="p">,</span> <span class="s1">&#39;Y&#39;</span><span class="o">:</span><span class="mi">0</span><span class="p">};</span></div><div class='line' id='LC250'>			<span class="k">if</span> <span class="p">(</span><span class="nx">el</span><span class="p">.</span><span class="nx">isImg</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC251'>				<span class="nx">bg</span><span class="p">.</span><span class="nx">X</span> <span class="o">=</span> <span class="nb">parseInt</span><span class="p">(</span><span class="nx">thisStyle</span><span class="p">.</span><span class="nx">paddingLeft</span><span class="p">,</span> <span class="mi">10</span><span class="p">)</span> <span class="o">+</span> <span class="mi">1</span><span class="p">;</span></div><div class='line' id='LC252'>				<span class="nx">bg</span><span class="p">.</span><span class="nx">Y</span> <span class="o">=</span> <span class="nb">parseInt</span><span class="p">(</span><span class="nx">thisStyle</span><span class="p">.</span><span class="nx">paddingTop</span><span class="p">,</span> <span class="mi">10</span><span class="p">)</span> <span class="o">+</span> <span class="mi">1</span><span class="p">;</span></div><div class='line' id='LC253'>			<span class="p">}</span></div><div class='line' id='LC254'>			<span class="k">else</span> <span class="p">{</span></div><div class='line' id='LC255'>				<span class="k">for</span> <span class="p">(</span><span class="nx">b</span> <span class="k">in</span> <span class="nx">bg</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC256'>					<span class="k">if</span> <span class="p">(</span><span class="nx">bg</span><span class="p">.</span><span class="nx">hasOwnProperty</span><span class="p">(</span><span class="nx">b</span><span class="p">))</span> <span class="p">{</span></div><div class='line' id='LC257'>						<span class="k">this</span><span class="p">.</span><span class="nx">figurePercentage</span><span class="p">(</span><span class="nx">bg</span><span class="p">,</span> <span class="nx">size</span><span class="p">,</span> <span class="nx">b</span><span class="p">,</span> <span class="nx">thisStyle</span><span class="p">[</span><span class="s1">&#39;backgroundPosition&#39;</span><span class="o">+</span><span class="nx">b</span><span class="p">]);</span></div><div class='line' id='LC258'>					<span class="p">}</span></div><div class='line' id='LC259'>				<span class="p">}</span></div><div class='line' id='LC260'>			<span class="p">}</span></div><div class='line' id='LC261'>			<span class="nx">el</span><span class="p">.</span><span class="nx">vml</span><span class="p">.</span><span class="nx">image</span><span class="p">.</span><span class="nx">fill</span><span class="p">.</span><span class="nx">position</span> <span class="o">=</span> <span class="p">(</span><span class="nx">bg</span><span class="p">.</span><span class="nx">X</span><span class="o">/</span><span class="nx">size</span><span class="p">.</span><span class="nx">W</span><span class="p">)</span> <span class="o">+</span> <span class="s1">&#39;,&#39;</span> <span class="o">+</span> <span class="p">(</span><span class="nx">bg</span><span class="p">.</span><span class="nx">Y</span><span class="o">/</span><span class="nx">size</span><span class="p">.</span><span class="nx">H</span><span class="p">);</span></div><div class='line' id='LC262'>			<span class="nx">bgR</span> <span class="o">=</span> <span class="nx">thisStyle</span><span class="p">.</span><span class="nx">backgroundRepeat</span><span class="p">;</span></div><div class='line' id='LC263'>			<span class="nx">dC</span> <span class="o">=</span> <span class="p">{</span><span class="s1">&#39;T&#39;</span><span class="o">:</span><span class="mi">1</span><span class="p">,</span> <span class="s1">&#39;R&#39;</span><span class="o">:</span><span class="nx">size</span><span class="p">.</span><span class="nx">W</span><span class="o">+</span><span class="nx">fudge</span><span class="p">,</span> <span class="s1">&#39;B&#39;</span><span class="o">:</span><span class="nx">size</span><span class="p">.</span><span class="nx">H</span><span class="p">,</span> <span class="s1">&#39;L&#39;</span><span class="o">:</span><span class="mi">1</span><span class="o">+</span><span class="nx">fudge</span><span class="p">};</span></div><div class='line' id='LC264'>			<span class="nx">altC</span> <span class="o">=</span> <span class="p">{</span> <span class="s1">&#39;X&#39;</span><span class="o">:</span> <span class="p">{</span><span class="s1">&#39;b1&#39;</span><span class="o">:</span> <span class="s1">&#39;L&#39;</span><span class="p">,</span> <span class="s1">&#39;b2&#39;</span><span class="o">:</span> <span class="s1">&#39;R&#39;</span><span class="p">,</span> <span class="s1">&#39;d&#39;</span><span class="o">:</span> <span class="s1">&#39;W&#39;</span><span class="p">},</span> <span class="s1">&#39;Y&#39;</span><span class="o">:</span> <span class="p">{</span><span class="s1">&#39;b1&#39;</span><span class="o">:</span> <span class="s1">&#39;T&#39;</span><span class="p">,</span> <span class="s1">&#39;b2&#39;</span><span class="o">:</span> <span class="s1">&#39;B&#39;</span><span class="p">,</span> <span class="s1">&#39;d&#39;</span><span class="o">:</span> <span class="s1">&#39;H&#39;</span><span class="p">}</span> <span class="p">};</span></div><div class='line' id='LC265'>			<span class="k">if</span> <span class="p">(</span><span class="nx">bgR</span> <span class="o">!=</span> <span class="s1">&#39;repeat&#39;</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC266'>				<span class="nx">c</span> <span class="o">=</span> <span class="p">{</span><span class="s1">&#39;T&#39;</span><span class="o">:</span><span class="p">(</span><span class="nx">bg</span><span class="p">.</span><span class="nx">Y</span><span class="p">),</span> <span class="s1">&#39;R&#39;</span><span class="o">:</span><span class="p">(</span><span class="nx">bg</span><span class="p">.</span><span class="nx">X</span><span class="o">+</span><span class="nx">size</span><span class="p">.</span><span class="nx">w</span><span class="p">),</span> <span class="s1">&#39;B&#39;</span><span class="o">:</span><span class="p">(</span><span class="nx">bg</span><span class="p">.</span><span class="nx">Y</span><span class="o">+</span><span class="nx">size</span><span class="p">.</span><span class="nx">h</span><span class="p">),</span> <span class="s1">&#39;L&#39;</span><span class="o">:</span><span class="p">(</span><span class="nx">bg</span><span class="p">.</span><span class="nx">X</span><span class="p">)};</span></div><div class='line' id='LC267'>				<span class="k">if</span> <span class="p">(</span><span class="nx">bgR</span><span class="p">.</span><span class="nx">search</span><span class="p">(</span><span class="s1">&#39;repeat-&#39;</span><span class="p">)</span> <span class="o">!=</span> <span class="o">-</span><span class="mi">1</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC268'>					<span class="nx">v</span> <span class="o">=</span> <span class="nx">bgR</span><span class="p">.</span><span class="nx">split</span><span class="p">(</span><span class="s1">&#39;repeat-&#39;</span><span class="p">)[</span><span class="mi">1</span><span class="p">].</span><span class="nx">toUpperCase</span><span class="p">();</span></div><div class='line' id='LC269'>					<span class="nx">c</span><span class="p">[</span><span class="nx">altC</span><span class="p">[</span><span class="nx">v</span><span class="p">].</span><span class="nx">b1</span><span class="p">]</span> <span class="o">=</span> <span class="mi">1</span><span class="p">;</span></div><div class='line' id='LC270'>					<span class="nx">c</span><span class="p">[</span><span class="nx">altC</span><span class="p">[</span><span class="nx">v</span><span class="p">].</span><span class="nx">b2</span><span class="p">]</span> <span class="o">=</span> <span class="nx">size</span><span class="p">[</span><span class="nx">altC</span><span class="p">[</span><span class="nx">v</span><span class="p">].</span><span class="nx">d</span><span class="p">];</span></div><div class='line' id='LC271'>				<span class="p">}</span></div><div class='line' id='LC272'>				<span class="k">if</span> <span class="p">(</span><span class="nx">c</span><span class="p">.</span><span class="nx">B</span> <span class="o">&gt;</span> <span class="nx">size</span><span class="p">.</span><span class="nx">H</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC273'>					<span class="nx">c</span><span class="p">.</span><span class="nx">B</span> <span class="o">=</span> <span class="nx">size</span><span class="p">.</span><span class="nx">H</span><span class="p">;</span></div><div class='line' id='LC274'>				<span class="p">}</span></div><div class='line' id='LC275'>				<span class="nx">el</span><span class="p">.</span><span class="nx">vml</span><span class="p">.</span><span class="nx">image</span><span class="p">.</span><span class="nx">shape</span><span class="p">.</span><span class="nx">style</span><span class="p">.</span><span class="nx">clip</span> <span class="o">=</span> <span class="s1">&#39;rect(&#39;</span><span class="o">+</span><span class="nx">c</span><span class="p">.</span><span class="nx">T</span><span class="o">+</span><span class="s1">&#39;px &#39;</span><span class="o">+</span><span class="p">(</span><span class="nx">c</span><span class="p">.</span><span class="nx">R</span><span class="o">+</span><span class="nx">fudge</span><span class="p">)</span><span class="o">+</span><span class="s1">&#39;px &#39;</span><span class="o">+</span><span class="nx">c</span><span class="p">.</span><span class="nx">B</span><span class="o">+</span><span class="s1">&#39;px &#39;</span><span class="o">+</span><span class="p">(</span><span class="nx">c</span><span class="p">.</span><span class="nx">L</span><span class="o">+</span><span class="nx">fudge</span><span class="p">)</span><span class="o">+</span><span class="s1">&#39;px)&#39;</span><span class="p">;</span></div><div class='line' id='LC276'>			<span class="p">}</span></div><div class='line' id='LC277'>			<span class="k">else</span> <span class="p">{</span></div><div class='line' id='LC278'>				<span class="nx">el</span><span class="p">.</span><span class="nx">vml</span><span class="p">.</span><span class="nx">image</span><span class="p">.</span><span class="nx">shape</span><span class="p">.</span><span class="nx">style</span><span class="p">.</span><span class="nx">clip</span> <span class="o">=</span> <span class="s1">&#39;rect(&#39;</span><span class="o">+</span><span class="nx">dC</span><span class="p">.</span><span class="nx">T</span><span class="o">+</span><span class="s1">&#39;px &#39;</span><span class="o">+</span><span class="nx">dC</span><span class="p">.</span><span class="nx">R</span><span class="o">+</span><span class="s1">&#39;px &#39;</span><span class="o">+</span><span class="nx">dC</span><span class="p">.</span><span class="nx">B</span><span class="o">+</span><span class="s1">&#39;px &#39;</span><span class="o">+</span><span class="nx">dC</span><span class="p">.</span><span class="nx">L</span><span class="o">+</span><span class="s1">&#39;px)&#39;</span><span class="p">;</span></div><div class='line' id='LC279'>			<span class="p">}</span></div><div class='line' id='LC280'>		<span class="p">},</span></div><div class='line' id='LC281'>		<span class="nx">figurePercentage</span><span class="o">:</span> <span class="kd">function</span> <span class="p">(</span><span class="nx">bg</span><span class="p">,</span> <span class="nx">size</span><span class="p">,</span> <span class="nx">axis</span><span class="p">,</span> <span class="nx">position</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC282'>			<span class="kd">var</span> <span class="nx">horizontal</span><span class="p">,</span> <span class="nx">fraction</span><span class="p">;</span></div><div class='line' id='LC283'>			<span class="nx">fraction</span> <span class="o">=</span> <span class="kc">true</span><span class="p">;</span></div><div class='line' id='LC284'>			<span class="nx">horizontal</span> <span class="o">=</span> <span class="p">(</span><span class="nx">axis</span> <span class="o">==</span> <span class="s1">&#39;X&#39;</span><span class="p">);</span></div><div class='line' id='LC285'>			<span class="k">switch</span><span class="p">(</span><span class="nx">position</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC286'>				<span class="k">case</span> <span class="s1">&#39;left&#39;</span><span class="o">:</span></div><div class='line' id='LC287'>				<span class="k">case</span> <span class="s1">&#39;top&#39;</span><span class="o">:</span></div><div class='line' id='LC288'>					<span class="nx">bg</span><span class="p">[</span><span class="nx">axis</span><span class="p">]</span> <span class="o">=</span> <span class="mi">0</span><span class="p">;</span></div><div class='line' id='LC289'>					<span class="k">break</span><span class="p">;</span></div><div class='line' id='LC290'>				<span class="k">case</span> <span class="s1">&#39;center&#39;</span><span class="o">:</span></div><div class='line' id='LC291'>					<span class="nx">bg</span><span class="p">[</span><span class="nx">axis</span><span class="p">]</span> <span class="o">=</span> <span class="mf">0.5</span><span class="p">;</span></div><div class='line' id='LC292'>					<span class="k">break</span><span class="p">;</span></div><div class='line' id='LC293'>				<span class="k">case</span> <span class="s1">&#39;right&#39;</span><span class="o">:</span></div><div class='line' id='LC294'>				<span class="k">case</span> <span class="s1">&#39;bottom&#39;</span><span class="o">:</span></div><div class='line' id='LC295'>					<span class="nx">bg</span><span class="p">[</span><span class="nx">axis</span><span class="p">]</span> <span class="o">=</span> <span class="mi">1</span><span class="p">;</span></div><div class='line' id='LC296'>					<span class="k">break</span><span class="p">;</span></div><div class='line' id='LC297'>				<span class="k">default</span><span class="o">:</span></div><div class='line' id='LC298'>					<span class="nx">position</span><span class="p">.</span><span class="nx">search</span><span class="p">(</span><span class="s1">&#39;%&#39;</span><span class="p">)</span> <span class="o">!=</span> <span class="o">-</span><span class="mi">1</span></div><div class='line' id='LC299'>						<span class="o">?</span> <span class="nx">bg</span><span class="p">[</span><span class="nx">axis</span><span class="p">]</span> <span class="o">=</span> <span class="nb">parseInt</span><span class="p">(</span><span class="nx">position</span><span class="p">,</span> <span class="mi">10</span><span class="p">)</span> <span class="o">/</span> <span class="mi">100</span></div><div class='line' id='LC300'>						<span class="o">:</span> <span class="nx">fraction</span> <span class="o">=</span> <span class="kc">false</span><span class="p">;</span></div><div class='line' id='LC301'>			<span class="p">}</span></div><div class='line' id='LC302'>			<span class="nx">bg</span><span class="p">[</span><span class="nx">axis</span><span class="p">]</span> <span class="o">=</span> <span class="nb">Math</span><span class="p">.</span><span class="nx">ceil</span><span class="p">(</span><span class="nx">fraction</span> <span class="o">?</span> <span class="p">((</span><span class="nx">size</span><span class="p">[</span><span class="nx">horizontal</span><span class="o">?</span><span class="s1">&#39;W&#39;</span><span class="o">:</span> <span class="s1">&#39;H&#39;</span><span class="p">]</span> <span class="o">*</span> <span class="nx">bg</span><span class="p">[</span><span class="nx">axis</span><span class="p">])</span></div><div class='line' id='LC303'>				<span class="o">-</span> <span class="p">(</span><span class="nx">size</span><span class="p">[</span><span class="nx">horizontal</span><span class="o">?</span><span class="s1">&#39;w&#39;</span><span class="o">:</span> <span class="s1">&#39;h&#39;</span><span class="p">]</span> <span class="o">*</span> <span class="nx">bg</span><span class="p">[</span><span class="nx">axis</span><span class="p">]))</span> <span class="o">:</span> <span class="nb">parseInt</span><span class="p">(</span><span class="nx">position</span><span class="p">,</span> <span class="mi">10</span><span class="p">));</span></div><div class='line' id='LC304'>			<span class="k">if</span> <span class="p">(</span><span class="nx">bg</span><span class="p">[</span><span class="nx">axis</span><span class="p">]</span> <span class="o">%</span> <span class="mi">2</span> <span class="o">===</span> <span class="mi">0</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC305'>				<span class="nx">bg</span><span class="p">[</span><span class="nx">axis</span><span class="p">]</span><span class="o">++</span><span class="p">;</span></div><div class='line' id='LC306'>			<span class="p">}</span></div><div class='line' id='LC307'>			<span class="k">return</span> <span class="nx">bg</span><span class="p">[</span><span class="nx">axis</span><span class="p">];</span></div><div class='line' id='LC308'>		<span class="p">},</span></div><div class='line' id='LC309'>		<span class="nx">fixPng</span><span class="o">:</span> <span class="kd">function</span> <span class="p">(</span><span class="nx">el</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC310'>			<span class="kd">var</span> <span class="nx">lib</span><span class="p">,</span> <span class="nx">els</span><span class="p">,</span> <span class="nx">nodeStr</span><span class="p">,</span> <span class="nx">v</span><span class="p">,</span> <span class="nx">e</span><span class="p">;</span></div><div class='line' id='LC311'>			<span class="k">if</span> <span class="p">(</span><span class="nx">el</span><span class="p">.</span><span class="nx">nodeName</span> <span class="o">==</span> <span class="s1">&#39;BODY&#39;</span> <span class="o">||</span> <span class="nx">el</span><span class="p">.</span><span class="nx">nodeName</span> <span class="o">==</span> <span class="s1">&#39;TD&#39;</span> <span class="o">||</span> <span class="nx">el</span><span class="p">.</span><span class="nx">nodeName</span> <span class="o">==</span> <span class="s1">&#39;TR&#39;</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC312'>				<span class="k">return</span><span class="p">;</span></div><div class='line' id='LC313'>			<span class="p">}</span></div><div class='line' id='LC314'>			<span class="nx">el</span><span class="p">.</span><span class="nx">isImg</span> <span class="o">=</span> <span class="kc">false</span><span class="p">;</span></div><div class='line' id='LC315'>			<span class="k">if</span> <span class="p">(</span><span class="nx">el</span><span class="p">.</span><span class="nx">nodeName</span> <span class="o">==</span> <span class="s1">&#39;IMG&#39;</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC316'>				<span class="k">if</span><span class="p">(</span><span class="nx">el</span><span class="p">.</span><span class="nx">src</span><span class="p">.</span><span class="nx">toLowerCase</span><span class="p">().</span><span class="nx">search</span><span class="p">(</span><span class="sr">/\.png$/</span><span class="p">)</span> <span class="o">!=</span> <span class="o">-</span><span class="mi">1</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC317'>					<span class="nx">el</span><span class="p">.</span><span class="nx">isImg</span> <span class="o">=</span> <span class="kc">true</span><span class="p">;</span></div><div class='line' id='LC318'>					<span class="nx">el</span><span class="p">.</span><span class="nx">style</span><span class="p">.</span><span class="nx">visibility</span> <span class="o">=</span> <span class="s1">&#39;hidden&#39;</span><span class="p">;</span></div><div class='line' id='LC319'>				<span class="p">}</span></div><div class='line' id='LC320'>				<span class="k">else</span> <span class="p">{</span></div><div class='line' id='LC321'>					<span class="k">return</span><span class="p">;</span></div><div class='line' id='LC322'>				<span class="p">}</span></div><div class='line' id='LC323'>			<span class="p">}</span></div><div class='line' id='LC324'>			<span class="k">else</span> <span class="k">if</span> <span class="p">(</span><span class="nx">el</span><span class="p">.</span><span class="nx">currentStyle</span><span class="p">.</span><span class="nx">backgroundImage</span><span class="p">.</span><span class="nx">toLowerCase</span><span class="p">().</span><span class="nx">search</span><span class="p">(</span><span class="s1">&#39;.png&#39;</span><span class="p">)</span> <span class="o">==</span> <span class="o">-</span><span class="mi">1</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC325'>				<span class="k">return</span><span class="p">;</span></div><div class='line' id='LC326'>			<span class="p">}</span></div><div class='line' id='LC327'>			<span class="nx">lib</span> <span class="o">=</span> <span class="nx">DD_belatedPNG</span><span class="p">;</span></div><div class='line' id='LC328'>			<span class="nx">el</span><span class="p">.</span><span class="nx">vml</span> <span class="o">=</span> <span class="p">{</span><span class="nx">color</span><span class="o">:</span> <span class="p">{},</span> <span class="nx">image</span><span class="o">:</span> <span class="p">{}};</span></div><div class='line' id='LC329'>			<span class="nx">els</span> <span class="o">=</span> <span class="p">{</span><span class="nx">shape</span><span class="o">:</span> <span class="p">{},</span> <span class="nx">fill</span><span class="o">:</span> <span class="p">{}};</span></div><div class='line' id='LC330'>			<span class="k">for</span> <span class="p">(</span><span class="nx">v</span> <span class="k">in</span> <span class="nx">el</span><span class="p">.</span><span class="nx">vml</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC331'>				<span class="k">if</span> <span class="p">(</span><span class="nx">el</span><span class="p">.</span><span class="nx">vml</span><span class="p">.</span><span class="nx">hasOwnProperty</span><span class="p">(</span><span class="nx">v</span><span class="p">))</span> <span class="p">{</span></div><div class='line' id='LC332'>					<span class="k">for</span> <span class="p">(</span><span class="nx">e</span> <span class="k">in</span> <span class="nx">els</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC333'>						<span class="k">if</span> <span class="p">(</span><span class="nx">els</span><span class="p">.</span><span class="nx">hasOwnProperty</span><span class="p">(</span><span class="nx">e</span><span class="p">))</span> <span class="p">{</span></div><div class='line' id='LC334'>							<span class="nx">nodeStr</span> <span class="o">=</span> <span class="nx">lib</span><span class="p">.</span><span class="nx">ns</span> <span class="o">+</span> <span class="s1">&#39;:&#39;</span> <span class="o">+</span> <span class="nx">e</span><span class="p">;</span></div><div class='line' id='LC335'>							<span class="nx">el</span><span class="p">.</span><span class="nx">vml</span><span class="p">[</span><span class="nx">v</span><span class="p">][</span><span class="nx">e</span><span class="p">]</span> <span class="o">=</span> <span class="nx">doc</span><span class="p">.</span><span class="nx">createElement</span><span class="p">(</span><span class="nx">nodeStr</span><span class="p">);</span></div><div class='line' id='LC336'>						<span class="p">}</span></div><div class='line' id='LC337'>					<span class="p">}</span></div><div class='line' id='LC338'>					<span class="nx">el</span><span class="p">.</span><span class="nx">vml</span><span class="p">[</span><span class="nx">v</span><span class="p">].</span><span class="nx">shape</span><span class="p">.</span><span class="nx">stroked</span> <span class="o">=</span> <span class="kc">false</span><span class="p">;</span></div><div class='line' id='LC339'>					<span class="k">if</span> <span class="p">(</span><span class="nx">el</span><span class="p">.</span><span class="nx">nodeName</span> <span class="o">==</span> <span class="s1">&#39;IMG&#39;</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC340'>						<span class="kd">var</span> <span class="nx">width</span>  <span class="o">=</span> <span class="nx">el</span><span class="p">.</span><span class="nx">width</span> <span class="o">/</span> <span class="mi">96</span> <span class="o">*</span> <span class="mi">72</span><span class="p">;</span></div><div class='line' id='LC341'>						<span class="kd">var</span> <span class="nx">height</span> <span class="o">=</span> <span class="nx">el</span><span class="p">.</span><span class="nx">height</span> <span class="o">/</span> <span class="mi">96</span> <span class="o">*</span> <span class="mi">72</span><span class="p">;</span></div><div class='line' id='LC342'>						<span class="nx">el</span><span class="p">.</span><span class="nx">vml</span><span class="p">[</span><span class="nx">v</span><span class="p">].</span><span class="nx">fill</span><span class="p">.</span><span class="nx">type</span> <span class="o">=</span> <span class="s1">&#39;tile&#39;</span><span class="p">;</span></div><div class='line' id='LC343'>						<span class="nx">el</span><span class="p">.</span><span class="nx">vml</span><span class="p">[</span><span class="nx">v</span><span class="p">].</span><span class="nx">fill</span><span class="p">.</span><span class="nx">size</span> <span class="o">=</span> <span class="nx">width</span> <span class="o">+</span> <span class="s1">&#39;pt,&#39;</span> <span class="o">+</span> <span class="nx">height</span> <span class="o">+</span> <span class="s1">&#39;pt&#39;</span><span class="p">;</span></div><div class='line' id='LC344'>					<span class="p">}</span></div><div class='line' id='LC345'>					<span class="k">else</span> <span class="k">if</span> <span class="p">(</span><span class="nx">el</span><span class="p">.</span><span class="nx">currentStyle</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC346'>						<span class="kd">var</span> <span class="nx">elStyle</span> <span class="o">=</span> <span class="nx">el</span><span class="p">.</span><span class="nx">currentStyle</span><span class="p">;</span></div><div class='line' id='LC347'>						<span class="k">if</span> <span class="p">(</span><span class="nx">elStyle</span><span class="p">.</span><span class="nx">backgroundImage</span> <span class="o">!=</span> <span class="s1">&#39;none&#39;</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC348'>							<span class="kd">var</span> <span class="nx">vmlBg</span> <span class="o">=</span> <span class="nx">elStyle</span><span class="p">.</span><span class="nx">backgroundImage</span><span class="p">;</span></div><div class='line' id='LC349'>							<span class="kd">var</span> <span class="nx">img</span> <span class="o">=</span> <span class="nx">doc</span><span class="p">.</span><span class="nx">createElement</span><span class="p">(</span><span class="s2">&quot;img&quot;</span><span class="p">);</span></div><div class='line' id='LC350'>							<span class="nx">img</span><span class="p">.</span><span class="nx">src</span> <span class="o">=</span> <span class="nx">vmlBg</span><span class="p">.</span><span class="nx">substr</span><span class="p">(</span><span class="mi">5</span><span class="p">,</span> <span class="nx">vmlBg</span><span class="p">.</span><span class="nx">lastIndexOf</span><span class="p">(</span><span class="s1">&#39;&quot;)&#39;</span><span class="p">)</span><span class="o">-</span><span class="mi">5</span><span class="p">);</span></div><div class='line' id='LC351'>							<span class="kd">var</span> <span class="nx">run</span> <span class="o">=</span> <span class="nx">img</span><span class="p">.</span><span class="nx">runtimeStyle</span><span class="p">;</span></div><div class='line' id='LC352'>							<span class="kd">var</span> <span class="nx">mem</span> <span class="o">=</span> <span class="p">{</span> <span class="nx">w</span><span class="o">:</span> <span class="nx">run</span><span class="p">.</span><span class="nx">width</span><span class="p">,</span> <span class="nx">h</span><span class="o">:</span> <span class="nx">run</span><span class="p">.</span><span class="nx">height</span> <span class="p">};</span></div><div class='line' id='LC353'>							<span class="nx">run</span><span class="p">.</span><span class="nx">width</span>  <span class="o">=</span> <span class="s1">&#39;auto&#39;</span><span class="p">;</span></div><div class='line' id='LC354'>							<span class="nx">run</span><span class="p">.</span><span class="nx">height</span> <span class="o">=</span> <span class="s1">&#39;auto&#39;</span><span class="p">;</span></div><div class='line' id='LC355'>							<span class="nx">w</span> <span class="o">=</span> <span class="nx">img</span><span class="p">.</span><span class="nx">width</span><span class="p">;</span></div><div class='line' id='LC356'>							<span class="nx">h</span> <span class="o">=</span> <span class="nx">img</span><span class="p">.</span><span class="nx">height</span><span class="p">;</span></div><div class='line' id='LC357'>							<span class="nx">run</span><span class="p">.</span><span class="nx">width</span>  <span class="o">=</span> <span class="nx">mem</span><span class="p">.</span><span class="nx">w</span><span class="p">;</span></div><div class='line' id='LC358'>							<span class="nx">run</span><span class="p">.</span><span class="nx">height</span> <span class="o">=</span> <span class="nx">mem</span><span class="p">.</span><span class="nx">h</span><span class="p">;</span></div><div class='line' id='LC359'>							<span class="kd">var</span> <span class="nx">width</span>  <span class="o">=</span> <span class="nx">w</span> <span class="o">/</span> <span class="mi">96</span> <span class="o">*</span> <span class="mi">72</span><span class="p">;</span></div><div class='line' id='LC360'>							<span class="kd">var</span> <span class="nx">height</span> <span class="o">=</span> <span class="nx">h</span> <span class="o">/</span> <span class="mi">96</span> <span class="o">*</span> <span class="mi">72</span><span class="p">;</span></div><div class='line' id='LC361'>							<span class="nx">el</span><span class="p">.</span><span class="nx">vml</span><span class="p">[</span><span class="nx">v</span><span class="p">].</span><span class="nx">fill</span><span class="p">.</span><span class="nx">type</span> <span class="o">=</span> <span class="s1">&#39;tile&#39;</span><span class="p">;</span></div><div class='line' id='LC362'>							<span class="nx">el</span><span class="p">.</span><span class="nx">vml</span><span class="p">[</span><span class="nx">v</span><span class="p">].</span><span class="nx">fill</span><span class="p">.</span><span class="nx">aspect</span> <span class="o">=</span> <span class="s1">&#39;atleast&#39;</span><span class="p">;</span></div><div class='line' id='LC363'>							<span class="nx">el</span><span class="p">.</span><span class="nx">vml</span><span class="p">[</span><span class="nx">v</span><span class="p">].</span><span class="nx">fill</span><span class="p">.</span><span class="nx">size</span> <span class="o">=</span> <span class="nx">width</span> <span class="o">+</span> <span class="s1">&#39;pt,&#39;</span> <span class="o">+</span> <span class="nx">height</span> <span class="o">+</span> <span class="s1">&#39;pt&#39;</span><span class="p">;</span></div><div class='line' id='LC364'>						<span class="p">}</span></div><div class='line' id='LC365'>					<span class="p">}</span></div><div class='line' id='LC366'>					<span class="nx">el</span><span class="p">.</span><span class="nx">vml</span><span class="p">[</span><span class="nx">v</span><span class="p">].</span><span class="nx">shape</span><span class="p">.</span><span class="nx">appendChild</span><span class="p">(</span><span class="nx">el</span><span class="p">.</span><span class="nx">vml</span><span class="p">[</span><span class="nx">v</span><span class="p">].</span><span class="nx">fill</span><span class="p">);</span></div><div class='line' id='LC367'>					<span class="nx">el</span><span class="p">.</span><span class="nx">parentNode</span><span class="p">.</span><span class="nx">insertBefore</span><span class="p">(</span><span class="nx">el</span><span class="p">.</span><span class="nx">vml</span><span class="p">[</span><span class="nx">v</span><span class="p">].</span><span class="nx">shape</span><span class="p">,</span> <span class="nx">el</span><span class="p">);</span></div><div class='line' id='LC368'>				<span class="p">}</span></div><div class='line' id='LC369'>			<span class="p">}</span></div><div class='line' id='LC370'>			<span class="nx">el</span><span class="p">.</span><span class="nx">vml</span><span class="p">.</span><span class="nx">image</span><span class="p">.</span><span class="nx">shape</span><span class="p">.</span><span class="nx">fillcolor</span> <span class="o">=</span> <span class="s1">&#39;none&#39;</span><span class="p">;</span></div><div class='line' id='LC371'>			<span class="nx">el</span><span class="p">.</span><span class="nx">vml</span><span class="p">.</span><span class="nx">color</span><span class="p">.</span><span class="nx">fill</span><span class="p">.</span><span class="nx">on</span> <span class="o">=</span> <span class="kc">false</span><span class="p">;</span></div><div class='line' id='LC372'>			<span class="nx">lib</span><span class="p">.</span><span class="nx">attachHandlers</span><span class="p">(</span><span class="nx">el</span><span class="p">);</span></div><div class='line' id='LC373'>			<span class="nx">lib</span><span class="p">.</span><span class="nx">giveLayout</span><span class="p">(</span><span class="nx">el</span><span class="p">);</span></div><div class='line' id='LC374'>			<span class="nx">lib</span><span class="p">.</span><span class="nx">giveLayout</span><span class="p">(</span><span class="nx">el</span><span class="p">.</span><span class="nx">offsetParent</span><span class="p">);</span></div><div class='line' id='LC375'>			<span class="nx">el</span><span class="p">.</span><span class="nx">vmlInitiated</span> <span class="o">=</span> <span class="kc">true</span><span class="p">;</span></div><div class='line' id='LC376'>			<span class="nx">lib</span><span class="p">.</span><span class="nx">applyVML</span><span class="p">(</span><span class="nx">el</span><span class="p">);</span></div><div class='line' id='LC377'>		<span class="p">}</span></div><div class='line' id='LC378'>	<span class="p">};</span></div><div class='line' id='LC379'>	<span class="k">try</span> <span class="p">{</span></div><div class='line' id='LC380'>		<span class="nx">doc</span><span class="p">.</span><span class="nx">execCommand</span><span class="p">(</span><span class="s2">&quot;BackgroundImageCache&quot;</span><span class="p">,</span> <span class="kc">false</span><span class="p">,</span> <span class="kc">true</span><span class="p">);</span></div><div class='line' id='LC381'>	<span class="p">}</span> <span class="k">catch</span><span class="p">(</span><span class="nx">r</span><span class="p">)</span> <span class="p">{}</span></div><div class='line' id='LC382'>	<span class="nx">DD_belatedPNG</span><span class="p">.</span><span class="nx">createVmlNameSpace</span><span class="p">();</span></div><div class='line' id='LC383'>	<span class="nx">DD_belatedPNG</span><span class="p">.</span><span class="nx">createVmlStyleSheet</span><span class="p">();</span></div><div class='line' id='LC384'><br/></div><div class='line' id='LC385'>	<span class="nx">$</span><span class="p">.</span><span class="nx">extend</span><span class="p">(</span><span class="nx">$</span><span class="p">.</span><span class="nx">fn</span><span class="p">,</span> <span class="p">{</span></div><div class='line' id='LC386'>		<span class="nx">fixPng</span><span class="o">:</span> <span class="kd">function</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC387'>			<span class="k">if</span> <span class="p">([,]</span> <span class="o">!=</span> <span class="mi">0</span><span class="p">)</span> <span class="p">{</span> <span class="c1">// IE6/7/8</span></div><div class='line' id='LC388'>				<span class="nx">$</span><span class="p">.</span><span class="nx">each</span><span class="p">(</span><span class="k">this</span><span class="p">,</span> <span class="kd">function</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC389'>					<span class="nx">DD_belatedPNG</span><span class="p">.</span><span class="nx">fixPng</span><span class="p">(</span><span class="k">this</span><span class="p">);</span></div><div class='line' id='LC390'>				<span class="p">});</span></div><div class='line' id='LC391'>			<span class="p">}</span></div><div class='line' id='LC392'>			<span class="k">return</span> <span class="k">this</span><span class="p">;</span></div><div class='line' id='LC393'>		<span class="p">}</span></div><div class='line' id='LC394'>	<span class="p">});</span></div><div class='line' id='LC395'><span class="p">})(</span><span class="nx">jQuery</span><span class="p">);</span></div></pre></div>
          </td>
        </tr>
      </table>
  </div>

          </div>
        </div>

        <a href="#jump-to-line" rel="facebox[.linejump]" data-hotkey="l" class="js-jump-to-line" style="display:none">Jump to Line</a>
        <div id="jump-to-line" style="display:none">
          <form accept-charset="UTF-8" class="js-jump-to-line-form">
            <input class="linejump-input js-jump-to-line-field" type="text" placeholder="Jump to line&hellip;">
            <button type="submit" class="button">Go</button>
          </form>
        </div>

      </div>
    </div>
</div>

<div id="js-frame-loading-template" class="frame frame-loading large-loading-area" style="display:none;">
  <img class="js-frame-loading-spinner" src="https://a248.e.akamai.net/assets.github.com/images/spinners/octocat-spinner-128.gif" height="64" width="64">
</div>


        </div>
      </div>
      <div class="modal-backdrop"></div>
    </div>

      <div id="footer-push"></div><!-- hack for sticky footer -->
    </div><!-- end of wrapper - hack for sticky footer -->

      <!-- footer -->
      <div id="footer">
  <div class="container clearfix">

      <dl class="footer_nav">
        <dt>GitHub</dt>
        <dd><a href="/about">About us</a></dd>
        <dd><a href="/blog">Blog</a></dd>
        <dd><a href="/contact">Contact &amp; support</a></dd>
        <dd><a href="http://enterprise.github.com/">GitHub Enterprise</a></dd>
        <dd><a href="http://status.github.com/">Site status</a></dd>
      </dl>

      <dl class="footer_nav">
        <dt>Applications</dt>
        <dd><a href="http://mac.github.com/">GitHub for Mac</a></dd>
        <dd><a href="http://windows.github.com/">GitHub for Windows</a></dd>
        <dd><a href="http://eclipse.github.com/">GitHub for Eclipse</a></dd>
        <dd><a href="http://mobile.github.com/">GitHub mobile apps</a></dd>
      </dl>

      <dl class="footer_nav">
        <dt>Services</dt>
        <dd><a href="http://get.gaug.es/">Gauges: Web analytics</a></dd>
        <dd><a href="http://speakerdeck.com">Speaker Deck: Presentations</a></dd>
        <dd><a href="https://gist.github.com">Gist: Code snippets</a></dd>
        <dd><a href="http://jobs.github.com/">Job board</a></dd>
      </dl>

      <dl class="footer_nav">
        <dt>Documentation</dt>
        <dd><a href="http://help.github.com/">GitHub Help</a></dd>
        <dd><a href="http://developer.github.com/">Developer API</a></dd>
        <dd><a href="http://github.github.com/github-flavored-markdown/">GitHub Flavored Markdown</a></dd>
        <dd><a href="http://pages.github.com/">GitHub Pages</a></dd>
      </dl>

      <dl class="footer_nav">
        <dt>More</dt>
        <dd><a href="http://training.github.com/">Training</a></dd>
        <dd><a href="/edu">Students &amp; teachers</a></dd>
        <dd><a href="http://shop.github.com">The Shop</a></dd>
        <dd><a href="/plans">Plans &amp; pricing</a></dd>
        <dd><a href="http://octodex.github.com/">The Octodex</a></dd>
      </dl>

      <hr class="footer-divider">


    <p class="right">&copy; 2013 <span title="0.05645s from fe19.rs.github.com">GitHub</span>, Inc. All rights reserved.</p>
    <a class="left" href="/">
      <span class="mega-octicon octicon-mark-github"></span>
    </a>
    <ul id="legal">
        <li><a href="/site/terms">Terms of Service</a></li>
        <li><a href="/site/privacy">Privacy</a></li>
        <li><a href="/security">Security</a></li>
    </ul>

  </div><!-- /.container -->

</div><!-- /.#footer -->


    <div class="fullscreen-overlay js-fullscreen-overlay" id="fullscreen_overlay">
  <div class="fullscreen-container js-fullscreen-container">
    <div class="textarea-wrap">
      <textarea name="fullscreen-contents" id="fullscreen-contents" class="js-fullscreen-contents" placeholder="" data-suggester="fullscreen_suggester"></textarea>
          <div class="suggester-container">
              <div class="suggester fullscreen-suggester js-navigation-container" id="fullscreen_suggester"
                 data-url="/wakuworks/jquery.belatedPNG/suggestions/commit">
              </div>
          </div>
    </div>
  </div>
  <div class="fullscreen-sidebar">
    <a href="#" class="exit-fullscreen js-exit-fullscreen tooltipped leftwards" title="Exit Zen Mode">
      <span class="mega-octicon octicon-screen-normal"></span>
    </a>
    <a href="#" class="theme-switcher js-theme-switcher tooltipped leftwards"
      title="Switch themes">
      <span class="octicon octicon-color-mode"></span>
    </a>
  </div>
</div>



    <div id="ajax-error-message" class="flash flash-error">
      <span class="octicon octicon-alert"></span>
      Something went wrong with that request. Please try again.
      <a href="#" class="octicon octicon-remove-close ajax-error-dismiss"></a>
    </div>

    
    <span id='server_response_time' data-time='0.05683' data-host='fe19'></span>
    
  </body>
</html>

