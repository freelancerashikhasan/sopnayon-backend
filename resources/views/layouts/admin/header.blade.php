<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>PSVOBD</title>
<link
  href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;600&display=swap"
  rel="stylesheet"
/>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="robots" content="index, follow" />
<meta name="author" content="PSVOBD" />

<!-- Basic Meta Tags -->
<title>PSVOBD - Empowering Businesses for the Future</title>
<meta
  name="description"
  content="PSVOBD is an organization dedicated to empowering businesses with cutting-edge solutions, technology, and strategic insights."
/>
<meta
  name="keywords"
  content="business, technology, solutions, empowerment, organization, PSVOBD"
/>
<meta name="theme-color" content="#000000" />

<!-- Open Graph Meta Tags for Social Media Sharing -->
<meta
  property="og:title"
  content="PSVOBD - Empowering Businesses for the Future"
/>
<meta
  property="og:description"
  content="PSVOBD is an organization dedicated to empowering businesses with cutting-edge solutions, technology, and strategic insights."
/>
<meta property="og:image" content="/src/assets/images/logo.png" />
<meta property="og:url" content="https://www.psvobd.org" />
<meta property="og:type" content="website" />

<!-- Twitter Card Meta Tags -->
<meta name="twitter:card" content="summary_large_image" />
<meta
  name="twitter:title"
  content="PSVOBD - Empowering Businesses for the Future"
/>
<meta
  name="twitter:description"
  content="PSVOBD is an organization dedicated to empowering businesses with cutting-edge solutions, technology, and strategic insights."
/>
<meta name="twitter:image" content="/src/assets/images/logo.png" />

<!-- Link to favicon -->
<link rel="icon" href="/src/assets/images/logo.png" type="image/png" />

<!-- Open Graph Image for better display in social sharing -->
<meta property="og:image:width" content="1200" />
<meta property="og:image:height" content="630" />

<!-- Canonical URL -->
<link rel="canonical" href="https://www.psvobd.org" />

<!-- Favicon -->
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('storage/company/'.siteSettings()->logo) }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('storage/company/'.siteSettings()->logo) }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('storage/company/'.siteSettings()->logo) }}">
<link rel="mask-icon" href="{{ asset('storage/company/'.siteSettings()->logo) }}" color="#0010f7">
<meta name="msapplication-TileColor" content="#0010f7">
<meta name="theme-color" content="#ffffff">

<!-- Font -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet" />

<!-- Plugin -->
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/plugin/swiper-bundle.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/icons/iconly/index.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/icons/remix-icon/index.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/colors.css">

<!-- Base -->
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/base/typography.css">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/base/base.css">

<!-- Theme -->
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/theme/colors-dark.css">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/theme/theme-dark.css">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/custom-rtl.css">

<!-- Layouts -->
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/layouts/sider.css">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/layouts/header.css">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/layouts/page-content.css">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/components.css">
<!-- Customizer -->
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/layouts/customizer.css">

<!-- Charts -->
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/plugin/apex-charts.css">

<!-- Pages -->
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/pages/dashboard-analytics.css">

<!-- Custom -->
<link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">

<title>Yoda Admin Html Template</title>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<!-- Buttons CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

@stack('css')
<style>
    .dt-buttons button{
        background-color: #52b141 !important;
        color: white !important;
    }
    .select2-selection--single{
        height: 40px !important;
        padding-top: 5px;
        border: 1px solid black  !important;
        width: 100% !important;
    }
</style>
