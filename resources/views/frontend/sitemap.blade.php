<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>'; ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    <url>
        <loc><?php echo url('/'); ?></loc>
    </url>

    <url>
        <loc><?php echo route('about'); ?></loc>
    </url>

    <url>
        <loc><?php echo route('products'); ?></loc>
    </url>

    <url>
        <loc><?php echo route('blogs'); ?></loc>
    </url>

    <url>
        <loc><?php echo route('contact'); ?></loc>
    </url>

    <?php foreach ($products as $product): ?>

    <url>
        <loc><?php echo route('product.details', $product->slug); ?></loc>
    </url>

    <?php endforeach; ?>

    <?php foreach ($blogs as $blog): ?>

    <url>
        <loc><?php echo route('blog.details', $blog->slug); ?></loc>
    </url>

    <?php endforeach; ?>

</urlset>
