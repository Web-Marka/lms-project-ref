{{-- /// Start Wishlist Add Option // --}}
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })

    function addToWishList(course_id) {

        $.ajax({
            type: "POST",
            dataType: 'json',
            url: '{{ url('/add-to-wishlist/') }}/' + course_id,

            success: function(data) {

                // Start Message

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 3000
                });

                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        icon: 'success',
                        title: data.success,
                        customClass: {
                            popup: 'swal-lg',
                            title: 'swal-title',
                            icon: 'swal-icon'
                        }
                    });
                } else {
                    Toast.fire({
                        icon: 'error',
                        title: data.error,
                        customClass: {
                            popup: 'swal-lg',
                            title: 'swal-title',
                            icon: 'swal-icon'
                        }
                    });
                }
            }
        })
    }
</script>

{{-- /// Start Load Wishlist Data // --}}
<script type="text/javascript">
    function wishlist() {
        $.ajax({
            type: "GET",
            dataType: 'json',
            url: '{{ url('/get-wishlist-course/') }}',

            success: function(response) {

                $('#wishQty').text(response.wishQty);

                var rows = ""
                $.each(response.wishlist, function(key, value) {
                    var imageUrl = "{{ asset('/') }}" + value.course.course_image;

                    rows +=
                   `<div class="col-lg-4 col-md-6 col-12">
                        <div class="rbt-card variation-01 rbt-hover">
                            <div class="rbt-card-img">
                                <a href="/course/details/${value.course.course_name_slug}/${value.course.id}">
                                    <img src="${imageUrl}" alt="${value.course.course_name_slug}">
                                </a>
                            </div>
                            <div class="rbt-card-body">
                                <h4 class="rbt-card-title"><a href="/course/details/${value.course.course_name_slug}/${value.course.id}">
                                    ${value.course.course_name}</a>
                                </h4>
                                <ul class="rbt-meta">
                                    <li><i class="feather-clock"></i>${value.course.duration} Saat</li>
                                </ul>

                                <div class="rbt-card-bottom">
                                    <div class="rbt-price">
                                        ${value.course.discount_price == null
                                            ?`<span class="current-price">₺ ${value.course.selling_price}</span>`
                                            :`<span class="current-price">₺ ${value.course.discount_price}</span>
                                            <span class="off-price">₺ ${value.course.selling_price}</span>`
                                        }
                                    </div>
                                    <a class="rbt-btn-link left-icon" href="" id="${value.id}" onclick="wishlistRemove(this.id)"><i class="feather-heart"></i> Kaldır</a>
                                </div>
                            </div>
                        </div>
                    </div>`

                });
                $('#wishlist').html(rows);
            }
        })
    }
    wishlist();

    /// WishList Remove Start  //

    function wishlistRemove(id) {
        $.ajax({
            type: "GET",
            dataType: 'json',
            url: '{{ url('/wishlist-remove/') }}/' + id,

            success: function(data) {
                wishlist();
                // Start Message

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 3000
                });

                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        icon: 'success',
                        title: data.success,
                        customClass: {
                            popup: 'swal-lg',
                            title: 'swal-title',
                            icon: 'swal-icon'
                        }
                    });
                } else {
                    Toast.fire({
                        icon: 'error',
                        title: data.error,
                        customClass: {
                            popup: 'swal-lg',
                            title: 'swal-title',
                            icon: 'swal-icon'
                        }
                    });
                }
            }
        })
    }
</script>
{{-- /// End Load Wishlist Data // --}}

{{-- Start Sepete Ekle Yapısı --}}

<script type="text/javascript">
    function addToCart(courseId, courseName, instructorId, slug) {
        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: {
                _token: '{{ csrf_token() }}',
                course_name: courseName,
                course_name_slug: slug,
                instructor: instructorId
            },

            url: '{{ url('/cart/data/store/') }}/' + courseId,

            success: function(data) {
                headerCart();

                setTimeout(function() {
                    $('#cartCount').closest('.rbt-cart-sidenav-activation').click();
                }, 500);

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 2000
                });

                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        icon: 'success',
                        title: data.success,
                        customClass: {
                            popup: 'swal-lg',
                            title: 'swal-title',
                            icon: 'swal-icon'
                        }
                    });

                } else {
                    Toast.fire({
                        icon: 'error',
                        title: data.error,
                        customClass: {
                            popup: 'swal-lg',
                            title: 'swal-title',
                            icon: 'swal-icon'
                        }
                    });
                }
            }
        });
    }
</script>

{{-- END Sepete Ekle Yapısı --}}

{{-- Hemen Satın Al Yapısı --}}

<script type="text/javascript">
    function buyCourse(courseId, courseName, instructorId, slug) {
        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: {
                _token: '{{ csrf_token() }}',
                course_name: courseName,
                course_name_slug: slug,
                instructor_id: instructorId
            },

            url: '{{ url('/buy/course/') }}/' + courseId,

            success: function(data) {
                headerCart();

                setTimeout(function() {
                    $('#cartCount').closest('.rbt-cart-sidenav-activation').click();
                }, 500);

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 2000
                });

                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        icon: 'success',
                        title: data.success,
                        customClass: {
                            popup: 'swal-lg',
                            title: 'swal-title',
                            icon: 'swal-icon'
                        }
                    });

                    window.location.href = '{{ url('/odeme') }}';

                } else {
                    Toast.fire({
                        icon: 'error',
                        title: data.error,
                        customClass: {
                            popup: 'swal-lg',
                            title: 'swal-title',
                            icon: 'swal-icon'
                        }
                    });
                }
            }
        });
    }
</script>

{{-- END Hemen Satın Al Yapısı --}}

{{-- Start Header Sepet Yapısı --}}

<script type="text/javascript">
    function headerCart() {
        $.ajax({
            type: 'GET',
            url: '{{ url('/course/header/cart') }}/',
            dataType: 'json',
            success: function(response) {

                var headerCart = ""
                var cartCount = Object.keys(response.carts).length;

                $('#cartCount').text(cartCount);
                $('#cartSubTotal').text('₺ ' + response.cartTotal);
                $('#cartQty').text(response.cartQty);

                $.each(response.carts, function(key, value) {

                    headerCart += `
                    <li class="minicart-item">
                        <div class="thumbnail">
                            <a href="{{ url('/course/details') }}/${value.options.slug}/${value.id}">
                                <img src="{{ asset('/') }}${value.options.image}">
                            </a>
                        </div>
                        <div class="product-content">
                            <h6 class="title"><a href="{{ url('/course/details') }}/${value.options.slug}/${value.id}">
                                ${value.name}</a></h6>
                            <span class="price">₺ ${value.price}</span>
                        </div>
                        <div class="close-btn">
                            <button type="submit" id="${value.rowId}" onclick="headerCartRemove(this.id)" class="rbt-round-btn"><i class="feather-x"></i></button>
                        </div>
                    </li> `
                });

                $('#headerCart').html(headerCart);
            }
        })
    }
    headerCart();

    function headerCartRemove(rowId) {
        $.ajax({
            type: 'GET',
            url: '{{ url('/headercart/course/remove') }}/' + rowId,
            dataType: 'json',
            success: function(data) {
                headerCart();

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 3000
                });

                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        icon: 'success',
                        title: data.success,
                        customClass: {
                            popup: 'swal-lg',
                            title: 'swal-title',
                            icon: 'swal-icon'
                        }
                    });
                } else {
                    Toast.fire({
                        icon: 'error',
                        title: data.error,
                        customClass: {
                            popup: 'swal-lg',
                            title: 'swal-title',
                            icon: 'swal-icon'
                        }
                    });
                }
            }
        });
    }
</script>

{{-- END Header Sepet Yapısı --}}

{{-- Start Sepet Sayfa Yapısı --}}

<script type="text/javascript">
    function cart() {
        $.ajax({
            type: 'GET',
            url: '{{ url('/add-course-cart') }}',
            dataType: 'json',
            success: function(response) {

                var rows = ""
                var cartCount = Object.keys(response.carts).length;

                $('#cartCount').text(cartCount);
                $('#cartTotal').text('₺ ' + response.cartTotal);

                $.each(response.carts, function(key, value) {
                    rows += `
                    <tr>
                        <td class="pro-thumbnail"><a href="{{ url('/course/details') }}/${value.options.slug}/${value.id}">
                            <img src="{{ asset('/') }}${value.options.image}""></a>
                        </td>
                        <td class="pro-title">
                            <a href="{{ url('/course/details') }}/${value.options.slug}/${value.id}">${value.name}</a>
                        </td>
                        <td class="pro-price">
                            <span>₺ ${value.price}</span>
                        </td>
                        <td class="pro-remove">
                            <a type="submit" id="${value.rowId}" onclick="CartRemove(this.id)" class="rbt-round-btn">
                                <i class="feather-x"></i></a>
                        </td>
                    </tr>`
                });

                $('#cartPage').html(rows);
            }
        })
    }
    cart();

    function CartRemove(rowId) {
        if (rowId === undefined || rowId === null) {
            console.error("Invalid rowId:", rowId);
            return;
        }

        $.ajax({
            type: 'GET',
            url: '{{ url('/cart/remove') }}/' + rowId,
            dataType: 'json',
            success: function(data) {
                headerCart();
                cart();
                kuponHesaplama();

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 3000
                });

                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        icon: 'success',
                        title: data.success,
                        customClass: {
                            popup: 'swal-lg',
                            title: 'swal-title',
                            icon: 'swal-icon'
                        }
                    });
                } else {
                    Toast.fire({
                        icon: 'error',
                        title: data.error,
                        customClass: {
                            popup: 'swal-lg',
                            title: 'swal-title',
                            icon: 'swal-icon'
                        }
                    });
                }
            }
        });
    }
</script>

{{-- END Sepet Sayfa Yapısı --}}

{{-- Start Kupon Yapısı --}}

<script type="text/javascript">
    function kuponUygula() {
        var kupon_adi = $('#kupon_adi').val();
        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: {
                _token: '{{ csrf_token() }}',
                kupon_adi: kupon_adi
            },
            url: "{{ url('/kupon-uygula') }}",

            success: function(data) {
                kuponHesaplama();

                if (data.kupon_gecerlilik == true) {
                    $('#kuponDurumu').html('<pre>Kupon Uygulandı</pre>');
                    $('#kuponDurumuWrapper').show();
                    $('#kuponAlani').hide();
                }

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 3000
                });

                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        icon: 'success',
                        title: data.success,
                        customClass: {
                            popup: 'swal-lg',
                            title: 'swal-title',
                            icon: 'swal-icon'
                        }
                    });
                } else {
                    Toast.fire({
                        icon: 'error',
                        title: data.error,
                        customClass: {
                            popup: 'swal-lg',
                            title: 'swal-title',
                            icon: 'swal-icon'
                        }
                    });
                }
            }
        })
    }

    // Start Kupon Hesaplama Yapısı

    function kuponHesaplama() {
        $.ajax({
            type: 'GET',
            url: '{{ url('/kupon-hesaplama') }}',
            dataType: 'json',

            success: function(data) {
                if (data.total) {
                    $('#kuponHesaplamaAlani').html(

                        `<div class="section-title text-start">
                        <h4 class="title mb--30">Sepet Özeti</h4>
                        </div>
                        <p><strong>Ara Toplam</strong>
                            <span>₺ ${data.total}</span>
                        </p>
                        <h2> Toplam Tutar
                            <span>₺ ${data.total}</span>
                        </h2>`
                    )

                } else {
                    $('#kuponHesaplamaAlani').html(

                        `<div class="section-title text-start">
                        <h4 class="title mb--30">Sepet Özeti</h4>
                        </div>
                        <p><strong>Ara Toplam</strong>
                            <span>₺ ${data.subtotal}</span>
                        </p>
                        <p><strong>Kupon Adı</strong>
                            <span>${data.kupon_adi} <a type="button" onclick="kuponRemove()" <i class="feather-trash-2 pl--0"></i></a></span>
                        </p>
                        <p><strong>İndirim Tutarı</strong>
                            <span>₺ ${data.discount_amount}</span>
                        </p>
                        <h2> Toplam Tutar
                            <span>₺ ${data.total_amount}</span>
                        </h2>`
                    )
                }
            }
        })
    }
    kuponHesaplama();
</script>

{{-- END Kupon Yapısı --}}

{{-- Start Kupon Sil Yapısı --}}
<script type="text/javascript">
    function kuponRemove() {
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: '{{ url('/kupon-remove') }}',

            success: function(data) {
                kuponHesaplama();

                $('#kuponDurumuWrapper').hide(); // Gizli yapının gizlenmesi
                $('#kuponDurumu').empty();
                $('#kuponAlani').show();

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 3000
                });

                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        icon: 'success',
                        title: data.success,
                        customClass: {
                            popup: 'swal-lg',
                            title: 'swal-title',
                            icon: 'swal-icon'
                        }
                    });
                } else {
                    Toast.fire({
                        icon: 'error',
                        title: data.error,
                        customClass: {
                            popup: 'swal-lg',
                            title: 'swal-title',
                            icon: 'swal-icon'
                        }
                    });
                }
            }
        })
    }
</script>
{{-- END Kupon Sil Yapısı --}}
