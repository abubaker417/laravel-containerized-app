<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ✅ STEP 1: Paste your Google verification tag here -->
    <!-- Get this from: search.google.com/search-console → HTML tag method -->
    <meta name="google-site-verification" content="PASTE_YOUR_CODE_HERE">

    <!-- PRIMARY SEO TAGS -->
    <title>DevOps Lab | Web, Mobile & Cloud Solutions</title>
    <meta name="title"       content="DevOps Lab | Web, Mobile & Cloud Solutions">
    <meta name="description" content="DevOps Lab provides professional web development, mobile app development, cloud solutions, and IT services tailored for modern businesses.">
    <meta name="keywords"    content="web development, mobile app, cloud solutions, IT services, DevOps Lab">
    <meta name="author"      content="DevOps Lab">
    <meta name="robots"      content="index, follow">

    <!-- FAVICON -->
    <link rel="icon"             type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon"             type="image/png" sizes="32x32" href="{{ asset('favicon.ico') }}">
    <link rel="icon"             type="image/png" sizes="16x16" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="180x180"              href="{{ asset('favicon.ico') }}">
    <link rel="manifest"         href="{{ asset('site.webmanifest') }}">

    <!-- CANONICAL URL -->
    <link rel="canonical" href="https://devopslab.info/">

    <!-- OPEN GRAPH -->
    <meta property="og:type"         content="website">
    <meta property="og:url"          content="https://devopslab.info/">
    <meta property="og:title"        content="DevOps Lab | Web, Mobile & Cloud Solutions">
    <meta property="og:description"  content="DevOps Lab provides professional web development, mobile app development, cloud solutions, and IT services tailored for modern businesses.">
    <meta property="og:image"        content="https://devopslab.info/og-image.jpg">
    <meta property="og:image:width"  content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:site_name"    content="DevOps Lab">
    <meta property="og:locale"       content="en_US">

    <!-- TWITTER CARD -->
    <meta name="twitter:card"        content="summary_large_image">
    <meta name="twitter:url"         content="https://devopslab.info/">
    <meta name="twitter:title"       content="DevOps Lab | Web, Mobile & Cloud Solutions">
    <meta name="twitter:description" content="DevOps Lab provides professional web development, mobile app development, cloud solutions, and IT services tailored for modern businesses.">
    <meta name="twitter:image"       content="https://devopslab.info/og-image.jpg">

    <!-- SCHEMA / STRUCTURED DATA -->
    @verbatim
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "DevOps Lab",
        "url": "https://devopslab.info",
        "logo": "https://devopslab.info/favicon.ico",
        "description": "Professional web development, mobile app development, cloud solutions, and IT services.",
        "contactPoint": {
            "@type": "ContactPoint",
            "contactType": "customer support",
            "availableLanguage": "English"
        }
    }
    </script>
    @endverbatim

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Instrument Sans', 'Segoe UI', sans-serif;
            background: #0f172a;
            color: #f1f5f9;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .container {
            max-width: 700px;
            width: 100%;
            text-align: center;
        }

        .badge {
            display: inline-block;
            background: #1e40af;
            color: #93c5fd;
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            padding: 0.35rem 1rem;
            border-radius: 999px;
            margin-bottom: 1.5rem;
        }

        h1 {
            font-size: 2.5rem;
            font-weight: 700;
            color: #ffffff;
            line-height: 1.2;
            margin-bottom: 1rem;
        }

        h1 span { color: #3b82f6; }

        p.desc {
            font-size: 1.1rem;
            color: #94a3b8;
            line-height: 1.7;
            margin-bottom: 2.5rem;
        }

        .services {
            display: flex;
            flex-wrap: wrap;
            gap: 0.75rem;
            justify-content: center;
            margin-bottom: 2.5rem;
        }

        .tag {
            background: #1e293b;
            border: 1px solid #334155;
            color: #cbd5e1;
            padding: 0.4rem 1rem;
            border-radius: 999px;
            font-size: 0.875rem;
        }

        .btn {
            display: inline-block;
            background: #3b82f6;
            color: #ffffff;
            padding: 0.75rem 2rem;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            text-decoration: none;
            transition: background 0.2s;
        }

        .btn:hover { background: #2563eb; }

        footer {
            margin-top: 3rem;
            font-size: 0.8rem;
            color: #475569;
        }
    </style>
</head>
<body>
    <div class="container">

        <span class="badge">🚀 Now Live</span>

        <h1>DevOps <span>Lab</span></h1>

        <p class="desc">
            Professional web development, mobile app development,
            cloud solutions, and IT services tailored for modern businesses.
        </p>

        <div class="services">
            <span class="tag">Web Development</span>
            <span class="tag">Mobile Apps</span>
            <span class="tag">Cloud Solutions</span>
            <span class="tag">IT Services</span>
            <span class="tag">AWS Hosting</span>
        </div>

        <a href="mailto:info@devopslab.info" class="btn">Contact Us</a>

        <footer>
            &copy; {{ date('Y') }} DevOps Lab. All rights reserved.
        </footer>

    </div>
</body>
</html>