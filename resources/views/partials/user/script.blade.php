    <script src="{{ asset('assets/user/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/user/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/user/js/tiny-slider.js') }}"></script>
    <script src="{{ asset('assets/user/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/user/js/main.js') }}"></script>
    <script src="{{ asset('assets/user/js/language-dropdown.js') }}"></script>
    <script src="{{ asset('assets/user/js/dropzone.min.js') }}"></script>
    <script src="{{ asset('assets/user/js/cleave.min.js') }}"></script>
    <script src="{{ asset('assets/user/js/jquery.inputmask.min.js') }}"></script>
    <script src="{{ asset('assets/user/js/leaflet.js') }}"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <script>
        $('#salary_from').inputmask('decimal', {
            groupSeparator: ' ',
            digits: 0,
            rightAlign: false,
            autoGroup: true,
            allowMinus: false, // Minus belgisini cheklaydi
            clearIncomplete: true
        });

        $('#salary_to').inputmask('decimal', {
            groupSeparator: ' ',
            digits: 0,
            rightAlign: false,
            autoGroup: true,
            allowMinus: false,
            clearIncomplete: true
        });

        document.addEventListener("DOMContentLoaded", function() {
            Inputmask({
                "mask": "99 999 99 99"
            }).mask("#phone");
        });
    </script>
    <script type="text/javascript">
        //====== Clients Logo Slider
        tns({
            container: '.client-logo-carousel',
            slideBy: 'page',
            autoplay: true,
            autoplayButtonOutput: false,
            mouseDrag: true,
            gutter: 15,
            nav: false,
            controls: false,
            responsive: {
                0: {
                    items: 1,
                },
                540: {
                    items: 2,
                },
                768: {
                    items: 3,
                },
                992: {
                    items: 4,
                },
                1170: {
                    items: 6,
                }
            }
        });
        //========= testimonial 
        tns({
            container: '.testimonial-slider',
            items: 1,
            slideBy: 'page',
            autoplay: false,
            mouseDrag: true,
            gutter: 0,
            nav: false,
            controls: true,
            controlsText: ['<i class="lni lni-arrow-left"></i>', '<i class="lni lni-arrow-right"></i>'],
            responsive: {
                0: {
                    items: 1,
                },
                540: {
                    items: 1,
                },
                768: {
                    items: 1,
                },
                992: {
                    items: 1,
                },
                1170: {
                    items: 1,
                }
            }
        });
    </script>
    @guest
    <script>
        $(document).ready(function() {
            $('#login').modal('show');
        });
    </script>
    @endguest

    @if(session('openLoginModal'))
    <script>
        window.addEventListener('DOMContentLoaded', function() {
            const modal = new bootstrap.Modal(document.getElementById('login'));
            modal.show();
        });
    </script>
    @endif

    <script>
        Livewire.start({
            baseUrl: "/{{ app()->getLocale() }}"
        });
    </script>