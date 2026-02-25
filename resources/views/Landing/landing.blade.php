<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <title>test</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    @include('components.section.navbar')
    @include('components.section.hero')
    @include('components.section.about')
    @include('components.section.top-animal')
    @include('components.section.tips-kesehatan-hewan')
    @include('components.section.top-products')
    @include('components.section.statistik')
    @include('components.section.testimonial')
    @include('components.section.alamat-dan-social-media')
    @include('components.CTA-Banner')
    @include('components.footer')
    @include('components.to-top')
</body>

</html>
