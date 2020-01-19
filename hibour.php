<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/main.php');
includePluginsFiles();
require_once(WEB_SYSTEM_PATH . 'auth_user.php');
?>
<!doctype html>
<html lang="<?= LANG; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="<?= WEB_TEMPLATE_URL; ?>images/appoe-favicon.png">
    <link rel="stylesheet" type="text/css" href="<?= WEB_TEMPLATE_URL; ?>css/appoe.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <title>Connexion à <?= WEB_TITLE; ?></title>
    <style>
        html, body {
            background: hsla(260, 40%, 5%, 1);
        }
        input:-webkit-autofill,
        input:-webkit-autofill:hover,
        input:-webkit-autofill:focus,
        input:-webkit-autofill:active {
            -webkit-animation: autofill 0s forwards;
            animation: autofill 0s forwards;
        }

        @keyframes autofill {
            100% {
                font-size:1.2em;
                background: transparent;
                color: #FFF;
            }
        }

        @-webkit-keyframes autofill {
            100% {
                font-size:1.2em;
                background: transparent;
                color: #FFF;
            }
        }
    </style>
</head>
<body>
<main>
    <div id="hibourContainer" class="content content--canvas">
        <div id="hibourContent" class="card">
            <div class="card-body">
                <img src="<?= getLogo(APP_IMG_URL . 'appoe-logo-white-sm.png'); ?>" alt="APPOE">
                <form id="loginForm" action="" method="post">
                    <input type="text" maxlength="70" name="loginInput" id="emailInput"
                           value="<?= !empty($_POST['loginInput']) ? $_POST['loginInput'] : ''; ?>"
                           required="required" placeholder="<?= trans('Login'); ?>">
                    <input type="password" id="passwordInput" name="passwordInput" required="required"
                           placeholder="<?= trans('Mot de passe'); ?>">
                    <?= getFieldsControls(); ?>
                    <span style="color:#FFF;"><?php App\Flash::display(); ?></span>
                    <button type="submit" name="APPOECONNEXION" id="submitButton"><?= trans('Connexion'); ?></button>
                </form>
            </div>
        </div>
    </div>
</main>
<script>
    !function () {
        "use strict";
        var e = .5 * (Math.sqrt(3) - 1), t = (3 - Math.sqrt(3)) / 6, a = 1 / 6, r = (Math.sqrt(5) - 1) / 4,
            n = (5 - Math.sqrt(5)) / 20;

        function i(e) {
            var t;
            t = "function" == typeof e ? e : e ? function () {
                var e, t = 0, a = 0, r = 0, n = 1, i = (e = 4022871197, function (t) {
                    t = t.toString();
                    for (var a = 0; a < t.length; a++) {
                        var r = .02519603282416938 * (e += t.charCodeAt(a));
                        r -= e = r >>> 0, e = (r *= e) >>> 0, e += 4294967296 * (r -= e)
                    }
                    return 2.3283064365386963e-10 * (e >>> 0)
                });
                t = i(" "), a = i(" "), r = i(" ");
                for (var o = 0; o < arguments.length; o++) (t -= i(arguments[o])) < 0 && (t += 1), (a -= i(arguments[o])) < 0 && (a += 1), (r -= i(arguments[o])) < 0 && (r += 1);
                return i = null, function () {
                    var e = 2091639 * t + 2.3283064365386963e-10 * n;
                    return t = a, a = r, r = e - (n = 0 | e)
                }
            }(e) : Math.random, this.p = o(t), this.perm = new Uint8Array(512), this.permMod12 = new Uint8Array(512);
            for (var a = 0; a < 512; a++) this.perm[a] = this.p[255 & a], this.permMod12[a] = this.perm[a] % 12
        }

        function o(e) {
            var t, a = new Uint8Array(256);
            for (t = 0; t < 256; t++) a[t] = t;
            for (t = 0; t < 255; t++) {
                var r = t + ~~(e() * (256 - t)), n = a[t];
                a[t] = a[r], a[r] = n
            }
            return a
        }

        i.prototype = {
            grad3: new Float32Array([1, 1, 0, -1, 1, 0, 1, -1, 0, -1, -1, 0, 1, 0, 1, -1, 0, 1, 1, 0, -1, -1, 0, -1, 0, 1, 1, 0, -1, 1, 0, 1, -1, 0, -1, -1]),
            grad4: new Float32Array([0, 1, 1, 1, 0, 1, 1, -1, 0, 1, -1, 1, 0, 1, -1, -1, 0, -1, 1, 1, 0, -1, 1, -1, 0, -1, -1, 1, 0, -1, -1, -1, 1, 0, 1, 1, 1, 0, 1, -1, 1, 0, -1, 1, 1, 0, -1, -1, -1, 0, 1, 1, -1, 0, 1, -1, -1, 0, -1, 1, -1, 0, -1, -1, 1, 1, 0, 1, 1, 1, 0, -1, 1, -1, 0, 1, 1, -1, 0, -1, -1, 1, 0, 1, -1, 1, 0, -1, -1, -1, 0, 1, -1, -1, 0, -1, 1, 1, 1, 0, 1, 1, -1, 0, 1, -1, 1, 0, 1, -1, -1, 0, -1, 1, 1, 0, -1, 1, -1, 0, -1, -1, 1, 0, -1, -1, -1, 0]),
            noise2D: function (a, r) {
                var n, i, o = this.permMod12, s = this.perm, c = this.grad3, l = 0, p = 0, d = 0, f = (a + r) * e,
                    u = Math.floor(a + f), v = Math.floor(r + f), h = (u + v) * t, g = a - (u - h), b = r - (v - h);
                g > b ? (n = 1, i = 0) : (n = 0, i = 1);
                var x = g - n + t, w = b - i + t, P = g - 1 + 2 * t, m = b - 1 + 2 * t, y = 255 & u, M = 255 & v,
                    C = .5 - g * g - b * b;
                if (C >= 0) {
                    var I = 3 * o[y + s[M]];
                    l = (C *= C) * C * (c[I] * g + c[I + 1] * b)
                }
                var S = .5 - x * x - w * w;
                if (S >= 0) {
                    var T = 3 * o[y + n + s[M + i]];
                    p = (S *= S) * S * (c[T] * x + c[T + 1] * w)
                }
                var O = .5 - P * P - m * m;
                if (O >= 0) {
                    var A = 3 * o[y + 1 + s[M + 1]];
                    d = (O *= O) * O * (c[A] * P + c[A + 1] * m)
                }
                return 70 * (l + p + d)
            },
            noise3D: function (e, t, r) {
                var n, i, o, s, c, l, p, d, f, u, v = this.permMod12, h = this.perm, g = this.grad3,
                    b = (e + t + r) * (1 / 3), x = Math.floor(e + b), w = Math.floor(t + b), P = Math.floor(r + b),
                    m = (x + w + P) * a, y = e - (x - m), M = t - (w - m), C = r - (P - m);
                y >= M ? M >= C ? (c = 1, l = 0, p = 0, d = 1, f = 1, u = 0) : y >= C ? (c = 1, l = 0, p = 0, d = 1, f = 0, u = 1) : (c = 0, l = 0, p = 1, d = 1, f = 0, u = 1) : M < C ? (c = 0, l = 0, p = 1, d = 0, f = 1, u = 1) : y < C ? (c = 0, l = 1, p = 0, d = 0, f = 1, u = 1) : (c = 0, l = 1, p = 0, d = 1, f = 1, u = 0);
                var I = y - c + a, S = M - l + a, T = C - p + a, O = y - d + 2 * a, A = M - f + 2 * a,
                    L = C - u + 2 * a, k = y - 1 + .5, q = M - 1 + .5, R = C - 1 + .5, z = 255 & x, D = 255 & w,
                    F = 255 & P, H = .6 - y * y - M * M - C * C;
                if (H < 0) n = 0; else {
                    var $ = 3 * v[z + h[D + h[F]]];
                    n = (H *= H) * H * (g[$] * y + g[$ + 1] * M + g[$ + 2] * C)
                }
                var U = .6 - I * I - S * S - T * T;
                if (U < 0) i = 0; else {
                    var E = 3 * v[z + c + h[D + l + h[F + p]]];
                    i = (U *= U) * U * (g[E] * I + g[E + 1] * S + g[E + 2] * T)
                }
                var N = .6 - O * O - A * A - L * L;
                if (N < 0) o = 0; else {
                    var _ = 3 * v[z + d + h[D + f + h[F + u]]];
                    o = (N *= N) * N * (g[_] * O + g[_ + 1] * A + g[_ + 2] * L)
                }
                var B = .6 - k * k - q * q - R * R;
                if (B < 0) s = 0; else {
                    var G = 3 * v[z + 1 + h[D + 1 + h[F + 1]]];
                    s = (B *= B) * B * (g[G] * k + g[G + 1] * q + g[G + 2] * R)
                }
                return 32 * (n + i + o + s)
            },
            noise4D: function (e, t, a, i) {
                var o, s, c, l, p, d, f, u, v, h, g, b, x, w, P, m, y, M = this.perm, C = this.grad4,
                    I = (e + t + a + i) * r, S = Math.floor(e + I), T = Math.floor(t + I), O = Math.floor(a + I),
                    A = Math.floor(i + I), L = (S + T + O + A) * n, k = e - (S - L), q = t - (T - L), R = a - (O - L),
                    z = i - (A - L), D = 0, F = 0, H = 0, $ = 0;
                k > q ? D++ : F++, k > R ? D++ : H++, k > z ? D++ : $++, q > R ? F++ : H++, q > z ? F++ : $++, R > z ? H++ : $++;
                var U = k - (d = D >= 3 ? 1 : 0) + n, E = q - (f = F >= 3 ? 1 : 0) + n,
                    N = R - (u = H >= 3 ? 1 : 0) + n, _ = z - (v = $ >= 3 ? 1 : 0) + n,
                    B = k - (h = D >= 2 ? 1 : 0) + 2 * n, G = q - (g = F >= 2 ? 1 : 0) + 2 * n,
                    W = R - (b = H >= 2 ? 1 : 0) + 2 * n, Y = z - (x = $ >= 2 ? 1 : 0) + 2 * n,
                    j = k - (w = D >= 1 ? 1 : 0) + 3 * n, J = q - (P = F >= 1 ? 1 : 0) + 3 * n,
                    K = R - (m = H >= 1 ? 1 : 0) + 3 * n, Q = z - (y = $ >= 1 ? 1 : 0) + 3 * n, V = k - 1 + 4 * n,
                    X = q - 1 + 4 * n, Z = R - 1 + 4 * n, ee = z - 1 + 4 * n, te = 255 & S, ae = 255 & T, re = 255 & O,
                    ne = 255 & A, ie = .6 - k * k - q * q - R * R - z * z;
                if (ie < 0) o = 0; else {
                    var oe = M[te + M[ae + M[re + M[ne]]]] % 32 * 4;
                    o = (ie *= ie) * ie * (C[oe] * k + C[oe + 1] * q + C[oe + 2] * R + C[oe + 3] * z)
                }
                var se = .6 - U * U - E * E - N * N - _ * _;
                if (se < 0) s = 0; else {
                    var ce = M[te + d + M[ae + f + M[re + u + M[ne + v]]]] % 32 * 4;
                    s = (se *= se) * se * (C[ce] * U + C[ce + 1] * E + C[ce + 2] * N + C[ce + 3] * _)
                }
                var le = .6 - B * B - G * G - W * W - Y * Y;
                if (le < 0) c = 0; else {
                    var pe = M[te + h + M[ae + g + M[re + b + M[ne + x]]]] % 32 * 4;
                    c = (le *= le) * le * (C[pe] * B + C[pe + 1] * G + C[pe + 2] * W + C[pe + 3] * Y)
                }
                var de = .6 - j * j - J * J - K * K - Q * Q;
                if (de < 0) l = 0; else {
                    var fe = M[te + w + M[ae + P + M[re + m + M[ne + y]]]] % 32 * 4;
                    l = (de *= de) * de * (C[fe] * j + C[fe + 1] * J + C[fe + 2] * K + C[fe + 3] * Q)
                }
                var ue = .6 - V * V - X * X - Z * Z - ee * ee;
                if (ue < 0) p = 0; else {
                    var ve = M[te + 1 + M[ae + 1 + M[re + 1 + M[ne + 1]]]] % 32 * 4;
                    p = (ue *= ue) * ue * (C[ve] * V + C[ve + 1] * X + C[ve + 2] * Z + C[ve + 3] * ee)
                }
                return 27 * (o + s + c + l + p)
            }
        }, i._buildPermutationTable = o, "undefined" != typeof define && define.amd && define(function () {
            return i
        }), "undefined" != typeof exports ? exports.SimplexNoise = i : "undefined" != typeof window && (window.SimplexNoise = i), "undefined" != typeof module && (module.exports = i)
    }();
    const {PI: PI, cos: cos, sin: sin, abs: abs, sqrt: sqrt, pow: pow, round: round, random: random, atan2: atan2} = Math,
        HALF_PI = .5 * PI, TAU = 2 * PI, TO_RAD = PI / 180, floor = e => 0 | e, rand = e => e * random(),
        randIn = (e, t) => rand(t - e) + e, randRange = e => e - rand(2 * e), fadeIn = (e, t) => e / t,
        fadeOut = (e, t) => (t - e) / t, fadeInOut = (e, t) => {
            let a = .5 * t;
            return abs((e + a) % t - a) / a
        }, dist = (e, t, a, r) => sqrt(pow(a - e, 2) + pow(r - t, 2)), angle = (e, t, a, r) => atan2(r - t, a - e),
        lerp = (e, t, a) => (1 - a) * e + a * t, particleCount = 700, particlePropCount = 9,
        particlePropsLength = 700 * particlePropCount, rangeY = 100, baseTTL = 50, rangeTTL = 150, baseSpeed = .1,
        rangeSpeed = 2, baseRadius = 1, rangeRadius = 4, baseHue = 220, rangeHue = 100, noiseSteps = 8, xOff = .00125,
        yOff = .00125, zOff = 5e-4, backgroundColor = "hsla(260,40%,5%,1)";
    let container, canvas, ctx, center, gradient, tick, simplex, particleProps, positions, velocities, lifeSpans,
        speeds, sizes, hues;

    function setup() {
        createCanvas(), resize(), initParticles(), draw()
    }

    function initParticles() {
        let e;
        for (tick = 0, simplex = new SimplexNoise, particleProps = new Float32Array(particlePropsLength), e = 0; e < particlePropsLength; e += particlePropCount) initParticle(e)
    }

    function initParticle(e) {
        let t, a, r, n, i, o, s, c, l;
        t = rand(canvas.a.width), a = center[1] + randRange(rangeY), r = 0, n = 0, i = 0, o = baseTTL + rand(rangeTTL), s = baseSpeed + rand(rangeSpeed), c = baseRadius + rand(rangeRadius), l = baseHue + rand(rangeHue), particleProps.set([t, a, 0, 0, 0, o, s, c, l], e)
    }

    function drawParticles() {
        let e;
        for (e = 0; e < particlePropsLength; e += particlePropCount) updateParticle(e)
    }

    function updateParticle(e) {
        let t, a, r, n, i, o, s, c, l, p, d, f, u = 1 + e, v = 2 + e, h = 3 + e, g = 4 + e, b = 5 + e, x = 6 + e,
            w = 7 + e, P = 8 + e;
        a = particleProps[e], r = particleProps[u], t = simplex.noise3D(a * xOff, r * yOff, tick * zOff) * noiseSteps * TAU, n = lerp(particleProps[v], cos(t), .5), i = lerp(particleProps[h], sin(t), .5), o = particleProps[g], s = particleProps[b], drawParticle(a, r, l = a + n * (c = particleProps[x]), p = r + i * c, o, s, d = particleProps[w], f = particleProps[P]), o++, particleProps[e] = l, particleProps[u] = p, particleProps[v] = n, particleProps[h] = i, particleProps[g] = o, (checkBounds(a, r) || o > s) && initParticle(e)
    }

    function drawParticle(e, t, a, r, n, i, o, s) {
        ctx.a.save(), ctx.a.lineCap = "round", ctx.a.lineWidth = o, ctx.a.strokeStyle = `hsla(${s},100%,60%,${fadeInOut(n, i)})`, ctx.a.beginPath(), ctx.a.moveTo(e, t), ctx.a.lineTo(a, r), ctx.a.stroke(), ctx.a.closePath(), ctx.a.restore()
    }

    function checkBounds(e, t) {
        return e > canvas.a.width || e < 0 || t > canvas.a.height || t < 0
    }

    function createCanvas() {
        container = document.querySelector(".content--canvas"), (canvas = {
            a: document.createElement("canvas"),
            b: document.createElement("canvas")
        }).b.style = "\n\t\tposition: fixed;\n\t\ttop: 0;\n\t\tleft: 0;\n\t\twidth: 100%;\n\t\theight: 100%;\n\t", container.appendChild(canvas.b), ctx = {
            a: canvas.a.getContext("2d"),
            b: canvas.b.getContext("2d")
        }, center = []
    }

    function resize() {
        const {innerWidth: e, innerHeight: t} = window;
        canvas.a.width = e, canvas.a.height = t, ctx.a.drawImage(canvas.b, 0, 0), canvas.b.width = e, canvas.b.height = t, ctx.b.drawImage(canvas.a, 0, 0), center[0] = .5 * canvas.a.width, center[1] = .5 * canvas.a.height
    }

    function renderGlow() {
        ctx.b.save(), ctx.b.filter = "blur(8px) brightness(200%)", ctx.b.globalCompositeOperation = "lighter", ctx.b.drawImage(canvas.a, 0, 0), ctx.b.restore(), ctx.b.save(), ctx.b.filter = "blur(4px) brightness(200%)", ctx.b.globalCompositeOperation = "lighter", ctx.b.drawImage(canvas.a, 0, 0), ctx.b.restore()
    }

    function renderToScreen() {
        ctx.b.save(), ctx.b.globalCompositeOperation = "lighter", ctx.b.drawImage(canvas.a, 0, 0), ctx.b.restore()
    }

    function draw() {
        tick++, ctx.a.clearRect(0, 0, canvas.a.width, canvas.a.height), ctx.b.fillStyle = backgroundColor, ctx.b.fillRect(0, 0, canvas.a.width, canvas.a.height), drawParticles(), renderGlow(), renderToScreen(), window.requestAnimationFrame(draw)
    }

    window.addEventListener("load", setup), window.addEventListener("resize", resize), $(document).ready(function (e) {
        $("#loginForm").on("submit", function (e) {
            "" !== $("#loginInput").val() && "" !== $("#passwordInput").val() || e.preventDefault()
        })
    });
</script>
</body>
</html>