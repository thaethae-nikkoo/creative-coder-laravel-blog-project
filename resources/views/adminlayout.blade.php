<!-- /*
* Template Name: Blogy
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="favicon.png">

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap5" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/fonts/icomoon/style.css">
    <link rel="stylesheet" href="/fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="/css/tiny-slider.css">
    <link rel="stylesheet" href="/css/aos.css">
    <link rel="stylesheet" href="/css/glightbox.min.css">
    <link rel="stylesheet" href="/css/style.css">

    <link rel="stylesheet" href="/css/flatpickr.min.css">
    <script src="/ckeditor/ckeditor.js"></script>

    <title>Blogy &mdash;</title>
</head>

<body>
    <x-navbar />
    <div class="container py-2">
        <div class="row">
            <div class="col-lg-3 mt-5 pt-4">
                <ul class="list-group">
                    <li class="list-group-item"><a href="/admin/blogs/dashboard">Dashboard</a></li>
                    <li class="list-group-item"><a href="/admin/blogs/create">Create Blogs</a></li>

                </ul>
            </div>
            <div class="col-lg-9">@yield('content')</div>
        </div>
    </div>

    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/tiny-slider.js"></script>

    <script src="/js/flatpickr.min.js"></script>

    <script src="/js/aos.js"></script>
    <script src="/js/glightbox.min.js"></script>
    <script src="/js/navbar.js"></script>
    <script src="/js/counter.js"></script>
    <script src="/js/custom.js"></script>

    <script>
        ClassicEditor.create(document.querySelector(".editor"), {
            licenseKey: "",
          })
            .then((editor) => {
              window.editor = editor;
            })
            .catch((error) => {
              console.error("Oops, something went wrong!");
              console.error(
                "Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:"
              );
              console.warn("Build id: jmpcmxseambi-vvp31xzcaa25");
              console.error(error);
            });
    </script>
</body>

</html>
