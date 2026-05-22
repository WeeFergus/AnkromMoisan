<?php
$link = $template_args['field'] ?? null;
$class = $template_args['class'] ?? '';
$link_class = $template_args['link_class'] ?? '';
$attrs = $template_args['attrs'] ?? '';
$icon = $template_args['icon'] ?? null;
$with_arrow = $template_args['with_arrow'] ?? false;

if ($link):

  $link_url = $link['url'];
  $link_title = $link['title'];
  $link_target = $link['target'] ?? '_self';
  ?>
<div class="<?php echo $class; ?>" <?php echo $attrs; ?>>
  <a class="group <?php echo $link_class; ?>" href="<?php echo esc_url(
  $link_url
); ?>" target="<?php echo esc_attr($link_target); ?>">
    <?php echo esc_html($link_title); ?>
    <?php if ($icon):
      echo $icon;
    elseif ($with_arrow): ?>
      <svg class="-ml-3" xmlns="http://www.w3.org/2000/svg" width="35" height="24" viewBox="0 0 35 24" fill="none">
        <path class="stroke-current" d="M24 4L32 12L24 20" stroke-width="5" stroke-linecap="square" stroke-linejoin="round"/>
        <path class="origin-right scale-x-75 stroke-current transition-transform duration-300 group-hover:scale-x-100" d="M0 12H32" stroke-width="5"/>
      </svg>
    <?php endif; ?>
  </a>
</div>
<?php
endif; ?>
