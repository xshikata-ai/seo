<?php
include dirname(__FILE__) . '/.private/config.php';
// index.php - Front-end Main Page

$configFile = __DIR__ . '/includes/site-config.json';
$config = file_exists($configFile) ? json_decode(file_get_contents($configFile), true) : [];

$seo = $config['seo'] ?? [];
$settings = $config['settings'] ?? [];
$custom = $config['custom'] ?? [];
$ads = $config['ads'] ?? [
    'top' => '',
    'middle' => '',
    'sidebar' => '',
];

$toolsFile = __DIR__ . '/includes/tools.json';
$tools = file_exists($toolsFile) ? json_decode(file_get_contents($toolsFile), true) : [];

$categories = [];
foreach ($tools as $tool) {
    if (!empty($tool['status'])) {
        $categories[$tool['category']][] = $tool;
    }
}

// FontAwesome icon mapping
$categoryIcons = [
    'pdf'     => 'fa-file-pdf',
    'image'   => 'fa-image',
    'text'    => 'fa-font',
    'encrypt' => 'fa-lock',
    'dev'     => 'fa-code',
    'file'    => 'fa-file',
    'math'    => 'fa-calculator',
    'media'   => 'fa-photo-film',
    'web'     => 'fa-globe',
    'misc'    => 'fa-toolbox'
];

include __DIR__ . '/includes/public-header.php';
?>

<?= !empty($custom['header_html']) ? $custom['header_html'] : '' ?>

<?php if (!empty($ads['top'])): ?>
    <div class="container mb-3 text-center">
        <?= $ads['top'] ?>
    </div>
<?php endif; ?>

<!-- Hero Section -->
<section class="container text-center my-5">
    <h1 class="display-4 fw-bold mb-3">
        <i class="fa-solid fa-toolbox text-primary me-2"></i><?= htmlspecialchars($settings['site_title'] ?? 'WebTools') ?>
    </h1>
    <p class="lead text-muted"><?= htmlspecialchars($settings['site_slogan'] ?? 'Professional Online Tools') ?></p>
</section>

<!-- Categories Section -->
<section id="categories" class="py-5 bg-light">
    <div class="container">
        <h2 class="mb-4 text-center"><i class="fa-solid fa-layer-group icon"></i> Tool Categories</h2>
        <div class="row g-4">
            <?php foreach ($categories as $cat => $toolsList): 
                $icon = $categoryIcons[$cat] ?? 'fa-toolbox'; ?>
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm text-center p-4 category-hover filter-category" data-category="<?= htmlspecialchars($cat) ?>" style="cursor: pointer;">
                        <i class="fa-solid <?= $icon ?> text-primary mb-3" style="font-size: 2rem;"></i>
                        <h5 class="fw-bold text-capitalize"><?= str_replace('_', ' ', $cat) ?></h5>
                        <p class="text-muted"><?= count($toolsList) ?> tool(s) available</p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Tools Section -->
<section id="tools" class="py-5">
    <div class="container">
        <h2 class="mb-4 text-center"><i class="fa-solid fa-wrench icon"></i> All Tools</h2>
        <div class="row">
            <div class="col-md-9">
                <?php foreach ($categories as $category => $toolsList): 
                    $icon = $categoryIcons[$category] ?? 'fa-toolbox'; ?>
                    <section class="tool-section my-5" data-category="<?= htmlspecialchars($category) ?>">
                        <h3 class="mb-4 text-capitalize d-flex align-items-center gap-2">
                            <i class="fa-solid <?= $icon ?> text-secondary"></i>
                            <?= htmlspecialchars(str_replace('_', ' ', ucfirst($category))) ?>
                        </h3>
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                            <?php foreach ($toolsList as $tool): ?>
                                <div class="col">
                                    <div class="card h-100 shadow-sm">
                                        <div class="card-body">
                                            <h5 class="card-title d-flex align-items-center gap-2">
                                                <i class="fa-solid <?= $icon ?> text-primary"></i>
                                                <?= htmlspecialchars($tool['name']) ?>
                                            </h5>
                                            <p class="card-text"><?= htmlspecialchars($tool['desc']) ?></p>
                                        </div>
                                        <div class="card-footer text-end bg-transparent border-0">
                                            <a href="<?= htmlspecialchars($tool['link']) ?>" class="btn btn-primary">Use Tool</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </section>
                <?php endforeach; ?>

                <?php if (!empty($ads['middle'])): ?>
                    <div class="text-center mb-5">
                        <?= $ads['middle'] ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="col-md-3">
                <div class="sticky-top" style="top:100px;">
                    <?php if (!empty($ads['sidebar'])): ?>
                        <div class="bg-light p-3 mb-3">
                            <?= $ads['sidebar'] ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="py-5 bg-light">
    <div class="container text-center">
        <h3><i class="fa-solid fa-circle-info icon"></i> About <?= htmlspecialchars($settings['site_title'] ?? 'WebTools') ?></h3>
        <p class="mt-3">
            <?= htmlspecialchars($seo['meta_description'] ?? 'Your go-to hub for free and professional web tools designed to simplify your workflow.') ?>
        </p>
    </div>
</section>

<?= !empty($custom['footer_html']) ? $custom['footer_html'] : '' ?>
<?php include __DIR__ . '/includes/public-footer.php'; ?>

<!-- JavaScript: Category Filter -->
<script>
    const categoryBoxes = document.querySelectorAll('.filter-category');
    const toolSections = document.querySelectorAll('.tool-section');

    categoryBoxes.forEach(box => {
        box.addEventListener('click', () => {
            const category = box.dataset.category;
            toolSections.forEach(section => {
                section.style.display = section.dataset.category === category ? 'block' : 'none';
            });

            // Scroll to tools section
            const scrollTarget = document.getElementById('tools');
            scrollTarget.scrollIntoView({ behavior: 'smooth' });
        });
    });
</script>

<!-- CSS: You can also move this to style.css -->
<style>
    .category-hover {
        transition: transform 0.3s ease, background-color 0.3s ease;
    }
    .category-hover:hover {
        transform: translateY(-5px);
        background-color: #f9f9f9;
    }
</style>
