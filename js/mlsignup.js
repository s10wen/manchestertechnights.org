(function() {

    // Feature detection - only support modern browsers
    if (
        'XMLHttpRequest' in window
        && 'FormData' in window
        && 'querySelector' in document
        && 'addEventListener' in window
        && 'classList' in document.body
        && 'dataset' in document.body
        && typeof document.createElement("input").checkValidity == "function"
    ) {

        var mailingListBanner = document.querySelector('.mailing-list-banner'),
            signupForm = mailingListBanner.querySelector('form'),
            signupMessage = mailingListBanner.querySelector('p'),
            csrfToken = document.body.dataset['csrfToken'],
            signedUpCookie = 'mailingListSignUp';

        function getCookie(key) {
            return decodeURIComponent(
                document.cookie.replace(
                    new RegExp("(?:(?:^|.*;)\\s*" + encodeURIComponent(key).replace(/[\-\.\+\*]/g, "\\$&") + "\\s*\\=\\s*([^;]*).*$)|^.*$"),
                    "$1"
                )
            ) || null
        }

        function handleXhrComplete(request) {
            if (request.status === 200) {
                try {
                    var response = JSON.parse(request.responseText);
                    if (response.success) {
                        reportSignUpSuccess();
                    } else {
                        reportSignUpError();
                    }
                } catch (e) {
                    reportSignUpError();
                }
            } else {
                reportSignUpError();
            }
        }

        function reportSignUpSuccess() {
            signupMessage.innerText = 'Thanks for signing up!';
            document.cookie = signedUpCookie + '=true; max-age=' + (60 * 60 * 24 * 365 * 10) + '; path=/';
            setTimeout(function() {
                mailingListBanner.classList.remove('enabled');
            }, 5000);
        }

        function reportSignUpError() {
            signupMessage.innerText = 'Sorry, but an error occurred.';
        }

        if (getCookie(signedUpCookie) !== 'true') {
            window.addEventListener('load', function() {
                mailingListBanner.classList.add('enabled');
            });
        }

        signupForm.addEventListener('submit', function(ev) {
            ev.preventDefault();

            if (this.checkValidity()) {
                signupForm.parentNode.removeChild(signupForm);
                signupMessage.innerText = 'Signing you up now!';

                var request = new XMLHttpRequest();
                request.open('POST', this.action, true);
                request.onreadystatechange = function() {
                    if (request.readyState === 4) {
                        handleXhrComplete(request);
                    }
                };

                var data = new FormData();
                data.append('email', signupForm.querySelector('#email').value);
                data.append('csrftoken', csrfToken);

                request.send(data);
            } else {
                signupForm.querySelector('input').classList.add('warn');
            }

        });

    }

})();
