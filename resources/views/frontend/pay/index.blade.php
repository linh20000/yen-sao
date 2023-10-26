<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" class="flexbox">

<head>
    <link rel="shortcut icon" href="//theme.hstatic.net/200000295082/1000772075/14/favicon.png?v=586" type="image/png" />
    <title>
        Cool Organic - Thanh toán đơn hàng
    </title>
    <meta name="description" content="Cool Organic - Thanh to&#225;n đơn h&#224;ng" />
    <link rel="stylesheet" href="{{ asset('asset/pay.css') }}">
    <link href='//theme.hstatic.net/200000295082/1000772075/14/check_out.css?v=586' rel='stylesheet' type='text/css'
        media='all' />
    <script src='//hstatic.net/0/0/global/jquery.min.js' type='text/javascript'></script>
    <script src='//hstatic.net/0/0/global/api.jquery.js' type='text/javascript'></script>
    <script src='//hstatic.net/0/0/global/jquery.validate.js' type='text/javascript'></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2, user-scalable=no">
    <script defer src='https://stats.hstatic.net/beacon.min.js' hrv-beacon-t='200000295082'></script>

    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap.css') }}">

</head>

<body>
    @if (session()->has('success'))
        <div class="txt pb-2 pt-2 ps-2 alert alert-success h3">
            {{ session()->get('success') }}
        </div>
    @endif

    <div class="content">
        <form action="{{ route('sendRequest') }}" class="field" method="post">
            @csrf
            <div class="wrap">
                <div class="sidebar">
                    <div class="sidebar-content">
                        <div class="order-summary order-summary-is-collapsed">
                            <h2 class="visually-hidden">Thông tin đơn hàng</h2>
                            <div class="order-summary-sections">
                                <div class="order-summary-section order-summary-section-product-list"
                                    data-order-summary-section="line-items">
                                    <table class="product-table">
                                        <thead>
                                            <tr>
                                                <th scope="col"><span class="visually-hidden">Hình ảnh</span></th>
                                                <th scope="col"><span class="visually-hidden">Mô tả</span></th>
                                                <th scope="col"><span class="visually-hidden">Số lượng</span></th>
                                                <th scope="col"><span class="visually-hidden">Giá</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($payCart as $payCart)
                                                <tr class="product" data-product-id="1031063934"
                                                    data-variant-id="1068141221">
                                                    <td class="product-image">
                                                        <div class="product-thumbnail">
                                                            <div class="product-thumbnail-wrapper">
                                                                <img class="product-thumbnail-image"
                                                                    alt="Chuối Unifarm Kid 1kg"
                                                                    src="{{ asset(JSON_decode($payCart->options->images)[0]) }}" />
                                                            </div>
                                                            <span class="product-thumbnail-quantity"
                                                                aria-hidden="true">{{ $payCart->qty }}</span>
                                                        </div>
                                                    </td>
                                                    <td class="product-description">
                                                        <span
                                                            class="product-description-name order-summary-emphasis">{{ $payCart->name }}</span>

                                                    </td>
                                                    <td class="product-quantity visually-hidden">{{ $payCart->qty }}
                                                    </td>
                                                    <td class="product-price">
                                                        <span
                                                            class="order-summary-emphasis">{{ number_format($payCart->price * $payCart->qty, 0, '.', ',') }}
                                                            ₫</span>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="order-summary-section order-summary-section-total-lines payment-lines"
                                    data-order-summary-section="payment-lines">
                                    <table class="total-line-table">
                                        <thead>
                                            <tr>
                                                <th scope="col"><span class="visually-hidden">Mô tả</span></th>
                                                <th scope="col"><span class="visually-hidden">Giá</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="total-line total-line-subtotal">
                                                <td class="total-line-name">Tạm tính</td>
                                                <td class="total-line-price">
                                                    <span class="order-summary-emphasis"
                                                        data-checkout-subtotal-price-target="{{ Cart::subtotal() }}">
                                                        {{ Cart::subtotal() }} ₫
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr class="total-line total-line-shipping">
                                                <td class="total-line-name">Phí vận chuyển</td>
                                                <td class="total-line-price">
                                                    <span class="order-summary-emphasis"
                                                        data-checkout-total-shipping-target="0">
                                                        —
                                                    </span>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tfoot class="total-line-table-footer">
                                            <tr class="total-line">
                                                <td class="total-line-name payment-due-label">
                                                    <span class="payment-due-label-total">Tổng cộng</span>
                                                </td>
                                                <td class="total-line-name payment-due">
                                                    <span class="payment-due-price"
                                                        data-checkout-payment-due-target="{{ Cart::subtotal() }}">
                                                        {{ Cart::subtotal() }}
                                                    </span>
                                                    <span class="payment-due-currency">VND</span>
                                                    <span class="checkout_version" display:none
                                                        data_checkout_version="4">
                                                    </span>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main">
                    <div class="main-header">
                        <a href="/" class="logo">
                            <h1 class="logo-text">Cool Organic</h1>
                        </a>

                        <style>
                            a.logo {
                                display: block;
                            }

                            .logo-cus {
                                width: 100%;
                                padding: 15px 0;
                                text-align: ;
                            }

                            .logo-cus img {
                                max-height: 4.2857142857em
                            }

                            .logo-text {
                                text-align: ;
                            }

                            @media (max-width: 767px) {
                                .banner a {
                                    display: block;
                                }
                            }
                        </style>

                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/gio-hang">Giỏ hàng</a>
                            </li>
                            <li class=" breadcrumb-item-current">
                                Thông tin giao hàng
                            </li>
                        </ul>
                    </div>
                    <div class="main-content">

                        <div class="step">

                            <div class="step-sections " step="1">
                                <div class="section">
                                    <div class="section-header">
                                        <h2 class="section-title">Thông tin giao hàng</h2>
                                    </div>
                                    <div class="section-content section-customer-information ">

                                        <p class="section-content-text">
                                            Bạn đã có tài khoản?
                                            <a href="">Đăng
                                                nhập</a>
                                        </p>
                                        <div class="fieldset">
                                            <div class="field   ">
                                                <div class="field-input-wrapper">
                                                    <label class="field-label" for="billing_address_full_name">Họ và
                                                        tên</label>
                                                    <input placeholder="Họ và tên" class="field-input" id="name"
                                                        size="30" type="text" name="name"
                                                        value="{{ old('name') }}" />
                                                    @error('name')
                                                        <span class="text-danger mt-1 d-block">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="field  field-third  ">
                                                <div class="field-input-wrapper">
                                                    <label class="field-label" for="checkout_user_email">Email</label>
                                                    <input placeholder="Email" class="field-input" size="30"
                                                        type="email" id="email" name="email"
                                                        value="{{ old('email') }}" />
                                                    @error('email')
                                                        <span class="text-danger mt-1 d-block">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="field field-third  ">
                                                <div class="field-input-wrapper">
                                                    <label class="field-label" for="billing_address_phone">Số điện
                                                        thoại</label>
                                                    <input placeholder="Số điện thoại" class="field-input"
                                                        type="tel" id="phoneNumber" name="phoneNumber"
                                                        value="{{ old('phoneNumber') }}" />
                                                    @error('phoneNumber')
                                                        <span class="text-danger mt-1 d-block">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="field">
                                                <div class="field-input-wrapper">
                                                    <label class="field-label" for="province">Tỉnh / Thành
                                                        phố</label>
                                                    <input placeholder="Tỉnh / Thành phố" class="field-input"
                                                        type="text" id="province" name="province"
                                                        value="" />
                                                    @error('province')
                                                        <span class="text-danger mt-1 d-block">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="field   ">
                                                <div class="field-input-wrapper">
                                                    <label class="field-label" for="billing_address_address1">Quận /
                                                        Huyện</label>
                                                    <input placeholder="Quận / Huyện" class="field-input"
                                                        type="text" id="district" name="district"
                                                        value="" />
                                                    @error('district')
                                                        <span class="text-danger mt-1 d-block">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="field   ">
                                                <div class="field-input-wrapper">
                                                    <label class="field-label" for="billing_address_address1">Địa
                                                        chỉ</label>
                                                    <input placeholder="Địa chỉ" class="field-input" type="text"
                                                        id="address" name="address" value="" />
                                                    @error('address')
                                                        <span class="text-danger mt-1 d-block">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="cart-note">
                                        <label for="note" class="note-label">Ghi chú đơn hàng</label>
                                        <textarea id="note" name="note" rows="4" style="width:100%"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="step-footer" id="step-footer-checkout">
                                <button type="submit" class="btn-submit">
                                    Đặt hàng
                                </button>
                                <a class="step-footer-previous-link" href="/gio-hang">
                                    Giỏ hàng
                                </a>
                            </div>
                            <input type="hidden" name="product_rowId" value="{{ Cart::content() }}">
                            <input type="hidden" name="total" value="{{ Cart::subtotal() }}">
                            <input type="hidden" name="qty" value="{{ Cart::count() }}">
                            <input type="hidden" name="status" value="1">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>


    <script>
        setTimeout(() => {
            $('.txt').addClass('d-none')
        }, 3000)
    </script>

</body>

</html>
