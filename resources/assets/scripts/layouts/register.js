export const Register = {
  onLoad: function() {
    if ( $('#register').length ) {
      Register.onFormSubmit();
    }
  },
  onFormSubmit: function() {
    $('#register').on('submit', function(e) {
      e.preventDefault();
      $(this).find('[type="submit"]').prop('disabled', true);
      // TODO: Validate form
      Register.formSubmit( $(this) );
    });
  },
  formSubmit: function( $form ) {
    $.ajax({
      url: $form.attr('action'),
      data: $form.serialize(),
      type: 'POST',
      config: { headers: {'Content-Type': 'multipart/form-data' }},
      success: function( response ) {
        const res = JSON.parse(response);
        if ( res.success ) {
          /* eslint-disable no-undef */
          location.href = Theme.site_url + '/my-account';
        } else {
          console.error(res.msg);
          $('#register .alert-danger .text-danger').text(res.msg).show();
          $('#register [type="submit"]').prop('disabled', false);
        }
      },
    });
  },
}
