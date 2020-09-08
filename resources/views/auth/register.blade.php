<!DOCTYPE html>
<html lang="en" class="route-index">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Authentication pages Kit">

    <title>Daftar</title>

    <link rel="stylesheet" href="{{ asset('css/register.css') }}">

    <!-- Load Font Awesome 5 -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.4/js/all.js"></script>

    <script src="https://cdn.polyfill.io/v2/polyfill.min.js"></script>
</head>

<body class="has-background-light" >
<div class="is-fullpage has-content-centered">
    <div class="columns is-marginless is-fullpage">
        <div class="column is-half-tablet is-7-desktop is-8-widescreen is-hidden-mobile has-padding-large">
{{--             data-background="https://demo.creativebulma.net/templates/html/pegasus/assets/images/undraw_nature_fun_n9lv.svg">--}}
{{--            <div class="has-text-centered login-logo">--}}
{{--                <svg viewBox="0 0 144 39" xmlns="http://www.w3.org/2000/svg">--}}
{{--                    <g transform="translate(-17 -32)">--}}
{{--                        <path fill="currentColor"--}}
{{--                              d="m61.51 44.26h3.21v13h-3.21zm4.49 8.11c0-3.22 2-5.15 5-5.15s5 1.93 5 5.15-1.93 5.17-5 5.17-5-1.88-5-5.17zm6.82 0c0-1.77-.69-2.81-1.79-2.81s-1.78 1-1.78 2.81.68 2.8 1.78 2.8 1.81-.99 1.81-2.79zm4.46 5.56h3.1c.289.684 1.004 1.094 1.74 1 1.23 0 1.87-.66 1.87-1.64v-1.8h.01c-.541 1.145-1.737 1.843-3 1.75-2.35 0-3.91-1.79-3.91-4.87s1.49-5 4-5c1.296-.069 2.503.691 3 1.89h-.09v-1.81h3.18v9.74c0 2.35-2.08 3.82-5.14 3.82-2.78-.01-4.56-1.28-4.74-3.07zm6.72-5.56c0-1.57-.72-2.56-1.86-2.56s-1.84 1-1.84 2.56.69 2.48 1.84 2.48 1.86-.85 1.86-2.48zm4.45 0c0-3.22 2-5.15 5-5.15s5 1.93 5 5.15-1.94 5.17-5 5.17-4.98-1.88-4.98-5.17zm6.82 0c0-1.77-.7-2.81-1.79-2.81s-1.78 1-1.78 2.81.68 2.8 1.78 2.8 1.81-.99 1.81-2.79zm4.48-7.29c-.001-.023-.001-.047-.001-.07 0-.9.74-1.64 1.64-1.64.899 0 1.64.74 1.64 1.64 0 .899-.74 1.639-1.639 1.64-.013 0-.027.001-.04.001-.86 0-1.569-.702-1.58-1.561zm0 2.36h3.25v9.86h-3.2zm14.94 4.93c0 3.21-1.44 5.07-3.89 5.07-1.282.079-2.484-.654-3-1.83h-.06v4.86h-3.21v-13h3.19v1.76h.06c.499-1.199 1.703-1.962 3-1.9 2.52-.02 3.97 1.83 3.97 5.05zm-3.27 0c0-1.56-.73-2.57-1.86-2.57s-1.84 1-1.85 2.57.72 2.56 1.85 2.56 1.92-.93 1.92-2.55zm8.75-5.16c2.69 0 4.36 1.27 4.38 3.31h-2.93c0-.71-.59-1.15-1.47-1.15s-1.3.34-1.3.85.37.67 1.11.82l2.06.42c2 .42 2.8 1.22 2.8 2.71 0 2-1.85 3.36-4.6 3.36s-4.54-1.32-4.67-3.33h3.11c.09.73.67 1.16 1.61 1.16s1.38-.3 1.38-.83-.3-.62-1.07-.78l-1.86-.39c-1.93-.41-2.94-1.42-2.94-2.93.06-1.96 1.74-3.21 4.45-3.21zm15.4 10.08h-3.11v-1.85h-.06c-.357 1.267-1.556 2.123-2.87 2.05-.037.001-.074.002-.112.002-1.881 0-3.43-1.549-3.43-3.43 0-.094.004-.188.012-.282v-6.33h3.21v5.64c0 1.16.61 1.79 1.61 1.79.895-.007 1.628-.745 1.628-1.64 0-.08-.006-.161-.018-.24v-5.55h3.2zm1.55-9.85h3.12v1.9h.07c.353-1.248 1.513-2.106 2.81-2.08 1.309-.114 2.504.798 2.74 2.09h.14c.41-1.292 1.646-2.153 3-2.09.04-.002.079-.002.119-.002 1.711 0 3.12 1.408 3.12 3.12 0 .077-.003.155-.009.232v6.69h-3.23v-5.87c0-1-.47-1.56-1.38-1.56-.008 0-.015 0-.023 0-.768 0-1.4.632-1.4 1.4 0 .063.004.127.013.19v5.84h-3.06v-5.9c0-1-.49-1.53-1.37-1.53-.004 0-.008 0-.011 0-.785 0-1.43.645-1.43 1.43 0 .06.003.12.011.18v5.82h-3.21z" />--}}
{{--                        <path fill="currentColor"--}}
{{--                              d="m55.16 45.11c0-5.42-4.46-9.88-9.88-9.88-2.767 0-5.41 1.162-7.28 3.2h-12.48v26.34h26.35v-12.31c2.091-1.87 3.288-4.545 3.29-7.35zm-5.07 0v.01c0 2.644-2.176 4.82-4.82 4.82s-4.82-2.176-4.82-4.82 2.176-4.82 4.82-4.82c2.64 0 4.815 2.17 4.82 4.81zm-3.29 14.59h-16.21v-16.2h4.94c-.095.531-.146 1.07-.15 1.61.005 5.423 4.467 9.885 9.89 9.89.513-.003 1.024-.046 1.53-.13z" />--}}
{{--                    </g>--}}
{{--                </svg>--}}
{{--            </div>--}}
        </div>
        <div class="column has-content-vspaced has-padding-large has-background-white">
            <div class="field">
                <p class="title has-text-centered has-text-weight-light">
                    Buat Akun
                </p>
                <p class="subtitle has-text-centered has-text-weight-light">
                    atau <a href="{{ route('login') }}">masuk</a>
                </p>
            </div>

            <div class="field">
                <div class="notification is-danger">
                    Terima kasih atas minat anda, sayangnya saat ini pendaftaran sedang di tutup. Karena terlalu banyak yang ingin bergabung, sehingga kemampuan server kami masih belum mencukupi, saat ini kami sedang melakukan upgrade server, member yang sudah terdaftar masih dapat bertransaksi secara normal.
                </div>
            </div>

            <div class="columns is-mobile is-centered">
                <div class="column is-10-mobile is-8-fullhd">
{{--                    <form class="" method="post" action="">--}}
{{--                        @csrf--}}
                        <div class="section is-paddingless-horizontal is-paddingless-top">
{{--                            <div class="field">--}}
{{--                                <label class="label">Nama Lengkap</label>--}}
{{--                                <div class="control">--}}
{{--                                    <input name="name" type="text" class="input @error('name') is-danger @enderror" value="{{ old('name') }}" placeholder="Nama Lengkap" required>--}}
{{--                                </div>--}}

{{--                                @error('name')--}}
{{--                                <p class="has-text-danger" role="alert">--}}
{{--                                    <span>{{ $message }}</span>--}}
{{--                                </p>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                            <div class="field">--}}
{{--                                <label class="label">Username</label>--}}
{{--                                <div class="control">--}}
{{--                                    <input name="username" type="text" class="input @error('username') is-danger @enderror" value="{{ old('username') }}" placeholder="Username (tanpa spasi)" required>--}}
{{--                                </div>--}}
{{--                                @error('username')--}}
{{--                                <p class="has-text-danger" role="alert">--}}
{{--                                    <span>{{ $message }}</span>--}}
{{--                                </p>--}}
{{--                                @enderror--}}
{{--                            </div>--}}

{{--                            <div class="field">--}}
{{--                                <label class="label">Alamat Email</label>--}}
{{--                                <div class="control">--}}
{{--                                    <input name="email" type="email" class="input @error('email') is-danger @enderror" value="{{ old('email') }}" placeholder="alamat email" required>--}}
{{--                                </div>--}}
{{--                                @error('email')--}}
{{--                                <p class="has-text-danger" role="alert">--}}
{{--                                    <span>{{ $message }}</span>--}}
{{--                                </p>--}}
{{--                                @enderror--}}
{{--                            </div>--}}

{{--                            <div class="field">--}}
{{--                                <label class="label">Kata Sandi</label>--}}
{{--                                <input name="password" type="password" class="input @error('password') is-danger @enderror" value="{{ old('password') }}" placeholder="Kata Sandi" required>--}}
{{--                                @error('password')--}}
{{--                                <p class="has-text-danger" role="alert">--}}
{{--                                    <span>{{ $message }}</span>--}}
{{--                                </p>--}}
{{--                                @enderror--}}
{{--                            </div>--}}

{{--                            <div class="field">--}}
{{--                                <label class="label">Ulangi Kata Sandi</label>--}}
{{--                                <input name="password_confirmation" type="password" class="input @error('password_confirmation') is-danger @enderror" value="{{ old('password_confirmation') }}" placeholder="Ulangi Kata Sandi" required>--}}
{{--                                @error('password_confirmation')--}}
{{--                                <p class="has-text-danger" role="alert">--}}
{{--                                    <span>{{ $message }}</span>--}}
{{--                                </p>--}}
{{--                                @enderror--}}
{{--                            </div>--}}

{{--                            <div class="field">--}}
{{--                                <label class="checkbox">--}}
{{--                                    Anda mendaftar berarti anda setuju dengan semua <a href="{{ route('web.pages.syarat-dan-ketentuan') }}">syarat dan ketentuan</a>.--}}
{{--                                </label>--}}
{{--                            </div>--}}

{{--                            <div class="field">--}}
{{--                                <button class="button is-primary is-fullwidth">Buat Akun</button>--}}
{{--                            </div>--}}

                            <div class="field">
                                <p class="has-text-centered has-text-grey">
                                    Sudah punya akun? <a href="{{ route('login') }}">Masuk ke Akun</a>
                                </p>
                            </div>

                        </div>

{{--                    </form>--}}
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    !function (e, t) {
        "object" == typeof exports && "object" == typeof module ? module.exports = t() : "function" == typeof define && define.amd ? define([], t) : "object" == typeof exports ? exports.Pegasus = t() : e.Pegasus = t()
    }(window, function () {
        return (r = {}, a.m = n = [function (t, a, n) {
            "use strict";
            n.r(a);
            var r = function (t, a, n) {
                return a && e(t.prototype, a), n && e(t, n), t
            };

            function e(e, t) {
                for (var a = 0; a < t.length; a++) {
                    var n = t[a];
                    n.enumerable = n.enumerable || !1, n.configurable = !0, "value" in n && (n.writable = !0), Object.defineProperty(e, n.key, n)
                }
            }

            var f = function () {
                function e(t) {
                    !function (t) {
                        if (!(t instanceof e)) throw new TypeError("Cannot call a class as a function")
                    }(this), this.ok = !1, "#" == t.charAt(0) && (t = t.substr(1, 6)), t = (t = t.replace(/ /g, "")).toLowerCase();
                    var a = {
                        aliceblue: "f0f8ff",
                        antiquewhite: "faebd7",
                        aqua: "00ffff",
                        aquamarine: "7fffd4",
                        azure: "f0ffff",
                        beige: "f5f5dc",
                        bisque: "ffe4c4",
                        black: "000000",
                        blanchedalmond: "ffebcd",
                        blue: "0000ff",
                        blueviolet: "8a2be2",
                        brown: "a52a2a",
                        burlywood: "deb887",
                        cadetblue: "5f9ea0",
                        chartreuse: "7fff00",
                        chocolate: "d2691e",
                        coral: "ff7f50",
                        cornflowerblue: "6495ed",
                        cornsilk: "fff8dc",
                        crimson: "dc143c",
                        cyan: "00ffff",
                        darkblue: "00008b",
                        darkcyan: "008b8b",
                        darkgoldenrod: "b8860b",
                        darkgray: "a9a9a9",
                        darkgreen: "006400",
                        darkkhaki: "bdb76b",
                        darkmagenta: "8b008b",
                        darkolivegreen: "556b2f",
                        darkorange: "ff8c00",
                        darkorchid: "9932cc",
                        darkred: "8b0000",
                        darksalmon: "e9967a",
                        darkseagreen: "8fbc8f",
                        darkslateblue: "483d8b",
                        darkslategray: "2f4f4f",
                        darkturquoise: "00ced1",
                        darkviolet: "9400d3",
                        deeppink: "ff1493",
                        deepskyblue: "00bfff",
                        dimgray: "696969",
                        dodgerblue: "1e90ff",
                        feldspar: "d19275",
                        firebrick: "b22222",
                        floralwhite: "fffaf0",
                        forestgreen: "228b22",
                        fuchsia: "ff00ff",
                        gainsboro: "dcdcdc",
                        ghostwhite: "f8f8ff",
                        gold: "ffd700",
                        goldenrod: "daa520",
                        gray: "808080",
                        green: "008000",
                        greenyellow: "adff2f",
                        honeydew: "f0fff0",
                        hotpink: "ff69b4",
                        indianred: "cd5c5c",
                        indigo: "4b0082",
                        ivory: "fffff0",
                        khaki: "f0e68c",
                        lavender: "e6e6fa",
                        lavenderblush: "fff0f5",
                        lawngreen: "7cfc00",
                        lemonchiffon: "fffacd",
                        lightblue: "add8e6",
                        lightcoral: "f08080",
                        lightcyan: "e0ffff",
                        lightgoldenrodyellow: "fafad2",
                        lightgrey: "d3d3d3",
                        lightgreen: "90ee90",
                        lightpink: "ffb6c1",
                        lightsalmon: "ffa07a",
                        lightseagreen: "20b2aa",
                        lightskyblue: "87cefa",
                        lightslateblue: "8470ff",
                        lightslategray: "778899",
                        lightsteelblue: "b0c4de",
                        lightyellow: "ffffe0",
                        lime: "00ff00",
                        limegreen: "32cd32",
                        linen: "faf0e6",
                        magenta: "ff00ff",
                        maroon: "800000",
                        mediumaquamarine: "66cdaa",
                        mediumblue: "0000cd",
                        mediumorchid: "ba55d3",
                        mediumpurple: "9370d8",
                        mediumseagreen: "3cb371",
                        mediumslateblue: "7b68ee",
                        mediumspringgreen: "00fa9a",
                        mediumturquoise: "48d1cc",
                        mediumvioletred: "c71585",
                        midnightblue: "191970",
                        mintcream: "f5fffa",
                        mistyrose: "ffe4e1",
                        moccasin: "ffe4b5",
                        navajowhite: "ffdead",
                        navy: "000080",
                        oldlace: "fdf5e6",
                        olive: "808000",
                        olivedrab: "6b8e23",
                        orange: "ffa500",
                        orangered: "ff4500",
                        orchid: "da70d6",
                        palegoldenrod: "eee8aa",
                        palegreen: "98fb98",
                        paleturquoise: "afeeee",
                        palevioletred: "d87093",
                        papayawhip: "ffefd5",
                        peachpuff: "ffdab9",
                        peru: "cd853f",
                        pink: "ffc0cb",
                        plum: "dda0dd",
                        powderblue: "b0e0e6",
                        purple: "800080",
                        red: "ff0000",
                        rosybrown: "bc8f8f",
                        royalblue: "4169e1",
                        saddlebrown: "8b4513",
                        salmon: "fa8072",
                        sandybrown: "f4a460",
                        seagreen: "2e8b57",
                        seashell: "fff5ee",
                        sienna: "a0522d",
                        silver: "c0c0c0",
                        skyblue: "87ceeb",
                        slateblue: "6a5acd",
                        slategray: "708090",
                        snow: "fffafa",
                        springgreen: "00ff7f",
                        steelblue: "4682b4",
                        tan: "d2b48c",
                        teal: "008080",
                        thistle: "d8bfd8",
                        tomato: "ff6347",
                        turquoise: "40e0d0",
                        violet: "ee82ee",
                        violetred: "d02090",
                        wheat: "f5deb3",
                        white: "ffffff",
                        whitesmoke: "f5f5f5",
                        yellow: "ffff00",
                        yellowgreen: "9acd32"
                    };
                    for (var n in a) t == n && (t = a[n]);
                    for (var r = [{
                        re: /^rgb\((\d{1,3}),\s*(\d{1,3}),\s*(\d{1,3})\)$/,
                        example: ["rgb(123, 234, 45)", "rgb(255,234,245)"],
                        process: function (e) {
                            return [parseInt(e[1]), parseInt(e[2]), parseInt(e[3])]
                        }
                    }, {
                        re: /^(\w{2})(\w{2})(\w{2})$/, example: ["#00ff00", "336699"], process: function (e) {
                            return [parseInt(e[1], 16), parseInt(e[2], 16), parseInt(e[3], 16)]
                        }
                    }, {
                        re: /^(\w{1})(\w{1})(\w{1})$/, example: ["#fb0", "f0f"], process: function (e) {
                            return [parseInt(e[1] + e[1], 16), parseInt(e[2] + e[2], 16), parseInt(e[3] + e[3], 16)]
                        }
                    }], f = 0; f < r.length; f++) {
                        var o = r[f].re, i = r[f].process, l = o.exec(t);
                        if (l) {
                            var c = i(l);
                            this.r = c[0], this.g = c[1], this.b = c[2], this.ok = !0
                        }
                    }
                    this.r = this.r < 0 || isNaN(this.r) ? 0 : 255 < this.r ? 255 : this.r, this.g = this.g < 0 || isNaN(this.g) ? 0 : 255 < this.g ? 255 : this.g, this.b = this.b < 0 || isNaN(this.b) ? 0 : 255 < this.b ? 255 : this.b
                }

                return r(e, [{
                    key: "toRGB", value: function () {
                        return "rgb(" + this.r + ", " + this.g + ", " + this.b + ")"
                    }
                }, {
                    key: "toHex", value: function () {
                        var e = this.r.toString(16), t = this.g.toString(16), a = this.b.toString(16);
                        return 1 == e.length && (e = "0" + e), 1 == t.length && (t = "0" + t), 1 == a.length && (a = "0" + a), "#" + e + t + a
                    }
                }]), e
            }(), o = function () {
                function e(e, t) {
                    for (var a = 0; a < t.length; a++) {
                        var n = t[a];
                        n.enumerable = n.enumerable || !1, n.configurable = !0, "value" in n && (n.writable = !0), Object.defineProperty(e, n.key, n)
                    }
                }

                return function (t, a, n) {
                    return a && e(t.prototype, a), n && e(t, n), t
                }
            }(), i = function () {
                function e(t) {
                    !function (t) {
                        if (!(t instanceof e)) throw new TypeError("Cannot call a class as a function")
                    }(this), this.canvas = document.createElement("canvas"), this.context = this.canvas.getContext("2d"), document.body.appendChild(this.canvas), this.width = this.canvas.width = t.width, this.height = this.canvas.height = t.height, this.context.drawImage(t, 0, 0, this.width, this.height)
                }

                return o(e, [{
                    key: "clear", value: function () {
                        this.context.clearRect(0, 0, this.width, this.height)
                    }
                }, {
                    key: "update", value: function (e) {
                        this.context.putImageData(e, 0, 0)
                    }
                }, {
                    key: "getPixelCount", value: function () {
                        return this.width * this.height
                    }
                }, {
                    key: "getImageData", value: function () {
                        return this.context.getImageData(0, 0, this.width, this.height)
                    }
                }, {
                    key: "removeCanvas", value: function () {
                        this.canvas.parentNode.removeChild(this.canvas)
                    }
                }]), e
            }(), l = function () {
                function e(e, t) {
                    for (var a = 0; a < t.length; a++) {
                        var n = t[a];
                        n.enumerable = n.enumerable || !1, n.configurable = !0, "value" in n && (n.writable = !0), Object.defineProperty(e, n.key, n)
                    }
                }

                return function (t, a, n) {
                    return a && e(t.prototype, a), n && e(t, n), t
                }
            }(), c = function () {
                function e() {
                    !function (t) {
                        if (!(t instanceof e)) throw new TypeError("Cannot call a class as a function")
                    }(this)
                }

                return l(e, null, [{
                    key: "loadBackgrounds", value: function () {
                        [].forEach.call(document.querySelectorAll("[data-background]"), function (e) {
                            var t = "",
                                a = e.style.backgroundColor ? e.style.backgroundColor : e.dataset.backgroundColor ? e.dataset.backgroundColor : null;
                            if (a && (a = new f(a)).ok) {
                                var n = "rgba(" + a.r + ", " + a.g + ", " + a.b + ", " + (e.dataset.backgroundColorOpacity ? e.dataset.backgroundColorOpacity : "0.5") + ")";
                                t = "linear-gradient(" + n + ", " + n + "), "
                            }
                            e.style.backgroundImage = t + "url(" + e.dataset.background + ")", e.style.backgroundSize = e.dataset.backgroundSize ? e.dataset.backgroundSize : "cover", e.style.backgroundPosition = e.dataset.backgroundPosition ? e.dataset.backgroundPosition : "center center", e.style.backgroundRepeat = e.dataset.backgroundRepeat ? e.dataset.backgroundRepeat : "no-repeat"
                        })
                    }
                }, {
                    key: "getImageData", value: function (e, a) {
                        var n = new Image, t = e.src || e;
                        "data:" !== t.substring(0, 5) && (n.crossOrigin = "Anonymous"), n.onload = function () {
                            var e = new i(n), t = e.getImageData();
                            a && a(t.data), e.removeCanvas()
                        }, n.src = t
                    }
                }]), e
            }(), d = function () {
                function e(e, t) {
                    for (var a = 0; a < t.length; a++) {
                        var n = t[a];
                        n.enumerable = n.enumerable || !1, n.configurable = !0, "value" in n && (n.writable = !0), Object.defineProperty(e, n.key, n)
                    }
                }

                return function (t, a, n) {
                    return a && e(t.prototype, a), n && e(t, n), t
                }
            }(), u = function () {
                function e() {
                    var t = this;
                    !function (t) {
                        if (!(t instanceof e)) throw new TypeError("Cannot call a class as a function")
                    }(this), function (e) {
                        /complete|loaded|interactive/.test(document.readyState) && document.body ? e() : document.addEventListener("DOMContentLoaded", e, !1)
                    }(function () {
                        t.init()
                    })
                }

                return d(e, [{
                    key: "init", value: function () {
                        c.loadBackgrounds()
                    }
                }]), e
            }();
            a.default = u
        }], a.c = r, a.d = function (e, t, n) {
            a.o(e, t) || Object.defineProperty(e, t, {enumerable: !0, get: n})
        }, a.r = function (e) {
            "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(e, Symbol.toStringTag, {value: "Module"}), Object.defineProperty(e, "__esModule", {value: !0})
        }, a.t = function (t, e) {
            if (1 & e && (t = a(t)), 8 & e) return t;
            if (4 & e && "object" == typeof t && t && t.__esModule) return t;
            var n = Object.create(null);
            if (a.r(n), Object.defineProperty(n, "default", {
                enumerable: !0,
                value: t
            }), 2 & e && "string" != typeof t) for (var r in t) a.d(n, r, function (e) {
                return t[e]
            }.bind(null, r));
            return n
        }, a.n = function (e) {
            var t = e && e.__esModule ? function () {
                return e.default
            } : function () {
                return e
            };
            return a.d(t, "a", t), t
        }, a.o = function (e, t) {
            return Object.prototype.hasOwnProperty.call(e, t)
        }, a.p = "", a(a.s = 0)).default;

        function a(e) {
            if (r[e]) return r[e].exports;
            var t = r[e] = {i: e, l: !1, exports: {}};
            return n[e].call(t.exports, t, t.exports, a), t.l = !0, t.exports
        }

        var n, r
    });
</script>

<script>
    // Initialize the application
    new Pegasus();
</script>
</body>

</html>
