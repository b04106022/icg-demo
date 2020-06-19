<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Face Morpher (2/2)</title>
        <link rel="icon" type="image/x-icon" href="web/assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="web/css/styles.css" rel="stylesheet" />
        <?php
        move_uploaded_file($_FILES["file1"]["tmp_name"],"upload/".$_FILES["file1"]["name"]);
        move_uploaded_file($_FILES["file2"]["tmp_name"],"upload/".$_FILES["file2"]["name"]);
        
        $filename1=$_FILES["file1"]["name"];
        $filename2=$_FILES["file2"]["name"];
        
        $path1="upload/".$filename1;
        $path2="upload/".$filename2;
        $folder=explode(".", $filename1)[0]."-".explode(".", $filename2)[0];

        $cmd="python web-faceMorph.py -i1 ".$path1." -i2 ".$path2." -f 100";
        shell_exec($cmd);
        $cmd2="python web-png2gif.py -p results/web/".$folder;
        shell_exec($cmd2);
        ?>
        <script language="javascript">
            function setAlpha(val) {  
                var folder="<?php echo $folder; ?>";
                path="results/web/"+folder+"/"+val.padStart(3, "0")+".png";
                document.getElementById('midway').src=path;
    
                alpha=val/100;
                document.getElementById('getAlpha').innerHTML=alpha;
            }
        </script>
    </head>
    <body id="page-top">
    

        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="web/index.html#page-top">Face Morpher</a><button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menu<i class="fas fa-bars ml-1"></i></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="web/index.html#faceMorphing">Face Morphing</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="web/index.html#portfolio">Demo</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="web/index.html#method">Method</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="web/index.html#try">Try It</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Form -->
        <section class="page-section" id="form">
            <div class="container">
                <div class="text-center">
                    <br><br><h2>Results</h2>
                    <p>You can scroll the bar to see how the value of alpha changes and the differences between the photos.</p><br>
                </div>
                <div class="text-center">
                    <p>Alpha=<span id="getAlpha">0.5</span></p>
                    <input type="range" id="setAlpha" min="0" max="100" value="50" onchange="setAlpha(this.value);" ><br>
                    <?php echo '<img id="midway" src="results/web/'.$folder.'/050.png" alt="" height=500>' ?>
                    <br><br><br><p>nframes=100</p>
                    <?php echo '<img src="results/web/'.$folder.'/morphing.gif" alt="" height=500>' ?>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-left"></div>
                    <div class="col-lg-4 my-3 my-lg-0">Copyright © NTUCSIE R08944029 2020</div>
                    <div class="col-lg-4 text-lg-right"><a class="mr-3" href="#!">Privacy Policy</a><a href="#!">Terms of Use</a></div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Contact form JS-->
        <script src="web/assets/mail/jqBootstrapValidation.js"></script>
        <script src="web/assets/mail/contact_me.js"></script>
        <!-- Core theme JS-->
        <script src="web/js/scripts.js"></script>
    </body>
</html>
