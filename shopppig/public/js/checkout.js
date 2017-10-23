Stripe.setPublishableKey('pk_test_uY5BmlBs2qS3E5E9xK8n1gko');
var $form = $('#form-check');
$form.submit(function(event){
  $('#charge-error').addClass('hidden');
    $form.find('button').prop('disabled',true);
	Stripe.card.createToken({
		
  number: $('#credit-card-number').val(),
  cvc: $('#cvc').val(),
  exp_month: $('#card-expiry-month').val(),
  exp_year: $('#card-expiry-year').val(),
  name:$('#card-holder-name').val()
}, stripeResponseHandler);
	return false;


});

//credit data verifier
function stripeResponseHandler(status, response) {

  

  if (response.error) { // Problem!

    // Show the errors on the form
    $('#charge-error').removeClass('hidden');
    $('#charge-error').text(response.error.message);
    $form.find('button').prop('disabled', false); // Re-enable submission

  } else { // Token was created!

    // Get the token ID:
    var token = response.id;

    // Insert the token into the form so it gets submitted to the server:
    $form.append($('<input type="hidden" name="stripeToken" />').val(token));

    // Submit the form:
    $form.get(0).submit();

  }
}