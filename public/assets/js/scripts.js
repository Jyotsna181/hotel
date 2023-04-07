/*!
    * Start Bootstrap - SB Admin v7.0.5 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2022 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
    // 
// Scripts
// 

window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});
const fileUpload = document.getElementById('image-upload');
            const cardImage = document.querySelector('.profile-image');

            fileUpload.addEventListener('change', function() {
                const file = this.files[0];
                const reader = new FileReader();

                reader.addEventListener('load', function() {
                    cardImage.src = reader.result;
                    cardImage.classList.remove('hidden');
                });

                reader.readAsDataURL(file);
            });

            function moveToNext(input, event) {
            if (input.value.length >= input.maxLength) {
                var next = input.parentElement.nextElementSibling.querySelector('input');
                if (next != null) {
                next.focus();
                }
            }
            }


            