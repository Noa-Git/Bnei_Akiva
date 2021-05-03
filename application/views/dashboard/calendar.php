<?php
?>
<script type="text/javascript">
    /*
     * Create form to request access token from Google's OAuth 2.0 server.
     */
    function oauthSignIn() {
        // Google's OAuth 2.0 endpoint for requesting an access token
        var oauth2Endpoint = 'https://accounts.google.com/o/oauth2/v2/auth';

        // Create <form> element to submit parameters to OAuth 2.0 endpoint.
        var form = document.createElement('form');
        form.setAttribute('method', 'GET'); // Send as a GET request.
        form.setAttribute('action', oauth2Endpoint);

        // Parameters to pass to OAuth 2.0 endpoint.
        var params = {
            'client_id': '912790116069-rg890mlsen05s0712o0qchrjlt2jpvfe.apps.googleusercontent.com',
            'redirect_uri': 'https://iliash-is.mtacloud.co.il/dashboard/guide',
            'response_type': 'token',
            'scope': 'https://www.googleapis.com/auth/drive.metadata.readonly',
            'include_granted_scopes': 'true',
            'state': 'pass-through value'
        };

        // Add form parameters as hidden input values.
        for (var p in params) {
            var input = document.createElement('input');
            input.setAttribute('type', 'hidden');
            input.setAttribute('name', p);
            input.setAttribute('value', params[p]);
            form.appendChild(input);
        }

        // Add form to page and submit it to open the OAuth 2.0 endpoint.
        document.body.appendChild(form);
        form.submit();

        var xhr = new XMLHttpRequest();

        //request to google calnder api
        xhr.open('GET',
            'https://www.googleapis.com/drive/v3/about?fields=user&' +
            'access_token=' + params['access_token']);
        xhr.onreadystatechange = function(e) {
            console.log(xhr.response);
        };
        xhr.send(null);
    }
</script>