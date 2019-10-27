// Navigation toggle
jQuery(document).ready(function () {
      jQuery('#primary-menu-toggle').on('click', function (e) {
            e.preventDefault();

            jQuery('#primary-menu').toggle();
      });
});
