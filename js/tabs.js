jQuery(document).ready(function() {
    jQuery('.htmltabs .htmltab-links a').on('click', function(e)  {
        var currentAttrValue = jQuery(this).attr('href');
 
        // Show/Hide htmltabs
        jQuery('.htmltabs ' + currentAttrValue).slideDown(400).siblings().slideUp(400);
 
        // Change/remove current htmltab to active
        jQuery(this).parent('li').addClass('active').siblings().removeClass('active');
 
        e.preventDefault();
    });
});