<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SBTBD - Sinthi Build Tech</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <header class="bg-dark text-white text-center py-4">
        <h1 class="display-4">SBTBD</h1>
        <p>Sinthi Build Tech</p>
    </header>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div id="banner" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ul class="carousel-indicators">
                        <li data-target="#banner" data-slide-to="0" class="active"></li>
                        <li data-target="#banner" data-slide-to="1"></li>
                        <li data-target="#banner" data-slide-to="2"></li>
                    </ul>

                    <!-- The slideshow -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="bag.jpg" alt="Image 1" class="d-block w-100">
                        </div>
                        <div class="carousel-item">
                            <img src="bag.jpg" alt="Image 2" class="d-block w-100">
                        </div>
                        <div class="carousel-item">
                            <img src="image3.jpg" alt="Image 3" class="d-block w-100">
                        </div>
                    </div>

                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#banner" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#banner" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>
            </div>

            <div class="col-md-12">
                <section id="notices">
                    <h2>Notices</h2>
                    <div class="notice">
                        <h4>Notice 1</h4>
                        <p><i class="fas fa-file-pdf"></i> <a href="bag.jpg" target="_blank">Download PDF</a></p>
                    </div>
                    <div class="notice">
                        <h4>Notice 2</h4>
                        <p><i class="fas fa-file-word"></i> <a href="notice2.docx" target="_blank">Download DOCX</a></p>
                    </div>
                    <div class="notice">
                        <h4>Notice 3</h4>
                        <p><i class="fas fa-file-excel"></i> <a href="notice3.xlsx" target="_blank">Download XLSX</a></p>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS and Font Awesome Icons -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"></script>
</body>
</html>
