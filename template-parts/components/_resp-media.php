<?php
$field = $template_args['field'] ?? null;
$type = $field['media_type'] ?? null;
$sizes = $template_args['sizes'] ?? '100vw';
$ID = $template_args['ID'] ?? null;
$aspect_ratio = $template_args['aspect_ratio'] ?? 'native';
$contain = $template_args['contain'] ?? false;
$attrs = $template_args['attrs'] ?? '';
$imgAttrs = $template_args['imgAttrs'] ?? '';
$loading = $template_args['loading'] ?? 'lazy';

$class = $template_args['class'] ?? '';
$class = 'media ' . $class;

if ($aspect_ratio === 'native') {
  $class .= ' media--native';
} else {
  $class .= ' media--' . $aspect_ratio;
}

// default vars
$src = '';
$srcset = '';
$alt = '';
$is_native = false;

if ($type) {
  if ($type == 'image'):
    $image = $field['image'] ?? null;
  elseif ($type == 'video'):
    $video = $field['video'] ?? null;
    $poster = $field['poster'] ?? null;
  endif;
} else {
  $image = $field;
}

// Video
if ($type == 'video'): ?>
  <div class="<?php echo $class; ?>" <?php echo $attrs; ?>>
    <video loop autoplay playsinline muted <?php if ($poster) {
      echo 'poster="' . $poster['url'] . '"';
    } ?>>
      <source data-src="<?php echo $video; ?>" type="video/mp4"/>
    </video>
  </div>
<?php else:
  if ($image) {
    $src = $image['url'];
    $src_width = $image['width'];
    $alt = $image['alt'];
    $width = $image['width'];
    $height = $image['height'];

    if ($image['mime_type'] === 'image/gif') {
      $srcset = $image['url'];
    } else {
      $srcset = wp_get_attachment_image_srcset($image['ID']);
      if ($srcset) {
        $srcset .= ', ' . $src . ' ' . $src_width . 'w';
      } else {
        $srcset = $src;
      }
    }
  } elseif ($ID) {
    $img_id = get_post_thumbnail_id($ID);
    if (!$img_id) {
      $default_image = get_field('default_blog_image', 'option');
      $img_id = $default_image['ID'];
    }
    if ($img_id) {
      $type = get_post_mime_type($img_id);
      $mime_type = explode('/', $type);
      $alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);
      $attachment_image = wp_get_attachment_image_src($img_id, 'full');
      $src = $attachment_image[0];
      $width = $attachment_image[1];
      $height = $attachment_image[2];

      if ($mime_type['1'] == 'gif') {
        $srcset = $src;
      } else {
        $srcset = wp_get_attachment_image_srcset($img_id);

        if ($srcset) {
          $srcset .= ', ' . $src . ' ' . $width . 'w';
        } else {
          $srcset = $src;
        }
      }
    }
  }

  if (!$src) {
    return;
  }

  $is_native = $aspect_ratio === 'native' && $width && $height;

  if (!$srcset) {
    $srcset = $src;
  }
  if ($src): ?>
    <div class="<?php echo $class; ?>" <?php
echo $attrs;
if ($is_native):
  echo ' style="--aspect-ratio: calc(100% * ' . $height . ' / ' . $width . ')"';
endif;
?>>
      <img
        width="<?php echo $width; ?>"
        height="<?php echo $height; ?>"
        src="<?php echo $src; ?>"
        srcset="<?php echo $srcset; ?>"
        sizes="<?php echo $sizes; ?>"
        alt="<?php echo $alt; ?>"
        loading="<?php echo $loading; ?>"
        <?php echo $imgAttrs; ?>
        >
    </div>
  <?php endif;
  ?>
<?php endif;
?>

