<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title')</title>
    <meta content="@yield('description')" name="description">
    @include('website.layouts.link')
</head>

<body>
@include('website.layouts.header')
<main id="main">

@include('website.layouts.breadcrumbs')

<!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-8 entries">
                    @yield('page_content')
                </div><!-- End blog entries list -->
                <div class="col-lg-4">
                    <div class="sidebar">
                        @include('website.layouts.sidebar')
                    </div><!-- End sidebar -->
                </div><!-- End blog sidebar -->
            </div>
        </div>
    </section><!-- End Blog Section -->

</main><!-- End #main -->
@include('website.layouts.footer')

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

@include('website.layouts.script')

</body>

</html>
