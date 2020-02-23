var _0x13f8 = ['[data-quote-index=\x225\x22]', '.contact-details\x20input', '[data-quote-index=\x226\x22]', 'querySelector', '.grid', 'none', '.grid__col-sizer', '.grid__gutter-sizer', 'translateY(0)', 'are-images-unloaded', 'options', 'itemSelector', '.grid__item', 'querySelectorAll', 'appended', 'reveal', '.is-title-reveal', 'bottom', '20px', 'document', 'documentElement', 'always', '#backtotop', 'visible', 'html,\x20body', 'string', 'href', 'indexOf', 'animate', 'offset', 'top', 'pushState', 'title', 'location', 'pathname', '.pageloader', 'toggleClass', 'is-active', 'load', 'scroll', 'scrollTop', '.navbar', 'addClass', 'is-scrolled', 'is-mobile', 'removeClass', '.navbar-menu', '.navbar-burger', 'click', 'hasClass', '.has-background-image', 'each', 'data-background', 'css', 'background-image', 'url(', '.card-form\x20.wizard-button', 'attr', '.card-form\x20.inner-form', '#form-section-', 'is-loading', '.card-form\x20.back-block', 'change', '[data-quote-index=\x222\x22]', 'is-disabled', '.services-types\x20input', 'length', '[data-quote-index=\x223\x22]', '[data-quote-index=\x224\x22]', '.project-scope\x20textarea', 'keyup', 'val'];
(function (_0x330302, _0x1aca28) {
    var _0x19fa83 = function (_0x23a6c1) {
        while (--_0x23a6c1) {
            _0x330302['push'](_0x330302['shift']());
        }
    };
    _0x19fa83(++_0x1aca28);
}(_0x13f8, 0x6b));
var _0x3a3e = function (_0x4ef8dc, _0x154f3a) {
    _0x4ef8dc = _0x4ef8dc - 0x0;
    var _0x157d05 = _0x13f8[_0x4ef8dc];
    return _0x157d05;
};
'use strict';//Init pageloader

function initNavbar() {
    $(window)['on'](_0x3a3e('0x4'), function () {
        var _0x330897 = $(window)[_0x3a3e('0x5')]();
        if (_0x330897 > 0x3c) {
            $(_0x3a3e('0x6'))[_0x3a3e('0x7')](_0x3a3e('0x8'))['removeClass'](_0x3a3e('0x9'));
        } else {
            $(_0x3a3e('0x6'))[_0x3a3e('0xa')]('is-scrolled');
            if ($(_0x3a3e('0xb'))['hasClass'](_0x3a3e('0x2'))) {
                $(_0x3a3e('0x6'))[_0x3a3e('0x7')](_0x3a3e('0x9'));
            }
        }
    });
    $(_0x3a3e('0xc'))['on'](_0x3a3e('0xd'), function () {
        $(this)[_0x3a3e('0x1')](_0x3a3e('0x2'));
        $(_0x3a3e('0xb'))[_0x3a3e('0x1')](_0x3a3e('0x2'));
        var _0x4926b1 = $(window)[_0x3a3e('0x5')]();
        if (_0x4926b1 > 0x3c) {
            $(_0x3a3e('0x6'))['removeClass'](_0x3a3e('0x9'));
        } else {
            if ($(_0x3a3e('0x6'))[_0x3a3e('0xe')](_0x3a3e('0x9'))) {
                $('.navbar')['removeClass']('is-mobile');
            } else {
                $('.navbar')['addClass'](_0x3a3e('0x9'));
            }
        }
    });
}

function initBackgroundImages() {
    if ($('.has-background-image')['length']) {
        $(_0x3a3e('0xf'))[_0x3a3e('0x10')](function () {
            var _0x310072 = $(this)['attr'](_0x3a3e('0x11'));
            if (_0x310072 !== undefined) {
                $(this)[_0x3a3e('0x12')](_0x3a3e('0x13'), _0x3a3e('0x14') + _0x310072 + ')');
            }
        });
    }
}

function initWizard() {
    $(_0x3a3e('0x15'))['on'](_0x3a3e('0xd'), function () {
        var _0x1d8839 = $(this);
        var _0x8ef62d = _0x1d8839[_0x3a3e('0x16')]('data-quote-index');
        _0x1d8839[_0x3a3e('0x7')]('is-loading');
        setTimeout(function () {
            $(_0x3a3e('0x17'))[_0x3a3e('0xa')](_0x3a3e('0x2'));
            $(_0x3a3e('0x18') + _0x8ef62d)['addClass'](_0x3a3e('0x2'));
            _0x1d8839['removeClass'](_0x3a3e('0x19'));
        }, 0x4b0);
    });
    $(_0x3a3e('0x1a'))['on'](_0x3a3e('0xd'), function () {
        var _0x19abb3 = $(this);
        var _0x4d709a = parseInt(_0x19abb3[_0x3a3e('0x16')]('data-quote-index'));
        $(_0x3a3e('0x17'))[_0x3a3e('0xa')](_0x3a3e('0x2'));
        $(_0x3a3e('0x18') + (_0x4d709a - 0x1))[_0x3a3e('0x7')]('is-active');
    });
    $('.project-types\x20input')['on'](_0x3a3e('0x1b'), function () {
        $(_0x3a3e('0x1c'))[_0x3a3e('0xa')](_0x3a3e('0x1d'));
    });
    $(_0x3a3e('0x1e'))['on']('change', function () {
        if ($('.services-types\x20input:checked')[_0x3a3e('0x1f')] > 0x0) {
            $(_0x3a3e('0x20'))['removeClass'](_0x3a3e('0x1d'));
        } else {
            $(_0x3a3e('0x20'))[_0x3a3e('0x7')](_0x3a3e('0x1d'));
        }
    });
    $('.budget-types\x20input')['on'](_0x3a3e('0x1b'), function () {
        $(_0x3a3e('0x21'))[_0x3a3e('0xa')](_0x3a3e('0x1d'));
    });
    $(_0x3a3e('0x22'))['on'](_0x3a3e('0x23'), function () {
        if ($(this)[_0x3a3e('0x24')]()[_0x3a3e('0x1f')] > 0x5) {
            $(_0x3a3e('0x25'))[_0x3a3e('0xa')](_0x3a3e('0x1d'));
        } else {
            $(_0x3a3e('0x25'))[_0x3a3e('0x7')]('is-disabled');
        }
    });
    $(_0x3a3e('0x26'))['on'](_0x3a3e('0x23'), function () {
        $('.contact-details\x20input')[_0x3a3e('0x10')](function () {
            if ($(this)[_0x3a3e('0x24')]()[_0x3a3e('0x1f')] > 0x1) {
                $(_0x3a3e('0x27'))[_0x3a3e('0xa')](_0x3a3e('0x1d'));
            } else {
                $(_0x3a3e('0x27'))[_0x3a3e('0x7')](_0x3a3e('0x1d'));
            }
        });
    });
}

function initImagesGrid() {
    var _0x58208c = document[_0x3a3e('0x28')](_0x3a3e('0x29'));
    var _0x41b7b3 = new Masonry(_0x58208c, {
        'itemSelector': _0x3a3e('0x2a'),
        'columnWidth': _0x3a3e('0x2b'),
        'gutter': _0x3a3e('0x2c'),
        'percentPosition': !![],
        'stagger': 0x1e,
        'visibleStyle': {'transform': _0x3a3e('0x2d'), 'opacity': 0x1},
        'hiddenStyle': {'transform': 'translateY(100px)', 'opacity': 0x0}
    });
    imagesLoaded(_0x58208c, function () {
        _0x58208c['classList']['remove'](_0x3a3e('0x2e'));
        _0x41b7b3[_0x3a3e('0x2f')][_0x3a3e('0x30')] = _0x3a3e('0x31');
        var _0x130cfd = _0x58208c[_0x3a3e('0x32')](_0x3a3e('0x31'));
        _0x41b7b3[_0x3a3e('0x33')](_0x130cfd);
    });
}

function initReveals() {
    window['sr'] = ScrollReveal();
    sr[_0x3a3e('0x34')](_0x3a3e('0x35'), {
        'origin': _0x3a3e('0x36'),
        'distance': _0x3a3e('0x37'),
        'duration': 0x258,
        'delay': 0x12c,
        'rotate': {'x': 0x0, 'y': 0x0, 'z': 0x0},
        'opacity': 0x0,
        'scale': 0x1,
        'easing': 'cubic-bezier(0.215,\x200.61,\x200.355,\x201)',
        'container': window[_0x3a3e('0x38')]['documentElement'],
        'mobile': !![],
        'reset': ![],
        'useDelay': 'always',
        'viewFactor': 0.2
    });
    sr[_0x3a3e('0x34')]('.is-box-reveal', {
        'origin': _0x3a3e('0x36'),
        'distance': _0x3a3e('0x37'),
        'duration': 0x258,
        'delay': 0x64,
        'rotate': {'x': 0x0, 'y': 0x0, 'z': 0x0},
        'opacity': 0x0,
        'scale': 0x1,
        'easing': 'cubic-bezier(0.215,\x200.61,\x200.355,\x201)',
        'container': window[_0x3a3e('0x38')][_0x3a3e('0x39')],
        'mobile': !![],
        'reset': !![],
        'useDelay': _0x3a3e('0x3a'),
        'viewFactor': 0.2
    }, 0x64);
}

function initBackToTop() {
    var _0x2fa50c = 0x258;
    var _0x470fde = 0x1f4;
    $(window)['on'](_0x3a3e('0x4'), function () {
        if ($(window)[_0x3a3e('0x5')]() >= _0x2fa50c) {
            $(_0x3a3e('0x3b'))[_0x3a3e('0x7')]('visible');
        } else {
            $(_0x3a3e('0x3b'))[_0x3a3e('0xa')](_0x3a3e('0x3c'));
        }
    });
    $('#backtotop\x20a')['on'](_0x3a3e('0xd'), function () {
        $(_0x3a3e('0x3d'))['animate']({'scrollTop': 0x0}, _0x470fde);
        return ![];
    });
}

function scroll_if_anchor(_0x171625) {
    _0x171625 = typeof _0x171625 == _0x3a3e('0x3e') ? _0x171625 : $(this)[_0x3a3e('0x16')](_0x3a3e('0x3f'));
    var _0x374ad3 = 0x32;
    if (_0x171625[_0x3a3e('0x40')]('#') == 0x0) {
        var _0x42a2f5 = $(_0x171625);
        if (_0x42a2f5['length']) {
            $(_0x3a3e('0x3d'))[_0x3a3e('0x41')]({'scrollTop': _0x42a2f5[_0x3a3e('0x42')]()[_0x3a3e('0x43')] - _0x374ad3});
            if (history && _0x3a3e('0x44') in history) {
                history[_0x3a3e('0x44')]({}, document[_0x3a3e('0x45')], window[_0x3a3e('0x46')][_0x3a3e('0x47')] + _0x171625);
                return ![];
            }
        }
    }
}
