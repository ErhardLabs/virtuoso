$=jQuery;
$(document).ready(function() {

  if (localized_sexy_config.sexy_woocheckout_show_form_labels == 'no') {
    $('.woocommerce-billing-fields label').hide();
    $('.shipping_address .woocommerce-shipping-fields label').hide();
  }

  if (localized_sexy_config.sexy_woocheckout_show_additional_information == 'no') {
    $('.woocommerce-additional-fields').hide();
  }

  // CHECK CREATE ACCOUNT BY DEFAULT
  if ($('#createaccount').length > 0) {
    $('#createaccount').prop("checked", true);
  }

});